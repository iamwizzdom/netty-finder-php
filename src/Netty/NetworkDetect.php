<?php
/**
 * Created by PhpStorm.
 * User: Wisdom Emenike
 * Date: 4/8/2020
 * Time: 8:11 PM
 */

namespace Netty;


use Netty\Operator\NetworkOperator;
use Netty\Traits\NumberAttributes;
use Netty\Traits\NumberValidator;

class NetworkDetect extends NetworkOperator
{

    use NumberValidator, NumberAttributes;

    /**
     * @var string
     */
    private $number;

    /**
     * NetworkDetect constructor.
     * @param string $number
     * @throws Exception\InvalidNumberException
     */
    public function __construct(string $number)
    {
        $this->number = $this->getActualNumber($number);
        $this->run();
    }

    /**
     * @param string $number
     * @throws Exception\InvalidNumberException
     */
    public function resetNumber(string $number) {
        $this->number = $this->getActualNumber($number);
        $this->run();
    }

    /**
     * @throws Exception\InvalidNumberException
     */
    private function run() {

        $this->validateNumber($this->number);

        $networks = $this->getNetworks();

        $primaryPrefix = $this->getPhonePrefix($this->number);

        if (in_array($primaryPrefix, $networks['mtn'])) {
            $this->networkName = "MTN";
            $this->numberPrefix = $primaryPrefix;
            return;
        }

        if (in_array($primaryPrefix, $networks['glo'])) {
            $this->networkName = "GLO";
            $this->numberPrefix = $primaryPrefix;
            return;
        }

        if (in_array($primaryPrefix, $networks['9mobile'])) {
            $this->networkName = "9mobile";
            $this->numberPrefix = $primaryPrefix;
            return;
        }

        if (in_array($primaryPrefix, $networks['airtel'])) {
            $this->networkName = "Airtel";
            $this->numberPrefix = $primaryPrefix;
            return;
        }

        if (in_array($primaryPrefix, $networks['zoom'])) {
            $this->networkName = "Zoom";
            $this->numberPrefix = $primaryPrefix;
            return;
        }

        if (in_array($primaryPrefix, $networks['ntel'])) {
            $this->networkName = "Ntel";
            $this->numberPrefix = $primaryPrefix;
            return;
        }

        if (in_array($primaryPrefix, $networks['smile'])) {
            $this->networkName = "Smile";
            $this->numberPrefix = $primaryPrefix;
            return;
        }

        $secondaryPrefix = $this->getPhonePrefix($this->number, 5);

        if (
            ($isSecPrefix = in_array($secondaryPrefix, $networks['starcomms'])) ||
            in_array($primaryPrefix, $networks['starcomms'])
        ) {
            $this->networkName = "Starcomms";
            $this->numberPrefix = $isSecPrefix ? $secondaryPrefix : $primaryPrefix;
            return;
        }

        if (
            ($isSecPrefix = in_array($secondaryPrefix, $networks['visafone'])) ||
            in_array($primaryPrefix, $networks['visafone'])
        ) {
            $this->networkName = "Visafone";
            $this->numberPrefix = $isSecPrefix ? $secondaryPrefix : $primaryPrefix;
            return;
        }

        if (
            ($isSecPrefix = in_array($secondaryPrefix, $networks['multilinks'])) ||
            in_array($primaryPrefix, $networks['multilinks'])
        ) {
            $this->networkName = "Multilinks";
            $this->numberPrefix = $isSecPrefix ? $secondaryPrefix : $primaryPrefix;
            return;
        }

        $this->networkName = null;
    }
}