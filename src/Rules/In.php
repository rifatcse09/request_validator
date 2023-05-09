<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function implode;
use function in_array;

class In extends Rule
{
    /**
     * Check $value is existed
     */
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        $allowedValues = implode(',', $params);
        $this->message = "The {$fieldName} only allows {$allowedValues}";
        return in_array($fieldValue, $params, true);
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
