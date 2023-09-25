<?php

namespace App\Providers;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Auth\Access\Response;
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
        Gate::define('view-admin', function ($user) {
            if ($user->role->title !== RoleEnum::Client) {
                return Response::allow();
            }

            return Response::deny('У вас нет прав для просмотра этой страницы');
        });

        Gate::define('view-admin-profile', function (User $user, User $profile) {
            if ($user->id === $profile->id) {
                return Response::allow();
            }

            // if ($user->role->title === RoleEnum::Moderator) {
            //     return Response::allow();
            // }

            return Response::deny('У вас нет прав для просмотра чужого профиля');
        });

        Gate::define('view-author', function (User $user) {
            if ($user->role->title === RoleEnum::Manager) {
                return Response::allow();
            }

            return Response::deny('С вашей ролью сюда пропуска нет');
        });
    }
}
