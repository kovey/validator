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

class GeTest extends TestCase
{
    public function testGeWithInt()
    {
        $ge = new Ge('kovey', 1);
        $this->assertTrue($ge->valid(2));
        $this->assertTrue($ge->valid(1));
        $this->assertFalse($ge->valid(0));
        $this->assertEquals("[kovey] validate failure with Ge, value: [0], condition: [1]", $ge->getError(0));
    }

    public function testGeWithFloat()
    {
        $ge = new Ge('kovey', 1.1);
        $this->assertTrue($ge->valid(2.0));
        $this->assertTrue($ge->valid(1.1));
        $this->assertFalse($ge->valid(0.9));
        $this->assertEquals("[kovey] validate failure with Ge, value: [0.9], condition: [1.1]", $ge->getError(0.9));
    }
}
