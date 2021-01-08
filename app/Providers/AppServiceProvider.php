<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies=[
        'App\Model'=>'App\Policies\ModelPolicy'
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param Gate $gate
     * @return void
     */
    public function boot(Gate $gate)
    {
        //
        $this->registerPolicies($gate);
        $gate->define('isSuper',function ($user){
            return $user->role->role ==='Super Admin';
        });
        $gate->define('isDeveloper',function ($user){
            return $user->role->role ==='Developer';
        });
        $gate->define('isMarketer',function ($user){
            return $user->role->role ==='Marketer';
        });
    }
}
