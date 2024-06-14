<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class kelola_data_lembaga_Controller extends Controller
{
    public function kelola_data_pt()
    {
        $data_pt = DB::table('pt')->get(); // Mengambil semua data PT
        return view('admin.kelola_data_pt', compact('data_pt'));
    }

    public function getData()
    {
        $pt = DB::table('pt')
            ->select(
                'pt.kode_pt',
                'pt.nama_pt',
                'pt.peringkat_aipt',
                'pt.status_pt',
                'ref_wil_kota_kab.nama_kota_kab',
                'pt.pimpinan_pts',
                'pt.hp_pimpinan',
                'pt.wakil_pim_1',
                'pt.wakil_pim_2',
                'pt.wakil_pim_3',
                'pt.wakil_pim_4',
                'pt.status_aipt',
                'pt.nilai_aipt',
                'pt.no_sk_aipt',
                'pt.tgl_sk_aipt',
                'pt.tgl_kadaluarsa_aipt',
                'pt.nama_pt_singkatan',
                'pt.no_sk_pendirianpt',
                'pt.tgl_sk_pendirianpt',
                'pt.alamat',
                'ref_wil_provinsi.nama_provinsi',
                'pt.kode_pos',
                'pt.telepon',
                'pt.fax',
                'pt.email',
                'pt.website'
            )
            ->selectRaw('COUNT(prodi.kode_prodi) as total_prodi')
            ->join('prodi', 'pt.kode_pt', '=', 'prodi.kode_pt')
            ->join('ref_wil_kota_kab', 'pt.kota_kabupaten', '=', 'ref_wil_kota_kab.kode_kotakab_dagri')
            ->join('ref_wil_provinsi', 'pt.provinsi', '=', 'ref_wil_provinsi.kode_awal_provinsi_dagri')
            ->where('pt.status_pt', 'A')
            ->groupBy(
                'pt.kode_pt',
                'pt.nama_pt',
                'pt.peringkat_aipt',
                'pt.status_pt',
                'ref_wil_kota_kab.nama_kota_kab',
                'pt.pimpinan_pts',
                'pt.hp_pimpinan',
                'pt.wakil_pim_1',
                'pt.wakil_pim_2',
                'pt.wakil_pim_3',
                'pt.wakil_pim_4',
                'pt.status_aipt',
                'pt.nilai_aipt',
                'pt.no_sk_aipt',
                'pt.tgl_sk_aipt',
                'pt.tgl_kadaluarsa_aipt',
                'pt.nama_pt_singkatan',
                'pt.no_sk_pendirianpt',
                'pt.tgl_sk_pendirianpt',
                'pt.alamat',
                'ref_wil_provinsi.nama_provinsi',
                'pt.kode_pos',
                'pt.telepon',
                'pt.fax',
                'pt.email',
                'pt.website'
            );

        return DataTables::of($pt)
            ->addIndexColumn()
            ->addColumn('total_prodi', function ($row) {
                return $row->total_prodi;
            })
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal' . $row->kode_pt . '">Edit</button>';
            })
            ->addColumn('id_sp', function ($row) {
                return '<a href="#"><i class="fa-solid fa-check" style="color: #63E6BE;"></i></a>';
            })
            ->rawColumns(['action', 'id_sp'])
            ->make(true);
    }

    public function update_data_pt(Request $request, $kode_pt)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'pimpinan' => 'required|string|max:255',
            'hp_pimpinan' => 'required|string|max:15',
            'wakil_pim_1' => 'nullable|string|max:255',
            'wakil_pim_2' => 'nullable|string|max:255',
            'wakil_pim_3' => 'nullable|string|max:255',
            'wakil_pim_4' => 'nullable|string|max:255',
            'status_aipt' => 'nullable|string|max:255',
            'peringkat_aipt' => 'nullable|string|max:255',
            'nilai_aipt' => 'nullable|numeric',
            'no_sk_aipt' => 'nullable|string|max:255',
            'tgl_sk_aipt' => 'nullable|date',
            'tgl_kadaluarsa_aipt' => 'nullable|date'
        ]);

        // Update data PT menggunakan query builder
        $updated = DB::table('pt')
            ->where('kode_pt', $kode_pt)
            ->update([
                'pimpinan_pts' => $request->input('pimpinan'),
                'hp_pimpinan' => $request->input('hp_pimpinan'),
                'wakil_pim_1' => $request->input('wakil_pim_1'),
                'wakil_pim_2' => $request->input('wakil_pim_2'),
                'wakil_pim_3' => $request->input('wakil_pim_3'),
                'wakil_pim_4' => $request->input('wakil_pim_4'),
                'status_aipt' => $request->input('status_aipt'),
                'peringkat_aipt' => $request->input('peringkat_aipt'),
                'nilai_aipt' => $request->input('nilai_aipt'),
                'no_sk_aipt' => $request->input('no_sk_aipt'),
                'tgl_sk_aipt' => $request->input('tgl_sk_aipt'),
                'tgl_kadaluarsa_aipt' => $request->input('tgl_kadaluarsa_aipt')
            ]);

        if ($updated) {
            return redirect()->route('kelola_data_pt')->with('success', 'Data Perguruan Tinggi berhasil diperbarui.');
        } else {
            return redirect()->route('kelola_data_pt')->with('error', 'Data Perguruan Tinggi tidak ditemukan atau tidak ada perubahan.');
        }
    }

    public function daftar_prodi(Request $request)
    {
        $kode_pt = $request->query('kode_pt');

        // Simpan kode PT terakhir yang diakses ke dalam session
        session(['kode_pt_terakhir' => $kode_pt]);

        // Ambil data nama_pt berdasarkan kode_pt
        $nama_pt = DB::table('pt')
            ->where('kode_pt', $kode_pt)
            ->value('nama_pt');

        // Ambil data prodi berdasarkan kode_pt
        $prodi = DB::table('prodi')
            ->select(
                'prodi.kode_prodi',
                'prodi.nama_prodi',
                'prodi.peringkat_akreditasi_banpt',
                'ref_jenjang_pendidikan.nm_jenj_didik',
                'prodi.status_prodi',
                'prodi.status_akreditasi',
                'prodi.peringkat_akreditasi_banpt',
                'prodi.nilai_akreditasi_banpt',
                'prodi.no_sk_akreditasi_banpt',
                'prodi.tgl_sk_akreditasi_banpt',
                'prodi.tgl_kadaluarsa_sk_akreditasi_banpt'
            )
            ->join('ref_jenjang_pendidikan', 'prodi.id_jenj_didik', '=', 'ref_jenjang_pendidikan.id_jenj_didik')
            ->where('prodi.kode_pt', $kode_pt)
            ->groupBy(
                'prodi.kode_prodi',
                'prodi.nama_prodi',
                'prodi.peringkat_akreditasi_banpt',
                'ref_jenjang_pendidikan.nm_jenj_didik',
                'prodi.status_prodi',
                'prodi.status_akreditasi',
                'prodi.peringkat_akreditasi_banpt',
                'prodi.nilai_akreditasi_banpt',
                'prodi.no_sk_akreditasi_banpt',
                'prodi.tgl_sk_akreditasi_banpt',
                'prodi.tgl_kadaluarsa_sk_akreditasi_banpt'
            )
            ->get();

        return view('admin.daftar_prodi', compact('prodi', 'nama_pt'));
    }

    public function update_data_prodi(Request $request, $kode_prodi)
    {
        // Simpan kode PT terakhir yang diakses dari session
        $kode_pt_terakhir = session('kode_pt_terakhir');

        // Perbarui data sesuai dengan input dari form
        DB::table('prodi')
            ->where('kode_prodi', $kode_prodi)
            ->update([
                'status_akreditasi' => $request->input('status_akreditasi'),
                'peringkat_akreditasi_banpt' => $request->input('peringkat_akreditasi_banpt'),
                'nilai_akreditasi_banpt' => $request->input('nilai_akreditasi_banpt'),
                'no_sk_akreditasi_banpt' => $request->input('no_sk_akreditasi_banpt'),
                'tgl_sk_akreditasi_banpt' => $request->input('tgl_sk_akreditasi_banpt'),
                'tgl_kadaluarsa_sk_akreditasi_banpt' => $request->input('tgl_kadaluarsa_sk_akreditasi_banpt')
            ]);

        // Redirect kembali ke daftar_prodi dengan kode PT terakhir
        return redirect()->route('daftar_prodi', ['kode_pt' => $kode_pt_terakhir])->with('success', 'Data Prodi berhasil diperbarui');
    }

    public function kelola_data_prodi(Request $request)
    {
        $prodi = DB::table('prodi')
            ->join('ref_jenjang_pendidikan', 'prodi.id_jenj_didik', '=', 'ref_jenjang_pendidikan.id_jenj_didik')
            ->join('pt', 'prodi.kode_pt', '=', 'pt.kode_pt')
            ->select('prodi.kode_prodi', 'prodi.nama_prodi', 'ref_jenjang_pendidikan.nm_jenj_didik', 'pt.nama_pt')
            ->where('prodi.status_prodi', 'A')
            ->get();

        return view('admin.kelola_data_prodi', compact('prodi'));
    }
}
