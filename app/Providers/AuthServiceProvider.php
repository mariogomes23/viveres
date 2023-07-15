<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //

        $this->registerPolicies();

        Gate::define('lista_usuarios', function (User $user) {
            return $user->hasPermission("index_user");
        });
        Gate::define('adicionar_usuarios', function (User $user) {
            return $user->hasPermission("create_user");
        });
        Gate::define('apagar_usuarios', function (User $user) {
            return $user->hasPermission("delete_user");
        });
        Gate::define('atualizar_usuarios', function (User $user) {
            return $user->hasPermission("edit_user");
        });









        Gate::define('lista_roles', function (User $user) {
            return $user->hasPermission("index_tipoUsuario");
        });
        Gate::define('adicionar_roles', function (User $user) {
            return $user->hasPermission("create_tipoUsuario");
        });
        Gate::define('apagar_roles', function (User $user) {
            return $user->hasPermission("delete_tipoUsuario");
        });
        Gate::define('atualizar_roles', function (User $user) {
            return $user->hasPermission("edit_tipoUsuario");
        });




        Gate::define('lista_viveres', function (User $user) {
            return $user->hasPermission("index_viveres");
        });
        Gate::define('adicionar_viveres', function (User $user) {
            return $user->hasPermission("create_viveres");
        });
        Gate::define('apagar_viveres', function (User $user) {
            return $user->hasPermission("delete_viveres");
        });
        Gate::define('atualizar_viveres', function (User $user) {
            return $user->hasPermission("edit_viveres");
        });







        Gate::define('lista_tipoViveres', function (User $user) {
            return $user->hasPermission("index_tipoViveres");
        });
        Gate::define('adicionar_tipoViveres', function (User $user) {
            return $user->hasPermission("create_tipoViveres");
        });
        Gate::define('apagar_tipoViveres', function (User $user) {
            return $user->hasPermission("delete_tipoViveres");
        });
        Gate::define('atualizar_tipoViveres', function (User $user) {
            return $user->hasPermission("edit_tipoViveres");
        });











    }
}
