<?php

declare(strict_types=1);

namespace Utils;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Utils\CsvParser;

class CsvParserTest extends TestCase
{
    private const EXPECTED_RESULT = [
        1000 => 50,
        2000 => 90,
        3000 => 90,
        4000 => 115,
        5000 => 100,
        6000 => 120,
        7000 => 140,
        8000 => 160,
        9000 => 180,
        10000 => 200,
        11000 => 220,
        12000 => 240,
        13000 => 260,
        14000 => 280,
        15000 => 300,
        16000 => 320,
        17000 => 340,
        18000 => 360,
        19000 => 380,
        20000 => 400,
    ];

    public function testParseBreakPointsYaml(): void
    {
        $this->assertEquals(
            self::EXPECTED_RESULT,
            CsvParser::parseCsv('config/twelve_months_breakpoints.csv')
        );
    }

    public function testThrowExcpetionDueToNotExistingFile(): void
    {
        $this->expectException(InvalidArgumentException::class);
        CsvParser::parseCsv('config/test.csv');
    }
}
