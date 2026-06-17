@extends('layouts.app')

@section('title', __('accounting::lang.trial_balance'))

@section('content')

    @include('accounting::layouts.nav')

    <section class="content">

        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('date_range_filter', __('report.date_range') . ':') !!}
                {!! Form::text('date_range_filter', null, [
                    'placeholder' => __('lang_v1.select_a_date_range'),
                    'class' => 'form-control',
                    'readonly',
                    'id' => 'date_range_filter',
                ]) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="trial-balance-wrapper">

                <div class="trial-balance-header">
                    <h2 class="tb-title">@lang('accounting::lang.trial_balance')</h2>
                    <p class="tb-company">{{ session('business.name') ?? '' }}</p>
                    <p class="tb-period">From {{ @format_date($start_date) }} To {{ @format_date($end_date) }}</p>
                </div>

                <div class="trial-balance-body">
                    <table class="tb-table">
                        <thead>
                            <tr class="tb-group-header">
                                <th class="account-col"></th>
                                <th colspan="2"
                                    class="group-opening">Opening Balance</th>
                                <th colspan="2"
                                    class="group-movement">Movement</th>
                                <th colspan="2"
                                    class="group-net">Net Movement</th>
                                <th colspan="2"
                                    class="group-closing">Closing Balance</th>
                            </tr>
                            <tr class="tb-sub-header">
                                <th class="account-col">Account</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Credit</th>
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
                                    <td class="account-col">{{ $account->name }}</td>
                                    <td>
                                        @if ($account->debit_balance != 0)
                                            @format_currency($account->debit_balance)
                                        @else
                                            @format_currency(0)
                                        @endif
                                    </td>
                                    <td>
                                        @if ($account->credit_balance != 0)
                                            @format_currency($account->credit_balance)
                                        @else
                                            @format_currency(0)
                                        @endif
                                    </td>
                                    <td>@format_currency(0)</td>
                                    <td>@format_currency(0)</td>
                                    <td>@format_currency(0)</td>
                                    <td>@format_currency(0)</td>
                                    <td>
                                        @if ($account->debit_balance != 0)
                                            @format_currency($account->debit_balance)
                                        @else
                                            @format_currency(0)
                                        @endif
                                    </td>
                                    <td>
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
                                <th class="account-col">Total</th>
                                <th class="total_debit">@format_currency($total_debit)</th>
                                <th class="total_credit">@format_currency($total_credit)</th>
                                <th>@format_currency(0)</th>
                                <th>@format_currency(0)</th>
                                <th>@format_currency(0)</th>
                                <th>@format_currency(0)</th>
                                <th>@format_currency($total_debit)</th>
                                <th>@format_currency($total_credit)</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </section>

    <style>
        .trial-balance-wrapper {
            background: #fff;
            padding: 30px 20px;
            font-family: Arial, sans-serif;
            color: #222;
        }

        .trial-balance-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .tb-title {
            font-size: 26px;
            font-weight: 600;
            margin: 0 0 12px 0;
            color: #222;
        }

        .tb-company {
            font-size: 14px;
            font-weight: 600;
            margin: 0 0 10px 0;
            color: #222;
        }

        .tb-period {
            font-size: 14px;
            margin: 0;
            color: #222;
        }

        .trial-balance-body {
            overflow-x: auto;
        }

        .tb-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .tb-table thead .tb-group-header th {
            padding: 10px 8px;
            text-align: center;
            font-weight: 600;
            color: #222;
            border: none;
            background: #fff;
        }

        .tb-table thead .tb-sub-header th {
            padding: 10px 8px;
            text-align: center;
            font-weight: 600;
            color: #222;
            border-bottom: 1px solid #d0d0d0;
            background: #fff;
        }

        .tb-table thead .tb-sub-header th.account-col {
            text-align: center;
        }

        .tb-table tbody td {
            padding: 12px 8px;
            text-align: center;
            border: none;
            color: #222;
            font-size: 13px;
        }

        .tb-table tbody td.account-col {
            text-align: left;
            padding-left: 30px;
        }

        .tb-table tfoot th {
            padding: 14px 8px;
            text-align: center;
            font-weight: 600;
            border-top: 1px solid #d0d0d0;
            background: #fff;
            color: #222;
        }

        .tb-table tfoot th.account-col {
            text-align: left;
            padding-left: 30px;
        }

        .tb-table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .account-col {
            min-width: 220px;
        }
    </style>


@stop

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function() {

            dateRangeSettings.startDate = moment('{{ $start_date }}');
            dateRangeSettings.endDate = moment('{{ $end_date }}');

            $('#date_range_filter').daterangepicker(
                dateRangeSettings,
                function(start, end) {
                    $('#date_range_filter').val(start.format(moment_date_format) + ' ~ ' + end.format(
                        moment_date_format));
                    apply_filter();
                }
            );
            $('#date_range_filter').on('cancel.daterangepicker', function(ev, picker) {
                $('#date_range_filter').val('');
                apply_filter();
            });

            function apply_filter() {
                var start = '';
                var end = '';

                if ($('#date_range_filter').val()) {
                    start = $('input#date_range_filter')
                        .data('daterangepicker')
                        .startDate.format('YYYY-MM-DD');
                    end = $('input#date_range_filter')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                }

                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('start_date', start);
                urlParams.set('end_date', end);
                window.location.search = urlParams;
            }
        });
    </script>

@stop
