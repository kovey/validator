<?php
/**
 * @description
 *
 * @package
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
    protected string $error = '';

    protected string $field;

    public function __construct(string $field)
    {
        $this->field = $field;
    }

    public function getField() : string
    {
        return $this->field;
    }

    public function getError(mixed $value) : string
    {
        return sprintf($this->error, $this->field, $this->format($value));
    }

    protected function format(mixed $value) : string
    {
        if (is_array($value)) {
            return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        return strval($value);
    }
}
