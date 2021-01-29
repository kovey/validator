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
class InArray extends Base 
{
    /**
     * @description limits
     *
     * @var Array
     */
    protected Array $limits;

    /**
     * @description construct
     *
     * @param string $field
     *
     * @param Array $limits
     *
     * @return InArray
     */
    public function __construct(string $field, Array $limits)
    {
        parent::__construct($field);

        $this->limits = $limits;
        $this->error = '[%s] validate failure with InArray, value: [%s], condition: [' . $this->format($limits) . ']';
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
        return in_array($data, $this->limits);
    }
}
