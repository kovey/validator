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
class Lt extends Base 
{
    protected int | float $max;

    public function __construct(string $field, int | float $max)
    {
        parent::__construct($field);

        $this->max = $max;
        $this->error = '[%s] validate failure with Lt, value: [%s], condition: [' . $max . ']';
    }

    public function valid(mixed $data) : bool
    {
        return $data < $this->max;
    }
}
