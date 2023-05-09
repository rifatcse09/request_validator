<?php
//require_once 'Index.php';

require_once(__DIR__ . "/vendor/autoload.php");

use App\RequestValidator\Validator;

$validator = new Validator();
$validator->request([
'name'=>'',
'email'=>'','type'=>'11', 
'money' => '2111a', 
'zip_code' => '12q456',
'terms' => '1212', 
'age' => '12',
'phone_number' => '01867s',
'gender' => 'f',
'username' => 'RR',
'password' => 'qw',
]);

$rules = [
'name' => 'required|min:3',
//'name' => ['required', 'min:3'],
'email' => ['required', 'email'],
'type' => ['required', 'boolean'],
'money' => ['required', 'numeric'],
'zip_code' => ['required','digits:6'],
'terms' => 'accepted',
'age' => 'min:18|integer',
'phone_number' => 'regex:/^[0-9\-]+$/',
'gender' => 'required|in:male,female',
'username' => 'required|lowercase',
'password' => 'required|uppercase',
];

//  $validator->request([
//             'email'=>'rifatcse09@gmail.com',
//         ]);

//         $rules = [
//             'email' => ['required', 'email'],
//         ];
$validator->rules($rules);
// $validator->rule('name', 'required|min:3');
$validator->validate();
echo '<pre>';
//print_r($validator->errors('email'));
echo '<pre>';
//echo $validator->errorFirst();
//print_r($validator->errorFirst());

foreach ($validator->errors() as $error) {
print_r($error).'<br>';
}

//echo $validator->passed();
if ($validator->passed()) {
// do something
//echo 'sdfomne';
}
///print_r($result);

    // 'messages' => [
    //     'required' => 'The :attribute field is required.',
    //     'email' => 'The :attribute field must be a valid email address.',
    //     'min' => 'The :attribute field must be at least :min characters.',
    //     'max' => 'The :attribute field may not be greater than :max characters.',
    // ],

