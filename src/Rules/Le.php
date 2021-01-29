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
    /**
     * @description max
     *
     * @var int | float
     */
    protected int | float $max;

    /**
     * @description construct
     *
     * @param string $field
     *
     * @param int | float $max
     *
     * @return Le
     */
    public function __construct(string $field, int | float $max)
    {
        parent::__construct($field);

        $this->error = '[%s] validate failure with Le, value: [%s], condition: [' . $max . ']';
        $this->max = $max;
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
        return $data <= $this->max;
    }
}
