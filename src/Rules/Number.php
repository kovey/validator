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

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_METHOD)]
class Number extends Base 
{
    /**
     * @description error format
     *
     * @var string
     */
    protected string $error = '[%s] validate failure with Number, value: [%s]';

    /**
     * @description valid data
     *
     * @param mixed $data
     *
     * @return bool
     */
    public function valid(mixed $data) : bool
    {
        if (!is_numeric($data)) {
            return false;
        }

        return ctype_digit(strval($data));
    }
}
