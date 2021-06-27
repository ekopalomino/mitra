<?php

use Illuminate\Database\Seeder;
use Agrinesia\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
           'LBS',
           'LBS Bunder',
           'BSL',
           'BKT',
           'BKJ',
           'LKP',
           'BSM',
           'Almond Tart',
           'LNR',
           'BMS',
           'Pia Bali',
           'Strudel',
           'Surabi'
        ];

        foreach($brands as $brand) {
            Brand::create(['brand_name' => $brand]);
        }
    }
}
