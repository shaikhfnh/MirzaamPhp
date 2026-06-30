<?php
/**
 * These variables are injected from index.php/init
 * @var string $lang
 * @var array $site_blueprint
 */

// Grab the specific data for this page
$exhibitions_data = $site_blueprint['about']['exhibitions'];
$highlights_data  = $site_blueprint['about']['highlights'];
$events_image     = $site_blueprint['about']['events_image'];
$highlights_image = $site_blueprint['about']['highlights_image'];
$vis_milestones   = $site_blueprint['about']['vis_milestones'];

$isRtl = ($lang === 'ar');
?>

<!-- ============================================================
     SECTION 1 — THE VISIONARY
     Split layout: photo on the left (larger than the original
     split version), text on the right, floating credential badge
     on the photo. Career timeline spans full width underneath —
     horizontal with a joining line on larger screens, vertical
     on mobile.
============================================================ -->
<section class="relative w-full bg-white overflow-hidden border-b border-zinc-100" dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">
    <div class="mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-24">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center mb-14 md:mb-16">

            <!-- ══ PHOTO — natural portrait ratio, no forced height ══
                 D: aspect-[77/125] matches the real intrinsic ratio
                 of the source file exactly. No cropping, ever.
                 Image is capped at a max-height on large screens so
                 it doesn't tower over the text column, but it never
                 stretches or crops to fill a mismatched box. -->
            <div class="md:col-span-6 lg:col-span-3 wv-reveal" data-reveal>
                <div class="relative w-full max-w-[420px] mx-auto lg:mx-0
                            lg:max-h-[680px]">

                    <div class="relative w-full aspect-[77/125] lg:max-h-[680px]
                                overflow-hidden bg-zinc-50 mx-auto"
                         style="clip-path: <?= $isRtl
                             ? 'polygon(0 0, 100% 0, 100% 100%, 0 96%)'
                             : 'polygon(0 0, 100% 0, 100% 96%, 0 100%)' ?>;">

                        <img src="/mirzaam/assets/images/about/fnhbw.webp"
                             alt="<?= strip_tags(__('about_vis_title')) ?>"
                             class="absolute inset-0 w-full h-full object-cover object-top">

                        <!-- A: Mesh gradient bloom — bottom third only,
                             ties B&W photo to brand yellow without
                             touching her face. Pure CSS, no extra asset. -->
                        <div class="absolute inset-x-0 bottom-0 h-[45%] pointer-events-none"
                             style="background:
                                 radial-gradient(ellipse 120% 100% at 20% 100%, rgba(234,179,8,0.35) 0%, transparent 55%),
                                 radial-gradient(ellipse 100% 80% at 80% 100%, rgba(0,0,0,0.45) 0%, transparent 60%),
                                 linear-gradient(to top, rgba(0,0,0,0.55) 0%, transparent 100%);
                                 mix-blend-mode: <?= $isRtl ? 'normal' : 'normal' ?>;"></div>

                        <!-- C: Subtle film grain — elevates the B&W
                             treatment from "desaturated photo" to an
                             intentional editorial choice. SVG noise,
                             very low opacity, no extra image request. -->
                        <div class="absolute inset-0 pointer-events-none opacity-[0.06] mix-blend-overlay"
                             style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22><filter id=%22n%22><feTurbulence type=%22fractalNoise%22 baseFrequency=%220.9%22 numOctaves=%222%22 stitchTiles=%22stitch%22/></filter><rect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23n)%22/></svg>');"></div>
                    </div>

                    <!-- Award badge — sits on the mesh bloom now, reads
                         clean against the darkened bottom of the photo -->
                    <div class="absolute bottom-[-3rem] <?= $isRtl ? 'right-6' : 'left-6' ?> max-w-[260px] bg-white/95 backdrop-blur-sm rounded-2xl shadow-[0_24px_48px_-12px_rgba(0,0,0,0.30)] p-5 flex items-center gap-4">
                        <div class="w-11 h-11 rounded-full bg-yellow-500 flex items-center justify-center text-black shrink-0">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        </div>
                        <div>
                            <div class="text-[10px] text-yellow-600 uppercase tracking-[0.2em] font-bold mb-1">
                                <?= __('about_vis_badge_sub') ?: 'Award Winner' ?>
                            </div>
                            <div class="text-[13px] sm:text-sm font-semibold text-zinc-900 leading-tight">
                                <?= __('about_vis_badge_title') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ══ TEXT — right, vertically centered beside the
                   natural-height photo (no longer forced to match) ══ -->
            <div class="md:col-span-6 lg:col-span-9 flex flex-col justify-center wv-reveal" data-reveal data-delay="100">
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-4">
                    <?= __('about_vis_subtitle') ?: 'The Visionary' ?>
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-zinc-900 mb-3 leading-[1.05]">
                    <?= __('about_vis_title') ?: 'Farah Al Humaidhi' ?>
                </h1>
                <p class="text-base sm:text-lg text-zinc-400 font-light mb-10">
                    <?= __('about_vis_credential') ?>
                </p>

                <div class="space-y-5 text-zinc-600 leading-relaxed font-light  text-[15px] sm:text-base">
                    <p><?= __('about_vis_p1') ?></p>
                    <p><?= __('about_vis_p2') ?></p>
                    <p><?= __('about_vis_p3') ?></p>
                </div>
            </div>

        </div>

        <!-- Career timeline — unchanged -->
        <div class="pt-10 border-t border-zinc-100">

            <div class="hidden sm:block relative">
                <div class="absolute top-[5px] inset-x-0 h-px bg-zinc-200"></div>
                <div class="grid grid-cols-4 gap-6 lg:gap-10">
                    <?php foreach ($vis_milestones as $i => $ms): ?>
                        <div class="relative wv-reveal" data-reveal data-delay="<?= $i * 70 ?>">
                            <span class="relative z-10 block w-3 h-3 rounded-full bg-yellow-500 ring-4 ring-white mb-5"></span>
                            <div class="text-2xl lg:text-[1.75rem] font-bold tracking-tight text-zinc-900 mb-1.5"><?= htmlspecialchars($ms['year']) ?></div>
                            <div class="text-[12.5px] text-zinc-500 leading-snug font-light max-w-[180px]"><?= __('about_vis_milestone_' . $ms['key'] . '_label') ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="sm:hidden relative <?= $isRtl ? 'pr-6' : 'pl-6' ?>">
                <div class="absolute top-1 bottom-1 <?= $isRtl ? 'right-[5px]' : 'left-[5px]' ?> w-px bg-zinc-200"></div>
                <?php foreach ($vis_milestones as $i => $ms): ?>
                    <div class="relative pb-9 last:pb-0 wv-reveal" data-reveal data-delay="<?= $i * 70 ?>">
                        <span class="absolute top-1 <?= $isRtl ? '-right-6' : '-left-6' ?> w-3 h-3 rounded-full bg-yellow-500 ring-4 ring-white"></span>
                        <div class="text-xl font-bold tracking-tight text-zinc-900 mb-1.5"><?= htmlspecialchars($ms['year']) ?></div>
                        <div class="text-[12.5px] text-zinc-500 leading-snug font-light"><?= __('about_vis_milestone_' . $ms['key'] . '_label') ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
