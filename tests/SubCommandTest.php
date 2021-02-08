<?php

use PHPUnit\Framework\TestCase;
use src\oop\Commands\SubCommand;

class SubCommandTest extends TestCase
{
    /**
     * @var SubCommand
     */
    private $command;

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->command = new SubCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [6, 4, 2],
            [3, 1, 2],
            [0.3, 0.1, 0.2],
            [-1, 2, -3],
            ['25', 10, 15],
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