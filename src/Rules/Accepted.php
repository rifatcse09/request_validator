<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

use function in_array;

class Accepted extends Rule
{
     /**
      * validate the value is accepted
      */
    public function validate(string $fieldName, mixed $fieldValue, array $params) : bool
    {
        $acceptables = ['yes', 'on', '1', 1, true, 'true'];
        if (! in_array($fieldValue, $acceptables, true)) {
            $this->message = "The {$fieldName} must be a accepted";
            return false;
        }
        return true;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
