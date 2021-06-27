<?php

namespace Agrinesia\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = [
        'registrant_name',
        'area_id',
        'sales_id',
        'sla_time',
        'sla_diff'
    ];

    public function Areas()
    {
        return $this->belongsTo(AreaCode::class,'area_id');
    }

    public function Sales()
    {
        return $this->belongsTo(User::class,'sales_id','sales_id');
    }

    public function Child()
    {
        return $this->hasMany(ProcessDetail::class);
    }
}
