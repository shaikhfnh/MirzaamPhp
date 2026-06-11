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
<?php
// Safety check: Only proceed if the data is available
if (isset($hero_media) && is_array($hero_media)): ?>

<section id="hero" class="relative w-full h-screen overflow-hidden flex flex-col">
    
    <?php foreach ($hero_media as $media): ?>
        <?php if (isset($media['type']) && $media['type'] === 'video'): ?>
            <video autoplay loop muted playsinline poster="<?= $media['poster'] ?? '' ?>" class="absolute inset-0 w-full h-full object-cover">
                <source src="<?= $media['src'] ?? '' ?>" type="video/mp4">
            </video>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40"></div>

    <div class="relative z-10 flex-grow flex items-center justify-center">
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
        <div class="max-w-sm">
            <h3 class="text-lg font-bold mb-2"><?= __('hero_foundation_title') ?></h3>
            <p class="text-white/60 text-sm leading-relaxed font-light">
                <?= __('hero_foundation_desc') ?>
            </p>
        </div>

        <button class="group flex items-center gap-4 text-white/90 hover:text-white transition-all duration-300">
            <span class="uppercase tracking-[0.2em] text-sm"><?= __('watch_teaser') ?></span>
            <span class="w-12 h-12 border border-white/20 rounded-full flex items-center justify-center group-hover:scale-110 group-hover:border-[var(--primary)] transition-all">
                <span class="ml-1">▶</span>
            </span>
        </button>
    </div>
</section>

<?php endif; ?>


<section id="about" class="relative w-full py-12 bg-black text-white overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div id="image-follower" class="fixed top-0 left-0 w-80 h-80 pointer-events-none z-50 opacity-0 transition-opacity duration-300 translate-x-[-100%] translate-y-[-110%] hidden lg:block">
        <img id="follower-img" src="" class="w-full h-full object-cover rounded-2xl shadow-2xl border border-white/10" />
    </div>

    <div class="w-full px-6 md:px-12 lg:px-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 mb-24 items-end">
            <div class="lg:col-span-7">
                <h2 class="text-[clamp(2.5rem,7vw,6rem)] font-bold font-alexandria leading-[0.95] tracking-tighter uppercase">
                    <?= __('about_headline_part1') ?> <br/>
                    <span class="text-gray-500 italic"><?= __('about_headline_stroke') ?></span> <br/>
                    <?= __('about_headline_part2') ?>
                </h2>
            </div>
            <div class="lg:col-span-5 border-l border-white/20 pl-6 md:pl-8">
                <p class="text-lg md:text-xl text-white/80 leading-relaxed font-normal tracking-wide max-w-prose">
                    <?= __('about_desc') ?>
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($about_pillars as $item): ?>
                <div class="pillar group border-t border-white/20 pt-8 cursor-pointer transition-all duration-500 hover:border-[var(--primary)]" 
                     data-img="<?= $item['image'] ?>">
                    
                    <div class="text-gray-300 text-xs font-bold font-mono mb-4 uppercase tracking-widest">
                     <?= __($item['title']) ?>
                    </div>
                    
                    <h3 class="text-2xl font-bold font-alexandria mb-4"><?= __($item['heading']) ?></h3>
                    
                    <p class="text-white/60 group-hover:text-white transition-colors duration-500 leading-relaxed font-normal tracking-wide">
                        <?= __($item['desc']) ?>
                    </p>
                    
                    <img src="<?= $item['image'] ?>" class="lg:hidden w-full h-48 object-cover rounded-xl mt-6 opacity-50" />
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



<section id="app-connect" class="relative w-full py-16 bg-black text-[var(--text-light)] overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div class="section-glow absolute bottom-0 right-1/4 w-[35rem] h-[35rem] bg-[var(--primary)] rounded-full blur-[130px] opacity-15 pointer-events-none"></div>

    <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            
            <div class="lg:col-span-6 relative flex items-center justify-center reveal-up">
                <div class="relative w-[280px] sm:w-[320px] h-[36rem] sm:h-[40rem] drop-shadow-[0_25px_50px_rgba(0,0,0,0.8)]">
                    
                    <img src="<?= $app_connect_data['frame_image'] ?>" alt="iPhone Frame" class="absolute inset-0 w-full h-full z-40 pointer-events-none object-contain" />

                    <div class="absolute top-[2%] bottom-[2%] left-[5%] right-[5%] bg-white rounded-[2.2rem] z-20 overflow-hidden">

                        <div id="view-container" class="relative w-full h-full">
                            
                           <div id="mockup-home" class="absolute inset-0 w-full h-full z-20 bg-white overflow-y-auto scroll-container transition-opacity duration-300 opacity-100">
    <div class="relative w-full block">
        <img src="<?= $app_connect_data['home_image'] ?>" alt="App Home" class="w-full h-auto block" />
        
