<?php

declare(strict_types = 1);

namespace PragmaGoTech\Interview\Service;

use PragmaGoTech\Interview\Model\LoanProposal;

class TwentyFourMonthLoanFeeCalculator extends AbstractLoanFeeCalculator
{
    private const FILENAME = 'config/twenty_four_months_breakpoints.csv';

    public function __construct()
    {
        parent::__construct(self::FILENAME);
    }
}
