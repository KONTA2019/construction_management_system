<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordTiming extends Model
{
    protected $fillable = [
        'specific', 'span', 'period', 'project_id',
    ];
    
    protected $primaryKey = "record_timing_id";

    public function project()
    {
        // return $this->belongsTo(Project::class,'project_id');
        return $this->belongsTo('App\Models\Project','project_id');
    }

    public function operation()
    {
        // return $this->hasOne(Operation::class,'record_id');
        return $this->hasOne('App\Models\Operation','record_id');
    }

}
