<?php

namespace Service;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Service\TwelveMonthLoanFeeCalculator;

class TwelveMonthLoanFeeCalculatorTest extends TestCase
{
    private TwelveMonthLoanFeeCalculator $calculator;

    public function setUp(): void
    {
        $this->calculator = new TwelveMonthLoanFeeCalculator();
    }

    #[DataProvider('loanDataProvider')]
    public function testCalculateFeeForTwelveMonthLoan($term, $amount, $expectedFee): void
    {
        $application = new LoanProposal($term, $amount);
        $result = $this->calculator->calculate($application);
        $this->assertEquals($expectedFee, $result);
    }

    public static function loanDataProvider(): array
    {
        return [
            [12, 2750, 90.0],
            [12, 5000, 100.0],
            [12, 15000, 300.0]
        ];
    }
}
