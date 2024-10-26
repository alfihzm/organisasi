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
                'full_name' => 'Mohammad Alfi Hamzami',
                'NIM' => '19220821',
                'positions_id' => 1,
                'campuses_id' => 5,
                'email' => '19220821@bsi.ac.id',
                'password' => Hash::make('#SemangatOprec2024'),
            ],
            [
                'full_name' => 'Rendy Dwi Nugroho',
                'NIM' => '19210958',
                'positions_id' => 2,
                'campuses_id' => 5,
                'email' => '19210958@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Najma Zahira',
                'NIM' => '19221511',
                'positions_id' => 2,
                'campuses_id' => 10,
                'email' => '19221511@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Irsyad Elba Fikriyanto',
                'NIM' => '19211212',
                'positions_id' => 3,
                'campuses_id' => 6,
                'email' => '19211212@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Mohammad Alfi Hamzami',
                'NIM' => '01100001',
                'positions_id' => 4,
                'campuses_id' => 5,
                'email' => '01100001@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Ade Kurniawan',
                'NIM' => '19211006',
                'positions_id' => 1,
                'campuses_id' => 5,
                'email' => '19211006@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Irfan Satria Pratama',
                'NIM' => '19210120',
                'positions_id' => 4,
                'campuses_id' => 6,
                'email' => '19210120@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Putri Khairunisa',
                'NIM' => '19220538',
                'positions_id' => 4,
                'campuses_id' => 3,
                'email' => '19220538@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Pricillia Putri Salsabila',
                'NIM' => '12221373',
                'positions_id' => 4,
                'campuses_id' => 13,
                'email' => '12221373@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Ririn Anggraeny',
                'NIM' => '19221135',
                'positions_id' => 4,
                'campuses_id' => 3,
                'email' => '19221135@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Muhammad Agus Kurniawan',
                'NIM' => '19211064',
                'positions_id' => 4,
                'campuses_id' => 2,
                'email' => '19211064@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Erni Najiatusalamah',
                'NIM' => '19220797',
                'positions_id' => 4,
                'campuses_id' => 13,
                'email' => '19220797@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Mario Sahala Tua',
                'NIM' => '19220907',
                'positions_id' => 4,
                'campuses_id' => 8,
                'email' => '19220907@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Joshua Roy Timisela ',
                'NIM' => '19220900',
                'positions_id' => 4,
                'campuses_id' => 9,
                'email' => '19220900@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Zoddy Alrafi',
                'NIM' => '12221250',
                'positions_id' => 4,
                'campuses_id' => 9,
                'email' => '12221250@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Maria Salome Wona Weke',
                'NIM' => '19221514',
                'positions_id' => 4,
                'campuses_id' => 9,
                'email' => '19221514@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Dzaki Repi Nugroho',
                'NIM' => '19220477',
                'positions_id' => 4,
                'campuses_id' => 1,
                'email' => '19220477@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Hilma Naswa As Syauwah',
                'NIM' => '19220602',
                'positions_id' => 4,
                'campuses_id' => 10,
                'email' => '19220602@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Safri Rawaskho',
                'NIM' => '19221333',
                'positions_id' => 4,
                'campuses_id' => 13,
                'email' => '19221333@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Lia Maulia',
                'NIM' => '19220501',
                'positions_id' => 4,
                'campuses_id' => 3,
                'email' => '19220501@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Rizky Febrian',
                'NIM' => '19210698',
                'positions_id' => 4,
                'campuses_id' => 6,
                'email' => '19210698@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
            [
                'full_name' => 'Tester',
                'NIM' => '19220001',
                'positions_id' => 5,
                'campuses_id' => 6,
                'email' => '19220001@bsi.ac.id',
                'password' => Hash::make('#PanitiaOprec2024'),
            ],
        ];
        User::insert($users);
    }
}
