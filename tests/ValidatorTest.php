<?php

declare(strict_types=1);

namespace App\RequestValidator\Tests;

use PHPUnit\Framework\TestCase;
use App\RequestValidator\Validator;

class ValidatorTest extends TestCase
{

    /** @var Validator */
    protected $validator;

    protected function setUp(): void
    {
        $this->validator = new Validator;
    }

    public function testPasses()
    {

        $this->validator->request([
            'first_name' => 'Rifatul',
            'last_name' => 'Islam',
            'email' => 'rifatcse09@gmail.com',
        ]);
        
        //Bulk Input
        $this->validator->rules([
            'first_name' => 'required|min:3|max:60',
            'last_name' => ['required', 'min:3', 'max:60'],
        ]);

        // Signle Input 
        $this->validator->rule('email', 'required|email')->validate();

        $this->assertTrue($this->validator->passed());
    }


    public function testFail()
    {

        $this->validator->request([
            'name' => '',
            'email' => 'rifatcse09',
        ]);

        $rules = [
            'email' => ['required', 'email'],
        ];

        $this->validator->rules($rules);

        $this->validator->validate();

        $this->assertTrue($this->validator->fails());
    }
}