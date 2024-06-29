<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Enum;

enum LoanAmount: int
{
    case MIN_AMOUNT = 1000;
    case MAX_AMOUNT = 20000;
}
