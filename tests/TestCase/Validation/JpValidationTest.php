<?php
/**
 * Japanese Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Test\TestCase\Validation;

use Cake\Localized\Validation\JpValidation;
use Cake\TestSuite\TestCase;

/**
 * JpValidationTest
 *
 */
class JpValidationTest extends TestCase
{
    /**
     * test the phone method of JpValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(JpValidation::phone('03-1111-2222'));
        $this->assertTrue(JpValidation::phone('090-1111-2222'));
        $this->assertTrue(JpValidation::phone('0111-11-2222'));
        $this->assertTrue(JpValidation::phone('02222-1-1111'));
        $this->assertTrue(JpValidation::phone('0311112222'));
        $this->assertTrue(JpValidation::phone('09011112222'));
        $this->assertTrue(JpValidation::phone('03 1111 2222'));
        $this->assertTrue(JpValidation::phone('090 1111 2222'));
        $this->assertTrue(JpValidation::phone('+81 90 1111 2222'));
        $this->assertTrue(JpValidation::phone('+81-90-1111-2222'));
        $this->assertTrue(JpValidation::phone('+819011112222'));

        $this->assertFalse(JpValidation::phone('051238-1-111'));
        $this->assertFalse(JpValidation::phone('90-1111-2222'));
        $this->assertFalse(JpValidation::phone('+8190111122221199'));
        $this->assertFalse(JpValidation::phone('+8111-90-1111-2222'));
        $this->assertFalse(JpValidation::phone('056'));
    }

    /**
     * test the postal method of JpValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(JpValidation::postal('020-5045'));
        $this->assertFalse(JpValidation::postal('0205-504'));
    }

    /**
     * test the hiragana method of JpValidation
     *
     * @return void
     */
    public function testHiragana()
    {
        $this->assertTrue(JpValidation::hiragana('ぁい　ゔえおー'));

        $this->assertFalse(JpValidation::hiragana('-'));
        $this->assertFalse(JpValidation::hiragana('０'));
        $this->assertFalse(JpValidation::hiragana('ア'));
        $this->assertFalse(JpValidation::hiragana('亜'));
        $this->assertFalse(JpValidation::hiragana('ぁい　ゔえおー', false));
    }

    /**
     * test the katakana method of JpValidation
     *
     * @return void
     */
    public function testKatakana()
    {
        $this->assertTrue(JpValidation::katakana('ァイ　ヴエオヶー'));

        $this->assertFalse(JpValidation::katakana('-'));
        $this->assertFalse(JpValidation::katakana('０'));
        $this->assertFalse(JpValidation::katakana('あ'));
        $this->assertFalse(JpValidation::katakana('亜'));
        $this->assertFalse(JpValidation::katakana('ァイ　ヴエオヶー', false));
    }

    /**
     * test the zenkaku method of JpValidation
     *
     * @return void
     */
    public function testZenkaku()
    {
        $this->assertTrue(JpValidation::zenkaku('０１２３ァイヴエオヶ　ぁいゔえおー：？！＄＃＠＋｜＿'));

        $this->assertFalse(JpValidation::zenkaku(' '));
        $this->assertFalse(JpValidation::zenkaku('0'));
        $this->assertFalse(JpValidation::zenkaku('a'));
    }
}
