<div style="text-align: center; margin-bottom: 40px;">
    <h2 style="font-size: 26px; font-weight: 600; margin: 0 0 12px 0; color: #222;">@lang('accounting::lang.trial_balance')</h2>
    <p style="font-size: 14px; font-weight: 600; margin: 0 0 10px 0; color: #222;">{{ session('business.name') ?? '' }}</p>
    <p style="font-size: 14px; margin: 0; color: #222;">From {{ @format_date($start_date) }} To {{ @format_date($end_date) }}</p>
</div>

<table style="width: 100%; border-collapse: collapse; font-size: 13px;">
    <thead>
        <tr>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;"></th>
            <th colspan="2" style="padding: 10px 8px; text-align: center; font-weight: 600; border: none;">Opening Balance</th>
            <th colspan="2" style="padding: 10px 8px; text-align: center; font-weight: 600; border: none;">Movement</th>
            <th colspan="2" style="padding: 10px 8px; text-align: center; font-weight: 600; border: none;">Net Movement</th>
            <th colspan="2" style="padding: 10px 8px; text-align: center; font-weight: 600; border: none;">Closing Balance</th>
        </tr>
        <tr>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;">Account</th>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;">Debit</th>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;">Credit</th>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;">Debit</th>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;">Credit</th>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;">Debit</th>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;">Credit</th>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;">Debit</th>
            <th style="padding: 10px 8px; text-align: center; font-weight: 600; border-bottom: 1px solid #d0d0d0;">Credit</th>
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
                <td style="padding: 12px 8px; text-align: left; border: none; padding-left: 30px;">{{ $account->name }}</td>
                <td style="padding: 12px 8px; text-align: center; border: none;">
                    @if ($account->debit_balance != 0)
                        @format_currency($account->debit_balance)
                    @else
                        @format_currency(0)
                    @endif
                </td>
                <td style="padding: 12px 8px; text-align: center; border: none;">
                    @if ($account->credit_balance != 0)
                        @format_currency($account->credit_balance)
                    @else
                        @format_currency(0)
                    @endif
                </td>
                <td style="padding: 12px 8px; text-align: center; border: none;">@format_currency(0)</td>
                <td style="padding: 12px 8px; text-align: center; border: none;">@format_currency(0)</td>
                <td style="padding: 12px 8px; text-align: center; border: none;">@format_currency(0)</td>
                <td style="padding: 12px 8px; text-align: center; border: none;">@format_currency(0)</td>
                <td style="padding: 12px 8px; text-align: center; border: none;">
                    @if ($account->debit_balance != 0)
                        @format_currency($account->debit_balance)
                    @else
                        @format_currency(0)
                    @endif
                </td>
                <td style="padding: 12px 8px; text-align: center; border: none;">
                    @if ($account->credit_balance != 0)
                        @format_currency($account->credit_balance)
                    @else
                        @format_currency(0)
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <th style="padding: 14px 8px; text-align: left; font-weight: 600; border-top: 1px solid #d0d0d0; padding-left: 30px;">Total</th>
            <th style="padding: 14px 8px; text-align: center; font-weight: 600; border-top: 1px solid #d0d0d0;">@format_currency($total_debit)</th>
            <th style="padding: 14px 8px; text-align: center; font-weight: 600; border-top: 1px solid #d0d0d0;">@format_currency($total_credit)</th>
            <th style="padding: 14px 8px; text-align: center; font-weight: 600; border-top: 1px solid #d0d0d0;">@format_currency(0)</th>
            <th style="padding: 14px 8px; text-align: center; font-weight: 600; border-top: 1px solid #d0d0d0;">@format_currency(0)</th>
            <th style="padding: 14px 8px; text-align: center; font-weight: 600; border-top: 1px solid #d0d0d0;">@format_currency(0)</th>
            <th style="padding: 14px 8px; text-align: center; font-weight: 600; border-top: 1px solid #d0d0d0;">@format_currency(0)</th>
            <th style="padding: 14px 8px; text-align: center; font-weight: 600; border-top: 1px solid #d0d0d0;">@format_currency($total_debit)</th>
            <th style="padding: 14px 8px; text-align: center; font-weight: 600; border-top: 1px solid #d0d0d0;">@format_currency($total_credit)</th>
        </tr>
    </tfoot>
</table>
