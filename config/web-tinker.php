<?php

declare(strict_types=1);

return [

    // The web tinker page will be available on this path.
    'path' => '/tinker',

    // Possible values are 'auto', 'light' and 'dark'.
    'theme' => 'light',

    /*
     * By default this package will only run in local development.
     * Do not change this, unless you know what your are doing.
     */
    'enabled' => 'local' === env('APP_ENV'),
];
