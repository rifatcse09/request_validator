# PHP Request Validator

Make your apps validation easily (inspired by Laravel Validation)

---

Page Index:
- [PHP Request Validator](#php-request-validator)
  - [Requirements](#requirements)
      - [Installation](#installation)
  - [Quick start :rocket:](#quick-start-rocket)
  - [Testing](#testing)
- [run this command from project root](#run-this-command-from-project-root)
  - [License](#license)

Suggested Links:
- Rules
    - [Existing Rules](/docs/rules.md)
----
## Requirements

* PHP 8.0 or higher
* Composer for installation


#### Installation

```
composer require "rifatcse09/request_validator"
```

<a name="quick-start"></a>
## Quick start :rocket:
```php
<?php

require('vendor/autoload.php');

use App\RequestValidator\Validator;

$validator = new Validator;

$validator->request([
    'email'=>'test @gmal',
    'type'=>'11', 
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

// Bulk way 
$validator->rules($rules);

// Singal way
$validator->rule('name', 'required|min:3');

// then validate
$validation->validate();

if ($validation->fails()) {
    // handling errors
    $errors = $validation->errors();
    echo "<pre>";
    print_r($errors->firstOfAll());
    echo "</pre>";
    exit;
} else {
    // validation passes
    echo "Success!";
}

```

<a name="testing"></a>
## Testing

The testing suite can be run on your own machine. The main dependency is [PHPUnit](https://github.com/sebastianbergmann/phpunit) which can be installed using [Composer](http://getcomposer.org):

```sh
# run this command from project root
$ composer install --dev --prefer-source
$ vendor/bin/phpunit --configuration phpunit.xml --coverage-text
```or additional information see [PHPUnit The Command-Line Test Runner](http://phpunit.de/manual/current/en/textui.html).

<a name="license"></a>
## License

PHP Request Validator is open-sourced software licensed under the [MIT](LICENSE).