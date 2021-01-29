<?php
/**
 * @description Validator
 *
 * @package Kovey\Validator
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
    /**
     * @description rules
     *
     * @var Array
     */
    private Array $rules;

    /**
     * @description error
     *
     * @var string
     */
    private string $error;

    /**
     * @description data
     *
     * @var Array
     */
    private Array $data;

    /**
     * @description construct
     *
     * @param Array $data
     *
     * @return Validator
     */
    public function __construct(Array $data)
    {
        $this->rules = array();
        $this->error = '';
        $this->data = $data;
    }

    /**
     * @description add rule
     *
     * @param RuleInterface $rule
     *
     * @return Validator
     */
    public function addRule(RuleInterface $rule) : Validator
    {
        $this->rules[$rule->getField()] ??= array();
        $this->rules[$rule->getField()][$rule::class] = $rule;
        return $this;
    }

    /**
     * @description valid
     *
     * @return bool
     */
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

    /**
     * @description get error
     *
     * @return string
     */
    public function getError() : string
    {
        return $this->error;
    }
}
