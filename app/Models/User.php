<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Nama kolom primary key.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_pt',
        'nama_lengkap',
        'email_address',
        'no_handphone',
        'jabatan',
        'user_name',
        'pass_word',
        'user_level',
        'user_status',
        'email_verified',
        'api_token',
        'is_verified',
        'uuid',
    ];

    /**
     * Atribut yang harus disembunyikan untuk serialisasi.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    /**
     * Atribut yang harus di-cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
    ];

    /**
     * Atribut yang harus dimutasi ke tanggal.
     *
     * @var array<string>
     */
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
