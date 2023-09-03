<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Employer/Index', [
            'data' => Employer::select('*')->orderBy('created_at', 'desc')->get(),
            'status' => session('status'),
        ])->toResponse($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return Inertia::render('Employer/Form', [
            'title' => 'Tambah Karyawan',
            'employers' => Employer::select('*')->orderBy('created_at', 'desc')->get(),
            'status' => session('status'),
        ])->toResponse($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployerRequest $request)
    {
        Employer::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'p_area' => $request->p_area,
            'personnel_subarea' => $request->personnel_subarea,
            'bagian' => $request->bagian,
            'job_group' => $request->job_group,
            'posisi_kerja' => $request->posisi_kerja,
            // 'status' => $request->status,
            'jenis_kelamin' => $request->jenis_kelamin,
            'edu_establishment' => $request->edu_establishment,
            'tgl_lahir' => Carbon::parse($request->tgl_lahir)->toDateString(),
            'tgl_masuk' => Carbon::parse($request->tgl_masuk)->toDateString(),
            // 'jarak_alamat' => $request->jarak_alamat,
            'kinerja' => $request->kinerja,
            'ketepatan_waktu' => $request->ketepatan_waktu,
            'komunikasi' => $request->komunikasi,
            'kreatifitas' => $request->kreatifitas,
            'kehadiran' => $request->kehadiran,
        ]);

        return redirect()->route('dashboard', ['status' => 'Data Karyawan Berhasil di Tambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Employer $employer)
    {
        $employer = $employer->find($request->id);
        if (is_null($employer))
            return abort(404);

        return Inertia::render('Employer/Form', [
            'title' => 'Edit Data Karyawan',
            'status' => session('status'),
            'terpilih' => $employer,
            'employers' => Employer::all(),
        ])->toResponse($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployerRequest  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        $employer = $employer->find($request->id);
        if (is_null($employer))
            return abort(400);

        $employer->nik = $request->nik;
        $employer->nama = $request->nama;
        $employer->p_area = $request->p_area;
        $employer->personnel_subarea = $request->personnel_subarea;
        $employer->bagian = $request->bagian;
        $employer->job_group = $request->job_group;
        $employer->posisi_kerja = $request->posisi_kerja;
        // $employer->status = $request->status;
        $employer->jenis_kelamin = $request->jenis_kelamin;
        $employer->edu_establishment = $request->edu_establishment;
        $employer->tgl_lahir = Carbon::parse($request->tgl_lahir)->toDateString();
        $employer->tgl_masuk = Carbon::parse($request->tgl_masuk)->toDateString();
        // $employer->jarak_alamat = $request->jarak_alamat;
        $employer->kinerja = $request->kinerja;
        $employer->ketepatan_waktu = $request->ketepatan_waktu;
        $employer->komunikasi = $request->komunikasi;
        $employer->kreatifitas = $request->kreatifitas;
        $employer->kehadiran = $request->kehadiran;
        $employer->save();

        return redirect()->route('dashboard', ['status' => 'Data Karyawan ' . $request->nama . ' Berhasil di Ubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Employer $employer)
    {
        $validator = Validator::make(['id' => $request->id], [
            'id' => ['required', 'integer', 'exists:' . Employer::class . ',id'],
        ]);

        if ($validator->fails()) {
            return redirect("dashboard")
                ->withErrors($validator)
                ->withInput();
        }

        $employer = $employer->find($request->id);
        $employer->delete();

        return redirect()->route('dashboard', ['status' => 'Data Karyawan ' . $employer->nama . ' Berhasil di Hapus']);
    }
}
