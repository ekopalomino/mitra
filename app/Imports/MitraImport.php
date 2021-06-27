<?php

namespace Agrinesia\Imports;

use Agrinesia\Models\MitraSale;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MitraImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null

    */


    public function model(array $row)
    {
        return new MitraSale([
            'sale_date' => $row['sale_date'],
            'sale_month' => $row['sale_month'],
            'sale_year' => $row['sale_year'],
            'sales_id' => $row['sales_id'],
            'sale_day' => $row['sale_day'],
            'mitra_name' => $row['mitra_name'],
            'area_code' => $row['area_code'],
            'mitra_type' => $row['mitra_type'],
            'brand_code' => $row['brand_code'],
            'product_name' => $row['product_name'],
            'package_code' => $row['package_code'],
            'sales_val_a' => $row['sales_val_a'],
            'sales_val_b' => $row['sales_val_b'],
            'sales_target' => $row['sales_target'],
            'sales_vol_a' => $row['sales_vol_a'],
            'sales_vol_b' => $row['sales_vol_b'],
            'target_vol' => $row['target_vol'],
        ]);
    }
}
