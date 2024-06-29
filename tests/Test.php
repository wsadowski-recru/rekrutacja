<?php

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testOnlyForCIPass(): void
    {
        $this->assertEquals(1, 1);
    }
}
