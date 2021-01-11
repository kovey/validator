<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2021-01-11 11:39:33
 *
 */
namespace Kovey\Validator\Rules;

#[\Attribute]
class Mobile extends Base 
{
    protected string $error = '[%s] validate failure with Mobile, value: [%s]';

    public function valid(mixed $data) : bool
    {
        return (bool)preg_match('/^1[3-9][0-9]{9}$/', $data);
    }
}
