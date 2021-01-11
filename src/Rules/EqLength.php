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
class EqLength extends Base 
{
    protected int $length;

    public function __construct(string $field, int $length)
    {
        parent::__construct($field);

        $this->error = '[%s] validate failure with EqLength, value: [%s], condition: [' . $length . ']';
        $this->length = $length;
    }

    public function valid(mixed $data) : bool
    {
        return strlen($data) == $this->length;
    }
}
