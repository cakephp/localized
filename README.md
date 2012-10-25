## CakePHP Localized plugin [![Build Status](https://secure.travis-ci.org/cakephp/localized.png?branch=master)](http://travis-ci.org/cakephp/localized)

This plugin contains various localized validation classes for specific countries and is intended for use with CakePHP 2.x

### Requirements

* PHP 5.2.8
* CakePHP 2.1+

### Using the Localized plugin

First download the repository and place it in `app/Plugin/Localized` or on one of your plugin paths. You can then import and use the validators in your App classes.

### Model validation

Localized validation classes can be used for validating model fields.

	App::uses('MxValidation', 'Localized.Validation');

	class Post extends AppModel {

		public $validate = array(
			'postal' => array(
				'valid' => array(
					'rule' => array('postal', null, 'mx'),
					'message' => 'Must be valid mexico postal code'
				)
			)
		);
	}

For further information on validation rules see the [cakephp documentation on validation](http://book.cakephp.org/2.0/en/models/data-validation.html)

### Using localized validations with Validation

You can also access the localized validators any time you would call `Validation` methods. After importing the validation class.

	if (Validation::phone($value, null, 'cz')) {
		//do something with valid phone number
	}

### Po files

This plugin also houses translations for the client-facing translated strings in the core (the cake domain). to use these files link or copy them
into their expected location: `APP/locale/<locale>/LC_MESSAGES/cake.po`

## Migration Guide

### Localized.Validation
The lib path for validation files changed. They should now be either in `APP/Validation/` or in `APP/PluginName/Validation/`.

You also need to adjust your App::uses() statements in your code accordingly:

`App::uses('MxValidation', 'Localized.Lib');` is now `App::uses('MxValidation', 'Localized.Validation');`

## Contributing to Localized

If you find that your country is not part of the Localized plugin, please fork the project on github.  Once you have forked the project you can commit your validator class (and any test cases).  Once you have pushed your changes back to github send a pull request, and your changes will be reviewed and merged in or feedback will be given.

## Issues with Localized

If you have issues with Localized, you can report them at http://cakephp.lighthouseapp.com/projects/42658-localized/overview