<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function is_numeric;
use function mb_strlen;

class Max extends Rule
{
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        $length = is_numeric($fieldValue) ? (int) $fieldValue : mb_strlen((string) $fieldValue);

        if ($length > $params[0]) {
            $this->message = "The {$fieldName} field may not be greater than {$params[0]}  characters.";
            return false;
        }

        return true;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
