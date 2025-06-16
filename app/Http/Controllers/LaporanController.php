<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Http\Controllers\Controller;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{

    public function index(Request $request)
    {

        $query = transaksi::with(['user', 'member', 'details']);

        // Filter by day
        if ($request->has('year') && $request->year) {
            $query->whereYear('tanggal_transaksi', $request->year);
        }

        // Filter by month
        if ($request->has('month') && $request->month) {
            $query->whereMonth('tanggal_transaksi', $request->month);
        }

        // Filter by day
        if ($request->has('day') && $request->day) {
            $query->whereDay('tanggal_transaksi', $request->day);
        }
        // dd($request);

        $kasir = $query->orderBy('tanggal_transaksi', 'desc')->paginate(5);

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

    public function show($id_transaksi)
    {
        $kasir = transaksi::with(['user', 'member', 'details.produk'])->find($id_transaksi);
        return view('admin.laporanDetail', compact('kasir'));
    }

    public function export(Request $request)
    {
        $query = Transaksi::with(['user', 'member', 'details']);

        // Filter by year
        if ($request->has('year') && $request->year) {
            $query->whereYear('tanggal_transaksi', $request->year);
        }

        // Filter by month
        if ($request->has('month') && $request->month) {
            $query->whereMonth('tanggal_transaksi', $request->month);
        }

        // Filter by day
        if ($request->has('day') && $request->day) {
            $query->whereDay('tanggal_transaksi', $request->day);
        }

        return Excel::download(new TransactionsExport($query), 'transactions.xlsx');
    }
}
