<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Review;
use App\Models\Comment;
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
            } else {
                return false;
            }
        });

        Gate::define('activate', function (User $user, Review $review) {
            return $user->admin;
        });

        Gate::define('review-make', function (User $user) {
            $query = Comment::with(['user'])->where('user_id', '=', $user->id )->get()->count();
            if ($query >= 3) {
                return true;
            } else {
                return false;
            }
        });
    }
}
