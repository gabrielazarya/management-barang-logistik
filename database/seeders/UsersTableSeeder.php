<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Clear the users table
        User::query()->delete();

        $users = [
            [
                'name' => 'Gabriel Azarya',
                'email' => 'gabrielazarya99@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('gabriel321'),
            ],
            [
                'name' => 'Mahendra Mop',
                'email' => 'mop@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('mop321'),
            ],
            [
                'name' => 'Danis Batagor',
                'email' => 'danis@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('danis321'),
            ],
            [
                'name' => 'Arengga Pop Ice',
                'email' => 'arengga@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('arengga321'),
            ],
            [
                'name' => 'Ali Kaliper',
                'email' => 'ali@gmail.com',
                'role' => 'user',
                'password' => bcrypt('ali321'),
            ],
            [
                'name' => 'Dimas knalpot',
                'email' => 'dimas@gmail.com',
                'role' => 'user',
                'password' => bcrypt('dimas321'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
