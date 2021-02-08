<?php

use PHPUnit\Framework\TestCase;
use src\oop\Commands\DivCommand;

class DivCommandTest extends TestCase
{
    /**
     * @var DivCommand
     */
    private $command;

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->command = new DivCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [30, 4, 7.5],
            [40, 2, 20],
            [24, 8, 3],
            ['56', 8, 7],
        ];
    }

    /**
     * @dataProvider commandPositiveDataProvider
     * @param $a
     * @param $b
     * @param $expected
     */
    public function testCommandPositive($a, $b, $expected)
    {
        $result = $this->command->execute($a, $b);

        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider negativeDataProvider
     * @param $input
     */
    public function testCommandNegative($input)
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->command->execute($input);
    }

    public function negativeDataProvider()
    {
        return [
            [ 1 ],
            ['eleven'],
            [null, 'test']
        ];
    }

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function tearDown(): void
    {
        unset($this->command);
    }
}