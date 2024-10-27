<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Users_seed extends Seeder
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
                'full_name' => 'Administrator',
                'NIM' => '19220821',
                'positions_id' => 1,
                'campuses_id' => 5,
                'email' => '19220821@bsi.ac.id',
                'password' => Hash::make('#Admin123'),
            ],
        ];
        User::insert($users);
    }
}
