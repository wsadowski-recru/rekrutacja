<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Factory;

use InvalidArgumentException;
use PragmaGoTech\Interview\Enum\LoanTerm;
use PragmaGoTech\Interview\FeeCalculator;
use PragmaGoTech\Interview\Service\TwelveMonthLoanFeeCalculator;
use PragmaGoTech\Interview\Service\TwentyFourMonthLoanFeeCalculator;

class FeeCalculatorFactory
{
    public static function createCalculator(int $term): FeeCalculator
    {
        return match ($term) {
            LoanTerm::TWELVE_MONTHS->value => new TwelveMonthLoanFeeCalculator(),
            LoanTerm::TWENTY_FOUR_MONTHS->value => new TwentyFourMonthLoanFeeCalculator(),
            default => throw new InvalidArgumentException('Loan term must be 12 or 24 months only.'),
        };
    }
}
