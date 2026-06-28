@if (!empty($faqs) && isset($faqs))
    <style>
        /* Full width section like footer */
        .ds-faq-section {
            width: 100%;
            padding: 5rem 0;
            position: relative;
        }

        .ds-section-header-wrapper {
            text-align: center;
            margin-bottom: 3.5rem;
            cursor: default;
        }

        .ds-subtitle {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            color: #E58E24;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            margin-bottom: 12px;
            position: relative;
            padding: 0 16px;
        }

        .ds-subtitle::before,
        .ds-subtitle::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30px;
            height: 1px;
            background: linear-gradient(90deg, transparent, #E58E24);
        }

        .ds-subtitle::after {
            right: -20px;
            transform: scaleX(-1);
        }

        .ds-subtitle::before {
            left: -20px;
        }



        .ds-title-bar {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #008000 0%, #E58E24 100%);
            border-radius: 2px;
            margin: 0 auto;
            transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ds-section-header-wrapper:hover .ds-title-bar {
            width: 190px;
            box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
        }

        .ds-accordion-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            max-width: 1600px;
            margin: 0 auto;
        }

        .ds-accordion-item {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid rgba(0, 128, 0, 0.08);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        .ds-accordion-item:hover {
            box-shadow: 0 8px 24px rgba(0, 128, 0, 0.1);
            border-color: rgba(0, 128, 0, 0.15);
            transform: translateY(-2px);
        }

        .ds-accordion-item.is-active {
            border-left: 4px solid #008000;
            box-shadow: 0 12px 32px rgba(0, 128, 0, 0.12);
        }

        .ds-accordion-trigger {
            width: 100%;
            padding: 24px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            border: none;
            cursor: pointer;
            text-align: left;
            position: relative;
            transition: background 0.3s ease;
        }

        .ds-accordion-trigger:hover {
            background: linear-gradient(90deg, rgba(0, 128, 0, 0.02) 0%, transparent 100%);
        }

        .ds-card-title {
            font-size: 17px;
            font-weight: 600;
            color: #1F2937;
            line-height: 1.5;
            padding-right: 20px;
            transition: color 0.3s ease;
            margin: 0;
        }

        .ds-accordion-item.is-active .ds-card-title {
            color: #008000;
        }

        .ds-arrow-icon {
            width: 24px;
            height: 24px;
            position: relative;
            flex-shrink: 0;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ds-arrow-icon::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 8px;
            height: 8px;
            border-right: 2px solid #008000;
            border-bottom: 2px solid #008000;
            transform: translate(-50%, -70%) rotate(45deg);
            transition: all 0.3s ease;
        }

        .ds-accordion-item.is-active .ds-arrow-icon {
            transform: rotate(180deg);
        }

        .ds-accordion-item.is-active .ds-arrow-icon::before {
            border-color: #E58E24;
        }

        .ds-accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .ds-accordion-item.is-active .ds-accordion-content {
            max-height: 600px;
        }

        .ds-body-text {
            padding: 0 32px 24px 32px;
            margin: 0;
            font-size: 15px;
            line-height: 1.8;
            color: #4B5563;
            border-top: 1px solid transparent;
        }

        .ds-accordion-item.is-active .ds-body-text {
            border-top-color: rgba(0, 128, 0, 0.06);
            padding-top: 20px;
            margin-top: 4px;
        }

        @media (max-width: 768px) {
            .ds-faq-section {
                padding: 3rem 0;
            }

            .ds-accordion-grid {
                grid-template-columns: 1fr;
            }

            .ds-accordion-trigger {
                padding: 20px 24px;
            }

            .ds-card-title {
                font-size: 16px;
            }

            .ds-body-text {
                padding: 0 24px 20px 24px;
                font-size: 14px;
            }

            .ds-subtitle::before,
            .ds-subtitle::after {
                display: none;
            }
        }
    </style>

    <section class="ds-faq-section">
        <div class="container">
            <x-section-header subtitle="Common Questions"
                              title="Frequently Asked Questions" />

            <div class="ds-accordion-grid">
                @foreach ($faqs as $index => $faq)
                    <div class="ds-accordion-item"
                         data-index="{{ $index }}">
                        <button type="button"
                                class="ds-accordion-trigger"
                                aria-expanded="false">
                            <h3 class="ds-card-title">{{ $faq['question'] ?? '' }}</h3>
                            <span class="ds-arrow-icon"></span>
                        </button>
                        <div class="ds-accordion-content">
                            <div class="ds-accordion-inner">
                                <p class="ds-body-text">{{ $faq['answer'] ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const items = document.querySelectorAll('.ds-accordion-item');

            items.forEach(item => {
                const trigger = item.querySelector('.ds-accordion-trigger');
                const content = item.querySelector('.ds-accordion-content');

                trigger.addEventListener('click', () => {
                    const isActive = item.classList.contains('is-active');

                    items.forEach(i => {
                        i.classList.remove('is-active');
                        const c = i.querySelector('.ds-accordion-content');
                        if (c) c.style.maxHeight = '0';
                        const t = i.querySelector('.ds-accordion-trigger');
                        if (t) t.setAttribute('aria-expanded', 'false');
                    });

                    if (!isActive) {
                        item.classList.add('is-active');
                        if (content) content.style.maxHeight = content.scrollHeight + 'px';
                        trigger.setAttribute('aria-expanded', 'true');
                    }
                });
            });
        });
    </script>
@endif
