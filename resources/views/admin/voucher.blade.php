@extends('layout.layout-admin')
@section('content')
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef) no-repeat,
                repeating-linear-gradient(45deg, #f8f9fa 0%, #e9ecef 25%, #f8f9fa 50%) no-repeat;
            background-size: 100% 100%, 20px 20px;
            min-height: 100vh;
        }

        .app-content-header {
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .card-body {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Tabel Styling */
        .table {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Memberikan efek bayangan lembut */
        }

        /* Header Tabel */
        .table-dark {
            background-color: #343a40;
            /* Warna gelap untuk header */
            color: white;
            /* Warna teks putih pada header */
        }

        /* Baris Tabel */
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
            /* Memberikan warna latar belakang pada baris ganjil */
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            /* Memberikan warna latar belakang saat hover */
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            /* Efek transisi halus */
        }

        /* Tombol Styling */
        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            opacity: 0.8;
            /* Efek transparansi saat hover */
            transform: translateY(-2px);
            /* Efek angkat tombol saat hover */
        }

        .btn-warning {
            background-color: #f0ad4e;
            /* Warna oranye */
        }

        .btn-warning:hover {
            background-color: #ec971f;
            /* Warna lebih gelap saat hover */
        }

        .btn-danger {
            background-color: #d9534f;
            /* Warna merah */
        }

        .btn-danger:hover {
            background-color: #c9302c;
            /* Warna lebih gelap saat hover */
        }

        /* Styling Kolom ID */
        th {
            text-align: center;
            font-weight: bold;
        }

        /* Styling Kolom Aksi */
        td button {
            margin-right: 8px;
        }
    </style>

    <!--begin::App Content Header-->

    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!-- begin::Row-->
            @if ($errors->any())
                <div class="alert alert-danger d-flex align-items-center mt-3" id="error-alert" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        style="display: none;"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger mt-3" id="error-alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        style="display: none;"></button>
                </div>
            @endif

            <!-- Success alert -->
            @if (session('success'))
                <div class="alert alert-success mt-3" id="success-alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        style="display: none;"></button>
                </div>
            @endif

            <div>
                <div class="card-body mt-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Verifikasi Voucher</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <!-- <div class="d-flex justify-content-between">
                                                                    <button type="button" class="btn btn-primary mb-4 text-center" data-bs-toggle="modal"
                                                                        data-bs-target="#staticBackdrop">
                                                                        Tambah voucher
                                                                    </button>
                                                                </div> -->

                    <!-- CREATE -->


                    <div class="table-responsive">
                        <table class="table table-bordered table-hover  shadow-lg">
                            <thead class="table-secondary">
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>ID Voucher</th>
                                    <th>Member</th>
                                    <th>Poin Terpakai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                @if ($voucher->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            <img src="{{ asset('/build/assets/Animation - 1736668256622.gif') }}" alt="No Data"
                                                style="width: 150px; margin-top: 10px;">
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($voucher as $data)
                                        <tr class="align-middle">
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $data->kode_voucher}}</td>
                                            <td>{{ $data->member->nama_member }}</td>
                                            <td>{{ $data->poin_terpakai }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $data->status_voucher === 'Terverifikasi' ? 'success' : ($data->status_voucher === 'Ditolak' ? 'danger' : 'warning') }}">
                                                    {{ $data->status_voucher }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($data->status_voucher == 'Menunggu Verifikasi')

                                                    <!-- Tombol Edit (Update) -->
                                                    <form action="{{ route('voucher.store') }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="id_voucher" value="{{ $data->id_voucher }}">
                                                        <a href="javascript:void(0)" onclick="this.closest('form').submit()"
                                                            class="text-primary" title="Accept">
                                                            <i class="bi bi-check-circle fs-5"></i>
                                                        </a>
                                                    </form>

                                                    <!-- Tombol Hapus (Delete) -->
                                                    <form action="{{ route('voucher.decline') }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="id_voucher" value="{{ $data->id_voucher }}">
                                                        <a href="javascript:void(0)" onclick="this.closest('form').submit()"
                                                            class="text-danger" title="Accept">
                                                            <i class="bi bi-x-circle fs-5"></i>
                                                        </a>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <!-- Previous Page -->
                                <li class="page-item {{ $voucher->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $voucher->previousPageUrl() }}" tabindex="-1"
                                        aria-disabled="true">Previous</a>
                                </li>

                                <!-- Page Number Links -->
                                @for ($i = 1; $i <= $voucher->lastPage(); $i++)
                                    <li class="page-item {{ $i == $voucher->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $voucher->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Next Page -->
                                <li class="page-item {{ $voucher->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $voucher->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
    <script>
        // Fungsi untuk mengisi data edit
        function setEditData(id_voucher, nama_voucher, harga_voucher, promo) {
            // Isi nilai form
            document.getElementById('id_voucher').value = id_voucher;
            document.getElementById('nama_voucher2').value = nama_voucher;
            document.getElementById('harga_voucher2').value = harga_voucher;
            document.getElementById('promo2').value = promo;

            // Perbarui action form dengan id_member
            const form = document.getElementById('updateKasirForm');
            const baseUrl = "{{ url('/admin/voucher/update') }}/"; // URL dasar tanpa parameter
            form.action = `${baseUrl}${id_voucher}`;
            console.log(form.action);

        }

        // Fungsi untuk mengisi data hapus
        function setDeleteData(id_voucher) {
            // Isi nilai form
            document.getElementById('id_voucher3').value = id_voucher;

            // Perbarui action form dengan id_member
            const form = document.getElementById('deleteForm');
            const baseUrl = "{{ url('/admin/voucher/delete') }}/"; // URL dasar tanpa parameter
            form.action = `${baseUrl}${id_voucher}`;
        }

        // Menutup alert setelah 3 detik
        setTimeout(function () {
            var errorAlert = document.getElementById('error-alert');
            var successAlert = document.getElementById('success-alert');

            // Cek apakah ada error alert dan trigger event close
            if (errorAlert) {
                var closeButton = errorAlert.querySelector('[data-bs-dismiss="alert"]');
                if (closeButton) {
                    closeButton.click(); // Men-trigger klik pada tombol close
                }
            }

            // Cek apakah ada success alert dan trigger event close
            if (successAlert) {
                var closeButton = successAlert.querySelector('[data-bs-dismiss="alert"]');
                if (closeButton) {
                    closeButton.click(); // Men-trigger klik pada tombol close
                }
            }
        }, 3000); // 3000ms = 3 seconds
    </script>


@endsection