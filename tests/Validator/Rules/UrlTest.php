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

class UrlTest extends TestCase
{
    public function testUrl()
    {
        $url = new Url('kovey');
        $this->assertTrue($url->valid('http://kovey.cn'));
        $this->assertFalse($url->valid('kovey.cn'));
        $this->assertEquals("[kovey] validate failure with Url, value: [kovey.cn]", $url->getError('kovey.cn'));
    }
}
