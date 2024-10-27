<?php

namespace Database\Seeders;

use App\Models\Campuses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Campuses_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campuses = [
            [
                'kode_sektor' => 'JT',
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Jakarta',
                'image'       => 'organization.webp'
            ],
            [
                'kode_sektor' => 'BG',
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Bogor',
                'image'       => 'organization.webp'
            ],
            [
                'kode_sektor' => 'DK',
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Depok',
                'image'       => 'organization.webp'
            ],
            [
                'kode_sektor' => 'TG',
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Tangerang',
                'image'       => 'organization.webp'
            ],
            [
                'kode_sektor' => 'BK',
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Bekasi',
                'image'       => 'organization.webp'
            ],
            [
                'kode_sektor' => 'CJ',
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Cianjur',
                'image'       => 'organization.webp'
            ],
        ];
        Campuses::insert($campuses);
    }
}
