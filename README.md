kenum
====
PHP 5.5+ enumerator pattern implementation

[![Build Status](https://travis-ci.org/jgswift/kenum.png?branch=master)](https://travis-ci.org/jgswift/kenum)

## Installation

Install via [composer](https://getcomposer.org/):
```sh
php composer.phar require jgswift/kenum:dev-master
```

## Usage

Kenum is a simple component to provide enum behavior, both regular enums and bitwise enums are included in this package.

The following is a base Kenum minimal example
```php
<?php
class MyEnum extends kenum\Enum\Base {
    const Option1 = 'Option1';
    const Option2 = 'Option2';
}

$enum = new MyEnum(MyEnum::Option2);

// get current enum value with the value method or through string conversion
$value = $enum->value()  // Returns 'Option1'
$string = (string)$enum; // Returns 'Option1'

// check for equality
$equals = $enum->equals(MyEnum::Option2); // returns true
$equals = $enum->equals(new MyEnum(MyEnum::Option1)); // returns false
```

Kenum also provides an enum implementation that uses bitwise flags, therefore allowing the enum to have multiple values at once
Bitwise constants must be numbers in multiples of 2, example below..
```php
<?php
class MyEnum extends kenum\Enum\Bitwise {
    const Option1 = 0x01;
    const Option2 = 0x02;
    const Option3 = 0x04;
}

$enum = new MyEnum(MyEnum::Option2 | MyEnum::Option3);

// get current enum value with the value method or through string conversion
var_dump($enum->value());  // Returns '6'
var_dump((string)$enum); // Returns 'Option2 Option3'

// check for equality
var_dump($enum->equals(MyEnum::Option2)); // returns false
var_dump($enum->equals(MyEnum::Option2 | MyEnum::Option3)); // returns true

// check for flag
var_dump($enum->hasFlag(MyEnum::Option2)); // returns true
var_dump($enum->hasFlag(MyEnum::Option1)); // returns false
```