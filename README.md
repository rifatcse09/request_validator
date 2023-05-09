# PHP Request Validator

Make your apps validation easily (inspired by Laravel Validation)

---

Page Index:
- [PHP Request Validator](#php-request-validator)
  - [Quick start :rocket:](#quick-start-rocket)
  - [License](#license)

Suggested Links:
- [Installation](/docs/installation.md)
- [Feature Guide](/docs/feature-guide.md)
- Rules
    - [Existing Rules](/docs/rules.md)
    - [Data Provider](/docs/rules-database.md)
    - [Customization](/docs/rules-customization.md)
    - [Formatting Message](/docs/formatting-message.md)
- [Integrations](/docs/integrations.md)

----

<a name="quick-start"></a>
## Quick start :rocket:
```php
<?php

$rules = [
    # firstname must exists
    # atleast 2 characters
    'firstname' => 'required|min:2|max:18',
    # can input as array 
    'firstname' => ['required', 'min:2', 'max:18'],

    # must be an email format
    # must be unique under 'users' table
    'email'               => 'email',

    # must be numeric
    'id'                  => 'numeric',
    'age'                 => 'integer',
    
    'phone_number' => 'regex:/^[0-9\-]+$/',

    'gender' => 'required|in:male,female',

    'username' => 'required|lowercase',

    'password' => 'required|uppercase'

];


<a name="testing"></a>
## Testing

The testing suite can be run on your own machine. The main dependency is [PHPUnit](https://github.com/sebastianbergmann/phpunit) which can be installed using [Composer](http://getcomposer.org):

```sh
# run this command from project root
$ composer install --dev --prefer-source
```

Once the database is created, run the tests on a terminal:

```sh
vendor/bin/phpunit --configuration phpunit.xml --coverage-text
```

For additional information see [PHPUnit The Command-Line Test Runner](http://phpunit.de/manual/current/en/textui.html).

<a name="license"></a>
## License

PHP Request Validator is open-sourced software licensed under the [MIT](LICENSE).