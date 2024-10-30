<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User; // for gate
use App\Models\Comment; // for gate
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Gate::define('comment-delete', function (User $user, Comment $comment) {
                    // name                       neverChange      option
            return $user->id === $comment->user_id;
        });
    }
}
