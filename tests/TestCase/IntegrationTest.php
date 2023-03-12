<?php
/**
 * Plugin Integration Validation class.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Test\TestCase\Validation;

use Cake\Localized\Validation\FrValidation;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * IntegrationTest
 *
 */
class IntegrationTest extends TestCase
{
    /**
     * Test the usage of the plugin inside a Validator
     *
     * @return void
     */
    public function testLocalizedProviderIntegration()
    {
        $validator = new Validator();
        $validator->setProvider('fr', FrValidation::class);
        $validator->add('phoneField', 'myCustomRuleNameForPhone', [
            'rule' => 'phone',
            'provider' => 'fr',
            'message' => 'Numéro invalide',
        ]);
        $validator->add('postalField', 'myCustomRuleNameForPostal', [
            'rule' => 'postal',
            'provider' => 'fr',
        ]);
        $this->assertCount(2, $validator);
        $this->assertEmpty($validator->errors([
            'phoneField' => '05 24 22 72 27',
            'postalField' => '93000',
        ]));

        $errors = $validator->errors(['phoneField' => '924.227.227', 'postalField' => '0000']);
        $expected = [
            'phoneField' => ['myCustomRuleNameForPhone' => 'Numéro invalide'],
            'postalField' => ['myCustomRuleNameForPostal' => 'The provided value is invalid'],
        ];
        $this->assertEquals($expected, $errors);
    }
}
