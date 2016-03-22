<?php

namespace Rhubarb\Sms\Sendables\Sms;

use Rhubarb\Crown\Context;
use Rhubarb\Crown\Settings;

/**
 * Container for some default properties for sending sms.
 *
 * @property SmsNumber $DefaultSender The default sender to use for all sms (unless set explicitly in the sms classes)
 * @property SmsNumber|bool $OnlyRecipient If you wish to prevent a development setup from sending a real customer Sms, set this to a test recipient sms Number
 */
class SmsSettings extends Settings
{
    protected function initialiseDefaultValues()
    {
        parent::initialiseDefaultValues();

        $request = Context::currentRequest();
        $host = $request->Server("SERVER_NAME");

        $this->DefaultSender = new SmsNumber("", $host);
        $this->OnlyRecipient = false;
    }

}
