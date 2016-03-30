<?php

namespace Rhubarb\Sms\Sendables\Sms;

use Rhubarb\Crown\Context;
use Rhubarb\Crown\Settings;

/**
 * Container for some default properties for sending sms.
 */
class SmsSettings extends Settings
{
    /**
     * @var SmsRecipient|bool $onlyRecipient If you wish to prevent a development setup from emailing real customer addresses, set this to a test recipient address
     */
    public $onlyRecipient = false;
}
