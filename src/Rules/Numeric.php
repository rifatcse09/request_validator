<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function is_numeric;

class Numeric extends Rule
{
    /**
     * Check the $value is valid
     *
     * @param mixed $value
     */
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        if (! is_numeric($fieldValue)) {
            $this->message = "The {$fieldName} must be numeric";
            return false;
        }
        return true;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
