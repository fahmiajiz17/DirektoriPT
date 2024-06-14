<div class="col-lg-12 mx-auto">
    <div class="card" style="border-top: 5px solid #6F75FF; border-right: 1px solid #c7c7c7; 
        border-bottom: 1px solid #c7c7c7; border-left: 1px solid #c7c7c7;">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <h5 style="margin-bottom: 15px; margin-top: 7px;">Hasil Rekapitulasi</h5>
                <table class="table table-bordered table-hover" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>Bentuk</th>
                            <th>Akreditasi A</th>
                            <th>Akreditasi B</th>
                            <th>Akreditasi C</th>
                            <th>Akreditasi Unggul</th>
                            <th>Akreditasi Baik Sekali</th>
                            <th>Akreditasi Baik</th>
                            <th>Belum Akreditasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekap as $value)
                            <tr>
                                <td>{{ $value->namabentuk }}</td>
                                <td>{{ $value->A }}</td>
                                <td>{{ $value->B }}</td>
                                <td>{{ $value->C }}</td>
                                <td>{{ $value->Unggul }}</td>
                                <td>{{ $value->BS }}</td>
                                <td>{{ $value->Baik }}</td>
                                <td>{{ $value->TdkAkred }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><strong>Sub Total</strong></td>
                            <td><b>{{ $totalAkred['TotalA'] }}</b></td>
                            <td><b>{{ $totalAkred['TotalB'] }}</b></td>
                            <td><b>{{ $totalAkred['TotalC'] }}</b></td>
                            <td><b>{{ $totalAkred['TotalUnggul'] }}</b></td>
                            <td><b>{{ $totalAkred['TotalBS'] }}</b></td>
                            <td><b>{{ $totalAkred['TotalBaik'] }}</b></td>
                            <td><b>{{ $totalAkred['TotalTdkAkred'] }}</b></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="1"><b>Total</b></td>
                            <td colspan="7" class="text-center">
                                <b>{{ $total_semua_akred }}</b>
                            </td>
                        </tr>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <br>

            <div class="table-responsive text-nowrap">
                <h5 style="margin-bottom: 15px; margin-top: 7px;">Data Akreditasi</h5>
                <table class="table table-bordered table-hover table-striped" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>KodePT</th>
                            <th>Nama Perguruan Tinggi</th>
                            <th>Kode Prodi</th>
                            <th>Nama Prodi</th>
                            <th>Jenjang</th>
                            <th>Peringkat</th>
                            <th>Kota/Kabupaten</th>
                            <th>Tgl.Kadaluarsa</th>
                            <th>Waktu Kadaluarsa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $prodi)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $prodi->kode_pt }}</td>
                                <td>{{ $prodi->nama_pt }}</td>
                                <td>{{ $prodi->kode_prodi }}</td>
                                <td>{{ $prodi->nama_prodi }}</td>
                                <td>{{ $prodi->nm_jenj_didik }}</td>
                                <td>{{ $prodi->peringkat_akreditasi_banpt }}</td>
                                <td>{{ $prodi->nama_kota_kab }}</td>
                                <td>{{ $prodi->tgl_kadaluarsa_sk_akreditasi_banpt }}</td>
                                <td>
                                    @if ($prodi->sisa_kadaluarsa == 'Kadaluarsa')
                                        <span style="color: red;">Kadaluarsa</span>
                                    @else
                                        {{ $prodi->sisa_kadaluarsa }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td align=right colspan="10">
                                @if (count($data) > 0)
                                    <form action="{{ route('export.excelAProdi') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Export to Excel</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
