<!-- Modal Edit -->
<div class="modal fade" id="editModal{{ $pt->kode_pt }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $pt->kode_pt }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $pt->kode_pt }}">Edit Data
                    Perguruan Tinggi</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <h4 style="color: #6F75FF">[{{ $pt->kode_pt }}] - {{ $pt->nama_pt }}</h4>
                <form id="editForm{{ $pt->kode_pt }}"
                    action="{{ route('update_data_pt', ['kode_pt' => $pt->kode_pt]) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <!-- Form bagian pertama -->
                    <div style="border: 1px solid #6F75FF; padding: 10px; margin-bottom: 20px;">
                        <h5><b>Pimpinan Perguruan Tinggi</b></h5>
                        <hr style="border: 0; border-top: 1px solid #6F75FF;">
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pimpinan" class="form-label"><b>Pimpinan Perguruan Tinggi</b></label>
                                    <input type="text" class="form-control" name="pimpinan" id="pimpinan"
                                        placeholder="Pimpinan Perguruan Tinggi" value="{{ $pt->pimpinan_pts }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hp" class="form-label"><b>HP Pimpinan PT</b></label>
                                    <input type="text" class="form-control" name="hp_pimpinan" id="hp_pimpinan"
                                        placeholder="HP Pimpinan PT" value="{{ $pt->hp_pimpinan }}">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group">
                                <label for="wakil1" class="form-label"><b>Wakil Pimpinan I</b></label>
                                <input type="text" class="form-control" name="wakil_pim_1" id="wakil_pim_1"
                                    placeholder="Wakil Pimpinan I" value="{{ $pt->wakil_pim_1 }}">
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group">
                                <label for="wakil2" class="form-label"><b>Wakil Pimpinan II</b></label>
                                <input type="text" class="form-control" name="wakil_pim_2" id="wakil_pim_2"
                                    placeholder="Wakil Pimpinan II" value="{{ $pt->wakil_pim_2 }}">
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group">
                                <label for="wakil3" class="form-label"><b>Wakil Pimpinan III</b></label>
                                <input type="text" class="form-control" name="wakil_pim_3" id="wakil_pim_3"
                                    placeholder="Wakil Pimpinan III" value="{{ $pt->wakil_pim_3 }}">
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group">
                                <label for="wakil4" class="form-label"><b>Wakil Pimpinan IV</b></label>
                                <input type="text" class="form-control" name="wakil_pim_4" id="wakil_pim_4"
                                    placeholder="Wakil Pimpinan IV" value="{{ $pt->wakil_pim_4 }}">
                            </div>
                        </div>
                    </div>

                    <!-- Form bagian kedua -->
                    <div style="border: 1px solid #6F75FF; padding: 10px; margin-bottom: 20px;">
                        <h5><b>Data Perguruan Tinggi</b></h5>
                        <hr style="border: 0; border-top: 1px solid #6F75FF;">
                        <div class="row form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kode_pt" class="form-label"><b>Kode PT</b></label>
                                    <input type="text" class="form-control" name="kode_pt" id="kode_pt"
                                        placeholder="Kode PT" value="{{ $pt->kode_pt }}" maxlength="5">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="nama_pt" class="form-label"><b>Nama Perguruan Tinggi</b></label>
                                    <input type="text" class="form-control" name="nama_pt" id="nama_pt"
                                        placeholder="Nama Perguruan Tinggi" value="{{ $pt->nama_pt }}" readonly
                                        style="background-color: #ededed;">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group">
                                <label for="nama_pt_singkatan" class="form-label"><b>Nama PT Singkatan</b></label>
                                <input type="text" class="form-control" name="nama_pt_singkatan"
                                    id="nama_pt_singkatan" placeholder="Nama PT Singkatan"
                                    value="{{ $pt->nama_pt_singkatan }}">
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_sk_pendirianpt" class="form-label"><b>Nomor SK Pendirian
                                            PT</b></label>
                                    <input type="text" class="form-control" name="no_sk_pendirianpt"
                                        id="no_sk_pendirianpt" placeholder="Nomor SK Pendirian PT"
                                        value="{{ $pt->no_sk_pendirianpt }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_sk_pendirianpt" class="form-label"><b>Tanggal SK Pendirian
                                            PT</b></label>
                                    <input type="date" class="form-control" name="tgl_sk_pendirianpt"
                                        id="tgl_sk_pendirianpt"
                                        value="{{ $pt->tgl_sk_pendirianpt ? date('Y-m-d', strtotime($pt->tgl_sk_pendirianpt)) : '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group">
                                <label for="alamat" class="form-label"><b>Alamat Kampus Utama</b></label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Kampus Utama">{{ $pt->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_kota_kab" class="form-label"><b>Nama Kota/Kabupaten</b></label>
                                    <select class="form-select" name="nama_kota_kab" id="nama_kota_kab">
                                        <option value="">--Pilih Kota/Kabupaten--</option>
                                        @foreach ($kotaKabupaten as $kota)
                                            <option value="{{ $kota->kode_kotakab_dagri }}"
                                                @if ($pt->kota_kabupaten == $kota->kode_kotakab_dagri) selected @endif>
                                                {{ $kota->nama_kota_kab }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_provinsi" class="form-label"><b>Provinsi</b></label>
                                    <select class="form-select" name="nama_provinsi" id="nama_provinsi">
                                        <option value="">--Pilih Provinsi--</option>
                                        @foreach ($provinsi as $prov)
                                            <option value="{{ $prov->kode_awal_provinsi_dagri }}"
                                                @if ($pt->provinsi == $prov->kode_awal_provinsi_dagri) selected @endif>
                                                {{ $prov->nama_provinsi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_kec" class="form-label"><b>Kecamatan</b></label>
                                    <select class="form-select" name="id_kec" id="id_kec">
                                        <option value="">--Pilih Kecamatan--</option>
                                        @foreach ($kecamatan as $kec)
                                            <option value="{{ $kec->id_wil }}"
                                                {{ $pt->id_kec == $kec->id_wil ? 'selected' : '' }}>
                                                {{ $kec->nm_wil }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_pos" class="form-label"><b>Kode Pos</b></label>
                                    <input type="text" class="form-control" name="kode_pos" id="kode_pos"
                                        placeholder="Kode Pos" value="{{ $pt->kode_pos }}">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telepon" class="form-label"><b>Telepon</b></label>
                                    <input type="text" class="form-control" name="telepon" id="telepon"
                                        placeholder="Telepon" value="{{ $pt->telepon }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fax" class="form-label"><b>Fax</b></label>
                                    <input type="text" class="form-control" name="fax" id="fax"
                                        placeholder="Fax" value="{{ $pt->fax }}">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        placeholder="Email" value="{{ $pt->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website" class="form-label"><b>Website</b></label>
                                    <input type="text" class="form-control" name="website" id="website"
                                        placeholder="Website" value="{{ $pt->website }}">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_pt" class="form-label"><b>Status Perguruan Tinggi</b></label>
                                    <select class="form-select" name="status_pt" id="status_pt{{ $pt->status_pt }}">
                                        <option value="A" @if ($pt->status_pt == 'A') selected @endif>
                                            Aktif</option>
                                        <option value="B" @if ($pt->status_pt == 'B') selected @endif>Alih
                                            Bentuk</option>
                                        <option value="N" @if ($pt->status_pt == 'N') selected @endif>Non
                                            Aktif</option>
                                        <option value="M" @if ($pt->status_pt == 'M') selected @endif>
                                            Merge</option>
                                        <option value="H" @if ($pt->status_pt == 'H') selected @endif>
                                            Hapus</option>
                                        <option value="K" @if ($pt->status_pt == 'K') selected @endif>Alih
                                            Kelola</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_aipt" class="form-label"><b>Lembaga</b></label>
                                    <select class="form-select" name="status_aipt"
                                        id="status_aipt{{ $pt->status_aipt }}">
                                        <option value="">--Pilih Status APT--</option>
                                        <option value="Terakreditasi"
                                            @if ($pt->status_aipt == 'Terakreditasi') selected @endif>
                                            Terakreditasi</option>
                                        <option value="Belum Terakreditasi (Y)"
                                            @if ($pt->status_aipt == 'Belum Terakreditasi (Y)') selected @endif>Belum Terakreditasi
                                            (Sudah
                                            upload Sapto)</option>
                                        <option value="Belum Terakreditasi (N)"
                                            @if ($pt->status_aipt == 'Belum Terakreditasi (N)') selected @endif>Belum Terakreditasi
                                            (Belum
                                            upload Sapto)</option>
                                        <option value="Reakreditasi"
                                            @if ($pt->status_aipt == 'Reakreditasi') selected @endif>
                                            Proses Reakreditasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Form bagian ketiga -->
                    <div style="border: 1px solid #6F75FF; padding: 10px; margin-bottom: 20px;">
                        <h5><b>Data Akreditasi Perguruan Tinggi</b></h5>
                        <hr style="border: 0; border-top: 1px solid #6F75FF;">
                        <div class="row form-row">
                            <div class="form-group">
                                <label for="status_aipt" class="form-label"><b>Status APT</b></label>
                                <select class="form-select" name="status_aipt"
                                    id="status_aipt{{ $pt->status_aipt }}">
                                    <option value="">--Pilih Status APT--</option>
                                    <option value="Terakreditasi" @if ($pt->status_aipt == 'Terakreditasi') selected @endif>
                                        Terakreditasi</option>
                                    <option value="Belum Terakreditasi (Y)"
                                        @if ($pt->status_aipt == 'Belum Terakreditasi (Y)') selected @endif>Belum Terakreditasi (Sudah
                                        upload Sapto)</option>
                                    <option value="Belum Terakreditasi (N)"
                                        @if ($pt->status_aipt == 'Belum Terakreditasi (N)') selected @endif>Belum Terakreditasi (Belum
                                        upload Sapto)</option>
                                    <option value="Reakreditasi" @if ($pt->status_aipt == 'Reakreditasi') selected @endif>
                                        Proses Reakreditasi</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="peringkat_aipt" class="form-label"><b>Peringkat APT</b></label>
                                    <select class="form-select" name="peringkat_aipt"
                                        id="peringkat_aipt{{ $pt->kode_pt }}">
                                        <option value="">--Pilih Peringkat APT--</option>
                                        <option value="-" @if ($pt->peringkat_aipt == '-') selected @endif>
                                            Tidak
                                            Terakreditasi</option>
                                        <option value="A" @if ($pt->peringkat_aipt == 'A') selected @endif>
                                            Terakreditasi A</option>
                                        <option value="B" @if ($pt->peringkat_aipt == 'B') selected @endif>
                                            Terakreditasi B</option>
                                        <option value="Baik" @if ($pt->peringkat_aipt == 'Baik') selected @endif>
                                            Terakreditasi Baik</option>
                                        <option value="BS" @if ($pt->peringkat_aipt == 'BS') selected @endif>
                                            Terakreditasi Baik Sekali</option>
                                        <option value="Unggul" @if ($pt->peringkat_aipt == 'Unggul') selected @endif>
                                            Terakreditasi Unggul</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nilai_aipt" class="form-label"><b>Nilai APT</b></label>
                                    <input type="text" class="form-control" name="nilai_aipt" id="nilai_aipt"
                                        placeholder="Nilai APT" value="{{ $pt->nilai_aipt }}">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group">
                                <label for="no_sk_aipt" class="form-label"><b>Nomor SK APT</b></label>
                                <input type="text" class="form-control" name="no_sk_aipt" id="no_sk_aipt"
                                    placeholder="Nomor SK APT" value="{{ $pt->no_sk_aipt }}">
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_sk_aipt" class="form-label"><b>Tanggal SK APT</b></label>
                                    <input type="date" class="form-control" name="tgl_sk_aipt" id="tgl_sk_aipt"
                                        value="{{ $pt->tgl_sk_aipt ? date('Y-m-d', strtotime($pt->tgl_sk_aipt)) : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_kadaluarsa_aipt" class="form-label"><b>Tanggal Kadaluarsa SK
                                            APT</b></label>
                                    <input type="date" class="form-control" name="tgl_kadaluarsa_aipt"
                                        id="tgl_kadaluarsa_aipt"
                                        value="{{ $pt->tgl_kadaluarsa_aipt ? date('Y-m-d', strtotime($pt->tgl_kadaluarsa_aipt)) : '' }}">
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            </form>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="editForm{{ $pt->kode_pt }}" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit -->
