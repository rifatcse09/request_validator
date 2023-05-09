<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function preg_match;
use function strlen;

class Digits extends Rule
{
    /**
     * Check the $value is valid
     *
     * @param mixed $value
     */
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        $length        = (int) $params[0];
        $this->message = "The {$fieldName} must be numeric and must have an exact length of {$length}";
        return ! preg_match('/[^0-9]/', $fieldValue)
                    && strlen((string) $fieldValue) === $length;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
