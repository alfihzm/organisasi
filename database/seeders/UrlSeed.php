<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IsActiveUrl;

class UrlSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = [
            [
                'url'       => '/oprec/choose-campus',
                'is_active' => true
            ],
        ];
        IsActiveUrl::insert($url);
    }
}