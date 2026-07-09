/**
 * main.js — Mirzaam Expo
 * ─────────────────────────────────────────────────────────────
 * Single entry point. All features are isolated init functions
 * called once from one DOMContentLoaded at the bottom.
 *
 * Systems handled:
 *   • Lenis smooth scroll
 *   • Scroll reveal (.reveal-up → is-visible AND .wv-reveal → is-in)
 *   • Expo metrics counter animation
 *   • Video lightbox
 *   • Insights horizontal slider
 *   • Category auto-scroll slider + grid toggle
 *   • Fair Moments editorial slider
 *   • App mockup view switcher
 *   • About section image follower
 * ─────────────────────────────────────────────────────────────
 */

import { initHeader } from './components/header.js';

// ─────────────────────────────────────────────────────────────
// UTILITIES
// ─────────────────────────────────────────────────────────────

/** Debounce — collapses rapid-fire calls (resize, scroll) */
const debounce = (fn, ms = 150) => {
    let timer;
    return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => fn(...args), ms);
    };
};

/** RTL flag — set once from <html dir="rtl/ltr"> */
const IS_RTL = document.documentElement.dir === 'rtl';


// ─────────────────────────────────────────────────────────────
// LENIS SMOOTH SCROLL
// Module-scoped so every init function can call lenis.stop()
// lenis.start() lenis.resize() without typeof guards.
// ─────────────────────────────────────────────────────────────

let lenis = null;

function initLenis() {
    if (typeof Lenis === 'undefined') return;

    lenis = new Lenis({
        duration: 0.8,
        lerp: 0.1,
        easing: t => t === 1 ? 1 : 1 - Math.pow(2, -10 * t),
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 0.9,
        smoothTouch: false,
    });

    const tick = time => { lenis.raf(time); requestAnimationFrame(tick); };
    requestAnimationFrame(tick);

    // Pause Lenis when tab is hidden — saves CPU on background tabs
    document.addEventListener('visibilitychange', () => {
        document.hidden ? lenis.stop() : lenis.start();
    });
}


// ─────────────────────────────────────────────────────────────
// SCROLL REVEAL
// Handles two parallel reveal systems in one IntersectionObserver:
//   .reveal-up  → adds .is-visible  (homepage sections)
//   .wv-reveal  → adds .is-in       (inner pages: about, contact, etc.)
// data-delay attribute (ms) supported on .wv-reveal elements.
// ─────────────────────────────────────────────────────────────

function initScrollReveal() {
    const elA = document.querySelectorAll('.reveal-up:not(.is-visible)');
    const elB = document.querySelectorAll('.wv-reveal[data-reveal]:not(.is-in)');
    const all = [...elA, ...elB];
    if (!all.length) return;

    const io = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const delay = Number(el.dataset.delay || 0);
            const cls = el.classList.contains('wv-reveal') ? 'is-in' : 'is-visible';
            setTimeout(() => el.classList.add(cls), delay);
            obs.unobserve(el);
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -8% 0px' });

    all.forEach(el => io.observe(el));
}

// Re-exposed on window so dynamic content swaps can trigger it
window.initScrollReveal = initScrollReveal;


// ─────────────────────────────────────────────────────────────
// EXPO METRICS COUNTER
// Fires once when the section enters the viewport.
// Animates .metric-odometer from 0 → data-target-value.
// ─────────────────────────────────────────────────────────────

