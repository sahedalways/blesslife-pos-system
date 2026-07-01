@inject('request', 'Illuminate\Http\Request')
<!-- Main Header -->

<style>
    /* ===== PREMIUM HEADER THEME ===== */
    #premium-main-header {
        background: linear-gradient(180deg, #1a5c4a 0%, #114133 100%);
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        height: 70px;
        position: relative;
        z-index: 50;
    }

    /* Inner Container */
    #premium-main-header .premium-header-inner {
        max-width: 100%;
        height: 100%;
        padding: 0 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* ===== BUTTONS & LINKS ===== */
    #premium-main-header .premium-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 8px 14px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #e0e0e0 !important;
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    #premium-main-header .premium-btn svg {
        stroke: #e0e0e0 !important;
        width: 20px;
        height: 20px;
        transition: transform 0.3s ease;
    }

    #premium-main-header .premium-btn:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.25);
        color: #ffffff !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    #premium-main-header .premium-btn:hover svg {
        transform: scale(1.1);
        stroke: #ffffff !important;
    }

    /* Special Primary Button (POS) */
    #premium-main-header .premium-btn-primary {
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff !important;
        border: 1px solid rgba(255, 255, 255, 0.25);
        font-weight: 600;
    }

    #premium-main-header .premium-btn-primary svg {
        stroke: #ffffff !important;
    }

    #premium-main-header .premium-btn-primary:hover {
        background: rgba(255, 255, 255, 0.25);
        color: #ffffff !important;
        border-color: rgba(255, 255, 255, 0.4);
    }

    #premium-main-header .premium-btn-primary:hover svg {
        stroke: #ffffff !important;
    }

    /* ===== SIDEBAR TOGGLES ===== */
    #premium-main-header .sidebar-toggle-group {
        display: flex;
        gap: 10px;
    }

    /* ===== DROPDOWNS (Details/Summary) ===== */
    #premium-main-header details.premium-dropdown {
        position: relative;
    }

    #premium-main-header summary.premium-dropdown-trigger {
        list-style: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #e0e0e0 !important;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    #premium-main-header summary.premium-dropdown-trigger::-webkit-details-marker {
        display: none;
    }

    #premium-main-header summary.premium-dropdown-trigger:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.25);
    }

    #premium-main-header summary.premium-dropdown-trigger svg {
        stroke: #e0e0e0 !important;
        width: 20px;
        height: 20px;
    }

    /* Dropdown Menu Content */
    #premium-main-header .premium-dropdown-menu {
        position: absolute;
        top: 110%;
        right: 0;
        width: 220px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 10px;
        display: none;
        z-index: 100;
        animation: slideDown 0.2s ease-out;
    }

    #premium-main-header details[open] .premium-dropdown-menu {
        display: block;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #premium-main-header .premium-dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        color: #333;
        text-decoration: none;
        border-radius: 8px;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        margin-bottom: 4px;
    }

    #premium-main-header .premium-dropdown-item:hover {
        background: #f0f7f0;
        color: #114133;
    }

    #premium-main-header .premium-dropdown-item svg {
        stroke: #114133;
        width: 18px;
        height: 18px;
        opacity: 0.7;
    }

    #premium-main-header .premium-dropdown-item:hover svg {
        opacity: 1;
        stroke: #008000;
    }

    /* User Info in Dropdown */
    #premium-main-header .premium-user-info {
        padding: 12px;
        border-bottom: 1px solid #eee;
        margin-bottom: 8px;
    }

    #premium-main-header .premium-user-info p {
        margin: 0;
        font-size: 0.8rem;
        color: #666;
    }

    #premium-main-header .premium-user-info strong {
        font-size: 0.95rem;
        color: #114133;
        display: block;
        margin-top: 4px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        #premium-main-header {
            height: auto;
            min-height: 56px;
        }

        #premium-main-header .premium-header-inner {
            padding: 6px 10px;
            flex-wrap: wrap;
            gap: 6px;
        }

        #premium-main-header .premium-btn span:not(.sr-only) {
            display: none;
        }

        #premium-main-header .premium-btn {
            padding: 6px 8px;
            font-size: 0.8rem;
            gap: 4px;
        }

        #premium-main-header .premium-btn svg {
            width: 18px;
            height: 18px;
        }

        #premium-main-header summary.premium-dropdown-trigger {
            padding: 6px 8px;
        }

        #premium-main-header summary.premium-dropdown-trigger span {
            display: none;
        }

        #premium-main-header summary.premium-dropdown-trigger svg {
            width: 18px;
            height: 18px;
        }

        #premium-main-header .sidebar-toggle-group {
            gap: 6px;
        }

        #premium-main-header [style*="display: flex; align-items: center; gap: 10px"] {
            gap: 6px !important;
        }

        #premium-main-header .premium-dropdown-menu {
            width: 200px;
            right: -10px;
        }
    }
