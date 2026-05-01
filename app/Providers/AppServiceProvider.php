<?php

namespace App\Providers;

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
        if (config('app.env') === 'production') {
            $this->app['request']->server->set('HTTPS', true);
            
            // Paksa semua link dan aset menggunakan HTTPS
            \Illuminate\Support\Facades\URL::forceScheme('https');
            \Illuminate\Support\Facades\URL::forceRootUrl(config('app.url'));
            
            // Paksa session agar aman dan sinkron
            config([
                'session.secure' => true,
                'session.same_site' => 'lax',
                'session.driver' => 'database',
                'session.domain' => null,
                'app.asset_url' => config('app.url'),
            ]);
        }
    }
}
