<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isStaff', function ($pengurus){
            if (Auth::guard('web')->check()) {
                return $pengurus->detailperan()->first()
                ->peran()->first()->peran == 'Staff';
            }
        });
        
        Gate::define('isGuru', function ($pengurus){
            if (Auth::guard('web')->check()) {
                return $pengurus->detailperan()->first()
                ->peran()->first()->peran == 'Guru';
            }
        });
        
        Gate::define('isSantri', function ($user){
            return Auth::guard('santri')->check();
        });
    }
}
