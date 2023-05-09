<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function filter_var;

use const FILTER_VALIDATE_EMAIL;

class Email extends Rule
{
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        if (filter_var($fieldValue, FILTER_VALIDATE_EMAIL) === false) {
            $this->message = "The {$fieldName} must be a valid email address.";
            return false;
        }

        return true;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
