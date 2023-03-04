<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    // 追加
    public function risks()
    {
        return $this->belongsToMany(Risk::class)->withTimestamps();
    }
}
