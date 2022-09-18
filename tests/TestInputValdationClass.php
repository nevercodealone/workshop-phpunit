<?php

class TestInputValdationClass extends \PHPUnit\Framework\TestCase
{
    /**
     * @testdox Let the return true method run without any mocking
     */
    public function testReturnTrueReturnTrue() {
        $inputValidationClass = new \App\InputValidationClass();
        $this->assertTrue($inputValidationClass->returnTrue(), 'The method only can return true');
    }
}
