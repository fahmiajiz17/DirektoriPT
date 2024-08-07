<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        // Controller Total PT, Prodi, Bentuk PT, dan Wilayah
        $tpt = DB::table('pt')
            ->where('status_pt', 'A')
            ->count();

        $tprodi = DB::table('prodi')
            ->where('status_prodi', 'A')
            ->count();

        $tbentukpt = DB::table('ref_bentukpt')->count();
        $twilayah = DB::table('ref_wil_provinsi')->count();


        // Controller Chart PT
        $akred_pt = DB::table('pt')
            ->select('peringkat_aipt', DB::raw('count(*) as total'))
            ->where('status_pt', 'A')
            ->groupBy('peringkat_aipt')
            ->get();

        $AkredMapping = [
            '-' => 'Belum Akreditasi',
            'A' => 'Terakreditasi A',
            'B' => 'Terakreditasi B',
            'Baik' => 'Baik',
            'BS' => 'Baik Sekali',
            'Unggul' => 'Unggul'
        ];

        $akred_pt->transform(function ($item) use ($AkredMapping) {
            $item->peringkat_aipt = $AkredMapping[$item->peringkat_aipt];
            return $item;
        });


        // Controller Chart Prodi
        $akred_prodi = DB::table('prodi')
            ->select('peringkat_akreditasi_banpt', DB::raw('count(*) as total'))
            ->where('status_prodi', 'A')
            ->groupBy('peringkat_akreditasi_banpt')
            ->orderByRaw("
                CASE peringkat_akreditasi_banpt
                    WHEN 'A' THEN 0
                    WHEN 'B' THEN 1
                    WHEN 'Baik' THEN 2
                    WHEN 'BS' THEN 3
                    WHEN 'C' THEN 4
                    WHEN 'Unggul' THEN 5
                    WHEN '' THEN 6
                    WHEN 'P' THEN 7
                    WHEN 'X' THEN 8
                    ELSE 9
                END
            ")
            ->get();

        $AkredMapping = [
            'A' => 'Terakreditasi A',
            'B' => 'Terakreditasi B',
            'Baik' => 'Baik',
            'BS' => 'Baik Sekali',
            'C' => 'Terakreditasi C',
            'Unggul' => 'Unggul',
            '' => 'Belum Akreditasi',
            'P' => 'Kadaluarsa',
            'X' => 'Belum Terakreditasi'
        ];

        $akred_prodi->transform(function ($item) use ($AkredMapping) {
            $item->peringkat_akreditasi_banpt = $AkredMapping[$item->peringkat_akreditasi_banpt];
            return $item;
        });


        // Controller Chart Bentuk PT
        $bentukpt = DB::table('pt')
            ->select(DB::raw('IFNULL(ref_bentukpt.namabentuk, "Belum Terdata") AS namabentuk'), DB::raw('COUNT(pt.kode_pt) as total'))
            ->leftJoin('ref_bentukpt', DB::raw('LEFT(pt.kode_pt, 3)'), '=', 'ref_bentukpt.kodebentuk')
            ->where('pt.status_pt', 'A')
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


        // Controller Chart Wilayah PT
        $wilayahpt = DB::table('pt')
            ->join('ref_wil_provinsi', 'pt.provinsi', '=', 'ref_wil_provinsi.kode_awal_provinsi_dagri')
            ->where('pt.status_pt', '=', 'A')
            ->groupBy('nama_provinsi')
            ->select('ref_wil_provinsi.nama_provinsi', DB::raw('COUNT(pt.provinsi) as total'))
            ->orderByRaw("
                CASE nama_provinsi
                    WHEN 'Jawa Barat' THEN 0
                    ELSE 1
                    END
                ")
            ->get();

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
            ->where('pt.status_pt', 'A');

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

        // Menghitung total semua akreditasi
        $total_semua_akred = $rekap->sum('TotalAkreditasi');

        // dd($wilayahpt);
        return view(
            'admin.dashboard_admin',
            compact('tpt', 'tprodi', 'tbentukpt', 'twilayah', 'akred_pt', 'akred_prodi', 'bentukpt', 'wilayahpt',
            'rekap', 'totalAkred', 'total_semua_akred')
        );
    }

    public function pengaturan_akun()
    {
        return view('admin.profile.pengaturan_akun');
    }

    public function keamanan_akun()
    {
        return view('admin.profile.keamanan_akun');
    }

    public function user_profile()
    {
        return view('admin.profile.user_profile');
    }

    public function FAQ()
    {
        return view('admin.profile.FAQ');
    }
}
