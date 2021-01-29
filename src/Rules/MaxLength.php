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
class MaxLength extends Base 
{
    /**
     * @description maxlength
     *
     * @var int
     */
    protected int $maxlength;

    /**
     * @description construct
     *
     * @param string $field
     *
     * @param int $length
     *
     * @return MaxLength
     */
    public function __construct(string $field, int $maxlength)
    {
        parent::__construct($field);

        $this->error = '[%s] validate failure with MaxLength, value: [%s], condition: [' . $maxlength . ']';
        $this->maxlength = $maxlength;
    }

    /**
     * @description valid data
     *
     * @param mixed $data
     *
     * @return bool
     */
    public function valid(mixed $data) : bool
    {
        return strlen($data) <= $this->maxlength;
    }
}
