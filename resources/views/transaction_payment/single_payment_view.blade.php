<div class="modal-dialog modal-lg"
     role="document">
    <div class="modal-content payment-voucher-modal">
        <div class="modal-header no-print">
            <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">
                @lang('lang_v1.view_payment')
                @if (!empty($single_payment_line->payment_ref_no))
                    ( @lang('purchase.ref_no'): {{ $single_payment_line->payment_ref_no }} )
                @endif
            </h4>
        </div>
        <div class="modal-body voucher-body">
            <style>
                .payment-voucher-modal .voucher-body {
                    background: #eef0fb;
                    padding: 0;
                    font-family: Arial, sans-serif;
                    color: #4a3f9e;
                    position: relative;
                    overflow: hidden;
                }

                .payment-voucher-modal .voucher-container {
                    padding: 25px 35px 80px 35px;
                    position: relative;
                    min-height: 600px;
                }

                .payment-voucher-modal .voucher-container::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: 0;
                    width: 280px;
                    height: 110px;
                    background: linear-gradient(135deg, transparent 30%, #5b4fc4 30%, #5b4fc4 60%, #8a7fd9 60%, #8a7fd9 75%, transparent 75%);
                    border-bottom-left-radius: 100% 80px;
                    opacity: 0.85;
                    z-index: 0;
                }

                .payment-voucher-modal .voucher-header {
                    display: flex;
                    align-items: flex-start;
                    justify-content: space-between;
                    margin-bottom: 30px;
                    position: relative;
                    z-index: 2;
                }

                .payment-voucher-modal .voucher-logo img {
                    max-height: 90px;
                }

                .payment-voucher-modal .voucher-title {
                    border: 2px solid #4a3f9e;
                    border-radius: 30px;
                    padding: 8px 30px;
                    text-align: center;
                    font-weight: bold;
                    color: #4a3f9e;
                    background: #fff;
                    margin-top: 20px;
                    font-size: 16px;
                    line-height: 1.3;
                }

                .payment-voucher-modal .voucher-row {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 18px;
                    flex-wrap: wrap;
                    position: relative;
                    z-index: 2;
                }

                .payment-voucher-modal .voucher-field {
                    display: flex;
                    align-items: center;
                    flex: 1;
                    margin: 0 5px;
                    font-size: 14px;
                    color: #4a3f9e;
                    font-weight: 600;
                }

                .payment-voucher-modal .voucher-field .label-en {
                    white-space: nowrap;
                }

                .payment-voucher-modal .voucher-field .label-ar {
                    white-space: nowrap;
                    direction: rtl;
                }

                .payment-voucher-modal .voucher-field .field-line {
                    flex: 1;
                    border-bottom: 2px dotted #4a3f9e;
                    margin: 0 8px;
                    min-height: 20px;
                    text-align: center;
                    padding: 0 5px;
                    color: #000;
                    font-weight: 500;
                }

                .payment-voucher-modal .voucher-amount-box {
                    border: 2px solid #4a3f9e;
                    padding: 6px 40px;
                    min-width: 180px;
                    text-align: center;
                    background: #fff;
                    font-weight: bold;
                    color: #000;
                }

                .payment-voucher-modal .amount-wrapper {
                    display: flex;
                    align-items: center;
                    gap: 8px;
                }

                .payment-voucher-modal .checkbox-row {
                    display: flex;
                    justify-content: space-between;
                    margin: 20px 0;
                    flex-wrap: wrap;
                    gap: 10px;
                    position: relative;
                    z-index: 2;
                }

                .payment-voucher-modal .check-item {
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    font-size: 13px;
                    font-weight: 600;
                    color: #4a3f9e;
                }

                .payment-voucher-modal .check-box {
                    width: 16px;
                    height: 16px;
                    border: 1.5px solid #4a3f9e;
                    display: inline-block;
                    background: #fff;
                    text-align: center;
                    line-height: 14px;
                    font-weight: bold;
                }

                .payment-voucher-modal .check-box.checked::after {
                    content: '✓';
                    color: #4a3f9e;
                    font-size: 14px;
                }

                .payment-voucher-modal .signature-row {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 35px;
                    gap: 20px;
                    position: relative;
                    z-index: 2;
                }

                .payment-voucher-modal .signature-field {
                    flex: 1;
                    display: flex;
                    align-items: center;
                    font-size: 13px;
                    font-weight: 600;
                    color: #4a3f9e;
                }

                .payment-voucher-modal .signature-field .field-line {
                    flex: 1;
                    border-bottom: 2px dotted #4a3f9e;
                    margin: 0 6px;
                    min-height: 18px;
                }

                .payment-voucher-modal .voucher-footer {
                    background: #4a3f9e;
                    color: #fff;
                    padding: 12px 30px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    font-size: 12px;
                    flex-wrap: wrap;
                    gap: 10px;
                }

                .payment-voucher-modal .voucher-footer .footer-item {
                    display: flex;
                    align-items: center;
                    gap: 6px;
                }

                .payment-voucher-modal .voucher-footer i {
                    background: #fff;
                    color: #4a3f9e;
                    padding: 4px;
                    border-radius: 50%;
                    width: 22px;
                    height: 22px;
                    text-align: center;
                    line-height: 14px;
                }

                @media print {
                    .payment-voucher-modal .voucher-body {
                        background: #eef0fb !important;
                        -webkit-print-color-adjust: exact;
                        print-color-adjust: exact;
                    }

                    .payment-voucher-modal .voucher-footer {
                        background: #4a3f9e !important;
                        color: #fff !important;
                        -webkit-print-color-adjust: exact;
                        print-color-adjust: exact;
                    }
                }
            </style>

            @php
                $method = $single_payment_line->method ?? '';
                $amount = $single_payment_line->amount ?? 0;
                $paid_on = !empty($single_payment_line->paid_on)
                    ? \Carbon\Carbon::parse($single_payment_line->paid_on)
                    : null;
                $pay_to = '';
                if (!empty($transaction)) {
                    if (
                        in_array($transaction->type, ['purchase', 'purchase_return']) &&
                        !empty($transaction->contact)
                    ) {
                        $pay_to = $transaction->contact->supplier_business_name ?? $transaction->contact->name;
                    } elseif (!empty($transaction->contact)) {
                        $pay_to = $transaction->contact->name;
                    } elseif (!empty($transaction->transaction_for)) {
                        $pay_to = $transaction->transaction_for->user_full_name ?? '';
                    }
                }
                $note = $single_payment_line->note ?? '';
                $ref_no = $single_payment_line->payment_ref_no ?? '';
                $bank_name = '';
                $cheque_no = '';
                if ($method == 'cheque') {
                    $cheque_no = $single_payment_line->cheque_number ?? '';
                }
                if ($method == 'bank_transfer') {
                    $bank_name = $single_payment_line->bank_account_number ?? '';
                }
            @endphp

            <div class="voucher-container">
                <div class="voucher-header">
                    <div class="voucher-logo">
                        <img src="{{ asset('images/blesslife-logo.png') }}"
                             alt="BlessLife">
                    </div>
                    <div class="voucher-title">
                        <div>سند صرف</div>
                        <div>Payment Voucher</div>
                    </div>
                    <div style="width: 90px;"></div>
                </div>

                <div class="voucher-row">
                    <div class="voucher-field">
                        <span class="label-en">Date:</span>
                        <span class="field-line">{{ $paid_on ? $paid_on->format('d / m / Y') : '' }}</span>
                        <span class="label-ar">التاريخ</span>
                    </div>
                    <div class="voucher-field"
                         style="flex: 0 0 auto;">
                        <span>No.</span>
                        <span class="field-line"
                              style="min-width: 140px;">{{ $ref_no }}</span>
                    </div>
                    <div class="amount-wrapper">
                        <span style="font-weight:600;">ريال<br>S.R</span>
                        <div class="voucher-amount-box">@format_currency($amount)</div>
                    </div>
                </div>

                <div class="voucher-row">
                    <div class="voucher-field">
                        <span class="label-en">Pay to M/S</span>
                        <span class="field-line">{{ $pay_to }}</span>
                        <span class="label-ar">أصرفوا إلى السيد / السادة</span>
                    </div>
                </div>

                <div class="voucher-row">
                    <div class="voucher-field">
                        <span class="label-en">The Sum of</span>
                        <span class="field-line">@format_currency($amount)</span>
                        <span class="label-ar">مبلغ وقدره</span>
                    </div>
                </div>

                <div class="voucher-row">
                    <div class="voucher-field">
                        <span class="label-en">For:</span>
                        <span class="field-line">{{ $note }}</span>
                        <span class="label-ar">عبارة عن</span>
                    </div>
                </div>

                <div class="checkbox-row">
                    <div class="check-item">
                        <span class="check-box {{ $method == 'cash' ? 'checked' : '' }}"></span>
                        <span>Cash</span>
                        <span class="label-ar">نقدا</span>
                    </div>
                    <div class="check-item">
                        <span class="check-box {{ $method == 'cheque' ? 'checked' : '' }}"></span>
                        <span>Cheque</span>
                        <span class="label-ar">بشيك</span>
                        <span style="margin-left:10px;">No.</span>
                        <span
                              style="border-bottom: 2px dotted #4a3f9e; min-width: 100px; display:inline-block; text-align:center;">{{ $cheque_no }}</span>
                        <span class="label-ar">رقم</span>
                    </div>
                    <div class="check-item"
                         style="flex:1; justify-content:flex-end;">
                        <span>Bank.</span>
                        <span
                              style="border-bottom: 2px dotted #4a3f9e; flex:1; min-width: 120px; display:inline-block; margin: 0 6px;">{{ $bank_name }}</span>
                        <span class="label-ar">البنك</span>
                    </div>
                </div>

                <div class="checkbox-row">
                    <div class="check-item">
                        <span class="check-box"></span>
                        <span>Part Payment</span>
                        <span class="label-ar">جزء من الحساب</span>
                    </div>
                    <div class="check-item">
                        <span class="check-box checked"></span>
                        <span>Full Payment</span>
                        <span class="label-ar">سداد كامل</span>
                    </div>
                    <div class="check-item">
                        <span class="check-box"></span>
                        <span>Last Payment</span>
                        <span class="label-ar">الدفعة الأخيرة</span>
                    </div>
                    <div class="check-item">
                        <span class="check-box"></span>
                        <span>Payment on Account</span>
                        <span class="label-ar">دفعة تحت الحساب</span>
                    </div>
                    <div class="check-item">
                        <span class="check-box"></span>
                        <span>Commission</span>
                        <span class="label-ar">عمولات</span>
                    </div>
                </div>

                <div class="signature-row">
                    <div class="signature-field">
                        <span>Cashier</span>
                        <span class="field-line"></span>
                        <span class="label-ar">أمين الصندوق</span>
                    </div>
                    <div class="signature-field">
                        <span>Signature</span>
                        <span class="field-line"></span>
                        <span class="label-ar">التوقيع</span>
                    </div>
                    <div class="signature-field">
                        <span>Received By</span>
                        <span class="field-line"></span>
                        <span class="label-ar">المستلم</span>
                    </div>
                </div>
            </div>

            <div class="voucher-footer">
                <div class="footer-item">
                    <i class="fa fa-envelope"></i>
                    <span>info@blesslife.com.sa</span>
                </div>
                <div class="footer-item">
                    <span>Alshafi Complex, 5th Floor, Office No. 501, Al Olaya, 12611 Riyadh, K.S.A</span>
                </div>
                <div class="footer-item">
                    <i class="fa fa-phone"></i>
                    <span>0112242650</span>
                </div>
            </div>

            @if (!empty($single_payment_line->document_path))
                <div class="text-center no-print"
                     style="padding: 10px;">
                    <a href="{{ $single_payment_line->document_path }}"
                       class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline tw-dw-btn-accent"
                       download="{{ $single_payment_line->document_name }}">
                        <i class="fa fa-download"></i> {{ __('purchase.download_document') }}
                    </a>
                </div>
            @endif
        </div>
        <div class="modal-footer no-print">
            <button type="button"
                    class="tw-dw-btn tw-dw-btn-primary tw-text-white"
                    aria-label="Print"
                    onclick="$(this).closest('div.modal').printThis();">
                <i class="fa fa-print"></i> @lang('messages.print')
            </button>
            <button type="button"
                    class="tw-dw-btn tw-dw-btn-neutral tw-text-white"
                    data-dismiss="modal">@lang('messages.close')
            </button>
        </div>
    </div>
</div>
