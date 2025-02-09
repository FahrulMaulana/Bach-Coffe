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
</style>

<!--begin::App Content Header-->

<!--end::App Content Header-->

<!--begin::App Content-->
<div class="app-content">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div>
      <div class="card-body mt-3"> 
      <div class="row">
      <div class="col-sm-6">
      <h3>Member</h3>
      </div>
      </div>
      </div>
      <div class="card-body mt-3">
        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-primary mb-4 text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah Kasir
          </button>
        </div>

      <!-- Modal -->
      <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header" style="padding: 15px; display: flex; justify-content: center; align-items: center;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-weight: bold; text-align: center; margin: 0;">Tambah Kasir</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white; opacity: 1; border-radius: 50%;"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body" style="padding: 20px;">
        <!-- Form Tambah Kasir -->
        <form id="tambahKasirForm">
          <div class="mb-3">
            <label for="username" class="form-label" style="font-weight: bold;">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
          </div>
          <div class="mb-3">
            <label for="namaKasir" class="form-label" style="font-weight: bold;">Nama Kasir</label>
            <input type="text" class="form-control" id="namaKasir" name="namaKasir" placeholder="Masukkan Nama Kasir" required style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label" style="font-weight: bold;">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer" style=" display: flex; justify-content: flex-end; ">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 14px; padding: 8px 15px; border-radius: 8px;">Close</button>
        <button type="submit" class="btn btn-success" form="tambahKasirForm" style="font-size: 14px; padding: 8px 15px; border-radius: 8px;">Simpan</button>
      </div>
    </div>
  </div>
</div>

        <table class="table table-bordered">
          <thead class="table-secondary">
            <tr>
              <th style="width: 10px">ID</th>
              <th>Username</th>
              <th>Nama Kasir</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr class="align-middle">
              <td>1.</td>
              <td>Cakil123</td>
              <td>Muhammad Cukal</td>
              <td>
                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                <button type="button" class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
            <tr class="align-middle">
              <td>2.</td>
              <td>GamingBliz</td>
              <td>Sukarno</td>
              <td>
                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                <button type="button" class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->
@endsection
