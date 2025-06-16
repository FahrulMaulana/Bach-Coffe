<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Kasir</th>
            <th>Member</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Poin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id_transaksi }}</td>
                <td>{{ $transaction->user->nama_lengkap }}</td>
                <td>{{ $transaction->member->nama_member ?? 'Non Member' }}</td>
                <td>{{ Carbon\Carbon::parse($transaction->tanggal_transaksi)->format('d F Y') }}</td>
                <td>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                <td>{{ $transaction->poin_didapat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>