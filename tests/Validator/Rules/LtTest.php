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

class LtTest extends TestCase
{
    public function testLtWithInt()
    {
        $lt = new Lt('kovey', 3);
        $this->assertTrue($lt->valid(2));
        $this->assertFalse($lt->valid(3));
        $this->assertFalse($lt->valid(4));
        $this->assertEquals("[kovey] validate failure with Lt, value: [4], condition: [3]", $lt->getError(4));
    }

    public function testLtWithFloat()
    {
        $lt = new Lt('kovey', 2.1);
        $this->assertTrue($lt->valid(2.0));
        $this->assertFalse($lt->valid(2.1));
        $this->assertFalse($lt->valid(2.2));
        $this->assertEquals("[kovey] validate failure with Lt, value: [2.2], condition: [2.1]", $lt->getError(2.2));
    }
}
