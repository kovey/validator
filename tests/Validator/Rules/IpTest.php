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

class IpTest extends TestCase
{
    public function testIp()
    {
        $ip = new Ip('kovey');
        $this->assertTrue($ip->valid('127.0.0.1'));
        $this->assertFalse($ip->valid('a.123.c.45'));
        $this->assertEquals("[kovey] validate failure with Ip, value: [a.123.c.45]", $ip->getError('a.123.c.45'));
    }
}
