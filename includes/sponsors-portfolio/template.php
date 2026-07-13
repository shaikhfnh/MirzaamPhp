<?php
/**
 * ═══════════════════════════════════════════════════════════
 * SPONSORS PORTFOLIO — exact structure, themeable colors
 * SAVE AS: includes/sponsors-portfolio/template.php
 * ═══════════════════════════════════════════════════════════
 * Structure/sizing IDENTICAL to your original (tier_1 bigger
 * cards, tier_2 smaller, same paddings/quirks). Two things
 * fixed vs the last version:
 *
 *   1. THEME — $sponsorsTheme = 'dark' | 'light' now controls
 *      colors. Home = dark glass + white text. Previous Mirzaam
 *      = white cards + dark text.
 *
 *   2. EMPTY WEBSITE_URL BUG — sponsors with no website_url
 *      (e.g. Wood Pecker in your 2024 data) previously rendered
 *      href="" — same "click does nothing, page just reloads"
 *      bug fixed earlier on the header logo. Now renders as a
 *      plain <div> instead of a dead link when no URL exists.
 *
 * REQUIRED:
 *   $tier_1_row, $tier_2_row   arrays of
 *     ['brand_name','tier_tag','website_url','logo_url']
 *   tier_tag = already-resolved display text, not a translation key
 *
 * OPTIONAL:
 *   $sponsorsTheme              'dark' | 'light'  (default 'dark')
 *   $sponsorsSectionHeading     already-translated string
 *   $sponsorsSectionSubheading  already-translated string
 *   $sponsorsViewAllUrl         already-resolved via get_url()
 *   $sponsorsViewAllLabel       already-translated string
 */

$_rtl = ($lang === 'ar');
$sponsorsTheme              = $sponsorsTheme              ?? 'dark';
$sponsorsSectionHeading     = $sponsorsSectionHeading     ?? '';
$sponsorsSectionSubheading  = $sponsorsSectionSubheading  ?? '';
$sponsorsViewAllUrl         = $sponsorsViewAllUrl         ?? '';
$sponsorsViewAllLabel       = $sponsorsViewAllLabel       ?? 'View All Participants';
$tier_1_row = $tier_1_row ?? [];
$tier_2_row = $tier_2_row ?? [];
$_dark = ($sponsorsTheme === 'dark');
?>

