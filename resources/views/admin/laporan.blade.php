<!-- filepath: /resources/views/admin/laporan.blade.php -->
@extends('layout.layout-admin')
@section('content')
<style>
  :root {
    --cream-primary: #f5f1eb;
    --cream-secondary: #ede7dc;
    --cream-light: #faf8f5;
    --cream-dark: #e8e0d2;
    --red-primary: #dc2626;
    --red-secondary: #b91c1c;
    --red-light: #fee2e2;
    --red-dark: #991b1b;
    --red-gradient: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
    --cream-gradient: linear-gradient(135deg, #f5f1eb 0%, #ede7dc 50%, #e8e0d2 100%);
    --modern-shadow: 0 10px 40px rgba(220, 38, 38, 0.15);
    --modern-shadow-lg: 0 20px 60px rgba(220, 38, 38, 0.2);
    --text-primary: #1f2937;
    --text-secondary: #6b7280;
    --border-radius: 16px;
    --border-radius-lg: 24px;
  }

  * {
    font-family: 'Poppins', sans-serif !important;
  }

  /* Modern Page Header */
  .modern-header {
    background: var(--cream-gradient);
    padding: 2rem;
    border-radius: var(--border-radius-lg);
    margin-bottom: 2rem;
    box-shadow: var(--modern-shadow);
    border: 1px solid var(--cream-dark);
  }

  .modern-header h2 {
    color: var(--text-primary);
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .modern-header .breadcrumb {
    background: rgba(255, 255, 255, 0.8);
    border-radius: 12px;
    padding: 8px 16px;
    margin: 0;
    backdrop-filter: blur(10px);
  }

  /* Modern Card */
  .modern-card {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--modern-shadow);
    border: 1px solid var(--cream-dark);
    overflow: hidden;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
  }

  .modern-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--modern-shadow-lg);
  }

  .modern-card-body {
    padding: 2rem;
  }

  /* Modern Button */
  .btn-modern-primary {
    background: var(--red-gradient) !important;
    border: none !important;
    color: white !important;
    font-weight: 600 !important;
    padding: 12px 24px !important;
    border-radius: var(--border-radius) !important;
    transition: all 0.3s ease !important;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  .btn-modern-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--modern-shadow);
    color: white !important;
  }

  /* Modern Table */
  .modern-table {
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--modern-shadow);
    border: 1px solid var(--cream-dark);
    background: white;
  }

  .modern-table thead {
    background: var(--red-gradient);
    color: white;
  }

  .modern-table thead th {
    border: none;
    padding: 1rem;
    font-weight: 600;
    text-align: center;
  }

  .modern-table tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid var(--cream-secondary);
  }

  .modern-table tbody tr:hover {
    background: var(--cream-light);
    transform: scale(1.01);
  }

  .modern-table tbody td {
    padding: 1rem;
    vertical-align: middle;
    text-align: center;
    border: none;
  }

  /* Modern Form */
  .form-label {
    color: var(--text-primary) !important;
    font-weight: 600 !important;
    margin-bottom: 0.5rem !important;
  }

  .form-control, .form-select {
    border: 2px solid var(--cream-dark) !important;
    border-radius: var(--border-radius) !important;
    padding: 12px 16px !important;
    transition: all 0.3s ease !important;
    background: var(--cream-light) !important;
  }

  .form-control:focus, .form-select:focus {
    border-color: var(--red-primary) !important;
    box-shadow: 0 0 0 0.2rem rgba(220, 38, 38, 0.25) !important;
    background: white !important;
  }

  .form-select:disabled {
    background: #f8f9fa !important;
    border-color: #e9ecef !important;
    color: #6c757d !important;
  }

  /* Modern Alerts */
  .alert {
    border: none !important;
    border-radius: var(--border-radius) !important;
    padding: 1rem 1.5rem !important;
    margin-bottom: 1.5rem !important;
    box-shadow: var(--modern-shadow) !important;
    font-weight: 500 !important;
  }

  .alert-success {
    background: linear-gradient(135deg, #10b981, #059669) !important;
    color: white !important;
  }

  .alert-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626) !important;
    color: white !important;
  }

  /* Modern Secondary Buttons */
  .btn-secondary {
    background: var(--cream-secondary) !important;
    border: 2px solid var(--cream-dark) !important;
    color: var(--text-primary) !important;
    font-weight: 600 !important;
    border-radius: var(--border-radius) !important;
  }

  .btn-secondary:hover {
    background: var(--text-primary) !important;
    border-color: var(--text-primary) !important;
    color: white !important;
  }

  .btn-success {
    background: linear-gradient(135deg, #10b981, #059669) !important;
    border: none !important;
    font-weight: 600 !important;
    border-radius: var(--border-radius) !important;
  }

  .btn-success:hover {
    transform: translateY(-2px);
    box-shadow: var(--modern-shadow);
  }

  .btn-primary {
    background: var(--red-gradient) !important;
    border: none !important;
    font-weight: 600 !important;
    border-radius: var(--border-radius) !important;
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--modern-shadow);
  }

  .btn-info {
    background: linear-gradient(135deg, #06b6d4, #0891b2) !important;
    border: none !important;
    font-weight: 600 !important;
    border-radius: var(--border-radius) !important;
  }

  .btn-info:hover {
    transform: translateY(-2px);
    box-shadow: var(--modern-shadow);
  }

  /* Modern Pagination */
  .pagination {
    gap: 8px;
  }

  .page-link {
    border: 2px solid var(--cream-dark) !important;
    color: var(--text-primary) !important;
    font-weight: 600 !important;
    border-radius: 12px !important;
    padding: 10px 16px !important;
    transition: all 0.3s ease !important;
    margin: 0 !important;
  }

  .page-link:hover {
    background: var(--red-primary) !important;
    border-color: var(--red-primary) !important;
    color: white !important;
    transform: translateY(-2px);
  }

  .page-item.active .page-link {
    background: var(--red-gradient) !important;
    border-color: var(--red-primary) !important;
    color: white !important;
  }

  /* No Data State */
  .no-data-state {
    padding: 3rem;
    text-align: center;
    color: var(--text-secondary);
  }

  .no-data-state img {
    opacity: 0.7;
    margin-bottom: 1rem;
    max-width: 150px;
    border-radius: var(--border-radius);
  }

  /* Filter Section */
  .filter-section {
    background: var(--cream-light);
    border: 1px solid var(--cream-dark);
    border-radius: var(--border-radius);
    padding: 1.5rem;
  }

  /* Export Section */
  .export-section {
    background: var(--cream-light);
    border: 1px solid var(--cream-dark);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  /* Price Display */
  .price-display {
    font-family: 'Roboto Mono', monospace !important;
    font-weight: 600;
    color: var(--red-primary);
  }

  /* Member Badge */
  .member-badge {
    background: var(--cream-gradient);
    color: var(--text-primary);
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.85rem;
    border: 1px solid var(--cream-dark);
  }

  /* Points Badge */
  .points-badge {
    background: var(--red-gradient);
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.8rem;
  }
</style>

<!--begin::App Content-->
<div class="app-content">
  <!--begin::Container-->
  <div class="container-fluid">
    
    <!-- Modern Page Header -->
    <div class="modern-header">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h2>
            <i class="bi bi-graph-up" style="color: var(--red-primary);"></i>
            Laporan Transaksi
          </h2>
          <p class="mb-0 text-muted mt-1">Laporan dan analisis transaksi Bach Coffee</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end mb-0">
            <li class="breadcrumb-item">
              <a href="#" style="color: var(--red-primary); text-decoration: none;">
                <i class="bi bi-house-door me-1"></i>Home
              </a>
            </li>
            <li class="breadcrumb-item active" style="color: var(--text-primary);">Laporan</li>
          </ol>
        </div>
      </div>
    </div>

    <!-- Alerts -->
    @if ($errors->any() || session('error') || session('success'))
      <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} d-flex align-items-center" id="alert" role="alert">
        <i class="bi bi-{{ session('success') ? 'check-circle-fill' : 'exclamation-triangle-fill' }} me-2"></i>
        @if ($errors->any())
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @else
          {{ session('error') ?? session('success') }}
        @endif
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    
    <!-- Filter Section -->
    <div class="modern-card">
      <div class="modern-card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h4 class="mb-1" style="color: var(--text-primary); font-weight: 600;">
              <i class="bi bi-funnel me-2" style="color: var(--red-primary);"></i>
              Filter Laporan
            </h4>
            <p class="mb-0 text-muted">Pilih periode untuk menampilkan laporan transaksi</p>
          </div>
        </div>

        <div class="filter-section">
          <form action="{{ route('laporan') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-3">
              <label class="form-label">
                <i class="bi bi-calendar-day me-2"></i>Hari
              </label>
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
              <label class="form-label">
                <i class="bi bi-calendar-month me-2"></i>Bulan
              </label>
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
              <label class="form-label">
                <i class="bi bi-calendar-range me-2"></i>Tahun
              </label>
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
                <i class="bi bi-search"></i> Filter
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
    </div>

    <!-- Export Section -->
    <div class="modern-card">
      <div class="modern-card-body">
        <div class="export-section">
          <div>
            <h5 class="mb-1" style="color: var(--text-primary); font-weight: 600;">
              <i class="bi bi-download me-2" style="color: var(--red-primary);"></i>
              Export Data
            </h5>
            <p class="mb-0 text-muted">Download laporan dalam format Excel</p>
          </div>
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
    </div>

    
    <!-- Data Table Section -->
    <div class="modern-card">
      <div class="modern-card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h4 class="mb-1" style="color: var(--text-primary); font-weight: 600;">Data Transaksi</h4>
            <p class="mb-0 text-muted">Daftar transaksi sesuai filter yang dipilih</p>
          </div>
        </div>

        <div class="table-responsive">
          <table class="modern-table table">
            <thead>
              <tr>
                <th style="width: 10%">
                  <i class="bi bi-hash me-2"></i>ID
                </th>
                <th>
                  <i class="bi bi-person-badge me-2"></i>Kasir
                </th>
                <th>
                  <i class="bi bi-person-fill me-2"></i>Member
                </th>
                <th>
                  <i class="bi bi-calendar-event me-2"></i>Tanggal
                </th>
                <th>
                  <i class="bi bi-cash me-2"></i>Total
                </th>
                <th>
                  <i class="bi bi-star-fill me-2"></i>Poin
                </th>
                <th style="width: 12%">
                  <i class="bi bi-gear me-2"></i>Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($kasir as $data)
                <tr>
                  <td>
                    <span class="member-badge">#{{ $data->id_transaksi }}</span>
                  </td>
                  <td>{{ $data->user->nama_lengkap }}</td>
                  <td>
                    @if($data->member)
                      <span class="member-badge">{{ $data->member->nama_member }}</span>
                    @else
                      <span class="text-muted">Non Member</span>
                    @endif
                  </td>
                  <td>{{ Carbon\Carbon::parse($data->tanggal_transaksi)->format('d F Y') }}</td>
                  <td>
                    <span class="price-display">Rp {{ number_format($data->total_harga, 0, ',', '.') }}</span>
                  </td>
                  <td>
                    <span class="points-badge">{{ $data->poin_didapat }} poin</span>
                  </td>
                  <td>
                    <a href="{{ route('laporan.show', $data->id_transaksi) }}" 
                       class="btn btn-sm btn-info" title="Lihat Detail">
                      <i class="bi bi-eye"></i>
                    </a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="no-data-state">
                    <img src="{{ asset('/build/assets/Animation - 1736668256622.gif') }}" alt="No Data">
                    <p class="mt-3 mb-0">Tidak ada data transaksi untuk periode yang dipilih</p>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>

          <!-- Modern Pagination -->
          @if (!$kasir->isEmpty())
            <nav aria-label="Navigasi halaman" class="mt-4">
              <ul class="pagination justify-content-end">
                <!-- Previous Page -->
                <li class="page-item {{ $kasir->onFirstPage() ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $kasir->previousPageUrl() }}" tabindex="-1">
                    <i class="bi bi-chevron-left me-1"></i>Previous
                  </a>
                </li>
                
                <!-- Page Numbers -->
                @for ($i = 1; $i <= $kasir->lastPage(); $i++)
                  <li class="page-item {{ $i == $kasir->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $kasir->url($i) }}">{{ $i }}</a>
                  </li>
                @endfor

                <!-- Next Page -->
                <li class="page-item {{ $kasir->hasMorePages() ? '' : 'disabled' }}">
                  <a class="page-link" href="{{ $kasir->nextPageUrl() }}">
                    Next<i class="bi bi-chevron-right ms-1"></i>
                  </a>
                </li>
              </ul>
            </nav>
          @endif
        </div>
      </div>
    </div>
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->

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

            // Auto-close alerts after 3 seconds
            setTimeout(function () {
                var alert = document.getElementById('alert');

                if (alert) {
                    var closeButton = alert.querySelector('[data-bs-dismiss="alert"]');
                    if (closeButton) {
                        closeButton.click();
                    }
                }
            }, 3000); // 3000ms = 3 seconds

            // Enhanced hover effects for action buttons
            document.addEventListener('DOMContentLoaded', function() {
                const actionButtons = document.querySelectorAll('.btn');
                
                actionButtons.forEach(button => {
                    button.addEventListener('mouseenter', function() {
                        if (!this.disabled) {
                            this.style.transform = 'translateY(-2px)';
                        }
                    });
                    
                    button.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });
            });

            // Form submission loading state
            document.addEventListener('DOMContentLoaded', function() {
                const forms = document.querySelectorAll('form');
                
                forms.forEach(form => {
                    form.addEventListener('submit', function(e) {
                        const submitBtn = this.querySelector('button[type="submit"]');
                        if (submitBtn) {
                            const originalHTML = submitBtn.innerHTML;
                            submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Loading...';
                            submitBtn.disabled = true;
                            
                            // Reset after delay if form doesn't submit
                            setTimeout(() => {
                                submitBtn.innerHTML = originalHTML;
                                submitBtn.disabled = false;
                            }, 3000);
                        }
                    });
                });
            });
        </script>
@endsection