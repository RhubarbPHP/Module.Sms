<?php

namespace Rhubarb\Sms\Tests\unit\Sms;

use Codeception\TestCase;
use Rhubarb\Sms\Exceptions\SMSException;
use Rhubarb\Sms\Sendables\Sms\SmsNumber;

class SmsNumberTest extends TestCase\Test
{
    public function testCreation()
    {
        $smsNumber = new SmsNumber("+447710123123");
        $this->assertEquals("+447710123123", $smsNumber->number);

        $smsNumber = new SmsNumber("+447710123123", "Michael Miscampbell");
        $this->assertEquals("+447710123123", $smsNumber->number);
        $this->assertEquals("Michael Miscampbell", $smsNumber->name);

        try {
            $smsNumber = new SmsNumber("DUMMY DATA");
            $this->fail();
        } catch (SmsException $exception) {
            $this->assertInstanceOf(SmsException::class, $exception);
        }
    }
}
