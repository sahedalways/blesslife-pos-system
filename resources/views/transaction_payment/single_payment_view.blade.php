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
                    <div class="voucher-logo"
                         style="
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 8px 15px;
     ">

                        <div
                             style="
        font-size: 22px;
        font-weight: 800;
        letter-spacing: 1px;
        line-height: 1;
        text-transform: uppercase;
        color: #1f2937;
        font-family: Arial, sans-serif;
    ">
                            {{ Session::get('business.name') }}
                        </div>

                        <div
                             style="
        width: 80px;
        height: 2px;
        background: #1f2937;
        margin: 6px 0;
        border-radius: 10px;
    ">
                        </div>

                        <div
                             style="
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .5px;
        color: #555;
        font-family: Arial, sans-serif;
    ">
                            CR NO: {{ auth()->user()->cr_no ?? 'N/A' }}
                        </div>

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
                    <span>{{ auth()->user()->email ?? 'N/A' }}</span>
                </div>

                <div class="footer-item">
                    <span>{{ auth()->user()->current_address ?? (auth()->user()->permanent_address ?? 'N/A') }}</span>
                </div>

                <div class="footer-item">
                    <i class="fa fa-phone"></i>
                    <span>{{ auth()->user()->contact_number ?? 'N/A' }}</span>
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
                    onclick="printPaymentVoucher(this);">
                <i class="fa fa-print"></i> @lang('messages.print')
            </button>
            <button type="button"
                    class="tw-dw-btn tw-dw-btn-neutral tw-text-white"
                    data-dismiss="modal">@lang('messages.close')
            </button>
        </div>
    </div>
</div>


