<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama', 'email', 'telpon', 'tanggal_lahir', 'alamat', 'gaji', 'tanggal_masuk', 'foto'
    ];
}
