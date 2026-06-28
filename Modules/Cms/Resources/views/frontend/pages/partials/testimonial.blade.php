@php
    $partners = [
        ['name' => 'Google', 'img' => 'https://sherazipos.com/landlord/images/clients/elec.jpg'],
        ['name' => 'Microsoft', 'img' => 'https://sherazipos.com/landlord/images/clients/iwear.jpg'],
        ['name' => 'Amazon', 'img' => 'https://sherazipos.com/landlord/images/clients/aspire.jpg'],
        ['name' => 'Adobe', 'img' => 'https://sherazipos.com/landlord/images/clients/tabas.jpg'],
        ['name' => 'Spotify', 'img' => 'https://sherazipos.com/landlord/images/clients/china.jpg'],
        ['name' => 'Netflix', 'img' => 'https://sherazipos.com/landlord/images/clients/edorkar.jpg'],
    ];
@endphp

@if (!empty($partners) && count($partners) > 0)
    <section class="ds-section-space-between partner-section-wrapper">
        <div class="container">
            <!-- Using Global Design System Header Classes -->
            <div class="ds-section-header-wrapper mb-5 text-center">
                <span class="ds-subtitle">Trusted Partners</span>
                <h2 class="ds-page-title">Our Client Portfolio</h2>
                <div class="ds-title-bar"></div>
            </div>

            <!-- Infinite Logo Slider (Pure CSS Marquee) -->
            <div class="partner-slider-container">
                <div class="partner-track"
                     id="partnerTrack">
                    @foreach ($partners as $partner)
                        <div class="partner-slide">
                            <a href="#"
                               class="d-block">
                                <!-- Ensure these paths are absolute or relative to your asset folder -->
                                <img src="{{ isset($partner['img']) ? $partner['img'] : asset('assets/img/logo.png') }}"
                                     alt="{{ $partner['name'] }} Partner"
                                     class="partner-img">
                            </a>
                        </div>
                    @endforeach
                    <!-- Duplicate for seamless looping -->
                    @foreach ($partners as $partner)
                        <div class="partner-slide">
                            <a href="#"
                               class="d-block">
                                <img src="{{ isset($partner['img']) ? $partner['img'] : asset('assets/img/logo.png') }}"
                                     alt="{{ $partner['name'] }} Partner"
                                     class="partner-img">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif

<style>
    .partner-section-wrapper {
        padding: 5rem 0;
        background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        overflow-x: hidden;
    }

    /* Infinite Marquee Layout */
    .partner-slider-container {
        width: 100%;
        overflow: hidden;
        mask-image: linear-gradient(to right, transparent 0%, black 15%, black 85%, transparent 100%);
        -webkit-mask-image: linear-gradient(to right, transparent 0%, black 15%, black 85%, transparent 100%);
    }

    .partner-track {
        display: flex;
        width: max-content;
        gap: 4rem;
        animation: marquee-scroll 40s linear infinite;
    }

    .partner-track:hover {
        animation-play-state: paused;
    }

    @keyframes marquee-scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-50% - 1rem));
            /* Adjusts for half content + gaps */
        }
    }

    .partner-slide a {
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(8px);
        border-radius: 16px;
        padding: 18px 28px;
        transition: all .3s ease;
        border: 1px solid rgba(255, 255, 255, .4);
    }

    .partner-slide a:hover {
        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        transform: translateY(-4px);
    }

    .partner-img {
        max-width: 180px;
        max-height: 70px;
        width: auto;
        height: auto;
        object-fit: contain;
        transition: all 0.35s ease;


        filter: none;
        opacity: 1;
    }

    .partner-section-wrapper {
        padding: 5rem 0;
        background: linear-gradient(135deg,
                rgba(0, 128, 0, 0.08) 0%,
                rgba(229, 142, 36, 0.07) 100%);
        overflow-x: hidden;
    }


    .partner-slide:hover .partner-img {
        transform: scale(1.08);
    }

    @media (max-width: 768px) {
        .partner-track {
            gap: 2rem;
            animation-duration: 30s;
        }

        .partner-img {
            max-width: 140px;
            max-height: 50px;
        }

        .partner-section-wrapper {
            padding: 3rem 0;
        }
    }
</style>
