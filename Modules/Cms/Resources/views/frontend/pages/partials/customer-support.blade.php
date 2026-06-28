<style>
    /* ===== MAIN SECTION ===== */
    #support-247-section {
        position: relative;
        padding: 6rem 0;
        font-family: 'Poppins', sans-serif;
    }

    /* ===== CONTAINER ===== */
    #support-247-section .sup-container {
        position: relative;
        z-index: 2;
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* ===== SECTION HEADER ===== */
    #support-247-section .sup-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 60px;
    }

    #support-247-section .sup-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 22px;
        background: linear-gradient(135deg, rgba(0, 128, 0, 0.12), rgba(229, 142, 36, 0.12));
        border: 1px solid rgba(0, 128, 0, 0.25);
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        color: #008000;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 20px;
    }

    #support-247-section .sup-badge .sup-live-dot {
        width: 10px;
        height: 10px;
        background: #008000;
        border-radius: 50%;
        position: relative;
        animation: supPulse 1.5s infinite;
    }

    @keyframes supPulse {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 128, 0, 0.7);
        }

        70% {
            box-shadow: 0 0 0 12px rgba(0, 128, 0, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(0, 128, 0, 0);
        }
    }

    #support-247-section .sup-main-title {
        font-size: 42px;
        font-weight: 800;
        color: #1F2937;
        line-height: 1.2;
        margin-bottom: 16px;
        letter-spacing: -1px;
    }

    #support-247-section .sup-main-title .sup-highlight {
        background: linear-gradient(135deg, #008000, #E58E24);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
    }

    #support-247-section .sup-subtitle {
        font-size: 1.05rem;
        color: #6B7280;
        line-height: 1.7;
    }

    /* ===== MAIN GRID ===== */
    #support-247-section .sup-grid-wrap {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 40px;
        align-items: stretch;
    }

    @media (max-width: 991px) {
        #support-247-section .sup-grid-wrap {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }

    /* ===== LEFT SIDE - HERO CARD ===== */
    #support-247-section .sup-hero-card {
        position: relative;
        border-radius: 28px;
        padding: 50px 45px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: linear-gradient(135deg, rgba(0, 128, 0, 0.08) 0%, rgba(0, 128, 0, 0.03) 100%);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(0, 128, 0, 0.1);
        box-shadow:
            0 8px 32px rgba(229, 142, 36, 0.15),
            0 2px 8px rgba(0, 0, 0, 0.04),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    #support-247-section .sup-hero-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.35) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    #support-247-section .sup-hero-content {
        position: relative;
        z-index: 2;
    }

    #support-247-section .sup-247-badge {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        color: #E58E24;
        text-transform: uppercase;
        letter-spacing: 2px;
        border-bottom: 1px solid rgba(229, 142, 36, 0.3);
        padding-bottom: 4px;
        margin-bottom: 16px;
        line-height: 1.4;
    }

    #support-247-section .sup-247-badge i {
        font-size: 14px;
        animation: supSpin 3s linear infinite;
    }

    @keyframes supSpin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    #support-247-section .sup-hero-title {
        font-size: 24px;
        font-weight: 700;
        color: #1F2937;
        line-height: 1.3;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }

    #support-247-section .sup-hero-desc {
        font-size: 1rem;
        color: #6B7280;
        line-height: 1.7;
        margin-bottom: 2.5rem;
        max-width: 90%;
    }

    /* Support Agent Avatars */
    #support-247-section .sup-agents-row {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 30px;
        position: relative;
        z-index: 2;
    }

    #support-247-section .sup-avatar-stack {
        display: flex;
    }

    #support-247-section .sup-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 3px solid #ffffff;
        margin-left: -12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    #support-247-section .sup-avatar:first-child {
        margin-left: 0;
    }

    #support-247-section .sup-avatar:hover {
        transform: translateY(-5px) scale(1.1);
        z-index: 5;
    }

    #support-247-section .sup-avatar-1 {
        background: linear-gradient(135deg, #f093fb, #f5576c);
    }

    #support-247-section .sup-avatar-2 {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
    }

    #support-247-section .sup-avatar-3 {
        background: linear-gradient(135deg, #fa709a, #fee140);
    }

    #support-247-section .sup-avatar-4 {
        background: linear-gradient(135deg, #30cfd0, #330867);
    }

    #support-247-section .sup-avatar-more {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        border: 3px solid #ffffff;
    }

    #support-247-section .sup-agents-text {
        font-size: 0.88rem;
        opacity: 0.95;
    }

    #support-247-section .sup-agents-text strong {
        display: block;
        font-size: 1rem;
        margin-bottom: 2px;
    }

    /* Chat Button */


    /* ===== RIGHT SIDE - CONTACT CARDS (Stacked Vertically) ===== */
    #support-247-section .sup-contact-grid {
        display: flex;
        flex-direction: column;
        gap: 20px;
        justify-content: center;
    }

    #support-247-section .sup-contact-card {
        position: relative;
        background: #ffffff;
        border-radius: 20px;
        padding: 30px 28px;
        border: 1px solid rgba(0, 128, 0, 0.08);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.04);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        overflow: hidden;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    #support-247-section .sup-contact-card::before {
        content: '';
        position: absolute;
        bottom: -40px;
        right: -40px;
        width: 140px;
        height: 140px;
        background: radial-gradient(circle, rgba(0, 128, 0, 0.06) 0%, transparent 70%);
        border-radius: 50%;
        transition: all 0.5s ease;
    }

    #support-247-section .sup-contact-card::after {
        content: '\f061';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        top: 50%;
        right: 24px;
        transform: translateY(-50%) translateX(-10px);
        font-size: 1rem;
        color: #008000;
        opacity: 0;
        transition: all 0.4s ease;
        z-index: 2;
    }

    #support-247-section .sup-contact-card:hover {
        transform: translateY(-8px);
        border-color: rgba(0, 128, 0, 0.2);
        box-shadow: 0 25px 50px rgba(0, 128, 0, 0.12);
        color: inherit;
    }

    #support-247-section .sup-contact-card:hover::before {
        background: radial-gradient(circle, rgba(229, 142, 36, 0.15) 0%, transparent 70%);
        transform: scale(1.5);
    }

    #support-247-section .sup-contact-card:hover::after {
        opacity: 1;
        transform: translateY(-50%) translateX(0);
    }

    #support-247-section .sup-contact-icon {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        color: #ffffff;
        transition: all 0.4s ease;
        position: relative;
        z-index: 1;
        flex-shrink: 0;
    }

    #support-247-section .sup-contact-card:hover .sup-contact-icon {
        transform: rotate(-8deg) scale(1.1);
    }

    /* Icon Backgrounds */
    #support-247-section .sup-icon-email {
        background: linear-gradient(135deg, #008000 0%, #4caf50 100%);
        box-shadow: 0 8px 20px rgba(0, 128, 0, 0.25);
    }

    #support-247-section .sup-icon-phone {
        background: linear-gradient(135deg, #E58E24 0%, #f39c12 100%);
        box-shadow: 0 8px 20px rgba(229, 142, 36, 0.25);
    }

    #support-247-section .sup-contact-body {
        flex: 1;
        min-width: 0;
        position: relative;
        z-index: 1;
    }

    #support-247-section .sup-contact-label {
        font-size: 11px;
        font-weight: 700;
        color: #9CA3AF;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 4px;
        display: block;
    }

    #support-247-section .sup-contact-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1F2937;
        margin-bottom: 6px;
        line-height: 1.3;
    }

    #support-247-section .sup-contact-value {
        font-size: 0.92rem;
        color: #6B7280;
        line-height: 1.5;
        margin: 0 0 10px 0;
        word-break: break-all;
        font-weight: 500;
    }

    #support-247-section .sup-contact-card:hover .sup-contact-value {
        color: #008000;
        font-weight: 600;
    }

    /* Status Indicator */
    #support-247-section .sup-status-tag {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        background: rgba(0, 128, 0, 0.1);
        color: #008000;
        font-size: 10px;
        font-weight: 700;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        width: fit-content;
    }

    #support-247-section .sup-status-tag::before {
        content: '';
        width: 6px;
        height: 6px;
        background: #008000;
        border-radius: 50%;
        animation: supPulse 1.5s infinite;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        #support-247-section {
            padding: 4rem 0;
        }

        #support-247-section .sup-main-title {
            font-size: 28px;
        }

        #support-247-section .sup-hero-card {
            padding: 35px 28px;
            min-height: auto;
        }

        #support-247-section .sup-hero-title {
            font-size: 20px;
        }

        #support-247-section .sup-contact-card {
            padding: 22px 20px;
            gap: 16px;
        }

        #support-247-section .sup-contact-icon {
            width: 54px;
            height: 54px;
            font-size: 1.3rem;
        }
    }
