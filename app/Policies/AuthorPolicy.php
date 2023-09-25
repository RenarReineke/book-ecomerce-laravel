<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\Author;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AuthorPolicy
{
    public function viewAny(User $user): bool
    {
        dd('Test');

        return $user->role->title === RoleEnum::Moderator;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Author $author): Response
    {
        dd('Test123');

        if ($user->role->title === RoleEnum::Manager) {
            return Response::allow();
        }

        return Response::deny('Вам сюда нельзя');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role->title === RoleEnum::Manager;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Author $author): bool
    {
        return $user->role->title === RoleEnum::Manager || RoleEnum::Moderator;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Author $author): bool
    {
        return $user->role->title === RoleEnum::Manager;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Author $author): bool
    {
        return $user->role->title === RoleEnum::Manager;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Author $author): bool
    {
        return $user->role->title === RoleEnum::Manager;
    }
}
