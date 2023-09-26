<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
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
        if (in_array($user->role->title, [RoleEnum::Manager, RoleEnum::Moderator])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager, RoleEnum::Moderator])) {
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
    public function update(User $user, Product $product): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager, RoleEnum::Moderator])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager, RoleEnum::Moderator])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): Response
    {
        if (in_array($user->role->title, [RoleEnum::Manager])) {
            return Response::allow();
        }

        return Response::deny(static::MESSAGE);
    }
}
