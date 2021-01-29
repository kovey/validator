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
class EqLength extends Base 
{
    /**
     * @description length
     *
     * @var int
     */
    protected int $length;

    /**
     * @description construct
     *
     * @param string $field
     *
     * @param int $length
     *
     * @return EqLength
     */
    public function __construct(string $field, int $length)
    {
        parent::__construct($field);

        $this->error = '[%s] validate failure with EqLength, value: [%s], condition: [' . $length . ']';
        $this->length = $length;
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
        return strlen($data) == $this->length;
    }
}
