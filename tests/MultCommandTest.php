<?php

use PHPUnit\Framework\TestCase;
use src\oop\Commands\MultCommand;

class MultCommandTest extends TestCase
{
    /**
     * @var MultCommand
     */
    private $command;

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->command = new MultCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [3, 3, 9],
            [12, 2.5, 30],
            [4, 10, 40],
            ['3', 5, 15],
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