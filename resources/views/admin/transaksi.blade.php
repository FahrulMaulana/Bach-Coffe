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

  /* Transaction Form Styling */
  .transaction-summary {
    background: var(--cream-light);
    border: 2px solid var(--cream-dark);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    margin-top: 2rem;
  }

  .transaction-summary h5 {
    color: var(--text-primary);
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .product-row {
    background: white;
    border: 1px solid var(--cream-dark);
    border-radius: var(--border-radius);
    padding: 1rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
  }

  .product-row:hover {
    box-shadow: var(--modern-shadow);
  }

  /* Price Display */
  .price-display {
    font-family: 'Roboto Mono', monospace !important;
    font-weight: 600;
    color: var(--red-primary);
  }

  /* Member Badge */
  .member-badge {
    background: var(--red-gradient);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
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
            <i class="bi bi-receipt" style="color: var(--red-primary);"></i>
            Kelola Transaksi
          </h2>
          <p class="mb-0 text-muted mt-1">Form transaksi penjualan Bach Coffee</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end mb-0">
            <li class="breadcrumb-item">
              <a href="#" style="color: var(--red-primary); text-decoration: none;">
                <i class="bi bi-house-door me-1"></i>Home
              </a>
            </li>
            <li class="breadcrumb-item active" style="color: var(--text-primary);">Transaksi</li>
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
    
    <!-- Transaction Form Card -->
    <div class="modern-card">
      <div class="modern-card-body">
        <!-- Action Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h4 class="mb-1" style="color: var(--text-primary); font-weight: 600;">
              <i class="bi bi-plus-circle me-2" style="color: var(--red-primary);"></i>
              Tambah Transaksi
            </h4>
            <p class="mb-0 text-muted">Buat transaksi penjualan baru</p>
          </div>
        </div>

        <form id="transactionForm" action="{{ route('transaksi.store') }}" method="POST">
          @csrf
          
          <!-- Member Selection -->
          <div class="row mb-4">
            <div class="col-md-6">
              <label class="form-label">
                <i class="bi bi-person-fill me-2"></i>Member
              </label>
              <select name="id_member" class="form-select">
                <option value="">Non Member</option>
                @foreach($members as $member)
                  <option value="{{ $member->id_member }}">
                    {{ $member->nama_member }} 
                    <span class="member-badge">{{ $member->total_poin }} poin</span>
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- Products Section -->
          <div class="mb-4">
            <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600;">
              <i class="bi bi-cup-hot me-2" style="color: var(--red-primary);"></i>
              Pilih Produk
            </h5>
            
            <div id="product-container">
              <div class="product-row">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <label class="form-label">Produk</label>
                    <select name="products[0][id]" class="form-select product-select" required>
                      <option value="">Pilih Produk</option>
                      @foreach($products as $product)
                        <option value="{{ $product->id_produk }}" data-harga="{{ $product->harga_produk }}">
                          {{ $product->nama_produk }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-2">
                    <label class="form-label">Jumlah</label>
                    <input type="number" name="products[0][quantity]" class="form-control quantity" min="1" required placeholder="1">
                  </div>
                  <div class="col-md-2">
                    <label class="form-label">Harga</label>
                    <input type="text" class="form-control harga price-display" readonly data-value="0" placeholder="Rp 0">
                  </div>
                  <div class="col-md-2">
                    <label class="form-label">Subtotal</label>
                    <input type="text" class="form-control subtotal price-display" readonly data-value="0" placeholder="Rp 0">
                  </div>
                  <div class="col-md-2 d-flex gap-2 align-items-end">
                    <button type="button" class="btn btn-danger btn-sm remove-product">
                      <i class="bi bi-trash"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm btn-add-product">
                      <i class="bi bi-plus-circle"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Transaction Summary -->
          <div class="transaction-summary">
            <h5>
              <i class="bi bi-calculator me-2" style="color: var(--red-primary);"></i>
              Ringkasan Transaksi
            </h5>
            
            <div class="row">
              <div class="col-md-6 offset-md-6">
                <table class="modern-table table">
                  <tbody>
                    <tr>
                      <td style="text-align: left; font-weight: 600;">Total Harga</td>
                      <td style="text-align: right;">
                        <input type="hidden" name="total_harga" id="total_harga_raw">
                        <input type="text" id="total_harga_display" class="form-control price-display text-end" readonly placeholder="Rp 0">
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align: left; font-weight: 600;">Gunakan Poin</td>
                      <td style="text-align: right;">
                        <input type="number" name="poinuse" id="poinuse" class="form-control text-end" min="0" value="0" placeholder="0">
                      </td>
                    </tr>
                    <tr style="background: var(--cream-light);">
                      <td style="text-align: left; font-weight: 700; color: var(--red-primary);">Total Setelah Poin</td>
                      <td style="text-align: right;">
                        <input type="text" id="final_total_display" class="form-control price-display text-end" readonly placeholder="Rp 0" style="font-weight: 700; color: var(--red-primary);">
                        <input type="hidden" name="final_total" id="final_total_raw">
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align: left; font-weight: 600; color: var(--text-secondary);">Poin Didapat</td>
                      <td style="text-align: right;">
                        <input type="number" name="poin" id="poin" class="form-control text-end" readonly placeholder="0" style="color: var(--text-secondary);">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn-modern-primary">
              <i class="bi bi-save"></i>
              Simpan Transaksi
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->

    <script>
        let productCount = 1;

        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);
        }

        // Event delegation for product container
        document.getElementById('product-container').addEventListener('click', function (e) {
            // Handle add product
            if (e.target.closest('.btn-add-product')) {
                const template = document.querySelector('.product-row').cloneNode(true);

                // Update names for new row
                template.querySelectorAll('[name]').forEach(element => {
                    element.name = element.name.replace('[0]', `[${productCount}]`);
                });

                // Clear values
                template.querySelectorAll('input').forEach(input => {
                    input.value = '';
                    input.placeholder = input.classList.contains('quantity') ? '1' : 
                                      input.classList.contains('harga') || input.classList.contains('subtotal') ? 'Rp 0' : input.placeholder;
                });
                template.querySelector('select').selectedIndex = 0;

                this.appendChild(template);
                productCount++;
            }

            // Handle remove product
            if (e.target.closest('.remove-product')) {
                if (this.children.length > 1) {
                    e.target.closest('.product-row').remove();
                    calculateTotals();
                } else {
                    // Modern alert
                    showAlert('Minimal harus ada 1 produk!', 'warning');
                }
            }
        });

        // Handle input changes
        document.getElementById('product-container').addEventListener('change', function (e) {
            if (e.target.matches('.product-select, .quantity')) {
                const row = e.target.closest('.product-row');
                const select = row.querySelector('.product-select');
                const quantity = row.querySelector('.quantity');
                const harga = row.querySelector('.harga');
                const subtotal = row.querySelector('.subtotal');

                if (select.value && quantity.value) {
                    const selectedOption = select.options[select.selectedIndex];
                    const hargaValue = Number(selectedOption.dataset.harga);
                    const subtotalValue = hargaValue * Number(quantity.value);

                    // Store raw values
                    harga.dataset.value = hargaValue;
                    subtotal.dataset.value = subtotalValue;

                    // Display formatted values
                    harga.value = formatRupiah(hargaValue);
                    subtotal.value = formatRupiah(subtotalValue);

                    calculateTotals();
                }
            }
        });

        function calculateTotals() {
            let totalHarga = 0;
            document.querySelectorAll('.subtotal').forEach(input => {
                totalHarga += Number(input.dataset.value || 0);
            });

            // Set raw value for form submission
            document.getElementById('total_harga_raw').value = totalHarga;
            document.getElementById('total_harga_display').value = formatRupiah(totalHarga);

            // Get points to use
            const pointsToUse = Number(document.getElementById('poinuse').value) || 0;

            // Calculate final total after point deduction
            const finalTotal = Math.max(0, totalHarga - pointsToUse);

            // Update final total display and raw value
            document.getElementById('final_total_raw').value = finalTotal;
            document.getElementById('final_total_display').value = formatRupiah(finalTotal);

            // Calculate points earned based on final total
            document.getElementById('poin').value = Math.floor(totalHarga * 0.01);
        }

        // Add event listener for points input
        document.getElementById('poinuse').addEventListener('input', function () {
            const memberSelect = document.querySelector('select[name="id_member"]');
            const selectedOption = memberSelect.options[memberSelect.selectedIndex];

            if (memberSelect.value) {
                const memberText = selectedOption.textContent;
                const pointMatch = memberText.match(/(\d+)\s*poin/);
                const availablePoints = pointMatch ? Number(pointMatch[1]) : 0;
                
                if (this.value > availablePoints) {
                    this.value = availablePoints;
                    showAlert(`Maksimal poin yang dapat digunakan: ${availablePoints}`, 'warning');
                }
            } else {
                this.value = 0;
                showAlert('Pilih member terlebih dahulu untuk menggunakan poin', 'warning');
            }

            calculateTotals();
        });

        // Add event listener for member selection
        document.querySelector('select[name="id_member"]').addEventListener('change', function () {
            const pointsInput = document.getElementById('poinuse');
            if (!this.value) {
                pointsInput.value = 0;
                pointsInput.disabled = true;
            } else {
                pointsInput.disabled = false;
            }
            calculateTotals();
        });

        // Form submission validation
        document.getElementById('transactionForm').addEventListener('submit', function(e) {
            // Check if at least one product is selected
            const productSelects = document.querySelectorAll('.product-select');
            let hasValidProduct = false;
            
            productSelects.forEach(select => {
                if (select.value) hasValidProduct = true;
            });
            
            if (!hasValidProduct) {
                e.preventDefault();
                showAlert('Pilih minimal 1 produk!', 'danger');
                return false;
            }
            
            // Ensure raw values are submitted
            const totalHarga = document.getElementById('total_harga_raw').value;
            if (!totalHarga || totalHarga == 0) {
                e.preventDefault();
                showAlert('Total transaksi tidak boleh kosong!', 'danger');
                return false;
            }
        });

        // Modern alert function
        function showAlert(message, type = 'info') {
            const alertContainer = document.querySelector('.app-content .container-fluid');
            const alertHTML = `
                <div class="alert alert-${type} d-flex align-items-center alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    ${message}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            
            alertContainer.insertAdjacentHTML('afterbegin', alertHTML);
            
            // Auto-dismiss after 3 seconds
            setTimeout(() => {
                const alert = alertContainer.querySelector('.alert:first-child');
                if (alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            }, 3000);
        }

        // Auto-close alerts on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize member points input state
            const memberSelect = document.querySelector('select[name="id_member"]');
            const pointsInput = document.getElementById('poinuse');
            
            if (!memberSelect.value) {
                pointsInput.disabled = true;
            }
            
            // Auto-close existing alerts
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                setTimeout(() => {
                    bsAlert.close();
                }, 3000);
            });
        });
    </script>
@endsection