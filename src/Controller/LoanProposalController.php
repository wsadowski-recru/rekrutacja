<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Controller;

use Exception;
use InvalidArgumentException;
use PragmaGoTech\Interview\Command\CalculateFeeCommand;
use PragmaGoTech\Interview\Handler\CalculateFeeHandler;

class LoanProposalController
{
    public function __construct(
        private readonly CalculateFeeHandler $calculateFeeHandler
    ) {
    }

    //Its example endpoint
    public function calculateFee(int $term, float $amount): float
    {
        try {
            return $this->commandBus(new CalculateFeeCommand($term, $amount));
        } catch (InvalidArgumentException $e) {
            //Here we can throw 409 or 400 or any other HTTP response
        }

        throw new Exception('Something went wrong');
    }

    // in normal app it would be an real command bus, but you know its just interview :)
    // Yeah and it could be some interface or smth :P
    private function commandBus(CalculateFeeCommand $command): float
    {
        return $this->calculateFeeHandler->handle($command);
    }
}
