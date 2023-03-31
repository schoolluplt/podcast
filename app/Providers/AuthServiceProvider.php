<?php

namespace App\Providers;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */

    public function boot(): void
    {
//        Forbid access to edit and delete function for users who are not the original creator
        Gate::define('edit-podcasts', function (User $user, Podcast $podcast) {
            return $user->is_admin || $user->id === $podcast->user_id;
        });
        Gate::define('edit-users', function (User $user) {
            return $user->is_admin === $user->id;
        });
    }
}
