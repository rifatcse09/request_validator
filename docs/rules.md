## Rules list
- [Rules list](#rules-list)
  - [Boolean](#boolean)
  - [Email](#email)
  - [Digit](#digit)
  - [Integer](#integer)
  - [Email](#email-1)
  - [In](#in)
  - [Max](#max)
  - [Min](#min)
  - [Numeric](#numeric)
  - [Required](#required)
  - [Lowercase](#lowercase)
  - [Uppercase](#uppercase)
  - [Accepted](#accepted)


<a name="boolean"></a>
### Boolean
Applies only true or false values
```php
'randNum' => 'boolean' // in rules

'randNum' => 'true'  //true
'randNum' => 'false' //true
'randNum' => '123'   //false
```

<a name="email"></a>
### Email
Email format check
```php
'randNum' => 'email' // in rules

'randNum' => 'rifatcse09@gmail.com'  //true
'randNum' => 'rifatcse0 @gmail.com'  //false
'randNum' => 'false' //false
'randNum' => '123'   //false
```

<a name="digit"></a>
### Digit
Number in 0-9 and limit
```php
'randNum' => 'digit:6' // in rules

'randNum' => '123456'  //true
'randNum' => '12345'  //false
'randNum' => '123.45' //false
'randNum' => '123OMG'   //false
```

<a name="integer"></a>
### Integer
Check for numbers without any decimal or fractional parts.
```php
'age' => 'integer' // in rules

'randNum' => '18'  //true
'randNum' => '-18'  //true
'randNum' => '18.6'  //false
'randNum' => 'false' //false
'randNum' => 'text'   //false
```

<a name="email"></a>
### Email
Matches email address
```php
'email' => 'email' // in rules

'email' => 'test@email.com'      //true
'email' => 'test-failed @su.re'  //false
```

<a name="in"></a>
### In
Checks if value exists in array
```php
'shop' => 'in:Metro, ATB, Silpo'  // in rules

'shop' => 'Metro'     //true
'shop' => 'McDonalds' //false
```

<a name="max"></a>
### Max
Checking for string length or value of number less than param
```php
'str' => 'max:5'         // string length
'num' => 'max:5|numeric' // for numeric values

'str' => 'hello'  //true
'str' => 'world!' //false

'num' => '3'      //true
'num' => '-100'   //true
'num' => '7'      //false
```


<a name="min"></a>
### Min
Checking for string length or value of number less than param
```php
'str' => 'min:2'         // string length
'num' => 'min:2|numeric' // for numeric values

'str' => 'hello'  //true
'str' => 'w'      //false

'num' => '2'      //true
'num' => '-100'   //false
'num' => '7'      //true
```


<a name="numeric"></a>
### Numeric
Checks if value is number
```php
'age' => 'numeric'  // in rules

'age' => '100'    //true
'age' => '100kb'  //false
```


<a name="required"></a>
### Required
Checks for field is required and not empty
```php
'value' => 'required'  // in rules

'value' => 'yep' //true
'value' => ' '   //false
'value' => ''    //false
```

<a name="lowercase"></a>
### Lowercase
Checks string lowercase
```php
'value' => 'lowercase'  // in rules

'value' => 'yep'   //true
'value' => '123'   //true
'value' => '123r' //true
'value' => '123R' //false
'value' => 'Rifat' //false
'value' => 'rIfat' //false

```
<a name="uppercase"></a>
### Uppercase
Checks string uppercase
```php
'value' => 'uppercase'  // in rules

'value' => 'RIFAT'   //true
'value' => '123'   //true
'value' => '123R' //false
'value' => '123r' //false
'value' => 'Rifat' //false
'value' => 'rIfat' //false


```
<a name="accepted"></a>
### Accepted
Checks string accepted
```php
'value' => 'accepted'  // in rules

'value' => 'yes'   //true
'value' => '1'   //true
'value' => 1    //true
'value' => 'on' //true
'value' => 'true' //true
'value' => true  //true
'value' => 'test'  //false
'value' => '123'  //false

```

```
<a name="regex"></a>
### Regex
Checks string accepted
```php
'value' => 'regex:/^[0-9\-]+$/'  // in rules

'value' => '123'   //true
'value' => '0-9'   //true
'value' => '42-567'    //true
'value' => '-789' //true
'value' => 'abc' //false
'value' => '-456-'  //false
'value' => '123-'  //false
'value' => '12a34'  //false
'value' => '+8801867254624'  //false

```