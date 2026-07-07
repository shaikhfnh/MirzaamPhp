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
 <!-- ═══════════════════════════════════════════════════════
         HERO — B&W photo treatment fixed
         • Gradient no longer fades to solid white directly on
           the image — that's what caused the "bleached out"
           distortion look on a black-and-white photo (no color
           info to soften the transition). Now fades to a warm
           gold-tinted near-white instead, then the actual white
           page background picks up cleanly right at the section
           edge — no harsh blowout inside the image itself.
         • Film grain texture added — same technique used on the
           FNH visionary B&W photo elsewhere on the site. Makes
           the monochrome treatment read as an intentional
           editorial choice instead of a flat desaturated photo.
         • Subtle radial vignette darkens the edges slightly for
           depth, keeps focus centered.
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full h-[56vh] min-h-[440px] max-h-[680px] overflow-hidden bg-white">
        <img src="<?= htmlspecialchars($bb['hero_image'] ?? '') ?>" alt=""
             class="absolute inset-0 w-full h-full object-cover">

        <!-- Main gradient — softer multi-stop curve, ends at a
             warm gold-tinted near-white (NOT solid rgba(255,255,255,1))
             so the transition never fully "bleaches" the image -->
        <div class="absolute inset-0 pointer-events-none"
             style="background-image: linear-gradient(to bottom,
                rgba(0,0,0,0.55) 0%,
                rgba(0,0,0,0.30) 22%,
                rgba(0,0,0,0.10) 42%,
                rgba(234,179,8,0.05) 60%,
                rgba(29, 28, 25, 0.12) 78%,
                rgba(255, 255, 255, 0.84) 96%,
                rgba(255, 255, 255, 0.97) 100%);">
        </div>

        <!-- Radial vignette — subtle edge darkening for depth -->
        <div class="absolute inset-0 pointer-events-none"
             style="background: radial-gradient(ellipse 85% 70% at 50% 35%, transparent 0%, rgba(0,0,0,0.18) 100%);">
        </div>

        <!-- Film grain — ties into the same B&W treatment used
             on the FNH visionary photo, makes monochrome feel
             intentional rather than flat -->
        <div class="absolute inset-0 pointer-events-none opacity-[0.05] mix-blend-overlay"
             style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22><filter id=%22n%22><feTurbulence type=%22fractalNoise%22 baseFrequency=%220.9%22 numOctaves=%222%22 stitchTiles=%22stitch%22/></filter><rect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23n)%22/></svg>');">
        </div>

        <div class="absolute inset-x-0 bottom-0 px-4 sm:px-8 lg:px-16 xl:px-24 pb-10 md:pb-14">
            <div class="max-w-[1600px] mx-auto">
                <p class="inline-flex items-center gap-3 text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-4"
                   style="text-shadow: 0 2px 12px rgba(0,0,0,0.25);">
                    <span class="w-8 h-px bg-yellow-500/70"></span>
                    <?= __('bb_eyebrow') ?: 'Mirzaam Expo 2025' ?>
                </p>
                <h1 class="text-5xl sm:text-7xl lg:text-8xl font-bold tracking-tighter text-white leading-[0.9] mb-4"
                    style="text-shadow: 0 4px 24px rgba(0,0,0,0.3);">
                    <?= __('bb_title') ?: 'Best Booth' ?>
                    <span class="text-yellow-500"><?= __('bb_title_accent') ?: 'Competition' ?></span>
                </h1>
                <p class="text-sm sm:text-base text-white/85 font-light max-w-lg leading-relaxed"
                   style="text-shadow: 0 2px 10px rgba(0,0,0,0.25);">
                    <?= __('bb_hero_subtitle') ?: 'Vote for the best booth across three categories — Innovation, Aesthetics, and Sustainability.' ?>
                </p>
            </div>
        </div>
    </section>


