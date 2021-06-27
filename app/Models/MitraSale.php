<?php

namespace Agrinesia\Models;

use Illuminate\Database\Eloquent\Model;

class MitraSale extends Model
{
    protected $fillable = [
        'sale_date',
        'sale_month',
        'sale_year',
        'sales_id',
        'sale_day',
        'mitra_name',
        'area_code',
        'mitra_type',
        'brand_code',
        'product_name',
        'package_code',
        'sales_val_a',
        'sales_val_b',
        'sales_target',
        'sales_vol_a',
        'sales_vol_b',
        'target_vol'
    ];

    public function Areas()
    {
        return $this->belongsTo(AreaCode::class,'area_code');
    }

    public function Brands()
    {
        return $this->belongsTo(Brand::class,'brand_code');
    }

    public function Variants()
    {
        return $this->belongsTo(BrandVariant::class,'product_name','variant_code');
    }
}
