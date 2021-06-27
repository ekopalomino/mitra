<?php

use Illuminate\Database\Seeder;
use Agrinesia\Models\BrandVariant;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class BrandVariantSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->file = '/dump_db/variant.xls'; // specify relative to Laravel project base path
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    
    public function run()
    {
        DB::disableQueryLog();
	    parent::run();
    }
}
