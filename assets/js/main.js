import { initHeader } from "./components/header.js";

document.addEventListener("DOMContentLoaded", () => {
    initHeader();
});

document.addEventListener("DOMContentLoaded", () => {
    
    // 1. Initialize Lenis Smooth Scroll (assuming Lenis CDN is loaded in head)
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), 
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false, // Prevents mobile jitter
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    // 2. Cinematic Reveal Observer
    const revealOptions = {
        root: null,
        rootMargin: '0px 0px -10% 0px', // Triggers slightly before element is fully in view
        threshold: 0.1
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // Unobserve to run the animation only once for a premium feel
                observer.unobserve(entry.target); 
            }
        });
    }, revealOptions);

    // Attach observer to all elements with the .reveal-up class
    const revealElements = document.querySelectorAll('.reveal-up');
    revealElements.forEach(el => {
        revealObserver.observe(el);
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // 1. Lightbox System Selectors
    const modal = document.getElementById('video-modal-lightbox');
    const modalFrame = modal.querySelector('.modal-window-frame');
    const iframeTarget = document.getElementById('modal-iframe-injection-target');
    const closeButtons = modal.querySelectorAll('.modal-close-btn, .container-close-overlay');
    const videoTriggers = document.querySelectorAll('.video-trigger-wrapper');

    // 2. Navigation Control System Selectors
    const scrollTrack = document.getElementById('insights-scroll-track');
    const navControls = document.getElementById('insights-nav-controls');
    const prevBtn = document.getElementById('insights-prev-btn');
    const nextBtn = document.getElementById('insights-next-btn');

    // --- Dynamic Overflow Control Checker ---
    const checkHorizontalOverflow = () => {
        if (!scrollTrack || !navControls) return;
        
        // Check if the scrollable content is wider than the visible screen container
        const hasOverflow = scrollTrack.scrollWidth > scrollTrack.clientWidth;
        
        if (hasOverflow && window.innerWidth >= 768) {
            navControls.classList.remove('hidden', 'opacity-0', 'pointer-events-none', 'translate-x-4');
            navControls.classList.add('flex', 'opacity-100', 'pointer-events-auto', 'translate-x-0');
        } else {
            navControls.classList.remove('opacity-100', 'pointer-events-auto', 'translate-x-0');
            navControls.classList.add('opacity-0', 'pointer-events-none', 'translate-x-4');
        }
    };

    // Initialize overflow metrics and attach layout event watch pipelines
    setTimeout(checkHorizontalOverflow, 300); // Small timeout to ensure fonts/layout render first
    window.addEventListener('resize', checkHorizontalOverflow);

    // Click Handler Rules for Glassmorphism Buttons
    if (nextBtn && prevBtn && scrollTrack) {
        const scrollAmount = 400; // Pixels per scroll increment click action
        
        nextBtn.addEventListener('click', () => {
            scrollTrack.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
        
        prevBtn.addEventListener('click', () => {
            scrollTrack.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
    }

    // --- Open Lightbox Action Lifecycle Hook ---
    videoTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const videoId = trigger.getAttribute('data-video-id');
            
            // Build embed frame structure with modern luxury parameter options
            iframeTarget.innerHTML = `<iframe class="w-full h-full" src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            
            // Activate state transitions smoothly
            modal.classList.remove('invisible');
            modal.classList.add('opacity-100');
            modalFrame.classList.remove('scale-95', 'opacity-0');
            modalFrame.classList.add('scale-100', 'opacity-100');
            
            // Stop Lenis background scrolling while watching video
            if (typeof lenis !== 'undefined') lenis.stop();
        });
    });

    // --- Close Lightbox Lifecycle Hook ---
    const closeLightboxVideoWindow = () => {
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        modalFrame.classList.remove('scale-100', 'opacity-100');
        modalFrame.classList.add('scale-95', 'opacity-0');
        
        // Wait for CSS transition timing before wiping structural frames completely
        setTimeout(() => {
            modal.classList.add('invisible');
            iframeTarget.innerHTML = ''; // Safely wipes dynamic frame nodes to completely kill video execution threads
            if (typeof lenis !== 'undefined') lenis.start();
        }, 500);
    };

    closeButtons.forEach(btn => btn.addEventListener('click', closeLightboxVideoWindow));
    
    // Accessibility check: Close on Escape Key Press
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('invisible')) {
            closeLightboxVideoWindow();
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const metricsSection = document.getElementById('expo-metrics-blueprint');
    
    // Fix: Query both spellings to safely catch whichever class is present in your HTML
    const cards = document.querySelectorAll('.metric-blueprint-card, .blueprint-metric-card');

    if (!metricsSection) return;

    // Kinematic Odometer Multiplier Animation Loop
    const animateNumericCounter = (odometerElement, targetValue) => {
        let currentProgressValue = 0;
        const totalDurationTime = 2000; // Total runtime window in milliseconds (2 seconds)
        const frameRefreshRate = 1000 / 60; // Locked 60FPS Refresh Matrix 
        const iterationSteps = totalDurationTime / frameRefreshRate;
        const incrementStepRatio = targetValue / iterationSteps;

        const processTickFrame = () => {
            currentProgressValue += incrementStepRatio;
            if (currentProgressValue >= targetValue) {
                // Ensure exact terminal target string mapping with appropriate localized commas
                odometerElement.textContent = Math.floor(targetValue).toLocaleString();
            } else {
                odometerElement.textContent = Math.floor(currentProgressValue).toLocaleString();
                requestAnimationFrame(processTickFrame);
            }
        };
        requestAnimationFrame(processTickFrame);
    };

    // Shared Structural Intersection Observer Lifecycle Monitor
    const metricObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add execution flag class to fire line-drawing transformations
                metricsSection.classList.add('is-visible');

                // Trigger individual countdown increments sequentially
                cards.forEach(card => {
                    const odometerNode = card.querySelector('.metric-odometer');
                    const targetLimit = parseInt(card.getAttribute('data-target-value'), 10);
                    
                    if (odometerNode && !isNaN(targetLimit)) {
                        // Small micro-delay for numbers to match the vector tracking flow
                        setTimeout(() => {
                            animateNumericCounter(odometerNode, targetLimit);
                        }, 200);
                    }
                    
                    // Activate reveal-up components inside columns cleanly
                    const revealNodes = card.querySelectorAll('.reveal-up');
                    revealNodes.forEach(node => node.classList.add('is-visible'));
                });

                // Unbind target stream immediately to protect rendering resources
                observer.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        // Premium UX Fix: Reduced threshold to 0.1 so it triggers reliably on mobile viewports and short screens
        threshold: 0.1 
    });

    metricObserver.observe(metricsSection);
});

