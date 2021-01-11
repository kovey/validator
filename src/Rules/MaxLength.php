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
class MaxLength extends Base 
{
    protected int $maxlength;

    public function __construct(string $field, int $maxlength)
    {
        parent::__construct($field);

        $this->error = '[%s] validate failure with MaxLength, value: [%s], condition: [' . $maxlength . ']';
        $this->maxlength = $maxlength;
    }

    public function valid(mixed $data) : bool
    {
        return strlen($data) <= $this->maxlength;
    }
}