function initMetrics() {
    const section = document.getElementById('expo-metrics-blueprint');
    if (!section) return;

    const cards = section.querySelectorAll('.blueprint-metric-card');
    let fired = false;

    const io = new IntersectionObserver(([entry], obs) => {
        if (!entry.isIntersecting || fired) return;
        fired = true;
        section.classList.add('is-visible');

        cards.forEach(card => {
            card.querySelectorAll('.reveal-up').forEach(el => el.classList.add('is-visible'));

            const odometer = card.querySelector('.metric-odometer');
            const target = parseInt(card.dataset.targetValue, 10);
            if (!odometer || isNaN(target)) return;

            const DURATION_MS = 2000;
            const STEPS = (DURATION_MS / 1000) * 60;
            const step = target / STEPS;
            let current = 0;

            const tick = () => {
                current += step;
                if (current >= target) {
                    odometer.textContent = Math.floor(target).toLocaleString();
                } else {
                    odometer.textContent = Math.floor(current).toLocaleString();
                    requestAnimationFrame(tick);
                }
            };

            setTimeout(() => requestAnimationFrame(tick), 200);
        });

        obs.unobserve(section);
    }, { threshold: 0.1 });

    io.observe(section);
}


// ─────────────────────────────────────────────────────────────
// VIDEO LIGHTBOX
// Triggered by any .video-trigger-wrapper[data-video-id].
// Injects YouTube iframe on open, destroys on close (stops audio).
// ─────────────────────────────────────────────────────────────

function initLightbox() {
    const modal = document.getElementById('video-modal-lightbox');
    if (!modal) return;

    const frame    = modal.querySelector('.modal-window-frame');
    const inject   = document.getElementById('modal-iframe-injection-target');
    const closeBtns = modal.querySelectorAll('.modal-close-btn, .container-close-overlay');

    const open = videoId => {
        if (!inject) return;
        inject.innerHTML = `<iframe class="w-full h-full"
            src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>`;
        modal.classList.remove('invisible');
        modal.classList.add('opacity-100');
        frame?.classList.remove('scale-95', 'opacity-0');
        frame?.classList.add('scale-100', 'opacity-100');
        lenis?.stop();
    };

    const close = () => {
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        frame?.classList.remove('scale-100', 'opacity-100');
        frame?.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('invisible');
            if (inject) inject.innerHTML = '';
            lenis?.start();
        }, 500);
    };

    document.querySelectorAll('.video-trigger-wrapper').forEach(el => {
        el.addEventListener('click', () => open(el.dataset.videoId));
    });

    closeBtns.forEach(btn => btn.addEventListener('click', close));
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && !modal.classList.contains('invisible')) close();
    });
}


// ─────────────────────────────────────────────────────────────
// INSIGHTS HORIZONTAL SLIDER
// Prev / Next buttons + show/hide controls based on overflow.
// RTL-aware scroll direction.
// ─────────────────────────────────────────────────────────────

function initInsightsSlider() {
    const track    = document.getElementById('insights-scroll-track');
    const controls = document.getElementById('insights-nav-controls');
    const prev     = document.getElementById('insights-prev-btn');
    const next     = document.getElementById('insights-next-btn');
    if (!track) return;

    const scroll = dir => {
        const mult = dir === 'next' ? (IS_RTL ? -1 : 1) : (IS_RTL ? 1 : -1);
        track.scrollBy({ left: 400 * mult, behavior: 'smooth' });
    };

    const checkOverflow = debounce(() => {
        if (!controls) return;
        const overflow = track.scrollWidth > track.clientWidth && window.innerWidth >= 768;
        controls.classList.toggle('opacity-0', !overflow);
        controls.classList.toggle('pointer-events-none', !overflow);
        controls.classList.toggle('translate-x-4', !overflow);
        controls.classList.toggle('opacity-100', overflow);
        controls.classList.toggle('pointer-events-auto', overflow);
        controls.classList.toggle('translate-x-0', overflow);
    }, 150);

    setTimeout(checkOverflow, 300);
    window.addEventListener('resize', checkOverflow);
    prev?.addEventListener('click', () => scroll('prev'));
    next?.addEventListener('click', () => scroll('next'));
}


// ─────────────────────────────────────────────────────────────
// CATEGORY AUTO-SCROLL SLIDER
// Runs a requestAnimationFrame loop that scrolls the track
// continuously at a constant speed. Pauses on hover / touch.
// Manual prev/next buttons also pause for 2s then resume.
// Toggle button switches between slider and grid layouts.
// RAF loop persists but skips scroll when paused — avoids the
// restart complexity of cancel + relaunch.
// ─────────────────────────────────────────────────────────────

