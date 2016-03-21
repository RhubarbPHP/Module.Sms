<?php

namespace Rhubarb\Sms\Sendables\Sms;

use Rhubarb\Crown\Logging\Log;
use Rhubarb\Crown\Sendables\Sendable;

abstract class Sms extends Sendable
{
    private $recipients = [];

    /**
     * Called when sending occurs providing an opportunity to log the event.
     * @return mixed
     */
    protected function logSending()
    {
        $text = $this->getText();

        Log::Debug("Sending sms to recipients: " . $this->getRecipientList(), "Sms");

        Log::BulkData(
            "Sms content",
            "Sms",
            "\r\n\r\n" . $text
        );
    }

    protected function getProviderClassName()
    {
        return SMSProvider::class;
    }

    public function addRecipient($recipientNumber, $recipientName = "")
    {
        $this->recipients[$recipientNumber] = new SMSNumber($recipientNumber, $recipientName);

        return $this;
    }

    public function addRecipients($recipients)
    {
        foreach ($recipients as $recipient) {
            $this->addRecipient($recipient);
        }

        return $this;
    }

    public function getRecipients()
    {
        $smsSettings = new SMSSettings();

        if ($smsSettings->OnlyRecipient) {
            //  Only send sms to a test recipient, to prevent sending sms messages to real customers from a development environment
            return [$smsSettings->OnlyRecipient];
        }

        return $this->recipients;
    }

    public function getSendableType()
    {
        return "Sms";
    }
}
