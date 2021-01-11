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
class MinLength extends Base 
{
    protected int $minlength;

    public function __construct(string $field, int $minlength)
    {
        parent::__construct($field);

        $this->minlength = $minlength;
        $this->error = '[%s] validate failure with MinLength, value: [%s], condition: [' . $minlength . ']';
    }

    public function valid(mixed $data) : bool
    {
        return strlen($data) >= $this->minlength;
    }
}
