<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'name'  => 'Administrador',
                'username'  => 'administrador',
                'email'  => 'admin@gmail.com.gt',
                'password'  => bcrypt('admin123'),
            ])->assignRole('SuperAdmin');
    }
}
