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

class MobileTest extends TestCase
{
    public function testMobile()
    {
        $mobile = new Mobile('kovey');
        $this->assertTrue($mobile->valid('13456781234'));
        $this->assertFalse($mobile->valid('12456781234'));
        $this->assertFalse($mobile->valid('134567812341'));
        $this->assertFalse($mobile->valid('13456aa1234'));
        $this->assertEquals("[kovey] validate failure with Mobile, value: [13456aa1234]", $mobile->getError('13456aa1234'));
    }
}