<section id="sponsors-portfolio"
         class="<?= $_dark
             ? 'relative w-full py-16 bg-gradient-to-b from-black via-zinc-950 to-black text-white overflow-hidden'
             : 'relative w-full py-16 bg-white text-zinc-900 overflow-hidden' ?>"
         dir="<?= $_rtl ? 'rtl' : 'ltr' ?>">

    <?php if ($_dark): ?>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                w-[75rem] h-[35rem] bg-[var(--secondary)]
                rounded-full blur-[180px] opacity-[0.06] pointer-events-none"></div>
    <?php endif; ?>

    <!-- Header -->
    <?php if ($sponsorsSectionHeading): ?>
    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10
                flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
        <div class="wv-reveal" data-reveal>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium tracking-tight leading-tight uppercase
                       <?= $_dark ? 'text-white' : 'text-zinc-900' ?>">
                <?= $sponsorsSectionHeading ?>
            </h2>
            <?php if ($sponsorsSectionSubheading): ?>
            <p class="mt-4 text-sm md:text-base font-light max-w-xl leading-relaxed uppercase
                      <?= $_dark ? 'text-white/40' : 'text-zinc-500' ?>">
                <?= $sponsorsSectionSubheading ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10 flex flex-col gap-6 md:gap-8">

        <!-- Tier 1 -->
        <div class="flex flex-wrap justify-center gap-3 sm:gap-4 md:gap-5">
            <?php foreach ($tier_1_row as $i => $sponsor):
                $hasUrl = !empty($sponsor['website_url']);
                $tag    = $hasUrl ? 'a' : 'div';
                $attrs  = $hasUrl ? 'href="' . htmlspecialchars($sponsor['website_url']) . '" target="_blank" rel="noopener noreferrer"' : '';
            ?>
            <div class="group relative rounded-2xl
                        w-[calc(50%-2px)] sm:w-[calc(33.333%-2px)] md:w-[calc(25%-2px)]
                        max-w-[260px]
                        flex flex-col
                        transition-all duration-400
                        overflow-hidden
                        wv-reveal
                        <?= $_dark
                            ? 'bg-white/10 backdrop-blur-xl border border-zinc-200/50 shadow-lg hover:shadow-xl'
                            : 'bg-white border border-zinc-200 shadow-lg hover:shadow-xl hover:-translate-y-1' ?>"
                 data-reveal data-delay="<?= $i * 70 ?>">

                <!-- Top bar — tier badge + link -->
                <div class="flex items-center justify-between gap-2 px-3 pt-3 sm:px-4 sm:pt-4 flex-shrink-0">
                    <span class="text-[9px] sm:text-[10px] font-bold tracking-wider uppercase px-2 py-0.5
                                 rounded-full border whitespace-nowrap
                                 <?= $_dark
                                     ? 'text-zinc-400 border-zinc-100'
                                     : 'text-zinc-500 bg-zinc-50 border-zinc-200' ?>">
                        <?= htmlspecialchars($sponsor['tier_tag']) ?>
                    </span>

                    <?php if ($hasUrl): ?>
                    <a href="<?= htmlspecialchars($sponsor['website_url']) ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="transition-colors duration-200 flex-shrink-0
                              <?= $_dark ? 'text-zinc-400 hover:text-white' : 'text-zinc-400 hover:text-black' ?>"
                       aria-label="<?= htmlspecialchars($sponsor['brand_name']) ?>">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>

                <!-- Logo -->
                <<?= $tag ?> <?= $attrs ?> class="flex-1 flex items-center justify-center m-4 pb-2">
                    <?php if (!empty($sponsor['logo_url'])): ?>
                    <img src="<?= htmlspecialchars($sponsor['logo_url']) ?>"
                         alt="<?= htmlspecialchars($sponsor['brand_name']) ?> Logo"
                         class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105 rounded-lg"
                         loading="lazy"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                    <span class="hidden items-center justify-center text-sm font-medium uppercase tracking-wider
                                 <?= $_dark ? 'text-zinc-400' : 'text-zinc-400' ?>">
                        <?= htmlspecialchars($sponsor['brand_name']) ?>
                    </span>
                    <?php else: ?>
                    <span class="flex items-center justify-center text-2xl font-bold uppercase tracking-wider
                                 <?= $_dark ? 'text-zinc-500' : 'text-zinc-300' ?>">
                        <?= htmlspecialchars(substr($sponsor['brand_name'], 0, 2)) ?>
                    </span>
                    <?php endif; ?>
                </<?= $tag ?>>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Tier 2 -->
        <div class="flex flex-wrap justify-center gap-3 sm:gap-4 md:gap-5">
            <?php foreach ($tier_2_row as $i => $sponsor):
                $hasUrl = !empty($sponsor['website_url']);
                $tag    = $hasUrl ? 'a' : 'div';
                $attrs  = $hasUrl ? 'href="' . htmlspecialchars($sponsor['website_url']) . '" target="_blank" rel="noopener noreferrer"' : '';
            ?>
            <div class="group relative rounded-2xl
                        w-[calc(50%-4px)] sm:w-[calc(33.333%-12px)] md:w-[calc(25%-16px)]
                        max-w-[220px]
                        flex flex-col
                        transition-all duration-400
                        overflow-hidden
                        wv-reveal
                        <?= $_dark
                            ? 'bg-white/10 backdrop-blur-xl border border-zinc-200/50 shadow-lg hover:shadow-xl'
                            : 'bg-white border border-zinc-200 shadow-lg hover:shadow-xl hover:-translate-y-1' ?>"
                 data-reveal data-delay="<?= (count($tier_1_row) + $i) * 70 ?>">

                <div class="flex items-center justify-between gap-2 px-3 pt-3 sm:px-4 sm:pt-4 flex-shrink-0">
                    <span class="text-[9px] sm:text-[10px] font-bold tracking-wider uppercase px-2 py-0.5
                                 rounded-full border whitespace-nowrap
                                 <?= $_dark
                                     ? 'text-zinc-400 border-zinc-100'
                                     : 'text-zinc-500 bg-zinc-50 border-zinc-200' ?>">
                        <?= htmlspecialchars($sponsor['tier_tag']) ?>
                    </span>

                    <?php if ($hasUrl): ?>
                    <a href="<?= htmlspecialchars($sponsor['website_url']) ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="p-0.5 transition-colors duration-200 flex-shrink-0
                              <?= $_dark ? 'text-zinc-400 hover:text-white' : 'text-zinc-400 hover:text-black' ?>"
                       aria-label="<?= htmlspecialchars($sponsor['brand_name']) ?>">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>

                <<?= $tag ?> <?= $attrs ?> class="flex-1 flex items-center justify-center p-4">
                    <?php if (!empty($sponsor['logo_url'])): ?>
                    <img src="<?= htmlspecialchars($sponsor['logo_url']) ?>"
                         alt="<?= htmlspecialchars($sponsor['brand_name']) ?> Logo"
                         class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105"
                         loading="lazy"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                    <span class="hidden items-center justify-center text-sm font-medium uppercase tracking-wider
                                 <?= $_dark ? 'text-zinc-400' : 'text-zinc-400' ?>">
                        <?= htmlspecialchars($sponsor['brand_name']) ?>
                    </span>
                    <?php else: ?>
                    <span class="flex items-center justify-center text-2xl font-bold uppercase tracking-wider
                                 <?= $_dark ? 'text-zinc-500' : 'text-zinc-300' ?>">
                        <?= htmlspecialchars(substr($sponsor['brand_name'], 0, 2)) ?>
                    </span>
                    <?php endif; ?>
                </<?= $tag ?>>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- View All -->
        <?php if ($sponsorsViewAllUrl): ?>
        <div class="w-full flex justify-center mt-10 wv-reveal" data-reveal data-delay="<?= (count($tier_1_row) + count($tier_2_row)) * 70 ?>">
            <a href="<?= htmlspecialchars($sponsorsViewAllUrl) ?>"
               class="<?= $_dark
                   ? 'inline-flex items-center justify-center gap-3 px-10 py-4 border border-white text-white font-medium tracking-wide rounded-full text-xs uppercase bg-transparent hover:bg-white hover:text-black transition-all duration-300 active:scale-95 shadow-md'
                   : 'group inline-flex items-center gap-2.5 bg-zinc-900 hover:bg-yellow-500 text-white hover:text-zinc-900 font-semibold text-sm px-7 py-3.5 rounded-full transition-all duration-300' ?>">
                <?= $sponsorsViewAllLabel ?>
                <svg class="w-4 h-4 <?= $_rtl ? 'rotate-180' : '' ?>"
                     fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php
unset($tier_1_row, $tier_2_row, $sponsorsTheme, $sponsorsSectionHeading,
      $sponsorsSectionSubheading, $sponsorsViewAllUrl, $sponsorsViewAllLabel, $_dark);
?>