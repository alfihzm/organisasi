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
                // GROUP DONE, IG DONE, TEMPLATE CV ??
                'kode_sektor' => 'HT',
                'group_wa'    => 'https://chat.whatsapp.com/GeeoLy2bLjY8oyjXc55aBp',
                'instagram'   => 'https://www.instagram.com/himsi.ubsicikarang',
                'template_cv' => null,
                'name'        => 'Cikarang',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP -, IG DONE, TEMPLATE CV -
                'kode_sektor' => 'HB',
                'group_wa'    => null,
                'instagram'   => 'https://www.instagram.com/himsicengkareng',
                'template_cv' => null,
                'name'        => 'Cengkareng',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP DONE, IG DONE, TEMPLATE CV DONE
                'kode_sektor' => 'HB',
                'group_wa'    => 'https://chat.whatsapp.com/E5NVaeLrRaXC8A8jslBjhZ',
                'instagram'   => 'https://www.instagram.com/himsicimone',
                'template_cv' => 'https://bit.ly/templatecv_cimone',
                'name'        => 'Cimone',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP -, IG DONE, TEMPLATE CV -
                'kode_sektor' => 'HP',
                'group_wa'    => null,
                'instagram'   => 'https://www.instagram.com/himsisamudra',
                'template_cv' => null,
                'name'        => 'Pemuda',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP DONE, IG DONE, TEMPLATE CV DONE
                'kode_sektor' => 'HB',
                'group_wa'    => 'https://chat.whatsapp.com/EtycyjOJPKvEEh5LHQ9LTp',
                'instagram'   => 'https://www.instagram.com/himsi_bsd',
                'template_cv' => 'https://www.canva.com/design/DAFyFfJhmF4/ELuLWdBOdYMoGtQ7yD3ZeQ/edit',
                'name'        => 'BSD',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP DONE, IG DONE, TEMPLATE CV DONE
                'kode_sektor' => 'HT',
                'group_wa'    => 'https://chat.whatsapp.com/CWvs0ebkOTxJwN6D1wmK11',
                'instagram'   => 'https://www.instagram.com/himsi.kaliabang',
                'template_cv' => 'https://www.canva.com/design/DAGN230HlTo/R3giQkRUfQO7Zy_NrjxpGQ/edit',
                'name'        => 'Kaliabang',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP DONE, IG DONE, TEMPLATE CV DONE
                'kode_sektor' => 'HT',
                'group_wa'    => 'https://chat.whatsapp.com/FX5ymZ6cRucLioz0HeVWY1',
                'instagram'   => 'https://www.instagram.com/himsi_cutmutiah',
                'template_cv' => 'https://bit.ly/cvhimsicutmutiah',
                'name'        => 'Cut Mutia',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP DONE, IG DONE, TEMPLATE CV DONE
                'kode_sektor' => 'HP',
                'group_wa'    => 'https://chat.whatsapp.com/FkOv7eGTiup614zxoZPI4z',
                'instagram'   => 'https://www.instagram.com/himsimarwati',
                'template_cv' => 'https://bit.ly/TemplateCVmarwati',
                'name'        => 'Margonda',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP -, IG DONE, TEMPLATE CV -
                'kode_sektor' => 'HP',
                'group_wa'    => null,
                'instagram'   => 'https://www.instagram.com/himsisamudra',
                'template_cv' => null,
                'name'        => 'Kramat 98',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP DONE, IG DONE, TEMPLATE CV DONE
                'kode_sektor' => null,
                'group_wa'    => 'https://chat.whatsapp.com/FkOv7eGTiup614zxoZPI4z',
                'instagram'   => 'https://www.instagram.com/himsimarwati',
                'template_cv' => 'https://bit.ly/TemplateCVmarwati',
                'name'        => 'Fatmawati',
                'image'       => 'bsi.webp'
            ],
            [
                'kode_sektor' => null,
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Ciputat',
                'image'       => 'bsi.webp'
            ],
            [
                'kode_sektor' => null,
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Ciledug',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP -, IG DONE, TEMPLATE CV -
                'kode_sektor' => null,
                'group_wa'    => null,
                'instagram'   => 'https://www.instagram.com/himsisamudra',
                'template_cv' => null,
                'name'        => 'Dewi Sartika',
                'image'       => 'bsi.webp'
            ],
            [
                // GROUP DONE, IG DONE, TEMPLATE CV DONE
                'kode_sektor' => null,
                'group_wa'    => 'https://chat.whatsapp.com/FX5ymZ6cRucLioz0HeVWY1',
                'instagram'   => 'https://www.instagram.com/himsi_cutmutiah/',
                'template_cv' => 'https://bit.ly/cvhimsicutmutiah',
                'name'        => 'Kalimalang',
                'image'       => 'bsi.webp'
            ],
            [
                'kode_sektor' => null,
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Cibitung',
                'image'       => 'bsi.webp'
            ],
            [
                'kode_sektor' => null,
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Slipi',
                'image'       => 'bsi.webp'
            ],
            [
                'kode_sektor' => null,
                'group_wa'    => null,
                'instagram'   => null,
                'template_cv' => null,
                'name'        => 'Jatiwaringin',
                'image'       => 'bsi.webp'
            ],
        ];
        Campuses::insert($campuses);
    }
}