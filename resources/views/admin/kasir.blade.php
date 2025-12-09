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
    /* Removed backdrop-filter for performance */
  }

  /* Modern Card - Optimized */
  .modern-card {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--modern-shadow);
    border: 1px solid var(--cream-dark);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .modern-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--modern-shadow-lg);
  }

  .modern-card-body {
    padding: 2rem;
  }

  /* Modern Button - Optimized */
  .btn-modern-primary {
    background: var(--red-gradient) !important;
    border: none !important;
    color: white !important;
    font-weight: 600 !important;
    padding: 12px 24px !important;
    border-radius: var(--border-radius) !important;
    transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  .btn-modern-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--modern-shadow);
    color: white !important;
  }

  /* Modern Table - Optimized */
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
    transition: background-color 0.2s ease;
    border-bottom: 1px solid var(--cream-secondary);
  }

  .modern-table tbody tr:hover {
    background: var(--cream-light);
  }

  .modern-table tbody td {
    padding: 1rem;
    vertical-align: middle;
    text-align: center;
    border: none;
  }

  /* Modern Modal */
  .modal {
    z-index: 1050 !important;
  }

  .modal-backdrop {
    z-index: 1040 !important;
    background-color: rgba(0, 0, 0, 0.5) !important;
  }

  .modal-dialog {
    z-index: 1060 !important;
    position: relative;
  }

  .modal-content {
    border-radius: var(--border-radius) !important;
    border: none !important;
    box-shadow: var(--modern-shadow-lg) !important;
    z-index: 1070 !important;
    position: relative;
  }

  .modal-header {
    background: var(--cream-gradient) !important;
    border-bottom: 1px solid var(--cream-dark) !important;
    border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
    padding: 1.5rem !important;
  }

  .modal-title {
    color: var(--text-primary) !important;
    font-weight: 700 !important;
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .modal-body {
    padding: 2rem !important;
    z-index: 1070 !important;
    position: relative;
  }

  .modal-footer {
    background: var(--cream-light) !important;
    border-top: 1px solid var(--cream-dark) !important;
    border-radius: 0 0 var(--border-radius) var(--border-radius) !important;
    padding: 1.5rem !important;
    z-index: 1070 !important;
    position: relative;
  }

  /* Modern Form */
  .form-label {
    color: var(--text-primary) !important;
    font-weight: 600 !important;
    margin-bottom: 0.5rem !important;
    z-index: 1080 !important;
    position: relative;
  }

  .form-control {
    border: 2px solid var(--cream-dark) !important;
    border-radius: var(--border-radius) !important;
    padding: 12px 16px !important;
    transition: all 0.3s ease !important;
    background: var(--cream-light) !important;
    z-index: 1080 !important;
    position: relative;
  }

  .form-control:focus {
    border-color: var(--red-primary) !important;
    box-shadow: 0 0 0 0.2rem rgba(220, 38, 38, 0.25) !important;
    background: white !important;
    z-index: 1090 !important;
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
  }

  .action-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--modern-shadow);
  }

  .action-btn-edit {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
  }

  .action-btn-delete {
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

  .btn-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626) !important;
    border: none !important;
    font-weight: 600 !important;
    border-radius: var(--border-radius) !important;
  }

  .btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: var(--modern-shadow);
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
            <i class="bi bi-person-gear" style="color: var(--red-primary);"></i>
            Kelola Kasir
          </h2>
          <p class="mb-0 text-muted mt-1">Manajemen data kasir Bach Coffee</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end mb-0">
            <li class="breadcrumb-item">
              <a href="#" style="color: var(--red-primary); text-decoration: none;">
                <i class="bi bi-house-door me-1"></i>Home
              </a>
            </li>
            <li class="breadcrumb-item active" style="color: var(--text-primary);">Kasir</li>
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
            <h4 class="mb-1" style="color: var(--text-primary); font-weight: 600;">Data Kasir</h4>
            <p class="mb-0 text-muted">Daftar semua kasir yang terdaftar</p>
          </div>
          <button type="button" class="btn-modern-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-plus-circle"></i>
            Tambah Kasir
          </button>
        </div>

        <!-- Modern Data Table -->
        <div class="table-responsive">
          <table class="modern-table table">
            <thead>
              <tr>
                <th style="width: 10%">
                  <i class="bi bi-hash me-2"></i>ID
                </th>
                <th>
                  <i class="bi bi-at me-2"></i>Username
                </th>
                <th>
                  <i class="bi bi-person me-2"></i>Nama Kasir
                </th>
                <th style="width: 20%">
                  <i class="bi bi-gear me-2"></i>Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @if (isset($kasir) && $kasir->isEmpty())
                <tr>
                  <td colspan="4" class="no-data-state">
                    <img src="{{ asset('/build/assets/Animation - 1736668256622.gif') }}" alt="No Data" style="width: 150px;">
                    <h5 class="mt-3">Belum ada data kasir</h5>
                    <p>Klik tombol "Tambah Kasir" untuk menambah data baru</p>
                  </td>
                </tr>
              @elseif(isset($kasir))
                @foreach ($kasir as $data)
                  <tr>
                    <td class="fw-bold">{{ $data->id_user }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->nama_lengkap }}</td>
                    <td>
                      <!-- Tombol Edit -->
                      <a href="javascript:void(0)" 
                         data-bs-toggle="modal" 
                         data-bs-target="#staticBackdropUpdate" 
                         onclick="setEditData('{{ $data->id_user }}', '{{ $data->username }}', '{{ $data->nama_lengkap }}','{{ $data->password }}')"
                         class="action-btn action-btn-edit" 
                         title="Edit Kasir">
                        <i class="bi bi-pencil-square"></i>
                      </a>

                      <!-- Tombol Hapus -->
                      <a href="javascript:void(0)" 
                         data-bs-toggle="modal" 
                         data-bs-target="#staticBackdropDelete" 
                         onclick="setDeleteData('{{ $data->id_user }}')" 
                         class="action-btn action-btn-delete" 
                         title="Hapus Kasir">
                        <i class="bi bi-trash"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4" class="no-data-state">
                    <i class="bi bi-exclamation-triangle fs-1 text-warning mb-3"></i>
                    <h5 class="mt-3">Data tidak tersedia</h5>
                    <p>Terjadi kesalahan dalam memuat data kasir</p>
                  </td>
                </tr>
              @endif
            </tbody>
          </table>

          <!-- Modern Pagination -->
          @if (isset($kasir) && !$kasir->isEmpty())
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

