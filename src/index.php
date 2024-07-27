<?php

declare(strict_types=1);

use App\App;

# Install Composer, please don't change this.

require_once file_exists(__DIR__ . '/vendor/autoload.php')
    ? __DIR__ . '/vendor/autoload.php'
    : __DIR__ . '/../vendor/autoload.php';

// Run your application here!

(new App)->prompt();

// If you are not using laravel/prompts you can keep everything running with a while loop

// while(true) {
//    // Go build something amazing.
// }
