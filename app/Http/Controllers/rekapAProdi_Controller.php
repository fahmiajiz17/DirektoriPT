<?php

namespace App\Http\Controllers;

use App\Exports\RekapAProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class rekapAProdi_Controller extends Controller
{
    // Function Rekap Akreditasi Program Studi
    public function rekap_aprodi()
    {
        // Ambil data untuk filter checkbox kabupaten/kota
        $kabupatenKota = DB::table('ref_wil_kota_kab')->get();

        // Ambil data untuk filter checkbox akreditasi, sekaligus ganti nama dan urutan data nya
        $akreditasi = DB::table('prodi')
            ->select(
                DB::raw("
                CASE peringkat_akreditasi_banpt
                WHEN 'A' THEN 'Terakreditasi A'
                WHEN 'B' THEN 'Terakreditasi B'
                WHEN 'C' THEN 'Terakreditasi C'
                WHEN 'Unggul' THEN 'Unggul'
                WHEN 'BS' THEN 'Baik Sekali'
                WHEN 'Baik' THEN 'Baik'
                WHEN '' THEN 'Belum Akreditasi'
                WHEN 'P' THEN 'Kadaluarsa'
                WHEN 'X' THEN 'Belum Terakreditasi'
                ELSE 'Lainnya'
            END AS peringkat_akreditasi_banpt_label"),
                'peringkat_akreditasi_banpt'
            )
            ->orderByRaw("
                    CASE peringkat_akreditasi_banpt
                        WHEN 'A' THEN 0
                        WHEN 'B' THEN 1
                        WHEN 'C' THEN 2
                        WHEN 'Baik' THEN 3
                        WHEN 'BS' THEN 4
                        WHEN 'Unggul' THEN 5
                        WHEN '' THEN 6
                        WHEN 'P' THEN 7
                        WHEN 'X' THEN 8
                        ELSE 9
                END
                ")
            ->distinct()
            ->get();


        // Menampilkan data ke view
        return view('admin.rekap_aprodi', compact('kabupatenKota', 'akreditasi'));
    }

    // Function untuk menangani proses filter
    public function prosesFilterAProdi(Request $request)
    {
        // Ambil data filter dari request
        $selectedKabupatenKota = $request->input('kabupatenKota');
        $selectedAkreditasi = $request->input('akreditasi');
        $prodiBaru = $request->input('prodiBaru');
        $prodiKadaluarsa = $request->input('prodiKadaluarsa');

        // Simpan data filter dalam session
        session(['selectedKabupatenKota' => $selectedKabupatenKota]);
        session(['selectedAkreditasi' => $selectedAkreditasi]);
        session(['prodiBaru' => $prodiBaru]);
        session(['prodiKadaluarsa' => $prodiKadaluarsa]);

        /*--------------------------------------------------------------
                        Data Hasil Rekapitulasi
                            setelah filter
        --------------------------------------------------------------*/
        $rekap = DB::table('prodi')
            ->select(
                DB::raw('IFNULL(ref_bentukpt.namabentuk, "Belum Terdata") AS namabentuk'),
                DB::raw('SUM(CASE WHEN peringkat_akreditasi_banpt = "A" THEN 1 ELSE 0 END) AS A'),
                DB::raw('SUM(CASE WHEN peringkat_akreditasi_banpt = "B" THEN 1 ELSE 0 END) AS B'),
                DB::raw('SUM(CASE WHEN peringkat_akreditasi_banpt = "C" THEN 1 ELSE 0 END) AS C'),
                DB::raw('SUM(CASE WHEN peringkat_akreditasi_banpt = "Unggul" THEN 1 ELSE 0 END) AS Unggul'),
                DB::raw('SUM(CASE WHEN peringkat_akreditasi_banpt = "BS" THEN 1 ELSE 0 END) AS BS'),
                DB::raw('SUM(CASE WHEN peringkat_akreditasi_banpt = "Baik" THEN 1 ELSE 0 END) AS Baik'),
                DB::raw('SUM(CASE WHEN peringkat_akreditasi_banpt IN ("", "P", "X") THEN 1 ELSE 0 END) AS TdkAkred'),
                DB::raw('SUM(CASE WHEN peringkat_akreditasi_banpt IN ("A", "B", "C", "Unggul", "BS", "Baik", "", "P", "X") THEN 1 ELSE 0 END) AS TotalAkreditasi')
            )
            ->leftJoin('ref_bentukpt', DB::raw('LEFT(prodi.kode_pt, 3)'), '=', 'ref_bentukpt.kodebentuk')
            ->leftJoin('pt', 'prodi.kode_pt', '=', 'pt.kode_pt') // Join tabel pt
            ->leftJoin('ref_wil_kota_kab', 'pt.kota_kabupaten', '=', 'ref_wil_kota_kab.kode_kotakab_dagri') // Join tabel ref_wil_kota_kab melalui tabel pt
            ->where('prodi.status_prodi', 'A');

        /*--------------------------------------------------------------
                        Data Akreditasi Perguruan Tinggi 
                                setelah filter
        --------------------------------------------------------------*/
        $data = DB::table('prodi')
            ->select(
                'prodi.kode_pt',
                'pt.nama_pt',
                'prodi.kode_prodi',
                'prodi.nama_prodi',
                'prodi.id_jenj_didik',
                'prodi.peringkat_akreditasi_banpt',
                'prodi.tgl_kadaluarsa_sk_akreditasi_banpt',
                'ref_jenjang_pendidikan.nm_jenj_didik',
                'ref_wil_kota_kab.nama_kota_kab'
            )
            ->join('ref_jenjang_pendidikan', 'prodi.id_jenj_didik', '=', 'ref_jenjang_pendidikan.id_jenj_didik')
            ->leftJoin('pt', 'prodi.kode_pt', '=', 'pt.kode_pt') // Join tabel pt
            ->leftJoin('ref_wil_kota_kab', 'pt.kota_kabupaten', '=', 'ref_wil_kota_kab.kode_kotakab_dagri') // Join tabel ref_wil_kota_kab melalui tabel pt
            ->where('prodi.status_prodi', '=', 'A');

        // Filter berdasarkan kabupaten/kota
        if ($selectedKabupatenKota) {
            $rekap->whereIn('ref_wil_kota_kab.nama_kota_kab', $selectedKabupatenKota);
            $data->whereIn('ref_wil_kota_kab.nama_kota_kab', $selectedKabupatenKota);
        }

        // Filter berdasarkan akreditasi
        if ($selectedAkreditasi) {
            $rekap->whereIn('prodi.peringkat_akreditasi_banpt', $selectedAkreditasi);
            $data->whereIn('prodi.peringkat_akreditasi_banpt', $selectedAkreditasi);
        }

        // Filter berdasarkan checkbox prodi baru < 2 tahun
        if ($prodiBaru) {
            $twoYearsAgo = Carbon::now()->subYears(2);
            $rekap->whereDate('tgl_sk_awal_pembukaan_prodi', '>=', $twoYearsAgo);
            $rekap->whereDate('tgl_sk_awal_pembukaan_prodi', '<=', Carbon::now());
            $data->whereDate('tgl_sk_awal_pembukaan_prodi', '>=', $twoYearsAgo);
            $data->whereDate('tgl_sk_awal_pembukaan_prodi', '<=', Carbon::now());
        }

        // Filter berdasarkan checkbox prodiKadaluarsa
        if ($prodiKadaluarsa) {
            $oneMonthAgo = Carbon::now()->subMonth(); // Dapatkan tanggal 1 bulan yang lalu
            $rekap->whereDate('tgl_kadaluarsa_sk_akreditasi_banpt', '>=', $oneMonthAgo); // Filter data yang kadaluarsa 1 bulan ke belakang
            $rekap->whereDate('tgl_kadaluarsa_sk_akreditasi_banpt', '<=', Carbon::now()); // Filter data yang kadaluarsa 1 bulan ke belakang
            $data->whereDate('tgl_kadaluarsa_sk_akreditasi_banpt', '>=', $oneMonthAgo); // Data lebih dari satu bulan lalu diabaikan
            $data->whereDate('tgl_kadaluarsa_sk_akreditasi_banpt', '<=', Carbon::now()); // Data yang kurang dari satu bulan ditampilkan
        }

        $rekap = $rekap
            ->whereNotNull('ref_wil_kota_kab.nama_kota_kab') // Hanya tampilkan data yang memiliki nama_kota_kab yang tidak kosong
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

        // Menghitung total akreditasi masing-masing bentuk
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
            ->whereNotNull('ref_wil_kota_kab.nama_kota_kab') // Hanya tampilkan data yang memiliki nama_kota_kab yang tidak kosong
            ->orderBy('prodi.peringkat_akreditasi_banpt') // Urutkan berdasarkan kolom peringkat
            ->get();

        foreach ($data as $prodi) {
            $tgl_kadaluarsa = Carbon::parse($prodi->tgl_kadaluarsa_sk_akreditasi_banpt);
            $diff = $tgl_kadaluarsa->diff(Carbon::now());

            // kondisi untuk menentukan apakah sudah kadaluarsa
            if ($tgl_kadaluarsa->isPast()) {
                $prodi->sisa_kadaluarsa = "Kadaluarsa";
            } else {
                $prodi->sisa_kadaluarsa = $diff->format('%y Tahun %m Bulan %d Hari');
            }
        }

        return view('admin.rekap_aprodi_filter', compact('rekap', 'data', 'totalAkred', 'total_semua_akred'));
    }

    // Ekspor data ke Excel
    public function exportToExcelAProdi(Request $request)
    {
        // Ambil data filter dari session
        $kabupatenKota = $request->session()->get('selectedKabupatenKota', []);
        $akreditasi = $request->session()->get('selectedAkreditasi', []);
        $prodiBaru = $request->session()->get('prodiBaru', false); // Tambahkan filter prodiBaru
        $prodiKadaluarsa = $request->session()->get('prodiKadaluarsa', false); // Tambahkan filter prodiKadaluarsa

        // Filter data berdasarkan checkbox yang dipilih
        $data = DB::table('prodi')
            ->select(
                'prodi.kode_pt',
                'pt.nama_pt',
                'prodi.kode_prodi',
                'prodi.nama_prodi',
                'prodi.id_jenj_didik',
                'prodi.peringkat_akreditasi_banpt',
                'prodi.tgl_kadaluarsa_sk_akreditasi_banpt',
                'ref_jenjang_pendidikan.nm_jenj_didik',
                'ref_wil_kota_kab.nama_kota_kab',
                'ref_wil_provinsi.nama_provinsi', // Tambahkan kolom nama_provinsi
                'prodi.nilai_akreditasi_banpt' // Tambahkan kolom nilai_aipt
            )
            ->join('ref_jenjang_pendidikan', 'prodi.id_jenj_didik', '=', 'ref_jenjang_pendidikan.id_jenj_didik')
            ->join('pt', 'prodi.kode_pt', '=', 'pt.kode_pt')
            ->join('ref_wil_kota_kab', 'pt.kota_kabupaten', '=', 'ref_wil_kota_kab.kode_kotakab_dagri')
            ->join('ref_wil_provinsi', 'pt.provinsi', '=', 'ref_wil_provinsi.kode_awal_provinsi_dagri')
            ->where('prodi.status_prodi', '=', 'A');

        if (!empty($kabupatenKota)) {
            $data->whereIn('ref_wil_kota_kab.nama_kota_kab', $kabupatenKota);
        }

        if (!empty($akreditasi)) {
            $data->whereIn('prodi.peringkat_akreditasi_banpt', $akreditasi);
        }

        // Tambahkan filter untuk Prodi Baru < 2 Tahun
        if ($prodiBaru) {
            $twoYearsAgo = Carbon::now()->subYears(2);
            $data->whereDate('tgl_sk_awal_pembukaan_prodi', '>=', $twoYearsAgo);
        }

        // Tambahkan filter untuk Prodi Kadaluarsa < 1 Bulan
        if ($prodiKadaluarsa) {
            $oneMonthAgo = Carbon::now()->subMonth();
            $data->whereDate('tgl_kadaluarsa_sk_akreditasi_banpt', '>=', $oneMonthAgo); // Data lebih dari satu bulan lalu diabaikan
            $data->whereDate('tgl_kadaluarsa_sk_akreditasi_banpt', '<=', Carbon::now()); // Data yang kurang dari satu bulan ditampilkan
        }

        $data = $data->orderBy('prodi.peringkat_akreditasi_banpt')->get();

        // Hitung dan format sisa kadaluarsa (tahun, bulan, hari)
        foreach ($data as $prodi) {
            $tgl_kadaluarsa = Carbon::parse($prodi->tgl_kadaluarsa_sk_akreditasi_banpt);
            $diff = $tgl_kadaluarsa->diff(Carbon::now());

            // Format sisa kadaluarsa ke tahun, bulan, dan hari
            $prodi->sisa_kadaluarsa_tahun = $diff->y;
            $prodi->sisa_kadaluarsa_bulan = $diff->m;
            $prodi->sisa_kadaluarsa_hari = $diff->d;
        }

        // Ekspor data ke Excel
        return Excel::download(new RekapAProdi($data), 'Rekap Data APS.xlsx');
    }
}
