<?php
/**
 * These variables are injected from index.php
 * @var string $lang
 * @var array $about_pillars
 * @var array $app_connect_data
 * @var array $insights_data
 * @var array $sponsors 
 * @var array $metrics 
 * @var array $moments_data 
 * @var array $home_categories_blueprint 
 * @var array $mirzaam_years_blueprint 
 * @var array $_form_config 
 */
?>

<?php if (isset($hero_media) && is_array($hero_media)): ?>

<section id="hero" class="relative w-full h-screen overflow-hidden flex flex-col">

    <?php foreach ($hero_media as $media): ?>
        <?php if (isset($media['type']) && $media['type'] === 'video'): ?>
            <video  autoplay loop muted playsinline
                   poster="<?= $media['poster'] ?? '' ?>"
                   class="absolute inset-0 w-full h-full object-cover"
                   style="will-change: transform;">
                <source src="<?= $media['src'] ?? '' ?>" type="video/mp4">
            </video>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40"></div>

    <div class="relative z-10 flex-grow flex items-center justify-center">
        <!-- h1 kept commented — restore when content is ready -->
        <!-- <h1 class="text-[clamp(4rem,12vw,14rem)] font-bold  leading-[1] tracking-tighter uppercase text-center">
            <span class="text-transparent stroke-text italic" style="-webkit-text-stroke: 1px white;">
                <?= __('hero_title') ?> <br/>
            </span>
            <span class="text-transparent stroke-text italic" style="-webkit-text-stroke: 1px white;">
                <?= __('hero_year') ?>
            </span>
        </h1> -->
    </div>
    <div class="relative z-10 w-full px-6 md:px-20 pb-12 flex flex-col md:flex-row justify-between items-end gap-8">

        <!-- wv-reveal + data-reveal → slides up on page load, no delay -->
        <div class="max-w-sm wv-reveal" data-reveal>
            <h3 class="text-lg font-bold mb-2"><?= __('hero_foundation_title') ?></h3>
            <p class="text-white/60 text-sm leading-relaxed font-light">
                <?= __('hero_foundation_desc') ?>
            </p>
        </div>

        <!-- wv-reveal + data-delay="150" → staggered 150ms after the left block -->
       <button class="group flex items-center gap-4 text-white/90 hover:text-white transition-all duration-300 wv-reveal video-trigger-wrapper"
        data-video-id="ACvtkFcBD4o"
        data-reveal data-delay="150">
    <span class="uppercase tracking-[0.2em] text-sm"><?= __('watch_teaser') ?></span>
    <span class="w-12 h-12 border border-white/20 rounded-full flex items-center justify-center group-hover:scale-110 group-hover:border-[var(--primary)] transition-all">
        <span class="ml-1">▶</span>
    </span>
</button>

    </div>
</section>

<?php endif; ?>


<section id="about" class="relative w-full py-12 bg-black text-white overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">

    <!-- Desktop image follower — homepage only, guarded in main.js -->
    <div id="image-follower" class="fixed top-0 left-0 w-80 h-80 pointer-events-none z-50 opacity-0 transition-opacity duration-300 translate-x-[-100%] translate-y-[-110%] hidden lg:block">
        <img id="follower-img" src="" class="w-full h-full object-cover rounded-2xl shadow-2xl border border-white/10" />
    </div>

    <div class="w-full px-6 md:px-12 lg:px-20 relative z-10">

        <!-- ── HEADLINE + DESC ──────────────────────────────── -->
        <!-- mb reduced on mobile: mb-12 md:mb-24 -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 mb-12 lg:mb-24 items-end">

            <!-- Headline: each line wrapped in overflow-hidden for split reveal -->
            <div class="lg:col-span-7">
                <h2 class="text-[clamp(2.5rem,7vw,6rem)] font-bold  leading-[0.95] tracking-tighter uppercase">

                    <!-- Line 1 -->
                    <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="0">
                        <span class="line-reveal"><?= __('about_headline_part1') ?></span>
                    </span>

                    <!-- Line 2 — italic, grey -->
                    <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="80">
                        <span class="line-reveal text-gray-500 italic"><?= __('about_headline_stroke') ?></span>
                    </span>

                    <!-- Line 3 -->
                    <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="160">
                        <span class="line-reveal"><?= __('about_headline_part2') ?></span>
                    </span>

                </h2>
            </div>

            <!-- Description — fades in 280ms after first headline line -->
            <!-- border-l only on lg so it doesn't show broken on mobile -->
            <div class="lg:col-span-5 lg:border-l border-white/20 lg:pl-8 wv-reveal" data-reveal data-delay="280">
                <p class="text-lg md:text-xl text-white/80 leading-relaxed font-normal tracking-wide max-w-prose">
                    <?= __('about_desc') ?>
                </p>
            </div>
        </div>

        <!-- ── PILLAR CARDS ─────────────────────────────────── -->
        <!-- Each pillar staggers 120ms after the previous one -->
     <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <?php foreach ($about_pillars as $idx => $item): ?>
        <div class="pillar group border-t border-white/20 pt-8 cursor-pointer transition-all duration-500 hover:border-[var(--primary)] wv-reveal flex flex-col"
             data-reveal
             data-delay="<?= $idx * 120 ?>"
             data-img="<?= $item['image'] ?>">

            <div class="text-gray-300 text-xs font-bold font-mono mb-4 uppercase tracking-widest">
                <?= __($item['title']) ?>
            </div>

            <h3 class="text-2xl font-bold mb-4">
                <?= __($item['heading']) ?>
            </h3>

            <p class="text-white/60 group-hover:text-white transition-colors duration-500 leading-relaxed font-normal tracking-wide flex-1">
                <?= __($item['desc']) ?>
            </p>

            <img src="<?= $item['image'] ?>"
                 class="lg:hidden w-full aspect-[4/3] object-cover rounded-xl mt-6"
                 loading="lazy" />

        </div>
    <?php endforeach; ?>
</div>

    </div>
</section>

