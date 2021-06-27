<?php

namespace Agrinesia\Models;

use Illuminate\Database\Eloquent\Model;

class BrandVariant extends Model
{
    protected $fillable = [
        'brand_code',
        'variant_code',
        'variant_name'
    ];
}
