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

class NumberTest extends TestCase
{
    public function testNumber()
    {
        $number = new Number('kovey');
        $this->assertTrue($number->valid('1345'));
        $this->assertFalse($number->valid('a123'));
        $this->assertFalse($number->valid('123q'));
        $this->assertFalse($number->valid('12.12'));
        $this->assertEquals("[kovey] validate failure with Number, value: [12.12]", $number->getError('12.12'));
    }
}
