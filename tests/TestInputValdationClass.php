<?php

class TestInputValdationClass extends \PHPUnit\Framework\TestCase
{
    /**
     * @testdox Valid email address will be true and invalid false
     * @dataProvider emailInputProvider
     */
    public function testValidEmail(string $email, bool $expected) {
        $externalSpamProtectionMock = $this->createMock(\App\ExternalSpamDetection::class);
        $externalSpamProtectionMock
            ->method('isSpam')
            ->willReturnMap(
                [
                    ['spam@xxx.com', true],
                    ['roland@nevercodealone.de', false],
                    ['fake@xxx.com', false]
                ]
            );

        $inputValidationClass = new \App\InputValidationClass($externalSpamProtectionMock);
        $this->assertSame($expected, $inputValidationClass->isValidEmail($email), 'Email: ' . $email);
    }

    public function emailInputProvider(): array
    {
        return [
            'valid address' => ['roland@nevercodealone.de', true],
            'just a string' => ['isnotvalid', false],
            'spam' => ['spam@xxx.com', false],
            'fake spam' => ['fake@xxx.com', true]
        ];
    }

}
