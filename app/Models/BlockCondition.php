<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockCondition extends Model
{
    protected $table = "block_conditions";

    protected $fillable = [
        'parent_id',
        'condition_block_no',
        'choice_made'
    ];

    public function filters()
    {
        return $this->hasMany(FilterConditions::class, 'condition_block_no');
    }

    public function actions()
    {
        return $this->hasMany(ActionConditions::class, 'condition_block_no');
    }
}
