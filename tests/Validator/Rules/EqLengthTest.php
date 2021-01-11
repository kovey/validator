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

class EqLengthTest extends TestCase
{
    public function testEqLength()
    {
        $eqlength = new EqLength('kovey', 10);
        $this->assertTrue($eqlength->valid('abcd1234BB'));
        $this->assertFalse($eqlength->valid('abcd1234567890'));
        $this->assertEquals("[kovey] validate failure with EqLength, value: [abcd1234567890], condition: [10]", $eqlength->getError('abcd1234567890'));
    }
}
