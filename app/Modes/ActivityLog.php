<?php

namespace Agrinesia\Modes;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
    	'subject',
    	'url',
    	'method',
    	'ip',
    	'agent',
    	'user_id',
	];
	
	public function creator()
	{
		return $this->belongsTo(User::class,'user_id');
	}
}
