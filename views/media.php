<?php
/**
 * Media page view
 * Route: /media
 * Data: $site_blueprint['media'] — see global_data-media.php
 */

$isRtl = ($lang === 'ar');

// Pull data into local variables
$md_hero_image    = $site_blueprint['media']['hero_image'];
$md_youtube       = $site_blueprint['media']['youtube'];
$md_news          = $site_blueprint['media']['news'];
$md_social_buzz   = $site_blueprint['media']['social_buzz'];
$md_campaign_imgs = $site_blueprint['media']['campaign_images'];
$md_outdoor_vids  = $site_blueprint['media']['outdoor_videos'];
$md_outdoor_photos= $site_blueprint['media']['outdoor_photos'];

$md_yt_featured   = $md_youtube[0];
$md_yt_rest       = array_slice($md_youtube, 1);

// Mosaic span patterns (repeating) — same approach as Mirzaamiyat gallery
// 0 = normal 1×1, 1 = tall 1×2, 2 = wide 2×1
$campaign_pattern  = [2, 0, 0, 1, 0, 0, 1, 0, 2, 0, 0];
$photo_pattern     = [2, 0, 1, 0, 0, 2, 0, 0, 1, 0, 2, 0, 0, 1, 0, 0, 2, 0, 0, 1, 0];
?>

<div class="bg-white text-zinc-900 antialiased" dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">

<!-- ══════════════════════════════════════════════════════════
     SECTION 1 — HERO
     Dark full-bleed with hero image, headline, and stat strip.
═══════════════════════════════════════════════════════════ -->
<section class="relative w-full overflow-hidden bg-zinc-950" style="min-height:55vh;">
    <img src="<?= htmlspecialchars($md_hero_image) ?>" alt=""
         class="absolute inset-0 w-full h-full object-cover object-center opacity-30">
    <div class="absolute inset-0" style="background:linear-gradient(to bottom,rgba(9,9,11,0.5) 0%,rgba(9,9,11,0.85) 100%);"></div>

    <div class="relative z-10 max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 flex flex-col justify-between" style="min-height:55vh;padding-top:4rem;padding-bottom:4rem;">

        <!-- Title block -->
        <div class="wv-reveal" data-reveal>
            <span class="inline-flex items-center gap-3 text-[11px] tracking-[0.3em] uppercase text-yellow-500 font-semibold font-mono mb-5">
                <span class="w-7 h-px bg-yellow-500/60"></span>
                <?= __('md_hero_eyebrow') ?>
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white mb-4 leading-[1.05] max-w-3xl">
                <?= __('md_hero_title') ?>
            </h1>
            <p class="text-white/55 font-light text-base max-w-xl leading-relaxed">
                <?= __('md_hero_desc') ?>
            </p>
        </div>

        <!-- Stat strip -->
        <div class="flex flex-wrap gap-8 mt-10 pt-8 border-t border-white/10 wv-reveal" data-reveal data-delay="80">
            <?php foreach ([
                [__('md_hero_stat1_num'), __('md_hero_stat1_label')],
                [__('md_hero_stat2_num'), __('md_hero_stat2_label')],
                [__('md_hero_stat3_num'), __('md_hero_stat3_label')],
            ] as $stat): ?>
                <div>
                    <p class="text-3xl font-bold text-white"><?= $stat[0] ?></p>
                    <p class="text-white/40 text-sm font-light tracking-wide"><?= $stat[1] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════
     SECTION 2 — YOUTUBE VIDEOS
     Featured large player + 6 lazy-load thumbnails below.
     Clicking a thumbnail swaps it to a live YouTube iframe.