<!-- ═══════════════════════════════════════════════════════
         INTRO + HONORING PARTICIPANTS — redesigned
         • A: stat strip (3 Categories / 8 Judges) grounds the
           intro in real numbers instead of pure prose
         • B: "Honoring Participants" is now its own distinct
           callout box (tinted bg, left accent border) instead
           of blending into the same text column as the intro
         • C: "2025 Edition" label now shows on mobile too, as
           a small inline badge above the intro paragraph
           (previously hidden lg:flex — invisible on mobile)
         • D: decorative quote mark accent behind the intro
           paragraph, echoes the treatment used in the Voting
           section's closing statement — ties the page together
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full py-12 md:py-16 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-zinc-100 wv-reveal" data-reveal>
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-8 items-start">

            <!-- Left sidebar — desktop label + stat strip -->
            <div class="lg:col-span-3">
                <span class="hidden lg:inline-flex text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono mb-6">
                    <?= __('bb_overview_label') ?: '2025 Edition' ?>
                </span>

                <!-- A: stat strip -->
                <div class="hidden lg:block space-y-5 pt-1">
                    <div>
                        <p class="text-3xl font-bold tracking-tight text-zinc-900 leading-none"><?= count($bb['mechanics'] ?? []) ?: 3 ?></p>
                        <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-400 font-medium mt-1"><?= __('bb_mechanics_label') ?: 'Categories' ?></p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold tracking-tight text-zinc-900 leading-none"><?= count($bb['jury_slides'] ?? []) ?: 8 ?></p>
                        <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-400 font-medium mt-1"><?= __('bb_jury_count_label') ?: 'Judges' ?></p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-9 xl:col-span-8">

                <!-- C: mobile-visible edition badge -->
                <span class="lg:hidden inline-flex items-center gap-2 text-[10px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono mb-5">
                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                    <?= __('bb_overview_label') ?: '2025 Edition' ?>
                </span>

                <!-- A: mobile stat strip (inline row instead of
                     the sidebar column used on desktop) -->
                <div class="lg:hidden flex items-center gap-6 mb-6 pb-6 border-b border-zinc-100">
                    <div>
                        <p class="text-2xl font-bold tracking-tight text-zinc-900 leading-none"><?= count($bb['mechanics'] ?? []) ?: 3 ?></p>
                        <p class="text-[9px] uppercase tracking-[0.15em] text-zinc-400 font-medium mt-1"><?= __('bb_mechanics_label') ?: 'Categories' ?></p>
                    </div>
                    <div class="w-px h-8 bg-zinc-200"></div>
                    <div>
                        <p class="text-2xl font-bold tracking-tight text-zinc-900 leading-none"><?= count($bb['jury_slides'] ?? []) ?: 8 ?></p>
                        <p class="text-[9px] uppercase tracking-[0.15em] text-zinc-400 font-medium mt-1"><?= __('bb_jury_count_label') ?: 'Judges' ?></p>
                    </div>
                </div>

                <!-- D: decorative quote accent behind the intro text -->
                <div class="relative mb-10">
                    <span class="absolute -top-3 -left-1 text-yellow-500/10 font-serif text-8xl leading-none select-none pointer-events-none" aria-hidden="true">&ldquo;</span>
                    <p class="relative text-2xl sm:text-3xl md:text-[2rem] font-light text-zinc-700 leading-[1.5] tracking-tight">
                        <?= __('bb_intro') ?: "The Best Booth Competition at Mirzaam Expo is one of the most anticipated events of the year. It's a moment where we celebrate the incredible designs and innovations that make Mirzaam a unique platform for elegance and creativity." ?>
                    </p>
                </div>

                <!-- B: Honoring Participants — distinct callout box -->
                <div class="bg-yellow-50/60 border-l-[3px] border-yellow-500 rounded-r-2xl p-6 sm:p-7 max-w-2xl">
                    <h3 class="text-lg font-semibold tracking-tight text-zinc-900 mb-2 flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-yellow-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <?= __('bb_honoring_title') ?: 'Honoring Participants' ?>
                    </h3>
                    <p class="text-sm text-zinc-600 font-light leading-relaxed">
                        <?= __('bb_honoring_desc') ?: 'All Mirzaam participants deserve acknowledgment for their outstanding booth designs, exceptional executions, and significant investments. Each booth is a testament to the creativity and dedication that defines Mirzaam year after year.' ?>
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         COMPETITION MECHANICS — icons replace numbered badges
         • E: icon per category — lightbulb (Innovation), sparkle
           (Aesthetics), leaf (Sustainability)
         • F: numbered circles removed entirely, matching the
           icon-based pattern already used in the Voting section
           further down — consistent visual language across
           the page instead of numbers in one place, icons in
           another
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

                <?php
                // E: one icon per mechanics category — lightbulb
                // for Innovation, sparkle for Aesthetics, leaf for
                // Sustainability. Falls back to a generic icon if
                // a 4th category is ever added.
                $mech_icons = [
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M9 18h6M10 21h4M12 3a6 6 0 00-3 11.2c.4.3.6.8.6 1.3v.5h4.8v-.5c0-.5.2-1 .6-1.3A6 6 0 0012 3z"/>',
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3v3M12 18v3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M3 12h3M18 12h3M4.9 19.1L7 17M17 7l2.1-2.1"/><circle cx="12" cy="12" r="3.5"/>',
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M12 22v-9M12 13c0-3-2-5-6-5 0 4 2 6 6 6zM12 13c0-4 2-6 6-6 0 4-2 6-6 6z"/>',
                ];
                ?>

                <?php foreach (($bb['mechanics'] ?? []) as $i => $mech): ?>
                    <article class="wv-reveal group relative bg-white rounded-2xl border border-zinc-100 p-7 sm:p-8
                                     transition-all duration-500 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.10)] hover:-translate-y-1 hover:border-zinc-200"
                              data-reveal data-delay="<?= $i * 80 ?>">

                        <!-- F: icon replaces the numbered circle -->
                        <div class="w-11 h-11 rounded-full bg-yellow-50 text-yellow-600 flex items-center justify-center mb-5 transition-colors duration-500 group-hover:bg-zinc-900 group-hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <?= $mech_icons[$i] ?? $mech_icons[0] ?>
                            </svg>
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


