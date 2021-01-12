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
class Ge extends Base 
{
    protected int | float $min;

    public function __construct(string $field, int | float $min)
    {
        parent::__construct($field);

        $this->min = $min;
        $this->error = '[%s] validate failure with Ge, value: [%s], condition: [' . $min . ']';
    }

    public function valid(mixed $data) : bool
    {
        return $data >= $this->min;
    }
}
