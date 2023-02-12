<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new user();
        $admin->name = "admin";
        $admin->email = "admin@admin.com";
        $admin->password = bcrypt('password');
        $admin->visible_password = "password";
        $admin->email_verified_at = NOW();
        $admin->occupation ="CEO";
        $admin->address ="ukraine";
        $admin->phone ="0731185943";
        $admin->is_admin =1;
        $admin->save();





        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
