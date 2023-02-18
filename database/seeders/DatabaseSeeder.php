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
        $admin->name = "kafayat";
        $admin->email = "kafayat@kafayat.com";
        $admin->password = bcrypt('12345678');
        $admin->visible_password = "12345678";
        $admin->email_verified_at = NOW();
        $admin->occupation ="student";
        $admin->address ="moon";
        $admin->phone ="012690156";
        $admin->is_admin =0;
        $admin->save();





        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
