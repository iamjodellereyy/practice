<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',

        //registering the policy
        //this is commented out because laravel doesnt need this if I use convention, laravel will find this automatically
        //convention means i create my policies inside the policies folder with the uppercase of every first letter of the word under the app folder then post fix the policy keyword
        //Post::class=>PostPolicy::class

        //with policies i have also access to the @can in the blade file
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
