<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PublisherPolicy
{
    public function before(User $user): bool|null
    {
        if ($user->role->title === RoleEnum::Admin) {

            return true;
        }

        if ($user->role->title === RoleEnum::Admin) {

            return false;
        }

        return null;
    }

    public function viewAny(User $user): Response
    {
        if ($user->role->title === RoleEnum::Manager) {
            return Response::allow();
        }

        return Response::deny('У вас нет прав на просмотр издателей');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Publisher $publisher): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Publisher $publisher): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Publisher $publisher): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Publisher $publisher): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Publisher $publisher): bool
    {
        //
    }
}
