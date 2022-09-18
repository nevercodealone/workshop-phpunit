<?php

class TestInputValdationClass extends \PHPUnit\Framework\TestCase
{
    private \App\InputValidationClass $inputValidationClass;

    public function setUp(): void
    {
        $this->inputValidationClass = new \App\InputValidationClass();
    }

    /**
     * @testdox Let the return true method run without any mocking
     */
    public function testReturnTrueReturnTrue() {
        $this->assertTrue($this->inputValidationClass->returnTrue(), 'The method only can return true');
    }

    /**
     * @testdox Valid email address will be true and invalid false
     * @dataProvider emailInputProvider
     */
    public function testValidEmail(string $email, bool $expected) {
        $this->assertSame($this->inputValidationClass->isValidEmail($email), $expected);
    }

    public function emailInputProvider(): array
    {
        return [
            ['roland@nevercodealone.de', true],
            ['office@nevercodealone.de', true],
            ['isnotvalid', false]
        ];
    }

}
