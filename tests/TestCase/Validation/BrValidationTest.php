<?php
/**
 * Brazilian Localized Validation class test case
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

use Cake\Localized\Validation\BrValidation;
use Cake\TestSuite\TestCase;

/**
 * BrValidationTest
 *
 */
class BrValidationTest extends TestCase
{
    /**
     * test the phone method of BrValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertFalse(BrValidation::phone('teststring'));
        $this->assertFalse(BrValidation::phone('1-(33)-(333)-(4444)'));
        $this->assertFalse(BrValidation::phone('1-(33)-3333-4444'));
        $this->assertFalse(BrValidation::phone('1-(33)-33-4444'));
        $this->assertFalse(BrValidation::phone('1-(33)-3-44444'));
        $this->assertFalse(BrValidation::phone('1-(33)-3-444'));
        $this->assertFalse(BrValidation::phone('1-(33)-3-44'));
        $this->assertFalse(BrValidation::phone('2345678'));

        // with the wrong extra digit
        $this->assertFalse(BrValidation::phone('55 (48) 12345 6789'));
        $this->assertFalse(BrValidation::phone('+55 (48) 22345 6789'));
        $this->assertFalse(BrValidation::phone('+55 (048) 32345 6789'));
        $this->assertFalse(BrValidation::phone('+55 (48) 42345-6789'));
        $this->assertFalse(BrValidation::phone('+55 (48) 52345.6789'));
        $this->assertFalse(BrValidation::phone('(48) 12345 6789'));

        $this->assertTrue(BrValidation::phone('55 (48) 2345 6789'));
        $this->assertTrue(BrValidation::phone('+55 (48) 2345 6789'));
        $this->assertTrue(BrValidation::phone('+55 (048) 2345 6789'));
        $this->assertTrue(BrValidation::phone('+55 (48) 2345-6789'));
        $this->assertTrue(BrValidation::phone('+55 (48) 2345.6789'));
        $this->assertTrue(BrValidation::phone('(48) 2345 6789'));
        $this->assertTrue(BrValidation::phone('2345-6789'));
        $this->assertTrue(BrValidation::phone('2345.6789'));
        $this->assertTrue(BrValidation::phone('23456789'));

        // // with the extra digit
        $this->assertTrue(BrValidation::phone('55 (48) 92345 6789'));
        $this->assertTrue(BrValidation::phone('+55 (48) 92345 6789'));
        $this->assertTrue(BrValidation::phone('+55 (048) 92345 6789'));
        $this->assertTrue(BrValidation::phone('+55 (48) 92345-6789'));
        $this->assertTrue(BrValidation::phone('+55 (48) 92345.6789'));
        $this->assertTrue(BrValidation::phone('(48) 92345 6789'));
        $this->assertTrue(BrValidation::phone('92345-6789'));
        $this->assertTrue(BrValidation::phone('92345.6789'));
        $this->assertTrue(BrValidation::phone('923456789'));
    }

    /**
     * test the postal method of BrValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertFalse(BrValidation::postal('111'));
        $this->assertFalse(BrValidation::postal('1111'));
        $this->assertFalse(BrValidation::postal('1234-123'));
        $this->assertFalse(BrValidation::postal('12345-12'));

        $this->assertTrue(BrValidation::postal('88000-123'));
        $this->assertTrue(BrValidation::postal('01234-123'));
        $this->assertTrue(BrValidation::postal('01234123'));
    }

    /**
     * test the ssn method of BrValidation
     *
     * @return void
     */
    public function testSsn()
    {
        // Testing CPF
        $this->assertFalse(BrValidation::cpf('22692173811'));
        $this->assertFalse(BrValidation::cpf('50549727322'));
        $this->assertFalse(BrValidation::cpf('869.283.422-11'));
        $this->assertFalse(BrValidation::cpf('843.701.734-22'));
        $this->assertFalse(BrValidation::cpf('999.999.999-99'));

        $this->assertTrue(BrValidation::cpf('22692173813'));
        $this->assertTrue(BrValidation::cpf('50549727302'));
        $this->assertTrue(BrValidation::cpf('869.283.422-00'));
        $this->assertTrue(BrValidation::cpf('843.701.734-34'));

        // Testing CNPJ
        $this->assertFalse(BrValidation::cnpj('04295165000133'));
        $this->assertFalse(BrValidation::cnpj('33530485000129'));
        $this->assertFalse(BrValidation::cnpj('04295166000101'));
        $this->assertFalse(BrValidation::cnpj('33530486000130'));
        $this->assertFalse(BrValidation::cnpj('04.295.165/0001-33'));
        $this->assertFalse(BrValidation::cnpj('33.530.485/0001-29'));
        $this->assertFalse(BrValidation::cnpj('04.295.166/0001-01'));
        $this->assertFalse(BrValidation::cnpj('33.530.486/0001-30'));
        $this->assertFalse(BrValidation::cnpj('33.530.48.6/0001-30'));
        $this->assertFalse(BrValidation::cnpj('	33.530.48.6/0001-30 '));
        $this->assertFalse(BrValidation::cnpj('33.530.48.6/000-130'));

        $this->assertTrue(BrValidation::cnpj('04295166000133'));
        $this->assertTrue(BrValidation::cnpj('33530486000129'));
        $this->assertTrue(BrValidation::personId('04.295.166/0001-33'));
        $this->assertTrue(BrValidation::personId('33.530.486/0001-29'));

        // Testing ssn
        $this->assertFalse(BrValidation::personId('04295165000133'));
        $this->assertFalse(BrValidation::personId('33530485000129'));
        $this->assertFalse(BrValidation::personId('04295166000101'));
        $this->assertFalse(BrValidation::personId('33530486000130'));
        $this->assertFalse(BrValidation::personId('04.295.165/0001-33'));
        $this->assertFalse(BrValidation::personId('33.530.485/0001-29'));
        $this->assertFalse(BrValidation::personId('04.295.166/0001-01'));
        $this->assertFalse(BrValidation::personId('33.530.486/0001-30'));
        $this->assertTrue(BrValidation::personId('04295166000133'));
        $this->assertTrue(BrValidation::personId('33530486000129'));
        $this->assertTrue(BrValidation::personId('04.295.166/0001-33'));
        $this->assertTrue(BrValidation::personId('33.530.486/0001-29'));

        // Testing invalid input
        $this->assertFalse(BrValidation::personId('3712093712890371289073901287390812'));
        $this->assertFalse(BrValidation::personId('33aaaa86000129'));
        $this->assertFalse(BrValidation::personId('22692173813xxx'));
        $this->assertFalse(BrValidation::personId('226921xxx73813'));
        $this->assertFalse(BrValidation::personId('11111111111'));
        $this->assertFalse(BrValidation::cpf('abcdefghi'));

        //testing 15 digits
        $this->assertFalse(BrValidation::cnpj(123456789123456));
        $this->assertFalse(BrValidation::cnpj(062476224000121));
        $this->assertFalse(BrValidation::cnpj('062476224000121'));
        $this->assertFalse(BrValidation::cnpj('062.476.224/0001-21'));
        $this->assertTrue(BrValidation::cnpj('62.476.224/0001-21'));
        $this->assertTrue(BrValidation::cnpj(62476224000121));
        $this->assertTrue(BrValidation::cnpj('62476224000121'));
    }

