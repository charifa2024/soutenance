<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_user_relation extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class);
}
public function task()
{
    return $this->belongsTo(assigned_task::class, 'task_id');
}


}
