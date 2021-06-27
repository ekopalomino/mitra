<?php

use Illuminate\Database\Seeder;
use Agrinesia\Models\AreaCode;

class AreaCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            'Jakarta',
            'Bogor',
            'Bandung',
            'Yogyakarta',
            'Surabaya',
            'Malang',
            'Medan',
            'Bali'
        ];

        foreach($areas as $area) {
            AreaCode::create(['area_name' => $area]);
        }
    }
}
