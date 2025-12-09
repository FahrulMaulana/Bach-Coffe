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
        $products = produk::all();
        $member = member::where('id_user', $user->id_user)->first();
        $voucher = voucher::where("id_member", $member->id_member)->get();
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