<button 
    onclick="switchAppView('map')" 
    style="--glow-color: var(--primary);" 
    class="absolute top-[40%] right-[2%] z-40 w-[7.3rem] md:w-[8.3rem] h-[3.2rem] md:h-[3.7rem] rounded-[1.5rem] bg-[var(--primary)]/20 border-2 border-white sharp-glow transition-all duration-300 hover:scale-105 active:scale-95 cursor-pointer" 
    aria-label="Open Map">
</button>

       <button 
    onclick="switchAppView('chat')" 
    style="--glow-color: #3b82f6;" 
    class="absolute top-[12%] left-[12%] z-40 w-[12rem] md:w-[13.7rem] h-[2.6rem] md:h-[3rem] rounded-[1.5rem] bg-blue-500/20 border-2 border-white sharp-glow transition-all duration-300 hover:scale-105 active:scale-95 cursor-pointer" 
    aria-label="Open Chat">
</button>
    </div>
</div>

                            <div id="mockup-map" class="absolute inset-0 w-full h-full z-10 bg-white overflow-y-auto scroll-container transition-opacity duration-300 opacity-0 pointer-events-none">
                                <img src="<?= $app_connect_data['map_image'] ?>" alt="App Map" class="w-full h-auto block" />
                            </div>

                            <div id="mockup-chat" class="absolute inset-0 w-full h-full z-10 bg-[#f0f2f5] overflow-y-auto scroll-container transition-opacity duration-300 opacity-0 pointer-events-none">
                                <img src="<?= $app_connect_data['chat_image'] ?>" alt="App Chat" class="w-full h-auto block" />
                            </div>
                        </div>

                        <button id="mockup-back-btn" onclick="switchAppView('home')" class="absolute top-8 text-[10px] left-4 z-50 bg-black/70 backdrop-blur-xl border border-white/10 text-white px-1.5 py-1 rounded-full text-xs font-medium shadow-xl opacity-0 pointer-events-none transition-all duration-300 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                            Back
                        </button>
                    </div>
                </div>
            </div>

           
            <div class="lg:col-span-6 flex flex-col justify-center">
                <span class="font-alexandria text-xs md:text-sm tracking-[0.3em] uppercase text-[var(--secondary)] mb-6 block font-medium reveal-up">
                    <?= __('app_subhead') ?>
                </span>

                <h2 class="text-4xl md:text-5xl lg:text-[3.5rem] font-medium leading-[1.1] font-alexandria text-white tracking-tight mb-8 reveal-up delay-100">
                    <?= __('app_title') ?>
                </h2>

                <p class="text-base md:text-lg text-[#9CA3AF] leading-[1.8] font-light font-alexandria max-w-xl mb-12 reveal-up delay-200">
                    <?= __('app_desc') ?>
                </p>

                <div class="flex flex-wrap gap-4 items-center reveal-up delay-300">
                    <a href="<?= $app_connect_data['apple_link'] ?>" class="inline-block transition-transform duration-300 hover:-translate-y-1 active:translate-y-0" aria-label="<?= __('alt_apple') ?>">
                        <img src="<?= $app_connect_data['app_store'] ?>" alt="<?= __('alt_apple') ?>" class="h-12 w-auto border border-white/80 rounded-xl bg-black" />
                    </a>
                    <a href="<?= $app_connect_data['google_link'] ?>" class="inline-block transition-transform duration-300 hover:-translate-y-1 active:translate-y-0" aria-label="<?= __('alt_google') ?>">
                        <img src="<?= $app_connect_data['google_play'] ?>" alt="<?= __('alt_google') ?>" class="h-12 w-auto border border-white/80 rounded-xl bg-black" />
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
// Sort items dynamically from global dataset matrix
$platinum_items = $sponsors_data_2025['platinum']['items'] ?? [];
$tier_1_row = array_filter($platinum_items, fn($item) => $item['sub_tier'] === 'tier_1');
$tier_2_row = array_filter($platinum_items, fn($item) => $item['sub_tier'] === 'tier_2');
?>

