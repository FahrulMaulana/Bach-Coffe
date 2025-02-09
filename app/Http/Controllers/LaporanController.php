<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // public function index()
    // {
    //     $kasir = transaksi::with(['user','member','details'])->paginate(5);
    //     // dd($kasir);
    //     return view('admin.laporan', compact('kasir'));
    // }

    public function index(Request $request)
    {
        $query = transaksi::with(['user', 'member', 'details']);

        // Filter by day
        if ($request->has('day')) {
            $query->whereDay('tanggal_transaksi', $request->day);
        }

        // Filter by month
        if ($request->has('month')) {
            $query->whereMonth('tanggal_transaksi', $request->month);
        }

        // Filter by year
        if ($request->has('year')) {
            $query->whereYear('tanggal_transaksi', $request->year);
        }

        $kasir = $query->paginate(5);
        
        // Get unique years from transactions for filter options
        $years = transaksi::selectRaw('YEAR(tanggal_transaksi) as year')
                         ->distinct()
                         ->pluck('year');

        return view('admin.laporan', compact('kasir', 'years'))
            ->with([
                'selectedDay' => $request->day,
                'selectedMonth' => $request->month,
                'selectedYear' => $request->year
            ]);
    }

    // public function show($id_transaksi)
    // {
    //     $kasir = transaksi::with(['user', 'member', 'details.produk'])->find($id_transaksi);
    //     return view('admin.laporanDetail', compact('kasir'));
    // }

    public function show($id_transaksi)
    {
        $kasir = transaksi::with(['user', 'member', 'details.produk'])->find($id_transaksi);
        return view('admin.laporanDetail', compact('kasir'));
    }
}
