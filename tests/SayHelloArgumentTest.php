<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTestTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive()
    {
        $this->assertEquals("Hello", sayHello());
    }

    public function positiveDataProvider()
    {
        return 'Hello';
    }
}