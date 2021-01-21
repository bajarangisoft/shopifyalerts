<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertConditions extends Model
{
    protected $table = "alert_condition";

    protected $fillable = [
        'title',
        'description',
        'is_trigered',
        'condition_block_count'
    ];

    public function blocks()
    {
        return $this->hasMany(BlockCondition::class, 'parent_id');
    }

}
