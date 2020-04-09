<?php
/**
 * Created by PhpStorm.
 * User: Wisdom Emenike
 * Date: 4/8/2020
 * Time: 8:37 PM
 */

namespace Netty\Traits;


trait NumberAttributes
{
    protected $networkName;
    protected $numberPrefix;

    /**
     * @return mixed
     */
    public function getNetworkName()
    {
        return $this->networkName;
    }

    /**
     * @return mixed
     */
    public function getNumberPrefix()
    {
        return $this->numberPrefix;
    }
}