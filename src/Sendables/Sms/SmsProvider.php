<?php

namespace Rhubarb\Sms\Sendables\Sms;

use Rhubarb\Crown\DependencyInjection\ProviderInterface;
use Rhubarb\Crown\DependencyInjection\ProviderTrait;
use Rhubarb\Crown\Sendables\SendableProvider;

abstract class SmsProvider extends SendableProvider implements ProviderInterface
{
    use ProviderTrait;
}