</section>




<!-- ============================================================
     WHITE EDITORIAL THEME CONTINUES — matches Why Exhibit /
     Best Booth / Why Visit design system: zinc/yellow palette,
     wv-reveal animations, finalized card style, mono eyebrows.
============================================================ -->
<div class="bg-white text-zinc-900 antialiased overflow-hidden" dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">


    <!-- ═══════════════════════════════════════════════════════
         UPCOMING EVENTS — intro copy + real KIF photo, plus the
         two real sister exhibitions run by the same organizer
         (Fouz Expos Company): Mirzaamiyat and IXIR.
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full border-b border-zinc-100">
        <div class=" mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center mb-16 md:mb-20">
                <div class="lg:col-span-7 wv-reveal" data-reveal>
                    <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                        <?= __('about_exh_subtitle') ?: "What's Next" ?>
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-zinc-900 mb-6 leading-tight">
                        <?= __('about_exh_title') ?: 'Upcoming Events' ?>
                    </h2>
                    <div class="space-y-4 text-zinc-500 font-light leading-relaxed text-[15px] sm:text-base max-w-xl">
                        <p><?= __('about_exh_desc') ?></p>
                        <p><?= __('about_exh_desc2') ?></p>
                    </div>
                </div>

                <div class="lg:col-span-5 wv-reveal" data-reveal data-delay="100">
                    <div class="relative rounded-2xl overflow-hidden aspect-[4/3] bg-zinc-50 border border-zinc-100">
                        <img src="<?= htmlspecialchars($events_image) ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Sister exhibitions -->
            <div class="pt-14 border-t border-zinc-100">
                <span class="text-[11px] tracking-[0.3em] uppercase text-zinc-400 font-semibold font-mono block mb-6">
                    <?= __('about_exh_siblings_label') ?: 'Part of the Fouz Expos Family' ?>
                </span>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:gap-5">
                    <?php foreach ($exhibitions_data as $i => $item): ?>
                        <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" rel="noopener"
                           class="wv-reveal group relative bg-white rounded-2xl border border-zinc-100 overflow-hidden flex flex-col transition-all duration-500 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.10)] hover:-translate-y-1 hover:border-zinc-200"
                           data-reveal data-delay="<?= $i * 90 ?>">

                            <div class="relative aspect-[16/9] overflow-hidden bg-zinc-50">
                                <?php if (!empty($item['no_photo'])): ?>
                                    <div class="absolute inset-0 <?= $item['tile_class'] ?> flex items-center justify-center">
                                        <span class="text-white font-bold text-2xl sm:text-3xl tracking-tight">
                                            <?= __('about_exh_' . $item['key'] . '_monogram') ?>
                                        </span>
                                    </div>
                                <?php else: ?>
                                    <img src="<?= htmlspecialchars($item['image']) ?>" alt=""
                                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                                <?php endif; ?>
                                <span class="absolute top-3 <?= $isRtl ? 'right-3' : 'left-3' ?> <?= $item['tag_class'] ?> font-bold font-mono text-[9px] tracking-wider px-2.5 py-1 rounded-full uppercase">
                                    <?= __('about_exh_' . $item['key'] . '_tag') ?: 'Sister Exhibition' ?>
                                </span>
                            </div>

                            <div class="p-5 md:p-6 flex-1 flex flex-col">
                                <h3 class="text-base md:text-lg font-semibold tracking-tight text-zinc-900 mb-1.5">
                                    <?= __('about_exh_' . $item['key'] . '_title') ?>
                                </h3>
                                <p class="text-sm text-zinc-500 font-light leading-relaxed mb-5 flex-1">
                                    <?= __('about_exh_' . $item['key'] . '_desc') ?>
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
                                    <span class="text-[11px] tracking-[0.15em] font-bold uppercase" style="color: <?= htmlspecialchars($item['accent_color']) ?>;">
                                        <?= __('about_exh_' . $item['key'] . '_meta') ?>
                                    </span>
                                    <div class="w-7 h-7 rounded-full bg-zinc-100 flex items-center justify-center text-zinc-500 group-hover:bg-zinc-900 group-hover:text-white transition-all duration-300">
                                        <svg class="w-3.5 h-3.5 transform <?= $isRtl ? 'rotate-180 group-hover:-translate-x-0.5' : 'group-hover:translate-x-0.5' ?> transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                    </div>
                                </div>
                            </div>

                            <span class="absolute bottom-0 <?= $isRtl ? 'right-6' : 'left-6' ?> h-[2px] w-0 bg-yellow-500 rounded-full group-hover:w-10 transition-all duration-500"></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         STRATEGY + MISSION
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full bg-zinc-50/50 border-b border-zinc-100">
        <div class=" mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20">

            <!-- Strategy -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 pb-16 mb-16 border-b border-zinc-200/70 wv-reveal" data-reveal>
                <div class="lg:col-span-4">
                    <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                        <?= __('about_strat_subtitle') ?: 'Our Approach' ?>
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 leading-[1.15]">
                        <?= __('about_strat_title') ?: 'Strategy' ?>
                    </h2>
                </div>
                <div class="lg:col-span-8 <?= $isRtl ? 'lg:border-r lg:pr-10' : 'lg:border-l lg:pl-10' ?> border-zinc-200 flex flex-col justify-center">
                    <p class="text-zinc-500 text-base sm:text-lg font-light leading-relaxed">
                        <?= __('about_strat_desc') ?>
                    </p>
                </div>
            </div>

            <!-- Mission -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">
                <div class="wv-reveal" data-reveal>
                    <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                        <?= __('about_miss_subtitle') ?: 'Our Mission' ?>
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-bold tracking-tight text-zinc-900 mb-6 leading-tight">
                        <?= __('about_miss_title') ?: 'Mission' ?>
                    </h3>
                    <p class="text-zinc-500 font-light leading-relaxed mb-5">
                        <?= __('about_miss_p1') ?>
                    </p>
                    <p class="text-zinc-500 font-light leading-relaxed">
                        <?= __('about_miss_p2') ?>
                    </p>
                </div>

                <div class="wv-reveal bg-white p-8 md:p-10 rounded-2xl border border-zinc-100 flex flex-col h-full justify-center" data-reveal data-delay="100">
                    <p class="italic text-zinc-800 text-lg font-light leading-relaxed mb-8">
                        &ldquo;<?= __('about_miss_quote') ?>&rdquo;
                    </p>
                    <div class="pt-7 border-t border-zinc-100">
                        <h4 class="text-[11px] font-bold text-yellow-600 uppercase tracking-widest mb-3">
                            <?= __('about_miss_box_title') ?: 'Our Philosophy' ?>
                        </h4>
                        <p class="text-zinc-500 text-sm leading-relaxed">
                            <?= __('about_miss_box_desc') ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         WHY "MIRZAAM"? (Legacy) + HIGHLIGHTS
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full border-b border-zinc-100">
        <div class=" mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16">

                <div class="lg:col-span-4 wv-reveal" data-reveal>
                    <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                        <?= __('about_leg_subtitle') ?: 'Our Story' ?>
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 mb-6 leading-[1.15]">
                        <?= __('about_leg_title') ?: 'Why "Mirzaam"?' ?>
                    </h2>
                    <p class="text-zinc-500 leading-relaxed font-light text-base mb-6">
                        <?= __('about_leg_p1') ?>
                    </p>
                    <div class="<?= $isRtl ? 'border-r-2 pr-5' : 'border-l-2 pl-5' ?> border-yellow-500 py-1 mb-6">
                        <p class="italic text-zinc-700 leading-relaxed">
                            &ldquo;<?= __('about_leg_quote') ?>&rdquo;
                        </p>
                    </div>
                    <p class="text-zinc-500 leading-relaxed font-light text-base">
                        <?= __('about_leg_p2') ?>
                    </p>
                </div>

                <div class="lg:col-span-8 bg-zinc-50/60 p-8 md:p-12 rounded-2xl border border-zinc-100 wv-reveal" data-reveal data-delay="100">
                    <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-6">
                        <?= __('about_high_subtitle') ?: 'What Sets Us Apart' ?>
                    </span>

                    <div class="relative rounded-xl overflow-hidden aspect-video mb-9 bg-zinc-100 border border-zinc-100">
                        <img src="<?= htmlspecialchars($highlights_image) ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-7 md:gap-9">
                        <?php foreach ($highlights_data as $i => $highlight): ?>
                            <div class="space-y-3">
                                <div class="w-8 h-8 rounded-full bg-zinc-900 text-white flex items-center justify-center text-[10px] font-mono font-semibold">
                                    <?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?>
                                </div>
                                <h4 class="text-zinc-900 font-semibold tracking-tight leading-snug">
                                    <?= __('about_high_' . $highlight['key'] . '_title') ?>
                                </h4>
                                <p class="text-sm text-zinc-500 font-light leading-relaxed">
                                    <?= __('about_high_' . $highlight['key'] . '_desc') ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php
    $cat_slider_title    = __('about_categories_title')    ?: 'Exhibitor Categories';
    $cat_slider_subtitle = __('about_categories_subtitle') ?: 'Every sector represented at Mirzaam Expo';
    $cat_slider_theme    = 'light';
    include 'includes/category-slider/template.php';
    ?>

</div>