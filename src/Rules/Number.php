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
class Number extends Base 
{
    protected string $error = '[%s] validate failure with Number, value: [%s]';

    public function valid(mixed $data) : bool
    {
        if (!is_numeric($data)) {
            return false;
        }

        return ctype_digit(strval($data));
    }
}
