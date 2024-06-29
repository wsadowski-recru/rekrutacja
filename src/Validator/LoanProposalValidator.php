<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Validator;

use InvalidArgumentException;
use PragmaGoTech\Interview\Enum\LoanAmount;
use PragmaGoTech\Interview\Enum\LoanTerm;

class LoanProposalValidator
{
    public function validate(int $term, float $amount): bool
    {
        if ($amount < LoanAmount::MIN_AMOUNT->value || $amount > LoanAmount::MAX_AMOUNT->value) {
            throw new InvalidArgumentException('Loan amount must be between 1000 and 20000 PLN.');
        }

        if ($term < LoanTerm::TWELVE_MONTHS->value || $term > LoanTerm::TWENTY_FOUR_MONTHS->value) {
            throw new InvalidArgumentException('Loan term must be 12 or 24 months only.');
        }

        return true;
    }
}
