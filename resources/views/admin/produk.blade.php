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

  /* Modern Modal */
  .modal-content {
    border-radius: var(--border-radius) !important;
    border: none !important;
    box-shadow: var(--modern-shadow-lg) !important;
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
  }

  .modal-footer {
    background: var(--cream-light) !important;
    border-top: 1px solid var(--cream-dark) !important;
    border-radius: 0 0 var(--border-radius) var(--border-radius) !important;
    padding: 1.5rem !important;
  }

  /* Modern Form */
  .form-label {
    color: var(--text-primary) !important;
    font-weight: 600 !important;
    margin-bottom: 0.5rem !important;
  }

  .form-control {
    border: 2px solid var(--cream-dark) !important;
    border-radius: var(--border-radius) !important;
    padding: 12px 16px !important;
    transition: all 0.3s ease !important;
    background: var(--cream-light) !important;
  }

  .form-control:focus {
    border-color: var(--red-primary) !important;
    box-shadow: 0 0 0 0.2rem rgba(220, 38, 38, 0.25) !important;
    background: white !important;
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

  /* Product Image Styling */
  .product-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 12px;
    border: 2px solid var(--cream-dark);
    transition: all 0.3s ease;
  }

  .product-image:hover {
    transform: scale(1.1);
    border-color: var(--red-primary);
  }

  /* Price Badge */
  .price-badge {
    background: var(--red-gradient);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
  }

  /* Promo Badge */
  .promo-badge {
    background: linear-gradient(135deg, #10b981, #059669);
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
            <i class="bi bi-cup-hot-fill" style="color: var(--red-primary);"></i>
            Kelola Produk
          </h2>
          <p class="mb-0 text-muted mt-1">Manajemen produk kopi Bach Coffee</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end mb-0">
            <li class="breadcrumb-item">
              <a href="#" style="color: var(--red-primary); text-decoration: none;">
                <i class="bi bi-house-door me-1"></i>Home
              </a>
            </li>
            <li class="breadcrumb-item active" style="color: var(--text-primary);">Produk</li>
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
            <h4 class="mb-1" style="color: var(--text-primary); font-weight: 600;">Data Produk</h4>
            <p class="mb-0 text-muted">Daftar semua produk kopi yang tersedia</p>
          </div>
          <button type="button" class="btn-modern-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-plus-circle"></i>
            Tambah Produk
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
                  <i class="bi bi-cup-hot me-2"></i>Nama Produk
                </th>
                <th>
                  <i class="bi bi-cash me-2"></i>Harga
                </th>
                <th>
                  <i class="bi bi-percent me-2"></i>Promo
                </th>
                <th>
                  <i class="bi bi-image me-2"></i>Foto
                </th>
                <th style="width: 20%">
                  <i class="bi bi-gear me-2"></i>Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @if ($produk->isEmpty())
                <tr>
                  <td colspan="6" class="no-data-state">
                    <img src="{{ asset('/build/assets/Animation - 1736668256622.gif') }}" alt="No Data" style="width: 150px;">
                    <h5 class="mt-3">Belum ada data produk</h5>
                    <p>Klik tombol "Tambah Produk" untuk menambah data baru</p>
                  </td>
                </tr>
              @else
                @foreach ($produk as $data)
                  <tr>
                    <td class="fw-bold">{{ $data->id_produk }}</td>
                    <td>{{ $data->nama_produk }}</td>
                    <td>
                      <span class="price-badge">Rp {{ number_format($data->harga_produk, 0, ',', '.') }}</span>
                    </td>
                    <td>
                      @if($data->promo)
                        <span class="promo-badge">{{ $data->promo }}%</span>
                      @else
                        <span class="badge bg-secondary">Tidak ada promo</span>
                      @endif
                    </td>
                    <td>
                      @if($data->foto)
                        <img src="{{ asset('uploads/' . $data->foto) }}" alt="{{ $data->nama_produk }}" class="product-image">
                      @else
                        <i class="bi bi-image fs-2 text-muted"></i>
                      @endif
                    </td>
                    <td>
                      <!-- Tombol Edit -->
                      <a href="javascript:void(0)" 
                         data-bs-toggle="modal" 
                         data-bs-target="#staticBackdropUpdate" 
                         onclick="setEditData('{{ $data->id_produk }}', '{{ $data->nama_produk }}', '{{ $data->harga_produk }}', '{{ $data->promo }}')"
                         class="action-btn action-btn-edit" 
                         title="Edit Produk">
                        <i class="bi bi-pencil-square"></i>
                      </a>

                      <!-- Tombol Hapus -->
                      <a href="javascript:void(0)" 
                         data-bs-toggle="modal" 
                         data-bs-target="#staticBackdropDelete" 
                         onclick="setDeleteData('{{ $data->id_produk }}')" 
                         class="action-btn action-btn-delete" 
                         title="Hapus Produk">
                        <i class="bi bi-trash"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>

          <!-- Modern Pagination -->
          @if (!$produk->isEmpty())
            <nav aria-label="Navigasi halaman" class="mt-4">
              <ul class="pagination justify-content-end">
                <!-- Previous Page -->
                <li class="page-item {{ $produk->onFirstPage() ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $produk->previousPageUrl() }}" tabindex="-1">
                    <i class="bi bi-chevron-left me-1"></i>Previous
                  </a>
                </li>
                
                <!-- Page Numbers -->
                @for ($i = 1; $i <= $produk->lastPage(); $i++)
                  <li class="page-item {{ $i == $produk->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $produk->url($i) }}">{{ $i }}</a>
                  </li>
                @endfor

                <!-- Next Page -->
                <li class="page-item {{ $produk->hasMorePages() ? '' : 'disabled' }}">
                  <a class="page-link" href="{{ $produk->nextPageUrl() }}">
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
          <i class="bi bi-plus-circle" style="color: var(--red-primary);"></i>
          Tambah Produk
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <!-- Form Tambah Produk -->
        <form id="tambahProdukForm" action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nama_produk" class="form-label">
              <i class="bi bi-cup-hot me-2"></i>Nama Produk
            </label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan nama produk" required>
          </div>
          <div class="mb-3">
            <label for="harga_produk" class="form-label">
              <i class="bi bi-cash me-2"></i>Harga Produk
            </label>
            <input type="number" class="form-control" id="harga_produk" name="harga_produk" placeholder="Masukkan harga produk" required>
          </div>
          <div class="mb-3">
            <label for="promo" class="form-label">
              <i class="bi bi-percent me-2"></i>Promo (%)
            </label>
            <input type="number" class="form-control" id="promo" name="promo" placeholder="Masukkan persentase promo" min="0" max="100">
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">
              <i class="bi bi-image me-2"></i>Foto Produk
            </label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
            <div class="form-text">Format yang didukung: JPG, PNG, GIF (Maksimal 2MB)</div>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-2"></i>Batal
        </button>
        <button type="submit" class="btn btn-success" form="tambahProdukForm">
          <i class="bi bi-check-circle me-2"></i>Simpan
        </button>
      </div>
    </div>
  </div>
</div>

<!-- UPDATE MODAL -->
<div class="modal fade" id="staticBackdropUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropUpdateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropUpdateLabel">
          <i class="bi bi-pencil-square" style="color: var(--red-primary);"></i>
          Update Produk
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form id="updateProdukForm" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Input Hidden untuk ID Produk -->
          <input type="hidden" id="id_produk" name="id_produk">

          <div class="mb-3">
            <label for="nama_produk2" class="form-label">
              <i class="bi bi-cup-hot me-2"></i>Nama Produk
            </label>
            <input type="text" class="form-control" id="nama_produk2" name="nama_produk" placeholder="Masukkan nama produk" required>
          </div>

          <div class="mb-3">
            <label for="harga_produk2" class="form-label">
              <i class="bi bi-cash me-2"></i>Harga Produk
            </label>
            <input type="number" class="form-control" id="harga_produk2" name="harga_produk" placeholder="Masukkan harga produk" required>
          </div>

          <div class="mb-3">
            <label for="promo2" class="form-label">
              <i class="bi bi-percent me-2"></i>Promo (%)
            </label>
            <input type="number" class="form-control" id="promo2" name="promo" placeholder="Masukkan persentase promo" min="0" max="100">
          </div>

          <div class="mb-3">
            <label for="foto2" class="form-label">
              <i class="bi bi-image me-2"></i>Foto Produk
            </label>
            <input type="file" class="form-control" id="foto2" name="foto" accept="image/*">
            <div class="form-text">Kosongkan jika tidak ingin mengubah foto</div>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-2"></i>Batal
        </button>
        <button type="submit" class="btn btn-success" form="updateProdukForm">
          <i class="bi bi-check-circle me-2"></i>Update
        </button>
      </div>
    </div>
  </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropDeleteLabel" aria-hidden="true">
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
          <p class="text-muted">Data produk yang dihapus tidak dapat dikembalikan!</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-2"></i>Batal
        </button>
        <form id="deleteForm" action="{{ url('/admin/produk/delete') }}/" method="POST" style="display: inline;">
          @csrf
          <input type="hidden" name="id_produk" id="id_produk3">
          <button type="submit" class="btn btn-danger">
            <i class="bi bi-trash me-2"></i>Ya, Hapus
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
<script>
// Function to set edit data for update modal
function setEditData(id_produk, nama_produk, harga_produk, promo) {
    // Clear previous values
    document.getElementById('id_produk').value = '';
    document.getElementById('nama_produk2').value = '';
    document.getElementById('harga_produk2').value = '';
    document.getElementById('promo2').value = '';
    
    // Set new values
    document.getElementById('id_produk').value = id_produk;
    document.getElementById('nama_produk2').value = nama_produk;
    document.getElementById('harga_produk2').value = harga_produk;
    document.getElementById('promo2').value = promo || '';

    // Update form action with id_produk
    const form = document.getElementById('updateProdukForm');
    const baseUrl = "{{ url('/admin/produk/update') }}/";
    form.action = `${baseUrl}${id_produk}`;
}

// Function to set delete data for delete modal
function setDeleteData(id_produk) {
    // Clear previous value
    document.getElementById('id_produk3').value = '';
    
    // Set new value
    document.getElementById('id_produk3').value = id_produk;

    // Update form action with id_produk
    const form = document.getElementById('deleteForm');
    const baseUrl = "{{ url('/admin/produk/delete') }}/";
    form.action = `${baseUrl}${id_produk}`;
}

// Function to clear create form when modal is opened
document.addEventListener('DOMContentLoaded', function() {
    // Clear create form when modal is shown
    const createModal = document.getElementById('staticBackdrop');
    createModal.addEventListener('show.bs.modal', function() {
        document.getElementById('tambahProdukForm').reset();
    });
    
    // Clear update form when modal is hidden
    const updateModal = document.getElementById('staticBackdropUpdate');
    updateModal.addEventListener('hidden.bs.modal', function() {
        document.getElementById('updateProdukForm').reset();
    });
    
    // Clear delete form when modal is hidden
    const deleteModal = document.getElementById('staticBackdropDelete');
    deleteModal.addEventListener('hidden.bs.modal', function() {
        document.getElementById('id_produk3').value = '';
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
    const createForm = document.getElementById('tambahProdukForm');
    createForm.addEventListener('submit', function(e) {
        const namaProduk = document.getElementById('nama_produk').value.trim();
        const hargaProduk = document.getElementById('harga_produk').value.trim();
        const foto = document.getElementById('foto').files[0];
        
        if (!namaProduk || !hargaProduk) {
            e.preventDefault();
            alert('Nama produk dan harga harus diisi!');
            return false;
        }
        
        if (hargaProduk <= 0) {
            e.preventDefault();
            alert('Harga produk harus lebih dari 0!');
            return false;
        }
        
        if (!foto) {
            e.preventDefault();
            alert('Foto produk harus diupload!');
            return false;
        }
        
        // Check file size (max 2MB)
        if (foto.size > 2 * 1024 * 1024) {
            e.preventDefault();
            alert('Ukuran file foto maksimal 2MB!');
            return false;
        }
        
        // Check file type
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!allowedTypes.includes(foto.type)) {
            e.preventDefault();
            alert('Format file tidak didukung! Gunakan JPG, PNG, atau GIF.');
            return false;
        }
    });
    
    // Add form validation for update form
    const updateForm = document.getElementById('updateProdukForm');
    updateForm.addEventListener('submit', function(e) {
        const namaProduk = document.getElementById('nama_produk2').value.trim();
        const hargaProduk = document.getElementById('harga_produk2').value.trim();
        const foto = document.getElementById('foto2').files[0];
        
        if (!namaProduk || !hargaProduk) {
            e.preventDefault();
            alert('Nama produk dan harga harus diisi!');
            return false;
        }
        
        if (hargaProduk <= 0) {
            e.preventDefault();
            alert('Harga produk harus lebih dari 0!');
            return false;
        }
        
        // Check file size if file is selected (max 2MB)
        if (foto && foto.size > 2 * 1024 * 1024) {
            e.preventDefault();
            alert('Ukuran file foto maksimal 2MB!');
            return false;
        }
        
        // Check file type if file is selected
        if (foto) {
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(foto.type)) {
                e.preventDefault();
                alert('Format file tidak didukung! Gunakan JPG, PNG, atau GIF.');
                return false;
            }
        }
    });
    
    // Format currency input
    const formatCurrency = (input) => {
        input.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            this.value = value;
        });
    };
    
    formatCurrency(document.getElementById('harga_produk'));
    formatCurrency(document.getElementById('harga_produk2'));
    
    // Limit promo percentage
    const limitPromo = (input) => {
        input.addEventListener('input', function() {
            let value = parseInt(this.value);
            if (value > 100) this.value = 100;
            if (value < 0) this.value = 0;
        });
    };
    
    limitPromo(document.getElementById('promo'));
    limitPromo(document.getElementById('promo2'));
});
</script>


@endsection