<<!-- ============================================================
         JURY — carousel of real slide graphics from mirzaam.com/jury/
         FIXED:
         • Aspect ratio corrected to square (1:1) — real images are
           1667×1667, the previous aspect-video (16:9) was cropping
           them badly (rendered at 254×143 inside a square source)
         • Auto-slide added — advances every 3.5s, pauses on hover,
           loops back to start when it reaches the end, manual
           prev/next still works and resets the auto-timer
    ============================================================ -->
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20 border-b border-zinc-100 bg-zinc-50/50"
              x-data="{
                  slides: <?= htmlspecialchars(json_encode($best_booth['jury_slides']), ENT_QUOTES) ?>,
                  track: null,
                  lightboxOpen: false,
                  current: 0,
                  autoTimer: null,

                  scroll(dir) {
                      const card = this.track.querySelector('.jury-card');
                      const amount = card ? card.offsetWidth + 16 : 300;
                      const atEnd = this.track.scrollLeft + this.track.clientWidth >= this.track.scrollWidth - 10;
                      const atStart = this.track.scrollLeft <= 10;

                      if (dir > 0 && atEnd) {
                          this.track.scrollTo({ left: 0, behavior: 'smooth' });
                      } else if (dir < 0 && atStart) {
                          this.track.scrollTo({ left: this.track.scrollWidth, behavior: 'smooth' });
                      } else {
                          this.track.scrollBy({ left: dir * amount, behavior: 'smooth' });
                      }
                  },

                  startAuto() {
                      this.stopAuto();
                      this.autoTimer = setInterval(() => this.scroll(1), 3500);
                  },
                  stopAuto() {
                      if (this.autoTimer) clearInterval(this.autoTimer);
                  },
                  manualNav(dir) {
                      this.scroll(dir);
                      this.startAuto(); // reset timer on manual interaction
                  }
              }"
              x-init="startAuto()"
              @mouseenter="stopAuto()"
              @mouseleave="startAuto()">
        <div class="max-w-[1600px] mx-auto">

            <div class="flex items-end justify-between gap-6 mb-10 wv-reveal" data-reveal>
                <div>
                    <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                        <?= __('bb_jury_label') ?: 'The Judges' ?>
                    </span>
                    <h3 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 leading-tight">
                        <?= __('bb_jury_title') ?: 'Meet Our Qualified Panel of Judges' ?>
                    </h3>
                </div>

                <span class="hidden sm:inline-flex items-center gap-2 text-[11px] font-mono text-zinc-400 uppercase tracking-wider whitespace-nowrap">
                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                    <?= count($best_booth['jury_slides']) ?> <?= __('bb_jury_count_label') ?: 'Judges' ?>
                </span>
            </div>

            <div class="relative">
                <div x-ref="track" x-init="track = $refs.track"
                     class="flex gap-4 overflow-x-auto pb-2 scroll-smooth snap-x snap-mandatory"
                     style="-webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">
                    <template x-for="(slide, i) in slides" :key="i">
                        <div class="jury-card flex-shrink-0 w-[240px] sm:w-[280px] snap-start">
                            <div class="bg-white rounded-2xl border border-zinc-100 shadow-[0_8px_24px_-8px_rgba(0,0,0,0.08)]
                                        p-3 cursor-pointer group hover:shadow-[0_16px_36px_-10px_rgba(0,0,0,0.14)]
                                        transition-shadow duration-300"
                                 @click="lightboxOpen = true; current = i; stopAuto();">
                                <!-- FIXED: aspect-square matches the real
                                     1667×1667 source images -->
                                <div class="relative aspect-square rounded-xl overflow-hidden bg-zinc-100">
                                    <img :src="slide" :alt="'Jury panel ' + (i + 1)" loading="lazy"
                                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="hidden sm:flex items-center justify-center gap-2 mt-6">
                    <button @click="manualNav(-1)" type="button"
                            class="w-10 h-10 rounded-full border border-zinc-200 bg-white hover:bg-zinc-900 hover:text-white hover:border-zinc-900 flex items-center justify-center transition-all duration-300">
                        <svg class="w-4 h-4 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                        </svg>
                    </button>
                    <button @click="manualNav(1)" type="button"
                            class="w-10 h-10 rounded-full border border-zinc-200 bg-white hover:bg-zinc-900 hover:text-white hover:border-zinc-900 flex items-center justify-center transition-all duration-300">
                        <svg class="w-4 h-4 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>
                    </button>
                </div>
            </div>

        </div>

        <!-- Lightbox -->
        <div x-show="lightboxOpen" x-cloak
             x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[9000] bg-black/95 flex items-center justify-center p-4"
             @click.self="lightboxOpen = false" @keydown.escape.window="lightboxOpen = false"
             @keydown.arrow-left.window="current = (current - 1 + slides.length) % slides.length"
             @keydown.arrow-right.window="current = (current + 1) % slides.length">

            <button @click="lightboxOpen = false" class="absolute top-5 right-5 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <button @click="current = (current - 1 + slides.length) % slides.length" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <img :src="slides[current]" alt="" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain">
            <button @click="current = (current + 1) % slides.length" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
            <p class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/40 text-xs font-mono">
                <span x-text="current + 1"></span> / <span x-text="slides.length"></span>
            </p>
        </div>
    </section>


