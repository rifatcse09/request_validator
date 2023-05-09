<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function in_array;

class Boolean extends Rule
{
    /**
     * validate the value is valid
     */
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        if (! in_array($fieldValue, [\true, \false, "true", "false", 1, 0, "0", "1", "y", "n"], \true)) {
             $this->message = "The {$fieldName} must be a boolean";
             return false;
        }

        return true;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
