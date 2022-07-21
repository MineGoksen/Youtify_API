<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends BaseVerifier
{
    protected $addHttpCookie = true;

    protected $except = [
        'api/*',
    ];
}
