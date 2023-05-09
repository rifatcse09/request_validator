<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function filter_var;

use const FILTER_VALIDATE_INT;

class Integer extends Rule
{
    /**
     * Check the $value is valid
     */
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        $this->message = "The {$fieldName} must be integer";
        return filter_var($fieldValue, FILTER_VALIDATE_INT) !== false;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
