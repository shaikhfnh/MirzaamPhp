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
        <!-- <h1 class="text-[clamp(4rem,12vw,14rem)] font-bold font-alexandria leading-[1] tracking-tighter uppercase text-center">
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
        <button class="group flex items-center gap-4 text-white/90 hover:text-white transition-all duration-300 wv-reveal"
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
                <h2 class="text-[clamp(2.5rem,7vw,6rem)] font-bold font-alexandria leading-[0.95] tracking-tighter uppercase">

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
                <div class="pillar group border-t border-white/20 pt-8 cursor-pointer transition-all duration-500 hover:border-[var(--primary)] wv-reveal"
                     data-reveal
                     data-delay="<?= $idx * 120 ?>"
                     data-img="<?= $item['image'] ?>">

                    <div class="text-gray-300 text-xs font-bold font-mono mb-4 uppercase tracking-widest">
                        <?= __($item['title']) ?>
                    </div>

                    <h3 class="text-2xl font-bold font-alexandria mb-4">
                        <?= __($item['heading']) ?>
                    </h3>

                    <p class="text-white/60 group-hover:text-white transition-colors duration-500 leading-relaxed font-normal tracking-wide">
                        <?= __($item['desc']) ?>
                    </p>

                    <!-- Mobile image — opacity-50 removed, aspect-ratio replaces fixed h-48 -->
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
                        <span class="metric-odometer block text-3xl sm:text-4xl md:text-5xl font-sans font-medium text-white tracking-tight mb-2">0</span>
<span class="block text-[10px] sm:text-xs font-semibold tracking-widest uppercase text-white/80  font-sans">
    <?= ($lang === 'ar') ? $metric['ar'] : $metric['en'] ?>
</span>                    </div>
                </div>