<section id="sponsors-portfolio" class="relative w-full py-16 bg-gradient-to-b from-black via-zinc-950 to-black text-white overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[75rem] h-[35rem] bg-[var(--primary)] rounded-full blur-[180px] opacity-15 pointer-events-none"></div>

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10 flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
        <div class="reveal-up">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-medium tracking-tight text-white font-sans">
                <?= __('sponsors_heading'); ?> <br />
                <span class="text-white/40 font-light text-base md:text-xl block mt-1">
                    <?= __('sponsors_subheading'); ?>
                </span>
            </h2>
        </div>
    </div>

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10 flex flex-col gap-6 md:gap-8">
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:flex md:flex-wrap md:justify-center gap-4 md:gap-5">
            <?php foreach ($tier_1_row as $sponsor): ?>
            <div class="group relative rounded-xl bg-white p-3 sm:p-4 flex flex-col justify-between aspect-[1.6/1] w-full md:w-[220px] lg:w-[240px] shadow-lg hover:shadow-xl transition-all duration-400 border border-zinc-200/50 hover:-translate-y-1">
                <div class="w-full flex items-center justify-between relative mb-1">
                    <span class="text-[8px] sm:text-[9px] font-bold tracking-wider uppercase text-zinc-400 bg-zinc-50 px-2 py-0.5 rounded-full border border-zinc-100 truncate max-w-[80%]">
                        <?= __($sponsor['tier_tag']) ?>
                    </span>
                    <a href="<?= htmlspecialchars($sponsor['website_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-zinc-400 hover:text-black transition-colors duration-200 p-0.5" aria-label="Link to website">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" /></svg>
                    </a>
                </div>
                <div class="flex-1 flex items-center justify-center p-1">
                    <a href="<?= htmlspecialchars($sponsor['website_url']) ?>" target="_blank" rel="noopener noreferrer" class="block w-full text-center">
                        <img src="<?= htmlspecialchars($sponsor['logo_url']) ?>" alt="<?= htmlspecialchars($sponsor['brand_name']) ?> Logo" class="max-w-full w-auto mx-auto object-contain transition-transform duration-300 group-hover:scale-105" loading="lazy" />
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:flex md:flex-wrap md:justify-center gap-4 md:gap-5">
            <?php foreach ($tier_2_row as $sponsor): ?>
            <div class="group relative rounded-xl bg-white p-3 sm:p-4 flex flex-col justify-between aspect-[1.6/1] w-full md:w-[220px] lg:w-[240px] shadow-lg hover:shadow-xl transition-all duration-400 border border-zinc-200/50 hover:-translate-y-1">
                <div class="w-full flex items-center justify-between relative mb-1">
                    <span class="text-[8px] sm:text-[9px] font-bold tracking-wider uppercase text-zinc-400 bg-zinc-50 px-2 py-0.5 rounded-full border border-zinc-100 truncate max-w-[80%]">
                        <?= __($sponsor['tier_tag']) ?>
                    </span>
                    <a href="<?= htmlspecialchars($sponsor['website_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-zinc-400 hover:text-black transition-colors duration-200 p-0.5" aria-label="Link to website">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" /></svg>
                    </a>
                </div>
                <div class="flex-1 flex items-center justify-center p-1">
                    <a href="<?= htmlspecialchars($sponsor['website_url']) ?>" target="_blank" rel="noopener noreferrer" class="block w-full text-center">
                        <img src="<?= htmlspecialchars($sponsor['logo_url']) ?>" alt="<?= htmlspecialchars($sponsor['brand_name']) ?> Logo" class="max-w-full w-auto mx-auto object-contain transition-transform duration-300 group-hover:scale-105" loading="lazy" />
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="w-full flex justify-center mt-10">
            <a href="javascript:void(0);" class="inline-flex items-center justify-center px-10 py-4 border border-white text-white font-medium tracking-wide rounded-full text-xs uppercase bg-transparent hover:bg-white hover:text-black transition-all duration-300 transform active:scale-95 shadow-md">
                <?= __('view_all_participants') ?? 'View All Participants' ?>
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
                    <h3 class="text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif italic font-light tracking-wide leading-none capitalize drop-shadow-md">
                        <?= __($moment['title']) ?>
                    </h3>
                    <h2 class="text-white text-[10px] sm:text-xs md:text-sm lg:text-base font-sans font-medium tracking-[0.2em] sm:tracking-[0.35em] uppercase drop-shadow-md">
                        <?= __($moment['sub']) ?>
                    </h2>
                    
                    <?php if (!empty($moment['year_key']) && !empty(__($moment['year_key']))): ?>
                        <p class="text-white/90 text-base sm:text-lg md:text-2xl font-serif italic font-light tracking-wider pt-0.5 drop-shadow-sm">
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




