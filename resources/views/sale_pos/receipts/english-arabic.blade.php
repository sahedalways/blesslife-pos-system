@php
    $customer_name = !empty($receipt_details->contact_name) ? strip_tags($receipt_details->contact_name) : '';
    $customer_phone = $receipt_details->customer_mobile ?? '';
    $customer_display_name = !empty($receipt_details->customer_name) ? strip_tags($receipt_details->customer_name) : '';
    $customer_tax_number = $receipt_details->customer_tax_number ?? '';
    $customer_id = $receipt_details->client_id ?? ($receipt_details->contact_id ?? '');

    $seller_cr = trim($receipt_details->tax_info2 ?? '');
    $buyer_cr = trim($customer_id ?? '');

    $arabic_digits = [
        '0' => '٠',
        '1' => '١',
        '2' => '٢',
        '3' => '٣',
        '4' => '٤',
        '5' => '٥',
        '6' => '٦',
        '7' => '٧',
        '8' => '٨',
        '9' => '٩',
    ];

    // ── Step 1: Loop through lines ────────────────────────────────────────────
    $total_quantity = 0;
    $total_line_discount = 0;
    $total_per_product_vat = 0;
    $total_taxable_excl_vat = 0;
    $total_product_line_with_vat = 0;

    $processed_lines = [];

    foreach ($receipt_details->lines as $line) {
        $qty = (float) ($line['quantity_uf'] ?? ($line['quantity'] ?? 0));
        $unit_price = (float) ($line['unit_price_before_discount_uf'] ?? ($line['unit_price_before_discount'] ?? 0));
        $tax_percent = (float) ($line['tax_percent'] ?? 0);

        $total_quantity += $qty;
        $gross = $unit_price * $qty;

        // ── Per-line discount (FIXED) ─────────────────────────────────────────
        $line_discount = 0;
        $discount_type = $line['line_discount_type_uf'] ?? '';
        $is_percentage = false;
        $discount_label = '';

        if ($discount_type === 'percentage') {
            $is_percentage = true;
            $discount_percent = (float) ($line['line_discount_percent'] ?? 0);
            $discount_label = $discount_percent . '%';

            // Backend থেকে already total discount পাঠালে সেটা use করবে, না হলে calculate করবে
            $line_discount = !empty($line['total_line_discount'])
                ? (float) $line['total_line_discount']
                : $gross * ($discount_percent / 100);
        } elseif (!empty($line['total_line_discount'])) {
            // Fixed discount
            $line_discount = (float) $line['total_line_discount'];
        } elseif (!empty($line['line_discount_amount_uf'])) {
            // Fallback: per unit amount × qty
            $line_discount = (float) $line['line_discount_amount_uf'] * $qty;
        }

        $total_line_discount += $line_discount;

        // ── Taxable amount per line (excl. VAT, net of discount) ─────────────
        if (!empty($line['line_total_exc_tax_uf'])) {
            $line_taxable = (float) $line['line_total_exc_tax_uf'];
        } else {
            $line_taxable = max($gross - $line_discount, 0);
        }

        // ── Per-product VAT ──────────────────────────────────────────────────
        $line_vat = $line_taxable * ($tax_percent / 100);
        $line_total_with_vat = $line_taxable + $line_vat;

        // ── Accumulate ───────────────────────────────────────────────────────
        $total_taxable_excl_vat += $line_taxable;
        $total_per_product_vat += $line_vat;
        $total_product_line_with_vat += $line_total_with_vat;

        $processed_lines[] = [
            'line' => $line,
            'qty' => $qty,
            'unit_price' => $unit_price,
            'gross' => $gross,
            'line_discount' => $line_discount,
            'is_percentage' => $is_percentage,
            'discount_label' => $discount_label,
            'line_taxable' => $line_taxable,
            'tax_percent' => $tax_percent,
            'line_vat' => $line_vat,
            'line_total_with_vat' => $line_total_with_vat,
        ];
    }

    $subtotal_excl_vat = 0;
    foreach ($processed_lines as $item) {
        $subtotal_excl_vat += $item['gross'];
    }

    $discount_amount = $total_line_discount;
    $net_amount = $subtotal_excl_vat - $discount_amount;
    $vat_on_total = $total_per_product_vat;
    $total_amount_include_vat = $net_amount + $vat_on_total;
