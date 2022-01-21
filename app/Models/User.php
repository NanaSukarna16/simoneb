<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'users';
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
        'email',
        'nim',
        'angkatan',
        'alamat',
        'prodi',
        'provinsi',
        'hp',
        'beasiswa',
        'password',
        'foto',
        'angkatan_id',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function karya()
    {
        return $this->belongsTo(\App\Models\Karya::class, 'users_id');
    }
    public function mentoring()
    {
        return $this->belongsTo(\App\Models\Mentoring::class, 'users_id');
    }
    public function forum()
    {
        return $this->belongsTo(\App\Models\Forum::class, 'users_id');
    }
    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class, 'users_id');
    }
    public function tahsin()
    {
        return $this->belongsTo(\App\Models\Tahsin::class, 'users_id');
    }
    public function mhs()
    {
        return $this->belongsTo(\App\Models\Mhs::class, 'users_id');
    }
    public function sosial()
    {
        return $this->belongsTo(\App\Models\Sosial::class, 'users_id');
    }
    public function org_mhs()
    {
        return $this->belongsTo(\App\Models\Org_mhs::class, 'users_id');
    }
    public function beasiswa()
    {
        return $this->belongsTo(\App\Models\Beasiswa::class, 'users_id');
    }
    public function nilai()
    {
        return $this->belongsToMany(\App\Models\Nilai::class, 'users_id');
    }
}
