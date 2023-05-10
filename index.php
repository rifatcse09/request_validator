<?php

declare(strict_types=1);

require_once(__DIR__ . "/vendor/autoload.php");

use App\RequestValidator\Validator;

$validator = new Validator;
$validator->request([
    //'name'=>'',
    'email'=>'',
    'type'=>'11', 
    'money' => '2111a', 
    'zip_code' => '12q456',
    'terms' => 'on', 
    'age' => '-12',
    'phone_number' => '+8801867254624',
    'gender' => 'f',
    'username' => 'Rifat',
    'password' => '123',
]);

$rules = [
    'name' => 'required|min:3',
    'email' => ['required', 'email'],
    'type' => ['required', 'boolean'],
    'money' => ['required', 'numeric'],
    'zip_code' => ['required','digits:6'],
    'terms' => 'accepted',
    'age' => 'integer',
    'phone_number' => 'regex:/^[0-9\-]+$/',
    'gender' => 'required|in:male,female',
    'username' => 'required|lowercase',
    'password' => 'required|uppercase',
];

$validator->rules($rules);
$validator->rule('name', 'required|min:3');
$validator->validate();
if ($validator->fails()) {
    // handling errors
    $errors = $validator->errors();
    echo "<pre>";
   // print_r($validator->errorFirst());
    echo "</pre>";
   // echo $validator->errorFirst('email');
    echo "</pre>";
    foreach ($validator->errors() as $error) {
        print_r($error);
    }
    foreach ($validator->error('email') as $error) {
        echo $error . "\n";
    }
    exit;
} else {
    // validation passes
    echo "Success!";
}
