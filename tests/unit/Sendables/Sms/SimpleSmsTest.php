<?php

namespace Rhubarb\Sms\Tests\unit\Sms;

use Codeception\TestCase;
use Rhubarb\Sms\Sendables\Sms\SimpleSms;

class SimpleSmsTest extends TestCase\Test
{
    public function testSmsRecipients()
    {
        $simpleSms = new SimpleSms();
        $simpleSms->addRecipient("07710123123");

        $this->assertCount(1, $simpleSms->getRecipients());

        $simpleSms->addRecipient("07710456456", "Test Person Name");
        $this->assertCount(2, $simpleSms->getRecipients());
    }
}
