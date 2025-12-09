<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\member;
use App\Models\produk;
use App\Models\voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get all products - kolom yang ada: id_produk, nama_produk, harga_produk, foto, promo
        $products = produk::orderBy('nama_produk')->get();
            
        // Get member - kolom yang ada: id_member, id_user, nama_member, email, nomor_hp, total_poin
        $member = member::where('id_user', $user->id_user)->first();
        
        // Check if member exists
        if (!$member) {
            return redirect()->back()->with('error', 'Data member tidak ditemukan');
        }
            
        // Get vouchers - kolom yang ada: id_voucher, id_member, kode_voucher, poin_terpakai, status_voucher, tanggal_klaim
        $voucher = voucher::where("id_member", $member->id_member)
            ->orderBy('created_at', 'desc')
            ->limit(50)
            ->get();
            
        return view('customer.dashboard', compact('user', 'products', 'member', 'voucher'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $member = member::where('id_user', $user->id_user)->first();


        if ($member->total_poin == null) {
            $member->total_poin = 0;
        }

        if ($request->harga_produk > $member->total_poin) {
            return redirect()->route('customer.dashboard')->with('error', 'Poin Anda Tidak Cukup');
        }

        $data = new voucher();
        $data->id_member = $member->id_member;
        $data->kode_voucher = 'VCR' . rand(100, 999);
        $data->poin_terpakai = $request->harga_produk;
        $data->status_voucher = 'Pending';
        $data->tanggal_klaim = now();
        $data->save();

        $member->total_poin = $member->total_poin - $request->harga_produk;
        $member->update();


        return redirect()->route('customer.dashboard')->with('success', 'Poin Berhasil Di Tukar');
    }
}
