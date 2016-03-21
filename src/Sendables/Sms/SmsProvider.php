<?php

namespace Rhubarb\Sms\Sendables\Sms;

use Rhubarb\Crown\Sendables\SendableProvider;

abstract class SmsProvider extends SendableProvider
{
    private static $defaultSMSProviderClassName = '\Rhubarb\Crown\Sendables\SMS\PhpSMSProvider';

    public static function setDefaultSMSProviderClassName($smsProviderClassName)
    {
        self::$defaultSMSProviderClassName = $smsProviderClassName;
    }

    /**
     * Returns an instance of the default email provider
     *
     * @return SMSProvider
     */
    public static function getDefaultProvider()
    {
        $class = self::$defaultSMSProviderClassName;
        return new $class();
    }
}
