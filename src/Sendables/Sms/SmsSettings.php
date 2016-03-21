<?php

namespace Rhubarb\Sms\Sendables\Sms;

use Rhubarb\Crown\Settings;

/**
 * Container for some default properties for sending sms.
 *
 * @property SMSNumber|bool $OnlyRecipient If you wish to prevent a development setup from sending a real customer Sms, set this to a test recipient sms Number
 */
class SmsSettings extends Settings
{
    protected function initialiseDefaultValues()
    {
        parent::initialiseDefaultValues();

        $this->OnlyRecipient = false;
    }

}
