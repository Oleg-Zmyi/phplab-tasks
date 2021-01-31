<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function positiveDataProvider()
    {
        return [
            [
                [
                    ["name" => "Nashville Metropolitan Airport 1"],
                    ["name" => "Baltimore Washington Airport"],
                    ["name" => "Atlanta Hartsfield International Airport"],
                    ["name" => "Las Vegas McCarran International Airport"],
                    ["name" => "Boise Airport"],
                    ["name" => "Krimea International Airport"],
                    ["name" => "Hollywood Burbank Airport"],
                    ["name" => "Amabongs Sunport International Airport"],
                    ["name" => "Numizar International Airport"],

                ],
                ['A', 'B', 'H', 'K', 'L', 'N']
            ]
        ];
    }
}