<div class="vertical-arabic-label text-gray-300 font-alexandria text-[10px] sm:text-xs font-light select-none lg:group-hover:text-white/60 transition-colors duration-300 self-end mb-2 sm:mb-4 relative z-10" dir="rtl">
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
         class="relative bg-[#303030] w-full py-16  text-[var(--text-light)] overflow-hidden"
         dir="<?= $_dir ?>">

    <!-- Ambient glow -->
    <div class="section-glow absolute bottom-0 <?= $_rtl ? 'left-1/4' : 'right-1/4' ?>
                w-[35rem] h-[35rem] bg-[var(--secondary)]
                rounded-full blur-[130px] opacity-[0.06] pointer-events-none"></div>

    <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">

            <!-- ══ LEFT — BOT + PHONE ══════════════════════════ -->
            <div class="lg:col-span-6 relative lg:flex grid  items-end justify-center gap-6 wv-reveal"
                 data-reveal>

                <!-- BOT COLUMN — desktop only, sits beside phone -->
                <div class="hidden md:flex flex-col items-center gap-3 mb-16 flex-shrink-0">

                    <!-- Speech bubble -->
                    <div class="app-bot-bubble relative
                                border border-white/[0.12]
                                rounded-2xl rounded-bl-none
                                px-4 py-3 w-[150px]
                                shadow-lg mb-[4rem]">
                        <p class="text-white text-[11px] font-light leading-snug text-center">
                            <?= __('app_bot_bubble') ?>
                        </p>
                        <!-- Tail -->
                        <span class="absolute -bottom-[5rem] <?= $_rtl ? 'right-4' : 'left-4' ?>
                                     w-0 h-0
                                     border-l-[8px] border-l-transparent
                                     border-r-[8px] border-r-transparent
                                     border-t-[8px] border-t-white/[0.12]"></span>
                    </div>

                    <!-- Rive canvas — bot renders here, lazy-booted by main.js -->
                    <canvas id="app-bot-canvas"
                            width="500" height="360"
                            data-src="<?= $_bp ?>/assets/animations/chatbot.riv"
                   class="opacity-0 transition-opacity absolute bg-red-900 w-[600px] h-[360px] duration-700 bottom-[25rem] md:bottom-[30rem] lg:bottom-[-12rem]">                        
                </canvas>
                </div>

                <!-- PHONE MOCKUP — original dimensions unchanged -->
                <div class="relative w-[280px] sm:w-[320px] h-[36rem] sm:h-[40rem]
                            drop-shadow-[0_25px_50px_rgba(0,0,0,0.8)] flex-shrink-0">

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
                                    <img src="<?= $app_connect_data['home_image'] ?>"
                                         alt="App Home"
                                         class="w-full h-auto block"
                                         onerror="this.parentNode.innerHTML='<div style=\'display:flex;align-items:center;justify-content:center;height:24rem;background:#f4f4f5;color:#a1a1aa;font-size:12px\'>App Preview</div>';" />

                                    <button onclick="switchAppView('map')"
                                            style="--glow-color: var(--primary);"
                                            class="absolute top-[40%] right-[2%] z-40
                                                   w-[7.3rem] md:w-[8.3rem] h-[3.2rem] md:h-[3.7rem]
                                                   rounded-[1.5rem] bg-[var(--primary)]/20
                                                   border-2 border-white sharp-glow
                                                   transition-all duration-300
                                                   hover:scale-105 active:scale-95 cursor-pointer"
                                            aria-label="Open Map"></button>

                                    <button onclick="switchAppView('chat')"
                                            style="--glow-color: #3b82f6;"
                                            class="absolute top-[12%] left-[12%] z-40
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
            </div>

            <!-- ══ RIGHT — TEXT ════════════════════════════════ -->
            <div class="lg:col-span-6 flex flex-col justify-center">

                <!-- Yellow bar + eyebrow -->
                <div class="flex items-center gap-4 mb-6 wv-reveal" data-reveal>
                    <span class="w-8 h-[2px] bg-[var(--secondary)]"></span>
                    <span class="font-mono text-[11px] tracking-[0.3em] uppercase
                                 text-[var(--secondary)] font-semibold">
                        <?= __('app_subhead') ?>
                    </span>
                </div>

                <!-- Title — 3 lines split by | in translation file -->
                <?php $app_title_lines = explode('|', __('app_title')); ?>
                <h2 class="text-4xl md:text-5xl lg:text-[3.5rem] font-medium
                           leading-[1.1] font-alexandria text-white tracking-tight mb-8">
                    <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="0">
                        <span class="line-reveal"><?= trim($app_title_lines[0] ?? '') ?></span>
                    </span>
                    <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="100">
                        <span class="line-reveal text-white/40 font-light">
                            <?= trim($app_title_lines[1] ?? '') ?>
                        </span>
                    </span>
                    <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="200">
                        <span class="line-reveal"><?= trim($app_title_lines[2] ?? '') ?></span>
                    </span>
                </h2>

                <!-- Description -->
                <p class="text-base md:text-lg text-[#9CA3AF] leading-[1.8]
                          font-light font-alexandria max-w-xl mb-12">
                    <?= __('app_desc') ?>
                </p>

                <!-- Store buttons -->
                <div class="flex flex-wrap gap-4 items-center">
                    <a href="<?= $app_connect_data['apple_link'] ?>"
                       class="inline-block transition-transform duration-300
                              hover:-translate-y-1 active:translate-y-0"
                       aria-label="<?= __('alt_apple') ?>">
                        <img src="<?= $app_connect_data['app_store'] ?>"
                             alt="<?= __('alt_apple') ?>"
                             class="h-12 w-auto border border-white/80 rounded-xl bg-black" />
                    </a>
                    <a href="<?= $app_connect_data['google_link'] ?>"
                       class="inline-block transition-transform duration-300
                              hover:-translate-y-1 active:translate-y-0"
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


