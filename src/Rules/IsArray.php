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
class IsArray extends Base 
{
    protected string $error = '[%s] validate failure with IsArray, value: [%s]';

    public function valid(mixed $data) : bool
    {
        return is_array($data);
    }
}
