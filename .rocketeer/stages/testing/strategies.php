<?php

use Rocketeer\Binaries\PackageManagers\Composer;

return [

    // Execution hooks
    //////////////////////////////////////////////////////////////////////

    'composer'     => [
        'install' => function (Composer $composer, $task) {
            return $composer->install([], ['--no-interaction' => null, '--no-dev' => null, '--prefer-dist' => null]);
        },
        'update'  => function (Composer $composer) {
            return $composer->update();
        },
    ],

];
