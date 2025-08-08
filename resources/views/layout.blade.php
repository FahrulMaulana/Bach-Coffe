@extends('layout.layout-admin')
@section('content')
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header" style="background: var(--cream-gradient); padding: 2rem 0; border-radius: 0 0 24px 24px; margin-bottom: 2rem; box-shadow: var(--modern-shadow);">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row align-items-center">
              <div class="col-sm-6">
                <h2 class="mb-0 fw-bold" style="color: var(--text-primary);">
                  <i class="bi bi-speedometer2 me-2" style="color: var(--red-primary);"></i>
                  Dashboard Bach Coffee
                </h2>
                <p class="mb-0 text-muted mt-1">Selamat datang di panel admin</p>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end mb-0" style="background: rgba(255,255,255,0.8); border-radius: 12px; padding: 8px 16px; backdrop-filter: blur(10px);">
                  <li class="breadcrumb-item">
                    <a href="#" style="color: var(--red-primary); text-decoration: none;">
                      <i class="bi bi-house-door me-1"></i>Home
                    </a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page" style="color: var(--text-primary);">Dashboard</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
              <!--begin::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Modern Stats Card 1-->
                <div class="card border-0 shadow-sm" style="background: var(--red-gradient); color: white; border-radius: var(--border-radius); overflow: hidden; transition: all 0.3s ease;">
                  <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <h3 class="fw-bold mb-1" style="font-size: 2.2rem;">150</h3>
                        <p class="mb-0 opacity-90">Pesanan Baru</p>
                        <small class="opacity-75">
                          <i class="bi bi-arrow-up me-1"></i>+12% dari bulan lalu
                        </small>
                      </div>
                      <div class="bg-opacity-20 rounded-circle p-3">
                        <i class="bi bi-cart-plus fs-3"></i>
                      </div>
                    </div>
                    <div class="position-absolute bottom-0 end-0" style="opacity: 0.1; font-size: 4rem; margin: -10px;">
                      <i class="bi bi-cart-plus"></i>
                    </div>
                  </div>
                  <div class="card-footer bg-opacity-10 border-0 p-3">
                    <a href="#" class="text-white text-decoration-none d-flex align-items-center justify-content-between">
                      <span>Lihat Detail</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
                <!--end::Modern Stats Card 1-->
              </div>
              <!--end::Col-->
              
              <div class="col-lg-3 col-6">
                <!--begin::Modern Stats Card 2-->
                <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%); color: white; border-radius: var(--border-radius); overflow: hidden; transition: all 0.3s ease;">
                  <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <h3 class="fw-bold mb-1" style="font-size: 2.2rem;">
                          53<sup class="fs-5">%</sup>
                        </h3>
                        <p class="mb-0 opacity-90">Tingkat Kepuasan</p>
                        <small class="opacity-75">
                          <i class="bi bi-arrow-up me-1"></i>+5% dari bulan lalu
                        </small>
                      </div>
                      <div class="bg-opacity-20 rounded-circle p-3">
                        <i class="bi bi-bar-chart fs-3"></i>
                      </div>
                    </div>
                    <div class="position-absolute bottom-0 end-0" style="opacity: 0.1; font-size: 4rem; margin: -10px;">
                      <i class="bi bi-bar-chart"></i>
                    </div>
                  </div>
                  <div class="card-footer bg-opacity-10 border-0 p-3">
                    <a href="#" class="text-white text-decoration-none d-flex align-items-center justify-content-between">
                      <span>Lihat Detail</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
                <!--end::Modern Stats Card 2-->
              </div>
              <!--end::Col-->
              
              <div class="col-lg-3 col-6">
                <!--begin::Modern Stats Card 3-->
                <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #b45309 100%); color: white; border-radius: var(--border-radius); overflow: hidden; transition: all 0.3s ease;">
                  <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <h3 class="fw-bold mb-1" style="font-size: 2.2rem;">44</h3>
                        <p class="mb-0 opacity-90">Member Baru</p>
                        <small class="opacity-75">
                          <i class="bi bi-arrow-up me-1"></i>+8% dari bulan lalu
                        </small>
                      </div>
                      <div class="bg-opacity-20 rounded-circle p-3">
                        <i class="bi bi-person-plus fs-3"></i>
                      </div>
                    </div>
                    <div class="position-absolute bottom-0 end-0" style="opacity: 0.1; font-size: 4rem; margin: -10px;">
                      <i class="bi bi-person-plus"></i>
                    </div>
                  </div>
                  <div class="card-footer bg-opacity-10 border-0 p-3">
                    <a href="#" class="text-white text-decoration-none d-flex align-items-center justify-content-between">
                      <span>Lihat Detail</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
                <!--end::Modern Stats Card 3-->
              </div>
              <!--end::Col-->
              
              <div class="col-lg-3 col-6">
                <!--begin::Modern Stats Card 4-->
                <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%); color: white; border-radius: var(--border-radius); overflow: hidden; transition: all 0.3s ease;">
                  <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <h3 class="fw-bold mb-1" style="font-size: 2.2rem;">65</h3>
                        <p class="mb-0 opacity-90">Pengunjung Unik</p>
                        <small class="opacity-75">
                          <i class="bi bi-arrow-up me-1"></i>+15% dari bulan lalu
                        </small>
                      </div>
                      <div class="bg-opacity-20 rounded-circle p-3">
                        <i class="bi bi-eye fs-3"></i>
                      </div>
                    </div>
                    <div class="position-absolute bottom-0 end-0" style="opacity: 0.1; font-size: 4rem; margin: -10px;">
                      <i class="bi bi-eye"></i>
                    </div>
                  </div>
                  <div class="card-footer bg-opacity-10 border-0 p-3">
                    <a href="#" class="text-white text-decoration-none d-flex align-items-center justify-content-between">
                      <span>Lihat Detail</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
                <!--end::Modern Stats Card 4-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-4 mt-4">
              <!-- Start col -->
              <div class="col-lg-8 col-md-12">
                <div class="card border-0 shadow-sm" style="border-radius: var(--border-radius); overflow: hidden;">
                  <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center" style="background: var(--cream-gradient); border: none; padding: 1.5rem;">
                    <div class="mb-2 mb-md-0">
                      <h4 class="card-title mb-1 fw-bold" style="color: var(--text-primary);">
                        <i class="bi bi-graph-up me-2" style="color: var(--red-primary);"></i>
                        Penjualan Harian
                      </h4>
                      <!-- <p class="mb-0 text-muted">Grafik penjualan 7 hari terakhir</p> -->
                    </div>
                    <!-- <div class="dropdown">
                      <button class="btn btn-sm" style="background: var(--red-light); color: var(--red-primary); border: none; border-radius: 8px;" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Hari Ini</a></li>
                        <li><a class="dropdown-item" href="#">Minggu Ini</a></li>
                        <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                      </ul>
                    </div> -->
                  </div>
                  <div class="card-body" style="padding: 2rem;">
                    <div id="revenue-chart" style="min-height: 300px;">
                      <!-- Chart placeholder -->
                      <div class="d-flex align-items-center justify-content-center h-100" style="min-height: 300px;">
                        <div class="text-center">
                          <i class="bi bi-graph-up-arrow fs-1 text-muted mb-3"></i>
                          <p class="text-muted">Grafik penjualan akan ditampilkan di sini</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.Start col -->
              
              <!-- Start col -->
              <div class="col-lg-4 col-md-12">
                <div class="card border-0 shadow-sm" style="background: var(--red-gradient); color: white; border-radius: var(--border-radius); overflow: hidden;">
                  <div class="card-header border-0 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center" style="background: rgba(255,255,255,0.1); padding: 1.5rem;">
                    <div class="mb-2 mb-sm-0 flex-grow-1">
                      <h5 class="card-title mb-1 fw-bold">Menu Terpopuler</h5>
                      <!-- <p class="mb-0 opacity-90 small">Produk terlaris bulan ini</p> -->
                    </div>
                    <button type="button" class="btn btn-sm text-white flex-shrink-0" style="background: rgba(255,255,255,0.2); border: none; border-radius: 8px;" data-bs-toggle="collapse" data-bs-target="#popularMenus">
                      <i class="bi bi-chevron-down"></i>
                    </button>
                  </div>
                  <div class="card-body collapse show" id="popularMenus" style="padding: 1.5rem;">
                    <!-- Popular items list -->
                    <div class="d-flex flex-column gap-3">
                      <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background: rgba(255,255,255,0.1);">
                        <div class="d-flex align-items-center">
                          <div class="bg-opacity-20 rounded-circle p-2 me-3">
                            <i class="bi bi-cup-hot"></i>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-semibold">Cappuccino</h6>
                            <small class="opacity-75">127 terjual</small>
                          </div>
                        </div>
                        <span class="badge text-dark">1</span>
                      </div>
                      
                      <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background: rgba(255,255,255,0.1);">
                        <div class="d-flex align-items-center">
                          <div class="bg-opacity-20 rounded-circle p-2 me-3">
                            <i class="bi bi-cup-straw"></i>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-semibold">Latte</h6>
                            <small class="opacity-75">98 terjual</small>
                          </div>
                        </div>
                        <span class="badge text-dark">2</span>
                      </div>
                      
                      <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background: rgba(255,255,255,0.1);">
                        <div class="d-flex align-items-center">
                          <div class="bg-opacity-20 rounded-circle p-2 me-3">
                            <i class="bi bi-egg-fried"></i>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-semibold">Croissant</h6>
                            <small class="opacity-75">76 terjual</small>
                          </div>
                        </div>
                        <span class="badge text-dark">3</span>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-0" style="background: rgba(255,255,255,0.1); padding: 1.5rem;">
                    <!--begin::Row-->
                    <div class="row text-center">
                      <div class="col-4">
                        <div class="text-white">
                          <div class="fw-bold fs-5">301</div>
                          <small class="opacity-75">Total Item</small>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="text-white">
                          <div class="fw-bold fs-5">89</div>
                          <small class="opacity-75">Stok Habis</small>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="text-white">
                          <div class="fw-bold fs-5">15</div>
                          <small class="opacity-75">Kategori</small>
                        </div>
                      </div>
                    </div>
                    <!--end::Row-->
                  </div>
                </div>
              </div>
              <!-- /.Start col -->
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
@endsection

@push('styles')
<style>
/* Fix for text wrapping in dashboard cards */
@media (max-width: 1199.98px) {
  .card-header {
    padding: 1rem !important;
  }
  
  .card-header .card-title {
    font-size: 1.1rem !important;
  }
  
  .card-header p {
    font-size: 0.85rem !important;
    line-height: 1.3 !important;
  }
}

@media (max-width: 991.98px) {
  .card-header {
    padding: 0.75rem !important;
  }
  
  .card-header .card-title {
    font-size: 1rem !important;
  }
  
  .card-header p {
    font-size: 0.8rem !important;
  }
}

@media (max-width: 575.98px) {
  .card-header {
    text-align: center !important;
  }
  
  .card-header .btn {
    margin-top: 0.5rem !important;
  }
}

/* Prevent text overflow */
.card-header div {
  min-width: 0;
  word-wrap: break-word;
}

.card-header .flex-grow-1 {
  overflow: hidden;
}

.card-header .flex-grow-1 p {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

@media (min-width: 576px) {
  .card-header .flex-grow-1 p {
    white-space: normal;
    overflow: visible;
    text-overflow: unset;
  }
}
</style>
@endpush





