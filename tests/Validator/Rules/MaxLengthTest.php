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

class MaxLengthTest extends TestCase
{
    public function testMaxLength()
    {
        $maxlength = new MaxLength('kovey', 10);
        $this->assertTrue($maxlength->valid('abcd1234'));
        $this->assertTrue($maxlength->valid('abcd1234cc'));
        $this->assertFalse($maxlength->valid('abcd1234567890'));
        $this->assertEquals("[kovey] validate failure with MaxLength, value: [abcd1234567890], condition: [10]", $maxlength->getError('abcd1234567890'));
    }
}
