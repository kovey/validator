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

class RegExpTest extends TestCase
{
    public function testRegExp()
    {
        $regExp = new RegExp('kovey', '/^[a-z0-9]+$/');
        $this->assertTrue($regExp->valid('abcd1234'));
        $this->assertTrue($regExp->valid('abcd1234cc'));
        $this->assertFalse($regExp->valid('abc134AB'));
        $this->assertEquals("[kovey] validate failure with RegExp, value: [abc134AB], condition: [/^[a-z0-9]+$/]", $regExp->getError('abc134AB'));
    }
}