@endphp



<div class="tax-creditnote-wrap">

    <!-- ==================== TITLE BAR ==================== -->
    <table class="tcn-title-table">
        <tr>
            <td class="tcn-title-left">
                <span class="tcn-title-en">TAX CREDITNOTE /</span>
            </td>
            <td class="tcn-title-right">
                <span class="tcn-title-ar">تفاصيل التمويل الضريبية</span>
            </td>
        </tr>
    </table>

    <!-- ==================== CREDITNOTE NO ROW ==================== -->
    <table class="tcn-cnno-table">
        <tr>
            <td class="tcn-cnno-label-en">CREDITNOTE No</td>
            <td class="tcn-cnno-value">{{ $receipt_details->invoice_no ?? '' }}</td>
            <td class="tcn-cnno-value-ar">
                @php echo strtr($receipt_details->invoice_no ?? '', $arabic_digits); @endphp
            </td>
            <td class="tcn-cnno-label-ar">رقم الفاتورة:</td>
        </tr>
    </table>

    <!-- ==================== OUR DETAILS (SELLER) ==================== -->
    <table class="tcn-party-table">
        <thead>
            <tr>
                <th class="tcn-party-head-en"
                    colspan="4">Our Details:-</th>
                <th class="tcn-party-head-ar"
                    colspan="4">تفاصيلنا</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tcn-cell-label-en">Name</td>
                <td class="tcn-cell-value"
                    colspan="6">{{ $receipt_details->display_name ?? '' }}</td>
                <td class="tcn-cell-label-ar">الاسم</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Street Name</td>
                <td class="tcn-cell-value"
                    colspan="6">{{ data_get($receipt_details, 'seller_address.street_name', '') }}</td>
                <td class="tcn-cell-label-ar">اسم الشارع</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Building Name</td>
                <td class="tcn-cell-value">{{ data_get($receipt_details, 'seller_address.building_number', '') }}</td>
                <td class="tcn-cell-label-en">City:</td>
                <td class="tcn-cell-value">{{ $receipt_details->seller_address['city'] ?? '' }}</td>
                <td class="tcn-cell-value-ar">
                    {{ data_get($receipt_details, 'seller_address.city_ar', $receipt_details->seller_address['city'] ?? '') }}
                </td>
                <td class="tcn-cell-label-ar">مدينة</td>
                <td class="tcn-cell-value-ar">
                    {{ data_get($receipt_details, 'seller_address.building_number_ar', data_get($receipt_details, 'seller_address.building_number', '')) }}
                </td>
                <td class="tcn-cell-label-ar">رقم المبنى</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Addl. No.</td>
                <td class="tcn-cell-value">{{ data_get($receipt_details, 'seller_address.additional_no', '') }}</td>
                <td class="tcn-cell-label-en">District:</td>
                <td class="tcn-cell-value">
                    {{ data_get($receipt_details, 'seller_address.district', $receipt_details->seller_address['state'] ?? '') }}
                </td>
                <td class="tcn-cell-value-ar">{{ data_get($receipt_details, 'seller_address.district_ar', '') }}</td>
                <td class="tcn-cell-label-ar">الحي</td>
                <td class="tcn-cell-value-ar">
                    {{ data_get($receipt_details, 'seller_address.additional_no_ar', data_get($receipt_details, 'seller_address.additional_no', '')) }}
                </td>
                <td class="tcn-cell-label-ar">رقم إضافي</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Postal Code:</td>
                <td class="tcn-cell-value">{{ data_get($receipt_details, 'seller_address.zip_code', '') }}</td>
                <td class="tcn-cell-label-en">Country:</td>
                <td class="tcn-cell-value">{{ data_get($receipt_details, 'seller_address.country', '') }}</td>
                <td class="tcn-cell-value-ar">
                    {{ data_get($receipt_details, 'seller_address.country_ar', data_get($receipt_details, 'seller_address.country', '')) }}
                </td>
                <td class="tcn-cell-label-ar">البلد</td>
                <td class="tcn-cell-value-ar">
                    {{ data_get($receipt_details, 'seller_address.zip_code_ar', data_get($receipt_details, 'seller_address.zip_code', '')) }}
                </td>
                <td class="tcn-cell-label-ar">رمز بريدي</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Vat Number:</td>
                <td class="tcn-cell-value">{{ $receipt_details->tax_info1 ?? '' }}</td>
                <td class="tcn-cell-label-en">CRN:</td>
                <td class="tcn-cell-value">{{ $sell->seller_cr_number ?? '' }}</td>
                <td class="tcn-cell-value-ar">@php echo strtr($seller_cr, $arabic_digits); @endphp</td>
                <td class="tcn-cell-label-ar">رقم السجل المدني</td>
                <td class="tcn-cell-value-ar">@php echo strtr($receipt_details->tax_info1 ?? '', $arabic_digits); @endphp</td>
                <td class="tcn-cell-label-ar">أرقام ضريبة</td>
            </tr>
        </tbody>
    </table>

    <!-- ==================== CLIENT DETAILS (BUYER) ==================== -->
    <table class="tcn-party-table">
        <thead>
            <tr>
                <th class="tcn-party-head-en"
                    colspan="4">Client Details:-</th>
                <th class="tcn-party-head-ar"
                    colspan="4">تفاصيل العميل</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tcn-cell-label-en">Name</td>
                <td class="tcn-cell-value"
                    colspan="6">{{ $customer_name }}</td>
                <td class="tcn-cell-label-ar">الاسم</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Street Name</td>
                <td class="tcn-cell-value"
                    colspan="6">{{ data_get($receipt_details, 'customer_address.street_name', '') }}</td>
                <td class="tcn-cell-label-ar">اسم الشارع</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Building Name</td>
                <td class="tcn-cell-value">
                    @if (!empty(data_get($receipt_details, 'customer_address.building_number')))
                        Building No: {{ data_get($receipt_details, 'customer_address.building_number') }}
                    @endif
                </td>
                <td class="tcn-cell-label-en">City:</td>
                <td class="tcn-cell-value">{{ $receipt_details->customer_address['city'] ?? '' }}</td>
                <td class="tcn-cell-value-ar">
                    {{ data_get($receipt_details, 'customer_address.city_ar', $receipt_details->customer_address['city'] ?? '') }}
                </td>
                <td class="tcn-cell-label-ar">مدينة</td>
                <td class="tcn-cell-value-ar">@php echo strtr(data_get($receipt_details, 'customer_address.building_number', ''), $arabic_digits); @endphp</td>
                <td class="tcn-cell-label-ar">رقم المبنى</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Addl. No.</td>
                <td class="tcn-cell-value">{{ data_get($receipt_details, 'customer_address.additional_no', '') }}</td>
                <td class="tcn-cell-label-en">District:</td>
                <td class="tcn-cell-value">
                    {{ data_get($receipt_details, 'customer_address.district', $receipt_details->customer_address['state'] ?? '') }}
                </td>
                <td class="tcn-cell-value-ar">{{ data_get($receipt_details, 'customer_address.district_ar', '') }}</td>
                <td class="tcn-cell-label-ar">الحي</td>
                <td class="tcn-cell-value-ar">@php echo strtr(data_get($receipt_details, 'customer_address.additional_no', ''), $arabic_digits); @endphp</td>
                <td class="tcn-cell-label-ar">رقم إضافي</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Postal Code:</td>
                <td class="tcn-cell-value">{{ data_get($receipt_details, 'customer_address.zip_code', '') }}</td>
                <td class="tcn-cell-label-en">Country:</td>
                <td class="tcn-cell-value">{{ data_get($receipt_details, 'customer_address.country', '') }}</td>
                <td class="tcn-cell-value-ar">
                    {{ data_get($receipt_details, 'customer_address.country_ar', data_get($receipt_details, 'customer_address.country', '')) }}
                </td>
                <td class="tcn-cell-label-ar">البلد</td>
                <td class="tcn-cell-value-ar">@php echo strtr(data_get($receipt_details, 'customer_address.zip_code', ''), $arabic_digits); @endphp</td>
                <td class="tcn-cell-label-ar">رمز بريدي</td>
            </tr>
            <tr>
                <td class="tcn-cell-label-en">Vat Number:</td>
                <td class="tcn-cell-value">{{ $customer_tax_number }}</td>
                <td class="tcn-cell-label-en">CRN:</td>
                <td class="tcn-cell-value">{{ $sell->customer_cr_number ?? '' }}</td>
                <td class="tcn-cell-value-ar">@php echo strtr($buyer_cr, $arabic_digits); @endphp</td>
                <td class="tcn-cell-label-ar">رقم السجل المدني</td>
                <td class="tcn-cell-value-ar">@php echo strtr($customer_tax_number, $arabic_digits); @endphp</td>
                <td class="tcn-cell-label-ar">رقم ضريبة</td>
            </tr>
        </tbody>
    </table>

    <!-- ==================== CREDIT NOTE INFO ROW ==================== -->
    <table class="tcn-info-table">
        <thead>
            <tr>
                <th class="tcn-info-th">
                    <div class="tcn-info-th-en">Credit Note Date</div>
                    <div class="tcn-info-th-ar">مذكرة الائتمان</div>
                </th>
                <th class="tcn-info-th">
                    <div class="tcn-info-th-en">Supply Date</div>
                    <div class="tcn-info-th-ar">تاريخ التوريد</div>
                </th>
                <th class="tcn-info-th">
                    <div class="tcn-info-th-en">Contract / PO No</div>
                    <div class="tcn-info-th-ar">العقد / رقم الطلب</div>
                </th>
                <th class="tcn-info-th">
                    <div class="tcn-info-th-en">Due Date</div>
                    <div class="tcn-info-th-ar">تاريخ الاستحقاق</div>
                </th>
                <th class="tcn-info-th">
                    <div class="tcn-info-th-en">Credit Note Period</div>
                    <div class="tcn-info-th-ar">فترة مذكرة الائتمان</div>
                </th>
                <th class="tcn-info-th">
                    <div class="tcn-info-th-en">Project / Reference No</div>
                    <div class="tcn-info-th-ar">المشروع / رقم المرجع</div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tcn-info-td">{{ $receipt_details->invoice_date ?? '' }}</td>
                <td class="tcn-info-td">{{ $receipt_details->invoice_date ?? '' }}</td>
                <td class="tcn-info-td">
                    @if (!empty($receipt_details->sub_heading_line3))
                        PO NO.: {{ $receipt_details->sub_heading_line3 }}
                    @endif
                </td>
                <td class="tcn-info-td">{{ $receipt_details->due_date ?? '' }}</td>
                <td class="tcn-info-td">&nbsp;</td>
                <td class="tcn-info-td">
                    @if (!empty($receipt_details->custom_field_1))
                        {{ $receipt_details->custom_field_1 }}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <!-- ==================== PRODUCT LINES TABLE ==================== -->
    <table class="tcn-lines-table">
        <thead>
            <tr>
                <th class="tcn-lines-th tcn-th-sl">
                    <div class="tcn-lines-th-en">SL No</div>
                    <div class="tcn-lines-th-ar">رقم سري</div>
                </th>
                <th class="tcn-lines-th tcn-th-desc">
                    <div class="tcn-lines-th-en">Descriptions</div>
                    <div class="tcn-lines-th-ar">الأوصاف</div>
                </th>
                <th class="tcn-lines-th tcn-th-qty">
                    <div class="tcn-lines-th-en">QTY</div>
                    <div class="tcn-lines-th-ar">الكمية</div>
                </th>
                <th class="tcn-lines-th tcn-th-unit">
                    <div class="tcn-lines-th-en">Unit Rate</div>
                    <div class="tcn-lines-th-ar">سعر الوحدة</div>
                </th>
                <th class="tcn-lines-th tcn-th-discount">
                    <div class="tcn-lines-th-en">Discount</div>
                    <div class="tcn-lines-th-ar">الخصم</div>
                </th>
                <th class="tcn-lines-th tcn-th-amt">
                    <div class="tcn-lines-th-en">Total Amount without Vat</div>
                    <div class="tcn-lines-th-ar">المبلغ الإجمالي بدون ضريبة القيمة المضافة</div>
                </th>
                <th class="tcn-lines-th tcn-th-vat">
                    <div class="tcn-lines-th-en">Vat (%)</div>
                    <div class="tcn-lines-th-ar">ضريبة القيمة المضافة</div>
                </th>
                <th class="tcn-lines-th tcn-th-total">
                    <div class="tcn-lines-th-en">Total Amount Include Vat</div>
                    <div class="tcn-lines-th-ar">المبلغ الإجمالي يشمل ضريبة القيمة المضافة</div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipt_details->lines as $line)
                @php
                    // Quantity
                    $qty = (float) ($line['quantity_uf'] ?? ($line['quantity'] ?? 0));

                    // Unit price before discount
                    $unit_price =
                        (float) ($line['unit_price_before_discount_uf'] ?? ($line['unit_price_before_discount'] ?? 0));

                    // VAT %
                    $tax_percent = (float) ($line['tax_percent'] ?? 0);

                    // Gross total = unit price × qty
                    $gross = $unit_price * $qty;

                    // ─────────────────────────────────────────────────────────────
                    // Discount Calculation (Fixed based on your actual JSON keys)
                    // ─────────────────────────────────────────────────────────────
                    $line_discount = 0;
                    $discount_type = $line['line_discount_type_uf'] ?? '';
                    $discount_show_value = 0;
                    $is_percentage = false;

                    if ($discount_type === 'percentage') {
                        $is_percentage = true;
                        $discount_show_value = (float) ($line['line_discount_percent'] ?? 0);

                        // Backend থেকে already total discount পাঠালে সেটা use করবে
                        $line_discount = !empty($line['total_line_discount'])
                            ? (float) $line['total_line_discount']
                            : $gross * ($discount_show_value / 100);
                    } elseif (!empty($line['total_line_discount'])) {
                        // Fixed discount: total line discount use করবে
                        $line_discount = (float) $line['total_line_discount'];
                        $discount_show_value = $line_discount;
                    } elseif (!empty($line['line_discount_amount_uf'])) {
                        // Fallback: per unit amount × qty
                        $per_unit = (float) $line['line_discount_amount_uf'];
                        $line_discount = $per_unit * $qty;
                        $discount_show_value = $line_discount;
                    }

                    // ─────────────────────────────────────────────────────────────
                    // Taxable Amount (After Discount, Before VAT)
                    // ─────────────────────────────────────────────────────────────
                    if (
                        isset($line['line_total_exc_tax_uf']) &&
                        $line['line_total_exc_tax_uf'] !== '' &&
                        $line['line_total_exc_tax_uf'] !== null
                    ) {
                        $line_taxable = (float) $line['line_total_exc_tax_uf'];
                    } else {
                        $line_taxable = $gross - $line_discount;
                    }

                    // Negative protection
                    $line_taxable = max($line_taxable, 0);

                    // VAT amount
                    $line_tax_amount = $line_taxable * ($tax_percent / 100);

                    // Total including VAT
                    $line_total_with_vat = $line_taxable + $line_tax_amount;
                @endphp

                <tr>
                    <td class="tcn-lines-td text-center">{{ $loop->iteration }}</td>

                    <td class="tcn-lines-td text-center">
                        {{ $line['name'] }}
                        {{ $line['product_variation'] ?? '' }}
                        {{ $line['variation'] ?? '' }}

                        @if (!empty($line['sub_sku']))
                            <br><small>{{ $line['sub_sku'] }}</small>
                        @endif

                        @if (!empty($line['sell_line_note']))
                            <br><small>{!! strip_tags($line['sell_line_note']) !!}</small>
                        @endif
                    </td>

                    <td class="tcn-lines-td text-center">
                        {{ $line['quantity'] ?? $qty }}
                        {{ $line['units'] ?? '' }}
                    </td>

                    <td class="tcn-lines-td text-right">
                        @format_currency($unit_price)
                    </td>

                    <!-- Per product discount -->
                    <td class="tcn-lines-td text-right">
                        @if ($line_discount > 0)
                            @if ($is_percentage)
                                {{ $discount_show_value }}%
                            @else
                                @format_currency($discount_show_value)
                            @endif
                        @else
                            -
                        @endif
                    </td>

                    <!-- Amount without VAT -->
                    <td class="tcn-lines-td text-right">
                        @format_currency($line_taxable)
                    </td>

                    <!-- VAT % -->
                    <td class="tcn-lines-td text-center">
                        {{ $tax_percent > 0 ? $tax_percent . '%' : 'N/A' }}
                    </td>

                    <!-- Total including VAT -->
                    <td class="tcn-lines-td text-right">
                        @format_currency($line_total_with_vat)
                    </td>
                </tr>
            @endforeach

            {{-- Filler rows --}}
            @for ($i = count($receipt_details->lines); $i < 2; $i++)
                <tr>
                    <td class="tcn-lines-td">&nbsp;</td>
                    <td class="tcn-lines-td">&nbsp;</td>
                    <td class="tcn-lines-td">&nbsp;</td>
                    <td class="tcn-lines-td">&nbsp;</td>
                    <td class="tcn-lines-td">&nbsp;</td>
                    <td class="tcn-lines-td">&nbsp;</td>
                    <td class="tcn-lines-td">&nbsp;</td>
                    <td class="tcn-lines-td">&nbsp;</td>
                </tr>
            @endfor
        </tbody>
    </table>

    <!-- ==================== TOTALS SECTION ==================== -->
    {{--
        LOGIC:
        • "Total Amount Without Vat"  = sum of line taxable amounts  (already net of per-line discounts)
        • "Discount"                  = 0  (discounts are already absorbed in each line total)
        • "Net Amount"                = same as Total Without Vat
        • "Vat (15%)"                 = Net Amount × 15 %
        • "Total Include Vat"         = Net Amount + VAT
    --}}
    <table class="tcn-totals-table avoid-page-break">
        <tr>
            <td class="tcn-totals-label-en">Subtotal</td>
            <td class="tcn-totals-value">@format_currency($subtotal_excl_vat)</td>
            <td class="tcn-totals-label-ar">المجموع الفرعي</td>
        </tr>



        <tr>
            <td class="tcn-totals-label-en">Discount</td>
            <td class="tcn-totals-value">@format_currency($discount_amount)</td>
            <td class="tcn-totals-label-ar">الخصم</td>
        </tr>
        <tr>
            <td class="tcn-totals-label-en">Net Amount</td>
            <td class="tcn-totals-value">@format_currency($net_amount)</td>
            <td class="tcn-totals-label-ar">المبلغ الصافي</td>
        </tr>
        <tr>
            <td class="tcn-totals-label-en">Total VAT</td>
            <td class="tcn-totals-value">@format_currency($vat_on_total)</td>
            <td class="tcn-totals-label-ar">إجمالي ضريبة القيمة المضافة</td>
        </tr>
        <tr>
            <td class="tcn-totals-label-en">Total Amount Include Vat</td>
            <td class="tcn-totals-value">@format_currency($total_amount_include_vat)</td>
            <td class="tcn-totals-label-ar">المبلغ الإجمالي يشمل ضريبة القيمة المضافة</td>
        </tr>
    </table>

    <!-- ==================== AMOUNT IN WORDS ==================== -->
    <table class="tcn-words-table avoid-page-break">
        <tr>
            <td class="tcn-words-label">Amount in Words:</td>
            <td class="tcn-words-value">
                @if (!empty($total_amount_include_vat))
                    {{ app(\App\Utils\TransactionUtil::class)->numberToCurrencyWords($total_amount_include_vat, 'Riyals', 'Halalas', 'en') }}.
                @endif
            </td>
        </tr>
    </table>

    <!-- ==================== SIGNATURES ==================== -->
    <table class="tcn-sign-table avoid-page-break">
        <tr>
            <td class="tcn-sign-cell tcn-sign-left">
                <div class="tcn-sign-line">&nbsp;</div>
                <div class="tcn-sign-row">
                    <span class="tcn-sign-label-en">Approved By</span>
                    <span class="tcn-sign-label-ar">تمت الموافقة عليها من قبل</span>
                </div>
                <div class="tcn-sign-row">
                    <span class="tcn-sign-stamp-en">Signature with Stamp</span>
                    <span class="tcn-sign-stamp-ar">التوقيع مع الختم</span>
                </div>
            </td>
            <td class="tcn-sign-cell tcn-sign-right">
                <div class="tcn-sign-line">&nbsp;</div>
                <div class="tcn-sign-row">
                    <span class="tcn-sign-label-en">Received By</span>
                    <span class="tcn-sign-label-ar">تم الاستلام بواسطة</span>
                </div>
                <div class="tcn-sign-row">
                    <span class="tcn-sign-stamp-en">Signature with Stamp</span>
                    <span class="tcn-sign-stamp-ar">التوقيع مع الختم</span>
                </div>
            </td>
        </tr>
    </table>

    @if ($receipt_details->show_qr_code && !empty($receipt_details->qr_code_text))
        <div class="tcn-qr-wrap text-center avoid-page-break">
            <img class="tcn-qr"
                 src="data:image/png;base64,{{ DNS2D::getBarcodePNG($receipt_details->qr_code_text, 'QRCODE', 3, 3) }}"
                 alt="QR Code">
        </div>
    @endif

