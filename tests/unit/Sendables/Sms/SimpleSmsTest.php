<?php

namespace Rhubarb\Sms\Tests\unit\Sms;

use Codeception\TestCase;
use Rhubarb\Crown\Tests\Fixtures\TestCases\RhubarbTestCase;
use Rhubarb\Sms\Sendables\Sms\SimpleSms;

class SimpleSmsTest extends RhubarbTestCase
{
    public function testSmsRecipients()
    {
        $simpleSms = new SimpleSms();
        $simpleSms->addRecipientByNumber("07710123123");

        $this->assertCount(1, $simpleSms->getRecipients());

        $simpleSms->addRecipientByNumber("07710456456", "Test Person Name");
        $this->assertCount(2, $simpleSms->getRecipients());
    }
}
