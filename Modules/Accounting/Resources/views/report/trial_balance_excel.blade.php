<table>
    <thead>
        <tr>
            <th>Account</th>
            <th>Opening Balance (Debit)</th>
            <th>Opening Balance (Credit)</th>
            <th>Movement (Debit)</th>
            <th>Movement (Credit)</th>
            <th>Net Movement (Debit)</th>
            <th>Net Movement (Credit)</th>
            <th>Closing Balance (Debit)</th>
            <th>Closing Balance (Credit)</th>
        </tr>
    </thead>

    @php
        $total_debit = 0;
        $total_credit = 0;
    @endphp

    <tbody>
        @foreach ($accounts as $account)
            @php
                $total_debit += $account->debit_balance;
                $total_credit += $account->credit_balance;
            @endphp
            <tr>
                <td>{{ $account->name }}</td>
                <td>{{ $account->debit_balance != 0 ? $account->debit_balance : 0 }}</td>
                <td>{{ $account->credit_balance != 0 ? $account->credit_balance : 0 }}</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>{{ $account->debit_balance != 0 ? $account->debit_balance : 0 }}</td>
                <td>{{ $account->credit_balance != 0 ? $account->credit_balance : 0 }}</td>
            </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <th>Total</th>
            <th>{{ $total_debit }}</th>
            <th>{{ $total_credit }}</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>{{ $total_debit }}</th>
            <th>{{ $total_credit }}</th>
        </tr>
    </tfoot>
</table>
