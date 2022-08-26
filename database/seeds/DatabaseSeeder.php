<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'doctor']);
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'patient']);
        User::create(['name'=>'rafael','email'=>'rafaelravelli@it4d.com.br','role_id'=>'1','password'=>'$2y$10$AchQ7DUJ2KNX6aSP91.AVOD7YorqUlqzoxalZpQ4nYMGCbpyudTp2','gender'=>'male']);
        User::create(['name'=>'newton','email'=>'newton@it4d.com.br','role_id'=>'2','password'=>'$2y$10$AchQ7DUJ2KNX6aSP91.AVOD7YorqUlqzoxalZpQ4nYMGCbpyudTp2','gender'=>'male']);
    }
}
