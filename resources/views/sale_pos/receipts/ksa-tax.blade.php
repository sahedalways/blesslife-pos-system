@php
    $customer_name = !empty($receipt_details->contact_name) ? strip_tags($receipt_details->contact_name) : '';
    $customer_phone = $receipt_details->customer_mobile ?? '';
    $customer_display_name = !empty($receipt_details->customer_name) ? strip_tags($receipt_details->customer_name) : '';
    $customer_address = '';

    if (!empty($receipt_details->customer_info_address)) {
        $raw_customer_address = str_replace('<br>', "\n", $receipt_details->customer_info_address);
        $customer_address_parts = preg_split('/[\n,]+/', strip_tags($raw_customer_address));
        $customer_address_parts = array_map('trim', $customer_address_parts);

        $address_remove_values = array_filter([$customer_name, $customer_display_name, $customer_phone]);

        $customer_address_parts = array_filter($customer_address_parts, function ($part) use ($address_remove_values) {
            return $part !== '' && !in_array($part, $address_remove_values, true);
        });

        $customer_address = implode(', ', $customer_address_parts);
    }

    $customer_tax_number = $receipt_details->customer_tax_number ?? '';
    $customer_id = $receipt_details->client_id ?? ($receipt_details->contact_id ?? '');

    $seller_other_id = trim(($receipt_details->tax_label2 ?? 'CRN') . ' ' . ($receipt_details->tax_info2 ?? ''));
    $buyer_other_id =
        !empty($receipt_details->client_id_label) || !empty($customer_id)
            ? trim(($receipt_details->client_id_label ?? 'CRN') . ' ' . $customer_id)
            : '';

    $top_rows = [
        ['label' => 'Invoice No', 'value' => $receipt_details->invoice_no ?? '', 'arabic' => 'رقم الفاتورة'],
        [
            'label' => 'Invoice Date',
            'value' => $receipt_details->invoice_date ?? '',
            'arabic' => 'تاريخ إصدار الفاتورة',
        ],
        [
            'label' => $receipt_details->custom_field_1_label ?? 'Project Name',
            'value' => !empty($receipt_details->custom_field_1) ? $receipt_details->custom_field_1 : '-',
            'arabic' => 'اسم المشروع',
        ],
        [
            'label' => 'Project Code',
            'value' => !empty($receipt_details->project_code) ? $receipt_details->project_code : '-',
            'arabic' => 'رمز المشروع',
        ],
        ['label' => 'Note', 'value' => $receipt_details->sub_heading_line2 ?? '', 'arabic' => 'ملاحظة'],
        ['label' => 'Order No', 'value' => $receipt_details->sub_heading_line3 ?? '', 'arabic' => 'رقم الطلب'],
    ];

    $party_rows = [
        [
            'left_label' => 'Name',
            'left_value' => $receipt_details->display_name ?? '',
            'left_ar' => 'الاسم',
            'right_label' => 'Name',
            'right_value' => $customer_name,
            'right_ar' => 'الاسم',
        ],
        [
            'left_label' => 'Building Number',
            'left_value' => data_get($receipt_details, 'seller_address.building_number', '-'),
            'left_ar' => 'رقم المبنى',

            'right_label' => 'Building Number',
            'right_value' => data_get($receipt_details, 'customer_address.building_number', '-'),
            'right_ar' => 'رقم المبنى',
        ],

        [
            'left_label' => 'Street',
            'left_value' => data_get($receipt_details, 'seller_address.street_name', '-'),
            'left_ar' => 'اسم الشارع',

            'right_label' => 'Street',
            'right_value' => data_get($receipt_details, 'customer_address.street_name', '-'),
            'right_ar' => 'اسم الشارع',
        ],

        [
            'left_label' => 'City',
            'left_value' => $receipt_details->seller_address['city'] ?? '-',
            'left_ar' => 'المدينة',
            'right_label' => 'City',
            'right_value' => $receipt_details->customer_address['city'] ?? '-',
            'right_ar' => 'المدينة',
        ],
        [
            'left_label' => 'State',
            'left_value' => $receipt_details->seller_address['state'] ?? '-',
            'left_ar' => 'المنطقة',
            'right_label' => 'State',
            'right_value' => $receipt_details->customer_address['state'] ?? '-',
            'right_ar' => 'المنطقة',
        ],

        [
            'left_label' => 'Country',
            'left_value' => $receipt_details->seller_address['country'] ?? '-',
            'left_ar' => 'الدولة',
            'right_label' => 'Country',
            'right_value' => $receipt_details->customer_address['country'] ?? '-',
            'right_ar' => 'الدولة',
        ],

        [
            'left_label' => 'Zip/Postal Code',
            'left_value' => $receipt_details->seller_address['zip_code'] ?? '-',
            'left_ar' => 'الرمز البريدي',

            'right_label' => 'Zip/Postal Code',
            'right_value' => $receipt_details->customer_address['zip_code'] ?? '-',
            'right_ar' => 'الرمز البريدي',
        ],

        [
            'left_label' => 'Phone Number',
            'left_value' => trim(strip_tags($receipt_details->contact ?? '')),
            'left_ar' => 'الهاتف',
            'right_label' => 'Phone Number',
            'right_value' => $customer_phone,
            'right_ar' => 'الهاتف',
        ],
        [
            'left_label' => 'VAT Number',
            'left_value' => $receipt_details->tax_info1 ?? '',
            'left_ar' => 'الرقم الضريبي',
            'right_label' => 'VAT Number',
            'right_value' => $customer_tax_number,
            'right_ar' => 'الرقم الضريبي',
        ],
        [
            'left_label' => 'CR Number',
            'left_value' => $receipt_details->seller_cr_no ?? '',
            'left_ar' => 'رقم إضافي',

            'right_label' => 'CR Number',
            'right_value' => $receipt_details->customer_cr_no ?? '',
            'right_ar' => 'رقم إضافي',
        ],
    ];

    $total_subtotal = 0;
    $total_discount = 0;
    $total_vat = 0;

    foreach ($receipt_details->lines as $line) {
        $qty = (float) ($line['quantity_uf'] ?? ($line['quantity'] ?? 0));
        $unit_price = (float) ($line['unit_price_before_discount_uf'] ?? 0);

        $line_subtotal = $unit_price * $qty;
        $total_subtotal += $line_subtotal;

        $line_discount = 0;
        $discount_type = $line['line_discount_type_uf'] ?? '';

        if (!empty($line['total_line_discount'])) {
            $line_discount = (float) $line['total_line_discount'];
        } else {
            if ($discount_type === 'percentage') {
                $percent = (float) ($line['line_discount_percent'] ?? 0);
                $line_discount = $line_subtotal * ($percent / 100);
            } else {
                $line_discount = (float) ($line['line_discount_amount_uf'] ?? 0) * $qty;
            }
        }

        $total_discount += $line_discount;

        $line_taxable_amount = $line_subtotal - $line_discount;

        $tax_percent = (float) ($line['tax_percent'] ?? ($line['tax'] ?? 0));
        $line_vat = $line_taxable_amount * ($tax_percent / 100);
        $total_vat += $line_vat;
    }
