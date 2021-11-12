<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nom' => 'Admin',
                'prenom' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'admin',
                'validated' => 1,
                'is_admin' => '1',
            ],
            [
                'nom' => 'User1',
                'prenom' => 'us1',
                'email' => 'user@user.com',
                'password' => 'password',
                'validated' => 1,
                'is_admin' => null,
            ],
            [
                'nom' => 'User2',
                'prenom' => 'us2',
                'email' => 'user2@user.com',
                'password' => 'password',
                'validated' => 1,
                'is_admin' => null,
            ]
        ];
        foreach ($users as $user){
            User::create([
               'nom' => $user['nom'],
               'prenom' => $user['prenom'],
               'email' => $user['email'],
               'password' => Hash::make($user['password']),
                'validated' => $user['validated'],
                'is_admin' => $user['is_admin']
            ]);
        }
    }
}