<!-- ═══════════════════════════════════════════════════════
         HOW VISITORS VOTE — redesigned
         • A+G: horizontal timeline instead of side-by-side cards
           — a connecting line runs between the two steps, breaks
           the repeated card pattern used in Pillars/Mechanics
         • B: icons replace plain number badges (compass for
           "explore," ballot/check for "vote")
         • D: location-pin callout badge highlights the
           "must be at the expo" constraint instead of burying
           it in body text
         • E: small real phone visual (iPhone17.png from
           app_connect_data) bridges this section to the App
           download CTA further down the page
         • F: large decorative quote mark on the closing
           statement, matching the treatment style used in the
           Mirzaamiyat intro quote card elsewhere on the site
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20 border-b border-zinc-100 bg-zinc-50/50">
        <div class="max-w-[1600px] mx-auto">

            <div class="wv-reveal mb-14" data-reveal>
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                    <?= __('bb_voting_label') ?: 'How To Vote' ?>
                </span>
                <h3 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 leading-tight">
                    <?= __('bb_voting_title') ?: 'How Do Visitors Participate in Voting?' ?>
                </h3>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center mb-16">

                <!-- Timeline — steps + connecting line -->
                <div class="lg:col-span-8">
                    <div class="relative">

                        <!-- A: connecting line, desktop only (runs
                             between the two icon circles) -->
                        <div class="hidden sm:block absolute top-8 left-[10%] right-[10%] h-px bg-gradient-to-r from-zinc-200 via-yellow-400/60 to-zinc-200"></div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 sm:gap-6 relative">
                            <?php
                            // B: one icon per step — compass for
                            // exploring, ballot/check for voting.
                            // Falls back to a generic icon if a 3rd
                            // step is ever added.
                            $step_icons = [
                                '<circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M14.5 9.5l-2 5-3 1.5 2-5 3-1.5z"/>',
                                '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>',
                            ];
                            ?>
                            <?php foreach (($bb['voting_steps'] ?? []) as $i => $step): ?>
                                <article class="wv-reveal flex flex-col items-center sm:items-start text-center sm:text-left"
                                          data-reveal data-delay="<?= $i * 100 ?>">

                                    <!-- Icon circle, sits ON the connecting line -->
                                    <div class="relative z-10 w-16 h-16 rounded-full bg-white border-2 border-zinc-900 text-zinc-900 flex items-center justify-center mb-5 shadow-[0_4px_16px_-4px_rgba(0,0,0,0.12)]">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                            <?= $step_icons[$i] ?? $step_icons[0] ?>
                                        </svg>
                                    </div>

                                    <h4 class="text-lg sm:text-xl font-semibold tracking-tight text-zinc-900 mb-2">
                                        <?= __($step['title_key']) ?: '' ?>
                                    </h4>
                                    <p class="text-sm text-zinc-500 font-light leading-relaxed max-w-[280px]">
                                        <?= __($step['desc_key']) ?: '' ?>
                                    </p>

                                    <!-- D: location-pin callout — only
                                         on the voting step, highlights
                                         the on-site requirement instead
                                         of burying it in body text -->
                                    <?php if ($i === 1): ?>
                                    <span class="inline-flex items-center gap-1.5 mt-4 text-[10px] font-mono uppercase tracking-wider text-yellow-700 bg-yellow-50 border border-yellow-200 px-2.5 py-1.5 rounded-full">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.686 2 6 4.686 6 8c0 4.5 6 12 6 12s6-7.5 6-12c0-3.314-2.686-6-6-6z"/>
                                            <circle cx="12" cy="8" r="2"/>
                                        </svg>
                                        <?= __('bb_voting_onsite_note') ?: 'Must be at the expo' ?>
                                    </span>
                                    <?php endif; ?>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- E: small phone visual bridging to the App CTA
                     further down the page — desktop only -->
              <!-- E: phone visual with a DUMMY placeholder screen
                     inside the frame — built with CSS/HTML (no
                     external image needed), showing a simple mock
                     "voting app" UI so the frame isn't empty while
                     the real app UI is still in progress.

                     REPLACE LATER: once the real app UI is ready,
                     delete everything inside the "SCREEN CONTENT"
                     comment block below and put a real screenshot
                     <img> there instead — the positioning wrapper
                     around it can stay as-is.

                     NOTE ON ALIGNMENT: the inset percentages below
                     (top-[2.5%] etc.) are an estimate based on a
                     typical modern phone-frame mockup's bezel
                     proportions. Your iPhone17.png may have a
                     slightly different bezel — if the dummy screen
                     doesn't line up exactly inside the frame's
                     screen cutout, nudge these percentages up/down
                     by 1-2% until it sits flush. -->
                <div class="hidden lg:flex lg:col-span-4 justify-center wv-reveal" data-reveal data-delay="200">
                    <div class="relative w-[140px]">

                        <!-- Phone frame — real asset -->
                        <img src="<?= htmlspecialchars($app_connect_data['frame_image'] ?? '') ?>"
                             alt="Mirzaam App"
                             class="relative z-10 w-full h-auto drop-shadow-[0_20px_40px_rgba(0,0,0,0.15)]">

                        <!-- ══ SCREEN CONTENT — dummy placeholder ══ -->
                        <div class="absolute z-0 top-[2.5%] left-[6%] right-[6%] bottom-[2.5%] rounded-[18px] overflow-hidden bg-[#1E2F4D]">

                            <!-- Mock status/header bar -->
                            <div class="pt-5 pb-3 px-3 text-center border-b border-white/10">
                                <p class="text-[8px] font-mono uppercase tracking-[0.2em] text-[#C9A267]">
                                    <?= __('bb_voting_app_note') ?: 'Vote in the App' ?>
                                </p>
                            </div>

                            <!-- Mock "booth card" placeholder content —
                                 loosely evokes a voting list UI -->
                            <div class="p-2.5 space-y-2">
                                <?php for ($m = 0; $m < 3; $m++): ?>
                                <div class="bg-white/[0.06] rounded-lg p-2 flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-md bg-[#C9A267]/25 flex-shrink-0"></div>
                                    <div class="flex-1 space-y-1">
                                        <div class="h-1.5 bg-white/20 rounded-full w-3/4"></div>
                                        <div class="h-1.5 bg-white/10 rounded-full w-1/2"></div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            </div>

                            <!-- Mock vote button -->
                            <div class="absolute bottom-4 left-2.5 right-2.5">
                                <div class="bg-[#C9A267] rounded-full h-6 flex items-center justify-center">
                                    <span class="text-[7px] font-bold uppercase tracking-wider text-[#1E2F4D]">
                                        <?= __('bb_step2_title') ?: 'Cast Your Vote' ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- ══ END SCREEN CONTENT ══ -->

                        <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 whitespace-nowrap z-20
                                    bg-zinc-900 text-white text-[10px] font-mono uppercase tracking-wider
                                    px-3 py-1.5 rounded-full shadow-lg">
                            <?= __('bb_voting_app_note') ?: 'Vote in the App' ?>
                        </div>
                    </div>
                </div>

            </div>

            <!-- F: closing statement with decorative quote mark -->
            <div class="relative max-w-3xl mx-auto text-center wv-reveal" data-reveal>
                <span class="block text-yellow-500/20 font-serif text-7xl sm:text-8xl leading-none mb-2 select-none" aria-hidden="true">&ldquo;</span>
                <p class="text-xl sm:text-2xl md:text-[1.75rem] font-light text-zinc-700 leading-[1.5] tracking-tight -mt-8">
                    <?= __('bb_closing_statement') ?: "The Best Booth Competition is more than just a celebration of design, it's a platform for appreciation and inspiration. Be part of this exceptional experience, and let's celebrate innovation, beauty, and sustainability together!" ?>
                </p>
            </div>

        </div>
    </section>