═══════════════════════════════════════════════════════════ -->
<section class="w-full border-b border-zinc-100">
    <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20">

        <div class="mb-10 wv-reveal" data-reveal>
            <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                <?= __('md_yt_eyebrow') ?>
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 leading-tight">
                <?= __('md_yt_title') ?>
            </h2>
        </div>

        <!-- Featured video -->
        <div class="relative rounded-2xl overflow-hidden bg-zinc-950 aspect-video mb-4 wv-reveal" data-reveal>
            <iframe
                src="https://www.youtube.com/embed/<?= htmlspecialchars($md_yt_featured['id']) ?>?rel=0&modestbranding=1"
                title="<?= __('md_yt_featured') ?>"
                class="absolute inset-0 w-full h-full"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
            <span class="absolute top-4 <?= $isRtl ? 'right-4' : 'left-4' ?> bg-yellow-500 text-zinc-900 text-[9px] font-bold font-mono uppercase tracking-widest px-2.5 py-1 rounded-full pointer-events-none">
                <?= __('md_yt_featured') ?>
            </span>
        </div>

        <!-- Thumbnail strip — horizontal scroll on mobile, 3-col grid on desktop -->
        <div x-data="{ active: null }">
            <div class="flex gap-3 overflow-x-auto pb-3 snap-x snap-mandatory
                        sm:grid sm:grid-cols-3 sm:gap-4 sm:overflow-visible sm:pb-0 sm:snap-none"
                 style="-webkit-overflow-scrolling:touch; scrollbar-width:none;">
                <?php foreach ($md_yt_rest as $i => $vid): ?>
                    <?php $vid_id = htmlspecialchars($vid['id']); ?>
                    <div class="relative rounded-xl overflow-hidden bg-zinc-950 aspect-video cursor-pointer group wv-reveal
                                shrink-0 w-[75vw] sm:w-auto snap-start"
                         data-reveal data-delay="<?= $i * 50 ?>"
                         x-on:click="active = '<?= $vid_id ?>'">

                        <!-- Video number badge -->
                        <span class="absolute top-3 <?= $isRtl ? 'right-3' : 'left-3' ?> z-10 w-6 h-6 rounded-full bg-zinc-950/70 backdrop-blur-sm text-white/60 text-[10px] font-mono flex items-center justify-center pointer-events-none">
                            <?= $i + 2 ?>
                        </span>

                        <!-- Thumbnail -->
                        <template x-if="active !== '<?= $vid_id ?>'">
                            <div class="absolute inset-0">
                                <img src="https://img.youtube.com/vi/<?= $vid_id ?>/hqdefault.jpg"
                                     alt="" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-zinc-950/40 group-hover:bg-zinc-950/20 transition-colors duration-300"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-11 h-11 rounded-full bg-white/90 group-hover:bg-yellow-500 flex items-center justify-center transition-all duration-300 shadow-lg group-hover:scale-110">
                                        <svg class="w-4 h-4 text-zinc-900 <?= $isRtl ? '' : 'ml-0.5' ?>" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Live iframe -->
                        <template x-if="active === '<?= $vid_id ?>'">
                            <iframe
                                src="https://www.youtube.com/embed/<?= $vid_id ?>?autoplay=1&rel=0"
                                class="absolute inset-0 w-full h-full"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </template>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Mobile scroll hint -->
            <p class="mt-2 text-center text-[11px] text-zinc-400 sm:hidden">
                ← <?= $isRtl ? 'مرر للمشاهدة' : 'Swipe to see more' ?> →
            </p>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════
     SECTION 3 — NEWS TICKER
     CSS-only infinite scroll strip. Items duplicated for loop.
     Pauses on hover. Each item links to the article.
═══════════════════════════════════════════════════════════ -->
<section class="w-full bg-zinc-950 border-y border-white/5 py-5 overflow-hidden">
    <div class="flex items-center gap-6">
        <!-- Static label -->
        <div class="shrink-0 pl-4 sm:pl-8 lg:pl-16 xl:pl-24 flex items-center gap-3 z-10 relative">
            <span class="text-[10px] font-bold uppercase tracking-[0.25em] text-yellow-500 font-mono whitespace-nowrap"><?= __('md_news_eyebrow') ?></span>
            <span class="w-px h-5 bg-white/20"></span>
        </div>

        <!-- Scrolling strip -->
        <div class="overflow-hidden flex-1 mask-fade-edges" style="mask-image:linear-gradient(to right,transparent 0%,black 5%,black 95%,transparent 100%);-webkit-mask-image:linear-gradient(to right,transparent 0%,black 5%,black 95%,transparent 100%);">
            <div class="md-ticker flex gap-0 whitespace-nowrap" style="animation:md-scroll 45s linear infinite;" onmouseenter="this.style.animationPlayState='paused'" onmouseleave="this.style.animationPlayState='running'">
                <?php
                // Duplicate items for seamless loop
                $ticker_items = array_merge($md_news, $md_news);
                foreach ($ticker_items as $item):
                ?>
                <a href="<?= htmlspecialchars($item['url']) ?>" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-3 px-6 group shrink-0">
                    <span class="<?= $item['color'] ?> text-white text-[9px] font-bold font-mono uppercase tracking-wider px-2 py-0.5 rounded shrink-0">
                        <?= htmlspecialchars($item['source']) ?>
                    </span>
                    <span class="text-white/75 text-sm font-light group-hover:text-white transition-colors duration-200">
                        <?= htmlspecialchars($item['title']) ?>
                    </span>
                    <span class="text-white/30 text-xs shrink-0"><?= htmlspecialchars($item['date']) ?></span>
                    <span class="text-white/20 mx-2">·</span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════
     SECTION 3b — NEWSPAPER CLIPPINGS
     Real newspaper/press imagery styled as scattered paper
     cuttings — rotation, drop-shadow, cream background.
     Clicking opens a full-size lightbox.
