<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2021-01-11 14:43:35
 *
 */
namespace Kovey\Validator;

use PHPUnit\Framework\TestCase;
use Kovey\Validator\Rules;

class ValidatorTest extends TestCase
{
    public function testValidator()
    {
        $valid = new Validator(array(
            'kovey' => 'framework',
            'type' => 1,
            'cates' => array('valid', '134'),
            'key' => md5('123'),
            'url' => 'http://www.kovey.cn'
        ));

        $valid->addRule(new Rules\Required('kovey'))
            ->addRule(new Rules\MaxLength('kovey', 10))
            ->addRule(new Rules\MinLength('kovey', 1))
            ->addRule(new Rules\Required('type'))
            ->addRule(new Rules\Number('type', 1))
            ->addRule(new Rules\Ge('type', 1))
            ->addRule(new Rules\IsArray('cates'))
            ->addRule(new Rules\Required('key'))
            ->addRule(new Rules\EqLength('key', 32))
            ->addRule(new Rules\Required('url'))
            ->addRule(new Rules\Url('url'))
            ->addRule(new Rules\Url('here'));

        $this->assertTrue($valid->valid());
    }

    public function testValidatorFailure()
    {
        $valid = new Validator(array(
            'kovey' => 'framework',
            'type' => 1,
            'cates' => array('valid', '134'),
            'key' => md5('123'),
            'url' => 'http://www.kovey.cn'
        ));

        $valid->addRule(new Rules\Required('kovey'))
            ->addRule(new Rules\MaxLength('kovey', 10))
            ->addRule(new Rules\MinLength('kovey', 1))
            ->addRule(new Rules\Required('type'))
            ->addRule(new Rules\Number('type', 1))
            ->addRule(new Rules\Ge('type', 1))
            ->addRule(new Rules\IsArray('cates'))
            ->addRule(new Rules\Required('key'))
            ->addRule(new Rules\EqLength('key', 32))
            ->addRule(new Rules\Required('url'))
            ->addRule(new Rules\Email('url'));

        $this->assertFalse($valid->valid());
        $this->assertEquals('[url] validate failure with Email, value: [http://www.kovey.cn]', $valid->getError());
    }

    public function testValidatorNotRequired()
    {
        $valid = new Validator(array(
            'kovey' => 'framework',
            'type' => 1,
            'cates' => array('valid', '134'),
            'key' => md5('123'),
            'url' => 'http://www.kovey.cn'
        ));

        $valid->addRule(new Rules\Required('kovey'))
            ->addRule(new Rules\MaxLength('kovey', 10))
            ->addRule(new Rules\MinLength('kovey', 1))
            ->addRule(new Rules\Required('type'))
            ->addRule(new Rules\Number('type'))
            ->addRule(new Rules\Ge('type', 1))
            ->addRule(new Rules\IsArray('cates'))
            ->addRule(new Rules\Required('key'))
            ->addRule(new Rules\EqLength('key', 32))
            ->addRule(new Rules\Required('url'))
            ->addRule(new Rules\Url('url'))
            ->addRule(new Rules\Required('aa'));

        $this->assertFalse($valid->valid());
        $this->assertEquals('[aa] validate failure with Required, value: []', $valid->getError());
    }

    public function testValidatorNotRequiredFailure()
    {
        $valid = new Validator(array(
            'kovey' => 'framework',
            'type' => 1,
            'cates' => array('valid', '134'),
            'key' => md5('123'),
            'url' => 'http://www.kovey.cn'
        ));

        $valid->addRule(new Rules\Required('kovey'))
            ->addRule(new Rules\MaxLength('kovey', 10))
            ->addRule(new Rules\MinLength('kovey', 1))
            ->addRule(new Rules\Required('type'))
            ->addRule(new Rules\Number('type'))
            ->addRule(new Rules\Ge('type', 1))
            ->addRule(new Rules\Number('cates'))
            ->addRule(new Rules\Required('key'))
            ->addRule(new Rules\EqLength('key', 32))
            ->addRule(new Rules\Required('url'))
            ->addRule(new Rules\Url('url'))
            ->addRule(new Rules\Required('aa'));

        $this->assertFalse($valid->valid());
        $this->assertEquals('[cates] validate failure with Number, value: [["valid","134"]]', $valid->getError());
    }
}
