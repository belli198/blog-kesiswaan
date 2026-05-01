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
            \Illuminate\Support\Facades\URL::forceScheme('https');
            \Illuminate\Support\Facades\URL::forceRootUrl(config('app.url'));
            
            // Paksa session agar aman dan sinkron
            config([
                'session.secure' => true,
                'session.same_site' => 'lax',
                'session.driver' => 'file',
                'session.domain' => null,
            ]);

            // Cek dan buat user admin otomatis jika belum ada (Fallback)
            try {
                \App\Models\User::updateOrCreate(
                    ['email' => 'admin@smk.sch.id'],
                    [
                        'name' => 'Administrator',
                        'password' => \Illuminate\Support\Facades\Hash::make('password')
                    ]
                );
            } catch (\Exception $e) {
                // Abaikan jika database belum siap
            }
        }
    }
}
