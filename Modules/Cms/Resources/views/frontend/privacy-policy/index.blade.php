@extends('cms::frontend.layouts.app')
@section('title', 'Privacy Policy')
@php
    $navbar_btn['text'] = 'Try For Free';
    $navbar_btn['link'] = route('business.getRegister');
    $navbar_btn['drop_down_text'] = 'Pages';
    if (
        isset($__site_details['btns']) &&
        isset($__site_details['btns']['navbar']) &&
        !empty($__site_details['btns']['navbar']['text'])
    ) {
        $navbar_btn['text'] = $__site_details['btns']['navbar']['text'] ?? 'Try For Free';
    }
    if (
        isset($__site_details['btns']) &&
        isset($__site_details['btns']['navbar']) &&
        !empty($__site_details['btns']['navbar']['link'])
    ) {
        $navbar_btn['link'] = $__site_details['btns']['navbar']['link'] ?? route('business.getRegister');
    }
    if (
        isset($__site_details['btns']) &&
        isset($__site_details['btns']['navbar']) &&
        !empty($__site_details['btns']['navbar']['drop_down_text'])
    ) {
        $navbar_btn['drop_down_text'] = $__site_details['btns']['navbar']['drop_down_text'] ?? 'Pages';
    }
@endphp
@includeIf('cms::frontend.layouts.home_header')

<x-hero heroImage="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=1600&q=80"
        heroSubtitle="Privacy"
        heroTitle="Privacy Policy"
        description="Learn how we collect, use, and protect your personal information." />

