<?php
namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionsExport implements FromView
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function view(): View
    {
        return view('customer.export', [
            'transactions' => $this->query->get()
        ]);
    }
}
