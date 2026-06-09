import { initHeader } from "./components/header.js";

document.addEventListener("DOMContentLoaded", () => {
    initHeader();
});

document.addEventListener("DOMContentLoaded", () => {
    
    // 1. Snappier, High-Performance Lenis Configuration Setup
    const lenis = new Lenis({
        duration: 0.8,              // Reduced from 1.2 to eliminate lag/delay feels
        lerp: 0.1,                  // Linear interpolation factor for tight mouse matching
        easing: (t) => t === 1 ? 1 : 1 - Math.pow(2, -10 * t), 
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 0.9,       // Subtle mitigation to normalize extreme hardware tick updates
        smoothTouch: false,         // Keep hardware-native touch active on smart screens
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    // 2. Cinematic Reveal Observer Engine
    const revealOptions = {
        root: null,
        rootMargin: '0px 0px -10% 0px',
        threshold: 0.1
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); 
            }
        });
    }, revealOptions);

    const revealElements = document.querySelectorAll('.reveal-up');
    revealElements.forEach(el => {
        revealObserver.observe(el);
    });
});

document.addEventListener("DOMContentLoaded", () => {
    
   const isRTL = document.documentElement.dir === 'rtl';

    // Helper: Logic to scroll in the correct direction based on language
    const scrollTrackHandler = (track, direction) => {
        const scrollAmount = 400; // Default scroll distance
        const cardWidth = track.querySelector('.category-slider-card')?.clientWidth || 320;
        const distance = (track.id === 'categories-scroll-track') ? (cardWidth + 12) : scrollAmount;
        
        // If RTL: Next (right arrow) should scroll negative, Prev (left arrow) should scroll positive
        // If LTR: Next should scroll positive, Prev should scroll negative
        const multiplier = (direction === 'next') ? (isRTL ? -1 : 1) : (isRTL ? 1 : -1);
        
        track.scrollBy({ 
            left: distance * multiplier, 
            behavior: 'smooth' 
        });
    };

    // 1. Lightbox System Selectors
    const modal = document.getElementById('video-modal-lightbox');
    const modalFrame = modal?.querySelector('.modal-window-frame');
    const iframeTarget = document.getElementById('modal-iframe-injection-target');
    const closeButtons = modal?.querySelectorAll('.modal-close-btn, .container-close-overlay');
    const videoTriggers = document.querySelectorAll('.video-trigger-wrapper');

    // 2. INSIGHTS SLIDER
    const scrollTrack = document.getElementById('insights-scroll-track');
    const navControls = document.getElementById('insights-nav-controls');
    const prevBtn = document.getElementById('insights-prev-btn');
    const nextBtn = document.getElementById('insights-next-btn');

    const checkHorizontalOverflow = () => {
        if (!scrollTrack || !navControls) return;
        const hasOverflow = scrollTrack.scrollWidth > scrollTrack.clientWidth;
        
        if (hasOverflow && window.innerWidth >= 768) {
            navControls.classList.remove('hidden', 'opacity-0', 'pointer-events-none', 'translate-x-4');
            navControls.classList.add('flex', 'opacity-100', 'pointer-events-auto', 'translate-x-0');
        } else {
            navControls.classList.remove('opacity-100', 'pointer-events-auto', 'translate-x-0');
            navControls.classList.add('opacity-0', 'pointer-events-none', 'translate-x-4');
        }
    };

    setTimeout(checkHorizontalOverflow, 300);
    window.addEventListener('resize', checkHorizontalOverflow);

   if (nextBtn && prevBtn && scrollTrack) {
        nextBtn.addEventListener('click', () => scrollTrackHandler(scrollTrack, 'next'));
        prevBtn.addEventListener('click', () => scrollTrackHandler(scrollTrack, 'prev'));
    }

    // 3. CATEGORIES SLIDER & RTL-COMPATIBLE SMOOTH AUTO-SLIDE
    const catTrack = document.getElementById('categories-scroll-track');
    const catControls = document.getElementById('categories-nav-controls');
    const catPrevBtn = document.getElementById('categories-prev-btn');
    const catNextBtn = document.getElementById('categories-next-btn');
    const catToggleBtn = document.getElementById('toggle-categories-grid-btn');
    const catCards = document.querySelectorAll('.category-slider-card');

    let animationFrameId = null;
    let isPaused = false;
    const speed = 0.8; // Change this value to adjust smoothness/speed (lower = slower & smoother)

    const smoothScrollLoop = () => {
        if (!catTrack || catTrack.classList.contains('grid') || isPaused) {
            animationFrameId = requestAnimationFrame(smoothScrollLoop);
            return;
        }

        const maxScroll = catTrack.scrollWidth - catTrack.clientWidth;
        
        // Normalize scroll position to handle variation across different browser RTL implementations
        let currentScroll = catTrack.scrollLeft;

        if (isRTL) {
            // In standard RTL, scrollLeft moves from 0 down to negative maxScroll
            // Or in some older engines, maxScroll down to 0. We handle both cleanly:
            if (currentScroll > 0) { 
                // Engine style where RTL starts at maxScroll and goes to 0
                currentScroll -= speed;
                if (currentScroll <= 5) currentScroll = maxScroll;
            } else {
                // Standard engine style where RTL starts at 0 and goes negative
                currentScroll -= speed;
                if (Math.abs(currentScroll) >= maxScroll - 5) currentScroll = 0;
            }
        } else {
            // Standard LTR scroll logic
            currentScroll += speed;
            if (currentScroll >= maxScroll - 5) currentScroll = 0;
        }

        catTrack.scrollLeft = currentScroll;
        animationFrameId = requestAnimationFrame(smoothScrollLoop);
    };

    const startAutoSlide = () => {
        isPaused = false;
        if (!animationFrameId) {
            animationFrameId = requestAnimationFrame(smoothScrollLoop);
        }
    };

    const stopAutoSlide = () => {
        isPaused = true;
    };

    const checkCategoriesOverflow = () => {
        if (!catTrack || !catControls || catTrack.classList.contains('layout-broken-to-grid')) return;
        const hasOverflow = catTrack.scrollWidth > catTrack.clientWidth;

        if (hasOverflow) {
            catControls.style.setProperty('display', 'flex', 'important');
            catControls.classList.remove('opacity-0', 'pointer-events-none');
            catControls.classList.add('opacity-100', 'pointer-events-auto');
        } else {
            catControls.classList.remove('opacity-100', 'pointer-events-auto');
            catControls.classList.add('opacity-0', 'pointer-events-none');
        }
    };

    if (catPrevBtn && catNextBtn && catTrack) {
        catNextBtn.onclick = null;
        catPrevBtn.onclick = null;

        catNextBtn.addEventListener('click', () => {
            stopAutoSlide();
            scrollTrackHandler(catTrack, 'next');
            // Give the user 2 seconds of stillness after clicking before resuming auto-slide
            setTimeout(startAutoSlide, 2000);
        });
        catPrevBtn.addEventListener('click', () => {
            stopAutoSlide();
            scrollTrackHandler(catTrack, 'prev');
            setTimeout(startAutoSlide, 2000);
        });
        console.log("Navigation buttons attached successfully.");
    } else {
        console.error("Navigation buttons or track NOT found in DOM. Check IDs!");
    }

    setTimeout(checkCategoriesOverflow, 400);
    window.addEventListener('resize', checkCategoriesOverflow);

if (catToggleBtn && catTrack) {
    let itemsAreExpandedAsGrid = false;

    // Grab the localized translations safely from the HTML data-attributes
    const textAll = catToggleBtn.getAttribute('data-text-all') || "View All Categories";
    const textCollapse = catToggleBtn.getAttribute('data-text-collapse') || "Collapse to Track";

    catToggleBtn.addEventListener('click', () => {
        itemsAreExpandedAsGrid = !itemsAreExpandedAsGrid;

        if (itemsAreExpandedAsGrid) {
            stopAutoSlide();

            if (catControls) {
                catControls.style.visibility = 'hidden'; 
                catControls.style.opacity = '0';
            }

            // Break layout to grid
            catTrack.classList.remove('flex', 'flex-row', 'flex-nowrap', 'overflow-x-auto');
            catTrack.classList.add('grid', 'grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-6', 'gap-1' ,'w-full');
            catTrack.style.display = 'grid';

            catCards.forEach(card => card.classList.add('w-full'));
            
            // --- FIXED LINE: Dynamically sets Arabic or English based on active translation file ---
            catToggleBtn.textContent = textCollapse; 
            
        } else {
            if (catControls) {
                catControls.style.visibility = 'visible';
                catControls.style.opacity = '1';
            }

            // Restore slider layout
            catTrack.classList.remove('grid', 'grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-4', 'gap-4');
            catTrack.classList.add('flex', 'flex-row', 'flex-nowrap', 'overflow-x-auto');
            catTrack.style.display = 'flex';

            catCards.forEach(card => card.classList.remove('w-full'));
            
            // --- FIXED LINE: Dynamically sets Arabic or English based on active translation file ---
            catToggleBtn.textContent = textAll;

            startAutoSlide();
        }

        if (typeof lenis !== 'undefined') {
            setTimeout(() => lenis.resize(), 100);
        }
    });
}

    // Initialize Auto-slide lifecycle events with Hover Pausing
    if (catTrack) {
        startAutoSlide();
        catTrack.addEventListener('mouseenter', stopAutoSlide);
        catTrack.addEventListener('mouseleave', startAutoSlide);
        
        // Touch support for mobile devices
        catTrack.addEventListener('touchstart', stopAutoSlide);
        catTrack.addEventListener('touchend', startAutoSlide);
    }

    // --- Lightbox Dynamic Initialization Lifecycle Hooks ---
    if (modal && iframeTarget) {
        videoTriggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                const videoId = trigger.getAttribute('data-video-id');
                iframeTarget.innerHTML = `<iframe class="w-full h-full" src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                
                modal.classList.remove('invisible');
                modal.classList.add('opacity-100');
                modalFrame?.classList.remove('scale-95', 'opacity-0');
                modalFrame?.classList.add('scale-100', 'opacity-100');
                
                if (typeof lenis !== 'undefined') lenis.stop();
            });
        });

        const closeLightboxVideoWindow = () => {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            modalFrame?.classList.remove('scale-100', 'opacity-100');
            modalFrame?.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('invisible');
                iframeTarget.innerHTML = ''; 
                if (typeof lenis !== 'undefined') lenis.start();
            }, 500);
        };

        closeButtons?.forEach(btn => btn.addEventListener('click', closeLightboxVideoWindow));
        
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('invisible')) {
                closeLightboxVideoWindow();
            }
        });
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const metricsSection = document.getElementById('expo-metrics-blueprint');
    const cards = document.querySelectorAll('.metric-blueprint-card, .blueprint-metric-card');

    if (!metricsSection) return;

    const animateNumericCounter = (odometerElement, targetValue) => {
        let currentProgressValue = 0;
        const totalDurationTime = 2000; 
        const frameRefreshRate = 1000 / 60; 
        const iterationSteps = totalDurationTime / frameRefreshRate;
        const incrementStepRatio = targetValue / iterationSteps;

        const processTickFrame = () => {
            currentProgressValue += incrementStepRatio;
            if (currentProgressValue >= targetValue) {
                odometerElement.textContent = Math.floor(targetValue).toLocaleString();
            } else {
                odometerElement.textContent = Math.floor(currentProgressValue).toLocaleString();
                requestAnimationFrame(processTickFrame);
            }
        };
        requestAnimationFrame(processTickFrame);
    };

    const metricObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                metricsSection.classList.add('is-visible');

                cards.forEach(card => {
                    const odometerNode = card.querySelector('.metric-odometer');
                    const targetLimit = parseInt(card.getAttribute('data-target-value'), 10);
                    
                    if (odometerNode && !isNaN(targetLimit)) {
                        setTimeout(() => {
                            animateNumericCounter(odometerNode, targetLimit);
                        }, 200);
                    }
                    
                    const revealNodes = card.querySelectorAll('.reveal-up');
                    revealNodes.forEach(node => node.classList.add('is-visible'));
                });

                observer.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        threshold: 0.1 
    });

    metricObserver.observe(metricsSection);
});

class ModularEditorialSlider {
    constructor(containerId, rotationSpeed = 5000) {
        this.container = document.getElementById(containerId);
        if (!this.container) return;

        this.slides = this.container.querySelectorAll('.editorial-slide');
        this.indicators = this.container.querySelectorAll('.editorial-pill-indicator');
        this.rotationSpeed = rotationSpeed;
        this.activeIndex = 0;
        this.loopTimer = null;

        this.init();
    }

    init() {
        this.updateViewportState(0);
        this.startEngineTimer();

        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                this.stopEngineTimer();
                this.updateViewportState(index);
                this.startEngineTimer();
            });
        });
    }

    updateViewportState(targetIndex) {
        if (!this.slides[this.activeIndex] || !this.indicators[this.activeIndex]) return;

        this.slides[this.activeIndex].classList.remove('is-active');
        this.indicators[this.activeIndex].classList.remove('is-active');

        this.activeIndex = targetIndex;

        this.slides[this.activeIndex].classList.add('is-active');
        this.indicators[this.activeIndex].classList.add('is-active');
    }

    rotateSlideNext() {
        let nextIndex = (this.activeIndex + 1) % this.slides.length;
        this.updateViewportState(nextIndex);
    }

    startEngineTimer() {
        this.loopTimer = setInterval(() => this.rotateSlideNext(), this.rotationSpeed);
    }

    stopEngineTimer() {
        if (this.loopTimer) {
            clearInterval(this.loopTimer);
        }
    }
}

function initializeAllSliders() {
    const fairMomentsSlider = new ModularEditorialSlider('fair-moments-slider', 5000);
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeAllSliders);
} else {
    initializeAllSliders();
}

//About image popup on hover
const follower = document.getElementById('image-follower');
    const img = document.getElementById('follower-img');
    const pillars = document.querySelectorAll('.pillar');

    document.addEventListener('mousemove', (e) => {
        // Only move if not on mobile/tablet (using window innerWidth check)
        if (window.innerWidth > 1024) {
            follower.style.left = e.clientX + 'px';
            follower.style.top = e.clientY + 'px';
        }
    });

    pillars.forEach(pillar => {
        pillar.addEventListener('mouseenter', () => {
            if (window.innerWidth > 1024) {
                img.src = pillar.getAttribute('data-img');
                follower.style.opacity = '1';
            }
        });
        pillar.addEventListener('mouseleave', () => {
            if (window.innerWidth > 1024) {
                follower.style.opacity = '0';
            }
        });
    });