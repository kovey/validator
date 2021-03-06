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
class MinLength extends Base 
{
    /**
     * @description minlength
     *
     * @var int
     */
    protected int $minlength;

    /**
     * @description construct
     *
     * @param string $field
     *
     * @param int $length
     *
     * @return MinLength
     */
    public function __construct(string $field, int $minlength)
    {
        parent::__construct($field);

        $this->minlength = $minlength;
        $this->error = '[%s] validate failure with MinLength, value: [%s], condition: [' . $minlength . ']';
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
        return strlen($data) >= $this->minlength;
    }
}
