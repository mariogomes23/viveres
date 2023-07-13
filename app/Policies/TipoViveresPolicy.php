<?php

namespace App\Policies;

use App\Models\Tipo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TipoViveresPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasPermission("index_tipoViveres");
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tipo $tipo): bool
    {
        //
        return $user->hasPermission("index_tipoViveres");
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->hasPermission("create_tipoViveres");
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tipo $tipo): bool
    {
        //
        return $user->hasPermission("edit_tipoViveres");
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tipo $tipo): bool
    {
        //
        return $user->hasPermission("delete_tipoViveres");
    }

}
