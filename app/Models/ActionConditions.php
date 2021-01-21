<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionConditions extends Model
{
    protected $table = "action_conditions";

    protected $fillable = [
        'parent_id',
        'condition_block_no',
        'condition_1',
        'condition_2',
        'condition_3',
        'condition_4',
        'condition_5',
        'condition_6',
        'date'
    ];
}
