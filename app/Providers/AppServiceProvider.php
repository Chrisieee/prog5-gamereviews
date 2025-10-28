<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Review;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('edit-review', function (User $user, Review $review) {
            if ($review->user->is($user)){
                return true;
            } else if ($user->admin){
                return true;
            }
        });

        Gate::define('delete-review', function (User $user, Review $review) {
            if ($review->user->is($user)){
                return true;
            } else if ($user->admin){
                return true;
            }
        });

        Gate::define('activate', function (User $user, Review $review) {
            return $user->admin;
        });
    }
}
