<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class StoreEmployerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nik' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'p_area' => ['required', 'string'],
            'personnel_subarea' => ['required', 'string'],
            'bagian' => ['required', 'string'],
            'job_group' => ['required', 'string'],
            'posisi_kerja' => ['required', 'string'],
            'status' => ['required', 'string'],
            'jenis_kelamin' => ['required', Rule::in(['Male', 'Female'])],
            'edu_establishment' => ['required', Rule::in(['SD', 'Female'])],
            'tgl_lahir' => ['required', 'string'],
            'tgl_masuk' => ['required', 'string'],
            'jarak_alamat' => ['required', 'integer'],
            'kinerja' => ['required', 'integer'],
            'ketepatan_waktu' => ['required', 'integer'],
            'komunikasi' => ['required', 'integer'],
            'kreatifitas' => ['required', 'integer'],
            'kehadiran' => ['required', 'integer']
        ];
    }
}
