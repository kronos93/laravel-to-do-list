<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'Samuel',
            'email' => 'samuel@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('demo'),
        ]);

        User::create([
            'name' => 'Pedro',
            'email' => 'pedro@gmail.com',
            'is_admin' => false,
            'password' => Hash::make('demo'),
        ]);

        User::create([
            'name' => 'Jose',
            'email' => 'jose@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('demo'),
        ]);
    }
}
