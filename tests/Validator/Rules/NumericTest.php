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

class NumericTest extends TestCase
{
    public function testNumeric()
    {
        $numeric = new Numeric('kovey');
        $this->assertTrue($numeric->valid('1345'));
        $this->assertTrue($numeric->valid('12.12'));
        $this->assertFalse($numeric->valid('a123'));
        $this->assertFalse($numeric->valid('123q'));
        $this->assertEquals("[kovey] validate failure with Numeric, value: [123q]", $numeric->getError('123q'));
    }
}
