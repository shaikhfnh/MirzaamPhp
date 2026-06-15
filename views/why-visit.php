<?php
// ============================================================
// views/why-visit.php
// ============================================================
// Pure markup. Uses $site_blueprint['why_visit'] from global_data.php
// and __() translations from messages.php.
// ============================================================

$wv     = $site_blueprint['why_visit'] ?? [];
$lang   = $lang   ?? 'en';
$isRtl  = ($lang === 'ar');
?>

<div class="mt-20 bg-black text-white antialiased overflow-hidden"
     dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">


    <!-- ═══════════════════════════════════════════════════════
         HERO — full-width image with overlay headline
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full h-[55vh] min-h-[420px] max-h-[680px] overflow-hidden">
        <!-- Background image -->
        <img
            src="<?= htmlspecialchars($wv['hero_image']) ?>"
            alt=""
            class="absolute inset-0 w-full h-full object-cover">

        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/50 to-black"></div>

        <!-- Decorative grain texture -->
        <div class="absolute inset-0 opacity-[0.04] mix-blend-overlay pointer-events-none"
             style="background-image: url(&quot;data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E&quot;);"></div>

        <!-- Content -->
        <div class="absolute inset-x-0 bottom-0 px-4 sm:px-8 lg:px-16 xl:px-24 pb-12 md:pb-16">
            <div class="max-w-[1600px] mx-auto">
                <p class="inline-flex items-center gap-3 text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-5">
                    <span class="w-8 h-px bg-yellow-500/60"></span>
                    <?= __('whyvisit_eyebrow') ?>
                </p>
                <h1 class="text-5xl sm:text-7xl lg:text-8xl xl:text-9xl font-bold tracking-tighter text-white leading-[0.9]">
                    <?= __('whyvisit_title') ?>
                    <span class="text-yellow-500"><?= __('whyvisit_title_accent') ?></span>
                </h1>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         INTRO — large editorial paragraph
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full py-16 md:py-24 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-white/[0.08]">
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- Left rail: index number -->
            <div class="hidden lg:flex lg:col-span-3 items-start gap-3">
                <span class="text-[10px] tracking-[0.3em] uppercase text-yellow-500 font-mono">001 / 005</span>
            </div>

            <!-- Right: the intro paragraph -->
            <div class="lg:col-span-9 xl:col-span-8">
                <p class="text-xl sm:text-2xl md:text-3xl font-light text-white/80 leading-[1.5] tracking-tight">
                    <?= __('whyvisit_intro') ?>
                </p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         VALUE CARDS — 4 column editorial grid
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full border-b border-white/[0.08]">
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 <?= $isRtl ? 'border-r' : 'border-l' ?> border-white/[0.08]">

            <?php foreach ($wv['value_cards'] as $card): ?>
                <article class="group relative p-8 sm:p-10 <?= $isRtl ? 'border-l' : 'border-r' ?> border-b xl:border-b-0 border-white/[0.08] hover:bg-white/[0.02] transition-colors duration-500">

                    <!-- Top number + tag -->
                    <div class="flex items-center justify-between mb-12">
                        <span class="text-[10px] font-mono tracking-[0.25em] text-yellow-500/60 group-hover:text-yellow-500 transition-colors duration-500">
                            <?= htmlspecialchars($card['index']) ?> &nbsp;//&nbsp; <?= strtoupper(__($card['tag_key'])) ?>
                        </span>
                        <span class="w-8 h-px bg-white/10 group-hover:bg-yellow-500/60 group-hover:w-12 transition-all duration-500"></span>
                    </div>

                    <!-- Title -->
                    <h3 class="text-xl md:text-2xl font-semibold tracking-tight text-white mb-5 leading-tight">
                        <?= __($card['title_key']) ?>
                    </h3>

                    <!-- Description -->
                    <p class="text-sm sm:text-[15px] text-white/55 font-light leading-relaxed">
                        <?= __($card['desc_key']) ?>
                    </p>

                    <!-- Subtle hover underline at bottom -->
                    <span class="absolute bottom-0 <?= $isRtl ? 'right-0' : 'left-0' ?> h-px bg-yellow-500 w-0 group-hover:w-full transition-all duration-700"></span>
                </article>
            <?php endforeach; ?>

        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         EXPERIENCES — alternating image / text blocks
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full">

        <!-- Section eyebrow -->
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pt-20 md:pt-28 pb-10">
            <div class="flex items-center gap-4">
                <span class="w-12 h-px bg-yellow-500"></span>
                <p class="text-[11px] tracking-[0.32em] uppercase text-yellow-500 font-semibold">
                    <?= __('whyvisit_experiences') ?>
                </p>
            </div>
        </div>

        <?php foreach ($wv['features'] as $i => $feature): ?>
            <div class="w-full grid grid-cols-1 lg:grid-cols-12 border-b border-white/[0.08] items-stretch">

                <!-- Image side -->
                <div class="w-full lg:col-span-6 aspect-video lg:aspect-auto lg:h-[60vh] xl:h-[65vh] bg-zinc-900 relative overflow-hidden group
                    <?= $feature['flip'] ? 'lg:order-2' : 'lg:order-1' ?>">
                    <img
                        src="<?= htmlspecialchars($feature['image']) ?>"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 ease-out group-hover:scale-105">
                    <!-- Soft dark vignette so text contrast holds on adjacent block -->
                    <div class="absolute inset-0 bg-gradient-to-r <?= $feature['flip'] ? 'from-black/30' : 'to-black/30' ?> via-transparent pointer-events-none"></div>
                </div>

                <!-- Text side -->
                <div class="w-full lg:col-span-6 flex items-center bg-black px-6 py-16 sm:p-14 md:p-20 lg:p-24 xl:p-28
                    <?= $feature['flip'] ? 'lg:order-1' : 'lg:order-2' ?>">
                    <div class="max-w-xl w-full">

                        <!-- Index number + small bar -->
                        <div class="flex items-center gap-3 mb-6">
                            <span class="text-[10px] font-mono tracking-[0.3em] text-yellow-500/80">
                                <?= htmlspecialchars($feature['index']) ?>
                            </span>
                            <span class="w-12 h-px bg-yellow-500/40"></span>
                        </div>

                        <!-- Title -->
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white mb-6 leading-[1.1]">
                            <?= __($feature['title_key']) ?>
                        </h2>

                        <!-- Description -->
                        <div class="space-y-4 text-[15px] sm:text-base text-white/60 font-light leading-[1.75]">
                            <p><?= __($feature['desc_key']) ?></p>
                            <?php if (!empty($feature['desc2_key'])): ?>
                                <p><?= __($feature['desc2_key']) ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- CTA -->
                        <?php if (!empty($feature['cta'])): ?>
                            <?php
                                $cta        = $feature['cta'];
                                $isExternal = !empty($cta['external']);
                                $href       = $isExternal ? $cta['url'] : get_url($cta['url']);
                                $target     = $isExternal ? ' target="_blank" rel="noopener noreferrer"' : '';
                            ?>
                            <div class="pt-8">
                                <a href="<?= htmlspecialchars($href) ?>"<?= $target ?>
                                   class="group/btn inline-flex items-center gap-3 px-6 py-3 rounded-full border border-yellow-500 text-yellow-500 text-xs tracking-[0.2em] uppercase font-semibold hover:bg-yellow-500 hover:text-black transition-all duration-300">
                                    <?= __($cta['label_key']) ?>
                                    <svg class="w-3.5 h-3.5 <?= $isRtl ? 'group-hover/btn:-translate-x-1 rotate-180' : 'group-hover/btn:translate-x-1' ?> transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </section>


    <!-- ═══════════════════════════════════════════════════════
         FINAL CTA BANNER
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full py-24 md:py-32 px-4 sm:px-8 lg:px-16 xl:px-24 overflow-hidden">
        <!-- soft yellow glow background -->
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/5 via-transparent to-yellow-500/5 pointer-events-none"></div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-yellow-500/10 rounded-full blur-[180px] pointer-events-none"></div>

        <div class="relative max-w-[1100px] mx-auto text-center">
            <p class="text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-5 inline-flex items-center gap-3">
                <span class="w-8 h-px bg-yellow-500/60"></span>
                <?= __($wv['final_cta']['eyebrow_key']) ?>
                <span class="w-8 h-px bg-yellow-500/60"></span>
            </p>

            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white mb-6 leading-tight">
                <?= __($wv['final_cta']['title_key']) ?>
            </h2>

            <p class="text-base sm:text-lg text-white/55 font-light max-w-2xl mx-auto mb-10 leading-relaxed">
                <?= __($wv['final_cta']['desc_key']) ?>
            </p>

            <a href="<?= htmlspecialchars(get_url($wv['final_cta']['button_url'])) ?>"
               class="group inline-flex items-center gap-3 bg-yellow-500 text-black px-8 py-4 rounded-full text-xs tracking-[0.2em] uppercase font-bold hover:bg-yellow-400 transition-all duration-300 hover:scale-105">
                <?= __($wv['final_cta']['button_key']) ?>
                <svg class="w-4 h-4 <?= $isRtl ? 'group-hover:-translate-x-1 rotate-180' : 'group-hover:translate-x-1' ?> transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </section>

</div>