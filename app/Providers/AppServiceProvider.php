<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // Ta configuration existante pour la longueur des chaînes de caractères
        Schema::defaultStringLength(191);

        // 🚀 CONFIGURATION NGROK DIRECTE
        // Force Laravel à utiliser l'URL définie dans le .env pour générer les assets, CSS et liens
        if (env('APP_URL')) {
            URL::forceRootUrl(env('APP_URL'));
        }

        // Force le protocole HTTPS si l'URL du .env commence par https
        if (str_contains(env('APP_URL'), 'https://')) {
            URL::forceScheme('https');
        }
    }
}
