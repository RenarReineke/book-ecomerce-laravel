<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CartPolicy
{
    const MESSAGE = 'Ваших прав недостаточно';

    public function before(User $user): bool|null
    {
        if ($user->role->title === RoleEnum::Admin) {

            return true;
        }

        return null;
    }

    public function viewAny(User $user): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Cart $cart): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Cart $cart): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Cart $cart): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Cart $cart): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Cart $cart): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }
}