<section id="categories-hybrid-section" class="relative w-full py-12 bg-black text-white overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    
    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10 flex items-end justify-between gap-6 mb-10">
        <div class="reveal-up">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-medium tracking-tight text-white uppercase font-alexandria leading-none">
                <?= __('section_title') ?> <br />
                <span class="text-white/40 font-light text-xs md:text-sm tracking-[0.2em] block mt-3 uppercase">
                    <?= __('section_subtitle') ?>
                </span>
            </h2>
        </div>

        <div id="categories-nav-controls" class="hidden items-center gap-1 opacity-0 transition-all duration-300 ease-out">
            <button id="categories-prev-btn" class="w-12 h-12 bg-white/5 border border-white/60 text-white/90 flex items-center justify-center hover:bg-white/15 hover:text-white active:scale-95 transition-all duration-300" aria-label="Scroll left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform <?= ($lang === 'ar' ? 'rotate-180' : '') ?>"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            </button>
            <button id="categories-next-btn" class="w-12 h-12 bg-white/5 border border-white/60 text-white/90 flex items-center justify-center hover:bg-white/15 hover:text-white active:scale-95 transition-all duration-300" aria-label="Scroll right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform <?= ($lang === 'ar' ? 'rotate-180' : '') ?>"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
            </button>
        </div>
    </div>

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10">
        
        <div id="categories-scroll-track" class="flex flex-row flex-nowrap overflow-x-auto  pb-6 transition-all duration-300 ease-in-out" style="-webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">
            
            <?php foreach ($home_categories_blueprint as $index => $cat): ?>
                <?php 
                    $sectorNumber = str_pad($index + 1, 2, "0", STR_PAD_LEFT); 
                    // This is clean, safe, and works with all standard translation helpers:
                    $localizedTitle = __('cat_' . $cat['key']); 
                ?>
                
                <div class="category-slider-card flex-shrink-0 w-[240px] relative aspect-[0.75/1] group overflow-hidden border border-white/10 bg-zinc-900 transition-all duration-500 ease-out rounded-none">
                    <img src="<?= $cat['img'] ?>" alt="<?= strip_tags($localizedTitle) ?>" class="absolute inset-0 w-full h-full object-cover transform scale-100 transition-transform duration-700 ease-out group-hover:scale-105" loading="lazy" />
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/20 to-transparent z-20"></div>
                    
                    <div class="absolute inset-x-0 bottom-0 p-4 sm:p-6 flex flex-col justify-end z-30 bg-gradient-to-t from-black/90 via-black/30 to-transparent">
                        <span class="text-[9px] font-medium tracking-[0.25em] text-white/40 uppercase mb-1.5">
                            <?= __('sector_label') ?><?= $sectorNumber ?>
                        </span>
                        <h3 class="text-white text-xs sm:text-sm md:text-base font-normal tracking-wide font-alexandria uppercase leading-tight">
                            <?= $localizedTitle ?>
                        </h3>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="flex justify-center">
            <button id="toggle-categories-grid-btn" 
                    data-text-all="<?= __('toggle_view_all') ?>" 
                    data-text-collapse="<?= __('toggle_collapse') ?>"
                    class="px-8 py-4 bg-transparent border border-white/20 text-white text-xs font-medium tracking-[0.2em] uppercase hover:bg-white hover:text-black hover:border-white active:scale-95 transition-all duration-300 rounded-none">
                <?= __('toggle_view_all') ?>
            </button>
        </div>
    </div>
</section>



