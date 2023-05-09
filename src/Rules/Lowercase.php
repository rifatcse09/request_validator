<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function mb_detect_encoding;
use function mb_strtolower;

class Lowercase extends Rule
{
    /**
     * Check the $value is valid
     */
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        $this->message = "The {$fieldName} must be lowercase";
        return mb_strtolower($fieldValue, mb_detect_encoding($fieldValue)) === $fieldValue;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
