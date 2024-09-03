<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<div style="text-align: center;margin-top:-40px">
    <img src="{{ public_path('mohlogo.png') }}" alt="Coat of Arms of Trinidad and Tobago" style="width: 300px; height: auto;">
</div>


<div style="width:80%;margin:auto">
    <h3 style="text-align: center;">VOSC Stock Report</h3>
    <p style="text-align: center">{{ \Carbon\Carbon::parse($startdate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($enddate)->format('d/m/Y') }}</p>
</div>

@forelse($transactions as $stockItemName => $groupedTransactions)
    <h3>{{ $stockItemName }}</h3> <!-- Display the Stock Item Name -->
    <table style="border: 1px solid black; border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 8px;">#</th>
                <th style="border: 1px solid black; padding: 8px;">Transaction Type</th>
                <th style="border: 1px solid black; padding: 8px;">Quantity</th>
                <th style="border: 1px solid black; padding: 8px;">Transaction Details</th>
                <th style="border: 1px solid black; padding: 8px;">Remainder</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groupedTransactions as $index => $transaction)
                <tr>
                    <td style="border: 1px solid black; padding: 8px;text-align:center">{{ $index + 1 }}</td> <!-- Display the index -->
                    <td style="border: 1px solid black; padding: 8px;text-align:center">{{ $transaction->TransactionType }}</td>
                    <td style="border: 1px solid black; padding: 8px;text-align:center">{{ $transaction->Quantity }}</td>
                    <td style="border: 1px solid black; padding: 8px;text-align:center">{{ $transaction->TransactionDetails }}</td>
                    <td style="border: 1px solid black; padding: 8px;text-align:center">{{ $transaction->Remainder }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@empty
    <p>No Transactions Found</p>
@endforelse

