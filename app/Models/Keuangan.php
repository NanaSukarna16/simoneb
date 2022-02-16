<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Carbon\Carbon as CarbonCarbon;

class Keuangan extends Model
{
    use HasFactory;
     protected $table = 'keuangan_usaha';

      public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
