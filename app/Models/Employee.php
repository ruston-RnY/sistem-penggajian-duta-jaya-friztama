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
        'nama', 'jabatan_id', 'telpon', 'tanggal_lahir', 'alamat', 'tanggal_masuk', 'foto'
    ];

    public function jabatan(){
        return $this->belongsTo(Position::class);
    }

    public function absensi(){
        return $this->hasOne(Attendance::class, 'karyawan_id', 'id');
    }

    public function pinjaman(){
        return $this->hasOne(Loan::class, 'karyawan_id', 'id');
    }
}
