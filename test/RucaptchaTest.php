<?php

namespace gladyshev\yii\rucaptcha\test;

use gladyshev\yii\rucaptcha\Rucaptcha;

class RucaptchaTest extends \PHPUnit_Framework_TestCase
{
    /* Some fake tests (for test build via travis)*/

    public function testKeySetter()
    {
        $component = new Rucaptcha();
        $component->apiKey = '123';
        $this->assertEquals('123', $component->apiKey);
        
    }

    public function testOptionsSetter()
    {
        $component = new Rucaptcha();
        $component->options = ['123'];
        $this->assertEquals(['123'], $component->options);
    }
}