═══════════════════════════════════════════════════════════ -->
<section class="w-full border-b border-zinc-100 overflow-hidden"
         style="background:linear-gradient(135deg,#faf9f6 0%,#f5f0e8 50%,#faf9f6 100%);"
         x-data="mdLightbox(<?= htmlspecialchars(json_encode([
             'https://mirzaam.com/wp-content/uploads/2025/12/2025-december-1.png',
             'https://mirzaam.com/wp-content/uploads/2025/12/2025-newpaper.png',
             'https://mirzaam.com/wp-content/uploads/2024/10/screenshot-2023-10-19-at-34509-pm.webp',
             'https://mirzaam.com/wp-content/uploads/2024/10/screenshot-2023-10-19-at-34536-pm.webp',
         ])) ?>)"
         @keydown.escape.window="close()"
         @keydown.arrow-left.window="prev()"
         @keydown.arrow-right.window="next()">

    <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-14 md:py-16">

        <div class="mb-10 wv-reveal" data-reveal>
            <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-2">
                <?= __('md_news_previous') ?>
            </span>
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-zinc-900">
                <?= $isRtl ? 'في الصحافة المطبوعة' : 'In Print' ?>
            </h2>
        </div>

        <!-- Scattered clippings -->
        <div class="relative flex flex-wrap justify-center items-center gap-6 md:gap-10 py-4">
            <?php
            $clippings = [
                [
                    'src'     => 'https://mirzaam.com/wp-content/uploads/2025/12/2025-december-1.png',
                    'rotate'  => '-rotate-2',
                    'label'   => 'December 2025',
                    'delay'   => 0,
                ],
                [
                    'src'     => 'https://mirzaam.com/wp-content/uploads/2025/12/2025-newpaper.png',
                    'rotate'  => 'rotate-1',
                    'label'   => 'Press Coverage 2025',
                    'delay'   => 80,
                ],
                [
                    'src'     => 'https://mirzaam.com/wp-content/uploads/2024/10/screenshot-2023-10-19-at-34509-pm.webp',
                    'rotate'  => '-rotate-1',
                    'label'   => 'Social Press 2023',
                    'delay'   => 160,
                ],
                [
                    'src'     => 'https://mirzaam.com/wp-content/uploads/2024/10/screenshot-2023-10-19-at-34536-pm.webp',
                    'rotate'  => 'rotate-2',
                    'label'   => 'Coverage 2023',
                    'delay'   => 240,
                ],
            ];
            foreach ($clippings as $ci => $clip):
            ?>
                <div class="md-clipping <?= $clip['rotate'] ?> cursor-pointer group wv-reveal"
                     data-reveal data-delay="<?= $clip['delay'] ?>"
                     style="transform-origin: center center;"
                     @click="open(<?= $ci ?>)">
                    <div class="bg-white shadow-[0_8px_32px_rgba(0,0,0,0.15)] group-hover:shadow-[0_16px_48px_rgba(0,0,0,0.22)] transition-all duration-400 group-hover:-translate-y-1 group-hover:rotate-0 rounded-sm overflow-hidden" style="padding: 10px 10px 20px 10px;">
                        <div class="overflow-hidden w-[180px] sm:w-[220px] md:w-[260px]">
                            <img src="<?= htmlspecialchars($clip['src']) ?>" alt="<?= htmlspecialchars($clip['label']) ?>"
                                 loading="lazy"
                                 class="w-full h-[200px] sm:h-[240px] md:h-[280px] object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <p class="mt-3 text-center text-[11px] text-zinc-400 font-light"><?= htmlspecialchars($clip['label']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Shared lightbox for clippings -->
    <div x-show="isOpen"
         x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[9000] bg-zinc-950/95 flex items-center justify-center p-4"
         @click.self="close()" style="display:none;">
        <button @click="close()" class="absolute top-5 <?= $isRtl ? 'left-5' : 'right-5' ?> w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <button @click="prev()" class="absolute <?= $isRtl ? 'right-4' : 'left-4' ?> top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
            <svg class="w-5 h-5 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <img :src="images[current]" alt="" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain">
        <button @click="next()" class="absolute <?= $isRtl ? 'left-4' : 'right-4' ?> top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
            <svg class="w-5 h-5 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </button>
        <p class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/40 text-xs font-mono">
            <span x-text="current + 1"></span> / <span x-text="images.length"></span>
        </p>
    </div>
