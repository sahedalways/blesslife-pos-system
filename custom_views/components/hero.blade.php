<style>
    .hero-carousel {
        position: relative;
        overflow: hidden;
    }

    .hero-carousel .carousel-item {
        height: 80vh;
        min-height: 450px;
        background-size: cover;
        background-position: center bottom;
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
    }
</style>

<div class="carousel slide hero-carousel"
     data-bs-ride="carousel"
     data-bs-interval="6000">
    <div class="carousel-inner">
        <div class="carousel-item active"
             style="background-image: url('{{ $heroImage }}');">
            <div class="carousel-caption">
                @if ($heroSubtitle)
                    <span class="ds-subtitle" style="color: #E58E24; font-size: 1rem; letter-spacing: 2px; text-transform: uppercase; display: block; margin-bottom: 0.75rem;">{{ $heroSubtitle }}</span>
                @endif
                <h1>{{ $heroTitle }}</h1>
                @if ($description)
                    <p>{{ $description }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