<script>
    function printPaymentVoucher(btn) {
        var $modal = $(btn).closest('.modal-content');

        // Get only the voucher content (exclude header, footer buttons)
        var voucherHTML = $modal.find('.voucher-body').html();

        // Collect ALL stylesheets from current page
        var allStyles = '';
        $('style').each(function() {
            allStyles += '<style>' + $(this).html() + '</style>';
        });
        $('link[rel="stylesheet"]').each(function() {
            allStyles += '<link rel="stylesheet" href="' + $(this).attr('href') + '">';
        });

        // Open print window
        var printWin = window.open('', '_blank', 'width=1200,height=850');
        printWin.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Payment Voucher</title>
            <meta charset="utf-8">
            ${allStyles}
            <style>
                @page {
                    size: A4 landscape;
                    margin: 8mm;
                }
                * {
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                    color-adjust: exact !important;
                }
                html, body {
                    margin: 0;
                    padding: 0;
                    background: #eef0fb !important;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
                .no-print { display: none !important; }

                /* Force preserve voucher styles in print */
                .voucher-body {
                    background: #eef0fb !important;
                    padding: 0 !important;
                    font-family: Arial, sans-serif !important;
                    color: #4a3f9e !important;
                    position: relative !important;
                    overflow: hidden !important;
                }
                .voucher-container {
                    padding: 25px 35px 40px 35px !important;
                    position: relative !important;
                }
                .voucher-container::before {
                    content: '' !important;
                    position: absolute !important;
                    top: 0 !important;
                    right: 0 !important;
                    width: 280px !important;
                    height: 110px !important;
                    background: linear-gradient(135deg, transparent 30%, #5b4fc4 30%, #5b4fc4 60%, #8a7fd9 60%, #8a7fd9 75%, transparent 75%) !important;
                    border-bottom-left-radius: 100% 80px !important;
                    opacity: 0.85 !important;
                    z-index: 0 !important;
                }
                .voucher-header {
                    display: flex !important;
                    align-items: flex-start !important;
                    justify-content: space-between !important;
                    margin-bottom: 30px !important;
                    position: relative !important;
                    z-index: 2 !important;
                }
                .voucher-logo img { max-height: 90px !important; }
                .voucher-title {
                    border: 2px solid #4a3f9e !important;
                    border-radius: 30px !important;
                    padding: 8px 30px !important;
                    text-align: center !important;
                    font-weight: bold !important;
                    color: #4a3f9e !important;
                    background: #fff !important;
                    margin-top: 20px !important;
                    font-size: 16px !important;
                    line-height: 1.3 !important;
                }
                .voucher-row {
                    display: flex !important;
                    justify-content: space-between !important;
                    align-items: center !important;
                    margin-bottom: 18px !important;
                    flex-wrap: wrap !important;
                    position: relative !important;
                    z-index: 2 !important;
                }
                .voucher-field {
                    display: flex !important;
                    align-items: center !important;
                    flex: 1 !important;
                    margin: 0 5px !important;
                    font-size: 14px !important;
                    color: #4a3f9e !important;
                    font-weight: 600 !important;
                }
                .voucher-field .label-en, .voucher-field .label-ar { white-space: nowrap !important; }
                .voucher-field .label-ar { direction: rtl !important; }
                .voucher-field .field-line {
                    flex: 1 !important;
                    border-bottom: 2px dotted #4a3f9e !important;
                    margin: 0 8px !important;
                    min-height: 20px !important;
                    text-align: center !important;
                    padding: 0 5px !important;
                    color: #000 !important;
                    font-weight: 500 !important;
                }
                .voucher-amount-box {
                    border: 2px solid #4a3f9e !important;
                    padding: 6px 40px !important;
                    min-width: 180px !important;
                    text-align: center !important;
                    background: #fff !important;
                    font-weight: bold !important;
                    color: #000 !important;
                }
                .amount-wrapper { display: flex !important; align-items: center !important; gap: 8px !important; }
                .checkbox-row {
                    display: flex !important;
                    justify-content: space-between !important;
                    margin: 20px 0 !important;
                    flex-wrap: wrap !important;
                    gap: 10px !important;
                    position: relative !important;
                    z-index: 2 !important;
                }
                .check-item {
                    display: flex !important;
                    align-items: center !important;
                    gap: 6px !important;
                    font-size: 13px !important;
                    font-weight: 600 !important;
                    color: #4a3f9e !important;
                }
                .check-box {
                    width: 16px !important;
                    height: 16px !important;
                    border: 1.5px solid #4a3f9e !important;
                    display: inline-block !important;
                    background: #fff !important;
                    text-align: center !important;
                    line-height: 14px !important;
                    font-weight: bold !important;
                }
                .check-box.checked::after {
                    content: '✓' !important;
                    color: #4a3f9e !important;
                    font-size: 14px !important;
                }
                .signature-row {
                    display: flex !important;
                    justify-content: space-between !important;
                    margin-top: 35px !important;
                    gap: 20px !important;
                    position: relative !important;
                    z-index: 2 !important;
                }
                .signature-field {
                    flex: 1 !important;
                    display: flex !important;
                    align-items: center !important;
                    font-size: 13px !important;
                    font-weight: 600 !important;
                    color: #4a3f9e !important;
                }
                .signature-field .field-line {
                    flex: 1 !important;
                    border-bottom: 2px dotted #4a3f9e !important;
                    margin: 0 6px !important;
                    min-height: 18px !important;
                }
                .voucher-footer {
                    background: #4a3f9e !important;
                    color: #fff !important;
                    padding: 12px 30px !important;
                    display: flex !important;
                    justify-content: space-between !important;
                    align-items: center !important;
                    font-size: 12px !important;
                    flex-wrap: wrap !important;
                    gap: 10px !important;
                }
                .voucher-footer .footer-item {
                    display: flex !important;
                    align-items: center !important;
                    gap: 6px !important;
                    color: #fff !important;
                }
                .voucher-footer span { color: #fff !important; }
                .voucher-footer i {
                    background: #fff !important;
                    color: #4a3f9e !important;
                    padding: 4px !important;
                    border-radius: 50% !important;
                    width: 22px !important;
                    height: 22px !important;
                    text-align: center !important;
                    line-height: 14px !important;
                }
            </style>
        </head>
        <body>
            <div class="voucher-body">${voucherHTML}</div>
        </body>
        </html>
    `);
        printWin.document.close();

        // Wait for images and fonts to load
        setTimeout(function() {
            printWin.focus();
            printWin.print();
            setTimeout(function() {
                printWin.close();
            }, 300);
        }, 800);
    }
</script>
