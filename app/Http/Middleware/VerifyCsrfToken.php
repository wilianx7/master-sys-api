<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/addresses',
        '/addresses/*',

        '/graduations',
        '/graduations/*',

        '/modalities',
        '/modalities/*',

        '/plans',
        '/plans/*',

        '/registrations',
        '/registrations/*',

        '/students',
        '/students/*',

        '/users',
        '/users/*',
    ];
}
