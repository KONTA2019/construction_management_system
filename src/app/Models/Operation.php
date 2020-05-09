<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{

    protected $fillable = [
        'first_operation_class', 'second_operation_class', 'third_operation_class', 'forth_operation_class', 'fifth_operation_class', 'sixth_operation_class', 'record_timing_id',
        'first_amount_name', 'first_amount', 'second_amount_name', 'second_amount', 'third_amount_name', 'third_amount', 'forth_amount_name', 'forth_amount',
        'reason_title', 'reason_text', 'meomo'
    ];

    public function record_timing()
    {
        return $this->belongsTo('App\Models\RecordTiming','record_timing');
    }
}
