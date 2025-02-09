@extends('layout.layout-admin')
@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <h3><b>Detail Transaksi</b></h3>
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <td width="150">ID Transaksi</td>
                            <td>: {{ $kasir->id_transaksi }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: {{ $kasir->tanggal_transaksi }}</td>
                        </tr>
                        <tr>
                            <td>Kasir</td>
                            <td>: {{ $kasir->user->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td>Member</td>
                            <td>: {{ $kasir->member ? $kasir->member->nama_member : 'Non Member' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kasir->details as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail->produk->nama_produk }}</td>
                            <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="fw-bold">
                            <td colspan="4" class="text-end">Total</td>
                            <td>Rp {{ number_format($kasir->total_harga, 0, ',', '.') }}</td>
                        </tr>
                        @if($kasir->is_member)
                        <tr>
                            <td colspan="4" class="text-end">Poin yang didapat</td>
                            <td>{{ $kasir->poin_didapat }} Poin</td>
                        </tr>
                        @endif
                    </tfoot>
                </table>
            </div>

            <div class="mt-3">
                <a href="{{ route('laporan') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection