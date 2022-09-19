<?php
declare(strict_types=1);

namespace App;

final class InputValidationClass
{
    public function returnTrue(): bool
    {
        return true;
    }

    public function isValidEmail(string $email): bool
    {
        if($this->filterEmail($email) === false) {
            return false;
        }

        return true;
    }

    private function filterEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) == $email;
    }
}
