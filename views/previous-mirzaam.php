<?php
/**
 * Previous Mirzaam — shared view template (v3)
 * @var string $year
 * @var string $lang
 * @var array  $previous_mirzaam_registry
 * @var array  $previous_mirzaam_years
 */

$isRtl = ($lang === 'ar');
$edition = $previous_mirzaam_registry[$year] ?? null;

if (!$edition) {
    echo '<div class="min-h-[60vh] flex items-center justify-center mt-20"><p class="text-zinc-400 text-lg">' . (__('prev_not_found') ?: 'This edition is not available.') . '</p></div>';
    return;
}

$gallery  = $edition['gallery'] ?? [];
$sponsors = $edition['sponsors'] ?? [];
$heroImg  = $gallery[0] ?? '';

// Group sponsors by tier for tier-stage display
$sponsorsByTier = [];
foreach ($sponsors as $sp) {
    $tier = $sp['tier'] ?? 'Sponsor';
    $sponsorsByTier[$tier][] = $sp;
}

// Tier → badge color
$tierColors = [
    'platinum' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
    'banking'  => 'bg-blue-50 text-blue-700 border-blue-200',
    'strategic'=> 'bg-purple-50 text-purple-700 border-purple-200',
    'gold'     => 'bg-amber-50 text-amber-700 border-amber-200',
    'media'    => 'bg-zinc-100 text-zinc-600 border-zinc-200',
];

function getTierColor($tier, $tierColors) {
    $t = strtolower($tier);
    foreach ($tierColors as $key => $classes) {
        if (str_contains($t, $key)) return $classes;
    }
    return 'bg-zinc-100 text-zinc-600 border-zinc-200';
}
?>

<div class="bg-white text-zinc-900 antialiased" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">

<!-- ── YEAR NAV BAR — self-contained, reads URL directly ── -->
    <?php
    // Derive the active year directly from the current URL.
    // This does NOT depend on $year being correctly passed into
    // this file's scope — it's self-contained, so even if there's
    // a variable-scope issue elsewhere, this will still work.
    $_nav_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    preg_match('#previous/(\d{4})#', $_nav_path, $_nav_match);
    $_active_year = $_nav_match[1] ?? (isset($year) ? (string)$year : '');
    ?>
    <div class="sticky top-[90px] z-40 bg-black backdrop-blur-md border-t border-zinc-100 mt-20">
        <div class=" mx-auto px-4 sm:px-8 lg:px-40 ">
            <div class="flex items-center gap-2 overflow-x-auto py-1"
                 style="-webkit-overflow-scrolling: touch; scrollbar-width: none;">
                <?php foreach ($previous_mirzaam_years as $y):
                    $isActive = (trim((string)$y) === trim((string)$_active_year));
                ?>
                    <a href="<?= get_url('previous/' . $y) ?>"
                       class="flex-shrink-0 px-4  rounded-full text-sm transition-all duration-200
                              <?= $isActive
                                  ? 'text-zinc-900 bg-white '
                                  : 'text-zinc-400 hover:text-zinc-700 hover:bg-zinc-50' ?>">
                        <?= $y ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- ── HERO BANNER ──────────────────────────────────── -->
    <?php if (!empty($heroImg)): ?>
