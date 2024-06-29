<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Handler;

use PragmaGoTech\Interview\Command\CalculateFeeCommand;
use PragmaGoTech\Interview\Factory\FeeCalculatorFactory;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Validator\LoanProposalValidator;

class CalculateFeeHandler
{
    public function __construct(private readonly LoanProposalValidator $loanProposalValidator)
    {
    }

    public function handle(CalculateFeeCommand $command): float
    {
        $isValid = $this->loanProposalValidator->validate($command->getTerm(), $command->getAmount());

        if ($isValid) {
            $feeCalculator = FeeCalculatorFactory::createCalculator($command->getTerm());
            $application = new LoanProposal($command->getTerm(), $command->getAmount());
        }

        return $feeCalculator->calculate($application);
    }
}
