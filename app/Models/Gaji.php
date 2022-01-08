<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = "gajis";

    protected $guarded = [];
    protected $fillable = ['name_karyawan', 'gaji_karyawan', 'tanggal', 'pending_jobs'];
}
