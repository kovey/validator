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

class LeTest extends TestCase
{
    public function testLeWithInt()
    {
        $le = new Le('kovey', 3);
        $this->assertTrue($le->valid(2));
        $this->assertTrue($le->valid(3));
        $this->assertFalse($le->valid(4));
        $this->assertEquals("[kovey] validate failure with Le, value: [4], condition: [3]", $le->getError(4));
    }

    public function testLeWithFloat()
    {
        $le = new Le('kovey', 2.1);
        $this->assertTrue($le->valid(2.0));
        $this->assertTrue($le->valid(2.1));
        $this->assertFalse($le->valid(2.2));
        $this->assertEquals("[kovey] validate failure with Le, value: [2.2], condition: [2.1]", $le->getError(2.2));
    }
}