<!-- CREATE MODAL -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">
          <i class="bi bi-person-plus-fill" style="color: var(--red-primary);"></i>
          Tambah Kasir
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <!-- Form Tambah Kasir -->
        <form id="tambahKasirForm" action="{{route('kasir.store')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="nama_lengkap" class="form-label">
              <i class="bi bi-person me-2"></i>Nama Kasir
            </label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap kasir" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">
              <i class="bi bi-at me-2"></i>Username
            </label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">
              <i class="bi bi-lock me-2"></i>Password
            </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-2"></i>Batal
        </button>
        <button type="submit" class="btn btn-success" form="tambahKasirForm">
          <i class="bi bi-check-circle me-2"></i>Simpan
        </button>
      </div>
    </div>
  </div>
</div>

<!-- UPDATE MODAL -->
<div class="modal fade" id="staticBackdropUpdate" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropUpdateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropUpdateLabel">
          <i class="bi bi-pencil-square" style="color: var(--red-primary);"></i>
          Update Kasir
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form id="updateKasirForm" action="{{ url('/admin/updatekasir') }}/" method="POST">
          @csrf
          <!-- Input Hidden untuk ID Kasir -->
          <input type="hidden" id="id_kasir2" name="id_kasir">
          <input type="hidden" id="password2" name="password">

          <div class="mb-3">
            <label for="nama_lengkap2" class="form-label">
              <i class="bi bi-person me-2"></i>Nama Kasir
            </label>
            <input type="text" class="form-control" id="nama_lengkap2" name="nama_lengkap" placeholder="Masukkan nama lengkap kasir" required>
          </div>

          <div class="mb-3">
            <label for="username2" class="form-label">
              <i class="bi bi-at me-2"></i>Username
            </label>
            <input type="text" class="form-control" id="username2" name="username" placeholder="Masukkan username" required>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-2"></i>Batal
        </button>
        <button type="submit" class="btn btn-success" form="updateKasirForm">
          <i class="bi bi-check-circle me-2"></i>Update
        </button>
      </div>
    </div>
  </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropDeleteLabel">
          <i class="bi bi-exclamation-triangle" style="color: var(--red-primary);"></i>
          Konfirmasi Hapus
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center py-3">
          <i class="bi bi-trash3 fs-1 text-danger mb-3"></i>
          <h5 class="mb-2">Apakah Anda yakin?</h5>
          <p class="text-muted">Data kasir yang dihapus tidak dapat dikembalikan!</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-2"></i>Batal
        </button>
        <form id="deleteForm" action="{{ url('/admin/hapuskasir') }}/" method="POST" style="display: inline;">
          @csrf
          <input type="hidden" name="id_kasir" id="id_kasir3">
          <button type="submit" class="btn btn-danger">
            <i class="bi bi-trash me-2"></i>Ya, Hapus
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
// Function to set edit data for update modal
function setEditData(id_user, username, nama_lengkap, password) {
    // Clear previous values
    document.getElementById('id_kasir2').value = '';
    document.getElementById('username2').value = '';
    document.getElementById('nama_lengkap2').value = '';
    document.getElementById('password2').value = '';
    
    // Set new values
    document.getElementById('id_kasir2').value = id_user;
    document.getElementById('username2').value = username;
    document.getElementById('nama_lengkap2').value = nama_lengkap;
    document.getElementById('password2').value = password;

    // Update form action with id_user
    const form = document.getElementById('updateKasirForm');
    const baseUrl = "{{ url('/admin/updatekasir') }}/";
    form.action = `${baseUrl}${id_user}`;
}

