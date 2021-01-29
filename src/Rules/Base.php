<?php
/**
 * @description rule base
 *
 * @package Kovey\Validator\Rules
 *
 * @author kovey
 *
 * @time 2021-01-11 11:47:30
 *
 */
namespace Kovey\Validator\Rules;

use Kovey\Validator\RuleInterface;

abstract class Base implements RuleInterface
{
    /**
     * @description error
     *
     * @var string
     */
    protected string $error = '';

    /**
     * @description field
     *
     * @var string
     */
    protected string $field;

    /**
     * @description construct
     *
     * @param string $field
     *
     * @return RuleInterface
     */
    public function __construct(string $field)
    {
        $this->field = $field;
    }

    /**
     * @description get field
     *
     * @return string
     */
    public function getField() : string
    {
        return $this->field;
    }

    /**
     * @description get error
     *
     * @param mixed $value
     *
     * @return string
     */
    public function getError(mixed $value) : string
    {
        return sprintf($this->error, $this->field, $this->format($value));
    }

    /**
     * @description format data
     *
     * @param mixed $data
     *
     * @return string
     */
    protected function format(mixed $value) : string
    {
        if (is_array($value)) {
            return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        return strval($value);
    }
}
