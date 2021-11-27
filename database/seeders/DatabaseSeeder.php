<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => 'user']);
        Role::firstOrCreate(['name' => 'administrator']);

        //Create the administrative user
        $admin = User::firstOrNew([
            'role_id' => 2,
            'name' => "Admin",
            'email' => 'admin@admin.com',
        ]);

        $admin->password = Hash::make('password');
        $admin->email_verified_at = now();

        $admin->save();

        //Create a default user
        $user = User::firstOrNew([
            'role_id' => 1,
            'name' => "User",
            'email' => 'user@user.com',
        ]);

        $user->password = Hash::make('password');
        $user->email_verified_at = now();

        $user->save();




        Task::factory()->for($user)->count(20)->create();

        //Create users with default
        User::factory()->hasTasks(random_int(4, 20))->count(10)->create();
    }
}
