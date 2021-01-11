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

class GtTest extends TestCase
{
    public function testGtWithInt()
    {
        $gt = new Gt('kovey', 1);
        $this->assertTrue($gt->valid(2));
        $this->assertFalse($gt->valid(1));
        $this->assertFalse($gt->valid(0));
        $this->assertEquals("[kovey] validate failure with Gt, value: [0], condition: [1]", $gt->getError(0));
    }

    public function testGtWithFloat()
    {
        $gt = new Gt('kovey', 1.1);
        $this->assertTrue($gt->valid(2.0));
        $this->assertFalse($gt->valid(1.1));
        $this->assertFalse($gt->valid(0.9));
        $this->assertEquals("[kovey] validate failure with Gt, value: [0.9], condition: [1.1]", $gt->getError(0.9));
    }
}
