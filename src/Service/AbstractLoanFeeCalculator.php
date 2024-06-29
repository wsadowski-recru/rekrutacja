<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use PragmaGoTech\Interview\FeeCalculator;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Utils\CsvParser;

abstract class AbstractLoanFeeCalculator implements FeeCalculator
{
    protected string $fileName;
    protected array $breakPoints;

    public function __construct(string $fileName)
    {
        $this->breakPoints = CsvParser::parseCsv($fileName);
    }

    public function calculate(LoanProposal $application): float
    {
        $amount = $application->amount();
        $keys = array_keys($this->breakPoints);
        $values = array_values($this->breakPoints);

        for ($i = 0; $i < count($keys) - 1; $i++) {
            if ($amount >= $keys[$i] && $amount <= $keys[$i + 1]) {
                $x0 = $keys[$i];
                $x1 = $keys[$i + 1];
                $y0 = $values[$i];
                $y1 = $values[$i + 1];

                $fee = $y0 + (($amount - $x0) / ($x1 - $x0)) * ($y1 - $y0);
                $fee = ceil($fee * 100) / 100;
                $totalAmount = $amount + $fee;

                $roundedTotalAmount = ceil($totalAmount / 5) * 5;
                $finalFee = $roundedTotalAmount - $amount;

                return round($finalFee, 2);
            }
        }

        return 0;
    }
}
