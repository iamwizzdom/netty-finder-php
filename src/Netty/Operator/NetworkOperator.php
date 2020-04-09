<?php
/**
 * Created by PhpStorm.
 * User: Wisdom Emenike
 * Date: 4/8/2020
 * Time: 8:51 PM
 */

namespace Netty\Operator;


abstract class NetworkOperator
{
    protected function getNetworks() {
        return [
            '9mobile' => ['0809', '0909', '0817', '0818', '0908'],
            'mtn' => ['0806', '0803', '0816', '0813', '0810', '0814', '0903', '0906', '0703', '0706'],
            'glo' => ['0805', '0705', '0905', '0807', '0815', '0811'],
            'airtel' => ['0802', '0901', '0902', '0701', '0808', '0708', '0812', '0907'],
            'starcomms' => ['07028', '07029', '0819'],
            'visafone' => ['07025', '07026', '0704'],
            'multilinks' => ['07027', '0709'],
            'zoom' => ['0707'],
            'ntel' => ['0804'],
            'smile' => ['0702']
        ];
    }

    /**
     * @param string $number
     * @return string
     */
    protected function getActualNumber(string $number) {

        if ($this->num_starts_with($number, "+234")) {

            $number = substr($number, 4, (strlen($number) - 4));

            return "0{$number}";
        }

        if ($this->num_starts_with($number, "234")) {

            $number = substr($number, 3, (strlen($number) - 3));

            return "0{$number}";
        }

        return $number;
    }

    /**
     * @param string $number
     * @param int $length
     * @return false|string
     */
    protected function getPhonePrefix(string $number, int $length = 4) {

        return substr($number, 0, $length);
    }

    /**
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    private function num_starts_with(string $haystack, string $needle): bool
    {
        return strcmp(substr($haystack, 0, strlen($needle)), $needle) == 0;
    }
}