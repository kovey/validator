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
class Le extends Base 
{
    protected int | float $max;

    public function __construct(string $field, int | float $max)
    {
        parent::__construct($field);

        $this->error = '[%s] validate failure with Le, value: [%s], condition: [' . $max . ']';
        $this->max = $max;
    }

    public function valid(mixed $data) : bool
    {
        return $data <= $this->max;
    }
}
