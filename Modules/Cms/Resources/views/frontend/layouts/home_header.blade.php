@includeIf('cms::frontend.layouts.header')

<style>
    .hero.container-fluid {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 10;
        background: transparent;
    }

    .hero-nav__link,
    .hero-nav__item-chevron,
    .hero-nav__item>span {
        color: #fff;
    }

    .hero-nav__item a:not(.btn) {
        color: #fff !important;
    }

    .hero-nav__item .btn-primary {
        background: linear-gradient(135deg, #6366f1, #4f46e5) !important;
        border: none !important;
        border-radius: 50px !important;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3) !important;
        padding: 0.5rem 1.5rem !important;
        font-weight: 700 !important;
        transition: all 0.3s ease !important;
    }

    .hero-nav__item .btn-primary:hover {
        transform: translateY(-1px) !important;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.45) !important;
    }

    .hero-nav--is-sticky {
        background: #fff !important;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .hero-nav--is-sticky .hero-nav__link,
    .hero-nav--is-sticky .hero-nav__item a:not(.btn),
    .hero-nav--is-sticky .hero-nav__item-chevron,
    .hero-nav--is-sticky .hero-nav__item>span {
        color: #1e293b !important;
    }

    .hero-nav--is-sticky .hero-nav__link:hover,
    .hero-nav--is-sticky .hero-nav__item a:not(.btn):hover {
        color: #6366f1 !important;
    }
    .hero-nav--is-sticky .fa-bars {
        color: #1e293b !important;
    }

    .hero-nav__link:hover,
    .hero-nav__item a:not(.btn):hover {
        color: rgba(255, 255, 255, 0.8) !important;
    }

    .hero-carousel {
        position: relative;
        overflow: hidden;
    }

    .hero-carousel .carousel-item {
        height: 90vh;
        min-height: 500px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .hero-carousel .carousel-item::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.85), rgba(30, 41, 59, 0.7));
        z-index: 1;
    }

    .hero-carousel .carousel-caption {
        bottom: auto;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
        left: 10%;
        right: 10%;
        text-align: center;
    }

    .hero-carousel .carousel-caption h1 {
        font-size: 3rem;
        font-weight: 800;
        color: #fff;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        min-height: 1.2em;
    }

    .hero-carousel .carousel-caption p {
        font-size: 1.15rem;
        color: rgba(255, 255, 255, 0.85);
        max-width: 600px;
        margin: 1rem auto 0;
    }

    .hero-carousel .carousel-indicators {
        z-index: 3;
    }

    .hero-carousel .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.6);
        background: transparent;
        margin: 0 6px;
    }

    .hero-carousel .carousel-indicators button.active {
        background: #fff;
        border-color: #fff;
    }

    .typewriter-cursor::after {
        content: '|';
        animation: blink 0.8s infinite;
        color: #6366f1;
        font-weight: 300;
    }

    @keyframes blink {

        0%,
        50% {
            opacity: 1;
        }

        51%,
        100% {
            opacity: 0;
        }
    }

    .hero-carousel .btn-trial {
        display: inline-block;
        margin-top: 1.5rem;
        padding: 0.85rem 2.5rem;
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: #fff;
        font-size: 1.05rem;
        font-weight: 700;
        border: none;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.35);
    }

    .hero-carousel .btn-trial:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(99, 102, 241, 0.5);
        color: #fff;
    }

.hero-carousel .carousel-control-prev,
.hero-carousel .carousel-control-next {
    display: none;
}
.ft-menu--js-show.ft-menu .hero-nav__link,
.ft-menu--js-show.ft-menu .hero-nav__item a:not(.btn) {
    color: #000000 !important;
}
@media (max-width: 768px) {
        .hero-carousel .carousel-item {
            height: 70vh;
            min-height: 400px;
        }

        .hero-carousel .carousel-caption h1 {
            font-size: 1.75rem;
        }

        .hero-carousel .carousel-caption p {
            font-size: 0.95rem;
        }

        .hero-carousel .btn-trial {
            padding: 0.7rem 1.8rem;
            font-size: 0.95rem;
        }
    }

    @media (max-width: 991.98px) {
        .hero-nav__link {
            color: #000 !important;
        }
    }
</style>

<div id="heroCarousel"
     class="carousel slide hero-carousel"
     data-bs-ride="carousel"
     data-bs-interval="6000">
    <div class="carousel-indicators">
        <button type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide-to="0"
                class="active"></button>
        <button type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide-to="1"></button>
        <button type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active"
             style="background-image: url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1600&q=80');">
            <div class="carousel-caption">
                <h1 class="typewriter"
                    data-text="Streamline Your Business with Ultimate POS"></h1>
                <p>From inventory to sales — one integrated platform to manage your entire retail operation seamlessly.
                </p>
                <a href="{{ $hero_btn['link'] ?? route('business.getRegister') }}"
                   class="btn-trial">{{ $hero_btn['text'] ?? 'Start your Free Trial' }}</a>
            </div>
        </div>
        <div class="carousel-item"
             style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1600&q=80');">
            <div class="carousel-caption">
                <h1 class="typewriter"
                    data-text="Real-Time Insights, Smarter Decisions"></h1>
                <p>Powerful analytics and reporting give you full visibility into your business performance at a glance.
                </p>
                <a href="{{ $hero_btn['link'] ?? route('business.getRegister') }}"
                   class="btn-trial">{{ $hero_btn['text'] ?? 'Start your Free Trial' }}</a>
            </div>
        </div>
        <div class="carousel-item"
             style="background-image: url('https://images.unsplash.com/photo-1487017159836-4e23ece2e4cf?w=1600&q=80');">
            <div class="carousel-caption">
                <h1 class="typewriter"
                    data-text="Multi-Store Management Made Easy"></h1>
                <p>Handle multiple locations, users, and currencies from a single dashboard — scale without limits.</p>
                <a href="{{ $hero_btn['link'] ?? route('business.getRegister') }}"
                   class="btn-trial">{{ $hero_btn['text'] ?? 'Start your Free Trial' }}</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typewriters = document.querySelectorAll('.typewriter');
        const carousel = document.getElementById('heroCarousel');

        function typeText(el, text, callback) {
            el.classList.add('typewriter-cursor');
            el.textContent = '';
            let i = 0;

            function type() {
                if (i < text.length) {
                    el.textContent += text.charAt(i);
                    i++;
                    setTimeout(type, 40 + Math.random() * 30);
                } else {
                    if (callback) setTimeout(callback, 3000);
                }
            }
            type();
        }

        function clearTypewriter(el) {
            el.classList.remove('typewriter-cursor');
            el.textContent = '';
        }

        function startCurrentSlide() {
            const active = carousel.querySelector('.carousel-item.active .typewriter');
            if (active) {
                active.textContent = '';
                typeText(active, active.dataset.text);
            }
        }

        carousel.addEventListener('slide.bs.carousel', function() {
            document.querySelectorAll('.typewriter').forEach(function(el) {
                clearTypewriter(el);
            });
        });

        carousel.addEventListener('slid.bs.carousel', function() {
            setTimeout(startCurrentSlide, 300);
        });

        startCurrentSlide();
    });
</script>