<section class="w-full bg-black py-0" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div class="flex flex-col lg:flex-row w-full min-h-[600px]">
        
        <div class="w-full lg:w-1/2 p-12 md:p-20 flex flex-col justify-center items-start relative bg-white">
            <div class="absolute inset-0 opacity-40" style="background-image: url('/mirzaam/assets/images/Home/MIRZAAMDARKPATTERN 4.png'); background-size: cover; background-position: center;"></div>
            
            <div class="relative z-10 w-full">
                <h2 class="text-black text-4xl md:text-7xl font-bold uppercase tracking-tighter leading-[0.9]">
                    <?= __('history_headline_1') ?>
                </h2>
                <h2 class="text-black text-4xl md:text-7xl font-bold uppercase tracking-tighter leading-[0.9] <?= ($lang === 'ar' ? 'mr-12 md:mr-32' : 'ml-12 md:ml-32') ?>">
                    <?= __('history_headline_2') ?>
                </h2>
                <div class="w-60 h-1 bg-black mt-4 md:mt-8"></div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 grid grid-cols-2 grid-rows-3 gap-0 border-l border-white/10">
            <?php foreach ($mirzaam_years_blueprint as $item): ?>
                <?php 
                    // Grab flattened value cleanly
                    $localizedYear = __('year_' . $item['key']); 
                ?>
                <a href="#" class="relative overflow-hidden group border-b border-r border-white/10 last:border-r-0">
                    <img src="<?= $item['image'] ?>" alt="Mirzaam <?= strip_tags($localizedYear) ?>" 
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" />
                    
                    <div class="absolute bottom-4 <?= ($lang === 'ar' ? 'right-4' : 'left-4') ?> z-10">
                        <span class="text-white text-[10px] font-bold tracking-[0.2em] uppercase bg-black/50 backdrop-blur-md px-3 py-1.5 rounded-md border border-white/10 group-hover:opacity-0 transition-all duration-300">
                            <?= $localizedYear ?>
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<section class="w-full py-16 bg-black text-white border-y border-white/5" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div class="w-full px-4 md:px-16 mx-auto">
        
        <div class="mb-8">
            <h2 class="text-3xl md:text-4xl font-normal uppercase tracking-wide font-alexandria">
                <span class="block text-white/40 mb-2"><?= __('reviews_title_top') ?></span>
                <?= __('reviews_title_main') ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 border-t border-white/10 <?= ($lang === 'ar' ? 'md:border-r' : 'md:border-l') ?>">
            
            <?php foreach ($home_reviews_blueprint as $index => $review): ?>
                <?php 
                    $quote = __('review_quote_' . $review['key']);
                    $name  = __('review_name_' . $review['key']);
                    
                    // Determine if the current loop element is the final column item to manage custom CSS edge borders cleanly
                    $isLast = ($index === count($home_reviews_blueprint) - 1);
                    $borderClass = $isLast ? 'border-b md:border-b-0' : ($lang === 'ar' ? 'border-b md:border-l' : 'border-b md:border-r');
                ?>
                
                <div class="p-8 border-white/10 hover:bg-white/[0.03] transition-colors duration-500 group <?= $borderClass ?>">
                    <div class="flex gap-6 items-start">
                        <div class="w-14 h-14 flex-shrink-0 grayscale group-hover:grayscale-0 transition-all duration-700 overflow-hidden border border-white/10">
                            <img src="<?= $review['image'] ?>" alt="<?= strip_tags($name) ?>" class="w-full h-full object-cover" loading="lazy" />
                        </div>
                        
                        <div class="flex flex-col">
                            <p class="text-[15px] italic text-white/70 leading-relaxed mb-6 font-light font-alexandria">
                                <?= $quote ?>
                            </p>
                            <h4 class="text-[11px] tracking-[0.25em] uppercase font-bold text-white/90 font-mono">
                                <?= $name ?>
                            </h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

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
<section class="w-full bg-black py-6 md:py-32 overflow-hidden border-t border-white/10 relative">
    
    <!-- Increased opacity to 0.08 for better visibility -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none">
        <h2 class="text-[25vw] md:text-[22vw] font-black uppercase tracking-tighter text-white/[0.08] leading-none whitespace-nowrap">
            MIRZAAM
        </h2>
    </div>
    
    <div class="px-6 md:px-20 relative z-10 max-w-[1600px] mx-auto">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-12 lg:gap-0">
            
            <!-- Text Content: Optimized for mobile/desktop hierarchy -->
            <div class="max-w-xl">
                <h3 class="text-white text-3xl md:text-5xl font-bold uppercase tracking-tight">Stay Updated.</h3>
                <p class="text-white/70 text-base md:text-lg mt-4 font-light leading-relaxed">
                    Join the archives for exclusive exhibition insights, curated design trends, and partner announcements delivered to your inbox.
                </p>
            </div>

            <!-- Interaction Area: Responsive Widths -->
            <div class="flex flex-col gap-4 w-full lg:w-96">
                <input type="email" placeholder="ENTER YOUR EMAIL" 
                       class="bg-transparent border-b border-white/40 py-4 text-white placeholder-white/50 outline-none focus:border-white transition-all duration-300 tracking-[0.2em] text-sm uppercase w-full">
                
                <button class="w-full bg-white text-black md:py-4 py-2 font-bold uppercase tracking-[0.3em] text-[11px] hover:bg-transparent hover:text-white border border-white transition-all duration-300">
                    Subscribe
                </button>
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

