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
class Gt extends Base 
{
    /**
     * @description min
     *
     * @var int | float
     */
    protected int | float $min;

    /**
     * @description construct
     *
     * @param string $field
     *
     * @param int | float $min
     *
     * @return Gt
     */
    public function __construct(string $field, int | float $min)
    {
        parent::__construct($field);

        $this->error = '[%s] validate failure with Gt, value: [%s], condition: [' . $min . ']';
        $this->min = $min;
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
        return $data > $this->min;
    }
}
