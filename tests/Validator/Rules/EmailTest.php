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

class EmailTest extends TestCase
{
    public function testEmail()
    {
        $email = new Email('kovey');
        $this->assertTrue($email->valid('test@kovey.cn'));
        $this->assertFalse($email->valid('test@kovey!#.cn'));
        $this->assertEquals("[kovey] validate failure with Email, value: [kovey]", $email->getError('kovey'));
    }
}
