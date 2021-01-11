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

class InArrayTest extends TestCase
{
    public function testInArray()
    {
        $inArr = new InArray('kovey', array(0, 1, 2));
        $this->assertTrue($inArr->valid(2));
        $this->assertTrue($inArr->valid(1));
        $this->assertFalse($inArr->valid(''));
        $this->assertEquals("[kovey] validate failure with InArray, value: [], condition: [[0,1,2]]", $inArr->getError(''));
    }
}
