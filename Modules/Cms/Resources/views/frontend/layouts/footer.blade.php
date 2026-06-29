<!------------------------------>
<!--Footer---------------->
<!------------------------------>
<footer class="footer-section">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- About Us -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <h5 class="footer-title">About Us</h5>
                    <div class="footer-title-bar"></div>
                    <p class="footer-about-text">
                        Bless Life POS is a modern business management and Point of Sale (POS) software developed by
                        Enostation IT, based in Riyadh, Saudi Arabia. We provide innovative software solutions,
                        including POS, ERP, inventory management, accounting, and custom business applications to help
                        organizations grow with confidence.
                    </p>
                </div>

                <!-- Pages -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <h5 class="footer-title">Pages</h5>
                    <div class="footer-title-bar"></div>
                    <ul class="list-unstyled footer-links">
                        <li><a href="{{ url('/faq') }}"><i class="fas fa-angle-right me-2"></i>FAQ</a></li>
                        <li><a href="{{ url('/terms-and-conditions') }}"><i class="fas fa-angle-right me-2"></i>Terms
                                &amp; Conditions</a></li>
                        <li><a href="{{ url('/privacy-policy') }}"><i class="fas fa-angle-right me-2"></i>Privacy
                                Policy</a></li>
                        <li><a href="{{ url('/return-and-refund-policy') }}"><i
                                   class="fas fa-angle-right me-2"></i>Return and Refund Policy</a></li>
                    </ul>
                </div>

                <!-- Contacts -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <h5 class="footer-title">Contacts</h5>
                    <div class="footer-title-bar"></div>

                    <ul class="list-unstyled footer-contacts">
                        <li>
                            <span class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </span>
                            <a href="tel:+112242650">
                                +112242650
                            </a>
                        </li>

                        <li>
                            <span class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <a href="mailto:info@blesslifeltd.com">
                                info@blesslifeltd.com
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <h5 class="footer-title">Social Media</h5>
                    <div class="footer-title-bar"></div>
                    @if (isset($__site_details['follow_us']) && !empty($__site_details['follow_us']))
                        <ul class="list-unstyled social-icons d-flex flex-wrap">
                            @php
                                $icons = [
                                    'facebook' => 'fab fa-facebook-f',
                                    'instagram' => 'fab fa-instagram',
                                    'twitter' => 'fab fa-twitter',
                                    'linkedin' => 'fab fa-linkedin-in',
                                    'youtube' => 'fab fa-youtube',
                                    'github' => 'fab fa-github',
                                    'behance' => 'fab fa-behance',
                                ];
                            @endphp
                            @foreach ($__site_details['follow_us'] as $key => $follow_us)
                                @if (!empty($follow_us) && isset($icons[$key]))
                                    <li>
                                        <a href="{{ $follow_us }}"
                                           target="_blank"
                                           title="{{ ucfirst($key) }}">
                                            <i class="{{ $icons[$key] }}"></i>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif

                    <p class="newsletter-text mt-3">Stay connected with us for the latest updates and offers.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; {{ date('Y') }} <span
                              class="brand-name">{{ config('app.name', 'ultimatePOS') }}</span>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">
                        Designed & Developed with <i class="fas fa-heart heart-icon"></i> by
                        <a href="https://sahedahmed.netlify.app"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="brand-name">
                            Enostation IT
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* ===== Footer Wrapper ===== */
    .footer-section {
        position: relative;
        background: linear-gradient(135deg,
                #f7fcf8 0%,
                #f2faf4 45%,
                #fffaf3 100%);
        color: #1f2937;
        overflow: hidden;
    }

    /* Top Left Green Glow */
    .footer-section::before {
        content: "";
        position: absolute;
        top: -90px;
        left: -90px;
        width: 280px;
        height: 280px;
        background: radial-gradient(circle,
                rgba(21, 153, 71, 0.12) 0%,
                rgba(21, 153, 71, 0.06) 35%,
                transparent 75%);
        border-radius: 50%;
        z-index: 0;
    }

    /* Bottom Right Orange Glow */
    .footer-section::after {
        content: "";
        position: absolute;
        bottom: -100px;
        right: -100px;
        width: 320px;
        height: 320px;
        background: radial-gradient(circle,
                rgba(229, 142, 36, 0.12) 0%,
                rgba(229, 142, 36, 0.06) 35%,
                transparent 75%);
        border-radius: 50%;
        z-index: 0;
    }

    .footer-top {
        position: relative;
        z-index: 1;
        padding: 70px 0 30px 0;
    }

    /* ===== Section Titles ===== */
    .footer-title {
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        color: #1f2937;
        margin-bottom: 12px;
    }

    .footer-title-bar {
        width: 50px;
        height: 3px;
        /* Updated from purple to primary green */
        background: linear-gradient(90deg, #008000 0%, #E58E24 100%);
        border-radius: 10px;
        margin-bottom: 22px;
        position: relative;
    }

    .footer-title-bar::after {
        content: "";
        position: absolute;
        left: 55px;
        top: 0;
        width: 8px;
        height: 3px;
        background: #E58E24;
        border-radius: 10px;
    }

    /* ===== About Text ===== */
    .footer-about-text {
        font-size: 14px;
        line-height: 1.8;
        color: #4b5563;
    }

    /* ===== Footer Links ===== */
    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: #4b5563;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .footer-links a i {
        /* Updated from purple to primary green */
        color: #008000;
        transition: all 0.3s ease;
        font-size: 12px;
    }

    .footer-links a:hover {
        color: #E58E24;
        transform: translateX(5px);
    }

    .footer-links a:hover i {
        color: #E58E24;
    }

    /* ===== Footer Contacts ===== */
    .footer-contacts li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
        font-size: 14px;
        color: #4b5563;
        line-height: 1.6;
    }

    .footer-contacts a {
        color: #4b5563;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-contacts a:hover {
        /* Updated from purple to primary green */
        color: #008000;
    }

    .contact-icon {
        flex-shrink: 0;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        /* Updated gradient from purple/green to primary green/secondary orange */
        background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        font-size: 12px;
        /* Updated shadow from purple to green */
        box-shadow: 0 4px 10px rgba(0, 128, 0, 0.25);
    }

    /* ===== Social Icons ===== */
    .social-icons {
        gap: 10px;
    }

    .social-icons li a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #fff;
        /* Updated from purple to primary green */
        color: #008000;
        font-size: 15px;
        text-decoration: none;
        position: relative;
        transition: all 0.4s ease;
        /* Updated shadow/border from purple to green */
        box-shadow: 0 4px 12px rgba(0, 128, 0, 0.15);
        border: 1px solid rgba(0, 128, 0, 0.15);
    }

    .social-icons li a::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 50%;
        /* This matches your new theme: Green to Orange */
        background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 0;
    }

    .social-icons li a i {
        position: relative;
        z-index: 1;
        transition: color 0.4s ease;
    }

    .social-icons li a:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(229, 142, 36, 0.35);
        border-color: transparent;
    }

    .social-icons li a:hover::before {
        opacity: 1;
    }

    .social-icons li a:hover i {
        color: #fff;
    }

    .newsletter-text {
        font-size: 13px;
        color: #6b7280;
        line-height: 1.6;
    }

    /* ===== Footer Bottom Bar ===== */
    .footer-bottom {
        position: relative;
        z-index: 1;
        padding: 18px 0;
        color: #fff;
        font-size: 14px;
        overflow: hidden;

        background: linear-gradient(135deg,
                rgba(11, 93, 42, 0.92) 0%,
                rgba(21, 153, 71, 0.88) 60%,
                rgba(229, 142, 36, 0.82) 100%);

        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);

        border-top: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, .25),
            0 -8px 25px rgba(11, 93, 42, .15);
    }

    /* Glossy Shine */
    .footer-bottom::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg,
                rgba(255, 255, 255, .28) 0%,
                rgba(255, 255, 255, .12) 25%,
                transparent 60%);
        pointer-events: none;
    }

    /* Soft Orange Glow */
    .footer-bottom::after {
        content: "";
        position: absolute;
        right: -80px;
        top: -60px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: radial-gradient(circle,
                rgba(229, 142, 36, .18) 0%,
                transparent 70%);
        pointer-events: none;
    }

    .footer-bottom p {
        color: #fff;
    }

    .brand-name {
        font-weight: 700;
        color: #fff;
    }

    .heart-icon {
        color: #ffdcdc;
        animation: heartbeat 1.4s ease-in-out infinite;
    }

    @keyframes heartbeat {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.25);
        }
    }

    /* ===== Responsive ===== */
    @media (max-width: 767px) {
        .footer-top {
            padding: 50px 0 10px 0;
        }

        .footer-title-bar {
            margin-bottom: 18px;
        }

        .footer-bottom {
            text-align: center;
        }

        .footer-bottom .col-md-6:last-child {
            margin-top: 8px;
        }
    }
</style>
