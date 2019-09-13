<?php

require __DIR__ . '/../vendor/autoload.php';


 \core\framework\Core::getInstance()->run();
Arr::get($_SERVER, 'REQUEST_METHOD', 'GET');