</div>

<style type="text/css">
    html,
    body,
    .tax-creditnote-wrap,
    .tax-creditnote-wrap * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        color-adjust: exact !important;
    }

    .tax-creditnote-wrap {
        font-family: Arial, Helvetica, sans-serif;
        color: #000;
        font-size: 11px;
        line-height: 1.3;
        width: 100%;
    }

    .tcn-title-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 4px;
    }

    .tcn-title-left {
        width: 50%;
        text-align: right;
        padding-right: 8px;
    }

    .tcn-title-right {
        width: 50%;
        text-align: left;
        padding-left: 8px;
    }

    .tcn-title-en,
    .tcn-title-ar {
        color: #1f72c1 !important;
        font-size: 22px;
        font-weight: bold;
    }

    .tcn-title-ar {
        direction: rtl;
    }

    .tcn-cnno-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 4px;
        border: 1px solid #999;
    }

    .tcn-cnno-table td {
        border: 1px solid #999;
        padding: 4px 8px;
        font-size: 11px;
    }

    .tcn-cnno-label-en {
        background: #fff !important;
        font-weight: bold;
        color: #1f72c1 !important;
        width: 18%;
        text-align: left;
    }

    .tcn-cnno-value {
        text-align: center;
        font-weight: bold;
        width: 32%;
    }

    .tcn-cnno-value-ar {
        text-align: center;
        font-weight: bold;
        width: 32%;
        direction: rtl;
    }

    .tcn-cnno-label-ar {
        background: #fff !important;
        font-weight: bold;
        color: #1f72c1 !important;
        width: 18%;
        text-align: right;
        direction: rtl;
    }

    .tcn-party-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 4px;
        border: 1px solid #666;
    }

    .tcn-party-table th,
    .tcn-party-table td {
        border: 1px solid #999;
        padding: 4px 6px;
        font-size: 11px;
        vertical-align: middle;
    }

    .tcn-party-head-en,
    .tcn-party-head-ar {
        background: #fff !important;
        color: #1f72c1 !important;
        font-weight: bold;
        text-align: center;
        padding: 5px !important;
        font-size: 12px;
    }

    .tcn-party-head-ar {
        direction: rtl;
    }

    .tcn-cell-label-en {
        background: #d9d9d9 !important;
        font-weight: bold;
        text-align: left;
        white-space: nowrap;
        width: 11%;
    }

    .tcn-cell-label-ar {
        background: #d9d9d9 !important;
        font-weight: bold;
        text-align: right;
        direction: rtl;
        white-space: nowrap;
        width: 11%;
    }

    .tcn-cell-value {
        background: #fff !important;
        text-align: left;
        width: 14%;
    }

    .tcn-cell-value-ar {
        background: #fff !important;
        text-align: right;
        direction: rtl;
        width: 14%;
    }

    .tcn-info-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
        border: 1px solid #666;
    }

    .tcn-info-table th,
    .tcn-info-table td {
        border: 1px solid #999;
        padding: 4px 5px;
        font-size: 10px;
        text-align: center;
        vertical-align: middle;
    }

    .tcn-info-th {
        background: #fff !important;
        font-weight: bold;
        width: 16.66%;
    }

    .tcn-info-th-en {
        font-size: 10px;
        font-weight: bold;
    }

    .tcn-info-th-ar {
        direction: rtl;
        font-size: 10px;
        font-weight: bold;
        margin-top: 2px;
    }

    .tcn-info-td {
        padding: 8px 5px !important;
        font-size: 11px;
        background: #fff !important;
    }

    .tcn-lines-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 6px;
        border: 1px solid #666;
    }

    .tcn-lines-table th,
    .tcn-lines-table td {
        border: 1px solid #999;
        padding: 5px 4px;
        font-size: 10px;
        vertical-align: middle;
    }

    .tcn-lines-th {
        background: #fff !important;
        font-weight: bold;
        text-align: center;
        padding: 6px 4px !important;
    }

    .tcn-lines-th-en {
        font-size: 10px;
        font-weight: bold;
    }

    .tcn-lines-th-ar {
        direction: rtl;
        font-size: 10px;
        font-weight: bold;
        margin-top: 2px;
    }

    .tcn-th-sl {
        width: 6%;
    }

    .tcn-th-desc {
        width: 32%;
    }

    .tcn-th-qty {
        width: 7%;
    }

    .tcn-th-unit {
        width: 11%;
    }

    .tcn-th-discount {
        width: 8%;
    }

    .tcn-th-amt {
        width: 14%;
    }

    .tcn-th-vat {
        width: 10%;
    }

    .tcn-th-total {
        width: 12%;
    }

    .tcn-lines-td {
        background: #fff !important;
        padding: 8px 4px !important;
        font-size: 11px;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .text-left {
        text-align: left;
    }

    .tcn-totals-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 4px;
        border: 1px solid #666;
    }

    .tcn-totals-table td {
        border: 1px solid #999;
        padding: 10px 12px;
        font-size: 12px;
        background: #fff !important;
    }

    .tcn-totals-label-en {
        font-weight: bold;
        text-align: center;
        width: 35%;
    }

    .tcn-totals-value {
        text-align: center;
        font-weight: bold;
        width: 25%;
    }

    .tcn-totals-label-ar {
        font-weight: bold;
        text-align: center;
        direction: rtl;
        width: 40%;
    }

    .tcn-words-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 6px;
        border: 1px solid #666;
    }

    .tcn-words-table td {
        border: 1px solid #999;
        padding: 12px 10px;
        font-size: 11px;
        background: #fff !important;
        vertical-align: middle;
    }

    .tcn-words-label {
        font-weight: bold;
        width: 15%;
    }

    .tcn-words-value {
        width: 85%;
    }

    .tcn-sign-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 8px;
        margin-bottom: 6px;
    }

    .tcn-sign-cell {
        width: 50%;
        vertical-align: top;
        padding: 30px 12px 10px 12px;
        border: 1px solid #999;
        background: #fff !important;
    }

    .tcn-sign-line {
        border-top: 1px solid #999;
        margin-bottom: 6px;
        height: 1px;
    }

    .tcn-sign-row {
        display: table;
        width: 100%;
        margin-bottom: 4px;
    }

    .tcn-sign-label-en,
    .tcn-sign-stamp-en {
        display: table-cell;
        text-align: left;
        font-size: 11px;
        color: #1f72c1 !important;
        font-weight: bold;
    }

    .tcn-sign-label-ar,
    .tcn-sign-stamp-ar {
        display: table-cell;
        text-align: right;
        direction: rtl;
        font-size: 11px;
        color: #1f72c1 !important;
        font-weight: bold;
    }

    .tcn-qr-wrap {
        text-align: center;
        margin-top: 10px;
    }

    .tcn-qr {
        width: 130px;
        height: 130px;
    }

    .avoid-page-break {
        page-break-inside: avoid;
        break-inside: avoid;
    }

    @media print {

        html,
        body,
        .tax-creditnote-wrap,
        .tax-creditnote-wrap * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            color-adjust: exact !important;
        }

        .tcn-title-en,
        .tcn-title-ar,
        .tcn-cnno-label-en,
        .tcn-cnno-label-ar,
        .tcn-party-head-en,
        .tcn-party-head-ar,
        .tcn-sign-label-en,
        .tcn-sign-label-ar,
        .tcn-sign-stamp-en,
        .tcn-sign-stamp-ar {
            color: #1f72c1 !important;
        }

        .tcn-cell-label-en,
        .tcn-cell-label-ar {
            background: #d9d9d9 !important;
        }

        .tcn-party-table,
        .tcn-info-table,
        .tcn-lines-table,
        .tcn-totals-table,
        .tcn-words-table,
        .tcn-cnno-table {
            border: 1px solid #666 !important;
        }

        .tcn-party-table th,
        .tcn-party-table td,
        .tcn-info-table th,
        .tcn-info-table td,
        .tcn-lines-table th,
        .tcn-lines-table td,
        .tcn-totals-table td,
        .tcn-words-table td,
        .tcn-cnno-table td {
            border: 1px solid #999 !important;
        }

        .avoid-page-break {
            page-break-inside: avoid;
            break-inside: avoid;
        }
    }
</style>