<section id="insights-reviews" class="relative w-full py-12 bg-black text-[var(--text-light)] overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    
    <div class="section-glow absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[60rem] h-[35rem] bg-[var(--primary)] rounded-full blur-[180px] opacity-10 pointer-events-none"></div>

    <div class="w-full px-6 md:px-12 lg:px-16 mx-auto relative z-10 flex align-end md:items-end md:justify-between gap-6 mb-12 md:mb-16">
        <div class="reveal-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium font-alexandria text-white tracking-tight leading-tight">
                <?= __('insight_main_title') ?>
            </h2>
            <p class="mt-4 text-white/40 text-sm md:text-base font-light max-w-xl leading-relaxed">
                <?= __('insight_desc') ?>
            </p>
        </div>

      <div id="insights-nav-controls" class="flex items-center gap-3 align-end  pointer-events-none transition-all duration-500 ease-out translate-x-4">
    
    <button id="insights-prev-btn" class="w-12 h-12  bg-white/5 border border-white/60 text-white flex items-center justify-center backdrop-blur-md hover:bg-white/15 hover:border-white/20 active:scale-95 transition-all duration-300 shadow-xl" aria-label="Previous">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform <?= ($lang === 'ar' ? 'rotate-180' : '') ?>"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
    </button>

    <button id="insights-next-btn" class="w-12 h-12  bg-white/5 border border-white/60 text-white flex items-center justify-center backdrop-blur-md hover:bg-white/15 hover:border-white/20 active:scale-95 transition-all duration-300 shadow-xl" aria-label="Next">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform <?= ($lang === 'ar' ? 'rotate-180' : '') ?>"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
    </button>
</div>
   
    </div>

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
                        <h3 class=" text-md  text-white  drop-shadow-md">
                            <?= __($item['title']) ?>
                        </h3>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php
$_rtl = ($lang === 'ar');

// Safety — ensure data file is loaded
if (!isset($sponsors_data_2025)) {
    $data_path = __DIR__ . '/../data/participantsdata-2025.php';
    if (file_exists($data_path)) require $data_path;
}

$platinum_items = $sponsors_data_2025['platinum']['items'] ?? [];
$tier_1_row = array_filter($platinum_items, fn($item) => ($item['sub_tier'] ?? '') === 'tier_1');
$tier_2_row = array_filter($platinum_items, fn($item) => ($item['sub_tier'] ?? '') === 'tier_2');
?>

<?php
$_rtl = ($lang === 'ar');

if (!isset($sponsors_data_2025)) {
    $data_path = __DIR__ . '/../data/participantsdata-2025.php';
    if (file_exists($data_path)) require $data_path;
}

$platinum_items = $sponsors_data_2025['platinum']['items'] ?? [];
$tier_1_row = array_filter($platinum_items, fn($item) => ($item['sub_tier'] ?? '') === 'tier_1');
$tier_2_row = array_filter($platinum_items, fn($item) => ($item['sub_tier'] ?? '') === 'tier_2');
?>