<section id="expo-metrics-blueprint" class="relative w-full py-12 bg-black overflow-hidden" dir="ltr">
    
    <div class="absolute inset-0 pointer-events-none opacity-[0.15]" style="background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 0); background-size: 20px 20px;"></div>

    <div class="w-full px-6 md:px-12 lg:px-16 mx-auto relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-6 sm:gap-x-12 gap-y-12 items-start">
            
            <?php foreach ($metrics as $metric): ?>
            <div class="blueprint-metric-card flex items-start justify-center gap-4 sm:gap-6 group relative p-5 sm:p-6 rounded-2xl border border-white/[0.04] bg-white/[0.02] lg:bg-transparent lg:border-transparent transition-all duration-500 lg:hover:bg-white/[0.01]" data-target-value="<?= $metric['value'] ?>">
                <div class="absolute inset-0 bg-indigo-500/0 lg:group-hover:bg-indigo-500/[0.03] rounded-2xl blur-xl transition-all duration-500 pointer-events-none"></div>
                
                <div class="flex flex-col items-center flex-1 relative z-10">
                    <div class="w-full max-w-[180px] aspect-[1.4/1] mb-6 relative flex items-center justify-center">
                        <svg viewBox="0 0 160 110" class="blueprint-svg w-full h-full stroke-current text-[var(--secondary)] lg:text-[var(--secondary)] lg:group-hover:text-white transition-colors duration-500 fill-none stroke-linecap-round stroke-linejoin-round">
    <?= $metric['svg'] ?>
</svg>
                    </div>
                    <div class="reveal-up text-center w-full">
                        <span class="metric-odometer block text-3xl sm:text-4xl md:text-5xl  font-medium text-white tracking-tight mb-2">0</span>
<span class="block text-[10px] sm:text-xs font-semibold tracking-widest uppercase text-white/80  ">
    <?= ($lang === 'ar') ? $metric['ar'] : $metric['en'] ?>
</span>                    </div>
                </div>
<div class="vertical-arabic-label text-gray-300  text-[10px] sm:text-xs font-light select-none lg:group-hover:text-white/60 transition-colors duration-300 self-end mb-2 sm:mb-4 relative z-10" dir="rtl">
    <?= ($lang === 'ar') ? $metric['en'] : $metric['ar'] ?>
</div>            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>


<?php
$_rtl = ($lang === 'ar');
$_dir = $_rtl ? 'rtl' : 'ltr';
$_bp  = isset($base_path) ? $base_path : '';
?>

