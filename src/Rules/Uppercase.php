<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function mb_detect_encoding;
use function mb_strtoupper;

class Uppercase extends Rule
{
    /**
     * Check the $value is valid
     *
     * @param mixed $value
     */
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        $this->message = "The {$fieldName} must be uppercase";
        return mb_strtoupper($fieldValue, mb_detect_encoding($fieldValue)) === $fieldValue;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