</section>




<section class="w-full border-b border-zinc-100">
    <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20">

        <div class="mb-10 wv-reveal" data-reveal>
            <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                <?= __('md_buzz_eyebrow') ?>
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 leading-tight">
                <?= __('md_buzz_title') ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
            <?php foreach ($md_social_buzz as $i => $post): ?>
                <?php $is_ig = ($post['platform'] === 'instagram'); ?>
                <a href="<?= htmlspecialchars($post['url']) ?>" target="_blank" rel="noopener"
                   class="wv-reveal group flex flex-col bg-white border border-zinc-100 rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.08)] hover:-translate-y-1 hover:border-zinc-200"
                   data-reveal data-delay="<?= $i * 60 ?>">

                    <!-- Platform header -->
                    <div class="flex items-center gap-3 px-5 py-4 border-b border-zinc-100
                        <?= $is_ig ? 'bg-gradient-to-r from-purple-50 to-pink-50' : 'bg-gradient-to-r from-sky-50 to-blue-50' ?>">
                        <?php if ($is_ig): ?>
                            <!-- Instagram icon -->
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0"
                                 style="background:linear-gradient(135deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </div>
                        <?php else: ?>
                            <!-- X (Twitter) icon -->
                            <div class="w-8 h-8 rounded-lg bg-zinc-900 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835L1.254 2.25H8.08l4.258 5.63L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                        <span class="text-[13px] font-semibold text-zinc-800"><?= htmlspecialchars($post['handle']) ?></span>
                    </div>

                    <!-- Caption -->
                    <div class="flex-1 px-5 py-4">
                        <p class="text-zinc-600 text-sm font-light leading-relaxed line-clamp-4">
                            <?= htmlspecialchars($post['caption']) ?>
                        </p>
                    </div>

                    <!-- Footer link -->
                    <div class="px-5 pb-4 flex items-center justify-between">
                        <span class="text-[11px] text-zinc-400 font-mono">
                            <?= $is_ig ? 'instagram.com' : 'x.com' ?>
                        </span>
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-zinc-900 group-hover:text-yellow-600 transition-colors duration-200">
                            <?= __('md_buzz_view') ?>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </span>
                    </div>

                    <span class="block h-[2px] w-0 group-hover:w-full bg-yellow-500 transition-all duration-500"></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════
     SECTION 5 — CAMPAIGN GALLERY (2023)
     Redesigned as Instagram-style social post cards — each
     image sits inside a card that mimics a social media post:
     Mirzaam avatar + handle at top, square image, engagement
     footer. Clicking the image opens the lightbox.
