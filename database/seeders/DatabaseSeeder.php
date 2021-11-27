<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\TaskList;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => 'administrator']);

        //Create the administrative user
        $admin = User::firstOrNew([
            'role_id' => 1,
            'name' => "Admin",
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $admin->email_verified_at = now();

        $admin->save();


        TaskList::factory()->for($admin)->hasTasks(random_int(4, 20))->count(2)->create();

        //Create users with default
        User::factory()->has(
            TaskList::factory()->hasTasks(random_int(4, 20))->count(10)
        )->count(10)->create();
    }
}