</style>


<!-- ===== 24/7 CUSTOMER SUPPORT SECTION ===== -->
<section id="support-247-section">

    <div class="sup-container">



        <div class="stats-header">
            <x-section-header subtitle="We're Online Now"
                              title="24/7 Customer Support" />
        </div>





        <!-- Main Grid -->
        <div class="sup-grid-wrap">

            <!-- LEFT SIDE: Hero Card -->
            <div class="sup-hero-card">

                <div class="sup-hero-content">
                    <span class="sup-247-badge">
                        <i class="fas fa-headset"></i>
                        Always Available
                    </span>

                    <h3 class="sup-hero-title">
                        We're Here to Help, Anytime You Need
                    </h3>

                    <p class="sup-hero-desc">
                        Have a question or need more information? Reach out to us via email or phone, and we'll get back
                        to you as soon as possible.
                    </p>
                </div>



            </div>

            <!-- RIGHT SIDE: Contact Cards (Email & Phone Only) -->
            <div class="sup-contact-grid">

                <!-- Email Card -->
                <a href="mailto:haquebd08@gmail.com"
                   class="sup-contact-card">
                    <div class="sup-contact-icon sup-icon-email">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="sup-contact-body">
                        <span class="sup-contact-label">Email Us</span>
                        <h4 class="sup-contact-title">Drop a Message</h4>
                        <p class="sup-contact-value">haquebd08@gmail.com</p>
                        <span class="sup-status-tag">Reply within 1 hour</span>
                    </div>
                </a>

                <!-- Phone Card -->
                <a href="tel:+8801234567890"
                   class="sup-contact-card">
                    <div class="sup-contact-icon sup-icon-phone">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="sup-contact-body">
                        <span class="sup-contact-label">Call Us</span>
                        <h4 class="sup-contact-title">Talk to Expert</h4>
                        <p class="sup-contact-value">+966 53 167 4978</p>
                        <span class="sup-status-tag">Available 24/7</span>
                    </div>
                </a>

            </div>

        </div>

    </div>
</section>
