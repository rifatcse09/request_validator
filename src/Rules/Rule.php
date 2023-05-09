<?php

declare(strict_types=1);

namespace App\RequestValidator\Rules;

abstract class Rule
{
   /** @var string */
    protected $message = "The :attribute is invalid";

    abstract public function validate(string $fieldName, mixed $fieldValue, array $params) : bool;

    abstract public function getMessage() : string;
}
