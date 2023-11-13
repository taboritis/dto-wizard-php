# DTO Wizard

<!-- TOC -->
* [DTO Wizard](#dto-wizard)
  * [What problem does it solve?](#what-problem-does-it-solve)
  * [Basic usage](#basic-usage)
    * [Readonly properties](#readonly-properties)
    * [Private properties](#private-properties)
    * [Default values](#default-values)
  * [Casting values by examples](#casting-values-by-examples)
    * [Boolean](#boolean)
    * [Strings](#strings)
    * [Numbers](#numbers)
    * [Arrays](#arrays)
    * [DateTime](#datetime)
    * [Objects](#objects)
    * [Collections](#collections)
<!-- TOC -->

## What problem does it solve?
Sometimes, it may be necessary to convert a complex, multi-layered array into an object-oriented format that preserves the original structure.

To achieve this result, DTO-Wizard provides a straightforward API that eliminates the need for repetitive iterations and transformations.

## Basic usage

```php
class User
{
    public string $name;
    public int $age;
    public int $score;
}

$rawData = ['name'=> 'John', 'age'=> 25];

$user = \Taboritis\DTO\Factory::create(User::class, $rawData);

$user->name     // John
$user->age      // 25
$user->score    // Error - property must be initialized
```

### Readonly properties
It is recommended to use readonly properties as often as possible. This will have the same effect as unchanged data.
```php
class User
{
    public readonly string $name;
}

$user = User::create(['name'=>'John']);
$user->name = 'Mary'; // Error: Cannot initialize readonly property 
```

### Private properties
Although it is not recommended, it is possible to set private object properties using a factory. 
However, it is important to remember that in such cases, you must also create a getter that allows access to the given property.
Of course, in this scenario, you can take advantage of the getter's advantages, such as the ability to handle unset or nullable properties.

```php
class User
{
    private readonly string $name;
    
    public function getName(): string
    {
        return $this->name ?? 'default';
    }
}

$user = User::create(['name'=>'John'])
$user->name = 'Mary'; // Error: Cannot initialize readonly property 
```


### Default values
Default properties can be set in 3 ways:
- in the property itself (warning: readonly properties cannot have default value)
- in the constructor
- in the getter.

It's entirely up to you to decide whether and how to utilize this feature.

## Casting values by examples
In simple cases, PHP's type juggling mechanism casts assigned property values to the necessary type.
https://www.php.net/manual/en/language.types.type-juggling.php

```php
class User
{
    public readonly int $age;
}

$user = User::create(['age' => '23']);  // '23' (string)
$user->age                              // 23 (integer)
```

### Boolean

```php
class User
{
    public readonly bool $active;
}

$user = \Taboritis\DTO\Factory::create(User::class, ['active' => 0]);
$user->active // false (boolean)
```

### Strings
```php
class User
{
    public readonly bool $active;
}

$user = \Taboritis\DTO\Factory::create(User::class, ['name' => 11]);
$user->name // '11' (string)
```


### Numbers
```php
class User
{
    public readonly int $age;
}

$user = \Taboritis\DTO\Factory::create(User::class, ['age' => '25.7']);
$user->age // 25 (int, but with warning about deprecation)
```

### Arrays
// TODO

### DateTime
```php
class User
{
    public readonly DateTimeImmutable $verifiedAt;
}

$user = \Taboritis\DTO\Factory::create(User::class, ['verifiedAt'=> '2020-10-10 00:00:00']);
$user->verifiedAt // instance of DateTimeImmutable
```
### Objects
```php
class Address
{
    public readonly string $street;
    public readonly string $number;
}

class User
{
    public readonly Address $address;
}

$user = \Taboritis\DTO\Factory::create(User::class, [
    'name' => 'Hudson (landlady)',
    'title' => 'Mrs.'
    'address' => [
        'street' => 'Baker Street',
        'number' => '221B'
    ]
]);

$user->address // instance of Department
$user->address->street // Baker Street 
```
### Collections
// TODO: must implement Traversable 
