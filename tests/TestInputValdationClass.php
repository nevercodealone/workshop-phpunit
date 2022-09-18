<?php

class TestInputValdationClass extends \PHPUnit\Framework\TestCase
{
    private \App\InputValidationClass $inputValidationClass;

    public function setUp(): void
    {
        $inputValidationClass = new \App\InputValidationClass();
    }

    /**
     * @testdox Let the return true method run without any mocking
     */
    public function testReturnTrueReturnTrue() {
        $this->assertTrue($this->inputValidationClass->returnTrue(), 'The method only can return true');
    }
}
