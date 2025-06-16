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
    <div class="container">
        <!-- Update alert markup -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Tambah Transaksi</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <form id="transactionForm" action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <!-- Member Selection -->
                    <div class="mb-3">
                        <label class="mb-2">Member</label>
                        <select name="id_member" class="form-select">
                            <option value="">Non Member</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id_member }}">{{ $member->nama_member }} - {{  $member->total_poin }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Products Section -->
                    <div id="product-container">
                        <div class="product-row row mb-3 align-items-center">
                            <div class="col-md-3">
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
                                <input type="number" name="products[0][quantity]" class="form-control quantity" min="1"
                                    required placeholder="Jumlah">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control harga" readonly data-value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control subtotal" readonly data-value="0">
                            </div>
                            <div class="col-md-3 d-flex gap-2">
                                <button type="button" class="btn btn-danger btn-sm remove-product">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm btn-add-product">
                                    <i class="bi bi-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Totals Section -->
                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <table class="table">
                                <tr>
                                    <td>Total Harga</td>
                                    <td>
                                        <input type="hidden" name="total_harga" id="total_harga_raw">
                                        <input type="text" id="total_harga_display" class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gunakan Poin</td>
                                    <td>
                                        <input type="number" name="poinuse" id="poinuse" class="form-control" min="0"
                                            value="0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Setelah Poin</td>
                                    <td>
                                        <input type="text" id="final_total_display" class="form-control" readonly>
                                        <input type="hidden" name="final_total" id="final_total_raw">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Poin Di Dapat</td>
                                    <td>
                                        <input type="number" name="poin" id="poin" class="form-control" readonly>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                template.querySelectorAll('input').forEach(input => input.value = '');
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
                    alert('Minimal harus ada 1 produk!');
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
                const availablePoints = Number(selectedOption.textContent.split('-')[1].trim());
                if (this.value > availablePoints) {
                    this.value = availablePoints;
                }
            } else {
                this.value = 0;
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

        document.getElementById('transactionForm').onsubmit = function (e) {
            // Ensure raw values are submitted
            const totalHarga = document.getElementById('total_harga_raw').value;
            this.total_harga.value = totalHarga;
        }

        // Alert auto-close
        document.addEventListener('DOMContentLoaded', function () {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                // Create Bootstrap alert instance
                const bsAlert = new bootstrap.Alert(alert);

                // Set timeout to close after 3 seconds
                setTimeout(() => {
                    bsAlert.close();
                }, 3000);
            });
        });

    </script>
@endsection