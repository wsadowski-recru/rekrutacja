<?php

namespace Service;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Service\TwentyFourMonthLoanFeeCalculator;

class TwentyFourMonthLoanFeeCalculatorTest extends TestCase
{
    private TwentyFourMonthLoanFeeCalculator $calculator;

    public function setUp(): void
    {
        $this->calculator = new TwentyFourMonthLoanFeeCalculator();
    }

    #[DataProvider('loanDataProvider')]
    public function testCalculateFeeForTwentyFourMonthLoan(int $term, float $amount, float $expectedFee): void
    {
        $application = new LoanProposal($term, $amount);
        $result = $this->calculator->calculate($application);
        $this->assertEquals($expectedFee, $result);
    }

    public static function loanDataProvider(): array
    {
        return [
            [24, 2750, 115.0],
            [24, 5000, 200.0],
            [24, 15000, 600.0]
        ];
    }
}
