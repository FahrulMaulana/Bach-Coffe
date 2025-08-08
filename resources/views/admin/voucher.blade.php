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
  }

  .modern-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--modern-shadow-lg);
  }

  .modern-card-body {
    padding: 2rem;
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

  /* Modern Status Badges */
  .status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .status-badge.pending {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
  }

  .status-badge.verified {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
  }

  .status-badge.rejected {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
  }

  /* Modern Action Buttons */
  .action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 12px;
    margin: 0 4px;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
    cursor: pointer;
  }

  .action-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--modern-shadow);
  }

  .action-btn-accept {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
  }

  .action-btn-reject {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
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

  /* Voucher Code Styling */
  .voucher-code {
    font-family: 'Roboto Mono', monospace !important;
    background: var(--cream-light);
    border: 1px solid var(--cream-dark);
    padding: 8px 12px;
    border-radius: 8px;
    font-weight: 600;
    color: var(--red-primary);
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
            <i class="bi bi-ticket-perforated" style="color: var(--red-primary);"></i>
            Verifikasi Voucher
          </h2>
          <p class="mb-0 text-muted mt-1">Kelola dan verifikasi voucher member Bach Coffee</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end mb-0">
            <li class="breadcrumb-item">
              <a href="#" style="color: var(--red-primary); text-decoration: none;">
                <i class="bi bi-house-door me-1"></i>Home
              </a>
            </li>
            <li class="breadcrumb-item active" style="color: var(--text-primary);">Voucher</li>
          </ol>
        </div>
      </div>
    </div>

    <!-- Alerts -->
    @if ($errors->any())
      <div class="alert alert-danger d-flex align-items-center" id="error-alert" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger d-flex align-items-center" id="error-alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session('success'))
      <div class="alert alert-success d-flex align-items-center" id="success-alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    
    <!-- Main Content Card -->
    <div class="modern-card">
      <div class="modern-card-body">
        <!-- Action Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h4 class="mb-1" style="color: var(--text-primary); font-weight: 600;">Data Voucher</h4>
            <p class="mb-0 text-muted">Daftar voucher yang perlu diverifikasi</p>
          </div>
        </div>

        <!-- Modern Data Table -->
        <div class="table-responsive">
          <table class="modern-table table">
            <thead>
              <tr>
                <th style="width: 8%">
                  <i class="bi bi-hash me-2"></i>No
                </th>
                <th>
                  <i class="bi bi-ticket-perforated me-2"></i>ID Voucher
                </th>
                <th>
                  <i class="bi bi-person-fill me-2"></i>Member
                </th>
                <th>
                  <i class="bi bi-star-fill me-2"></i>Poin Terpakai
                </th>
                <th>
                  <i class="bi bi-check-circle me-2"></i>Status
                </th>
                <th style="width: 15%">
                  <i class="bi bi-gear me-2"></i>Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @if ($voucher->isEmpty())
                <tr>
                  <td colspan="6" class="no-data-state">
                    <img src="{{ asset('/build/assets/Animation - 1736668256622.gif') }}" alt="No Data">
                    <p class="mt-3 mb-0">Tidak ada voucher yang perlu diverifikasi</p>
                  </td>
                </tr>
              @else
                @foreach ($voucher as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      <span class="voucher-code">{{ $data->kode_voucher }}</span>
                    </td>
                    <td>
                      <span class="member-badge">{{ $data->member->nama_member }}</span>
                    </td>
                    <td>
                      <span class="points-badge">{{ $data->poin_terpakai }} poin</span>
                    </td>
                    <td>
                      @if($data->status_voucher === 'Terverifikasi')
                        <span class="status-badge verified">
                          <i class="bi bi-check-circle-fill"></i>
                          Terverifikasi
                        </span>
                      @elseif($data->status_voucher === 'Ditolak')
                        <span class="status-badge rejected">
                          <i class="bi bi-x-circle-fill"></i>
                          Ditolak
                        </span>
                      @else
                        <span class="status-badge pending">
                          <i class="bi bi-clock-fill"></i>
                          Menunggu Verifikasi
                        </span>
                      @endif
                    </td>
                    <td>
                      @if($data->status_voucher == 'Menunggu Verifikasi')
                        <div class="d-flex justify-content-center gap-2">
                          <!-- Accept Button -->
                          <form action="{{ route('voucher.store') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id_voucher" value="{{ $data->id_voucher }}">
                            <button type="submit" class="action-btn action-btn-accept" title="Terima Voucher">
                              <i class="bi bi-check-lg"></i>
                            </button>
                          </form>

                          <!-- Reject Button -->
                          <form action="{{ route('voucher.decline') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id_voucher" value="{{ $data->id_voucher }}">
                            <button type="submit" class="action-btn action-btn-reject" title="Tolak Voucher" 
                                    onclick="return confirm('Apakah Anda yakin ingin menolak voucher ini?')">
                              <i class="bi bi-x-lg"></i>
                            </button>
                          </form>
                        </div>
                      @else
                        <span class="text-muted">-</span>
                      @endif
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>

          <!-- Modern Pagination -->
          @if (!$voucher->isEmpty())
            <nav aria-label="Navigasi halaman" class="mt-4">
              <ul class="pagination justify-content-end">
                <!-- Previous Page -->
                <li class="page-item {{ $voucher->onFirstPage() ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $voucher->previousPageUrl() }}" tabindex="-1">
                    <i class="bi bi-chevron-left me-1"></i>Previous
                  </a>
                </li>
                
                <!-- Page Numbers -->
                @for ($i = 1; $i <= $voucher->lastPage(); $i++)
                  <li class="page-item {{ $i == $voucher->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $voucher->url($i) }}">{{ $i }}</a>
                  </li>
                @endfor

                <!-- Next Page -->
                <li class="page-item {{ $voucher->hasMorePages() ? '' : 'disabled' }}">
                  <a class="page-link" href="{{ $voucher->nextPageUrl() }}">
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
        // Auto-close alerts after 3 seconds
        setTimeout(function () {
            var errorAlert = document.getElementById('error-alert');
            var successAlert = document.getElementById('success-alert');

            // Check for error alert and trigger close event
            if (errorAlert) {
                var closeButton = errorAlert.querySelector('[data-bs-dismiss="alert"]');
                if (closeButton) {
                    closeButton.click();
                }
            }

            // Check for success alert and trigger close event
            if (successAlert) {
                var closeButton = successAlert.querySelector('[data-bs-dismiss="alert"]');
                if (closeButton) {
                    closeButton.click();
                }
            }
        }, 3000); // 3000ms = 3 seconds

        // Enhanced form submission with loading state
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button[type="submit"]');
                    if (button) {
                        // Add loading state
                        const originalHTML = button.innerHTML;
                        button.innerHTML = '<i class="bi bi-hourglass-split"></i>';
                        button.disabled = true;
                        
                        // Reset after delay if form doesn't submit (for validation errors)
                        setTimeout(() => {
                            button.innerHTML = originalHTML;
                            button.disabled = false;
                        }, 3000);
                    }
                });
            });
        });

        // Add confirmation for voucher actions
        function confirmVoucherAction(action, voucherCode) {
            const actionText = action === 'accept' ? 'menerima' : 'menolak';
            const message = `Apakah Anda yakin ingin ${actionText} voucher ${voucherCode}?`;
            return confirm(message);
        }

        // Enhanced hover effects for action buttons
        document.addEventListener('DOMContentLoaded', function() {
            const actionButtons = document.querySelectorAll('.action-btn');
            
            actionButtons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px) scale(1.05)';
                });
                
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>


@endsection