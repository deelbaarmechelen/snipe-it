<?php

use Rocketeer\Binaries\PackageManagers\Composer;

return [

    // Execution hooks
    //////////////////////////////////////////////////////////////////////

    'composer'     => [
        'install' => function (Composer $composer, $task) {
            return $composer->install([], ['--no-interaction' => null, '--prefer-dist' => null]);
        },
        'update'  => function (Composer $composer) {
            return $composer->update();
        },
    ],

];