// Function to set delete data for delete modal
function setDeleteData(id_user) {
    // Clear previous value
    document.getElementById('id_kasir3').value = '';
    
    // Set new value
    document.getElementById('id_kasir3').value = id_user;

    // Update form action with id_user
    const form = document.getElementById('deleteForm');
    const baseUrl = "{{ url('/admin/hapuskasir') }}/";
    form.action = `${baseUrl}${id_user}`;
}

// Function to clear create form when modal is opened
document.addEventListener('DOMContentLoaded', function() {
    // Clear create form when modal is shown
    const createModal = document.getElementById('staticBackdrop');
    createModal.addEventListener('show.bs.modal', function() {
        document.getElementById('tambahKasirForm').reset();
    });
    
    // Clear update form when modal is hidden
    const updateModal = document.getElementById('staticBackdropUpdate');
    updateModal.addEventListener('hidden.bs.modal', function() {
        document.getElementById('updateKasirForm').reset();
    });
    
    // Clear delete form when modal is hidden
    const deleteModal = document.getElementById('staticBackdropDelete');
    deleteModal.addEventListener('hidden.bs.modal', function() {
        document.getElementById('id_kasir3').value = '';
    });
});

// Auto-close alerts after 3 seconds
setTimeout(function() {
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

// Form validation
document.addEventListener('DOMContentLoaded', function() {
    // Add form validation for create form
    const createForm = document.getElementById('tambahKasirForm');
    createForm.addEventListener('submit', function(e) {
        const namaLengkap = document.getElementById('nama_lengkap').value.trim();
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        
        if (!namaLengkap || !username || !password) {
            e.preventDefault();
            alert('Semua field harus diisi!');
            return false;
        }
        
        if (password.length < 6) {
            e.preventDefault();
            alert('Password minimal 6 karakter!');
            return false;
        }
    });
    
    // Add form validation for update form
    const updateForm = document.getElementById('updateKasirForm');
    updateForm.addEventListener('submit', function(e) {
        const namaLengkap = document.getElementById('nama_lengkap2').value.trim();
        const username = document.getElementById('username2').value.trim();
        
        if (!namaLengkap || !username) {
            e.preventDefault();
            alert('Nama kasir dan username harus diisi!');
            return false;
        }
    });
});
</script>

@endsection
