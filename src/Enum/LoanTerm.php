<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Enum;

enum LoanTerm: int
{
    case TWELVE_MONTHS = 12;
    case TWENTY_FOUR_MONTHS = 24;
}
