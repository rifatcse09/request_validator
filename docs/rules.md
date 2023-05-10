## Rules list
- [Rules list](#rules-list)
  - [Boolean](#boolean)
  - [Email](#email)
  - [Max](#max)
  - [Min](#min)
  - [Numeric](#numeric)
  - [Required](#required)


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
Matches email address
```php
'email' => 'email' // in rules

'email' => 'test@email.com'      //true
'email' => 'test-failed @su.re'  //false


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
``