═══════════════════════════════════════════════════════════ -->
<section class="w-full border-b border-zinc-100 bg-zinc-50/50">
    <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20"
         x-data="mdLightbox(<?= htmlspecialchars(json_encode($md_campaign_imgs)) ?>)"
         @keydown.escape.window="close()"
         @keydown.arrow-left.window="prev()"
         @keydown.arrow-right.window="next()">

        <div class="mb-10 wv-reveal" data-reveal>
            <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                <?= __('md_campaign_eyebrow') ?>
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 mb-3 leading-tight">
                <?= __('md_campaign_title') ?>
            </h2>
            <p class="text-zinc-500 font-light max-w-xl"><?= __('md_campaign_desc') ?></p>
        </div>

        <!-- Social post card grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-5">
            <?php
            // Staggered like/comment counts for visual realism
            $likes    = [847, 1.2, 634, 921, 1.5, 743, 589, 1.1, 967, 412, 823];
            $comments = [42, 67, 28, 91, 54, 36, 49, 73, 31, 58, 44];
            foreach ($md_campaign_imgs as $i => $img):
            ?>
                <div class="wv-reveal bg-white rounded-2xl border border-zinc-100 overflow-hidden
                            shadow-[0_2px_12px_rgba(0,0,0,0.04)]
                            hover:shadow-[0_12px_32px_rgba(0,0,0,0.09)]
                            hover:-translate-y-0.5 transition-all duration-300 group"
                     data-reveal data-delay="<?= ($i % 4) * 60 ?>">

                    <!-- Post header -->
                    <div class="flex items-center justify-between px-4 py-3">
                        <div class="flex items-center gap-2.5">
                            <!-- Avatar — Mirzaam logo circle -->
                            <div class="w-8 h-8 rounded-full bg-zinc-900 flex items-center justify-center shrink-0 overflow-hidden">
                                <img src="/mirzaam/assets/images/logo/NO BG.png" alt="Mirzaam"
                                     class="w-6 h-6 object-contain"
                                     onerror="this.style.display='none';this.parentNode.innerHTML='<span class=\'text-yellow-500 text-[8px] font-bold\'>M</span>';">
                            </div>
                            <div>
                                <p class="text-[12px] font-semibold text-zinc-900 leading-none">mirzaamexpo</p>
                                <p class="text-[10px] text-zinc-400 font-light leading-none mt-0.5">Campaign 2023</p>
                            </div>
                        </div>
                        <!-- Instagram icon -->
                        <div class="w-6 h-6 rounded flex items-center justify-center shrink-0"
                             style="background:linear-gradient(135deg,#f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);">
                            <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Square image — click to open lightbox -->
                    <div class="relative aspect-square overflow-hidden bg-zinc-100 cursor-pointer"
                         @click="open(<?= $i ?>)">
                        <img src="<?= htmlspecialchars($img) ?>" alt=""
                             loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-zinc-950/0 group-hover:bg-zinc-950/25 transition-colors duration-300 flex items-center justify-center">
                            <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 drop-shadow-lg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Engagement footer -->
                    <div class="px-4 pt-3 pb-4">
                        <div class="flex items-center gap-4 mb-2">
                            <!-- Heart -->
                            <button class="flex items-center gap-1.5 text-zinc-500 hover:text-red-500 transition-colors duration-200 group/heart">
                                <svg class="w-5 h-5 group-hover/heart:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                </svg>
                                <span class="text-[11px] font-medium"><?= is_float($likes[$i]) ? number_format($likes[$i], 1) . 'k' : $likes[$i] ?></span>
                            </button>
                            <!-- Comment -->
                            <button class="flex items-center gap-1.5 text-zinc-500 hover:text-zinc-800 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z"/>
                                </svg>
                                <span class="text-[11px] font-medium"><?= $comments[$i] ?></span>
                            </button>
                            <!-- Share -->
                            <a href="https://www.instagram.com/mirzaamexpo/" target="_blank" rel="noopener"
                               class="ml-auto text-zinc-400 hover:text-zinc-700 transition-colors duration-200">
                                <svg class="w-4.5 h-4.5 w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                                </svg>
                            </a>
                        </div>
                        <p class="text-[11px] text-zinc-500 font-light leading-relaxed line-clamp-2">
                            <span class="font-semibold text-zinc-900">mirzaamexpo</span>
                            <?= $isRtl ? 'حملة التواصل الاجتماعي — مرزاميات رمضان 2023 ✨ #مرزام' : 'Mirzaamiyat Ramadan Campaign 2023 ✨ #Mirzaam #Kuwait' ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Lightbox -->
        <div x-show="isOpen"
             x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[9000] bg-zinc-950/95 flex items-center justify-center p-4"
             @click.self="close()" style="display:none;">
            <button @click="close()" class="absolute top-5 <?= $isRtl ? 'left-5' : 'right-5' ?> w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <button @click="prev()" class="absolute <?= $isRtl ? 'right-4' : 'left-4' ?> top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <img :src="images[current]" alt="" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain">
            <button @click="next()" class="absolute <?= $isRtl ? 'left-4' : 'right-4' ?> top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
            <p class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/40 text-xs font-mono">
                <span x-text="current + 1"></span> / <span x-text="images.length"></span>
            </p>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════
     SECTION 6 — OUTDOOR CAMPAIGN VIDEOS
     Year tabs (Alpine) — 2024 | 2023.
     Each video card shows a dark tile with title + play icon.
     Clicking opens a modal with the HTML5 video player.