<section class="relative w-full h-[50vh]  max-h-[400px] overflow-hidden">
        <img src="<?= htmlspecialchars($heroImg) ?>" alt="Mirzaam <?= $year ?>"
             class="absolute inset-0 w-full h-full object-cover">
                     <div class="absolute inset-0"
             style="background-image: linear-gradient(to bottom,
                rgba(0,0,0,0.60) 0%,
                rgba(0,0,0,0.35) 25%,
                rgba(0,0,0,0.15) 50%,
                rgba(0,0,0,0.04) 75%,
                rgba(255,255,255,1) 100%);">
        </div>

        <!-- Gradient no longer fades to near-white at the bottom
             — kept a consistent dark tone throughout instead, so
             white text stays legible everywhere in this section,
             including right at the bottom where the meta row sits.
             The transition into the white page section below is
             now a clean hard edge instead of an image-to-white
             fade trick. -->
        <div class="absolute inset-0"
             style="background: linear-gradient(to bottom, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.25) 40%, rgba(0,0,0,0.15) 70%, rgba(0,0,0,0.5) 100%);"></div>

        <div class="absolute inset-x-0 bottom-0 px-4 sm:px-8 lg:px-16 xl:px-24 pb-10 md:pb-14">
            <div class="max-w-[1600px] mx-auto">

                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-500 font-semibold font-mono block mb-4"
                      style="text-shadow: 0 2px 8px rgba(0,0,0,0.4);">
                    <?= $isRtl ? $edition['edition_ar'] : $edition['edition'] ?>
                </span>

                <!-- Bigger — was text-4xl sm:5xl lg:6xl, now scales
                     all the way up to 8xl on large screens -->
                <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold tracking-tight text-white leading-[0.9] mb-4"
                    style="text-shadow: 0 4px 24px rgba(0,0,0,0.4);">
                    Mirzaam <span class="text-yellow-500"><?= $year ?></span>
                </h1>

                <!-- Date/hall row — fixed from text-black to
                     text-white, matches the rest of the text now -->
                <div class="flex flex-wrap items-center gap-3 text-sm sm:text-base text-white font-medium"
                     style="text-shadow: 0 2px 8px rgba(0,0,0,0.4);">
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                        </svg>
                        <?= $isRtl ? $edition['dates_ar'] : $edition['dates'] ?>
                    </span>
                    <span class="w-px h-3.5 bg-white/30"></span>
                    <span><?= $edition['venue'] ?></span>

                    <?php if (!empty($edition['vr_url'])): ?>
                    <span class="w-px h-3.5 bg-white/30"></span>
                    <a href="<?= htmlspecialchars($edition['vr_url']) ?>" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-1.5 bg-purple-500/20 backdrop-blur-sm text-purple-200 border border-purple-400/30
                              px-3 py-1 rounded-full text-[10px] font-mono uppercase tracking-wider
                              hover:bg-purple-500/30 transition-colors duration-200">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <?= __('prev_vr_badge') ?: 'VR Tour' ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ── GALLERY ──────────────────────────────────────── -->
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-10 md:py-14"
             x-data="{ lbOpen: false, imgs: <?= htmlspecialchars(json_encode($gallery), ENT_QUOTES) ?>, cur: 0 }">
        <div class="max-w-[1600px] mx-auto">
            <div class="flex items-center justify-between gap-4 mb-8 wv-reveal" data-reveal>
                <div class="flex items-center gap-4">
                    <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono whitespace-nowrap">
                        <?= __('prev_gallery_label') ?: 'Gallery' ?>
                    </span>
                    <span class="w-12 h-px bg-zinc-200"></span>
                </div>
                <?php if (!empty($edition['gallery_url'])): ?>
                <a href="<?= htmlspecialchars($edition['gallery_url']) ?>" target="_blank" rel="noopener noreferrer"
                   class="text-sm text-zinc-500 hover:text-zinc-900 font-medium transition-colors duration-200 inline-flex items-center gap-1.5 whitespace-nowrap">
                    <?= __('prev_view_full_gallery') ?: 'View Full Gallery' ?>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
                <?php endif; ?>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
                <?php foreach ($gallery as $gi => $img): ?>
                    <div class="prev-gallery-tile wv-reveal relative aspect-[4/3] rounded-2xl overflow-hidden bg-zinc-100 cursor-pointer group border border-zinc-100"
                         data-reveal data-delay="<?= $gi * 40 ?>"
                         @click="cur = <?= $gi ?>; lbOpen = true">
                        <img src="<?= htmlspecialchars($img) ?>" alt="Mirzaam <?= $year ?>" loading="lazy"
                             class="prev-gallery-img absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors duration-400"></div>
                        <svg class="absolute inset-0 m-auto w-7 h-7 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 drop-shadow-lg pointer-events-none"
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

