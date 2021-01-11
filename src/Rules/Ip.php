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
class Ip extends Base 
{
    protected string $error = '[%s] validate failure with Ip, value: [%s]';

    public function valid(mixed $data) : bool
    {
        return (bool)filter_var($data, FILTER_VALIDATE_IP);
    }
}
