<?php

namespace Agrinesia\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessDetail extends Model
{
    protected $fillable = [
        'registrant_id',
        'process_time',
        'status_id',
        'execute_by',
        'notes',
    ];

    public function Parent()
    {
        return $this->belongsTo(Process::class,'registrant_id');
    }

    public function Statuses()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
}