<section id="app-connect"
         class="relative bg-[#303030] w-full py-16 text-[var(--text-light)] overflow-hidden"
         dir="<?= $_dir ?>">

    <!-- Ambient glow — unchanged -->
    <div class="section-glow absolute bottom-0 <?= $_rtl ? 'left-1/4' : 'right-1/4' ?>
                w-[35rem] h-[35rem] bg-[var(--secondary)]
                rounded-full blur-[130px] opacity-[0.06] pointer-events-none"></div>

    <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-end">

            <!-- ══ LEFT — BOT + PHONE ══════════════════════════ -->
            <div class="lg:col-span-6 relative lg:flex grid items-end justify-center gap-6">

                <!-- BOT COLUMN — desktop only.
                     A: FIXED overlap bug — was using absolute
                     positioning with a huge negative bottom offset
                     (bottom-[-12rem] on lg) that pushed the canvas
                     out of the section entirely, into whatever
                     comes next on the page. Now the canvas sits
                     inside a properly sized, constrained container
                     that stays within this section's bounds.
                     E: slide-in animation added — bot-slide-in +
                     wv-reveal, reuses the site's existing scroll
                     reveal observer, no new JS needed. -->
                <div class="hidden md:flex flex-col items-center gap-3 flex-shrink-0 bot-slide-in wv-reveal"
                     data-reveal data-delay="200">

                   

                    <!-- Robot — constrained container, no more
                         overflow into the next section -->
                    <div class="relative w-[280px] h-[280px] lg:w-[320px] lg:h-[320px]">
                        <canvas id="app-bot-canvas"
                                width="500" height="360"
                                data-src="<?= $_bp ?>/assets/animations/chatbot.riv"
                                class="opacity-0 transition-opacity duration-700 absolute inset-0 w-full h-full object-contain">
                        </canvas>
                    </div>
                </div>

                <!-- PHONE MOCKUP — unchanged dimensions -->
                <div class="relative w-[280px] sm:w-[320px] h-[36rem] sm:h-[40rem]
                            drop-shadow-[0_25px_50px_rgba(0,0,0,0.8)] flex-shrink-0 wv-reveal" data-reveal>

                    <img src="<?= $app_connect_data['frame_image'] ?>"
                         alt="iPhone Frame"
                         class="absolute inset-0 w-full h-full z-40 pointer-events-none object-contain"
                         onerror="this.style.display='none';" />

                    <div class="absolute top-[2%] bottom-[2%] left-[5%] right-[5%]
                                bg-white rounded-[2.2rem] z-20 overflow-hidden">

                        <div id="view-container" class="relative w-full h-full">

                            <!-- HOME -->
                            <div id="mockup-home"
                                 class="absolute inset-0 w-full h-full z-20 bg-white
                                        overflow-y-auto scroll-container
                                        transition-opacity duration-300 opacity-100">
                                <div class="relative w-full block">
                                    <!--
                                        B: The black bar cutting across the
                                        Arabic title text near the top of
                                        this screenshot is baked into the
                                        source image file itself — not
                                        something CSS/HTML can fix. When
                                        re-exporting $app_connect_data['home_image'],
                                        check for: a stray dark rectangle/
                                        overlay layer left visible in the
                                        export, or a leftover status-bar
                                        mockup element positioned incorrectly.
                                        Re-export the screenshot with that
                                        element removed or repositioned.
                                    -->
                                    <img src="<?= $app_connect_data['home_image'] ?>"
                                         alt="App Home"
                                         class="w-full h-auto block"
                                         onerror="this.parentNode.innerHTML='<div style=\'display:flex;align-items:center;justify-content:center;height:24rem;background:#f4f4f5;color:#a1a1aa;font-size:12px\'>App Preview</div>';" />

                                    <!-- D: hotspot-pulse class added — subtle
                                         animated ring signals these are
                                         tappable, instead of relying only
                                         on a static glow -->
                                    <button onclick="switchAppView('map')"
                                            style="--glow-color: var(--primary);"
                                            class="hotspot-pulse absolute top-[40%] right-[2%] z-40
                                                   w-[7.3rem] md:w-[8.3rem] h-[3.2rem] md:h-[3.7rem]
                                                   rounded-[1.5rem] bg-[var(--primary)]/20
                                                   border-2 border-white sharp-glow
                                                   transition-all duration-300
                                                   hover:scale-105 active:scale-95 cursor-pointer"
                                            aria-label="Open Map"></button>

                                    <button onclick="switchAppView('chat')"
                                            style="--glow-color: #3b82f6;"
                                            class="hotspot-pulse absolute top-[12%] left-[12%] z-40
                                                   w-[12rem] md:w-[13.7rem] h-[2.6rem] md:h-[3rem]
                                                   rounded-[1.5rem] bg-blue-500/20
                                                   border-2 border-white sharp-glow
                                                   transition-all duration-300
                                                   hover:scale-105 active:scale-95 cursor-pointer"
                                            aria-label="Open Chat"></button>
                                </div>
                            </div>

                            <!-- MAP -->
                            <div id="mockup-map"
                                 class="absolute inset-0 w-full h-full z-10 bg-white
                                        overflow-y-auto scroll-container
                                        transition-opacity duration-300 opacity-0 pointer-events-none">
                                <img src="<?= $app_connect_data['map_image'] ?>"
                                     alt="App Map" class="w-full h-auto block" />
                            </div>

                            <!-- CHAT -->
                            <div id="mockup-chat"
                                 class="absolute inset-0 w-full h-full z-10 bg-[#f0f2f5]
                                        overflow-y-auto scroll-container
                                        transition-opacity duration-300 opacity-0 pointer-events-none">
                                <img src="<?= $app_connect_data['chat_image'] ?>"
                                     alt="App Chat" class="w-full h-auto block" />
                            </div>
                        </div>

                        <!-- Back button -->
                        <button id="mockup-back-btn"
                                onclick="switchAppView('home')"
                                dir="ltr"
                                class="absolute top-8 left-4 z-50
                                       bg-black/70 backdrop-blur-xl border border-white/10
                                       text-white px-2 py-1 rounded-full text-[10px] font-medium
                                       shadow-xl flex items-center gap-1
                                       opacity-0 pointer-events-none transition-all duration-300">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                            </svg>
                            <span><?= __('app_back') ?></span>
                        </button>
                    </div>
                </div>

                <!-- C: "Experience the App" — now a real link.
                     Default: smooth-scrolls down to the store
                     badges within this same section (keeps the
                     visitor on-page, doesn't assume iOS/Android).
                     Change the href to a direct store link or
                     video trigger if you'd rather it do something
                     else. -->
                <a href="#app-connect-stores"
                   class="group hidden md:flex x absolute bottom-4  <?= $_rtl ? 'right-0' : 'left-4' ?> md:bottom-8
                          inline-flex items-center gap-2 px-4 py-2.5 rounded-full
                          border border-white/15 bg-black/20 backdrop-blur-sm
                          text-white/80 hover:text-white hover:border-white/30
                          text-xs font-medium transition-all duration-300">
                    <?= __('experience_app') ?: 'Experience the App' ?>
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform duration-200 <?= $_rtl ? 'rotate-180' : '' ?>"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <!-- ══ RIGHT — TEXT ════════════════════════════════ -->
            <div class="lg:col-span-6 flex flex-col justify-center">

                <div class="flex items-center gap-4 mb-6 wv-reveal" data-reveal>
                    <span class="w-8 h-[2px] bg-[var(--secondary)]"></span>
                    <span class="font-mono text-[11px] tracking-[0.3em] uppercase
                                 text-[var(--secondary)] font-semibold">
                        <?= __('app_subhead') ?>
                    </span>
                </div>

                <!-- G: title contrast improved — middle line was
                     text-white/40 (quite faint on this dark bg),
                     bumped to /60 for better legibility while
                     still reading as visually "lighter" than the
                     other two lines -->
                <?php $app_title_lines = explode('|', __('app_title')); ?>
                <h2 class="text-4xl md:text-5xl lg:text-[3.5rem] font-medium
                           leading-[1.1] text-white tracking-tight mb-8">
                    <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="0">
                        <span class="line-reveal"><?= trim($app_title_lines[0] ?? '') ?></span>
                    </span>
                    <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="100">
                        <span class="line-reveal text-white/60 font-light">
                            <?= trim($app_title_lines[1] ?? '') ?>
                        </span>
                    </span>
                    <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="200">
                        <span class="line-reveal"><?= trim($app_title_lines[2] ?? '') ?></span>
                    </span>
                </h2>

                <!-- H: description contrast improved — was
                     #9CA3AF on #303030 (borderline contrast for
                     body text at this size), lightened to #B4B9C2 -->
                <p class="text-base md:text-lg leading-[1.8]
                          font-light max-w-xl mb-12" style="color:#B4B9C2;">
                    <?= __('app_desc') ?>
                </p>

                <!-- F: store badges — hover lift + shadow added,
                     matching the site's other button hover language -->
                <div id="app-connect-stores" class="flex flex-wrap gap-4 items-center scroll-mt-24">
                    <a href="<?= $app_connect_data['apple_link'] ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-block transition-all duration-300
                              hover:-translate-y-1 hover:shadow-[0_12px_28px_-8px_rgba(0,0,0,0.5)]
                              active:translate-y-0"
                       aria-label="<?= __('alt_apple') ?>">
                        <img src="<?= $app_connect_data['app_store'] ?>"
                             alt="<?= __('alt_apple') ?>"
                             class="h-12 w-auto border border-white/80 rounded-xl bg-black" />
                    </a>
                    <a href="<?= $app_connect_data['google_link'] ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-block transition-all duration-300
                              hover:-translate-y-1 hover:shadow-[0_12px_28px_-8px_rgba(0,0,0,0.5)]
                              active:translate-y-0"
                       aria-label="<?= __('alt_google') ?>">
                        <img src="<?= $app_connect_data['google_play'] ?>"
                             alt="<?= __('alt_google') ?>"
                             class="h-12 w-auto border border-white/80 rounded-xl bg-black" />
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
/* E: robot slide-in — lg+ only, reuses the existing wv-reveal/
   is-in scroll observer already running in main.js */
@media (min-width: 1024px) {
    .bot-slide-in {
        transform: translateX(-120%);
        opacity: 0;
        transition: transform 900ms cubic-bezier(0.16, 1, 0.3, 1),
                    opacity 700ms ease-out;
    }
    .bot-slide-in.is-in {
        transform: translateX(0);
        opacity: 1;
    }
}

