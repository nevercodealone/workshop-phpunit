<?php

class TestInputValdationClass extends \PHPUnit\Framework\TestCase
{
    public function testReturnTrueReturnTrue() {
        $inputValidationClass = new \App\InputValidationClass();
        $this->assertTrue($inputValidationClass->returnTrue());
    }
}
