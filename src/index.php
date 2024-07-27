<?php

declare(strict_types=1);

use App\App;

require_once file_exists(__DIR__ . '/vendor/autoload.php')
    ? __DIR__ . '/vendor/autoload.php'
    : __DIR__ . '/../vendor/autoload.php';

(new App)->prompt();
