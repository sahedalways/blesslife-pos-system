<div class="col-md-4 tw-mb-5 {{ $package->interval }} tw-relative price_card pps-card-wrapper">

    <style>
        /* ===== PRICING CARD WRAPPER ===== */
        .pps-card-wrapper {
            font-family: var(--text-font, 'Poppins', sans-serif);
            padding: 15px;
        }

        .pps-card-wrapper .pps-pkg-card {
            position: relative;
            background: #ffffff;
            border-radius: 24px;
            padding: 38px 40px;
            border: 2px solid rgba(0, 128, 0, 0.08);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.45s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex;
            flex-direction: column;
            gap: 22px;
            overflow: hidden;
            height: 100%;
            cursor: pointer;
        }

        /* Top gradient accent */
        .pps-card-wrapper .pps-pkg-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #008000, #E58E24);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }

        /* Background decorative circle */
        .pps-card-wrapper .pps-pkg-card::after {
            content: '';
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(0, 128, 0, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            transition: all 0.5s ease;
            pointer-events: none;
        }

        .pps-card-wrapper .pps-pkg-card:hover {
            transform: translateY(-12px);
            border-color: rgba(0, 128, 0, 0.25);
            box-shadow: 0 30px 60px rgba(0, 128, 0, 0.15);
        }

        .pps-card-wrapper .pps-pkg-card:hover::before {
            transform: scaleX(1);
        }

        .pps-card-wrapper .pps-pkg-card:hover::after {
            background: radial-gradient(circle, rgba(229, 142, 36, 0.12) 0%, transparent 70%);
            transform: scale(1.4);
        }

        /* ===== POPULAR BADGE ===== */
        .pps-card-wrapper .pps-popular-badge {
            position: absolute;
            top: 18px;
            right: 18px;
            background: linear-gradient(135deg, #FFD700, #f39c12);
            color: #1F2937;
            padding: 7px 16px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            box-shadow: 0 6px 18px rgba(255, 215, 0, 0.4);
            z-index: 3;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            animation: ppsBadgeFloat 2.5s ease-in-out infinite;
        }

        @keyframes ppsBadgeFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-4px);
            }
        }

        .pps-card-wrapper .pps-popular-badge::before {
            content: '\f005';
            font-family: 'Font Awesome 6 Free', 'FontAwesome';
            font-weight: 900;
            color: #1F2937;
            font-size: 0.75rem;
        }

        /* ===== HEADER SECTION ===== */
        .pps-card-wrapper .pps-pkg-header {
            text-align: center;
            position: relative;
            z-index: 2;
            padding-bottom: 22px;
            border-bottom: 1px dashed rgba(0, 128, 0, 0.2);
        }

        .pps-card-wrapper .pps-pkg-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.1), rgba(229, 142, 36, 0.1));
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: #008000;
            margin: 0 auto 18px;
            transition: all 0.4s ease;
            border: 2px solid rgba(0, 128, 0, 0.15);
        }

        .pps-card-wrapper .pps-pkg-card:hover .pps-pkg-icon {
            transform: rotate(-10deg) scale(1.1);
            background: linear-gradient(135deg, #008000, #E58E24);
            color: #ffffff;
            border-color: transparent;
            box-shadow: 0 10px 25px rgba(0, 128, 0, 0.3);
        }

        .pps-card-wrapper .pps-pkg-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 14px;
            letter-spacing: -0.5px;
        }

        .pps-card-wrapper .pps-pkg-price {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #008000, #E58E24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        .pps-card-wrapper .pps-pkg-price .display_currency {
            font-size: inherit;
            font-weight: inherit;
        }

        .pps-card-wrapper .pps-pkg-desc {
            font-size: 0.88rem;
            color: #6B7280;
            line-height: 1.55;
            margin: 0;
        }

        /* ===== FEATURES LIST ===== */
        .pps-card-wrapper .pps-pkg-features {
            display: flex;
            flex-direction: column;
            gap: 12px;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .pps-card-wrapper .pps-pkg-features .pps-feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #4B5563;
            font-size: 0.92rem;
            line-height: 1.45;
            padding: 4px 0;
            transition: transform 0.3s ease;
        }

        .pps-card-wrapper .pps-pkg-card:hover .pps-feature-item {
            transform: translateX(4px);
        }

        .pps-card-wrapper .pps-pkg-features .pps-feature-item i.fa-check {
            flex-shrink: 0;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.15), rgba(229, 142, 36, 0.15));
            color: #008000;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.65rem;
            transition: all 0.3s ease;
        }

        .pps-card-wrapper .pps-pkg-card:hover .pps-feature-item i.fa-check {
            background: linear-gradient(135deg, #008000, #E58E24);
            color: #ffffff;
            transform: scale(1.1);
        }

        /* ===== CTA BUTTON ===== */
        .pps-card-wrapper .pps-pkg-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 24px;
            background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
            color: #ffffff !important;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            z-index: 2;
            box-shadow: 0 10px 25px rgba(0, 128, 0, 0.25);
            height: auto;
            min-height: 50px;
            width: 100%;
            text-align: center;
        }

        .pps-card-wrapper .pps-pkg-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(229, 142, 36, 0.4);
            color: #ffffff !important;
            background: linear-gradient(135deg, #E58E24 0%, #008000 100%);
        }

        .pps-card-wrapper .pps-pkg-btn::after {
            content: '\f061';
            font-family: 'Font Awesome 6 Free', 'FontAwesome';
            font-weight: 900;
            transition: transform 0.3s ease;
            margin-left: 4px;
            font-size: 0.85rem;
        }

        .pps-card-wrapper .pps-pkg-btn:hover::after {
            transform: translateX(5px);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 767px) {
            .pps-card-wrapper {
                padding: 10px;
            }

            .pps-card-wrapper .pps-pkg-card {
                padding: 30px 22px;
            }

            .pps-card-wrapper .pps-pkg-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .pps-card-wrapper .pps-pkg-name {
                font-size: 1.2rem;
            }

            .pps-card-wrapper .pps-pkg-price {
                font-size: 1.65rem;
            }
        }
    </style>

    <div class="pps-pkg-card">

        @if ($package->mark_package_as_popular == 1)
            <div class="pps-popular-badge">
                @lang('superadmin::lang.popular')
            </div>
        @endif

        <!-- Header Section -->
        <div class="pps-pkg-header">

            <div class="pps-pkg-icon">
                <i class="fas fa-gem"></i>
            </div>

            <h2 class="pps-pkg-name">{{ $package->name }}</h2>

            <h3 class="pps-pkg-price">
                @php
                    $interval_type = !empty($intervals[$package->interval])
                        ? $intervals[$package->interval]
                        : __('lang_v1.' . $package->interval);
                @endphp
                @if ($package->price != 0)
                    <span class="display_currency"
                          data-use_page_currency="true"
                          data-currency_symbol="true">
                        {{ $package->price }}
                    </span>
                    / {{ $package->interval_count }} {{ $interval_type }}
                @else
                    @lang('superadmin::lang.free_for_duration', ['duration' => $package->interval_count . ' ' . $interval_type])
                @endif
            </h3>

            <p class="pps-pkg-desc">{{ $package->description }}</p>
        </div>

        <!-- Features -->
        <div class="pps-pkg-features">
            <div class="pps-feature-item">
                <i class="fa fa-check"></i>
                @if ($package->location_count == 0)
                    @lang('superadmin::lang.unlimited')
                @else
                    {{ $package->location_count }}
                @endif
                @lang('business.business_locations')
            </div>
            <div class="pps-feature-item">
                <i class="fa fa-check"></i>
                @if ($package->user_count == 0)
                    @lang('superadmin::lang.unlimited')
                @else
                    {{ $package->user_count }}
                @endif
                @lang('superadmin::lang.users')
            </div>
            <div class="pps-feature-item">
                <i class="fa fa-check"></i>
                @if ($package->product_count == 0)
                    @lang('superadmin::lang.unlimited')
                @else
                    {{ $package->product_count }}
                @endif
                @lang('superadmin::lang.products')
            </div>
            <div class="pps-feature-item">
                <i class="fa fa-check"></i>
                @if ($package->invoice_count == 0)
                    @lang('superadmin::lang.unlimited')
                @else
                    {{ $package->invoice_count }}
                @endif
                @lang('superadmin::lang.invoices')
            </div>

            @if (!empty($package->custom_permissions))
                @foreach ($package->custom_permissions as $permission => $value)
                    @isset($permission_formatted[$permission])
                        <div class="pps-feature-item">
                            <i class="fa fa-check"></i>
                            {{ $permission_formatted[$permission] }}
                        </div>
                    @endisset
                @endforeach
            @endif

            @if ($package->trial_days != 0)
                <div class="pps-feature-item">
                    <i class="fa fa-check"></i>
                    {{ $package->trial_days }} @lang('superadmin::lang.trial_days')
                </div>
            @endif
        </div>

        <!-- CTA Button -->
        @if ($package->enable_custom_link == 1)
            <a href="{{ $package->custom_link }}"
               class="pps-pkg-btn">
                {{ $package->custom_link_text }}
            </a>
        @else
            @if (isset($action_type) && $action_type == 'register')
                <a href="{{ route('business.getRegister') }}?package={{ $package->id }}"
                   class="pps-pkg-btn">
                    @if ($package->price != 0)
                        @lang('superadmin::lang.register_subscribe')
                    @else
                        @lang('superadmin::lang.register_free')
                    @endif
                </a>
            @else
                <a href="{{ action([\Modules\Superadmin\Http\Controllers\SubscriptionController::class, 'pay'], [$package->id]) }}"
                   class="pps-pkg-btn">
                    @if ($package->price != 0)
                        @lang('superadmin::lang.pay_and_subscribe')
                    @else
                        @lang('superadmin::lang.subscribe')
                    @endif
                </a>
            @endif
        @endif
    </div>
</div>
