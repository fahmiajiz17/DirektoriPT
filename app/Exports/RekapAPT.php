<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class RekapAPT implements FromCollection, WithHeadings, ShouldAutoSize, WithTitle
{
    protected $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $index = 0; // Inisialisasi nomor urutan
        return $this->data->map(function ($pt) use (&$index) {
            $index++; // Tingkatkan nomor urutan

            // Hitung dan format sisa kadaluarsa (tahun, bulan, hari)
            $tgl_kadaluarsa = Carbon::parse($pt->tgl_kadaluarsa_aipt);
            $diff = $tgl_kadaluarsa->diff(Carbon::now());
            $sisa_kadaluarsa = $diff->format('%y tahun %m bulan %d hari');

            // Jika melewati tanggal kadaluarsa, ubah keterangan
            if ($diff->invert == 0) { // Jika sisa kadaluarsa positif (belum lewat waktu kadaluarsa)
                $sisa_kadaluarsa = "Kadaluarsa";
                // Kosongkan kolom jumlah kadaluarsa jika kadaluarsa
                $jumlah_kadaluarsa_tahun = 0;
                $jumlah_kadaluarsa_bulan = 0;
                $jumlah_kadaluarsa_hari = 0;
            } else {
                // Hitung jumlah kadaluarsa tahun, bulan, dan hari
                $jumlah_kadaluarsa_tahun = $diff->y;
                $jumlah_kadaluarsa_bulan = $diff->m;
                $jumlah_kadaluarsa_hari = $diff->d;
            }

            // Konversi nomor urutan menjadi string dan tambahkan spasi kosong di sebelah kanan hingga panjang 4
            $index = str_pad(strval($index), 4, " ", STR_PAD_RIGHT);

            // Tambahkan data ke dalam array
            $ptArr = [
                $index, // Nomor urutan
                $pt->kode_pt,
                $pt->nama_pt,
                $pt->peringkat_aipt,
                $pt->nama_kota_kab,
                $pt->nama_provinsi,
                $pt->nilai_aipt,
                $pt->tgl_kadaluarsa_aipt,
                $sisa_kadaluarsa, // Kolom sisa kadaluarsa
                $jumlah_kadaluarsa_tahun, // Kolom jumlah kadaluarsa tahun
                $jumlah_kadaluarsa_bulan, // Kolom jumlah kadaluarsa bulan
                $jumlah_kadaluarsa_hari, // Kolom jumlah kadaluarsa hari
                $pt->ProdiLebih ?? 0, // Jumlah Prodi Lebih
                $pt->TotalProdi ?? 0, // Total Prodi
                $pt->Persentase ?? '0%' // Persentase Prodi Lebih
            ];

            return $ptArr;
        });
    }

    public function headings(): array
    {
        return [
            'NO',
            'KODE PT',
            'NAMA PERGURUAN TINGGI',
            'PERINGKAT',
            'KOTA/KABUPATEN',
            'PROVINSI',
            'SKOR AKREDITASI',
            'TANGGAL KADALUARSA',
            'KADALUARSA',
            'JUMLAH KADALUARSA TAHUN',
            'JUMLAH KADALUARSA BULAN',
            'JUMLAH KADALUARSA HARI',
            'JUMLAH PRODI LEBIH',
            'TOTAL PRODI',
            'PERSENTASE PRODI LEBIH'
        ];
    }

    public function title(): string
    {
        return 'REKAP APT';
    }
}
