<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        'admin/profile/update-user-profile',
        'admin/profile/update-user-password',
        'admin/forgot-password',
    ];
}
