<table>
    <thead>
        <th>No</th>
        <th>Tanggal</th>
        <th>Total Pendapatan</th>
    </thead>
    <tbody>
        @forelse ($reports as $report)
            <tr>    
                <td>{{ $loop->iteration }}</td>
                <td>{{ $report['date'] }}</td>
                <td>Rp{{ $report['revenue'] }}</td>
            </tr>
        @empty
            <tr>
                <td>No records found</td>
            </tr>
        @endforelse

        @if ($reports)
            <tr>
                <td>Total</td>
                <td></td>
                <td><strong>Rp{{ number_format($total_revenue,2) }}</strong></td>
            </tr>
        @endif
    </tbody>
</table>