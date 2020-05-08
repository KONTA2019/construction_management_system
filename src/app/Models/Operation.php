<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{

    // protected $fillable = [
    //     'projectname', 'budget_division', 'city', 'district', 'prefperson_incharge', 'vendorperson_in_charge', 'user_id',
    // ];

    public function record_timing()
    {
        // return $this->belongsTo(RecordTiming::class);
        return $this->belongsTo('App\Models\RecordTiming','record_timing');
    }
}
