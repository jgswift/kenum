kenum
====
PHP 5.5+ enumerator pattern implementation 

[![Build Status](https://travis-ci.org/jgswift/kenum.png?branch=master)](https://travis-ci.org/jgswift/kenum)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jgswift/kenum/badges/quality-score.png?s=642a4d807e7f71d0ac6b9781d40b8bf47a8a547e)](https://scrutinizer-ci.com/g/jgswift/kenum/)
[![Latest Stable Version](https://poser.pugx.org/jgswift/kfiltr/v/stable.svg)](https://packagist.org/packages/jgswift/kfiltr)
[![License](https://poser.pugx.org/jgswift/kfiltr/license.svg)](https://packagist.org/packages/jgswift/kfiltr)
[![Coverage Status](https://coveralls.io/repos/jgswift/kfiltr/badge.png?branch=master)](https://coveralls.io/r/jgswift/kfiltr?branch=master)

## Description

Kenum is a simple component to provide enum behavior using constants.  
Both conventional enums and bitwise enums are included in this package.

## Installation

Install via cli using [composer](https://getcomposer.org/):
```sh
php composer.phar require jgswift/kenum:0.1.*
```

Install via composer.json using [composer](https://getcomposer.org/):
```json
{
    "require": {
        "jgswift/kenum": "0.1.*"
    }
}
```

## Dependency

* php 5.5+

## Usage

### Default Base

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

### Bitwise

The bitwise implementation that uses bitwise flags as values.
Bitwise flags can be combined and allow multiple flags to be set at once
Constants *must* be numbers in multiples of 2.  An example set would be 1, 2, 4, 8, 16, 32, etc..

```php
<?php
class MyEnum extends kenum\Enum\Bitwise {
    const Option1 = 1;
    const Option2 = 2;
    const Option3 = 4;

    /* etc... */
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

#### Constant Scalar Expressions

Since php 5.6 it is possible to use expressions to define constants which conceptually simplifies them and removes the need to manually hard-code every value.

```php
class MyEnum extends kenum\Enum\Bitwise {
    const Option1 = 1;
    const Option2 = self::Option1 * 2; // 2
    const Option3 = self::Option2 * 2; // 4
    const Option4 = self::Option4 * 2; // 8
    /* etc... */
}
```

### Custom Enum

Implementing a custom enum using this pattern is relatively simple with the enum trait

```php
class MyEnum {
    use kenum\Enum;

    function __construct($value) {
        /* store value(s) */
    }

    // custom equality check
    function equals($value) {
        /* check for equality */
    }

    function __toString() {
        /* transform enum value(s) into human-readable text */
    }
}
```