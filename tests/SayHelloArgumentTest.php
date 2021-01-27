<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($input));
    }

    public function positiveDataProvider()
    {
        return [
            ['John', 'Hello John'],
            ['Alex', 'Hello Alex'],
            ['Sue', 'Hello Sue'],
            ['Megan', 'Hello Megan'],
        ];
    }
}