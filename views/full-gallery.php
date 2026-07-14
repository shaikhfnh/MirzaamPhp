<?php
/**
 * FULL GALLERY VIEW — shared, one page for all years (OPTIMIZED)
 * SAVE AS: views/full-gallery.php
 *
 * ═══════════════════════════════════════════════════════════
 * PERFORMANCE CHANGES vs the previous version
 * ═══════════════════════════════════════════════════════════
 * 1. REMOVED 28 separate Alpine scopes per page. The skeleton
 *    shimmer previously used x-data="{loaded:false}" + @load +
 *    :class + x-show on EVERY tile — that's 28 live reactive
 *    components with event listeners just to fade in a loading
 *    state. Replaced with a pure-CSS technique: the shimmer
 *    gradient is applied directly as the <img> element's own
 *    background. Browsers automatically show an image's own
 *    background behind it while the photo is still downloading
 *    — the moment the real photo paints, it fully covers the
 *    background. Zero JavaScript needed for the effect.
 *
 * 2. REMOVED the separate skeleton <div> per tile — one fewer
 *    DOM node × up to 28 photos = up to 28 fewer elements to
 *    create, style, and paint.
 *
 * 3. ADDED decoding="async" — tells the browser to decode each
 *    image off the main thread instead of blocking it, so
 *    scrolling/interaction stays smooth while many photos are
 *    decoding at once.
 *
 * 4. ADDED fetchpriority="high" on the first 4 photos (roughly
 *    what's visible above the fold on load) and left the rest
 *    at default priority — tells the browser to fetch the
 *    visible photos first instead of treating all 28 requests
 *    as equally urgent, improving perceived load speed.
 *
 * @var string $year
 * @var string $lang
 * @var array  $full_gallery_data
 * @var array  $previous_mirzaam_years
 */

$isRtl = ($lang === 'ar');
$photos = $full_gallery_data[$year] ?? [];
?>

