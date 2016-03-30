<?php

namespace Rhubarb\Sms\Sendables\Sms;

use Rhubarb\Crown\Sendables\SendableRecipient;
use Rhubarb\Sms\Exceptions\SmsException;

class SmsRecipient extends SendableRecipient
{
    /**
     * @var string The sms number e.g. +447710123123
     */
    public $number;
    /**
     * @var string The name e.g. John Smith
     */
    public $name;

    public function __construct($number, $name = "")
    {
        //  The number must be numeric to be able to send the Sms
        if (is_numeric($number)) {
            $this->number = $number;
        } else {
            throw new SmsException("The sms " . $number . " is not a valid number.");
        }

        if ($name != "") {
            $this->name = $name;
        }
    }

    public function __toString()
    {
        if ($this->name) {
            return '"' . $this->name . '" <' . $this->number . '>';
        }

        return $this->number;
    }
}
