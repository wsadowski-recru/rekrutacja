<?php

declare(strict_types=1);

namespace Validator;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Validator\LoanProposalValidator;

class LoanProposalValidatorTest extends TestCase
{
    private LoanProposalValidator $validator;

    public function setUp(): void
    {
        $this->validator = new LoanProposalValidator();
    }

    public function testWhenTermIsLowerThan12Months(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->validator->validate(10, 2000);
    }

    public function testWhenTermIsBiggerThan24Months(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->validator->validate(26, 15000);
    }

    public function testWhenAmountIsBiggerThan20000(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->validator->validate(12, 20001);
    }

    public function testWhenAmountIsSmallerThan1000(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->validator->validate(12, 999.99);
    }
}
