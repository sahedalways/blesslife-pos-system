@if (!empty($statistics))
    <style>
        /* Stats Section - Compact & Light */
        .stats-section {
            position: relative;
            padding: 2.5rem 0;
            margin-top: 3rem;
            margin-bottom: 3rem;
            overflow: hidden;
        }

        @media (max-width: 991px) {
            .stats-section {
                padding: 2rem 0;
                /* Smaller on mobile */
            }
        }

        /* Subtle background decoration */
        .stats-section::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;

            border-radius: 50%;
            pointer-events: none;
        }

        .stats-section::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;

            border-radius: 50%;
            pointer-events: none;
        }

        /* Header Styling - Compact */
        .stats-header {
            margin-bottom: 2rem;
            /* Reduced from 3rem */
            text-align: center;
            position: relative;
            z-index: 2;
        }

        /* Stats Container - Tighter */
        .stats-container {
            position: relative;
            z-index: 2;
            background: linear-gradient(135deg,
                    #0B5D2A 0%,
                    #0F7A38 55%,
                    #159947 82%,
                    #D99632 100%);
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(11, 93, 42, 0.18);
            overflow: hidden;
        }

        .stats-container::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                    rgba(255, 255, 255, 0.12) 0%,
                    rgba(255, 255, 255, 0.04) 35%,
                    transparent 70%);
            pointer-events: none;
        }

        /* Soft orange glow */
        .stats-container::after {
            content: '';
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle,
                    rgba(229, 142, 36, 0.18) 0%,
                    rgba(229, 142, 36, 0.08) 40%,
                    transparent 75%);
            pointer-events: none;
        }

        /* Individual Stat Item - Compact */
        .stat-item {
            position: relative;
            padding: 1rem 0.5rem;
            /* Reduced padding */
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-item:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-3px);
            border-radius: 12px;
        }

        /* Icon Container - Smaller */
        .stat-icon {
            width: 45px;
            /* Reduced from 50px */
            height: 45px;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            /* Reduced margin */
            font-size: 1.25rem;
            /* Slightly smaller icon */
            color: var(--white);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
        }

        .stat-item:hover .stat-icon {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }

        /* Number Styling - Adjusted size */
        .stat-number {
            font-size: 2.2rem;
            /* Reduced from 2.8rem */
            font-weight: 800;
            color: var(--white);
            line-height: 1;
            margin-bottom: 0.5rem;
            display: block;
            font-family: 'Preevio', sans-serif;
        }

        .stat-number::after {
            content: attr(data-suffix);
            font-size: 1.2rem;
            vertical-align: super;
            margin-left: 2px;
        }

        /* Label Styling */
        .stat-label {
            font-size: 0.9rem;
            /* Slightly smaller */
            color: rgba(255, 255, 255, 0.95);
            font-weight: 500;
            margin: 0;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* Responsive Adjustments */
        @media (max-width: 991px) {
            .stats-container {
                padding: 1.5rem 1rem;
                border-radius: 16px;
            }

            .stat-item {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                padding: 1.25rem 0.5rem;
            }

            .stat-item:nth-child(2n) {
                border-right: none;
            }

            .stat-item:nth-last-child(-n+2) {
                border-bottom: none;
            }

            .stat-number {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 576px) {
            .stats-container {
                padding: 1rem;
                border-radius: 12px;
            }

            .stat-item {
                padding: 1rem 0.25rem;
            }

            .stat-icon {
                width: 38px;
                height: 38px;
                font-size: 1rem;
            }

            .stat-number {
                font-size: 1.6rem;
            }

            .stat-label {
                font-size: 0.8rem;
            }
        }
    </style>

    <div class="stats-section">
        <div class="container">
            <!-- Compact Header -->
            <div class="stats-header">
                <x-section-header subtitle="Our Achievements"
                                  title="Numbers That Speak for Themselves" />
            </div>

            <!-- Compact Stats Container -->
            <div class="stats-container">
                <div class="row g-0">
                    @if (isset($statistics['content']) && !empty($statistics['content']))
                        @foreach ($statistics['content'] as $index => $stats)
                            <div class="col-6 col-lg-3 stat-item"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ $index * 100 }}">
                                <div class="stat-icon">
                                    @if ($index == 0)
                                        <i class="fas fa-users"></i>
                                    @elseif($index == 1)
                                        <i class="fas fa-project-diagram"></i>
                                    @elseif($index == 2)
                                        <i class="fas fa-award"></i>
                                    @else
                                        <i class="fas fa-headset"></i>
                                    @endif
                                </div>
                                <span class="stat-number counter"
                                      data-target="{{ preg_replace('/[^0-9]/', '', $stats['stats'] ?? '0') }}"
                                      data-suffix="{{ preg_replace('/[0-9]/', '', $stats['stats'] ?? '') }}">
                                    0
                                </span>
                                <p class="stat-label">{{ $stats['title'] ?? '' }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Counter Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');

            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-target'));
                        const suffix = counter.getAttribute('data-suffix') || '';
                        const duration = 2000;
                        const step = target / (duration / 16);
                        let current = 0;

                        const timer = setInterval(() => {
                            current += step;
                            if (current >= target) {
                                counter.textContent = target + suffix;
                                clearInterval(timer);
                            } else {
                                counter.textContent = Math.floor(current) + suffix;
                            }
                        }, 16);

                        observer.unobserve(counter);
                    }
                });
            }, observerOptions);

            counters.forEach(counter => observer.observe(counter));
        });
    </script>
@endif
