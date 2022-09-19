<?php
declare(strict_types=1);

namespace App;

class ExternalSpamDetection
{
    public function isSpam(string $email): bool
    {
        return str_contains($email, 'xxx') === false;
    }
}
