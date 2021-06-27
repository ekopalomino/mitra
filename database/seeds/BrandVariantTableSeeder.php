<?php

use Illuminate\Database\Seeder;
use Agrinesia\Models\BrandVariant;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class BrandVariantTableSeeder extends SpreadsheetSeeder
{
    
    public function run()
    {
        $this->file = '/database/seeds/brand_variants.xls';
        $this->timestamps = '2021-06-23 00:00:00';
        
        parent::run();
    }
}
