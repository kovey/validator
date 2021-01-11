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
class Required extends Base 
{
    protected string $error = '[%s] validate failure with Required, value: [%s]';

    public function valid(mixed $data) : bool
    {
        return !is_null($data);
    }
}