<?php

use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     */
    public function testPositive($input)
    {
        $this->assertEquals($input, sayHello());
    }

    public function positiveDataProvider()
    {
        return [
            ['Hello', 'Hello'],
        ];
    }
}