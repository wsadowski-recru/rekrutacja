<?php

declare(strict_types=1);

namespace Handler;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Command\CalculateFeeCommand;
use PragmaGoTech\Interview\Handler\CalculateFeeHandler;
use PragmaGoTech\Interview\Validator\LoanProposalValidator;

class CalculateFeeHandlerTest extends TestCase
{
    private CalculateFeeHandler  $calculateFeeHandler;
    private LoanProposalValidator $loanProposalValidator;

    public function setUp(): void
    {
        $this->loanProposalValidator = new LoanProposalValidator();
        $this->calculateFeeHandler = new CalculateFeeHandler($this->loanProposalValidator);
    }

    public function testShouldFailTooShortTerm(): void
    {
        $command = new CalculateFeeCommand(10, 1000);

        $this->expectException(InvalidArgumentException::class);
        $this->calculateFeeHandler->handle($command);
    }

    public function testShouldFailTooSmallAmount(): void
    {
        $command = new CalculateFeeCommand(12, 10);

        $this->expectException(InvalidArgumentException::class);
        $this->calculateFeeHandler->handle($command);
    }
}
