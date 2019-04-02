<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Super administrator',
            'alias' => 'super'
        ]);

        Role::create([
            'name' => 'Administrator',
            'alias' => 'admin'
        ]);

        Role::create([
            'name' => 'User',
            'alias' => 'user'
        ]);
    }
}
