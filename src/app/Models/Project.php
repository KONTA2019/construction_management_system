<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'projectname', 'budget_division', 'city', 'district', 'prefperson_incharge', 'vendorperson_in_charge', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    // protected $primaryKey = "project_id";
    public function record_timing()
    {
        // return $this->hasMany(RecordTiming::class,'project_id');
        return $this->hasMany('App\Models\RecordTiming','project_id');
    }
}
