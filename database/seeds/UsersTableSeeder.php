<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super',
            'email' => 'super@example.com',
            'role_id' => 1,
            'password' => bcrypt('super'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role_id' => 2,
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name' => 'admin2',
            'email' => 'admin2@example.com',
            'role_id' => 2,
            'password' => bcrypt('admin2'),
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 10)->create();
    }
}