/* D: hotspot pulse — subtle animated ring draws the eye to the
   tappable map/categories overlays without needing a tooltip */
.hotspot-pulse::after {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: inherit;
    border: 2px solid var(--glow-color, #fff);
    opacity: 0.6;
    animation: hotspot-pulse-ring 2.2s ease-out infinite;
    pointer-events: none;
}
@keyframes hotspot-pulse-ring {
    0%   { transform: scale(1);    opacity: 0.6; }
    70%  { transform: scale(1.15); opacity: 0; }
    100% { transform: scale(1.15); opacity: 0; }
}
@media (prefers-reduced-motion: reduce) {
    .hotspot-pulse::after { animation: none; }
}
</style>


<section id="insights-reviews" class="relative w-full py-12 bg-black text-[var(--text-light)] overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">

    <div class="section-glow absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[60rem] h-[35rem] bg-[var(--primary)] rounded-full blur-[180px] opacity-10 pointer-events-none"></div>

    <!-- Header row — title + desc only -->
    <div class="w-full px-8 md:px-12 lg:px-16 mx-auto relative z-10 mb-12 md:mb-16">
        <div class="reveal-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium text-white tracking-tight leading-tight uppercase">
                <?= __('insight_main_title') ?>
            </h2>
            <p class="mt-4 text-white/40 text-sm md:text-base font-light max-w-xl leading-relaxed uppercase">
                <?= __('insight_desc') ?>
            </p>
        </div>
    </div>

    <!-- Relative wrapper now spans the FULL section width — not
         the padded content container — so the buttons can float
         outside the card row, in the open gutter space near the
         true section edges, instead of being pinned right at the
         first/last card's boundary. -->
    <div class="relative w-full">

        <!-- Prev — floats outside the card row, circular control
             with more breathing room and a softer, more "floating"
             feel than the previous boxed square buttons -->
        <button id="insights-prev-btn"
                class="flex absolute left-3 lg:left-6 top-1/2 -translate-y-1/2 -mt-3  z-30
                       w-10 h-10 lg:w-14 lg:h-14 rounded-full
                       bg-black/70 border border-white/20 text-white
                       items-center justify-center backdrop-blur-xl
                       shadow-[0_8px_28px_rgba(0,0,0,0.5)]
                       hover:bg-white hover:text-black hover:border-white hover:scale-110
                       active:scale-95
                       transition-all duration-300
                       opacity-0 pointer-events-none"
                aria-label="Previous">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 class="w-4 h-4 lg:w-5 lg:h-5 transform <?= ($lang === 'ar' ? 'rotate-180' : '') ?>">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
            </svg>
        </button>

        <!-- Next — mirrored, same treatment -->
        <button id="insights-next-btn"
                class="flex absolute right-3 lg:right-6 top-1/2 -translate-y-1/2 -mt-3  z-30
                       w-10 h-10 lg:w-14 lg:h-14 rounded-full
                       bg-black/70 border border-white/20 text-white
                       items-center justify-center backdrop-blur-xl
                       shadow-[0_8px_28px_rgba(0,0,0,0.5)]
                       hover:bg-white hover:text-black hover:border-white hover:scale-110
                       active:scale-95
                       transition-all duration-300
                       opacity-0 pointer-events-none"
                aria-label="Next">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 class="w-4 h-4 lg:w-5 lg:h-5 transform <?= ($lang === 'ar' ? 'rotate-180' : '') ?>">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
            </svg>
        </button>

        <!-- Padding now lives only on the track's container, not
             on the relative wrapper the buttons position against -->
        <div class="w-full px-6 md:px-12 lg:px-16 mx-auto relative z-10">
            <div id="insights-scroll-track" class="flex overflow-x-auto gap-6 pb-8 snap-x snap-mandatory responsive-scroll-behavior" style="-webkit-overflow-scrolling: touch;">

                <?php foreach ($insights_data as $item): ?>
                <div class="min-w-[20rem] max-h-[14rem] md:min-w-[28rem] md:max-h-[18rem] aspect-[4/5] snap-start group relative rounded-2xl overflow-hidden bg-[var(--background-alt)] border border-white/5 reveal-up">
                    <div class="video-trigger-wrapper w-full h-full cursor-pointer relative overflow-hidden" data-video-id="<?= $item['video_id'] ?>">

                        <div class="absolute top-3 left-3 z-20 rounded-[10%] bg-black/50 backdrop-blur-md border border-white/10 flex items-center justify-center transition-all duration-300">
                            <img src="<?= $item['logo'] ?>" alt="Brand Logo" class="h-8 w-auto object-contain brightness-10 grayscale transition-all duration-300 group-hover:brightness-100 group-hover:grayscale-0" />
                        </div>

                        <img src="<?= $item['img_src'] ?>" alt="Leader Insight" class="thumbnail-target w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-out scale-100 group-hover:scale-105" loading="lazy" />

                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>

                        <div class="absolute inset-0 flex items-center justify-center z-20">
                            <div class="w-16 h-16 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-2xl transition-all duration-300 transform group-hover:scale-110 group-hover:bg-[var(--secondary)] group-hover:text-white group-hover:border group-hover:border-[var(--secondary)]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-0.5"><path d="M8 5.14v14c0 .86.94 1.39 1.66.9l10-7c.61-.43.61-1.37 0-1.8l-10-7C8.94 3.75 8 4.28 8 5.14z"/></svg>
                            </div>
                        </div>

                        <div class="absolute bottom-3 left-3 right-3 z-20 text-right" dir="rtl">
                            <h3 class="text-md text-white drop-shadow-md">
                                <?= __($item['title']) ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>
<?php
/**
 * REPLACE the entire old <section id="sponsors-portfolio">...</section>
 * block (and its duplicated data-loading code above it) with this.
 */

if (!isset($sponsors_data_2025)) {
    $data_path = __DIR__ . '/../data/participantsdata-2025.php';
    if (file_exists($data_path)) require $data_path;
}

$platinum_items = $sponsors_data_2025['platinum']['items'] ?? [];

$tier_1_row = array_map(function ($item) {
    $item['tier_tag'] = __($item['tier_tag']);
    return $item;
}, array_values(array_filter($platinum_items, fn($item) => ($item['sub_tier'] ?? '') === 'tier_1')));

$tier_2_row = array_map(function ($item) {
    $item['tier_tag'] = __($item['tier_tag']);
    return $item;
}, array_values(array_filter($platinum_items, fn($item) => ($item['sub_tier'] ?? '') === 'tier_2')));

$sponsorsTheme              = 'dark'; // glass cards, white text
$sponsorsSectionHeading     = __('sponsors_heading');
$sponsorsSectionSubheading  = __('sponsors_subheading');
$sponsorsViewAllUrl         = get_url($lang === 'ar' ? 'ar/participants/2025' : 'participants/2025');
$sponsorsViewAllLabel       = __('view_all_participants') ?: 'View All Participants';

include 'includes/sponsors-portfolio/template.php';
?>




<div id="fair-moments-slider" class="editorial-slider-container relative w-full min-h-screen bg-black overflow-hidden flex flex-col justify-between py-6 md:py-12" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    
    <div class="absolute inset-0 z-20 pointer-events-none bg-gradient-to-t from-black/60 via-transparent to-black/30"></div>
    <div class="absolute inset-0 z-20 pointer-events-none bg-white/[0.01]"></div>

    <div class="slider-panels-track absolute inset-0 w-full h-full z-10">
        <?php foreach ($moments_data as $index => $moment): ?>
        <div class="editorial-slide absolute inset-0 w-full h-full flex flex-col <?= $moment['justify_class'] ?> py-12">
            <img src="<?= $moment['img_src'] ?>" alt="Previous Fair Moment <?= $index + 1 ?>" class="absolute inset-0 w-full h-full object-cover transform" />
            
            <div class="w-full max-w-4xl mx-auto px-6 text-center relative z-30 selection:bg-white selection:text-black">
                <div class="flex flex-col items-center justify-center space-y-2 md:space-y-4">
                    <h3 class="text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl f italic font-light tracking-wide leading-none capitalize drop-shadow-md">
                        <?= __($moment['title']) ?>
                    </h3>
                    <h2 class="text-white text-[10px] sm:text-xs md:text-sm lg:text-base  font-medium tracking-[0.2em] sm:tracking-[0.35em] uppercase drop-shadow-md">
                        <?= __($moment['sub']) ?>
                    </h2>
                    
                    <?php if (!empty($moment['year_key']) && !empty(__($moment['year_key']))): ?>
                        <p class="text-white/90 text-base sm:text-lg md:text-2xl  italic font-light tracking-wider pt-0.5 drop-shadow-sm">
                            <?= __($moment['year_key']) ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="w-full relative z-30 opacity-0 pointer-events-none select-none"></div>

    <div class="w-full max-w-7xl mx-auto px-6 md:px-12 relative z-30 flex items-center justify-center mt-auto mb-2 md:mb-4">
        <div class="slider-nav-indicators flex items-center gap-2.5 md:gap-3">
            <?php foreach ($moments_data as $index => $moment): ?>
                <button class="editorial-pill-indicator" aria-label="View Exhibit Panel <?= $index + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
    </div>
</div>



<?php
$cat_slider_title    = __('section_title');
$cat_slider_subtitle = __('section_subtitle');
include 'includes/category-slider/template.php';
?>


<?php
$_rtl = ($lang === 'ar');

// ── Dynamic split — scales with however many reviews exist ──
// Rule: last 2 reviews are always static (desktop only), every
// remaining review goes into the rotating featured slider.
//   3 total  → 1 featured, 2 static   (was broken before — a
//              3-review array left the static column empty,
//              since the old code always sliced [3,2])
//   5 total  → 3 featured, 2 static
//   8 total  → 6 featured, 2 static
//   ≤2 total → everything featured, static column hidden
$_total_reviews = count($home_reviews_blueprint);
if ($_total_reviews <= 2) {
    $featured_reviews = $home_reviews_blueprint;
    $static_reviews   = [];
} else {
    $static_reviews   = array_slice($home_reviews_blueprint, -2);
    $featured_reviews = array_slice($home_reviews_blueprint, 0, $_total_reviews - 2);
}

// ── Fallback avatar helper ───────────────────────────────────
// If a review has no image (or it fails to load), show initials
// in a gold-tinted circle instead — same fallback pattern
// already used for sponsor logos elsewhere on the site, so it
// stays visually consistent rather than introducing a generic
// stock photo asset.
function review_initials($name) {
    $name = trim($name);
    if ($name === '') return '?';
    $parts = preg_split('/\s+/', $name);
    $initials = strtoupper(substr($parts[0], 0, 1));
    if (count($parts) > 1) {
        $initials .= strtoupper(substr(end($parts), 0, 1));
    }
    return $initials;
}
?>

<section id="reviews"
         class="relative w-full py-20 lg:py-28 bg-black text-white overflow-hidden border-y border-white/5"
         dir="<?= $_rtl ? 'rtl' : 'ltr' ?>">

    <div class="absolute bottom-0 <?= $_rtl ? 'left-0' : 'right-0' ?>
                w-[50rem] h-[30rem] bg-[var(--secondary)]
                rounded-full blur-[180px] opacity-[0.04] pointer-events-none"></div>

    <div class="w-full px-6 md:px-12 lg:px-20 mx-auto relative z-10">

        <!-- ══ HEADER ════════════════════════════════════════ -->
        <div class="mb-14 lg:mb-20 max-w-3xl">
            <div class="flex items-center gap-4 mb-6 wv-reveal" data-reveal>
                <span class="w-8 h-[2px] bg-[var(--secondary)]"></span>
                <span class="font-mono text-[11px] tracking-[0.3em] uppercase
                             text-[var(--secondary)] font-semibold">
                    <?= __('reviews_eyebrow') ?>
                </span>
            </div>

            <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium uppercase
                       leading-tight tracking-tight">
                <span class="line-reveal-wrap wv-reveal uppercase" data-reveal data-delay="0">
                    <span class="line-reveal text-white/40 font-light">
                        <?= __('reviews_title_top') ?>
                    </span>
                </span>
                <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="100">
                    <span class="line-reveal text-white">
                        <?= __('reviews_title_main') ?>
                    </span>
                </span>
            </h2>
        </div>

        <!-- ══════════════════════════════════════════════════
             DESKTOP (lg+) — asymmetric layout, hidden on mobile
        ══════════════════════════════════════════════════════ -->
        <div class="hidden lg:grid grid-cols-12 gap-6 lg:gap-8">

            <!-- Featured carousel -->
            <div class="<?= empty($static_reviews) ? 'col-span-12' : 'col-span-7' ?> wv-reveal" data-reveal data-delay="200">
                <div class="reviews-featured-slider relative
                            bg-gradient-to-br from-white/[0.04] to-white/[0.01]
                            border border-white/10 rounded-2xl
                            p-8 md:p-12 lg:p-14
                            min-h-[28rem] lg:min-h-[32rem]
                            overflow-hidden"
                     data-slider-id="desktop">

                    <span aria-hidden="true"
                          class="absolute top-10 <?= $_rtl ? 'right-6' : 'left-6' ?>
                                text-[4rem] lg:text-[10rem]
                                leading-none text-[var(--secondary)]/15
                                select-none pointer-events-none">"</span>

                    <?php foreach ($featured_reviews as $i => $review):
                        $_name = __('review_name_' . $review['key']);
                    ?>
                        <article class="reviews-slide <?= $i === 0 ? 'is-active' : '' ?>
                                        absolute inset-0 p-8 md:p-12 lg:p-14
                                        flex flex-col justify-between
                                        transition-opacity duration-700">

                            <span class="font-mono text-[10px] tracking-[0.3em] uppercase
                                         text-white/30 mb-8 self-start">
                                <?= sprintf('%02d', $i + 1) ?> / <?= sprintf('%02d', count($featured_reviews)) ?>
                            </span>

                            <p class="text-lg md:text-2xl lg:text-3xl font-light
                                      leading-relaxed text-white/90
                                      max-w-2xl my-auto relative z-10">
                                <?= __('review_quote_' . $review['key']) ?>
                            </p>

                            <div class="flex items-center gap-4 mt-8 pt-8 border-t border-white/10">
                                <div class="w-12 h-12 rounded-full overflow-hidden
                                            border border-white/20 flex-shrink-0
                                            grayscale hover:grayscale-0 transition-all duration-500
                                            bg-[var(--secondary)]/15 flex items-center justify-center">
                                    <?php if (!empty($review['image'])): ?>
                                    <img src="<?= $review['image'] ?>"
                                         alt="<?= htmlspecialchars($_name) ?>"
                                         class="w-full h-full object-cover"
                                         loading="lazy"
                                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                                    <?php endif; ?>
                                    <span class="<?= !empty($review['image']) ? 'hidden' : 'flex' ?> items-center justify-center w-full h-full text-[var(--secondary)] text-sm font-bold">
                                        <?= review_initials($_name) ?>
                                    </span>
                                </div>
                                <div>
                                    <h4 class="font-medium text-white text-base leading-tight"><?= $_name ?></h4>
                                    <p class="text-[11px] uppercase tracking-[0.2em] text-white/40 font-mono mt-1.5">
                                        <?= __('review_role_' . $review['key']) ?>
                                    </p>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <div class="absolute bottom-6 <?= $_rtl ? 'left-8' : 'right-8' ?> z-20 flex items-center gap-2">
                        <?php foreach ($featured_reviews as $i => $r): ?>
                            <button type="button"
                                    class="reviews-dot <?= $i === 0 ? 'is-active' : '' ?>
                                           h-[2px] rounded-full transition-all duration-400 cursor-pointer"
                                    data-slide-index="<?= $i ?>"
                                    aria-label="Show review <?= $i + 1 ?>"></button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Static cards — only rendered when there are any -->
            <?php if (!empty($static_reviews)): ?>
            <div class="col-span-5 flex flex-col gap-6">
                <?php foreach ($static_reviews as $i => $review):
                    $_name = __('review_name_' . $review['key']);
                ?>
                    <article class="group relative flex-1
                                    bg-white/[0.02] border border-white/[0.06]
                                    hover:bg-white/[0.04] hover:border-white/[0.12]
                                    rounded-2xl p-6 md:p-8
                                    transition-all duration-500
                                    wv-reveal"
                             data-reveal data-delay="<?= 300 + $i * 100 ?>">

                        <span aria-hidden="true"
                              class="absolute top-2 <?= $_rtl ? 'right-5' : 'left-5' ?>
                                      text-5xl leading-none text-[var(--secondary)]/20
                                     group-hover:text-[var(--secondary)]/40
                                     transition-colors duration-500
                                     select-none pointer-events-none">"</span>

                        <span class="absolute top-0 <?= $_rtl ? 'left-0' : 'right-0' ?>
                                     w-8 h-8 border-t border-<?= $_rtl ? 'l' : 'r' ?>
                                     border-[var(--secondary)]
                                     opacity-0 group-hover:opacity-100
                                     transition-opacity duration-400 pointer-events-none
                                     <?= $_rtl ? 'rounded-tl-2xl' : 'rounded-tr-2xl' ?>"></span>

                        <div class="relative z-10 pt-6">
                            <p class="text-sm md:text-base font-light leading-relaxed
                                      text-white/70 group-hover:text-white/90
                                      transition-colors duration-500 mb-6">
                                <?= __('review_quote_' . $review['key']) ?>
                            </p>

                            <div class="flex items-center gap-3 pt-4 border-t border-white/[0.06]">
                                <div class="w-10 h-10 rounded-full overflow-hidden
                                            border border-white/10 flex-shrink-0
                                            grayscale group-hover:grayscale-0 transition-all duration-500
                                            bg-[var(--secondary)]/15 flex items-center justify-center">
                                    <?php if (!empty($review['image'])): ?>
                                    <img src="<?= $review['image'] ?>"
                                         alt="<?= htmlspecialchars($_name) ?>"
                                         class="w-full h-full object-cover"
                                         loading="lazy"
                                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                                    <?php endif; ?>
                                    <span class="<?= !empty($review['image']) ? 'hidden' : 'flex' ?> items-center justify-center w-full h-full text-[var(--secondary)] text-xs font-bold">
                                        <?= review_initials($_name) ?>
                                    </span>
                                </div>
                                <div>
                                    <h4 class="text-white text-sm font-medium leading-tight"><?= $_name ?></h4>
                                    <p class="text-[10px] uppercase tracking-[0.18em] text-white/40 font-mono mt-1">
                                        <?= __('review_role_' . $review['key']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- ══════════════════════════════════════════════════
             MOBILE/TABLET (below lg) — everything in ONE
             unified slider, all reviews included, no static
             split at all
        ══════════════════════════════════════════════════════ -->
        <div class="lg:hidden wv-reveal" data-reveal>
            <div class="reviews-featured-slider relative
                        bg-gradient-to-br from-white/[0.04] to-white/[0.01]
                        border border-white/10 rounded-2xl
                        p-6 sm:p-8
                        min-h-[24rem] sm:min-h-[26rem]
                        overflow-hidden"
                 data-slider-id="mobile">

                <span aria-hidden="true"
                      class="absolute top-6 <?= $_rtl ? 'right-4' : 'left-4' ?>
                            text-[3rem] leading-none text-[var(--secondary)]/15
                            select-none pointer-events-none">"</span>

                <?php foreach ($home_reviews_blueprint as $i => $review):
                    $_name = __('review_name_' . $review['key']);
                ?>
                    <article class="reviews-slide <?= $i === 0 ? 'is-active' : '' ?>
                                    absolute inset-0 p-6 sm:p-8
                                    flex flex-col justify-between
                                    transition-opacity duration-700">

                        <span class="font-mono text-[10px] tracking-[0.3em] uppercase
                                     text-white/30 mb-6 self-start">
                            <?= sprintf('%02d', $i + 1) ?> / <?= sprintf('%02d', count($home_reviews_blueprint)) ?>
                        </span>

                        <p class="text-base sm:text-lg font-light leading-relaxed
                                  text-white/90 max-w-2xl my-auto relative z-10">
                            <?= __('review_quote_' . $review['key']) ?>
                        </p>

                        <div class="flex items-center gap-3 mt-6 pt-6 border-t border-white/10">
                            <div class="w-10 h-10 rounded-full overflow-hidden
                                        border border-white/20 flex-shrink-0
                                        bg-[var(--secondary)]/15 flex items-center justify-center">
                                <?php if (!empty($review['image'])): ?>
                                <img src="<?= $review['image'] ?>"
                                     alt="<?= htmlspecialchars($_name) ?>"
                                     class="w-full h-full object-cover"
                                     loading="lazy"
                                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                                <?php endif; ?>
                                <span class="<?= !empty($review['image']) ? 'hidden' : 'flex' ?> items-center justify-center w-full h-full text-[var(--secondary)] text-xs font-bold">
                                    <?= review_initials($_name) ?>
                                </span>
                            </div>
                            <div>
                                <h4 class="font-medium text-white text-sm leading-tight"><?= $_name ?></h4>
                                <p class="text-[10px] uppercase tracking-[0.18em] text-white/40 font-mono mt-1">
                                    <?= __('review_role_' . $review['key']) ?>
                                </p>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

                <div class="absolute bottom-4 <?= $_rtl ? 'left-6' : 'right-6' ?> z-20 flex items-center gap-2">
                    <?php foreach ($home_reviews_blueprint as $i => $r): ?>
                        <button type="button"
                                class="reviews-dot <?= $i === 0 ? 'is-active' : '' ?>
                                       h-[2px] rounded-full transition-all duration-400 cursor-pointer"
                                data-slide-index="<?= $i ?>"
                                aria-label="Show review <?= $i + 1 ?>"></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ══ CAROUSEL SCRIPT — now handles BOTH sliders independently ══ -->
<script>
(function() {
    const SPEED = 7000;

    // Initializes one slider instance — called once per
    // .reviews-featured-slider found on the page (desktop +
    // mobile versions both get their own independent timer)
    function initSlider(root) {
        const slides = root.querySelectorAll('.reviews-slide');
        const dots   = root.querySelectorAll('.reviews-dot');
        if (!slides.length) return;

        let idx = 0;
        let timer;

        const go = (i) => {
            slides[idx]?.classList.remove('is-active');
            dots[idx]?.classList.remove('is-active');
            idx = i;
            slides[idx]?.classList.add('is-active');
            dots[idx]?.classList.add('is-active');
        };

        const next  = () => go((idx + 1) % slides.length);
        const start = () => { timer = setInterval(next, SPEED); };
        const stop  = () => { clearInterval(timer); };

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => { stop(); go(i); start(); });
        });

        root.addEventListener('mouseenter', stop);
        root.addEventListener('mouseleave', start);

        start();
    }

    document.querySelectorAll('.reviews-featured-slider').forEach(initSlider);
})();
</script>
<section class="w-full bg-black py-20 border-t border-white/10">
    <div class="max-w-[1600px] mx-auto px-6 md:px-12">
        
     <div class="flex flex-wrap items-center justify-between gap-6 mb-12">
    <div class="flex items-center gap-4">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
        </svg>
        <h2 class="text-xl md:text-2xl font-bold uppercase tracking-tight text-white ">
            @MirzaamExpo
        </h2>
    </div>
    
    <a href="https://www.instagram.com/mirzaamexpo" class="bg-[#0095f6] hover:bg-[#1877f2] text-white text-sm font-semibold px-6 py-2 rounded-lg transition-all duration-300">
        <span class="lang-en">Follow</span>
        
        <span class="lang-ar">متابعة</span>
    </a>
