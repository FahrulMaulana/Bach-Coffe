<!-- filepath: /resources/views/admin/laporan.blade.php -->
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
            <!-- Alerts -->
            @if ($errors->any() || session('error') || session('success'))
                <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show mt-3"
                    role="alert">
                    @if ($errors->any())
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @else
                        {{ session('error') ?? session('success') }}
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Header -->
            <div class="card mt-3">
                <div class="card-body">
                    <h3>Laporan Transaksi</h3>
                </div>
            </div>

            <!-- Filter Form -->
            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{ route('laporan') }}" method="GET" class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label">Hari</label>
                            <select name="day" id="day" class="form-select" disabled>
                                <option value="">Semua Hari</option>
                                @foreach(range(1, 31) as $day)
                                    <option value="{{ $day }}" {{ request('day') == $day ? 'selected' : '' }}>
                                        {{ str_pad($day, 2, '0', STR_PAD_LEFT) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Bulan</label>
                            <select name="month" id="month" class="form-select" disabled>
                                <option value="">Semua Bulan</option>
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                                        {{ Carbon\Carbon::create()->month($month)->format('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Tahun</label>
                            <select name="year" id="year" class="form-select">
                                <option value="">Semua Tahun</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-filter"></i> Filter
                            </button>
                        </div>

                        <div class="col-md-2">
                            <a href="{{ route('laporan') }}" class="btn btn-secondary w-100">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Export Button -->
            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{ route('laporan.export') }}" method="GET">
                        <input type="hidden" name="year" value="{{ request('year') }}">
                        <input type="hidden" name="month" value="{{ request('month') }}">
                        <input type="hidden" name="day" value="{{ request('day') }}">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-file-earmark-excel"></i> Export to Excel
                        </button>
                    </form>
                </div>
            </div>

            <!-- Table -->
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th style="width: 80px">ID</th>
                                    <th>Kasir</th>
                                    <th>Member</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Poin</th>
                                    <th style="width: 100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kasir as $data)
                                    <tr>
                                        <td>{{ $data->id_transaksi }}</td>
                                        <td>{{ $data->user->nama_lengkap }}</td>
                                        <td>{{ $data->member->nama_member ?? 'Non Member' }}</td>
                                        <td>{{ Carbon\Carbon::parse($data->tanggal_transaksi)->format('d F Y') }}</td>
                                        <td>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
                                        <td>{{ $data->poin_didapat }}</td>
                                        <td>
                                            <a href="{{ route('laporan.show', $data->id_transaksi) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <img src="{{ asset('/build/assets/Animation - 1736668256622.gif') }}" alt="No Data"
                                                style="width: 150px">
                                            <p class="text-muted mt-2">Tidak ada data transaksi</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <!-- Previous Page -->
                                <li class="page-item {{ $kasir->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $kasir->previousPageUrl() }}" tabindex="-1"
                                        aria-disabled="true">Previous</a>
                                </li>

                                <!-- Page Number Links -->
                                @for ($i = 1; $i <= $kasir->lastPage(); $i++)
                                    <li class="page-item {{ $i == $kasir->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $kasir->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Next Page -->
                                <li class="page-item {{ $kasir->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $kasir->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Pagination -->
                    <!-- {{ $kasir->withQueryString()->links() }} -->
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const yearSelect = document.getElementById('year');
                const monthSelect = document.getElementById('month');
                const daySelect = document.getElementById('day');

                function toggleMonthAndDay() {
                    if (yearSelect.value) {
                        monthSelect.disabled = false;
                    } else {
                        monthSelect.disabled = true;
                        monthSelect.value = '';
                        daySelect.disabled = true;
                        daySelect.value = '';
                    }

                    if (monthSelect.value) {
                        daySelect.disabled = false;
                    } else {
                        daySelect.disabled = true;
                        daySelect.value = '';
                    }
                }

                yearSelect.addEventListener('change', toggleMonthAndDay);
                monthSelect.addEventListener('change', toggleMonthAndDay);

                // Initial call to set the correct state on page load
                toggleMonthAndDay();
            });

            function setEditData(id_transaksi) {
                window.location.href = `/admin/laporan/${id_transaksi}`;
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