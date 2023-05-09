<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function preg_match;

class Regex extends Rule
{
    /**
     * Check the $value is valid
     */
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        $regex         = $params[0];
        $this->message = "The {$fieldName} is not valid format";
        return preg_match($regex, $fieldValue) > 0;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
