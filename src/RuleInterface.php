<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2021-01-11 10:59:22
 *
 */
namespace Kovey\Validator;

interface RuleInterface
{
    public function valid(mixed $data) : bool;

    public function getError(mixed $data) : string;

    public function getField() : string;
}
