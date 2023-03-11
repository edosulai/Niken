<?php

use App\Models\Alternatif;
use Illuminate\Support\Carbon;
use App\Models\Stok;
use App\Models\Inclusion;
use App\Models\Expending;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', function () {
        if (Auth::user()->hasRole(['admin', 'karyawan'])) {
            $outcome = Expending::selectRaw("JSON_EXTRACT(stok_data, '$.hrg_jual') * jumlah as outcome_price, jumlah")
                ->whereYear('expendings.created_at', '=', Carbon::now()->year)
                ->whereMonth('expendings.created_at', '=', Carbon::now()->month)
                ->get();

            $income = Inclusion::selectRaw("JSON_EXTRACT(stok_data, '$.hrg_jual') * jumlah as income_price, jumlah")
                ->whereYear('created_at', '=', Carbon::now()->year)
                ->whereMonth('created_at', '=', Carbon::now()->month)
                ->get();

            return view('dashboard.index', [
                'title' => 'Dashboard',
                'total' => Stok::all()->sum('stok'),
                'keluar' => $income->sum('jumlah'),
                'masuk' => $outcome->sum('jumlah'),
                'pengeluaran' => $outcome->sum('outcome_price'),
                'pendapatan' => $income->sum('income_price'),
            ]);
        } else if (Auth::user()->hasRole('pemasok')) {
            return view('dashboard.jumbotron', [
                'title' => 'Selamat Datang di ' . config('app.name', 'Laravel')
            ]);
        } else {
            return view('dashboard.waiting', [
                'title' => 'Selamat Datang di ' . config('app.name', 'Laravel')
            ]);
        }
    })->name('dashboard');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/pengguna', fn () => view('dashboard.user', ['title' => 'Pengguna']))->name('pengguna.index');
        Route::get('/stok', fn () => view('dashboard.stok', ['title' => 'Stok']))->name('stok.index');
        Route::get('/status', fn () => view('dashboard.status', ['title' => 'Status Pengiriman']))->name('status.index');

        Route::get('/verify', fn () => view('dashboard.verify', ['title' => 'Daftar Verifikasi Akun']))->name('verify.index');
        Route::get('/kriteria', fn () => view('dashboard.kriteria', ['title' => 'Daftar Kriteria']))->name('kriteria.index');
        Route::get('/alternatif', fn () => view('dashboard.alternatif', ['title' => 'Daftar Alternatif']))->name('alternatif.index');

        Route::get('/weighted', function () {
            return view('dashboard.weighted', [
                'title' => 'Perhitungan WP',
                'alternatif' => Alternatif::selectRaw("alternatifs.k_value, stoks.nama as stoks_nama")
                    ->join('stoks', 'alternatifs.stok_id', '=', 'stoks.id')
                    ->orderBy('alternatifs.created_at')
                    ->get(),
                'kriteria' => Kriteria::select()->orderBy('kriterias.created_at')->get()
            ]);
        })->name('weighted.index');
    });

    Route::group(['middleware' => ['role:admin|karyawan']], function () {
        Route::get('/terjual', fn () => view('dashboard.inclusion', ['title' => 'Stok Keluar']))->name('terjual.index');
    });

    Route::group(['middleware' => ['role:admin|pemasok']], function () {
        Route::get('/tertunda', fn () => view('dashboard.expending', ['title' => 'Permintaan Supply']))->name('tertunda.index');
    });
});

Route::get('/testing', function () {
    $alternatif = Alternatif::selectRaw("alternatifs.k_value, stoks.nama as stoks_nama")
        ->join('stoks', 'alternatifs.stok_id', '=', 'stoks.id')
        ->orderBy('alternatifs.created_at')
        ->get();

    $kriteria = Kriteria::select()->orderBy('kriterias.created_at')->get();

    $k = $kriteria->count();
    $a = $alternatif->count();

    $tkep = 0;
    $tbkep = 0;

    for ($i = 0; $i < $k; $i++) {
        $tkep = $tkep + $kriteria[$i]->kepentingan;
    }

    for ($i = 0; $i < $k; $i++) {
        $bkep[$i] = ($kriteria[$i]->kepentingan / $tkep);
        $tbkep = $tbkep + $bkep[$i];
    }

    for ($i = 0; $i < $k; $i++) {
        if ($kriteria[$i]->tipe == "cost") {
            $pangkat[$i] = (-1) * $bkep[$i];
        } else {
            $pangkat[$i] = $bkep[$i];
        }
    }

    for ($i = 0; $i < $a; $i++) {
        for ($j = 0; $j < $k; $j++) {
            $s[$i][$j] = pow(($alternatif[$i]['k_value'][$j]), $pangkat[$j]);
        }
        $ss[$i] = $s[$i][0] * $s[$i][1] * $s[$i][2] * $s[$i][3] * $s[$i][4];
    }

    echo "<b>Hasil Akhir</b></br>";
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<thead><tr><th>Alternatif</th><th>V</th></tr></thead>";
    $total = 0;
    for ($i = 0; $i < $a; $i++) {
        $total = $total + $ss[$i];
    }
    for ($i = 0; $i < $a; $i++) {
        echo "<tr><td><b>" . $alternatif[$i]['stoks_nama'] . "</b></td>";
        $v[$i] = round($ss[$i] / $total, 6);
        echo "<td>" . $v[$i] . "</td></tr>";
    }
    echo "</table><hr>";

    // dd(key($alternatif->map(fn ($x) => $x['stoks_nama'])));
    // $arl2 = key($alternatif->map(fn ($x) => $x['stoks_nama'])) + 1;

    // uasort($v, 'cmp');
    // for ($i = 0; $i < $arl2; $i++) { //new for 8 lines below
    //     if ($i == 0)
    //         echo "<div class='alert alert-dismissible alert-info'><b><i>Dari tabel tersebut dapat disimpulkan bahwa " . $alt_name[array_search((end($v)), $v)] . " mempunyai hasil paling tinggi, yaitu " . current($v);
    //     elseif ($i == ($arl2 - 1))
    //         echo "</br>Dan terakhir " . $alt_name[array_search((prev($v)), $v)] . " dengan nilai " . current($v) . ".</i></b></div>";
    //     else
    //         echo "</br>Lalu diikuti dengan " . $alt_name[array_search((prev($v)), $v)] . " dengan nilai " . current($v);
    // }
});