═══════════════════════════════════════════════════════════ -->
<section class="w-full border-b border-zinc-100">
    <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20"
         x-data="{ year: '2024', videoSrc: '', videoOpen: false }"
         @keydown.escape.window="videoOpen = false; videoSrc = ''">

        <div class="mb-10 wv-reveal" data-reveal>
            <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                <?= __('md_outdoor_eyebrow') ?>
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 mb-3 leading-tight">
                <?= __('md_outdoor_title') ?>
            </h2>
            <p class="text-zinc-500 font-light max-w-xl"><?= __('md_outdoor_desc') ?></p>
        </div>

        <!-- Year tabs -->
        <div class="flex gap-2 mb-8">
            <?php foreach (array_keys($md_outdoor_vids) as $year): ?>
                <button @click="year = '<?= $year ?>'"
                        :class="year === '<?= $year ?>' ? 'bg-zinc-900 text-white' : 'bg-zinc-100 text-zinc-600 hover:bg-zinc-200'"
                        class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-200">
                    <?= $year ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Video grids — one per year, toggled by Alpine -->
        <?php foreach ($md_outdoor_vids as $year => $videos): ?>
        <div x-show="year === '<?= $year ?>'"
             x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
             class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 md:gap-4">
            <?php foreach ($videos as $i => $vid): ?>
                <div class="group relative rounded-xl overflow-hidden bg-zinc-950 aspect-video cursor-pointer wv-reveal"
                     data-reveal data-delay="<?= $i * 40 ?>"
                     @click="videoSrc = '<?= htmlspecialchars($vid['url']) ?>'; videoOpen = true">

                    <!-- Dark tile with title -->
                    <div class="absolute inset-0 bg-gradient-to-b from-zinc-800/60 to-zinc-950/90 flex flex-col justify-between p-4">
                        <span class="text-[9px] text-yellow-500/70 font-mono uppercase tracking-widest"><?= $year ?></span>
                        <p class="text-white text-xs sm:text-sm font-medium leading-tight"><?= htmlspecialchars($vid['title']) ?></p>
                    </div>

                    <!-- Play button overlay -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-12 h-12 rounded-full bg-white/10 group-hover:bg-yellow-500 flex items-center justify-center transition-colors duration-300 border border-white/20 group-hover:border-yellow-500 backdrop-blur-sm">
                            <svg class="w-5 h-5 text-white <?= $isRtl ? '' : 'ml-0.5' ?>" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>

        <!-- Video modal -->
        <div x-show="videoOpen"
             x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[9000] bg-zinc-950/95 flex items-center justify-center p-4"
             @click.self="videoOpen = false; videoSrc = ''" style="display:none;">

            <button @click="videoOpen = false; videoSrc = ''"
                    class="absolute top-5 <?= $isRtl ? 'left-5' : 'right-5' ?> w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <video :src="videoSrc" controls autoplay
                   class="max-w-full max-h-[85vh] rounded-xl shadow-2xl w-full"
                   style="max-width:960px;"
                   x-init="$watch('videoOpen', val => { if (!val) { $el.pause(); $el.src = ''; } })">
            </video>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════
     SECTION 7 — OUTDOOR CAMPAIGN PHOTOS
     Mosaic gallery with the same lightbox component.
