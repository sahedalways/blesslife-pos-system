<?php

namespace Modules\Accounting\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TrialBalanceExport implements FromView
{
    protected $accounts;

    protected $start_date;

    protected $end_date;

    public function __construct($accounts, $start_date, $end_date)
    {
        $this->accounts = $accounts;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function view(): View
    {
        return view('accounting::report.trial_balance_excel')
            ->with([
                'accounts' => $this->accounts,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ]);
    }
}
