<?php

use Illuminate\Database\Seeder;
use Agrinesia\Models\MitraSale;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class MitraSaleTableSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeds/mitra_sales.xlsx';
        $this->timestamps = '2021-06-23 00:00:00';
        
        parent::run(); 
    }
}
