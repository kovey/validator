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
class RegExp extends Base 
{
    protected string $regExp;

    public function __construct(string $field, string $regExp)
    {
        parent::__construct($field);

        $this->regExp = $regExp;
        $this->error = '[%s] validate failure with RegExp, value: [%s], condition: [' . $regExp . ']';
    }

    public function valid(mixed $data) : bool
    {
        return (bool)preg_match($this->regExp, $data);
    }
}
