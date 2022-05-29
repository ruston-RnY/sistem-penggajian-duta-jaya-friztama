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
        'karyawan_id', 'bonus', 'total_gaji'
    ];

    public function karyawan(){
        return $this->belongsTo(Employee::class);
    }
}
