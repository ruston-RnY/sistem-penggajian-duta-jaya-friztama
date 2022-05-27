<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'karyawan_id', 'tanggal_pinjaman', 'jumlah_pinjaman', 'jumlah_angsuran', 'keterangan'
    ];

    public function karyawan(){
        return $this->belongsTo(Employee::class);
    } 
}
