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

class RequiredTest extends TestCase
{
    public function testRequired()
    {
        $required = new Required('kovey');
        $this->assertTrue($required->valid(''));
        $this->assertTrue($required->valid('12.12a'));
        $this->assertFalse($required->valid(null));
        $this->assertEquals("[kovey] validate failure with Required, value: []", $required->getError(null));
    }
}
