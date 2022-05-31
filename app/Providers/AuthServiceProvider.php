<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Listing;
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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-posts', function(User $user){
            if($user->id === 2)
                return true;
        });

        Gate::define('delete-post', function(User $user, Listing $listing){
            if($user->id === 2)
                return true;
        });

        Gate::define('update-post', function(User $user, Listing $listing) {
            if($user->id === 2)
                return true;
        });
    }
}
