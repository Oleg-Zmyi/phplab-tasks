<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $expected
     */
    public function testPositive($input,$expected)
    {
        $this->assertEquals($expected, countArguments(...$input));
    }

    public function positiveDataProvider()
    {
        return [
            [[], ['argument_count' => 0, 'argument_values' => []]],
            [['test'], ['argument_count' => 1, 'argument_values' => ['test']]],
            [["some text", "another text"], ['argument_count' => 2, 'argument_values' => ["some text", "another text"]]],
        ];
    }
}