<!-- ── SPONSORS — grouped by tier stage, home-page card style ── -->
    <?php if (!empty($sponsorsByTier)): ?>
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-10 md:py-14 border-t border-zinc-100 bg-zinc-50/50">
        <div class="max-w-[1600px] mx-auto">

            <div class="flex items-center gap-4 mb-10 wv-reveal" data-reveal>
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono whitespace-nowrap">
                    <?= __('prev_sponsors_label') ?: 'Sponsors & Partners' ?>
                </span>
                <span class="flex-1 h-px bg-zinc-200"></span>
            </div>

            <?php foreach ($sponsorsByTier as $tier => $tierSponsors): ?>
                <div class="mb-8 last:mb-0 wv-reveal" data-reveal>

                    <!-- Tier label row -->
                    <div class="flex items-center gap-3 mb-5">
                        <span class="text-[10px] font-bold font-mono tracking-wider uppercase px-3 py-1 rounded-full border
                                     <?= getTierColor($tier, $tierColors) ?>">
                            <?= htmlspecialchars($tier) ?>
                        </span>
                        <span class="flex-1 h-px bg-zinc-100"></span>
                        <span class="text-[10px] text-zinc-400 font-mono">
                            <?= count($tierSponsors) ?>
                        </span>
                    </div>

                    <!-- Sponsor cards — home page style: square card,
                         top bar with tier badge + separate external-
                         link icon, logo fills the rest of the square -->
                    <div class="flex flex-wrap gap-3 sm:gap-4 md:gap-5">
                        <?php foreach ($tierSponsors as $si => $sp):
                            $hasUrl    = !empty($sp['website_url']);
                            $logoTag   = $hasUrl ? 'a' : 'div';
                            $logoAttrs = $hasUrl
                                ? 'href="' . htmlspecialchars($sp['website_url']) . '" target="_blank" rel="noopener noreferrer"'
                                : '';
                        ?>
                            <div class="group relative rounded-2xl bg-white
                                        aspect-square
                                        w-[calc(50%-6px)] sm:w-[calc(33.333%-12px)] md:w-[calc(25%-16px)] lg:w-[calc(16.666%-14px)]
                                        max-w-[220px]
                                        flex flex-col
                                        shadow-lg hover:shadow-xl
                                        transition-all duration-400
                                        border border-zinc-200/50 hover:-translate-y-1
                                        overflow-hidden
                                        wv-reveal"
                                 data-reveal data-delay="<?= $si * 70 ?>">

                                <!-- Top bar — tier badge + external link icon -->
                                <div class="flex items-center justify-between gap-2 px-3 pt-3 sm:px-4 sm:pt-4 flex-shrink-0">
                                    <span class="text-[9px] sm:text-[10px] font-bold tracking-wider uppercase
                                                 text-zinc-400 bg-zinc-50 px-2 py-0.5
                                                 rounded-full border border-zinc-100
                                                 whitespace-nowrap truncate max-w-[70%]">
                                        <?= htmlspecialchars($tier) ?>
                                    </span>

                                    <?php if ($hasUrl): ?>
                                    <a href="<?= htmlspecialchars($sp['website_url']) ?>"
                                       target="_blank" rel="noopener noreferrer"
                                       class="text-zinc-400 hover:text-black transition-colors duration-200 p-0.5 flex-shrink-0"
                                       aria-label="<?= htmlspecialchars($sp['name']) ?>">
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/>
                                        </svg>
                                    </a>
                                    <?php endif; ?>
                                </div>

                                <!-- Logo — fills remaining square space.
                                     Renders as <a> when a website URL
                                     exists, plain <div> when it doesn't
                                     (no dead/empty link). -->
                                <<?= $logoTag ?> <?= $logoAttrs ?> class="flex-1 flex items-center justify-center p-4">
                                    <?php if (!empty($sp['logo_url'])): ?>
                                        <img src="<?= htmlspecialchars($sp['logo_url']) ?>"
                                             alt="<?= htmlspecialchars($sp['name']) ?> Logo"
                                             class="w-full h-full object-contain
                                                    transition-transform duration-300 group-hover:scale-105"
                                             loading="lazy"
                                             onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                                        <span class="hidden items-center justify-center
                                                     text-zinc-400 text-sm font-medium uppercase tracking-wider text-center px-2">
                                            <?= htmlspecialchars($sp['name']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="flex items-center justify-center
                                                     text-zinc-300 text-2xl font-bold uppercase tracking-wider">
                                            <?= htmlspecialchars(substr($sp['name'], 0, 2)) ?>
                                        </span>
                                    <?php endif; ?>
                                </<?= $logoTag ?>>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
    <?php endif; ?>

    <!-- ── VIEW ALL PARTICIPANTS — hidden for 2020 ──────── -->
<?php if (!empty($edition['participants_url'])): ?>
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-12 md:py-16 border-t border-zinc-100">
        <div class="max-w-[1600px] mx-auto text-center wv-reveal" data-reveal>
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-zinc-900 mb-3">
                <?= __('prev_cta_title') ?: 'Explore This Edition' ?>
            </h2>
            <p class="text-zinc-400 font-light text-sm mb-8 max-w-md mx-auto">
                <?= __('prev_cta_desc') ?: 'Browse the complete exhibitor list from this edition of Mirzaam.' ?>
            </p>
            <a href="<?= get_url(ltrim($edition['participants_url'], '/')) ?>"
               class="group inline-flex items-center gap-2.5 bg-zinc-900 hover:bg-yellow-500 text-white hover:text-zinc-900 font-semibold text-sm px-7 py-3.5 rounded-full transition-all duration-300">
                <?= __('prev_cta_participants') ?: 'View All Participants' ?>
                <svg class="w-4 h-4 <?= $isRtl ? 'group-hover:-translate-x-0.5 rotate-180' : 'group-hover:translate-x-0.5' ?> transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </section>
    <?php endif; ?>

</div>

<style>
.prev-gallery-img { transform: scale(1.0); transition: transform 1.4s cubic-bezier(0.25,0.46,0.45,0.94); will-change: transform; }
.prev-gallery-tile:hover .prev-gallery-img { transform: scale(1.12); }
@media (prefers-reduced-motion: reduce) { .prev-gallery-img { transition: none !important; transform: none !important; } }
</style>