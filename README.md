# CakePHP Localized plugin
[![Build Status](https://secure.travis-ci.org/cakephp/localized.svg?branch=master)](http://travis-ci.org/cakephp/localized)
[![License](https://poser.pugx.org/cakephp/localized/license.svg)](https://packagist.org/packages/cakephp/localized)
[![Total Downloads](https://poser.pugx.org/cakephp/localized/d/total.svg)](https://packagist.org/packages/cakephp/localized)

This plugin contains various localized validation classes for specific countries.

## Requirements

The master branch has the following requirements:

* CakePHP 3.1.0 or greater.
* PHP 5.4.16 or greater.

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require cakephp/localized
```

Load your plugin using
```
bin/cake plugin load Localized
```
or by manually putting `CakePlugin::load('Cake/Localized')` in your `boostrap.php`.

## Model validation

Localized validation classes can be used for validating model fields.

```php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Localized\Validation\FrValidation
use Cake\Validation\Validator;

class PostsTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        $validator->provider('fr', FrValidation::class);
        $validator->add('phoneField', 'myCustomRuleNameForPhone', [
            'rule' => 'phone',
            'provider' => 'fr'
        ]);
    }
}
```

For further information on validation rules see the [CakePHP documentation on validation](http://book.cakephp.org/3.0/en/core-libraries/validation.html)

## PO files

This plugin also houses translations for the client-facing translated strings in the core (the `cake` domain). to use these files link or copy them
into their expected location: `src/Locale/<locale>/cake.po`

## Contributing to Localized

If you find that your country is not part of the Localized plugin, please fork the project on Github.
Once you have forked the project you can commit your validator class (and any test cases).
As soon as you have pushed your changes back to Github you can send a pull request and your changes will be reviewed and merged in, or feedback will be given.

### Validation methods

There are a few methods that are common to all classes, defined through the interface "ValidationInterface":

* `phone()` to check a phone number
* `postal()` to check a postal code
* `personId()` to check a country specific person ID

Please try to fit your validation rules in that naming scheme.
Apart from that you can also define further validation methods in your implementing class, of course.

## Issues with Localized

If you have issues with Localized, you can report them at [github.com/cakephp/localized/issues](https://github.com/cakephp/localized/issues).
