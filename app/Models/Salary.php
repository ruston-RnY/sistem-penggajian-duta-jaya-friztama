<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'karyawan_id', 'absensi_id', 'pinjaman_id', 'tanggal', 'bonus', 'upah_lembur', 'total_gaji' , 'sisa_pinjaman'
    ];

    public function karyawan(){
        return $this->belongsTo(Employee::class);
    }
}
