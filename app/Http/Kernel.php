<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'hotelmanager.auth' => \App\Http\Middleware\RedirectIfNotHotelmanager::class,
        'hotelmanager.guest' => \App\Http\Middleware\RedirectIfHotelmanager::class,
        'hotelmanager.verified' => \App\Http\Middleware\EnsureEmailIsVerifiedOfHotelmanager::class,
        'hoteladmin.auth' => \App\Http\Middleware\RedirectIfNotHoteladmin::class,
        'hoteladmin.guest' => \App\Http\Middleware\RedirectIfHoteladmin::class,
        'hoteladmin.verified' => \App\Http\Middleware\EnsureEmailIsVerifiedOfHoteladmin::class,
        'hotel_admin.auth' => \App\Http\Middleware\RedirectIfNotHotelAdmin::class,
        'hotel_admin.guest' => \App\Http\Middleware\RedirectIfHotelAdmin::class,
        'hotel_admin.verified' => \App\Http\Middleware\EnsureEmailIsVerifiedOfHotelAdmin::class,
        'hotel.auth' => \App\Http\Middleware\RedirectIfNotHotel::class,
        'hotel.guest' => \App\Http\Middleware\RedirectIfHotel::class,
        'hotel.verified' => \App\Http\Middleware\EnsureEmailIsVerifiedOfHotel::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
