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

class MacTest extends TestCase
{
    public function testIp()
    {
        $mac = new Mac('kovey');
        $this->assertTrue($mac->valid('f3:fa:c3:31:f3:bc'));
        $this->assertFalse($mac->valid('aaaa'));
        $this->assertEquals("[kovey] validate failure with Mac, value: [aaaa]", $mac->getError('aaaa'));
    }
}
