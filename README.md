# NettyFinder :rocket:

This is a PHP version of the original [netty-finder](https://github.com/BolajiAyodeji/netty-finder) that was written in JavaScript

# Installation

## GitHub

```bash
$ git clone https://github.com/iamwizzdom/netty-finder-php.git
$ cd netty-finder-php
$ composer install
```

## PHP

```bash
$ composer require iamwizzdom/netty-finder-php
```

# Usage

```php

require 'vendor/autoload.php';

$detector = new Netty\NetworkDetect("09014048764");

$networkName = $detector->getNetworkName();
$numberPrefix = $detector->getNumberPrefix();

echo $networkName; //--> Airtel
echo $numberPrefix; //--> 0901

```

# About Author

This was originally built by [Bolaji Ayodeji](https://github.com/BolajiAyodeji) so all rights goes to him, I only rewrote the library in PHP with a little modification to accept phone numbers with country code.

# Contribution
 
For now, I dont accept contributions except its from the javascript [netty_finder](https://github.com/BolajiAyodeji/netty-finder), so I suggest you contribute there. Any changes from there will be added to the PHP version.