<!-- ============================================================
         NOMINEES — "Winner's Seal" design, finalized
         • Header now matches the stacked left-aligned pattern
           used in Mechanics / Jury / Voting sections (small
           eyebrow on top, large bold title below) instead of
           the inline eyebrow—line—title row, which read too
           small and inconsistent with the rest of the page
         • Active thumbnail ring changed from gold to black —
           gold had poor contrast sitting on bright photo edges;
           black ring + shadow reads clearly at a glance
         • Added card hover lift + shadow, matching the language
           already used on Pillars / Mechanics / Voting cards
           elsewhere on this page
    ============================================================ -->
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20">
        <div class="max-w-[1600px] mx-auto">

            <!-- Header — stacked, left-aligned, matches Mechanics/
                 Jury/Voting sections exactly -->
            <div class="wv-reveal mb-12" data-reveal>
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3">
                    <?= __('bb_nominees_label') ?: '2025 Winners' ?>
                </span>
                <h3 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 leading-tight max-w-2xl">
                    <?= __('bb_nominees_title') ?: 'Winners of Mirzaam 2025 Best Booth Design' ?>
                </h3>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-6 md:gap-x-7 gap-y-16 md:gap-y-20"
                 x-data="{
                     lightboxOpen: false,
                     activeSet: [],
                     current: 0,
                     openLightbox(images, i) { this.activeSet = images; this.current = i; this.lightboxOpen = true; }
                 }">

                <?php foreach (($best_booth['nominees'] ?? []) as $i => $nom):
                    $images = $nom['images'] ?? [];
                    if (empty($images)) continue;
                ?>
                    <article class="wv-reveal group/card transition-all duration-500" data-reveal data-delay="<?= $i * 80 ?>"
                             x-data="{ heroIndex: 0 }">

                        <!-- Hero photo -->
                        <div class="relative aspect-[4/3] sm:aspect-[16/11] rounded-2xl overflow-hidden bg-zinc-100 cursor-pointer group
                                    shadow-[0_4px_16px_-4px_rgba(0,0,0,0.08)] group-hover/card:shadow-[0_20px_44px_-12px_rgba(0,0,0,0.18)]
                                    transition-shadow duration-500"
                             @click="openLightbox(<?= htmlspecialchars(json_encode($images), ENT_QUOTES) ?>, heroIndex)">

                            <img :src="<?= htmlspecialchars(json_encode($images), ENT_QUOTES) ?>[heroIndex]"
                                 alt="<?= htmlspecialchars(__($nom['company_key']) ?: '') ?>"
                                 class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                            <!-- Trophy + category, top-left -->
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center gap-1.5 text-[10px] font-mono tracking-[0.2em] text-yellow-300 bg-black/40 backdrop-blur-sm border border-yellow-400/30 px-2.5 py-1 rounded-full">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l1.7 5.3H19l-4.4 3.2 1.7 5.3-4.3-3.2-4.3 3.2 1.7-5.3L5 7.3h5.3z"/>
                                    </svg>
                                    <?= strtoupper(__($nom['category_key']) ?: '') ?>
                                </span>
                            </div>

                            <!-- Photo count, top-right -->
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center gap-1 text-[10px] font-mono text-white/80 bg-black/40 backdrop-blur-sm px-2 py-1 rounded-full">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <?= count($images) ?>
                                </span>
                            </div>
                        </div>

                        <!-- Seal + company name -->
                        <div class="flex items-end gap-3.5 px-1 -mt-8 relative z-10">

                            <div class="w-16 h-16 sm:w-[72px] sm:h-[72px] rounded-full bg-white shadow-[0_8px_24px_-6px_rgba(0,0,0,0.25)] border-4 border-white flex items-center justify-center overflow-hidden flex-shrink-0">
                                <img src="<?= htmlspecialchars($nom['logo']) ?>"
                                     alt="<?= htmlspecialchars(__($nom['company_key']) ?: '') ?>"
                                     class="w-full h-full object-cover">
                            </div>

                            <div class="pb-1.5 min-w-0">
                                <?php if (!empty($nom['website'])): ?>
                                    <a href="<?= htmlspecialchars($nom['website']) ?>" target="_blank" rel="noopener noreferrer"
                                       class="text-lg sm:text-xl font-bold text-zinc-900 hover:text-yellow-600 transition-colors duration-200 inline-flex items-center gap-1.5 leading-tight">
                                        <?= __($nom['company_key']) ?: '' ?>
                                        <svg class="w-3.5 h-3.5 opacity-40" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                <?php else: ?>
                                    <h4 class="text-lg sm:text-xl font-bold text-zinc-900 leading-tight">
                                        <?= __($nom['company_key']) ?: '' ?>
                                    </h4>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Thumbnail strip — active ring now black
                             with a shadow instead of gold, reads
                             clearly regardless of the underlying
                             photo's brightness -->
                        <?php if (count($images) > 1): ?>
                        <div class="flex gap-2 mt-4">
                            <?php foreach ($images as $ti => $thumb): ?>
                                <button type="button"
                                        @click="heroIndex = <?= $ti ?>"
                                        @dblclick="openLightbox(<?= htmlspecialchars(json_encode($images), ENT_QUOTES) ?>, <?= $ti ?>)"
                                        class="flex-1 aspect-square rounded-lg overflow-hidden transition-all duration-200"
                                        :class="heroIndex === <?= $ti ?>
                                            ? 'ring-2 ring-zinc-900 ring-offset-2 shadow-[0_4px_12px_-2px_rgba(0,0,0,0.25)] scale-[1.03]'
                                            : 'ring-1 ring-transparent hover:ring-zinc-300'">
                                    <img src="<?= htmlspecialchars($thumb) ?>" alt=""
                                         class="w-full h-full object-cover">
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                    </article>
                <?php endforeach; ?>

                <!-- Shared lightbox -->
                <div x-show="lightboxOpen" x-cloak
                     x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="fixed inset-0 z-[9000] bg-black/95 flex items-center justify-center p-4"
                     @click.self="lightboxOpen = false" @keydown.escape.window="lightboxOpen = false"
                     @keydown.arrow-left.window="current = (current - 1 + activeSet.length) % activeSet.length"
                     @keydown.arrow-right.window="current = (current + 1) % activeSet.length">

                    <button @click="lightboxOpen = false" class="absolute top-5 right-5 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                    <button @click="current = (current - 1 + activeSet.length) % activeSet.length" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <img :src="activeSet[current]" alt="" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain">
                    <button @click="current = (current + 1) % activeSet.length" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </button>
                    <p class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/40 text-xs font-mono">
                        <span x-text="current + 1"></span> / <span x-text="activeSet.length"></span>
                    </p>
                </div>

            </div>
        </div>
    </section>