═══════════════════════════════════════════════════════════ -->
<section class="w-full bg-zinc-950 relative">
    <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20"
         x-data="mdLightbox(<?= htmlspecialchars(json_encode($md_outdoor_photos)) ?>)"
         @keydown.escape.window="close()"
         @keydown.arrow-left.window="prev()"
         @keydown.arrow-right.window="next()">

        <div class="mb-10 wv-reveal" data-reveal>
            <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-500 font-semibold font-mono block mb-3">
                <?= __('md_photos_eyebrow') ?>
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-white mb-3 leading-tight">
                <?= __('md_photos_title') ?>
            </h2>
            <p class="text-white/50 font-light max-w-xl"><?= __('md_photos_desc') ?></p>
        </div>

        <!-- Mosaic grid — dark bg makes images pop -->
        <div class="md-mosaic-grid">
            <?php foreach ($md_outdoor_photos as $i => $img):
                $span = $photo_pattern[$i % count($photo_pattern)] ?? 0;
                $cls  = $span === 2 ? 'md-wide' : ($span === 1 ? 'md-tall' : '');
            ?>
                <div class="md-mosaic-item <?= $cls ?> group cursor-pointer relative overflow-hidden rounded-xl bg-zinc-800 wv-reveal"
                     data-reveal data-delay="<?= ($i % 4) * 50 ?>"
                     @click="open(<?= $i ?>)">
                    <img src="<?= htmlspecialchars($img) ?>" alt=""
                         loading="lazy"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-zinc-950/0 group-hover:bg-zinc-950/30 transition-colors duration-300 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 drop-shadow-lg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6"/>
                        </svg>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Lightbox (same structure, independent scope) -->
        <div x-show="isOpen"
             x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[9000] bg-zinc-950/95 flex items-center justify-center p-4"
             @click.self="close()" style="display:none;">

            <button @click="close()" class="absolute top-5 <?= $isRtl ? 'left-5' : 'right-5' ?> w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <button @click="prev()" class="absolute <?= $isRtl ? 'right-4' : 'left-4' ?> top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <img :src="images[current]" alt=""
                 class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain">

            <button @click="next()" class="absolute <?= $isRtl ? 'left-4' : 'right-4' ?> top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>

            <p class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/40 text-xs font-mono">
                <span x-text="current + 1"></span> / <span x-text="images.length"></span>
            </p>
        </div>
    </div>
</section>

</div><!-- end bg-white wrapper -->


<!-- ══════════════════════════════════════════════════════════
     STYLES — ticker animation + mosaic grid
═══════════════════════════════════════════════════════════ -->
<style>
/* ── News ticker ─────────────────────────────────── */
@keyframes md-scroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

/* ── Paper clippings ─────────────────────────────── */
.md-clipping {
    transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.35s ease;
}
.md-clipping:hover { transform: rotate(0deg) translateY(-4px) !important; }

/* Hide scrollbar on mobile YouTube strip */
.overflow-x-auto::-webkit-scrollbar { display: none; }
.overflow-x-auto { -ms-overflow-style: none; scrollbar-width: none; }

/* ── Mosaic grid ─────────────────────────────────── */
.md-mosaic-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: 180px;
    gap: 12px;
}
.md-mosaic-item         { grid-column: span 1; grid-row: span 1; }
.md-mosaic-item.md-wide { grid-column: span 2; }
.md-mosaic-item.md-tall { grid-row:    span 2; }

@media (max-width: 767px) {
    .md-mosaic-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: 130px;
    }
    /* On mobile collapse wide spans to avoid single images dominating */
    .md-mosaic-item.md-wide { grid-column: span 2; }
    .md-mosaic-item.md-tall { grid-row: span 1; }
}

@media (max-width: 479px) {
    .md-mosaic-grid { grid-auto-rows: 110px; gap: 8px; }
}
</style>


<!-- ══════════════════════════════════════════════════════════
     ALPINE.JS — lightbox component (shared by both galleries)
═══════════════════════════════════════════════════════════ -->
<script>
document.addEventListener('alpine:init', function () {
    Alpine.data('mdLightbox', function (imageList) {
        return {
            isOpen:  false,
            current: 0,
            images:  imageList || [],

            open(index) {
                this.current = index;
                this.isOpen  = true;
                document.body.style.overflow = 'hidden';
            },
            close() {
                this.isOpen = false;
                document.body.style.overflow = '';
            },
            prev() {
                if (!this.isOpen) return;
                this.current = (this.current - 1 + this.images.length) % this.images.length;
            },
            next() {
                if (!this.isOpen) return;
                this.current = (this.current + 1) % this.images.length;
            },
        };
    });
});
</script>