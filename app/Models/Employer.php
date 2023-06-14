<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik',
        'nama',
        'p_area',
        'personnel_subarea',
        'bagian',
        'job_group',
        'posisi_kerja',
        'jenis_kelamin',
        'edu_establishment',
        'tgl_lahir',
        'tgl_masuk',
        'kinerja',
        'ketepatan_waktu',
        'komunikasi',
        'kreatifitas',
        'kehadiran'
    ];
}
