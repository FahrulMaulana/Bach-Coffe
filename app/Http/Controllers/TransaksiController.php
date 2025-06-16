<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\member;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\transaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $members = member::all();
        $products = produk::all();
        return view("admin.transaksi", compact("members", "products"));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validate request
            $request->validate([
                'products.*.id' => 'required|exists:tbl_produk,id_produk',
                'products.*.quantity' => 'required|integer|min:1',
                'id_member' => 'nullable|exists:tbl_member,id_member'
            ], [
                'products.*.id.required' => 'Produk harus dipilih.',
                'products.*.id.exists' => 'Produk yang dipilih tidak valid.',
                'products.*.quantity.required' => 'Jumlah produk harus diisi.',
                'products.*.quantity.integer' => 'Jumlah produk harus berupa angka.',
                'products.*.quantity.min' => 'Jumlah produk minimal 1.',
                'id_member.exists' => 'Member yang dipilih tidak valid.'
            ]);
            // Create transaction header
            $transaction = transaksi::create([
                'id_user' => Auth::user()->id_user,
                'id_member' => $request->id_member,
                'tanggal_transaksi' => now(),
                'total_harga' => $request->total_harga,
                'poin_didapat' => $request->poin,
                'is_member' => $request->id_member ? true : false,
            ]);

            $totalHarga = 0;

            // Create transaction details
            foreach ($request->products as $product) {
                $productData = produk::find($product['id']);
                $subtotal = $productData->harga_produk * $product['quantity'];

                transaksiDetail::create([
                    'id_transaksi' => $transaction->id_transaksi,
                    'id_produk' => $product['id'],
                    'quantity' => $product['quantity'],
                    'harga' => $productData->harga_produk,
                    'subtotal' => $subtotal
                ]);

                $totalHarga += $subtotal;
            }

            // Update transaction total
            $transaction->update([
                'total_harga' => $totalHarga
            ]);

            // Update member points if member exists
            if ($request->id_member) {
                $member = Member::find($request->id_member);
                $pointsEarned = floor($totalHarga * 0.01); // 1 point per 100
                $member->update([
                    'total_poin' => $member->total_poin + $pointsEarned - $request->poinuse
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Transaksi berhasil');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
}
