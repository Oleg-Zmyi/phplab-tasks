<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, sayHelloArgumentWrapper($input));
    }

    public function testNegative()
    {
        $this->expectException(InvalidArgumentException::class);

        sayHelloArgumentWrapper(null);
    }

    public function positiveDataProvider()
    {
        return [
            [12, 'Hello 12'],
            [true , 'Hello 1'],
            ['Alex' , 'Hello Alex'],
            ['true' , 'Hello true'],
        ];
    }
}