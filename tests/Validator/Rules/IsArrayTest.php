<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2021-01-11 13:40:47
 *
 */
namespace Kovey\Validator\Rules;

use PHPUnit\Framework\TestCase;

class IsArrayTest extends TestCase
{
    public function testIsArray()
    {
        $isArr = new IsArray('kovey');
        $this->assertTrue($isArr->valid(array()));
        $this->assertTrue($isArr->valid(array('1', '2')));
        $this->assertTrue($isArr->valid(array(1, 'a' => 2, 'dfl' => array())));
        $this->assertFalse($isArr->valid(1234));
        $this->assertFalse($isArr->valid(new \ArrayObject()));
        $this->assertFalse($isArr->valid('123q'));
        $this->assertEquals("[kovey] validate failure with IsArray, value: [123q]", $isArr->getError('123q'));
    }
}
