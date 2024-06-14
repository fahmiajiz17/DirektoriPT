<!-- Modal Edit -->
<div class="modal fade" id="editModal{{ $prodi->kode_prodi }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $prodi->kode_prodi }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $prodi->kode_prodi }}">Edit Data
                    Perguruan Tinggi</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <h5 style="color: #6F75FF">[{{ $prodi->kode_prodi }}] - {{ $prodi->nama_prodi }}</h5>
                <form id="editForm{{ $prodi->kode_prodi }}"
                    action="{{ route('update_data_prodi', ['kode_prodi' => $prodi->kode_prodi]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Form bagian pertama -->
                    <div style="border: 1px solid #6F75FF; padding: 10px; margin-bottom: 20px;">
                        <h5><b>Data Akreditasi Perguruan Tinggi</b></h5>
                        <hr style="border: 0; border-top: 1px solid #6F75FF;">
                        <div class="row form-row">
                            <div class="form-group">
                                <label for="status_akreditasi" class="form-label">Status Akreditasi Prodi</label>
                                <select class="form-select" name="status_akreditasi"
                                    id="status_akreditasi{{ $prodi->status_akreditasi }}">
                                    <option value="null" @if ($prodi->status_akreditasi == 'null') selected @endif>
                                        --Pilih Status APS--</option>
                                    <option value="Terakreditasi" @if ($prodi->status_akreditasi == 'Terakreditasi') selected @endif>
                                        Terakreditasi</option>
                                    <option value="Belum Terakreditasi (Y)"
                                        @if ($prodi->status_akreditasi == 'Belum Terakreditasi (Y)') selected @endif>Belum Terakreditasi (Sudah
                                        upload Sapto/Lamptkes)</option>
                                    <option value="Belum Terakreditasi (N)"
                                        @if ($prodi->status_akreditasi == 'Belum Terakreditasi (N)') selected @endif>Belum Terakreditasi (Belum
                                        upload Sapto/Lamptkes)</option>
                                    <option value="Reakreditasi" @if ($prodi->status_akreditasi == 'Reakreditasi') selected @endif>
                                        Proses Reakreditasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="peringkat_akreditasi_banpt" class="form-label">Peringkat Akreditas
                                        Prodi</label>
                                    <select class="form-select" name="peringkat_akreditasi_banpt"
                                        id="peringkat_akreditasi_banpt{{ $prodi->kode_prodi }}">
                                        <option value="">--Pilih Peringkat APS--</option>
                                        <option value="P" @if ($prodi->peringkat_akreditasi_banpt == 'P') selected @endif>
                                            Prodi Baru (Terakreditasi Minimal)</option>
                                        <option value="X" @if ($prodi->peringkat_akreditasi_banpt == 'X') selected @endif>
                                            Tidak Terakreditasi</option>
                                        <option value="A" @if ($prodi->peringkat_akreditasi_banpt == 'A') selected @endif>
                                            Terakreditasi A</option>
                                        <option value="B" @if ($prodi->peringkat_akreditasi_banpt == 'B') selected @endif>
                                            Terakreditasi B</option>
                                        <option value="C" @if ($prodi->peringkat_akreditasi_banpt == 'C') selected @endif>
                                            Terakreditasi C</option>
                                        <option value="Unggul" @if ($prodi->peringkat_akreditasi_banpt == 'Unggul') selected @endif>
                                            Unggul</option>
                                        <option value="BS" @if ($prodi->peringkat_akreditasi_banpt == 'BS') selected @endif>
                                            Baik Sekali</option>
                                        <option value="Baik" @if ($prodi->peringkat_akreditasi_banpt == 'Baik') selected @endif>
                                            Baik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nilai_akreditasi_banpt" class="form-label">Nilai Akreditasi
                                        Prodi</label>
                                    <input type="text" class="form-control" name="nilai_akreditasi_banpt"
                                        id="nilai_akreditasi_banpt" placeholder="Nilai APS"
                                        value="{{ $prodi->nilai_akreditasi_banpt }}">
                                </div>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="form-group">
                                <label for="no_sk_akreditasi_banpt" class="form-label">Nomor SK Akreditasi Prodi</label>
                                <input type="text" class="form-control" name="no_sk_akreditasi_banpt"
                                    id="no_sk_akreditasi_banpt" placeholder="Nomor SK APS"
                                    value="{{ $prodi->no_sk_akreditasi_banpt }}">
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_sk_akreditasi_banpt" class="form-label">Tanggal SK
                                        Akreditasi</label>
                                    <input type="date" class="form-control" name="tgl_sk_akreditasi_banpt"
                                        id="tgl_sk_akreditasi_banpt"
                                        value="{{ $prodi->tgl_sk_akreditasi_banpt ? date('Y-m-d', strtotime($prodi->tgl_sk_akreditasi_banpt)) : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_kadaluarsa_sk_akreditasi_banpt" class="form-label">Tanggal
                                        Kadaluarsa Akreditasi</label>
                                    <input type="date" class="form-control" name="tgl_kadaluarsa_sk_akreditasi_banpt"
                                        id="tgl_kadaluarsa_sk_akreditasi_banpt"
                                        value="{{ $prodi->tgl_kadaluarsa_sk_akreditasi_banpt ? date('Y-m-d', strtotime($prodi->tgl_kadaluarsa_sk_akreditasi_banpt)) : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="editForm{{ $prodi->kode_prodi }}" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit -->
