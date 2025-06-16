<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $voucher = voucher::orderBy("status_voucher", "asc")->paginate(5);
        $voucher->load('member');
        return view("admin.voucher", compact("voucher"));
    }

    public function store(Request $request)
    {
        $voucher = voucher::where("id_voucher", $request->id_voucher)->first();
        $voucher->status_voucher = 'Terverifikasi';
        $voucher->update();
        return redirect()->route('voucher')->with('success', 'Penukaran Voucher Berhasil');
    }

    public function decline(Request $request)
    {
        $voucher = voucher::where("id_voucher", $request->id_voucher)->first();
        $voucher->status_voucher = 'Ditolak';
        $voucher->update();

        $member = member::where("id_member", $voucher->id_member)->first();
        $member->total_poin = $member->total_poin + $voucher->poin_terpakai;
        $member->update();

        return redirect()->route('voucher')->with('success', 'Penukarann Voucher Ditolak');
    }
}
