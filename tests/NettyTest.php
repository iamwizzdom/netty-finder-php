<?php
/**
 * Created by PhpStorm.
 * User: Wisdom Emenike
 * Date: 4/8/2020
 * Time: 10:22 PM
 */

namespace Netty\Tests;


use Netty\NetworkDetect;
use PHPUnit\Framework\TestCase;

class NettyTest extends TestCase
{
    private $netty;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->netty = new NetworkDetect("09014048765");
    }

    public function testGetNetworkName() {

        $this->assertEquals("Airtel", $this->netty->getNetworkName());
    }

    public function testGetNumberPrefix() {

        $this->assertEquals("0901", $this->netty->getNumberPrefix());
    }
}