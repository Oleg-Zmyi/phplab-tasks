<?php

use PHPUnit\Framework\TestCase;
use src\oop\Commands\PowCommand;

class PowCommandTest extends TestCase
{
    /**
     * @var PowCommand
     */
    private $command;

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->command = new PowCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [4, 6, 4096],
            [17, 5, 1419857],
            [3, 3, 27],
            [5, 2, 25],
            [4, 2, 16],
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