</style>

<div id="premium-main-header"
     class="no-print">
    <div class="premium-header-inner">

        <!-- Left Side: Sidebar Toggles -->
        <div class="sidebar-toggle-group">

            <button type="button"
                    class="premium-btn side-bar-collapse tw-inline-flex">
                <span class="tw-sr-only">Collapse Sidebar</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     fill="none"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none"
                          d="M0 0h24v24H0z"
                          fill="none" />
                    <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                    <path d="M15 4v16" />
                    <path d="M10 10l-2 2l2 2" />
                </svg>
            </button>
        </div>

        {{-- Showing active package for SaaS Superadmin --}}
        @if (Module::has('Superadmin'))
            <div style="color: #e0e0e0; font-size: 0.85rem; font-weight: 600;">
                @includeIf('superadmin::layouts.partials.active_subscription')
            </div>
        @endif

        {{-- When using superadmin, this button is used to switch users --}}
        @if (!empty(session('previous_user_id')) && !empty(session('previous_username')))
            <a href="{{ route('sign-in-as-user', session('previous_user_id')) }}"
               class="premium-btn"
               style="background: rgba(220, 38, 38, 0.2); border-color: rgba(220, 38, 38, 0.4); color: #fca5a5 !important;">
                <svg style="width: 16px; height: 16px; stroke: #fca5a5 !important;"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    <path d="M9 14L4 9l5-5" />
                    <path d="M4 9h10.5a5.5 5.5 0 0 1 5.5 5.5v0a5.5 5.5 0 0 1-5.5 5.5H11" />
                </svg>
                <span style="font-size: 0.8rem;">@lang('lang_v1.back_to_username', ['username' => session('previous_username')])</span>
            </a>
        @endif

        <!-- Right Side: Tools & User -->
        <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap; justify-content: flex-end;">

            @if (Module::has('Essentials'))
                @includeIf('essentials::layouts.partials.header_part')
            @endif

            <!-- Quick Actions Dropdown -->
            <details class="premium-dropdown">
                <summary class="premium-dropdown-trigger">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none"
                              d="M0 0h24v24H0z"
                              fill="none" />
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M9 12h6" />
                        <path d="M12 9v6" />
                    </svg>
                </summary>
                <ul class="premium-dropdown-menu"
                    role="menu">
                    <div style="display: flex; flex-direction: column; gap: 4px;"
                         role="none">
                        <a href="{{ route('calendar') }}"
                           class="premium-dropdown-item"
                           role="menuitem">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24"
                                 stroke-width="2"
                                 stroke="currentColor"
                                 fill="none"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path stroke="none"
                                      d="M0 0h24v24H0z"
                                      fill="none" />
                                <rect x="4"
                                      y="5"
                                      width="16"
                                      height="16"
                                      rx="2" />
                                <line x1="16"
                                      y1="3"
                                      x2="16"
                                      y2="7" />
                                <line x1="8"
                                      y1="3"
                                      x2="8"
                                      y2="7" />
                                <line x1="4"
                                      y1="11"
                                      x2="20"
                                      y2="11" />
                                <line x1="11"
                                      y1="15"
                                      x2="12"
                                      y2="15" />
                                <line x1="12"
                                      y1="15"
                                      x2="12"
                                      y2="18" />
                            </svg>
                            @lang('lang_v1.calendar')
                        </a>
                        @if (Module::has('Essentials'))
                            <a href="#"
                               data-href="{{ action([\Modules\Essentials\Http\Controllers\ToDoController::class, 'create']) }}"
                               data-container="#task_modal"
                               class="premium-dropdown-item btn-modal"
                               role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.75"
                                     stroke="currentColor"
                                     fill="none"
                                     stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path stroke="none"
                                          d="M0 0h24v24H0z"
                                          fill="none" />
                                    <path
                                          d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                    <path d="M9 12l2 2l4 -4" />
                                </svg>
                                @lang('essentials::lang.add_to_do')
                            </a>
                        @endif
                        @if (auth()->user()->hasRole('Admin#' . auth()->user()->business_id))
                            <a href="#"
                               id="start_tour"
                               class="premium-dropdown-item"
                               role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.75"
                                     stroke="currentColor"
                                     fill="none"
                                     stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path stroke="none"
                                          d="M0 0h24v24H0z"
                                          fill="none" />
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path d="M12 17l0 .01" />
                                    <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                                </svg>
                                @lang('lang_v1.application_tour')
                            </a>
                        @endif
                    </div>
                </ul>
            </details>

            <!-- Calculator -->
            <button id="btnCalculator"
                    title="@lang('lang_v1.calculator')"
                    data-content='@include('layouts.partials.calculator')'
                    type="button"
                    data-trigger="click"
                    data-html="true"
                    data-placement="bottom"
                    class="premium-btn tw-hidden md:tw-inline-flex">
                <span class="tw-sr-only">Calculator</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     fill="none"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none"
                          d="M0 0h24v24H0z"
                          fill="none" />
                    <path d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                    <path d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                    <path d="M8 14l0 .01" />
                    <path d="M12 14l0 .01" />
                    <path d="M16 14l0 .01" />
                    <path d="M8 17l0 .01" />
                    <path d="M12 17l0 .01" />
                    <path d="M16 17l0 .01" />
                </svg>
            </button>

            <!-- POS Sale -->
            @if (in_array('pos_sale', $enabled_modules))
                @can('sell.create')
                    <a href="{{ action([\App\Http\Controllers\SellPosController::class, 'create']) }}"
                       class="premium-btn premium-btn-primary sm:tw-inline-flex">
                        <svg class="tw-hidden md:tw-block"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             fill="none"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none"
                                  d="M0 0h24v24H0z"
                                  fill="none" />
                            <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                            <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                            <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                            <path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                        </svg>
                        <span>@lang('sale.pos_sale')</span>
                    </a>
                @endcan
            @endif

            @if (Module::has('Repair'))
                @includeIf('repair::layouts.partials.header')
            @endif

            <!-- Today's Profit -->
            @can('profit_loss_report.view')
                <button type="button"
                        id="view_todays_profit"
                        title="{{ __('home.todays_profit') }}"
                        data-toggle="tooltip"
                        data-placement="bottom"
                        class="premium-btn tw-hidden sm:tw-inline-flex">
                    <span class="tw-sr-only">Today's Profit</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none"
                              d="M0 0h24v24H0z"
                              fill="none" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M3 6m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                        <path d="M18 12l.01 0" />
                        <path d="M6 12l.01 0" />
                    </svg>
                </button>
            @endcan

            <!-- Date Display -->
            <button type="button"
                    class="premium-btn tw-hidden md:tw-inline-flex"
                    style="font-family: monospace; letter-spacing: 1px;">
                {{ @format_date('now') }}
            </button>

            @include('layouts.partials.header-notifications')

            <!-- User Profile Dropdown -->
            <details class="premium-dropdown">
                <summary class="premium-dropdown-trigger"
                         data-toggle="popover">
                    <span class="tw-hidden md:tw-block">{{ Auth::User()->first_name }}
                        {{ Auth::User()->last_name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none"
                              d="M0 0h24v24H0z"
                              fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                </summary>

                <ul class="premium-dropdown-menu"
                    role="menu">
                    <div class="premium-user-info"
                         role="none">
                        <p>@lang('lang_v1.signed_in_as')</p>
                        <strong>{{ Auth::User()->first_name }} {{ Auth::User()->last_name }}</strong>
                    </div>

                    <li>
                        <a href="{{ action([\App\Http\Controllers\UserController::class, 'getProfile']) }}"
                           class="premium-dropdown-item"
                           role="menuitem">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.75"
                                 stroke="currentColor"
                                 fill="none"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path stroke="none"
                                      d="M0 0h24v24H0z"
                                      fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                            </svg>
                            @lang('lang_v1.profile')
                        </a>
                    </li>
                    <li>
                        <a href="{{ action([\App\Http\Controllers\Auth\LoginController::class, 'logout']) }}"
                           class="premium-dropdown-item"
                           role="menuitem"
                           style="color: #dc2626 !important;">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.75"
                                 stroke="currentColor"
                                 fill="none"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path stroke="none"
                                      d="M0 0h24v24H0z"
                                      fill="none" />
                                <path
                                      d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
                            </svg>
                            @lang('lang_v1.sign_out')
                        </a>
                    </li>
                </ul>
            </details>
        </div>
    </div>
</div>
