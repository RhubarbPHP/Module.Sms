<?php

namespace Rhubarb\Sms\Sendables\Sms;

use Rhubarb\Crown\Logging\Log;
use Rhubarb\Crown\Sendables\Sendable;

abstract class Sms extends Sendable
{
    private $sender;

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

    public function getRecipientList()
    {
        return implode(", ", $this->getRecipients());
    }

    public function getProviderClassName()
    {
        return SMSProvider::class;
    }

    public function addRecipientByNumber($recipientNumber, $recipientName = "")
    {
        $this->addRecipient(new SmsRecipient($recipientNumber, $recipientName));

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
        $smsSettings = SmsSettings::singleton();

        if ($smsSettings->onlyRecipient) {
            //  Only send sms to a test recipient, to prevent sending sms messages to real customers from a development environment
            return [$smsSettings->onlyRecipient];
        }

        return $this->recipients;
    }

    /**
     * @return SmsRecipient
     */
    public function getSender()
    {
        if ($this->sender == null) {
            $smsSettings = SmsSettings::singleton();

            return $smsSettings->defaultSender;
        }

        return $this->sender;
    }

    public function setSender($senderNumber, $name = "")
    {
        $this->sender = new SmsRecipient($senderNumber, $name);

        return $this;
    }

    public function getSendableType()
    {
        return "Sms";
    }
}