function initCategorySlider() {
    const track     = document.getElementById('categories-scroll-track');
    const controls  = document.getElementById('categories-nav-controls');
    const prevBtn   = document.getElementById('categories-prev-btn');
    const nextBtn   = document.getElementById('categories-next-btn');
    const toggleBtn = document.getElementById('toggle-categories-grid-btn');
    const cards     = document.querySelectorAll('.category-slider-card');
    const card_shades = document.querySelectorAll('.category-shade');
    if (!track) return;

    const SPEED   = 0.8;
    let paused    = false;
    let expanded  = false;
    let resumeTimer;

    // ── Auto-scroll RAF loop ───────────────────────────────
    const loop = () => {
        if (!paused && !expanded) {
            const max = track.scrollWidth - track.clientWidth;
            let pos = track.scrollLeft;
            if (IS_RTL) {
                // Handle both RTL scroll implementations across browsers
                pos = pos > 0 ? pos - SPEED : pos - SPEED;
                if (Math.abs(pos) >= max - 5) pos = 0;
            } else {
                pos = pos >= max - 5 ? 0 : pos + SPEED;
            }
            track.scrollLeft = pos;
        }
        requestAnimationFrame(loop);
    };
    requestAnimationFrame(loop);

    // ── Pause / Resume helpers ─────────────────────────────
    const pause  = () => { paused = true; };
    const resume = () => { paused = false; };
    const pauseThenResume = (ms = 2000) => {
        pause();
        clearTimeout(resumeTimer);
        resumeTimer = setTimeout(resume, ms);
    };

    // ── Manual navigation ──────────────────────────────────
    const scrollStep = dir => {
        const cardW = cards[0]?.clientWidth || 320;
        const gap   = 12;
        const mult  = dir === 'next' ? (IS_RTL ? -1 : 1) : (IS_RTL ? 1 : -1);
        track.scrollBy({ left: (cardW + gap) * mult, behavior: 'smooth' });
    };

    prevBtn?.addEventListener('click', () => { pauseThenResume(); scrollStep('prev'); });
    nextBtn?.addEventListener('click', () => { pauseThenResume(); scrollStep('next'); });

    // ── Hover / touch pause ────────────────────────────────
    track.addEventListener('mouseenter', pause);
    track.addEventListener('mouseleave', resume);
    track.addEventListener('touchstart', pause,  { passive: true });
    track.addEventListener('touchend',   resume, { passive: true });

    // ── Overflow check → show/hide nav controls ───────────
    const checkOverflow = debounce(() => {
        if (!controls || expanded) return;
        const overflow = track.scrollWidth > track.clientWidth;
        controls.style.visibility = overflow ? 'visible' : 'hidden';
        controls.style.opacity    = overflow ? '1' : '0';
    }, 150);

    setTimeout(checkOverflow, 400);
    window.addEventListener('resize', checkOverflow);

    // ── Grid / Slider toggle ───────────────────────────────
    if (toggleBtn) {
        const textAll      = toggleBtn.dataset.textAll      || 'View All Categories';
        const textCollapse = toggleBtn.dataset.textCollapse || 'Collapse to Track';

        toggleBtn.addEventListener('click', () => {
            expanded = !expanded;

            if (expanded) {
                pause();
                if (controls) { controls.style.visibility = 'hidden'; controls.style.opacity = '0'; }
                track.classList.remove('flex', 'flex-row', 'flex-nowrap', 'overflow-x-auto');
                track.classList.add('grid', 'grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-5', 'gap-1', 'w-full');
                track.style.display = 'grid';
                cards.forEach(c => c.classList.add('!w-full'));
                toggleBtn.textContent = textCollapse;
                card_shades.forEach(shade => shade.classList.add('hidden'));
            } else {
                resume();
                if (controls) { controls.style.visibility = 'visible'; controls.style.opacity = '1'; }
                track.classList.remove('grid', 'grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-6', 'gap-1', 'w-full');
                track.classList.add('flex', 'flex-row', 'flex-nowrap', 'overflow-x-auto');
                track.style.display = 'flex';
                cards.forEach(c => c.classList.remove('!w-full'));
                cards.forEach(c => c.classList.add('w-[240px]'));
                toggleBtn.textContent = textAll;
           card_shades.forEach(shade => shade.classList.remove('hidden'));
               lenis?.resize();

                requestAnimationFrame(() => {
                    const section = document.getElementById('categories-hybrid-section');
                    if (!section) return;
                    const y = section.getBoundingClientRect().top + window.scrollY - 100;
                    window.scrollTo(0, y);
                });

                // Scroll back to the category section after collapse
                setTimeout(() => {
                    const section = document.getElementById('categories-hybrid-section');
                    if (section && lenis) {
                        lenis.scrollTo(section, {
                            offset: -100,
                            duration: 1.1,
                            easing: t => t === 1 ? 1 : 1 - Math.pow(2, -10 * t),
                        });
                    } else if (section) {
                        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }, 80);
            }
        });
    }
}


// ─────────────────────────────────────────────────────────────
// FAIR MOMENTS EDITORIAL SLIDER
// Simple index-based slide switcher with dot indicators.
// Auto-advances every `speed` ms. Dots click to jump.
// ─────────────────────────────────────────────────────────────

class EditorialSlider {
    constructor(id, speed = 5000) {
        this.el     = document.getElementById(id);
        if (!this.el) return;
        this.slides = this.el.querySelectorAll('.editorial-slide');
        this.dots   = this.el.querySelectorAll('.editorial-pill-indicator');
        this.speed  = speed;
        this.idx    = 0;
        this.timer  = null;
        if (!this.slides.length) return;
        this.go(0);
        this.start();
        this.dots.forEach((dot, i) => dot.addEventListener('click', () => {
            this.stop();
            this.go(i);
            this.start();
        }));
    }

    go(i) {
        this.slides[this.idx]?.classList.remove('is-active');
        this.dots[this.idx]?.classList.remove('is-active');
        this.idx = i;
        this.slides[this.idx]?.classList.add('is-active');
        this.dots[this.idx]?.classList.add('is-active');
    }

    next()  { this.go((this.idx + 1) % this.slides.length); }
    start() { this.timer = setInterval(() => this.next(), this.speed); }
    stop()  { clearInterval(this.timer); }
}


// ─────────────────────────────────────────────────────────────
// APP MOCKUP VIEW SWITCHER
// switchAppView() is placed on window because the PHP template
// uses inline onclick="switchAppView('map')". Isolated scroll
// within each mockup screen prevents Lenis from hijacking it.
// ─────────────────────────────────────────────────────────────

function initAppMockup() {
    const SCREENS = { home: 'mockup-home', map: 'mockup-map', chat: 'mockup-chat' };
    const backBtn = document.getElementById('mockup-back-btn');

    window.switchAppView = target => {
        Object.entries(SCREENS).forEach(([key, id]) => {
            const el = document.getElementById(id);
            if (!el) return;
            const active = key === target;
            el.style.opacity       = active ? '1'    : '0';
            el.style.pointerEvents = active ? 'auto' : 'none';
            el.style.zIndex        = active ? '20'   : '10';
            if (active) el.scrollTop = 0;
        });
        if (backBtn) {
            const home = target === 'home';
            backBtn.style.opacity       = home ? '0'    : '1';
            backBtn.style.pointerEvents = home ? 'none' : 'auto';
        }
    };

    // Stop Lenis stealing wheel events inside the scrollable mockup screens
    document.querySelectorAll('.scroll-container').forEach(el => {
        el.addEventListener('wheel', e => {
            e.stopPropagation();
            el.scrollTop += e.deltaY;
        }, { passive: false });
    });
}


// ─────────────────────────────────────────────────────────────
// ABOUT SECTION — IMAGE FOLLOWER
// On desktop, a preview image follows the cursor when hovering
// over the three .pillar cards. Uses lerp for a smooth,
// organic follow rather than an instant snap.
// Only activates when the target elements actually exist
// (homepage only) so it doesn't fire on every page.
// ─────────────────────────────────────────────────────────────

function initImageFollower() {
    const follower = document.getElementById('image-follower');
    const img      = document.getElementById('follower-img');
    const pillars  = document.querySelectorAll('.pillar');
    if (!follower || !img || !pillars.length) return;

    let mx = 0, my = 0;  // mouse target
    let cx = 0, cy = 0;  // current (lerped) position
    const LERP = 0.08;   // lower = smoother/slower follow

    document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });

    const animate = () => {
        cx += (mx - cx) * LERP;
        cy += (my - cy) * LERP;
        follower.style.left = `${cx}px`;
        follower.style.top  = `${cy}px`;
        requestAnimationFrame(animate);
    };
    requestAnimationFrame(animate);

    pillars.forEach(pillar => {
        pillar.addEventListener('mouseenter', () => {
            if (window.innerWidth <= 1024) return;
            img.src = pillar.dataset.img || '';
            follower.style.opacity = '1';
        });
        pillar.addEventListener('mouseleave', () => {
            follower.style.opacity = '0';
        });
    });
}
function initAppBot() {
    const canvas = document.getElementById('app-bot-canvas');
    if (!canvas) return; // not on this page — exits immediately
 
    const src = canvas.dataset.src; // .riv path from data-src attr
    if (!src) return;
 
    // Lazy — only load when canvas enters viewport
    const io = new IntersectionObserver(([entry], obs) => {
        if (!entry.isIntersecting) return;
        obs.unobserve(canvas);
 
        // Dynamically inject Rive runtime script (once only)
        if (!document.getElementById('rive-runtime')) {
            const script = document.createElement('script');
            script.id  = 'rive-runtime';
            script.src = 'https://unpkg.com/@rive-app/canvas@latest';
            script.onload = bootRive;
            document.head.appendChild(script);
        } else {
            bootRive();
        }
    }, { threshold: 0.3 });
 
    io.observe(canvas);
 
    function bootRive() {
        // Small poll — runtime script may still be executing
        if (typeof rive === 'undefined') {
            setTimeout(bootRive, 80);
            return;
        }
 
        const r = new rive.Rive({
            src: src,
            canvas: canvas,
            autoplay: true,
            stateMachines: 'State Machine 1', // ← update if different in your .riv
            onLoad: () => {
                r.resizeDrawingSurfaceToCanvas();
                // Fade in once loaded
                canvas.style.opacity = '1';
            },
            onLoadError: (e) => {
                // Hide canvas if file missing — no broken box
                canvas.style.display = 'none';
                console.warn('App bot .riv not found:', src);
            }
        });
    }
}