</div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-2">
            <?php 
            $feed = [
                'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1518780664697-55e3ad937233?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1518780664697-55e3ad937233?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80',

            ];
            
            foreach ($feed as $img): ?>
                <a href="#" class="relative aspect-[3/4] overflow-hidden rounded-md group">
                    <img src="<?php echo $img; ?>" alt="Mirzaam Post" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Final Refined Newsletter Section -->
<?php $_rtl = ($lang === 'ar'); ?>

<section class="w-full bg-black py-16 md:py-32 overflow-hidden border-t border-white/10 relative"
         dir="<?= $_rtl ? 'rtl' : 'ltr' ?>">

    <div class="absolute inset-0 hidden sm:flex items-center justify-center pointer-events-none select-none">
        <h2 class="text-[25vw] md:text-[22vw] font-black uppercase tracking-tighter
                   text-white/[0.06] leading-none whitespace-nowrap">
            MIRZAAM
        </h2>
    </div>

    <div class="px-6 md:px-20 relative z-10 max-w-[1600px] mx-auto">

        <div x-data="fouzForm({
                actionUrl:    '<?= $_form_config['action_url'] ?>',
                subject:      'New Mirzaam Newsletter Subscription',
                successTitle: '<?= addslashes(__('newsletter_success_title')) ?>',
                successDesc:  '<?= addslashes(__('newsletter_success_desc')) ?>',
                failedTitle:  '<?= addslashes(__('newsletter_failed_title')) ?>',
                failedDesc:   '<?= addslashes(__('newsletter_failed_desc')) ?>',
                botDetectedTitle: '<?= addslashes(__('newsletter_failed_title')) ?>',
                botDetectedDesc:  '<?= addslashes(__('newsletter_failed_desc')) ?>',
                autoRevertMs: 5000,
                timeTrapSeconds: <?= $_form_config['time_trap_seconds'] ?>,
                fields: { email: { required: true, email: true } }
             })"
             class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-12 lg:gap-16">

            <div class="max-w-xl">
                <h3 class="text-white text-3xl md:text-5xl font-bold uppercase tracking-tight wv-reveal" data-reveal>
                    <?= __('newsletter_title') ?>
                </h3>
                <p class="text-white/70 text-base md:text-lg mt-4 font-light leading-relaxed wv-reveal" data-reveal data-delay="100">
                    <?= __('newsletter_desc') ?>
                </p>
            </div>

            <div class="w-full lg:w-96 wv-reveal" data-reveal data-delay="200">

                <form x-show="state === 'form' || state === 'submitting'"
                      x-cloak
                      @submit.prevent="submit"
                      class="flex flex-col gap-4">

                    <!-- HONEYPOT — invisible to real users, bots fill
                         it automatically. If filled → submission
                         rejected before it ever reaches FormSubmit.co.
                         DO NOT use display:none — some bots skip those.
                         Instead: visually hidden but still in the DOM. -->
                    <div style="position:absolute;left:-9999px;top:-9999px;" aria-hidden="true">
                        <input type="text" name="_company_fax" x-model="honeypot"
                               tabindex="-1" autocomplete="off">
                    </div>

                    <div class="relative">
                        <input type="email"
                               name="email"
                               x-model="values.email"
                               @input="errors.email = ''"
                               :class="errors.email ? 'border-red-400' : 'border-white/40'"
                               :disabled="state === 'submitting'"
                               placeholder="<?= __('newsletter_placeholder') ?>"
                               class="newsletter-input w-full bg-transparent border-b py-4
                                      text-white placeholder-white/50 outline-none
                                      transition-colors duration-300 tracking-[0.2em] text-sm !x`lowercase
                                      disabled:opacity-50"
                               required>
                        <span class="newsletter-underline absolute bottom-0 <?= $_rtl ? 'right-0' : 'left-0' ?>
                                     h-[1px] w-0 bg-[var(--secondary)] transition-all duration-500 ease-out
                                     pointer-events-none"></span>
                    </div>

                    <p x-show="errors.email" x-cloak x-transition class="text-red-400 text-xs tracking-wider" x-text="errors.email"></p>

                    <button type="submit"
                            :disabled="state === 'submitting'"
                            class="newsletter-btn group relative overflow-hidden w-full bg-white text-black
                                   md:py-4 py-3 font-bold uppercase tracking-[0.25em] text-[11px]
                                   border border-white transition-colors duration-300
                                   disabled:opacity-50 disabled:cursor-wait">
                        <span class="newsletter-btn-fill absolute inset-0 bg-[var(--secondary)]
                                     transform <?= $_rtl ? 'translate-x-full' : '-translate-x-full' ?>
                                     group-hover:translate-x-0 transition-transform duration-500 ease-out"></span>
                        <span class="relative z-10 group-hover:text-black transition-colors duration-300">
                            <span x-show="state === 'form'"><?= __('newsletter_button') ?></span>
                            <span x-show="state === 'submitting'"><?= __('newsletter_submitting') ?></span>
                        </span>
                    </button>

                    <p class="text-white/40 text-[10px] tracking-wider mt-1">
                        <?= __('newsletter_privacy') ?>
                    </p>
                </form>

                <div x-show="state === 'success'" x-cloak
                     x-transition:enter="transition duration-500"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="flex flex-col items-start gap-3 py-4">
                    <div class="w-12 h-12 rounded-full bg-[var(--secondary)]/10 border border-[var(--secondary)]/40 flex items-center justify-center">
                        <svg class="w-6 h-6 text-[var(--secondary)]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h4 class="text-white text-lg font-medium" x-text="successTitle"></h4>
                    <p class="text-white/50 text-sm font-light leading-relaxed" x-text="successDesc"></p>
                </div>

                <div x-show="state === 'failed'" x-cloak x-transition class="flex flex-col items-start gap-3 py-4">
                    <div class="w-12 h-12 rounded-full bg-red-500/10 border border-red-500/40 flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
                        </svg>
                    </div>
                    <h4 class="text-white text-lg font-medium" x-text="failedTitle"></h4>
                    <p class="text-white/50 text-sm font-light leading-relaxed" x-text="failedDesc"></p>
                    <button type="button" @click="retry()"
                            class="mt-2 text-[var(--secondary)] text-xs uppercase tracking-widest hover:text-white transition-colors duration-300">
                        <?= __('newsletter_try_again') ?>
                    </button>
                </div>

            </div>
        </div>
    </div>
</section>

<div id="video-modal-lightbox" class="fixed inset-0 z-[9999] flex items-center justify-center invisible opacity-0 transition-all duration-500 ease-out bg-black/40 backdrop-blur-xl">
    <div class="absolute inset-0 container-close-overlay cursor-pointer"></div>
    
    <div class="relative w-full max-w-6xl aspect-video mx-4 bg-white/[0.03] backdrop-blur-2xl border border-white/15 rounded-3xl overflow-hidden scale-95 opacity-0 transform transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] modal-window-frame shadow-[0_25px_60px_-15px_rgba(0,0,0,0.9)]">
        <button class="absolute top-5 right-5 z-50 w-11 h-11 rounded-xl bg-black/40 border border-white/10 text-white flex items-center justify-center backdrop-blur-md hover:bg-white hover:text-black hover:scale-105 transition-all duration-300 modal-close-btn shadow-lg" aria-label="Close video player">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <div class="w-full h-full" id="modal-iframe-injection-target"></div>
    </div>
</div>

 


    </main>

