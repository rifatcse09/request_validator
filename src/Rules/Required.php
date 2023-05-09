<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

class Required extends Rule
{
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        if (! isset($fieldValue) || $fieldValue === '') {
            $this->message = "The {$fieldName} is required";
            return false;
        }

        return true;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
