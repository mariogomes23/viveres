<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\Tipo;
use App\Models\User;
use App\Models\Vivere;
use App\Policies\RolePolicy;
use App\Policies\TipoViveresPolicy;
use App\Policies\UserPolicy;
use App\Policies\ViveresPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class=>RolePolicy::class,
        Vivere::class=>ViveresPolicy::class,
        Tipo::class=>TipoViveresPolicy::class,
        
    ];
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
    }
}