<!-- ═══════════════════════════════════════════════════════
         CTA — App download, real badges from global data
         • Desktop: both App Store + Google Play badges shown
         • Mobile: only the matching platform's badge shows
           (iOS visitors see Apple only, Android see Google only)
         • Device detection via CSS + a tiny inline script,
           no layout shift — badges are pre-rendered, just
           hidden/shown based on detected platform
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

            <!-- Store badges — real images + real links from
                 $app_connect_data, no more placeholder button -->
            <div class="flex items-center justify-center gap-4 flex-wrap">

                <a href="<?= htmlspecialchars($app_connect_data['apple_link'] ?? '#') ?>"
                   target="_blank" rel="noopener noreferrer"
                   id="bb-apple-badge"
                   class="store-badge inline-flex items-center transition-transform duration-300 hover:scale-105">
                    <img src="<?= htmlspecialchars($app_connect_data['app_store'] ?? '') ?>"
                         alt="<?= htmlspecialchars(__('bb_cta_apple_alt') ?: 'Download on the App Store') ?>"
                         class="h-12 sm:h-[52px] w-auto">
                </a>

                <a href="<?= htmlspecialchars($app_connect_data['google_link'] ?? '#') ?>"
                   target="_blank" rel="noopener noreferrer"
                   id="bb-google-badge"
                   class="store-badge inline-flex items-center transition-transform duration-300 hover:scale-105">
                    <img src="<?= htmlspecialchars($app_connect_data['google_play'] ?? '') ?>"
                         alt="<?= htmlspecialchars(__('bb_cta_google_alt') ?: 'Get it on Google Play') ?>"
                         class="h-12 sm:h-[52px] w-auto">
                </a>

            </div>

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

 <script>
    (function () {
        // Device-aware badge display — desktop always shows both.
        // On mobile: iOS visitors see only the Apple badge,
        // Android visitors see only the Google badge. Detection
        // runs once on load, no layout shift since both badges
        // are already rendered — this just hides the non-matching
        // one via a class toggle.
        var ua = navigator.userAgent || navigator.vendor || window.opera;
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(ua);
        if (!isMobile) return; // desktop keeps both badges, do nothing

        var isIOS     = /iPad|iPhone|iPod/.test(ua) && !window.MSStream;
        var isAndroid = /Android/.test(ua);

        var appleBadge  = document.getElementById('bb-apple-badge');
        var googleBadge = document.getElementById('bb-google-badge');

        if (isIOS && googleBadge)      googleBadge.style.display = 'none';
        else if (isAndroid && appleBadge) appleBadge.style.display = 'none';
        // Mobile but neither iOS nor Android detected (rare) —
        // leave both visible as a safe fallback.
    })();
    </script>
