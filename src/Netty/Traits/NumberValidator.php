<?php
/**
 * Created by PhpStorm.
 * User: Wisdom Emenike
 * Date: 4/8/2020
 * Time: 8:18 PM
 */

namespace Netty\Traits;

use Netty\Exception\InvalidNumberException;

trait NumberValidator
{
    /**
     * @param string $number
     * @throws InvalidNumberException
     */
    private function validateNumber(string $number) {

        if (empty($number)) throw new InvalidNumberException("Invalid entry, enter a telephone number");

        if (!preg_match("/^[+0-9]+$/", $number)) throw new InvalidNumberException("Number contains unwanted characters");

        if (($length = strlen($number)) < 11) throw new InvalidNumberException("Number must not be lesser than 11 digits");

        if ($length > 11) throw new InvalidNumberException("Number must not be greater than 11 digits");
    }
}