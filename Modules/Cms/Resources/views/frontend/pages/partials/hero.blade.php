<style>
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
        background-attachment: fixed;
    }

    .hero-carousel .carousel-item::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0, 128, 0, 0.55) 0%, rgba(0, 0, 0, 0.85) 100%);
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
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-top: 1.5rem;
        padding: 12px 30px;
        background: linear-gradient(135deg, #008000 0%, #E58E24 100%);
        color: #FFFFFF;
        font-size: 0.95rem;
        font-weight: 600;
        border: none;
        border-radius: 50px;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(0, 128, 0, 0.25);
    }

    .hero-carousel .btn-trial:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(229, 142, 36, 0.3);
        color: #ffffff;
    }

    .hero-carousel .btn-trial i {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }

    .hero-carousel .btn-trial:hover i {
        transform: translateX(5px);
    }

    .hero-carousel .carousel-control-prev,
    .hero-carousel .carousel-control-next {
        display: none;
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
                   class="btn-trial">{{ $hero_btn['text'] ?? 'Start your Free Trial' }} <i
                       class="fas fa-arrow-right"></i></a>
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
                   class="btn-trial">{{ $hero_btn['text'] ?? 'Start your Free Trial' }} <i
                       class="fas fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="carousel-item"
             style="background-image: url('https://images.unsplash.com/photo-1487017159836-4e23ece2e4cf?w=1600&q=80');">
            <div class="carousel-caption">
                <h1 class="typewriter"
                    data-text="Multi-Store Management Made Easy"></h1>
                <p>Handle multiple locations, users, and currencies from a single dashboard — scale without limits.</p>
                <a href="{{ $hero_btn['link'] ?? route('business.getRegister') }}"
                   class="btn-trial">{{ $hero_btn['text'] ?? 'Start your Free Trial' }} <i
                       class="fas fa-arrow-right"></i></a>
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
