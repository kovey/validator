<?php
/**
 * @description rule interface
 *
 * @package Kovey\Validator
 *
 * @author kovey
 *
 * @time 2021-01-11 10:59:22
 *
 */
namespace Kovey\Validator;

interface RuleInterface
{
    /**
     * @description valid
     *
     * @param mixed $data
     *
     * @return bool
     */
    public function valid(mixed $data) : bool;

    /**
     * @description get error
     *
     * @param mixed $data
     *
     * @return string
     */
    public function getError(mixed $data) : string;

    /**
     * @description get field
     *
     * @return string
     */
    public function getField() : string;
}
