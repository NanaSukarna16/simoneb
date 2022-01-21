<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $fillable = ['ipk', 'ips', 'tahun', 'semester_id', 'users_id'];

    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'users_id');
    }
}
