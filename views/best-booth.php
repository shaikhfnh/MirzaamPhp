<?php
// ============================================================
// views/best-booth.php
// ============================================================
// WHITE THEME REDESIGN of the Best Booth Competition page —
// matches the same design system as why-exhibit.php / why-visit:
// hero gradient, wv-reveal animations, finalized card style,
// numbered-badge mechanics cards, and the standard dark CTA.
//
// The original reference (jury.png) used blue jury cards, orange
// circular photo frames, and three different accent colors for
// the three nominee categories. This redesign intentionally
// drops all of that in favor of the site's white/zinc/yellow
// system — one consistent accent color, finalized rounded-2xl
// cards, and the same hover/reveal language used everywhere else.
//
// All text goes through __() for i18n, with inline EN fallbacks
// so the page renders correctly even before translations are
// added to lang/en.php / lang/ar.php.
// Data comes from $best_booth (global_data-best_booth.php).
// ============================================================

$bb     = $best_booth ?? [];
$lang   = $lang ?? 'en';
$isRtl  = ($lang === 'ar');
?>

<div class="mt-20 bg-white text-zinc-900 antialiased overflow-hidden"
     dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">


    <!-- ═══════════════════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full h-[52vh] min-h-[420px] max-h-[640px] overflow-hidden">
        <img src="<?= htmlspecialchars($bb['hero_image'] ?? '') ?>" alt=""
             class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0"
             style="background-image: linear-gradient(to bottom,
                rgba(0,0,0,0.60) 0%,
                rgba(0,0,0,0.35) 25%,
                rgba(0,0,0,0.15) 50%,
                rgba(0,0,0,0.04) 75%,
                rgba(255,255,255,1) 100%);">
        </div>

        <div class="absolute inset-x-0 bottom-0 px-4 sm:px-8 lg:px-16 xl:px-24 pb-10 md:pb-14">
            <div class="max-w-[1600px] mx-auto">
                <p class="inline-flex items-center gap-3 text-yellow-400 text-[11px] tracking-[0.4em] uppercase font-semibold mb-4">
                    <span class="w-8 h-px bg-yellow-400/70"></span>
                    <?= __('bb_eyebrow') ?: 'Mirzaam Expo 2025' ?>
                </p>
                <h1 class="text-5xl sm:text-7xl lg:text-8xl font-bold tracking-tighter text-white leading-[0.9] mb-4">
                    <?= __('bb_title') ?: 'Best Booth' ?>
                    <span class="text-yellow-400"><?= __('bb_title_accent') ?: 'Competition' ?></span>
                </h1>
                <p class="text-sm sm:text-base text-white/70 font-light max-w-lg leading-relaxed">
                    <?= __('bb_hero_subtitle') ?: 'Vote for the best booth across three categories — Innovation, Aesthetics, and Sustainability.' ?>
                </p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         INTRO + HONORING PARTICIPANTS
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full py-12 md:py-16 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-zinc-100 wv-reveal" data-reveal>
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            <div class="hidden lg:flex lg:col-span-3 items-start gap-3">
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono"><?= __('bb_overview_label') ?: '2025 Edition' ?></span>
            </div>
            <div class="lg:col-span-9 xl:col-span-8">
                <p class="text-2xl sm:text-3xl md:text-[2rem] font-light text-zinc-700 leading-[1.5] tracking-tight mb-10">
                    <?= __('bb_intro') ?: "The Best Booth Competition at Mirzaam Expo is one of the most anticipated events of the year. It's a moment where we celebrate the incredible designs and innovations that make Mirzaam a unique platform for elegance and creativity." ?>
                </p>

                <h3 class="text-xl font-semibold tracking-tight text-zinc-900 mb-2">
                    <?= __('bb_honoring_title') ?: 'Honoring Participants' ?>
                </h3>
                <p class="text-sm text-zinc-500 font-light leading-relaxed max-w-2xl">
                    <?= __('bb_honoring_desc') ?: 'All Mirzaam participants deserve acknowledgment for their outstanding booth designs, exceptional executions, and significant investments. Each booth is a testament to the creativity and dedication that defines Mirzaam year after year.' ?>
                </p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         COMPETITION MECHANICS — 3 numbered cards
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full border-b border-zinc-100 bg-zinc-50/50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pt-10 pb-6">
            <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3"><?= __('bb_mechanics_label') ?: 'Competition Mechanics' ?></span>
            <h3 class="text-2xl sm:text-3xl font-bold tracking-tight text-zinc-900 max-w-xl leading-snug">
                <?= __('bb_mechanics_title') ?: 'Three winners are selected across three distinct categories.' ?>
            </h3>
        </div>

        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pb-12 md:pb-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-5">

                <?php foreach (($bb['mechanics'] ?? []) as $i => $mech): ?>
                    <article class="wv-reveal group relative bg-white rounded-2xl border border-zinc-100 p-7 sm:p-8
                                     transition-all duration-500 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.10)] hover:-translate-y-1 hover:border-zinc-200"
                              data-reveal data-delay="<?= $i * 80 ?>">

                        <div class="w-9 h-9 rounded-full bg-zinc-900 text-white flex items-center justify-center text-[11px] font-mono font-semibold mb-5">
                            <?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?>
                        </div>

                        <h3 class="text-xl sm:text-2xl font-semibold tracking-tight text-zinc-900 mb-3.5 leading-[1.15]">
                            <?= __($mech['title_key']) ?: '' ?>
                        </h3>

                        <p class="text-sm text-zinc-500 font-light leading-relaxed">
                            <?= __($mech['desc_key']) ?: '' ?>
                        </p>

                        <span class="absolute bottom-7 sm:bottom-8 <?= $isRtl ? 'right-7 sm:right-8' : 'left-7 sm:left-8' ?> h-[3px] w-0 bg-yellow-500 rounded-full group-hover:w-10 transition-all duration-500"></span>
                    </article>
                <?php endforeach; ?>

            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         JURY PANEL — 8 judges, redesigned white cards
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20 border-b border-zinc-100">
        <div class="max-w-[1600px] mx-auto">

            <div class="wv-reveal mb-12" data-reveal>
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3"><?= __('bb_jury_label') ?: 'The Judges' ?></span>
                <h3 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 mb-3 leading-tight">
                    <?= __('bb_jury_title') ?: 'Meet Our Qualified Panel of Judges' ?>
                </h3>
                <p class="text-sm font-light text-zinc-500 leading-relaxed max-w-xl">
                    <?= __('bb_jury_subtitle') ?: 'Our panel shortlists the top booths across every category, evaluating design, craft, and innovation in person.' ?>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
                <?php foreach (($bb['jury'] ?? []) as $i => $judge): ?>
                    <article class="wv-reveal group relative bg-white rounded-2xl border border-zinc-100 p-6
                                     transition-all duration-500 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.10)] hover:-translate-y-1 hover:border-zinc-200 flex flex-col"
                              data-reveal data-delay="<?= ($i % 4) * 70 ?>">

                        <span class="block text-center text-[10px] font-mono tracking-[0.25em] text-yellow-600 mb-4">
                            <?= __('bb_jury_tag') ?: 'JURY MEMBER' ?>
                        </span>

                        <div class="w-20 h-20 rounded-full overflow-hidden mx-auto mb-4 ring-2 ring-yellow-500/25 flex-shrink-0">
                            <img src="<?= htmlspecialchars($judge['photo']) ?>" alt=""
                                 class="w-full h-full object-cover">
                        </div>

                        <h4 class="text-sm font-semibold text-zinc-900 text-center leading-snug mb-1.5">
                            <?= __($judge['name_key']) ?: '' ?>
                        </h4>
                        <p class="text-[11px] text-zinc-500 text-center leading-snug mb-4">
                            <?= __($judge['role_key']) ?: '' ?>
                        </p>

                        <p class="text-[11.5px] text-zinc-500 font-light leading-relaxed text-center">
                            <?= __($judge['bio_key']) ?: '' ?>
                        </p>

                        <span class="absolute top-0 <?= $isRtl ? 'right-1/2 translate-x-1/2' : 'left-1/2 -translate-x-1/2' ?> h-[3px] w-0 bg-yellow-500 rounded-full group-hover:w-10 transition-all duration-500"></span>
                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         HOW VISITORS VOTE — 2 steps + closing statement
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20 border-b border-zinc-100 bg-zinc-50/50">
        <div class="max-w-[1600px] mx-auto">

            <div class="wv-reveal mb-10" data-reveal>
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3"><?= __('bb_voting_label') ?: 'How To Vote' ?></span>
                <h3 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 leading-tight">
                    <?= __('bb_voting_title') ?: 'How Do Visitors Participate in Voting?' ?>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5 mb-14">
                <?php foreach (($bb['voting_steps'] ?? []) as $i => $step): ?>
                    <article class="wv-reveal bg-white rounded-2xl border border-zinc-100 p-7 sm:p-8 flex items-start gap-5"
                              data-reveal data-delay="<?= $i * 80 ?>">
                        <div class="w-9 h-9 rounded-full bg-zinc-900 text-white flex items-center justify-center text-[11px] font-mono font-semibold flex-shrink-0">
                            <?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold tracking-tight text-zinc-900 mb-2">
                                <?= __($step['title_key']) ?: '' ?>
                            </h4>
                            <p class="text-sm text-zinc-500 font-light leading-relaxed">
                                <?= __($step['desc_key']) ?: '' ?>
                            </p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <p class="wv-reveal text-xl sm:text-2xl md:text-[1.75rem] font-light text-zinc-700 leading-[1.5] tracking-tight text-center max-w-3xl mx-auto" data-reveal>
                <?= __('bb_closing_statement') ?: "The Best Booth Competition is more than just a celebration of design, it's a platform for appreciation and inspiration. Be part of this exceptional experience, and let's celebrate innovation, beauty, and sustainability together!" ?>
            </p>

        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         NOMINEES — 3 category winners, each with a styled
         text-tile "logo" (no real logo artwork to source for
         these placeholder company names) + 3 photos
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20">
        <div class="max-w-[1600px] mx-auto">

            <div class="wv-reveal flex items-center gap-4 mb-14" data-reveal>
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono whitespace-nowrap"><?= __('bb_nominees_label') ?: '2025 Winners' ?></span>
                <span class="flex-1 h-px bg-zinc-100"></span>
                <h3 class="text-xl sm:text-2xl font-bold tracking-tight text-zinc-900 whitespace-nowrap">
                    <?= __('bb_nominees_title') ?: 'Nominees of Mirzaam 2025 Best Booth Design' ?>
                </h3>
            </div>

            <div class="space-y-14 md:space-y-16">
                <?php foreach (($bb['nominees'] ?? []) as $i => $nom): ?>
                    <div class="wv-reveal" data-reveal data-delay="<?= $i * 60 ?>">

                        <div class="flex items-baseline gap-3 mb-5 flex-wrap">
                            <span class="text-[10px] font-mono tracking-[0.25em] text-yellow-600">
                                <?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?> — <?= strtoupper(__($nom['category_key']) ?: '') ?>
                            </span>
                            <h4 class="text-xl sm:text-2xl font-bold tracking-tight text-zinc-900">
                                <?= __($nom['company_key']) ?: '' ?>
                            </h4>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">

                            <!-- Styled text-tile logo placeholder -->
                            <div class="aspect-[4/3] rounded-xl bg-zinc-900 flex items-center justify-center p-4 group transition-all duration-500 hover:bg-zinc-800">
                                <span class="text-white text-xs sm:text-sm font-bold tracking-[0.15em] uppercase text-center leading-snug">
                                    <?= htmlspecialchars($nom['logo_text']) ?>
                                </span>
                            </div>

                            <?php foreach (($nom['images'] ?? []) as $img): ?>
                                <div class="aspect-[4/3] rounded-xl overflow-hidden bg-zinc-50 relative group">
                                    <img src="<?= htmlspecialchars($img) ?>" alt=""
                                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         CTA — standard finalized pattern
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full py-20 md:py-28 px-4 sm:px-8 lg:px-16 xl:px-24 overflow-hidden bg-zinc-950 wv-grid-texture">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 via-transparent to-yellow-500/5 pointer-events-none"></div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-yellow-500/10 rounded-full blur-[160px] pointer-events-none"></div>

        <div class="relative max-w-[1000px] mx-auto text-center wv-reveal" data-reveal>
            <p class="text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-5 inline-flex items-center gap-3">
                <span class="w-8 h-px bg-yellow-500/60"></span>
                <?= __('bb_cta_eyebrow') ?: 'Cast Your Vote' ?>
                <span class="w-8 h-px bg-yellow-500/60"></span>
            </p>
            <h2 class="text-5xl sm:text-6xl font-bold tracking-tight text-white mb-5 leading-tight">
                <?= __('bb_cta_title') ?: 'Vote for Your Favorite Booth' ?>
            </h2>
            <p class="text-base text-white/55 font-light max-w-2xl mx-auto mb-9 leading-relaxed">
                <?= __('bb_cta_desc') ?: 'Explore the booths during the expo and cast your vote via the Mirzaam App. You must be at the expo location to vote.' ?>
            </p>
            <a href="<?= __('bb_cta_link') ?: '#' ?>"
               class="group inline-flex items-center gap-3 bg-yellow-500 text-black px-7 py-3.5 rounded-full text-xs tracking-[0.2em] uppercase font-bold hover:bg-yellow-400 transition-all duration-300 hover:scale-105">
                <?= __('bb_cta_button') ?: 'Download the App' ?>
                <svg class="w-4 h-4 <?= $isRtl ? 'group-hover:-translate-x-1 rotate-180' : 'group-hover:translate-x-1' ?> transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>

            <div class="mt-14 pt-10 border-t border-white/10 grid grid-cols-3 gap-6 max-w-lg mx-auto">
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-white"><?= __('bb_cta_stat1_value') ?: '3' ?></p>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-white/40 mt-1"><?= __('bb_cta_stat1_label') ?: 'Categories' ?></p>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-white"><?= __('bb_cta_stat2_value') ?: '8' ?></p>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-white/40 mt-1"><?= __('bb_cta_stat2_label') ?: 'Judges' ?></p>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-white"><?= __('bb_cta_stat3_value') ?: 'App' ?></p>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-white/40 mt-1"><?= __('bb_cta_stat3_label') ?: 'Vote Method' ?></p>
                </div>
            </div>
        </div>
    </section>

</div>