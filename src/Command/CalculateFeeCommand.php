<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Command;

class CalculateFeeCommand
{
    public function __construct(
        private readonly int $term,
        private readonly float $amount
    ) {
    }

    public function getTerm(): int
    {
        return $this->term;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}
