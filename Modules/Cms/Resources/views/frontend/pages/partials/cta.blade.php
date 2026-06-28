<style>
    .cta-section {
        position: relative;
        background: var(--gradient-primary);
        border-radius: 24px;
        padding: 3rem 2.5rem;
        margin: 4rem auto;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 128, 0, 0.25);
    }

    /* Decorative background elements */
    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .cta-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(229, 142, 36, 0.3) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .cta-content {
        position: relative;
        z-index: 2;
    }

    .cta-title {
        font-size: 36px;
        font-weight: 800;
        color: var(--white);
        line-height: 1.2;
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
    }

    .cta-text {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.95);
        line-height: 1.6;
        margin-bottom: 0;
        max-width: 90%;
    }

    /* Modern Button Styles */
    .cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--white);
        color: var(--primary-green);
        font-weight: 700;
        font-size: 1rem;
        padding: 0.85rem 1.8rem;
        border-radius: 40px;
        text-decoration: none;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.18);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .cta-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, var(--primary-green), var(--secondary-orange));
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 0;
    }

    .cta-btn span,
    .cta-btn svg {
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .cta-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
        color: var(--white);
        text-decoration: none;
    }

    .cta-btn:hover::before {
        opacity: 1;
    }

    .cta-btn:hover svg {
        transform: translateX(4px);
    }

    .cta-btn svg {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }

    @media (max-width: 768px) {
        .cta-btn {
            font-size: 0.95rem;
            padding: 0.75rem 1.5rem;
            gap: 6px;
        }

        .cta-btn svg {
            width: 16px;
            height: 16px;
        }
    }

    /* Floating shapes for visual interest */
    .cta-shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }

    .cta-shape-1 {
        width: 60px;
        height: 60px;
        top: 20%;
        left: 10%;
        animation: float 6s ease-in-out infinite;
    }

    .cta-shape-2 {
        width: 40px;
        height: 40px;
        bottom: 20%;
        right: 15%;
        animation: float 8s ease-in-out infinite reverse;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(10deg);
        }
    }

    /* Responsive */
    @media (max-width: 991px) {
        .cta-section {
            padding: 3rem 2rem;
            margin: 3rem auto;
            text-align: center;
        }

        .cta-title {
            font-size: 2rem;
        }

        .cta-text {
            font-size: 1.1rem;
            max-width: 100%;
            margin-bottom: 2rem;
        }


    }

    @media (max-width: 576px) {
        .cta-section {
            padding: 2.5rem 1.5rem;
            border-radius: 20px;
        }

        .cta-title {
            font-size: 1.75rem;
        }

        .cta-text {
            font-size: 1rem;
        }
    }
</style>

<div class="container">
    <div class="cta-section">
        <!-- Decorative shapes -->
        <div class="cta-shape cta-shape-1"></div>
        <div class="cta-shape cta-shape-2"></div>

        <div class="row align-items-center cta-content">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="cta-title">
                    Automate Your Business Today
                </h2>
                <p class="cta-text">
                    Talk to one of our product experts. We're here to help you get started and transform your business
                    operations with powerful automation tools.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ $cta_btn['link'] ?? '#' }}"
                   class="cta-btn">
                    <span>{{ $cta_btn['text'] ?? 'Get Started' }}</span>
                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2.5"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <line x1="5"
                              y1="12"
                              x2="19"
                              y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
