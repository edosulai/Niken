<?php

namespace App\Imports;

use App\Models\Employer;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Employer([
            'nik' => $row["nik"],
            'nama' => $row["nama"],
            'p_area' => $row["parea"],
            'personnel_subarea' => $row["personnel_subarea"],
            'bagian' => $row["bagian"],
            'job_group' => $row["job_group_text_new"],
            'posisi_kerja' => $row["posisi_kerja"],
            'status' => $row["status"],
            'jenis_kelamin' => $row["jenis_kelamin"],
            'edu_establishment' => $row["educational_establishment"],
            'tgl_lahir' => Carbon::createfromDate(1899, 12, 30)->addDays($row["tgl_lahir"]),
            'tgl_masuk' => Carbon::createfromDate(1899, 12, 30)->addDays($row["tgl_masuk"]),
            'jarak_alamat' => intval(preg_replace('/\s*km$/', '', $row["alamat"])),
            'kinerja' => intval($row["kinerja"]),
            'ketepatan_waktu' => intval($row["ketepatan_waktu"]),
            'komunikasi' => intval($row["komunikasi"]),
            'kreatifitas' => intval($row["kreatifitas"]),
            'kehadiran' => intval($row["kehadiran"]),
        ]);
    }

    /**
     * @return int
     */
    public function headingRow(): int
    {
        return 1;
    }
}