<div class="bg-white text-zinc-900 antialiased" dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">

    <!-- DESKTOP — vertical, right edge, centered -->
    <div class="hidden lg:flex fixed right-1 top-1/2 -translate-y-1/4 z-40 flex-col gap-2
                bg-black/90 backdrop-blur-md rounded-full py-4 px-2
                shadow-[0_8px_32px_rgba(0,0,0,0.35)] border border-white/10">
        <?php foreach ($previous_mirzaam_years as $y):
            $isActive = ((string)$y === (string)$year);
        ?>
            <a href="<?= get_url('gallery/' . $y) ?>"
               class="group relative flex items-center justify-center w-10 h-10 rounded-full text-xs font-semibold transition-all duration-300
                      <?= $isActive
                          ? 'bg-white text-zinc-900 scale-110 shadow-lg'
                          : 'text-white/50 hover:text-white hover:bg-white/10' ?>">
                <?= $y ?>
                <?php if ($isActive): ?>
                <span class="absolute -left-2.5 top-1/2 -translate-y-1/2 w-1 h-4 bg-yellow-500 rounded-full"></span>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- MOBILE/TABLET — bottom floating capsule -->
    <div class="lg:hidden fixed inset-x-0 bottom-5 z-[999] flex justify-center px-1"
         style="padding-bottom: env(safe-area-inset-bottom);">
        <div class="flex items-center gap-1 bg-black/90 backdrop-blur-md rounded-full p-1.5
                    shadow-[0_8px_32px_rgba(0,0,0,0.35)] border border-white/10
                    overflow-x-auto max-w-full"
             style="-webkit-overflow-scrolling: touch; scrollbar-width: none;">
            <?php foreach ($previous_mirzaam_years as $y):
                $isActive = ((string)$y === (string)$year);
            ?>
                <a href="<?= get_url('gallery/' . $y) ?>"
                   class="flex-shrink-0 px-4 py-2.5 rounded-full text-sm font-semibold transition-all duration-300
                          <?= $isActive
                              ? 'bg-white text-zinc-900'
                              : 'text-white/50 hover:text-white' ?>">
                    <?= $y ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Content -->
    <section class="w-full mt-20 px-4 sm:px-8 lg:px-16 xl:px-24 py-10 md:py-14"
             x-data="{ lbOpen: false, imgs: <?= htmlspecialchars(json_encode($photos), ENT_QUOTES) ?>, cur: 0 }">

        <div class="max-w-[1600px] mx-auto">
            <div class="flex items-center justify-between gap-4 mb-8 wv-reveal" data-reveal>
                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900">
                    <?= __('gallery_full_title') ?: 'Full Gallery' ?> — <span class="text-yellow-500"><?= $year ?></span>
                </h1>
                <a href="<?= get_url('previous/' . $year) ?>"
                   class="text-sm text-zinc-500 hover:text-zinc-900 font-medium inline-flex items-center gap-1.5 whitespace-nowrap">
                    <svg class="w-4 h-4 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <?= __('gallery_back_to_edition') ?: 'Back to Edition' ?>
                </a>
            </div>

            <p class="text-zinc-400 text-sm mb-8"><?= count($photos) ?> <?= __('gallery_photos_label') ?: 'photos' ?></p>

            <!-- Grid — one <div> per tile now instead of two,
                 no Alpine, no JS-driven skeleton -->
            <div class="columns-2 sm:columns-3 lg:columns-4 gap-3 md:gap-4 [column-fill:_balance]">
                <?php foreach ($photos as $i => $img): ?>
                    <div class="prev-gallery-tile wv-reveal relative rounded-xl overflow-hidden bg-zinc-100 cursor-pointer group border border-zinc-100 mb-3 md:mb-4 break-inside-avoid"
                         data-reveal data-delay="<?= min($i * 20, 400) ?>"
                         @click="cur = <?= $i ?>; lbOpen = true">

                        <img src="<?= htmlspecialchars($img) ?>" alt="Mirzaam <?= $year ?>"
                             loading="lazy"
                             decoding="async"
                             <?php if ($i < 4): ?>fetchpriority="high"<?php endif; ?>
                             class="prev-gallery-img gallery-skeleton-bg w-full h-auto block min-h-[180px]">

                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors duration-400"></div>
                        <svg class="absolute inset-0 m-auto w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 drop-shadow-lg pointer-events-none"
                             fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6"/>
                        </svg>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Lightbox -->
        <div x-show="lbOpen" x-cloak
             x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[9000] bg-black/95 flex items-center justify-center p-4"
             @click.self="lbOpen = false" @keydown.escape.window="lbOpen = false"
             @keydown.arrow-left.window="cur = (cur - 1 + imgs.length) % imgs.length"
             @keydown.arrow-right.window="cur = (cur + 1) % imgs.length">
            <button @click="lbOpen = false" class="absolute top-5 right-5 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></button>
            <button @click="cur = (cur - 1 + imgs.length) % imgs.length" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg></button>
            <img :src="imgs[cur]" alt="" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain">
            <button @click="cur = (cur + 1) % imgs.length" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></button>
            <p class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/40 text-xs font-mono"><span x-text="cur + 1"></span> / <span x-text="imgs.length"></span></p>
        </div>
    </section>
</div>

<style>
.prev-gallery-img { transform: scale(1.0); transition: transform 1.4s cubic-bezier(0.25,0.46,0.45,0.94); will-change: transform; }
.prev-gallery-tile:hover .prev-gallery-img { transform: scale(1.08); }
@media (prefers-reduced-motion: reduce) { .prev-gallery-img { transition: none !important; transform: none !important; } }

/* Skeleton shimmer — applied as the <img>'s own background.
   The browser paints this behind the image automatically while
   it's still loading/decoding; once the photo has pixels, it
   fully covers the background beneath it. No JS required to
   detect "loaded" state or toggle visibility. */
.gallery-skeleton-bg {
    background-image: linear-gradient(
        100deg,
        #f4f4f5 30%,
        #ececee 45%,
        #f4f4f5 60%
    );
    background-size: 300% 100%;
    animation: gallery-shimmer 1.6s ease-in-out infinite;
}
@keyframes gallery-shimmer {
    0%   { background-position: 100% 0; }
    100% { background-position: -100% 0; }
}
@media (prefers-reduced-motion: reduce) {
    .gallery-skeleton-bg { animation: none; background-image: none; background-color: #f4f4f5; }
}
</style>