document.addEventListener('alpine:init', () => {
    Alpine.data('fouzForm', (config = {}) => ({
 
        // ── Config (passed in per-form) ──────────────────────
        actionUrl:        config.actionUrl        || '',
        subject:          config.subject          || 'New Website Enquiry',
        successTitle:     config.successTitle     || "You're all set.",
        successDesc:      config.successDesc      || 'Thanks — we will be in touch shortly.',
        failedTitle:      config.failedTitle      || 'Something went wrong.',
        failedDesc:       config.failedDesc       || "We couldn't submit your form. Please try again.",
        botDetectedTitle: config.botDetectedTitle || 'Submission blocked.',
        botDetectedDesc:  config.botDetectedDesc  || 'Your submission was flagged as automated. Please try again.',
        autoRevertMs:     config.autoRevertMs     ?? 5000,   // 0 = stay on success screen
        fields:           config.fields           || {},
        timeTrapSeconds:  config.timeTrapSeconds   ?? 3,
 
        // ── State ─────────────────────────────────────────────
        values:    {},
        errors:    {},
        state:     'form',       // 'form' | 'submitting' | 'success' | 'failed'
        honeypot:  '',           // bound to the hidden trap field
        loadedAt:  0,            // timestamp when form initialised
 
        // ── Init ──────────────────────────────────────────────
        init() {
            // Seed values/errors from field config
            Object.keys(this.fields).forEach(name => {
                this.values[name] = '';
                this.errors[name] = '';
            });
 
            // Time-trap: record when the form loaded
            this.loadedAt = Date.now();
        },
 
        // ── Field validation ────────────────────────────────
        validateField(name) {
            const rules = this.fields[name];
            if (!rules) return true;
 
            const val = (this.values[name] || '').trim();
            const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
 
            if (rules.required && val === '') {
                this.errors[name] = rules.requiredMsg || 'This field is required.';
                return false;
            }
            if (rules.email && val && !emailRe.test(val)) {
                this.errors[name] = rules.emailMsg || 'Please enter a valid email address.';
                return false;
            }
            this.errors[name] = '';
            return true;
        },
 
        validateAll() {
            let allValid = true;
            Object.keys(this.fields).forEach(name => {
                if (!this.validateField(name)) allValid = false;
            });
            return allValid;
        },
 
        // ── Anti-spam checks ────────────────────────────────
        isBot() {
            // Check 1: honeypot filled (bots auto-fill hidden fields)
            if (this.honeypot && this.honeypot.trim() !== '') {
                return true;
            }
 
            // Check 2: submitted too fast (< 3 seconds = not human)
            const elapsed = (Date.now() - this.loadedAt) / 1000;
            if (elapsed < this.timeTrapSeconds) {
                return true;
            }
 
            return false;
        },
 
        // ── Submit ────────────────────────────────────────────
        async submit() {
            // Step 1: validate fields
            if (!this.validateAll()) {
                return;
            }
 
            // Step 2: anti-spam check
            if (this.isBot()) {
                this.state = 'failed';
                this.failedTitle = this.botDetectedTitle;
                this.failedDesc  = this.botDetectedDesc;
                return;
            }
 
            // Step 3: submit to FormSubmit.co
            this.state = 'submitting';
 
            try {
                const formData = new FormData();
 
                // User fields
                Object.entries(this.values).forEach(([key, val]) => {
                    formData.append(key, val);
                });
 
                // FormSubmit.co config fields
                formData.append('_subject', this.subject);
                formData.append('_template', 'table');
                formData.append('_captcha', 'false');
 
                const res = await fetch(this.actionUrl, {
                    method: 'POST',
                    body: formData,
                    headers: { 'Accept': 'application/json' },
                });
 
                if (res.ok) {
                    this.state = 'success';
                    Object.keys(this.values).forEach(k => this.values[k] = '');
 
                    if (this.autoRevertMs > 0) {
                        setTimeout(() => { this.state = 'form'; }, this.autoRevertMs);
                    }
                } else {
                    this.state = 'failed';
                }
            } catch (e) {
                this.state = 'failed';
            }
        },
 
        // ── Retry from failed state ───────────────────────────
        retry() {
            this.state = 'form';
            this.loadedAt = Date.now(); // reset time-trap on retry
        },
    }));
});




// ─────────────────────────────────────────────────────────────
// BOOT — single DOMContentLoaded
// All init functions are safe to call even when their target
// elements don't exist on the current page — each one exits
// immediately with an early return if nothing is found.
// ─────────────────────────────────────────────────────────────

document.addEventListener('DOMContentLoaded', () => {
    initHeader();
    initLenis();
    initScrollReveal();
    initMetrics();
    initLightbox();
    initInsightsSlider();
    initCategorySlider();
    initAppMockup();
    initImageFollower();
    initAppBot();
    new EditorialSlider('fair-moments-slider', 5000);
});

