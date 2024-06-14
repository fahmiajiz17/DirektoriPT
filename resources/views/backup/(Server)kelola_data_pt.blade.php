@extends('admin.layout.tpl_innerpage')

@section('title', 'DirektoriPT - Data Perguruan Tinggi')

@section('page', 'Kelola Data Akreditasi Perguruan Tinggi')
@section('namepage', 'Kelola Data Akreditasi Perguruan Tinggi')

@section('content')
    <section class="inner-page">
        <div class="container">
            <div style="background-color: #e9ecef; padding: 30px; border-radius: 10px;">
                <h3 class="text-center">Data Perguruan Tinggi</h3>
                <table id="pt" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 6%;">NO</th>
                            <th style="width: 8%;">KODE</th>
                            <th style="width: 30%;">NAMA PERGURUAN TINGGI</th>
                            <th style="width: 15%;">AKREDITASI</th>
                            <th style="width: 7%;">ΣPS</th>
                            <th style="width: 15%;">Domisili</th>
                            <th style="width: 10%;">Status PT</th>
                            <th style="width: 5%;">Aksi</th>
                            <th style="width: 5%;">ID_SP</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- Modal Edit -->
    @foreach ($data_pt as $pt)
    @include('admin.kelola_data_pt_modal', ['pt' => $pt])
    @endforeach
            </div>
        </div>
    </section>

    <style>
        /* Bootstrap CSS untuk tabel */
        #pt {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid rgba(0, 0, 0, 0.125);
        }

        #pt th,
        #pt td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }

        #pt thead th {
            vertical-align: bottom;
            border-bottom: 2px solid rgba(0, 0, 0, 0.125);
        }

        #pt tbody+tbody {
            border-top: 2px solid rgba(0, 0, 0, 0.125);
        }

        /* CSS untuk mengubah warna teks pagination menjadi hitam */
        .pagination .page-link {
            color: black !important;
            /* warna teks hitam */
        }

        /* CSS untuk mengubah warna teks pagination menjadi putih saat diklik */
        .pagination .page-item.active .page-link {
            color: white !important;
            /* warna teks putih */
        }

        /* Gaya untuk membuat teks pada kolom "Nama Perguruan Tinggi" menjadi biru */
        #pt tbody td:nth-child(3) {
            color: #0366d6;
            cursor: pointer;
        }
    </style>

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#pt').DataTable({
                processing: true,
                serverSide: true,
                paging: false,
                ajax: {
                    url: '{{ route('kelola_data_pt.data') }}',
                    data: function(d) {
                        d.search.value = $('input[type="search"]')
                            .val(); // Mengirimkan nilai pencarian ke sisi server
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kode_pt',
                        name: 'pt.kode_pt'
                    },
                    {
                        data: 'nama_pt',
                        name: 'pt.nama_pt',
                        className: 'clickable'
                    },
                    {
                        data: 'peringkat_aipt',
                        name: 'pt.peringkat_aipt',
                        render: function(data, type, row) {
                            if (data === '-') {
                                return 'Tidak Terakreditasi';
                            } else if (data === 'BS') {
                                return 'Baik Sekali <a href="#" style="color: blue;">- History</a>';
                            } else {
                                return data + ' <a href="#" style="color: blue;">- History</a>';
                            }
                        }
                    },
                    {
                        data: 'total_prodi',
                        name: 'total_prodi'
                    },
                    {
                        data: 'nama_kota_kab',
                        name: 'nama_kota_kab'
                    },
                    {
                        data: 'status_pt',
                        name: 'pt.status_pt'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id_sp',
                        name: 'id_sp',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [0, 'asc']
                ]
            });

            // Tambahkan event click untuk kolom "Nama Perguruan Tinggi"
            $('#pt tbody').on('click', 'td.clickable', function() {
                var rowData = table.row($(this).closest('tr')).data();
                if (rowData) {
                    // Arahkan ke halaman daftar_prodi dengan menggunakan kode PT
                    window.location.href = '{{ route('daftar_prodi') }}?kode_pt=' + rowData.kode_pt;
                }
            });

            // Handle submit form edit
            $('form[id^="editForm"]').on('submit', function(e) {
                e.preventDefault(); // Hindari form submit
                var form = $(this);
                var url = form.attr('action');
                var formData = form.serialize();

                // Kirim data ke server untuk disimpan
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    success: function(response) {
                        // Tampilkan pesan sukses atau lakukan aksi lain
                        alert('Data berhasil diperbarui');
                        $('#editModal' + response.kode_pt).modal(
                            'hide'); // Sembunyikan modal setelah berhasil
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan pesan error atau lakukan aksi lain
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>

@endsection