<section id="sponsors-portfolio"
         class="relative w-full py-16 bg-gradient-to-b from-black via-zinc-950 to-black text-white overflow-hidden"
         dir="<?= $_rtl ? 'rtl' : 'ltr' ?>">

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                w-[75rem] h-[35rem] bg-[var(--secondary)]
                rounded-full blur-[180px] opacity-[0.06] pointer-events-none"></div>

    <!-- Header -->
    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10
                flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
        <div class="wv-reveal" data-reveal>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium font-alexandria text-white tracking-tight leading-tight">
                <?= __('sponsors_heading') ?>
            </h2>
            <p class="mt-4 text-white/40 text-sm md:text-base font-light max-w-xl leading-relaxed">
                <?= __('sponsors_subheading') ?>
            </p>
        </div>
    </div>

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10 flex flex-col gap-6 md:gap-8">

        <!-- Tier 1 -->
        <div class="flex flex-wrap justify-center gap-3 sm:gap-4 md:gap-5">
            <?php foreach ($tier_1_row as $i => $sponsor): ?>
            <div class="group relative rounded-2xl bg-white
                        aspect-square
                        w-[calc(50%-6px)] sm:w-[calc(33.333%-12px)] md:w-[calc(25%-16px)]
                        max-w-[260px]
                        flex flex-col
                        shadow-lg hover:shadow-xl
                        transition-all duration-400
                        border border-zinc-200/50 hover:-translate-y-1
                        overflow-hidden
                        wv-reveal"
                 data-reveal data-delay="<?= $i * 70 ?>">

                <!-- Top bar — tier badge + link -->
                <div class="flex items-center justify-between px-3 pt-3 sm:px-4 sm:pt-4 flex-shrink-0">
                    <span class="text-[9px] sm:text-[10px] font-bold tracking-wider uppercase
                                 text-zinc-400 bg-zinc-50 px-2 py-0.5
                                 rounded-full border border-zinc-100
                                 truncate max-w-[75%]">
                        <?= __($sponsor['tier_tag']) ?>
                    </span>
                    <a href="<?= htmlspecialchars($sponsor['website_url']) ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="text-zinc-400 hover:text-black transition-colors duration-200 p-0.5 flex-shrink-0"
                       aria-label="<?= htmlspecialchars($sponsor['brand_name']) ?>">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/>
                        </svg>
                    </a>
                </div>

                <!-- Logo — fills remaining square space, no max-height -->
                <a href="<?= htmlspecialchars($sponsor['website_url']) ?>"
                   target="_blank" rel="noopener noreferrer"
                   class="flex-1 flex items-center justify-center p-4">
                    <img src="<?= htmlspecialchars($sponsor['logo_url']) ?>"
                         alt="<?= htmlspecialchars($sponsor['brand_name']) ?> Logo"
                         class="w-full h-full object-contain
                                transition-transform duration-300 group-hover:scale-105"
                         loading="lazy"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                    <span class="hidden items-center justify-center
                                 text-zinc-400 text-sm font-medium uppercase tracking-wider">
                        <?= htmlspecialchars($sponsor['brand_name']) ?>
                    </span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Tier 2 -->
        <div class="flex flex-wrap justify-center gap-3 sm:gap-4 md:gap-5">
            <?php foreach ($tier_2_row as $i => $sponsor): ?>
            <div class="group relative rounded-2xl bg-white
                        aspect-square
                        w-[calc(50%-6px)] sm:w-[calc(33.333%-12px)] md:w-[calc(25%-16px)]
                        max-w-[220px]
                        flex flex-col
                        shadow-lg hover:shadow-xl
                        transition-all duration-400
                        border border-zinc-200/50 hover:-translate-y-1
                        overflow-hidden
                        wv-reveal"
                 data-reveal data-delay="<?= (count($tier_1_row) + $i) * 70 ?>">

                <div class="flex items-center justify-between px-3 pt-3 sm:px-4 sm:pt-4 flex-shrink-0">
                    <span class="text-[9px] sm:text-[10px] font-bold tracking-wider uppercase
                                 text-zinc-400 bg-zinc-50 px-2 py-0.5
                                 rounded-full border border-zinc-100
                                 truncate max-w-[75%]">
                        <?= __($sponsor['tier_tag']) ?>
                    </span>
                    <a href="<?= htmlspecialchars($sponsor['website_url']) ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="text-zinc-400 hover:text-black transition-colors duration-200 p-0.5 flex-shrink-0"
                       aria-label="<?= htmlspecialchars($sponsor['brand_name']) ?>">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/>
                        </svg>
                    </a>
                </div>

                <a href="<?= htmlspecialchars($sponsor['website_url']) ?>"
                   target="_blank" rel="noopener noreferrer"
                   class="flex-1 flex items-center justify-center p-4">
                    <img src="<?= htmlspecialchars($sponsor['logo_url']) ?>"
                         alt="<?= htmlspecialchars($sponsor['brand_name']) ?> Logo"
                         class="w-full h-full object-contain
                                transition-transform duration-300 group-hover:scale-105"
                         loading="lazy"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                    <span class="hidden items-center justify-center
                                 text-zinc-400 text-sm font-medium uppercase tracking-wider">
                        <?= htmlspecialchars($sponsor['brand_name']) ?>
                    </span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- View All -->
        <div class="w-full flex justify-center mt-10 wv-reveal" data-reveal data-delay="<?= count($platinum_items) * 70 ?>">
            <a href="<?= isset($base_path) ? $base_path : '' ?>/participants/2025"
               class="inline-flex items-center justify-center gap-3
                      px-10 py-4 border border-white text-white
                      font-medium tracking-wide rounded-full
                      text-xs uppercase bg-transparent
                      hover:bg-white hover:text-black
                      transition-all duration-300 active:scale-95 shadow-md">
                <?= __('view_all_participants') ?? 'View All Participants' ?>
                <svg class="w-3.5 h-3.5 <?= $_rtl ? 'rotate-180' : '' ?>"
                     fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>




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


