<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'http://localhost:8000/api/register',
        'http://localhost:8000/api/login',
        'http://localhost:8000/api/logout',
        'http://localhost:8000/api/contact',
        'http://localhost:8000/api/compile',
        'http://localhost:8000/api/solve/*',
        'http://localhost:8000/api/reset-password/*',
        'http://localhost:8000/api/change-password/*/*',
    ];
}
