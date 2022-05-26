<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'karyawan_id', 'tanggal', 'jam_kerja', 'jam_lembur', 'keterangan'
    ];

    public function karyawan(){
        return $this->belongsTo(Employee::class);
    }
}
