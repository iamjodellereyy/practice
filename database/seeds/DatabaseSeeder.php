<?php

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        //to create dummy users
        // factory('App\User',10)->create();

        //to create dummy users with post
        //chaing the each function then pulling out the user
        //posts() method creates the relationship then save to the database
        //inside save method I am entering a related model post this is going to work because I have the user id in the post table
        Factory('App\User',10)->create()->each(function($user){
            $user->posts()->save(factory('App\Post')->make());
        });
    }
}