<?php $_rtl = ($lang === 'ar'); ?>

<section id="reviews"
         class="relative w-full py-20 lg:py-28 bg-black text-white overflow-hidden border-y border-white/5"
         dir="<?= $_rtl ? 'rtl' : 'ltr' ?>">

    <!-- Subtle yellow glow — bottom right -->
    <div class="absolute bottom-0 <?= $_rtl ? 'left-0' : 'right-0' ?>
                w-[50rem] h-[30rem] bg-[var(--secondary)]
                rounded-full blur-[180px] opacity-[0.04] pointer-events-none"></div>

    <div class="w-full px-6 md:px-12 lg:px-20 mx-auto relative z-10">

        <!-- ══ HEADER ════════════════════════════════════════ -->
        <div class="mb-14 lg:mb-20 max-w-3xl">

            <!-- A: Yellow bar + eyebrow -->
            <div class="flex items-center gap-4 mb-6 wv-reveal" data-reveal>
                <span class="w-8 h-[2px] bg-[var(--secondary)]"></span>
                <span class="font-mono text-[11px] tracking-[0.3em] uppercase
                             text-[var(--secondary)] font-semibold">
                    <?= __('reviews_eyebrow') ?>
                </span>
            </div>

            <!-- Title with line-reveal -->
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium font-alexandria
                       leading-tight tracking-tight">
                <span class="line-reveal-wrap wv-reveal" data-reveal data-delay="0">
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

        <!-- ══ C: ASYMMETRIC LAYOUT ══════════════════════════
             Left:  Featured carousel (rotates every 7s)
             Right: 2 static cards stacked
        ══════════════════════════════════════════════════════ -->
        <?php
        // Split — first 3 rotate in featured, last 2 stay static on the right
        $featured_reviews = array_slice($home_reviews_blueprint, 0, 3);
        $static_reviews   = array_slice($home_reviews_blueprint, 3, 2);
        ?>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <!-- ═════════ FEATURED CAROUSEL — LEFT ═════════ -->
            <div class="lg:col-span-7 wv-reveal" data-reveal data-delay="200">
                <div id="reviews-featured-slider"
                     class="reviews-featured-slider relative
                            bg-gradient-to-br from-white/[0.04] to-white/[0.01]
                            border border-white/10 rounded-2xl
                            p-8 md:p-12 lg:p-14
                            min-h-[28rem] lg:min-h-[32rem]
                            overflow-hidden">

                    <!-- B: Massive quote mark — top corner -->
                    <span aria-hidden="true"
                          class="absolute top-4 <?= $_rtl ? 'right-6' : 'left-6' ?>
                                 font-serif text-[10rem] lg:text-[14rem]
                                 leading-none text-[var(--secondary)]/15
                                 select-none pointer-events-none">
                        “
                    </span>

                    <!-- Slide stack -->
                    <?php foreach ($featured_reviews as $i => $review): ?>
                        <article class="reviews-slide
                                        <?= $i === 0 ? 'is-active' : '' ?>
                                        absolute inset-0 p-8 md:p-12 lg:p-14
                                        flex flex-col justify-between
                                        transition-opacity duration-700">

                            <!-- Numbered indicator -->
                            <span class="font-mono text-[10px] tracking-[0.3em] uppercase
                                         text-white/30 mb-8 self-start">
                                <?= sprintf('%02d', $i + 1) ?> / <?= sprintf('%02d', count($featured_reviews)) ?>
                            </span>

                            <!-- Quote — takes most of the card -->
                            <p class="text-lg md:text-2xl lg:text-3xl font-light
                                      leading-relaxed text-white/90
                                      font-alexandria max-w-2xl my-auto
                                      relative z-10">
                                <?= __('review_quote_' . $review['key']) ?>
                            </p>

                            <!-- Author block -->
                            <div class="flex items-center gap-4 mt-8 pt-8 border-t border-white/10">
                                <div class="w-12 h-12 rounded-full overflow-hidden
                                            border border-white/20 flex-shrink-0
                                            grayscale hover:grayscale-0 transition-all duration-500">
                                    <img src="<?= $review['image'] ?>"
                                         alt="<?= htmlspecialchars(__('review_name_' . $review['key'])) ?>"
                                         class="w-full h-full object-cover"
                                         loading="lazy" />
                                </div>
                                <div>
                                    <h4 class="font-medium text-white text-base leading-tight">
                                        <?= __('review_name_' . $review['key']) ?>
                                    </h4>
                                    <p class="text-[11px] uppercase tracking-[0.2em]
                                              text-white/40 font-mono mt-1.5">
                                        <?= __('review_role_' . $review['key']) ?>
                                    </p>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <!-- Dot indicators -->
                    <div class="absolute bottom-6 <?= $_rtl ? 'left-8' : 'right-8' ?>
                                z-20 flex items-center gap-2">
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

            <!-- ═════════ STATIC CARDS — RIGHT ═════════ -->
            <div class="lg:col-span-5 flex flex-col gap-6">
                <?php foreach ($static_reviews as $i => $review): ?>
                    <article class="group relative flex-1
                                    bg-white/[0.02] border border-white/[0.06]
                                    hover:bg-white/[0.04] hover:border-white/[0.12]
                                    rounded-2xl p-6 md:p-8
                                    transition-all duration-500
                                    wv-reveal"
                             data-reveal data-delay="<?= 300 + $i * 100 ?>">

                        <!-- Small corner quote mark -->
                        <span aria-hidden="true"
                              class="absolute top-2 <?= $_rtl ? 'right-5' : 'left-5' ?>
                                     font-serif text-5xl leading-none
                                     text-[var(--secondary)]/20
                                     group-hover:text-[var(--secondary)]/40
                                     transition-colors duration-500
                                     select-none pointer-events-none">
                            “
                        </span>

                        <!-- Yellow corner accent — appears on hover -->
                        <span class="absolute top-0 <?= $_rtl ? 'left-0' : 'right-0' ?>
                                     w-8 h-8 border-t border-<?= $_rtl ? 'l' : 'r' ?>
                                     border-[var(--secondary)]
                                     opacity-0 group-hover:opacity-100
                                     transition-opacity duration-400
                                     pointer-events-none
                                     <?= $_rtl ? 'rounded-tl-2xl' : 'rounded-tr-2xl' ?>"></span>

                        <div class="relative z-10 pt-6">
                            <!-- Quote -->
                            <p class="text-sm md:text-base font-light leading-relaxed
                                      text-white/70 group-hover:text-white/90
                                      transition-colors duration-500
                                      font-alexandria mb-6">
                                <?= __('review_quote_' . $review['key']) ?>
                            </p>

                            <!-- Author -->
                            <div class="flex items-center gap-3 pt-4 border-t border-white/[0.06]">
                                <div class="w-10 h-10 rounded-full overflow-hidden
                                            border border-white/10 flex-shrink-0
                                            grayscale group-hover:grayscale-0
                                            transition-all duration-500">
                                    <img src="<?= $review['image'] ?>"
                                         alt="<?= htmlspecialchars(__('review_name_' . $review['key'])) ?>"
                                         class="w-full h-full object-cover"
                                         loading="lazy" />
                                </div>
                                <div>
                                    <h4 class="text-white text-sm font-medium leading-tight">
                                        <?= __('review_name_' . $review['key']) ?>
                                    </h4>
                                    <p class="text-[10px] uppercase tracking-[0.18em]
                                              text-white/40 font-mono mt-1">
                                        <?= __('review_role_' . $review['key']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<!-- ══ INLINE CAROUSEL SCRIPT ══════════════════════════════
     7-second auto-rotation through featured slides.
     Dots clickable, restart timer on manual change.
══════════════════════════════════════════════════════════ -->
<script>
(function() {
    const root = document.getElementById('reviews-featured-slider');
    if (!root) return;
    const slides = root.querySelectorAll('.reviews-slide');
    const dots   = root.querySelectorAll('.reviews-dot');
    if (!slides.length) return;

    let idx = 0;
    let timer;
    const SPEED = 7000;

    const go = (i) => {
        slides[idx]?.classList.remove('is-active');
        dots[idx]?.classList.remove('is-active');
        idx = i;
        slides[idx]?.classList.add('is-active');
        dots[idx]?.classList.add('is-active');
    };

    const next = () => go((idx + 1) % slides.length);

    const start = () => { timer = setInterval(next, SPEED); };
    const stop  = () => { clearInterval(timer); };

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            stop();
            go(i);
            start();
        });
    });

    // Pause when hovering the whole featured panel
    root.addEventListener('mouseenter', stop);
    root.addEventListener('mouseleave', start);

    start();
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
        <h2 class="text-xl md:text-2xl font-bold uppercase tracking-tight text-white font-alexandria">
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

    <!-- Watermark — opacity refined slightly, hidden on small mobile to avoid overflow -->
    <div class="absolute inset-0 hidden sm:flex items-center justify-center pointer-events-none select-none">
        <h2 class="text-[25vw] md:text-[22vw] font-black uppercase tracking-tighter
                   text-white/[0.1] leading-none whitespace-nowrap">
            MIRZAAM
        </h2>
    </div>

    <div class="px-6 md:px-20 relative z-10 max-w-[1600px] mx-auto">

        <!-- Alpine.js controller — all state lives here -->
        <div x-data="newsletterForm()"
             class="flex flex-col lg:flex-row justify-between items-start lg:items-end
                    gap-12 lg:gap-16">

            <!-- ═══ LEFT — TEXT ═══════════════════════════════ -->
            <div class="max-w-xl">
                <h3 class="text-white text-3xl md:text-5xl font-bold uppercase tracking-tight
                           wv-reveal" data-reveal>
                    <?= __('newsletter_title') ?>
                </h3>
                <p class="text-white/70 text-base md:text-lg mt-4 font-light leading-relaxed
                          wv-reveal" data-reveal data-delay="100">
                    <?= __('newsletter_desc') ?>
                </p>
            </div>

            <!-- ═══ RIGHT — FORM ══════════════════════════════ -->
            <div class="w-full lg:w-96 wv-reveal" data-reveal data-delay="200">

                <!-- FORM STATE — Alpine x-show -->
                <form x-show="state === 'form' || state === 'submitting'"
                      x-cloak
                      @submit.prevent="submit"
                      action="https://formsubmit.co/developer@fnh.group"
                      method="POST"
                      class="flex flex-col gap-4">

                    <!-- FormSubmit.co config -->
                    <input type="hidden" name="_subject" value="New Mirzaam Newsletter Subscription">
                    <input type="hidden" name="_template" value="table">
                    <input type="hidden" name="_captcha" value="false">

                    <!-- Email input with growing yellow underline -->
                    <div class="relative">
                        <input type="email"
                               name="email"
                               x-model="email"
                               @input="error = ''"
                               :class="error ? 'border-red-400' : 'border-white/40'"
                               :disabled="state === 'submitting'"
                               placeholder="<?= __('newsletter_placeholder') ?>"
                               class="newsletter-input
                                      w-full bg-transparent border-b py-4
                                      text-white placeholder-white/50 outline-none
                                      transition-colors duration-300
                                      tracking-[0.2em] text-sm uppercase
                                      disabled:opacity-50"
                               required>
                        <!-- Yellow underline grows from 0 → 100% on focus -->
                        <span class="newsletter-underline absolute bottom-0
                                     <?= $_rtl ? 'right-0' : 'left-0' ?>
                                     h-[1px] w-0 bg-[var(--secondary)]
                                     transition-all duration-500 ease-out
                                     pointer-events-none"></span>
                    </div>

                    <!-- Inline validation message -->
                    <p x-show="error"
                       x-cloak
                       x-transition
                       class="text-red-400 text-xs tracking-wider"
                       x-text="error"></p>

                    <!-- Subscribe button with yellow fill animation -->
                    <button type="submit"
                            :disabled="state === 'submitting'"
                            class="newsletter-btn group relative overflow-hidden
                                   w-full bg-white text-black
                                   md:py-4 py-3
                                   font-bold uppercase tracking-[0.25em] text-[11px]
                                   border border-white
                                   transition-colors duration-300
                                   disabled:opacity-50 disabled:cursor-wait">

                        <!-- Yellow fill — slides from left to right on hover -->
                        <span class="newsletter-btn-fill absolute inset-0
                                     bg-[var(--secondary)]
                                     transform <?= $_rtl ? 'translate-x-full' : '-translate-x-full' ?>
                                     group-hover:translate-x-0
                                     transition-transform duration-500 ease-out"></span>

                        <span class="relative z-10
                                     group-hover:text-black
                                     transition-colors duration-300">
                            <span x-show="state === 'form'"><?= __('newsletter_button') ?></span>
                            <span x-show="state === 'submitting'"><?= __('newsletter_submitting') ?></span>
                        </span>
                    </button>

                    <!-- I: Privacy hint -->
                    <p class="text-white/40 text-[10px] tracking-wider mt-1">
                        <?= __('newsletter_privacy') ?>
                    </p>
                </form>

                <!-- SUCCESS STATE -->
                <div x-show="state === 'success'"
                     x-cloak
                     x-transition:enter="transition duration-500"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="flex flex-col items-start gap-3 py-4">

                    <!-- Yellow check icon -->
                    <div class="w-12 h-12 rounded-full
                                bg-[var(--secondary)]/10 border border-[var(--secondary)]/40
                                flex items-center justify-center">
                        <svg class="w-6 h-6 text-[var(--secondary)]"
                             fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>

                    <h4 class="text-white text-lg font-medium">
                        <?= __('newsletter_success_title') ?>
                    </h4>
                    <p class="text-white/50 text-sm font-light leading-relaxed">
                        <?= __('newsletter_success_desc') ?>
                    </p>
                </div>

                <!-- ERROR STATE — submission failed -->
                <div x-show="state === 'failed'"
                     x-cloak
                     x-transition
                     class="flex flex-col items-start gap-3 py-4">

                    <div class="w-12 h-12 rounded-full
                                bg-red-500/10 border border-red-500/40
                                flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-400"
                             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
                        </svg>
                    </div>

                    <h4 class="text-white text-lg font-medium">
                        <?= __('newsletter_failed_title') ?>
                    </h4>
                    <p class="text-white/50 text-sm font-light leading-relaxed">
                        <?= __('newsletter_failed_desc') ?>
                    </p>

                    <button type="button"
                            @click="state = 'form'"
                            class="mt-2 text-[var(--secondary)] text-xs uppercase tracking-widest
                                   hover:text-white transition-colors duration-300">
                        <?= __('newsletter_try_again') ?>
                    </button>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
function newsletterForm() {
    return {
        email: '',
        error: '',
        // state machine: 'form' | 'submitting' | 'success' | 'failed'
        state: 'form',

        async submit() {
            // Client-side validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.email.trim())) {
                this.error = '<?= addslashes(__("newsletter_invalid")) ?>';
                return;
            }

            this.error = '';
            this.state = 'submitting';

            try {
                const formData = new FormData();
                formData.append('email', this.email.trim());
                formData.append('_subject', 'New Mirzaam Newsletter Subscription');
                formData.append('_template', 'table');
                formData.append('_captcha', 'false');

                const res = await fetch('https://formsubmit.co/developer@fnh.group', {
                    method: 'POST',
                    body: formData,
                    headers: { 'Accept': 'application/json' }
                });

                if (res.ok) {
                    this.state = 'success';
                    this.email = '';
                    // Auto-revert to form after 5s so user can subscribe another email
                    setTimeout(() => { this.state = 'form'; }, 5000);
                } else {
                    this.state = 'failed';
                }
            } catch (e) {
                this.state = 'failed';
            }
        },
    };
}
</script>

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

