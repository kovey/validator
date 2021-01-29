<?php
/**
 * @description email
 *
 * @package Kovey\Validator\Rules
 *
 * @author kovey
 *
 * @time 2021-01-11 11:39:33
 *
 */
namespace Kovey\Validator\Rules;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_METHOD)]
class Email extends Base 
{
    /**
     * @description error format
     *
     * @var string
     */
    protected string $error = '[%s] validate failure with Email, value: [%s]';

    /**
     * @description valid data
     *
     * @param mixed $data
     *
     * @return bool
     */
    public function valid(mixed $data) : bool
    {
        return (bool)filter_var($data, FILTER_VALIDATE_EMAIL);
    }
}
