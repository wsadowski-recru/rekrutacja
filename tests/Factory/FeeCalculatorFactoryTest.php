<?php

declare(strict_types=1);

namespace Factory;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Factory\FeeCalculatorFactory;
use PragmaGoTech\Interview\Service\TwelveMonthLoanFeeCalculator;
use PragmaGoTech\Interview\Service\TwentyFourMonthLoanFeeCalculator;

class FeeCalculatorFactoryTest extends TestCase
{
    public function testShouldThrowException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        FeeCalculatorFactory::createCalculator(25);
    }

    public function testShouldCreateCalculatorForTwelveMonths(): void
    {
        $calculator = FeeCalculatorFactory::createCalculator(12);

        $this->assertEquals(TwelveMonthLoanFeeCalculator::class, get_class($calculator));
    }

    public function testShouldCreateCalculatorForTwentyFourMonths(): void
    {
        $calculator = FeeCalculatorFactory::createCalculator(24);

        $this->assertEquals(TwentyFourMonthLoanFeeCalculator::class, get_class($calculator));
    }
}