@endphp

<div class="ksa-tax-invoice">
    <div class="text-center ksa-header">
        @if (!empty($receipt_details->logo))
            <img src="{{ $receipt_details->logo }}"
                 alt="Logo"
                 class="ksa-logo">
        @elseif (!empty($receipt_details->letter_head))
            <img src="{{ $receipt_details->letter_head }}"
                 alt="Letter Head"
                 class="ksa-logo">
        @endif

        <div class="ksa-title-main">{{ $receipt_details->invoice_heading ?: 'Tax Invoice' }}</div>
        <div class="ksa-title-sub">فاتورة ضريبية</div>
    </div>

    <table class="ksa-top-table">
        <tr>
            <td class="ksa-top-meta">
                <table class="ksa-grid-table">
                    @foreach ($top_rows as $row)
                        @if (!empty($row['value']))
                            <tr>
                                <td class="ksa-label">{{ $row['label'] }}</td>
                                <td class="ksa-value">{{ $row['value'] }}</td>
                                <td class="ksa-arabic">{{ $row['arabic'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </td>
            <td class="ksa-top-qr text-center">
                @if ($receipt_details->show_qr_code && !empty($receipt_details->qr_code_text))
                    <img class="ksa-qr"
                         src="data:image/png;base64,{{ DNS2D::getBarcodePNG($receipt_details->qr_code_text, 'QRCODE', 4, 4, [39, 48, 54]) }}"
                         alt="QR Code">
                @endif
            </td>
        </tr>
    </table>

    <table class="ksa-grid-table party-table">
        <thead>
            <tr>
                <th colspan="3"
                    class="party-head-left">Seller</th>
                <th colspan="3"
                    class="party-head-right">Buyer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($party_rows as $row)
                <tr>
                    <td class="ksa-label">{{ $row['left_label'] }}</td>
                    <td class="ksa-value">{!! nl2br(e($row['left_value'])) !!}</td>
                    <td class="ksa-arabic">{{ $row['left_ar'] }}</td>
                    <td class="ksa-label">{{ $row['right_label'] }}</td>
                    <td class="ksa-value">{!! nl2br(e($row['right_value'])) !!}</td>
                    <td class="ksa-arabic">{{ $row['right_ar'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="ksa-items-table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 30%;">
                    {{ $receipt_details->table_product_label ?: 'Nature of goods or services' }}<br>
                    <span>وصف السلع أو الخدمات</span>
                </th>
                <th style="width: 10%;">
                    {{ $receipt_details->table_unit_price_label ?: 'Unit Price' }}<br>
                    <span>سعر الوحدة</span>
                </th>
                <th style="width: 8%;">
                    {{ $receipt_details->table_qty_label ?: 'Quantity' }}<br>
                    <span>الكمية</span>
                </th>
                <th style="width: 10%;">
                    Discount<br>
                    <span>الخصم</span>
                </th>
                <th style="width: 12%;">
                    Taxable Amount<br>
                    <span>المبلغ الخاضع للضريبة</span>
                </th>
                <th style="width: 8%;">
                    VAT %<br>
                    <span>ضريبة %</span>
                </th>
                <th style="width: 14%;">
                    {{ $receipt_details->table_subtotal_label ?: 'Subtotal (With VAT)' }}<br>
                    <span>الإجمالي شامل الضريبة</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipt_details->lines as $line)
                @php
                    // 1. Quantity
                    $qty = (float) ($line['quantity_uf'] ?? ($line['quantity'] ?? 0));

                    // 2. Unit Price (Before Discount)
                    $unit_price = isset($line['unit_price_before_discount_uf'])
                        ? (float) $line['unit_price_before_discount_uf']
                        : 0;

                    // 3. Gross Total (Price x Qty)
                    $gross_total = $unit_price * $qty;

                    // 4. Calculate Discount
                    $line_discount = 0;
                    $discount_label = '';

                    if (!empty($line['line_discount_type_uf']) && $line['line_discount_type_uf'] === 'percentage') {
                        $percent = (float) ($line['line_discount_percent'] ?? 0);

                        // calculation
                        if (!empty($line['total_line_discount'])) {
                            $line_discount = (float) $line['total_line_discount'];
                        } else {
                            $line_discount = $gross_total * ($percent / 100);
                        }

                        // display label
                        $discount_label = $percent . '%';
                    } else {
                        if (!empty($line['total_line_discount'])) {
                            $line_discount = (float) $line['total_line_discount'];
                        } elseif (!empty($line['line_discount_amount_uf'])) {
                            $line_discount = (float) $line['line_discount_amount_uf'] * $qty;
                        } else {
                            $line_discount = 0;
                        }
                    }

                    // 5. Taxable Amount (Gross Total - Discount)
                    $line_taxable_amount = $gross_total - $line_discount;

                    // 6. Calculate VAT
                    $tax_percent = (float) ($line['tax_percent'] ?? 0);
                    $line_tax_amount = $line_taxable_amount * ($tax_percent / 100);

                    // 7. Final Total with VAT
                    $line_total_with_vat = $line_taxable_amount + $line_tax_amount;
                @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>
                        {{ $line['name'] }} {{ $line['product_variation'] ?? '' }} {{ $line['variation'] ?? '' }}
                        @if (!empty($line['sub_sku']))
                            <br><small>{{ $line['sub_sku'] }}</small>
                        @endif
                        @if (!empty($line['sell_line_note']))
                            <br><small>{!! strip_tags($line['sell_line_note']) !!}</small>
                        @endif
                    </td>

                    <td class="text-right">
                        @if (isset($line['unit_price_before_discount_uf']))
                            @format_currency($unit_price)
                        @else
                            {{ $line['unit_price_before_discount'] ?? '' }}
                        @endif
                    </td>
                    <td class="text-center">
                        {{ $line['quantity'] ?? $qty }} {{ $line['units'] ?? '' }}
                    </td>

                    <!-- Per Product Discount -->
                    <td class="text-right">
                        @if ($line_discount > 0)
                            @format_currency($line_discount)
                            @if (!empty($discount_label))
                                <br><small>{{ $discount_label }}</small>
                            @endif
                        @else
                            -
                        @endif
                    </td>

                    <!-- Taxable Amount (After Discount, Before VAT) -->
                    <td class="text-right">
                        @format_currency($line_taxable_amount)
                    </td>

                    <!-- VAT % -->
                    <td class="text-center">
                        {{ isset($line['tax_percent']) ? $line['tax_percent'] . '%' : 'N/A' }}
                    </td>

                    <!-- Final Total -->
                    <td class="text-right">
                        @format_currency($line_total_with_vat)
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ksa-summary-wrap avoid-page-break">
        <div class="ksa-summary-left">
            @if (!empty($receipt_details->sale_note))
                {!! nl2br(e($receipt_details->sale_note)) !!}
            @endif
            @if (!empty($receipt_details->additional_notes))
                <div class="ksa-notes">
                    <strong>Notes:</strong> {!! nl2br(e($receipt_details->additional_notes)) !!}
                </div>
            @endif

            @if (!empty($receipt_details->footer_text))
                <div class="ksa-footer-text">{!! $receipt_details->footer_text !!}</div>
            @endif
        </div>
        @php
            $subtotal_amount = $total_subtotal;

            $discount_amount = $total_discount;

            $net_amount = $subtotal_amount - $discount_amount;

            $vat_amount = $total_vat;

            $total_amount = $net_amount + $vat_amount;
        @endphp

        <div class="ksa-summary-block">
            <table class="ksa-grid-table ksa-totals-table">
                <tr>
                    <td class="ksa-label">Subtotal ( المجموع الفرعي )</td>
                    <td class="ksa-value text-right">
                        @if ($subtotal_amount)
                            @format_currency($subtotal_amount)
                        @else
                            @format_currency(0)
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="ksa-label">Total Discount ( إجمالي الخصم )</td>
                    <td class="ksa-value text-right">
                        @if ($discount_amount > 0)
                            @format_currency($discount_amount)
                        @else
                            @format_currency(0)
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="ksa-label">Net Amount ( المبلغ الصافي )</td>
                    <td class="ksa-value text-right">
                        @if (!empty($net_amount))
                            @format_currency($net_amount)
                        @else
                            {{ $net_amount ?? '0.00' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="ksa-label">Total VAT ( إجمالي الضريبة )</td>
                    <td class="ksa-value text-right">
                        @if ($vat_amount > 0)
                            @format_currency($vat_amount)
                        @else
                            @format_currency(0)
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="ksa-label">Total Amount ( المبلغ الإجمالي )</td>
                    <td class="ksa-value text-right">
                        @if (!empty($receipt_details->total_unformatted))
                            @format_currency($total_amount ?? '0.00')
                        @else
                            {{ $total_amount ?? '0.00' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="ksa-label">Due Amount ( المبلغ المستحق )</td>
                    <td class="ksa-value text-right">
                        {{ $receipt_details->total_due ?? @format_currency($total_amount) }}
                    </td>
                </tr>
            </table>

            @if (!empty($receipt_details->total_unformatted))
                <div class="amount-in-words-row">
                    <p class="amount-line">
                        <strong>Invoiced
                            Amount:</strong>{{ app(\App\Utils\TransactionUtil::class)->numberToCurrencyWords($total_amount, 'riyal', 'halala', 'en') }}
                    </p>
                    <p class="amount-line amount-line-ar">
                        <strong>مبلغ
                            الفاتورة:</strong>{{ app(\App\Utils\TransactionUtil::class)->numberToCurrencyWords($total_amount, 'ريالًا و', ' هللة فقط', 'ar') }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>

<style type="text/css">
    html,
    body,
    .ksa-tax-invoice,
    .ksa-tax-invoice * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        color-adjust: exact !important;
    }

    .ksa-tax-invoice {
        color: #000;
        font-size: 11px;
        line-height: 1.35;
    }

    .ksa-header {
        margin-bottom: 10px;
    }

    .ksa-logo {
        max-width: 120px;
        max-height: 80px;
        margin-bottom: 5px;
    }

    .ksa-title-main {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 2px;
    }

    .ksa-title-sub {
        font-size: 12px;
        font-weight: 700;
    }

    .ksa-top-table,
    .ksa-grid-table,
    .ksa-items-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    .ksa-top-meta {
        width: 68%;
        vertical-align: top;
        padding-right: 10px;
    }

    .ksa-top-qr {
        width: 32%;
        vertical-align: middle;
    }

    .ksa-qr {
        width: 115px;
        height: 115px;
        object-fit: contain;
    }

    .ksa-grid-table td,
    .ksa-grid-table th,
    .ksa-items-table td,
    .ksa-items-table th {
        border: 1px solid #9e9e9e !important;
        padding: 4px 6px;
        vertical-align: middle;
    }

    .ksa-grid-table td {
        background: #fff !important;
    }

    .ksa-label,
    .ksa-arabic {
        width: 16%;
        background: #f1f1f1 !important;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .ksa-value {
        width: 18%;
        font-size: 10px;
    }

    .ksa-arabic {
        text-align: right;
    }

    .party-head-left,
    .party-head-right {
        background: #b7b7b7 !important;
        color: #fff !important;
        font-size: 10px;
        padding: 5px 6px !important;
        text-align: left;
    }

    .party-head-right {
        text-align: right;
    }

    .ksa-items-table thead th {
        background: #1f5db0 !important;
        color: #fff !important;
        font-size: 10px;
        text-align: center;
    }

    .ksa-items-table thead span {
        color: #fff !important;
        font-weight: 400;
    }

    .ksa-items-table td {
        font-size: 10px;
    }

    .ksa-summary-wrap {
        width: 100%;
        margin-top: 10px;
        display: table;
    }

    .ksa-summary-left,
    .ksa-summary-block {
        display: table-cell;
        vertical-align: top;
    }

    .ksa-summary-left {
        width: 52%;
        padding-right: 18px;
    }

    .ksa-summary-block {
        width: 48%;
    }

    .amount-in-words-row {
        margin-top: 14px;
        margin-bottom: 8px;
        font-size: 11px;
        line-height: 1.6;
    }

    .amount-line {
        margin: 0 0 8px 0;
        font-weight: 700;
    }

    .amount-line-ar {
        direction: rtl;
        text-align: left;
    }

    .ksa-notes,
    .ksa-footer-text {
        margin-top: 10px;
        font-size: 10px;
    }

    .ksa-signatures {
        margin-top: 45px;
    }

    .ksa-signature-box {
        margin-top: 8px;
        font-size: 10px;
    }

    .ksa-totals-table .ksa-label {
        width: 74%;
        background: #f7f7f7 !important;
        font-size: 11px;
        font-weight: 500;
    }

    .ksa-totals-table .ksa-value {
        width: 26%;
        font-size: 11px;
        background: #fdfdfd !important;
    }

    .avoid-page-break {
        page-break-inside: avoid;
        break-inside: avoid;
    }

    @media print {

        html,
        body,
        .ksa-tax-invoice,
        .ksa-tax-invoice * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            color-adjust: exact !important;
        }

        .avoid-page-break,
        .ksa-top-table,
        .party-table {
            page-break-inside: avoid;
            break-inside: avoid;
        }
    }
</style>
