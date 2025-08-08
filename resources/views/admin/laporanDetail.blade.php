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

  .modern-table tfoot tr {
    background: var(--cream-light);
    font-weight: 600;
  }

  .modern-table tfoot td {
    padding: 1rem;
    border: none;
    font-weight: 600;
  }

  /* Info Table */
  .info-table {
    background: var(--cream-light);
    border-radius: var(--border-radius);
    padding: 1.5rem;
    border: 1px solid var(--cream-dark);
  }

  .info-table tr td {
    padding: 0.75rem 0;
    border: none;
    font-weight: 500;
  }

  .info-table tr td:first-child {
    color: var(--text-secondary);
    width: 150px;
  }

  .info-table tr td:last-child {
    color: var(--text-primary);
    font-weight: 600;
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

  /* Transaction Badge */
  .transaction-badge {
    background: var(--red-gradient);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  /* Modern Buttons */
  .btn-secondary {
    background: var(--cream-secondary) !important;
    border: 2px solid var(--cream-dark) !important;
    color: var(--text-primary) !important;
    font-weight: 600 !important;
    border-radius: var(--border-radius) !important;
    padding: 12px 24px !important;
    transition: all 0.3s ease !important;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  .btn-secondary:hover {
    background: var(--text-primary) !important;
    border-color: var(--text-primary) !important;
    color: white !important;
    transform: translateY(-2px);
    box-shadow: var(--modern-shadow);
  }

  /* Total Section */
  .total-section {
    background: var(--red-gradient);
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
  }

  .points-section {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
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
            <i class="bi bi-receipt-cutoff" style="color: var(--red-primary);"></i>
            Detail Transaksi
          </h2>
          <p class="mb-0 text-muted mt-1">Informasi lengkap transaksi Bach Coffee</p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end mb-0">
            <li class="breadcrumb-item">
              <a href="#" style="color: var(--red-primary); text-decoration: none;">
                <i class="bi bi-house-door me-1"></i>Home
              </a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('laporan') }}" style="color: var(--red-primary); text-decoration: none;">Laporan</a>
            </li>
            <li class="breadcrumb-item active" style="color: var(--text-primary);">Detail</li>
          </ol>
        </div>
      </div>
    </div>
    
    <!-- Transaction Info Card -->
    <div class="modern-card">
      <div class="modern-card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h4 class="mb-1" style="color: var(--text-primary); font-weight: 600;">
              <i class="bi bi-info-circle me-2" style="color: var(--red-primary);"></i>
              Informasi Transaksi
            </h4>
            <p class="mb-0 text-muted">Detail informasi transaksi dan customer</p>
          </div>
          <div>
            <span class="transaction-badge">
              <i class="bi bi-hash"></i>
              {{ $kasir->id_transaksi }}
            </span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="info-table">
              <table class="table table-borderless mb-0">
                <tr>
                  <td>
                    <i class="bi bi-receipt me-2"></i>ID Transaksi
                  </td>
                  <td>
                    <span class="member-badge">#{{ $kasir->id_transaksi }}</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="bi bi-calendar-event me-2"></i>Tanggal
                  </td>
                  <td>{{ \Carbon\Carbon::parse($kasir->tanggal_transaksi)->format('d F Y H:i') }}</td>
                </tr>
                <tr>
                  <td>
                    <i class="bi bi-person-badge me-2"></i>Kasir
                  </td>
                  <td>{{ $kasir->user->nama_lengkap }}</td>
                </tr>
                <tr>
                  <td>
                    <i class="bi bi-person-fill me-2"></i>Member
                  </td>
                  <td>
                    @if($kasir->member)
                      <span class="member-badge">{{ $kasir->member->nama_member }}</span>
                    @else
                      <span class="text-muted">Non Member</span>
                    @endif
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <!-- Order Details Card -->
    <div class="modern-card">
      <div class="modern-card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h4 class="mb-1" style="color: var(--text-primary); font-weight: 600;">
              <i class="bi bi-cart-check me-2" style="color: var(--red-primary);"></i>
              Detail Pesanan
            </h4>
            <p class="mb-0 text-muted">Daftar produk yang dibeli dalam transaksi ini</p>
          </div>
        </div>

        <div class="table-responsive">
          <table class="modern-table table">
            <thead>
              <tr>
                <th style="width: 8%">
                  <i class="bi bi-hash me-2"></i>No
                </th>
                <th>
                  <i class="bi bi-cup-hot me-2"></i>Nama Produk
                </th>
                <th>
                  <i class="bi bi-cash me-2"></i>Harga
                </th>
                <th>
                  <i class="bi bi-basket me-2"></i>Jumlah
                </th>
                <th>
                  <i class="bi bi-calculator me-2"></i>Subtotal
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($kasir->details as $index => $detail)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $detail->produk->nama_produk }}</td>
                  <td>
                    <span class="price-display">Rp {{ number_format($detail->harga, 0, ',', '.') }}</span>
                  </td>
                  <td>
                    <span class="member-badge">{{ $detail->quantity }}x</span>
                  </td>
                  <td>
                    <span class="price-display">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr class="total-section">
                <td colspan="4" class="text-end" style="font-weight: 700;">
                  <i class="bi bi-calculator me-2"></i>Total Pembayaran
                </td>
                <td style="font-weight: 700;">
                  Rp {{ number_format($kasir->total_harga, 0, ',', '.') }}
                </td>
              </tr>
              @if($kasir->is_member)
                <tr class="points-section">
                  <td colspan="4" class="text-end" style="font-weight: 600;">
                    <i class="bi bi-star-fill me-2"></i>Poin yang Didapat
                  </td>
                  <td style="font-weight: 600;">
                    {{ $kasir->poin_didapat }} Poin
                  </td>
                </tr>
              @endif
            </tfoot>
          </table>
        </div>

        <div class="d-flex justify-content-start mt-4">
          <a href="{{ route('laporan') }}" class="btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Laporan
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->
@endsection