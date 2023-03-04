<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    use HasFactory;

    // 追加
    public function times()
    {
        return $this->belongsToMany(Time::class)->withTimestamps();
    }
}
