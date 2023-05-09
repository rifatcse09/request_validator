<?php

declare(strict_types=1);

namespace App\RequestValidator;

use function explode;
use function is_array;
use function is_string;
use function strpos;

class Validator
{
    private array $inputs;
    private array $rules;
    private array $errors = [];
    private $rulesFactory;

    /**
     * Constructor
     */
    public function __construct(array $config = [])
    {
        // initialization
        $this->rulesFactory = new RulesFactory();
    }

    /**
     * Validate $inputs
     *
     * @return $this
     */
    public function request(array $inputs) : self
    {
        $this->inputs = $inputs;

        return $this;
    }

    /**
     * Single rule inputs
     *
     * @param array|string $rule
     * @return $this
     */
    public function rule(string $name, array|string $rule) : self
    {
        $this->rules[$name] = $rule;

        return $this;
    }

    /**
     * Bulk rules $inputs
     *
     * @return $this
     */
    public function rules(array $rules) : self
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * Run validation
     *
     * @return $this
     */
    public function validate() : self
    {
        foreach ($this->rules as $name => $rules) {
            $inputValue = $this->inputs[$name] ?? null;
            if (! is_array($rules) && is_string($rules)) {
                $rules = $this->formatRule($rules);
            }
            foreach ($rules as $rule) {
                $this->validateRule($name, $inputValue, $rule);
            }
        }

        return $this;
    }

    /**
     * Format the rules which contain | sign
     *
     * @return $this
     */
    private function formatRule(string $rules) : array
    {
        if (strpos($rules, "|") !== false) {
            return explode('|', $rules);
        }

        return [$rules];
    }

    /**
     * Parse the rules
     *
     * @return $this
     */
    private function parseRule(string $rule) : array
    {
        $parameters = [];

        if (strpos($rule, ':') !== false) {
            [$rule, $parameterString] = explode(':', $rule, 2);

            $parameters = explode(',', $parameterString);
        }
        return [$rule, $parameters];
    }

    /**
     * Validate the rules form factory of rules
     */
    private function validateRule(string $name, mixed $value, string $rule) : void
    {
        [$ruleName, $parameters] = $this->parseRule($rule);

        $ruleInstance = $this->rulesFactory->getValidator($ruleName);
        if (! $ruleInstance) {
            throw new RuntimeException("Unknown rule '{$ruleName}'");
        }
        $isValid = $ruleInstance->validate($name, $value, $parameters);
        if (! $isValid) {
            $this->errors[$name][] = $ruleInstance->getMessage();
        }
    }

    /**
     * Validation status of fails
     */
    public function fails() : bool
    {
        return ! empty($this->errors);
    }

    /**
     * Validation status of passed
     */
    public function passed() : bool
    {
        return empty($this->errors);
    }

    /**
     * Validation errors
     */
    public function errors() : array
    {
        return $this->errors;
    }

    /**
     * Validation erorr of specific attribute
     */
    public function error(string $name) : array
    {
        return $this->errors[$name] ?? [];
    }

    /**
     * Validation erorr first
     */
    public function errorFirst(?string $name = null) : ?string
    {
        if ($name === null) {
            foreach ($this->errors as $errors) {
                if (! empty($errors)) {
                    return $errors[0];
                }
            }

            return null;
        }

        $errors = $this->error($name);

        if (empty($errors)) {
            return null;
        }

        return $errors[0];
    }
}