    /**
     * test the cnh method of BrValidation
     *
     * @return void
     */
    public function testCnh()
    {
        $this->assertTrue(BrValidation::cnh('01827854569'));

        $this->assertFalse(BrValidation::cnh('01827854568'));
        $this->assertFalse(BrValidation::cnh('12345678909'));
        $this->assertFalse(BrValidation::cnh('11111111111'));
        $this->assertFalse(BrValidation::cnh('018278545'));
        $this->assertFalse(BrValidation::cnh('abcdefghij'));
        $this->assertFalse(BrValidation::cnh(['01827854569']));
    }

    /**
     * test the cns method of BrValidation
     *
     * @return void
     */
    public function testCns()
    {
        $this->assertTrue(BrValidation::cns('702 5053 3246 4238'));
        $this->assertTrue(BrValidation::cns('898 0058 0155 2261'));
        $this->assertTrue(BrValidation::cns('706000307269748'));
        $this->assertTrue(BrValidation::cns(706902161943931));

        $this->assertFalse(BrValidation::cns('702 5053 3246 4237'));
        $this->assertFalse(BrValidation::cns('111 1111 1111 1111'));
        $this->assertFalse(BrValidation::cns('9021 6194 0000'));
        $this->assertFalse(BrValidation::cns(['12345678909']));
    }
}
