<?php

declare(strict_types=1);

namespace App\RequestValidator;

use App\RequestValidator\Rules\Rule;

class RulesFactory
{
    /** @var array */
    protected $validators = [];

    /**
     * Constructor
     *
     * @param array $messages
     */
    public function __construct()
    {
        $this->registerBaseValidators();
    }

    /**
     * Register  existing validator
     *
     * @param mixed                           $key
     * @param App\RequestValidator\Rules\Rule $rule
     */
    public function setValidator(string $key, Rule $rule)
    {
        $this->validators[$key] = $rule;
    }

    /**
     * Get validator object from given $key
     *
     * @param mixed $key
     * @return mixed
     */
    public function getValidator($key)
    {
        return $this->validators[$key] ?? null;
    }

    /**
     * Initialize base validators array
     */
    protected function registerBaseValidators()
    {
        $baseValidator = [
            'required'  => new Rules\Required(),
            'email'     => new Rules\Email(),
            'numeric'   => new Rules\Numeric(),
            'in'        => new Rules\In(),
            'min'       => new Rules\Min(),
            'max'       => new Rules\Max(),
            'integer'   => new Rules\Integer(),
            'boolean'   => new Rules\Boolean(),
            'regex'     => new Rules\Regex(),
            'accepted'  => new Rules\Accepted(),
            'lowercase' => new Rules\Lowercase(),
            'uppercase' => new Rules\Uppercase(),
            'digits'    => new Rules\Digits(),
        ];

        foreach ($baseValidator as $key => $validator) {
            $this->setValidator($key, $validator);
        }
    }
}
