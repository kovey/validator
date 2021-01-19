<?php
/**
 * @description Validator
 *
 * @package
 *
 * @author kovey
 *
 * @time 2021-01-11 11:00:51
 *
 */
namespace Kovey\Validator;

use Kovey\Validator\Rules\Required;

class Validator
{
    private Array $rules;

    private string $error;

    private Array $data;

    public function __construct(Array $data)
    {
        $this->rules = array();
        $this->error = '';
        $this->data = $data;
    }

    public function addRule(RuleInterface $rule) : Validator
    {
        $this->rules[$rule->getField()] ??= array();
        $this->rules[$rule->getField()][$rule::class] = $rule;
        return $this;
    }

    public function valid() : bool
    {
        foreach ($this->rules as $field => $frules) {
            $data = $this->data[$field] ?? null;
            if (!isset($frules[Required::class])) {
                if (is_null($data)) {
                    continue;
                }
            }

            foreach ($frules as $rule) {
                if (!$rule->valid($data)) {
                    $this->error = $rule->getError($data);
                    return false;
                }
            }
        }

        return true;
    }

    public function getError() : string
    {
        return $this->error;
    }
}
