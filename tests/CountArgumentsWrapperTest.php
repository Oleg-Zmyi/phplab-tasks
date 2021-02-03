<?php


use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     */
    public function testPositive(...$input)
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper($input);
    }

    public function positiveDataProvider()
    {
        return [
            [],
            [113,23,23],
            ['test',[1,2,3]],
        ];
    }
}