@section('content')

    <section id="pro-terms-section"
             class="pro-terms-wrapper">

        <style>
            /* ===== MAIN WRAPPER ===== */
            #pro-terms-section {
                position: relative;
                padding: 5rem 0 6rem;
                font-family: var(--text-font, 'Poppins', sans-serif);
            }

            /* Decorative Backgrounds */
            #pro-terms-section::before {
                content: '';
                position: absolute;
                top: 80px;
                left: -150px;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle, rgba(0, 128, 0, 0.06) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
            }

            #pro-terms-section::after {
                content: '';
                position: absolute;
                bottom: 100px;
                right: -120px;
                width: 350px;
                height: 350px;
                background: radial-gradient(circle, rgba(229, 142, 36, 0.06) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
            }

            /* ===== CONTAINER ===== */
            #pro-terms-section .pts-container {
                position: relative;
                z-index: 2;
                max-width: 1640px;
                margin: 0 auto;
                padding: 0 20px;
            }

            /* ===== INFO BAR ===== */
            #pro-terms-section .pts-info-bar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 16px;
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.05), rgba(229, 142, 36, 0.05));
                border: 1px solid rgba(0, 128, 0, 0.15);
                border-radius: 16px;
                padding: 18px 26px;
                margin-bottom: 35px;
            }

            #pro-terms-section .pts-info-item {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                font-size: 0.88rem;
                color: #4B5563;
                font-weight: 500;
            }

            #pro-terms-section .pts-info-item i {
                width: 36px;
                height: 36px;
                border-radius: 50%;
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.9rem;
                box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
            }

            #pro-terms-section .pts-info-item strong {
                color: #1F2937;
                font-weight: 700;
            }

            /* ===== GRID LAYOUT ===== */
            #pro-terms-section .pts-grid {
                display: grid;
                grid-template-columns: 280px 1fr;
                gap: 35px;
                align-items: start;
            }

            @media (max-width: 991px) {
                #pro-terms-section .pts-grid {
                    grid-template-columns: 1fr;
                    gap: 25px;
                }
            }

            /* ===== SIDEBAR / TABLE OF CONTENTS ===== */
            #pro-terms-section .pts-sidebar {
                background: #ffffff;
                border-radius: 20px;
                padding: 25px 20px;
                border: 1px solid rgba(0, 128, 0, 0.1);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                position: sticky;
                top: 100px;
                max-height: calc(100vh - 120px);
                overflow-y: auto;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            #pro-terms-section .pts-sidebar::-webkit-scrollbar {
                display: none;
            }

            @media (max-width: 991px) {
                #pro-terms-section .pts-sidebar {
                    position: relative;
                    top: auto;
                    max-height: none;
                }
            }

            #pro-terms-section .pts-sidebar-title {
                font-size: 0.78rem;
                font-weight: 800;
                color: #008000;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                margin: 0 0 16px 0;
                padding-bottom: 12px;
                border-bottom: 2px dashed rgba(0, 128, 0, 0.15);
                display: flex;
                align-items: center;
                gap: 8px;
            }

            #pro-terms-section .pts-toc-list {
                list-style: none;
                padding: 0;
                margin: 0;
                max-height: 500px;
                overflow-y: auto;
            }

            #pro-terms-section .pts-toc-list::-webkit-scrollbar {
                display: none;
            }

            #pro-terms-section .pts-toc-list {
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            #pro-terms-section .pts-toc-list li {
                margin-bottom: 4px;
            }

            #pro-terms-section .pts-toc-list a {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 9px 12px;
                border-radius: 10px;
                color: #4B5563;
                font-size: 0.85rem;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            #pro-terms-section .pts-toc-list a:hover,
            #pro-terms-section .pts-toc-list a.active {
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.08), rgba(229, 142, 36, 0.08));
                color: #008000;
                font-weight: 600;
                transform: translateX(4px);
            }

            #pro-terms-section .pts-toc-list a .pts-toc-num {
                min-width: 22px;
                height: 22px;
                border-radius: 6px;
                background: rgba(0, 128, 0, 0.1);
                color: #008000;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.7rem;
                font-weight: 700;
                flex-shrink: 0;
            }

            #pro-terms-section .pts-toc-list a:hover .pts-toc-num,
            #pro-terms-section .pts-toc-list a.active .pts-toc-num {
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
            }

            /* ===== MAIN CONTENT ===== */
            #pro-terms-section .pts-content {
                background: #ffffff;
                border-radius: 24px;
                padding: 45px 50px;
                border: 1px solid rgba(0, 128, 0, 0.1);
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.06);
                position: relative;
                overflow: hidden;
            }

            /* Top accent line */
            #pro-terms-section .pts-content::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 5px;
                background: linear-gradient(90deg, #008000, #E58E24, #008000);
                background-size: 200% 100%;
                animation: ptsGradientShift 4s linear infinite;
            }

            @keyframes ptsGradientShift {
                0% {
                    background-position: 0% 50%;
                }

                100% {
                    background-position: 200% 50%;
                }
            }

            /* Intro Box */
            #pro-terms-section .pts-intro {
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.06), rgba(229, 142, 36, 0.06));
                border-left: 5px solid #008000;
                border-radius: 14px;
                padding: 24px 26px;
                margin-bottom: 35px;
            }

            #pro-terms-section .pts-intro p {
                margin: 0;
                font-size: 1.02rem;
                color: #1F2937;
                line-height: 1.75;
                font-weight: 500;
            }

            /* Section */
            #pro-terms-section .pts-section {
                margin-bottom: 38px;
                scroll-margin-top: 100px;
            }

            #pro-terms-section .pts-section:last-child {
                margin-bottom: 0;
            }

            #pro-terms-section .pts-section-title {
                display: flex;
                align-items: center;
                gap: 14px;
                font-size: 1.45rem;
                font-weight: 700;
                color: #1F2937;
                margin: 0 0 20px 0;
                padding-bottom: 14px;
                border-bottom: 2px solid rgba(0, 128, 0, 0.1);
                position: relative;
            }

            #pro-terms-section .pts-section-title::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 70px;
                height: 2px;
                background: linear-gradient(90deg, #008000, #E58E24);
            }

            #pro-terms-section .pts-section-num {
                min-width: 42px;
                height: 42px;
                border-radius: 12px;
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.95rem;
                font-weight: 800;
                box-shadow: 0 6px 18px rgba(0, 128, 0, 0.25);
                flex-shrink: 0;
            }

            #pro-terms-section .pts-section p {
                font-size: 0.98rem;
                color: #4B5563;
                line-height: 1.8;
                margin-bottom: 14px;
            }

            #pro-terms-section .pts-section p:last-child {
                margin-bottom: 0;
            }

            #pro-terms-section .pts-section strong {
                color: #1F2937;
                font-weight: 700;
            }

            #pro-terms-section .pts-section em {
                color: #008000;
                font-style: italic;
                font-weight: 500;
            }

            /* Data Type Cards Grid */
            #pro-terms-section .pts-data-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
                margin: 18px 0;
            }

            @media (max-width: 575px) {
                #pro-terms-section .pts-data-grid {
                    grid-template-columns: 1fr;
                }
            }

            #pro-terms-section .pts-data-card {
                padding: 22px 20px;
                border-radius: 16px;
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.06), rgba(229, 142, 36, 0.04));
                border: 1px solid rgba(0, 128, 0, 0.15);
                transition: all 0.4s ease;
            }

            #pro-terms-section .pts-data-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 128, 0, 0.1);
            }

            #pro-terms-section .pts-data-card h4 {
                display: flex;
                align-items: center;
                gap: 10px;
                font-size: 1.05rem;
                font-weight: 700;
                color: #008000;
                margin: 0 0 12px 0;
            }

            #pro-terms-section .pts-data-card h4::before {
                content: '\f0c1';
                font-family: 'Font Awesome 6 Free', 'FontAwesome';
                font-weight: 900;
                width: 30px;
                height: 30px;
                border-radius: 8px;
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.8rem;
            }

            #pro-terms-section .pts-data-card ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            #pro-terms-section .pts-data-card ul li {
                padding: 5px 0 5px 18px;
                font-size: 0.88rem;
                color: #4B5563;
                position: relative;
            }

            #pro-terms-section .pts-data-card ul li::before {
                content: '\f105';
                font-family: 'Font Awesome 6 Free', 'FontAwesome';
                font-weight: 900;
                position: absolute;
                left: 0;
                top: 5px;
                color: #E58E24;
            }

            /* Custom List */
            #pro-terms-section .pts-feature-list {
                list-style: none;
                padding: 0;
                margin: 14px 0;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            @media (max-width: 575px) {
                #pro-terms-section .pts-feature-list {
                    grid-template-columns: 1fr;
                }
            }

            #pro-terms-section .pts-feature-list li {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 10px 14px;
                background: #f9fafb;
                border-radius: 10px;
                border: 1px solid rgba(0, 128, 0, 0.08);
                font-size: 0.9rem;
                color: #4B5563;
                transition: all 0.3s ease;
            }

            #pro-terms-section .pts-feature-list li:hover {
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.05), rgba(229, 142, 36, 0.05));
                border-color: rgba(0, 128, 0, 0.2);
                transform: translateX(3px);
            }

            #pro-terms-section .pts-feature-list li::before {
                content: '\f00c';
                font-family: 'Font Awesome 6 Free', 'FontAwesome';
                font-weight: 900;
                width: 22px;
                height: 22px;
                border-radius: 50%;
                background: linear-gradient(135deg, #008000, #E58E24);
                color: #ffffff;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.65rem;
                flex-shrink: 0;
            }

            /* Bulleted List */
            #pro-terms-section .pts-bullet-list {
                list-style: none;
                padding: 0;
                margin: 14px 0;
            }

            #pro-terms-section .pts-bullet-list li {
                position: relative;
                padding: 8px 0 8px 28px;
                font-size: 0.95rem;
                color: #4B5563;
                line-height: 1.6;
            }

            #pro-terms-section .pts-bullet-list li::before {
                content: '';
                position: absolute;
                top: 16px;
                left: 0;
                width: 16px;
                height: 2px;
                background: linear-gradient(90deg, #008000, #E58E24);
                border-radius: 2px;
            }

            /* Highlight Note Box */
            #pro-terms-section .pts-note-box {
                display: flex;
                align-items: flex-start;
                gap: 14px;
                padding: 18px 22px;
                background: linear-gradient(135deg, rgba(255, 193, 7, 0.08), rgba(229, 142, 36, 0.08));
                border-left: 5px solid #E58E24;
                border-radius: 12px;
                margin: 16px 0;
            }

            #pro-terms-section .pts-note-box i {
                color: #E58E24;
                font-size: 1.4rem;
                margin-top: 2px;
                flex-shrink: 0;
            }

            #pro-terms-section .pts-note-box .pts-note-text {
                font-size: 0.92rem;
                color: #1F2937;
                line-height: 1.65;
                font-weight: 500;
                margin: 0;
            }

            /* ===== CONTACT CARD ===== */
            #pro-terms-section .pts-contact-card {
                background: linear-gradient(135deg, #008000 0%, #2d5016 60%, #E58E24 100%);
                color: #ffffff;
                border-radius: 20px;
                padding: 30px 26px;
                margin-top: 24px;
                position: relative;
                overflow: hidden;
            }

            #pro-terms-section .pts-contact-card::before {
                content: '';
                position: absolute;
                top: -50px;
                right: -50px;
                width: 200px;
                height: 200px;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.12) 0%, transparent 70%);
                border-radius: 50%;
            }

            #pro-terms-section .pts-contact-card h3 {
                font-size: 1.3rem;
                font-weight: 700;
                margin: 0 0 6px 0;
                position: relative;
                z-index: 2;
            }

            #pro-terms-section .pts-contact-card p {
                font-size: 0.88rem;
                opacity: 0.9;
                margin: 0 0 18px 0;
                position: relative;
                z-index: 2;
            }

            #pro-terms-section .pts-contact-list {
                list-style: none;
                padding: 0;
                margin: 0;
                position: relative;
                z-index: 2;
                display: grid;
                grid-template-columns: 1fr;
                gap: 10px;
            }

            #pro-terms-section .pts-contact-list li {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px 16px;
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 10px;
                font-size: 0.88rem;
                transition: all 0.3s ease;
            }

            #pro-terms-section .pts-contact-list li:hover {
                background: rgba(255, 255, 255, 0.22);
                transform: translateX(4px);
            }

            #pro-terms-section .pts-contact-list li i {
                width: 32px;
                height: 32px;
                border-radius: 8px;
                background: rgba(255, 255, 255, 0.2);
                display: inline-flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                font-size: 0.85rem;
            }

            #pro-terms-section .pts-contact-list li a {
                color: #ffffff;
                text-decoration: none;
                font-weight: 500;
                word-break: break-all;
            }

            #pro-terms-section .pts-contact-list li a:hover {
                text-decoration: underline;
            }

            /* Acknowledgement Box */
            #pro-terms-section .pts-ack-box {
                background: linear-gradient(135deg, rgba(0, 128, 0, 0.08), rgba(229, 142, 36, 0.08));
                border: 2px dashed #008000;
                border-radius: 16px;
                padding: 22px 26px;
                margin-top: 30px;
                text-align: center;
            }

            #pro-terms-section .pts-ack-box i {
                font-size: 2rem;
                background: linear-gradient(135deg, #008000, #E58E24);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 10px;
                display: block;
            }

            #pro-terms-section .pts-ack-box p {
                font-size: 0.95rem;
                color: #1F2937;
                font-weight: 600;
                line-height: 1.65;
                margin: 0;
            }

            /* ===== RESPONSIVE ===== */
            @media (max-width: 767px) {
                #pro-terms-section {
                    padding: 3.5rem 0 4rem;
                }

                #pro-terms-section .pts-content {
                    padding: 30px 22px;
                    border-radius: 18px;
                }

                #pro-terms-section .pts-section-title {
                    font-size: 1.2rem;
                }

                #pro-terms-section .pts-section-num {
                    min-width: 36px;
                    height: 36px;
                    font-size: 0.85rem;
                }

                #pro-terms-section .pts-info-bar {
                    padding: 14px 18px;
                }
            }
        </style>

        <div class="pts-container">

            <!-- Info Bar -->
            <div class="pts-info-bar">
                <div class="pts-info-item">
                    <i class="fas fa-calendar-check"></i>
                    <span><strong>Effective Date:</strong> {{ date('F j, Y') }}</span>
                </div>
                <div class="pts-info-item">
                    <i class="fas fa-sync-alt"></i>
                    <span><strong>Last Updated:</strong> {{ date('F j, Y') }}</span>
                </div>
                <div class="pts-info-item">
                    <i class="fas fa-shield-alt"></i>
                    <span><strong>ZATCA</strong> Compliant</span>
                </div>
            </div>

            <!-- Grid Layout -->
            <div class="pts-grid">

                <!-- SIDEBAR / Table of Contents -->
                <aside class="pts-sidebar">
                    <h5 class="pts-sidebar-title">
                        <i class="fas fa-list-ul"></i> Table of Contents
                    </h5>
                    <ul class="pts-toc-list">
                        <li><a href="#sec-1"><span class="pts-toc-num">1</span> Information We Collect</a></li>
                        <li><a href="#sec-2"><span class="pts-toc-num">2</span> How We Use Your Information</a></li>
                        <li><a href="#sec-3"><span class="pts-toc-num">3</span> ZATCA E-Invoicing Data</a></li>
                        <li><a href="#sec-4"><span class="pts-toc-num">4</span> Data Sharing</a></li>
                        <li><a href="#sec-5"><span class="pts-toc-num">5</span> Data Security</a></li>
                        <li><a href="#sec-6"><span class="pts-toc-num">6</span> Data Retention</a></li>
                        <li><a href="#sec-7"><span class="pts-toc-num">7</span> Customer Responsibilities</a></li>
                        <li><a href="#sec-8"><span class="pts-toc-num">8</span> Cookies & Technologies</a></li>
                        <li><a href="#sec-9"><span class="pts-toc-num">9</span> International Data Processing</a></li>
                        <li><a href="#sec-10"><span class="pts-toc-num">10</span> Your Rights</a></li>
                        <li><a href="#sec-11"><span class="pts-toc-num">11</span> Children's Privacy</a></li>
                        <li><a href="#sec-12"><span class="pts-toc-num">12</span> Third-Party Services</a></li>
                        <li><a href="#sec-13"><span class="pts-toc-num">13</span> Changes to Policy</a></li>
                        <li><a href="#sec-14"><span class="pts-toc-num">14</span> Contact Us</a></li>
                    </ul>
                </aside>

                <!-- MAIN CONTENT -->
                <div class="pts-content">

                    <!-- Intro -->
                    <div class="pts-intro">
                        <p>Welcome to <strong>BlessLife Ltd</strong>. We are committed to protecting the privacy and
                            security of our customers' personal and business information. This Privacy Policy explains how
                            we collect, use, store, disclose, and protect information when you use the BlessLife ERP
                            cloud-based ERP, POS, Inventory, Accounting, VAT, and ZATCA E-Invoicing Software ("Software" or
                            "Service"). By using our Software, you agree to the practices described in this Privacy Policy.
                        </p>
                    </div>

                    <!-- Section 1 -->
                    <div class="pts-section"
                         id="sec-1">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">01</span> Information We Collect
                        </h2>
                        <p>We collect information necessary to provide and improve our services.</p>

                        <div class="pts-data-grid">
                            <div class="pts-data-card">
                                <h4>A. Business Information</h4>
                                <ul>
                                    <li>Company Name</li>
                                    <li>Commercial Registration (CR)</li>
                                    <li>VAT Registration Number</li>
                                    <li>Business Address</li>
                                    <li>Branch Information</li>
                                    <li>Business Activities</li>
                                    <li>ZATCA Configuration Details</li>
                                </ul>
                            </div>
                            <div class="pts-data-card">
                                <h4>B. Account Information</h4>
                                <ul>
                                    <li>Full Name</li>
                                    <li>Email Address</li>
                                    <li>Mobile Number</li>
                                    <li>User Role</li>
                                    <li>Login Credentials (encrypted)</li>
                                </ul>
                            </div>
                            <div class="pts-data-card">
                                <h4>C. Financial Information</h4>
                                <ul>
                                    <li>Sales Records</li>
                                    <li>Purchase Records</li>
                                    <li>Accounting Entries</li>
                                    <li>VAT Transactions</li>
                                    <li>Invoices</li>
                                    <li>Credit & Debit Notes</li>
                                    <li>Inventory Transactions</li>
                                    <li>Payment Records</li>
                                </ul>
                            </div>
                            <div class="pts-data-card">
                                <h4>D. Customer & Supplier Info</h4>
                                <ul>
                                    <li>Name</li>
                                    <li>Contact Details</li>
                                    <li>Tax Information</li>
                                    <li>Billing Information</li>
                                    <li>Transaction History</li>
                                </ul>
                            </div>
                            <div class="pts-data-card">
                                <h4>E. Technical Information</h4>
                                <ul>
                                    <li>IP Address</li>
                                    <li>Device Information</li>
                                    <li>Browser Type</li>
                                    <li>Operating System</li>
                                    <li>Login Activity</li>
                                    <li>Session Logs</li>
                                    <li>Error Logs</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2 -->
                    <div class="pts-section"
                         id="sec-2">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">02</span> How We Use Your Information
                        </h2>
                        <p>We use your information to:</p>
                        <ul class="pts-feature-list">
                            <li>Provide ERP, POS, Inventory, and Accounting services</li>
                            <li>Generate VAT-compliant invoices</li>
                            <li>Support ZATCA Phase 1 and Phase 2 e-invoicing</li>
                            <li>Process transactions and financial records</li>
                            <li>Manage user accounts and subscriptions</li>
                            <li>Improve software performance and security</li>
                            <li>Provide technical support</li>
                            <li>Detect fraud and unauthorized access</li>
                            <li>Comply with applicable laws and regulations</li>
                        </ul>
                    </div>

                    <!-- Section 3 -->
                    <div class="pts-section"
                         id="sec-3">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">03</span> ZATCA E-Invoicing Data
                        </h2>
                        <p>When ZATCA Phase 2 integration is enabled, the Software may process and transmit invoice-related
                            data required for compliance, including:</p>
                        <ul class="pts-feature-list">
                            <li>Electronic Invoice (XML)</li>
                            <li>Invoice UUID</li>
                            <li>Invoice Hash</li>
                            <li>QR Code</li>
                            <li>Digital Signature</li>
                            <li>Clearance or Reporting Requests</li>
                        </ul>
                        <div class="pts-note-box">
                            <i class="fas fa-info-circle"></i>
                            <p class="pts-note-text">This information is processed solely to support compliance with
                                applicable ZATCA requirements.</p>
                        </div>
                    </div>

                    <!-- Section 4 -->
                    <div class="pts-section"
                         id="sec-4">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">04</span> Data Sharing
                        </h2>
                        <p>We do not sell, rent, or trade your personal or business information. We may share information
                            only when necessary with:</p>
                        <ul class="pts-bullet-list">
                            <li>Government or regulatory authorities where legally required.</li>
                            <li>Cloud hosting providers that support our services.</li>
                            <li>Payment gateway providers.</li>
                            <li>Email and SMS service providers.</li>
                            <li>Technology partners involved in delivering the Software.</li>
                            <li>ZATCA, when required for e-invoicing compliance.</li>
                        </ul>
                        <p><em>All third-party providers are expected to maintain appropriate security and confidentiality
                                standards.</em></p>
                    </div>

                    <!-- Section 5 -->
                    <div class="pts-section"
                         id="sec-5">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">05</span> Data Security
                        </h2>
                        <p>We implement commercially reasonable technical and organizational measures to protect your
                            information, including:</p>
                        <ul class="pts-feature-list">
                            <li>SSL/TLS encryption</li>
                            <li>Secure cloud infrastructure</li>
                            <li>Role-based access control</li>
                            <li>Password encryption</li>
                            <li>Firewall protection</li>
                            <li>Routine security monitoring</li>
                            <li>Regular system updates</li>
                        </ul>
                        <div class="pts-note-box">
                            <i class="fas fa-shield-alt"></i>
                            <p class="pts-note-text">While we strive to protect your information, no internet-based service
                                can guarantee absolute security.</p>
                        </div>
                    </div>

                    <!-- Section 6 -->
                    <div class="pts-section"
                         id="sec-6">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">06</span> Data Retention
                        </h2>
                        <p>We retain your information only as long as necessary to:</p>
                        <ul class="pts-bullet-list">
                            <li>Provide our services.</li>
                            <li>Meet legal, tax, and accounting obligations.</li>
                            <li>Resolve disputes.</li>
                            <li>Enforce our agreements.</li>
                        </ul>
                        <p><em>Retention periods may vary depending on applicable laws and business requirements.</em></p>
                    </div>

                    <!-- Section 7 -->
                    <div class="pts-section"
                         id="sec-7">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">07</span> Customer Responsibilities
                        </h2>
                        <p>Customers are responsible for:</p>
                        <ul class="pts-bullet-list">
                            <li>Maintaining accurate business information.</li>
                            <li>Keeping login credentials confidential.</li>
                            <li>Managing user permissions within their organization.</li>
                            <li>Logging out of shared devices.</li>
                            <li>Using the Software in compliance with applicable laws.</li>
                        </ul>
                    </div>

                    <!-- Section 8 -->
                    <div class="pts-section"
                         id="sec-8">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">08</span> Cookies and Similar Technologies
                        </h2>
                        <p>Our website and Software may use cookies and similar technologies to:</p>
                        <ul class="pts-feature-list">
                            <li>Maintain user sessions</li>
                            <li>Remember preferences</li>
                            <li>Improve website functionality</li>
                            <li>Analyze usage and performance</li>
                            <li>Enhance security</li>
                        </ul>
                        <p><em>You may adjust your browser settings to manage cookies; however, disabling certain cookies
                                may affect system functionality.</em></p>
                    </div>

                    <!-- Section 9 -->
                    <div class="pts-section"
                         id="sec-9">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">09</span> International Data Processing
                        </h2>
                        <p>Depending on the hosting environment, your data may be processed or stored in secure data centers
                            located within or outside the Kingdom of Saudi Arabia. Appropriate safeguards are implemented to
                            protect personal and business information.</p>
                    </div>

                    <!-- Section 10 -->
                    <div class="pts-section"
                         id="sec-10">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">10</span> Your Rights
                        </h2>
                        <p>Subject to applicable law, you may have the right to:</p>
                        <ul class="pts-bullet-list">
                            <li>Access your personal information.</li>
                            <li>Correct inaccurate information.</li>
                            <li>Request deletion of certain personal data.</li>
                            <li>Update your account information.</li>
                            <li>Request a copy of your stored information.</li>
                            <li>Object to certain processing activities where permitted.</li>
                        </ul>
                        <div class="pts-note-box">
                            <i class="fas fa-exclamation-triangle"></i>
                            <p class="pts-note-text">Some requests may be limited where data must be retained for legal,
                                accounting, tax, or regulatory purposes.</p>
                        </div>
                    </div>

                    <!-- Section 11 -->
                    <div class="pts-section"
                         id="sec-11">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">11</span> Children's Privacy
                        </h2>
                        <p>Our Software is intended for business use only and is not directed to individuals under the age
                            of 18. We do not knowingly collect personal information from children.</p>
                    </div>

                    <!-- Section 12 -->
                    <div class="pts-section"
                         id="sec-12">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">12</span> Third-Party Services
                        </h2>
                        <p>Our Software may integrate with third-party services such as:</p>
                        <ul class="pts-feature-list">
                            <li>Payment gateways</li>
                            <li>Email providers</li>
                            <li>SMS providers</li>
                            <li>Barcode scanners</li>
                            <li>Receipt printers</li>
                            <li>Cloud hosting platforms</li>
                            <li>ZATCA APIs</li>
                        </ul>
                        <p><em>We are not responsible for the privacy practices of third-party services outside our
                                control.</em></p>
                    </div>

                    <!-- Section 13 -->
                    <div class="pts-section"
                         id="sec-13">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">13</span> Changes to This Privacy Policy
                        </h2>
                        <p>We may update this Privacy Policy from time to time to reflect changes in our services, legal
                            requirements, or business practices. Updated versions will be published on our website with a
                            revised "Last Updated" date.</p>
                    </div>

                    <!-- Section 14 -->
                    <div class="pts-section"
                         id="sec-14">
                        <h2 class="pts-section-title">
                            <span class="pts-section-num">14</span> Contact Us
                        </h2>
                        <p>If you have any questions about this Privacy Policy or how your information is handled, please
                            contact us:</p>

                        <div class="pts-contact-card">
                            <h3>BlessLife Ltd</h3>
                            <p class="text-white">Product: BlessLife ERP – Cloud ERP, POS, Inventory & Accounting Software
                            </p>
                            <ul class="pts-contact-list">
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <a href="tel:+112242650">+1 122 426 50</a>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:support@blesslifeltd.com">support@blesslifeltd.com</a>
                                </li>
                                <li>
                                    <i class="fas fa-globe"></i>
                                    <a href="https://erp.blesslifeltd.com/"
                                       target="_blank">https://erp.blesslifeltd.com/</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Acknowledgement Box -->
                    <div class="pts-ack-box">
                        <i class="fas fa-shield-check"></i>
                        <p><strong>Acknowledgement:</strong> By creating an account, subscribing to, or using BlessLife ERP,
                            you acknowledge that you have read, understood, and agreed to this Privacy Policy.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script type="text/javascript">
        new Sticky("[sticky]");

        // Smooth scroll & active state for TOC
        document.addEventListener('DOMContentLoaded', function() {
            const tocLinks = document.querySelectorAll('#pro-terms-section .pts-toc-list a');
            const sections = document.querySelectorAll('#pro-terms-section .pts-section');

            // Smooth scroll
            tocLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - 90,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Active state on scroll
            window.addEventListener('scroll', function() {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop - 120;
                    if (window.pageYOffset >= sectionTop) {
                        current = section.getAttribute('id');
                    }
                });

                tocLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection
