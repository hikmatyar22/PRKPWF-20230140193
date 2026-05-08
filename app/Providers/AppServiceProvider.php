<?php

namespace App\Providers;

use Dedoc\Scramble\Support\Generator\OpenApi;
use Dedoc\Scramble\Support\Generator\SecurityScheme;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Route;
use Dedoc\Scramble\Scramble;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate untuk produk
        Gate::define('export-product', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('manage-product', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('access-category', function ($user) {
            return $user->role === 'admin';
        });

        // Gate untuk akses API Docs
        Gate::define('viewApiDocs', function () {
            return true;
        });

        // Konfigurasi Scramble (API Documentation)
        Scramble::configure()
            ->routes(function (Route $route) {
                return Str::startsWith($route->uri(), 'api/');
            })
            ->withDocumentTransformers(function (OpenApi $openApi){
                $openApi->secure(
                    SecurityScheme::http('Bearer')
                );
            });
    }
}