<?php

namespace App\Http\Controllers;

use App\Exports\RekapAPT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class rekapAPT_Controller extends Controller
{
    // Function Rekap Akreditasi Perguruan Tinggi
    public function rekap_apt()
    {
        // Ambil data untuk filter checkbox kabupaten/kota
        $kabupatenKota = DB::table('ref_wil_kota_kab')->get();

        // Ambil data untuk filter checkbox akreditasi, sekaligus ganti nama dan urutan data nya
        $akreditasi = DB::table('pt')
            ->select(
                DB::raw("
                    CASE peringkat_aipt
                        WHEN '-' THEN 'Tidak Terakreditasi'
                        WHEN 'A' THEN 'Terakreditasi A'
                        WHEN 'B' THEN 'Terakreditasi B'
                        WHEN 'C' THEN 'Terakreditasi C'
                        WHEN 'Unggul' THEN 'Unggul'
                        WHEN 'BS' THEN 'Baik Sekali'
                        WHEN 'Baik' THEN 'Baik'
                        ELSE 'Lainnya'
                    END AS peringkat_aipt_label"),
                'peringkat_aipt'
            )
            ->orderByRaw("
                    CASE peringkat_aipt
                        WHEN '-' THEN 0
                        WHEN 'A' THEN 1
                        WHEN 'B' THEN 2
                        WHEN 'C' THEN 3
                        WHEN 'Unggul' THEN 4
                        WHEN 'BS' THEN 5
                        WHEN 'Baik' THEN 6
                        ELSE 7
                    END
                ")
            ->distinct()
            ->get();

        // Menampilkan data ke view
        return view('admin.rekap_apt', compact('kabupatenKota', 'akreditasi'));
    }

    // Function untuk menangani proses filter
    public function prosesFilterAPT(Request $request)
    {
        // Ambil data filter dari request
        $selectedKabupatenKota = $request->input('kabupatenKota');
        $selectedAkreditasi = $request->input('akreditasi');
        $ptBaru = $request->input('ptBaru');
        $ptKadaluarsa = $request->input('ptKadaluarsa');
        $ptBantuanSPMI = $request->input('ptBantuanSPMI');

        // Simpan data filter dalam session
        session([
            'selectedKabupatenKota' => $selectedKabupatenKota,
            'selectedAkreditasi' => $selectedAkreditasi,
            'ptBaru' => $ptBaru,
            'ptKadaluarsa' => $ptKadaluarsa,
            'ptBantuanSPMI' => $ptBantuanSPMI
        ]);
        /*--------------------------------------------------------------
                        Data Hasil Rekapitulasi
                            setelah filter
        --------------------------------------------------------------*/
        $rekap = DB::table('pt')
            ->select(
                DB::raw('IFNULL(ref_bentukpt.namabentuk, "Belum Terdata") AS namabentuk'),
                DB::raw('SUM(CASE WHEN peringkat_aipt = "A" THEN 1 ELSE 0 END) AS A'),
                DB::raw('SUM(CASE WHEN peringkat_aipt = "B" THEN 1 ELSE 0 END) AS B'),
                DB::raw('SUM(CASE WHEN peringkat_aipt = "C" THEN 1 ELSE 0 END) AS C'),
                DB::raw('SUM(CASE WHEN peringkat_aipt = "Unggul" THEN 1 ELSE 0 END) AS Unggul'),
                DB::raw('SUM(CASE WHEN peringkat_aipt = "BS" THEN 1 ELSE 0 END) AS BS'),
                DB::raw('SUM(CASE WHEN peringkat_aipt = "Baik" THEN 1 ELSE 0 END) AS Baik'),
                DB::raw('SUM(CASE WHEN peringkat_aipt = "-" THEN 1 ELSE 0 END) AS TdkAkred'),
                DB::raw('SUM(CASE WHEN peringkat_aipt IN ("A", "B", "C", "Unggul", "BS", "Baik", "-") THEN 1 ELSE 0 END) AS TotalAkreditasi')
            )
            ->leftJoin('ref_bentukpt', DB::raw('LEFT(pt.kode_pt, 3)'), '=', 'ref_bentukpt.kodebentuk')
            ->Join('ref_wil_kota_kab', 'pt.kota_kabupaten', '=', 'ref_wil_kota_kab.kode_kotakab_dagri')
            ->where('pt.status_pt', 'A');

        /*--------------------------------------------------------------
                        Data Akreditasi Perguruan Tinggi 
                                setelah filter
        --------------------------------------------------------------*/
        $data = DB::table('pt')
            ->select(
                'pt.kode_pt',
                'pt.nama_pt',
                'pt.peringkat_aipt',
                'pt.kota_kabupaten',
                'pt.tgl_kadaluarsa_aipt',
                'ref_wil_kota_kab.nama_kota_kab'
            )
            ->join('ref_wil_kota_kab', 'pt.kota_kabupaten', '=', 'ref_wil_kota_kab.kode_kotakab_dagri')
            ->where('pt.status_pt', '=', 'A');

        // Filter berdasarkan kabupaten/kota
        if ($selectedKabupatenKota) {
            $rekap->whereIn('ref_wil_kota_kab.nama_kota_kab', $selectedKabupatenKota);
            $data->whereIn('ref_wil_kota_kab.nama_kota_kab', $selectedKabupatenKota);
        }

        // Filter berdasarkan akreditasi
        if ($selectedAkreditasi) {
            $rekap->whereIn('pt.peringkat_aipt', $selectedAkreditasi);
            $data->whereIn('pt.peringkat_aipt', $selectedAkreditasi);
        }

        // Filter berdasarkan checkbox PT baru < 2 tahun
        if ($ptBaru) {
            $twoYearsAgo = Carbon::now()->subYears(2);
            $rekap->whereDate('tgl_sk_pendirianpt', '>=', $twoYearsAgo);
            $rekap->whereDate('tgl_sk_pendirianpt', '<=', Carbon::now());
            $data->whereDate('tgl_sk_pendirianpt', '>=', $twoYearsAgo);
            $data->whereDate('tgl_sk_pendirianpt', '<=', Carbon::now());
        }

        // Filter berdasarkan checkbox ptKadaluarsa
        if ($ptKadaluarsa) {
            $oneMonthAgo = Carbon::now()->subMonth(); // Dapatkan tanggal 1 bulan yang lalu
            $rekap->whereDate('tgl_kadaluarsa_aipt', '>=', $oneMonthAgo); // Filter data yang kadaluarsa 1 bulan ke belakang
            $rekap->whereDate('tgl_kadaluarsa_aipt', '<=', Carbon::now()); // Filter data yang kadaluarsa 1 bulan ke belakang
            $data->whereDate('tgl_kadaluarsa_aipt', '>=', $oneMonthAgo); // Data lebih dari satu bulan lalu diabaikan
            $data->whereDate('tgl_kadaluarsa_aipt', '<=', Carbon::now()); // Data yang kurang dari satu bulan ditampilkan
        }

        // Filter berdasarkan checkbox PT Bantuan SPMI
        if ($ptBantuanSPMI) {
            $rekap->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('prodi')
                      ->whereRaw('prodi.kode_pt = pt.kode_pt')
                      ->where('prodi.status_prodi', '=', 'A')
                      ->groupBy('prodi.kode_pt')
                      ->havingRaw('ROUND((SUM(CASE WHEN peringkat_akreditasi_banpt IN ("Unggul", "BS", "A", "B") THEN 1 ELSE 0 END) * 100.0 / COUNT(*)), 2) <= 20');
            });
        }

        // Filter berdasarkan checkbox PT Bantuan SPMI
        if ($ptBantuanSPMI) {
            $data->leftJoin('prodi', 'pt.kode_pt', '=', 'prodi.kode_pt')
                ->selectRaw('
            pt.kode_pt,
            pt.nama_pt,
            pt.peringkat_aipt,
            pt.kota_kabupaten,
            pt.tgl_kadaluarsa_aipt,
            ref_wil_kota_kab.nama_kota_kab,
            SUM(CASE WHEN prodi.status_prodi = "A" AND prodi.peringkat_akreditasi_banpt IN ("Unggul", "BS", "A", "B") THEN 1 ELSE 0 END) AS ProdiLebih,
            COUNT(prodi.id) AS TotalProdi,
            ROUND((SUM(CASE WHEN prodi.status_prodi = "A" AND prodi.peringkat_akreditasi_banpt IN ("Unggul", "BS", "A", "B") THEN 1 ELSE 0 END) * 100.0 / COUNT(prodi.id)), 2) AS Persentase
         ')
                ->groupBy('pt.kode_pt', 'pt.nama_pt', 'pt.peringkat_aipt', 'pt.kota_kabupaten', 'pt.tgl_kadaluarsa_aipt', 'ref_wil_kota_kab.nama_kota_kab')
                ->having('Persentase', '<=', 20);
        }

        $rekap = $rekap
            ->groupBy('namabentuk')
            ->orderByRaw("
            CASE namabentuk
                WHEN 'Universitas' THEN 0
                WHEN 'Institut' THEN 1
                WHEN 'Sekolah Tinggi' THEN 2
                WHEN 'Akademi' THEN 3
                WHEN 'Politeknik' THEN 4
                WHEN 'Akademi Komunitas' THEN 5
            ELSE 6
            END
            ")
            ->get();

        // Menghitung total akreditasi masing-masing bentuk setelah filter
        $totalAkred = [
            'TotalA' => $rekap->sum('A'),
            'TotalB' => $rekap->sum('B'),
            'TotalC' => $rekap->sum('C'),
            'TotalUnggul' => $rekap->sum('Unggul'),
            'TotalBS' => $rekap->sum('BS'),
            'TotalBaik' => $rekap->sum('Baik'),
            'TotalTdkAkred' => $rekap->sum('TdkAkred'),
        ];

        // Menghitung total semua akreditasi setelah filter
        $total_semua_akred = $rekap->sum('TotalAkreditasi');

        $data = $data
            ->orderBy('pt.peringkat_aipt') // Urutkan berdasarkan kolom peringkat
            ->get();

        foreach ($data as $pt) {
            $tgl_kadaluarsa = Carbon::parse($pt->tgl_kadaluarsa_aipt);
            $diff = $tgl_kadaluarsa->diff(Carbon::now());

            // kondisi untuk menentukan apakah sudah kadaluarsa
            if ($tgl_kadaluarsa->isPast()) {
                $pt->sisa_kadaluarsa = "Kadaluarsa";
            } else {
                $pt->sisa_kadaluarsa = $diff->format('%y Tahun %m Bulan %d Hari');
            }
        }

        return view('admin.rekap_apt_filter', compact('rekap', 'data', 'totalAkred', 'total_semua_akred'));
    }

    // Ekspor data ke Excel
    public function exportToExcelAPT(Request $request)
    {
        // Ambil data filter dari session
        $kabupatenKota = $request->session()->get('selectedKabupatenKota', []);
        $akreditasi = $request->session()->get('selectedAkreditasi', []);
        $ptBaru = $request->session()->get('ptBaru', false); // Tambahkan filter ptBaru
        $ptKadaluarsa = $request->session()->get('ptKadaluarsa', false); // Tambahkan filter ptKadaluarsa
        $ptBantuanSPMI = $request->session()->get('ptBantuanSPMI', false);

        // Filter data berdasarkan checkbox yang dipilih
        $data = DB::table('pt')
            ->select(
                'pt.kode_pt',
                'pt.nama_pt',
                'pt.peringkat_aipt',
                'pt.kota_kabupaten',
                'pt.tgl_kadaluarsa_aipt',
                'ref_wil_kota_kab.nama_kota_kab',
                'ref_wil_provinsi.nama_provinsi', // Tambahkan kolom nama_provinsi
                'pt.nilai_aipt' // Tambahkan kolom nilai_aipt
            )
            ->join('ref_wil_kota_kab', 'pt.kota_kabupaten', '=', 'ref_wil_kota_kab.kode_kotakab_dagri')
            ->join('ref_wil_provinsi', 'pt.provinsi', '=', 'ref_wil_provinsi.kode_awal_provinsi_dagri')
            ->where('pt.status_pt', '=', 'A');

        if (!empty($kabupatenKota)) {
            $data->whereIn('ref_wil_kota_kab.nama_kota_kab', $kabupatenKota);
        }

        if (!empty($akreditasi)) {
            $data->whereIn('pt.peringkat_aipt', $akreditasi);
        }

        // Tambahkan filter untuk PT Baru < 2 Tahun
        if ($ptBaru) {
            $twoYearsAgo = Carbon::now()->subYears(2);
            $data->whereDate('tgl_sk_pendirianpt', '>=', $twoYearsAgo);
        }

        // Tambahkan filter untuk PT Kadaluarsa < 1 Bulan
        if ($ptKadaluarsa) {
            $oneMonthAgo = Carbon::now()->subMonth();
            $data->whereDate('tgl_kadaluarsa_aipt', '>=', $oneMonthAgo); // Data lebih dari satu bulan lalu diabaikan
            $data->whereDate('tgl_kadaluarsa_aipt', '<=', Carbon::now()); // Data yang kurang dari satu bulan ditampilkan
        }

        if ($ptBantuanSPMI) {
            $data->leftJoin('prodi', 'pt.kode_pt', '=', 'prodi.kode_pt')
                ->selectRaw("
                    pt.kode_pt,
                    pt.nama_pt,
                    pt.peringkat_aipt,
                    pt.kota_kabupaten,
                    pt.tgl_kadaluarsa_aipt,
                    ref_wil_kota_kab.nama_kota_kab,
                    ref_wil_provinsi.nama_provinsi,
                    pt.nilai_aipt,
                    SUM(CASE WHEN prodi.status_prodi = 'A' AND prodi.peringkat_akreditasi_banpt IN ('Unggul', 'BS', 'A', 'B') THEN 1 ELSE 0 END) AS ProdiLebih,
                    COUNT(prodi.id) AS TotalProdi,
                    ROUND((SUM(CASE WHEN prodi.status_prodi = 'A' AND prodi.peringkat_akreditasi_banpt IN ('Unggul', 'BS', 'A', 'B') THEN 1 ELSE 0 END) * 100.0 / COUNT(prodi.id)), 2) AS Persentase
                ")
                ->groupBy('pt.kode_pt', 'pt.nama_pt', 'pt.peringkat_aipt', 'pt.kota_kabupaten', 'pt.tgl_kadaluarsa_aipt', 'ref_wil_kota_kab.nama_kota_kab', 'ref_wil_provinsi.nama_provinsi', 'pt.nilai_aipt')
                ->having('Persentase', '<=', 20);
        }

        $data = $data->orderBy('pt.kota_kabupaten')->get();

        // Hitung dan format sisa kadaluarsa (tahun, bulan, hari)
        foreach ($data as $pt) {
            $tgl_kadaluarsa = Carbon::parse($pt->tgl_kadaluarsa_aipt);
            $diff = $tgl_kadaluarsa->diff(Carbon::now());

            // Format sisa kadaluarsa ke tahun, bulan, dan hari
            $pt->sisa_kadaluarsa_tahun = $diff->y;
            $pt->sisa_kadaluarsa_bulan = $diff->m;
            $pt->sisa_kadaluarsa_hari = $diff->d;
        }

        // Ekspor data ke Excel
        return Excel::download(new RekapAPT($data), 'Rekap Data APT.xlsx');
    }
}
