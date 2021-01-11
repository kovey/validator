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
class Gt extends Base 
{
    protected int | float $min;

    public function __construct(string $field, int | float $min)
    {
        parent::__construct($field);

        $this->error = '[%s] validate failure with Gt, value: [%s], condition: [' . $min . ']';
        $this->min = $min;
    }

    public function valid(mixed $data) : bool
    {
        return $data > $this->min;
    }
}
