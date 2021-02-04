<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    /**
     * @dataProvider negativeDataProvider
     * @param $input
     */

    public function testNegative($input)
    {
        $this->expectException(InvalidArgumentException::class);
        sayHelloArgumentWrapper($input);
    }

    public function negativeDataProvider()
    {
        return [
            [ null ],
            [['test', 'test2']],
        ];
    }

}