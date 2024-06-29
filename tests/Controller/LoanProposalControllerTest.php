<?php

declare(strict_types=1);

namespace Controller;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Handler\CalculateFeeHandler;
use PragmaGoTech\Interview\Controller\LoanProposalController;
use PragmaGoTech\Interview\Validator\LoanProposalValidator;

class LoanProposalControllerTest extends TestCase
{
    private LoanProposalController $loanProposalController;
    private CalculateFeeHandler $calculateFeeHandler;
    private LoanProposalValidator $loanProposalValidator;

    public function setUp(): void
    {
        $this->loanProposalValidator = new LoanProposalValidator();
        $this->calculateFeeHandler = new CalculateFeeHandler($this->loanProposalValidator);
        $this->loanProposalController = new LoanProposalController($this->calculateFeeHandler);
    }

    #[DataProvider('loanDataProviderTwentyFourMonth')]
    public function testCalculateFeeForTwentyFourMonthLoan(int $term, float $amount, float $expectedFee): void
    {
        $resultFee = $this->loanProposalController->calculateFee($term, $amount);
        $this->assertEquals($expectedFee, $resultFee);
    }

    #[DataProvider('loanDataProviderTwelveMonth')]
    public function testCalculateFeeForTwelveMonthLoan(int $term, float $amount, float $expectedFee): void
    {
        $resultFee = $this->loanProposalController->calculateFee($term, $amount);
        $this->assertEquals($expectedFee, $resultFee);
    }

    public static function loanDataProviderTwentyFourMonth(): array
    {
        return [
            [24, 2750, 115.0],
            [24, 5000, 200.0],
            [24, 15000, 600.0]
        ];
    }

    public static function loanDataProviderTwelveMonth(): array
    {
        return [
            [12, 1000, 50.0],
            [12, 2750, 90.0],
            [12, 5000, 100.0],
            [12, 15000, 300.0]
        ];
    }
}
