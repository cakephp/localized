# CakePHP Localized plugin

![Build Status](https://github.com/cakephp/localized/actions/workflows/ci.yml/badge.svg?branch=master)
[![Latest Stable Version](https://img.shields.io/github/v/release/cakephp/localized?sort=semver&style=flat-square)](https://packagist.org/packages/cakephp/localized)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/localized?style=flat-square)](https://packagist.org/packages/cakephp/localized/stats)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

This plugin contains various localized validation classes for specific countries.

## Requirements

This branch is for use with CakePHP **4.x**. See [version map](https://github.com/cakephp/localized/wiki#version-map) for details.

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require cakephp/localized
```

Load your plugin using
```
bin/cake plugin load Cake/Localized
```
or by manually adding `$this->addPlugin('Cake/Localized')` in your `src/Application.php`.

## Model validation

Localized validation classes can be used for validating model fields.

```php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Localized\Validation\FrValidation;
use Cake\Validation\Validator;

class PostsTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        $validator->setProvider('fr', FrValidation::class);
        $validator->add('phoneField', 'myCustomRuleNameForPhone', [
            'rule' => 'phone',
            'provider' => 'fr'
        ]);
    }
}
```

For further information on validation rules see the [CakePHP documentation on validation](https://book.cakephp.org/4/en/core-libraries/validation.html)

## PO files

This plugin also houses translations for the client-facing translated strings in the core (the `cake` domain). to use these files link or copy them
into their expected location: `resources/locales/<locale>/cake.po`

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
