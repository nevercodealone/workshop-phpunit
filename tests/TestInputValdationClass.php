<?php

class TestInputValdationClass extends \PHPUnit\Framework\TestCase
{
    private \App\InputValidationClass $inputValidationClass;

    public function setUp(): void
    {
        $this->inputValidationClass = new \App\InputValidationClass(new \App\ExternalSpamDetection());
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

    /**
     * @testdox Mock spam detection to false on xxx mail
     */
    public function testSpamEmailMocked() {
        $externalSpamProtectionMock = $this->createMock(\App\ExternalSpamDetection::class);
        $externalSpamProtectionMock->expects($this->once())
            ->method('isSpam')
            ->willReturn(false);

        $inputValidationClass = new \App\InputValidationClass($externalSpamProtectionMock);
        $this->assertFalse($inputValidationClass->isValidEmail('spam@xxx.com'));
    }

    public function emailInputProvider(): array
    {
        return [
            'rolands address' => ['roland@nevercodealone.de', true],
            'office ' => ['office@nevercodealone.de', true],
            'just a string' => ['isnotvalid', false]
        ];
    }

}
