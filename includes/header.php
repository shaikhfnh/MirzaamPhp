<?php
/**
 * These variables are injected from index.php
 * @var string $lang
 */
// Ensure i18n.php is loaded in index.php before this file
require_once __DIR__ . '/../app/data/menu.php';

// ── Mirzaamiyat page detection ──────────────────────────────
// Swaps just the logo when the URL path contains "mirzaamiyat"
// (e.g. /mirzaamiyat/about, /mirzaamiyat/exhibitors).
// No logo file exists yet — using a text wordmark stand-in.
// Replace the text block below with an <img> once a real
// Mirzaamiyat logo asset is provided.
$isMirzaamiyatPage = str_contains($_SERVER['REQUEST_URI'], 'mirzaamiyat')
                  || str_contains($_SERVER['REQUEST_URI'], 'mirzaamiyat');

$mz_booth_url = $site_blueprint['mirzaamiyat']['booth_registration_url'] ?? '';
$main_booth_url = $site_blueprint['booth_registration_url'] ?? '';


?>

<header id="mainHeader" class="fixed top-0 left-0 w-full bg-black border-b border-white/10 z-50">
    <div class="mx-auto px-5">
        <div class="flex items-center justify-between h-[80px] lg:h-full lg:py-2">
            <div class="flex">
                <?php if ($isMirzaamiyatPage): ?>
                    <a href="<?= get_url('mirzaamiyat') ?>" class="flex items-center">
                        
                        <img src="/mirzaam/assets/images/logo/mirzaamiyat.png" class="w-[80px] lg:w-[120px] h-full grid self-center">
                    </a>
                    <?php else: ?>
                        <a href="<?= get_url('/') ?>" class="flex items-center">
                            <img src="/mirzaam/assets/images/logo/WHITE LOGO.png" class="w-[80px] lg:w-[100px] h-full grid self-center">
                        </a>
                    <?php endif; ?>
                <div class="ms-5 hidden lg:block  w-[1px] bg-white"></div>
                <div class="ms-5 grid justify-between ">
                    <div class="hidden lg:block border-l border-white/10 ">
                         <?php if ($isMirzaamiyatPage): ?>
                              <div class="">
                                <div class=" text-[14px]  uppercase "><?= __('header_date_mirzaamiyat') ?></div>
                                <div class="text-[14px]  uppercase ">
                                <?= __('header_time_mirzaamiyat') ?>&nbsp;
                                    <?= __('header_location_location') ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class=" ">
                                <div class=" text-[14px]  uppercase "><?= __('header_date') ?>
                            &nbsp;
                               <?= __('header_time') ?></div>
                                <div class=" text-[14px]  uppercase ">

                                 
                                    <?= __('header_location') ?>
                                </div>
                            </div>
                    <?php endif; ?>
                    </div>
                    <nav class="hidden lg:flex gap-3 lg:gap-8 h-full items-end">
                        <div class="flex gap-3 xl:gap-4 ">
                            <?php foreach($MENU as $menu): ?>
                                <div class="nav-item group relative text-white text-sm">
                                    <button class="flex items-center gap-1 uppercase tracking-wide text-[10px] lg:text-[14px] font-medium transition-all duration-300 hover:text-yellow-400">
                                        <span><?= __($menu['title']); ?></span>
                                        <svg class="w-4 h-4 text-white/70 transition-transform duration-300 group-hover:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="dropdown absolute bg-black border border-white/10 rounded-lg p-3 hidden group-hover:block z-50">
                                        <?php foreach($menu['items'] as $item): ?>
                                            <?php
                                                // ─────────────────────────────────────────────
                                                // Resolve the URL based on whether the link
                                                // points off-site or to an internal route.
                                                // ─────────────────────────────────────────────
                                                $isExternal = !empty($item['external']);
                                                $href       = $isExternal ? $item['link'] : get_url($item['link']);
                                                $target     = $isExternal ? ' target="_blank" rel="noopener noreferrer"' : '';
                                            ?>
                                            <a href="<?= htmlspecialchars($href) ?>"<?= $target ?> class="block py-2 hover:text-yellow-400">
                                                <?= __($item['label']); ?>
                                                <?php if ($isExternal): ?>
                                                    <svg class="inline-block w-3 h-3 ms-1 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                    </svg>
                                                <?php endif; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </nav>
                </div>
            </div>

 <div class="hidden lg:flex gap-3 items-center h-10">

     <?php if ($isMirzaamiyatPage): ?>

        <!-- Mirzaam logo link — fixed h-10 to match the row,
             width auto-scales with the image ratio instead of
             the fragile h-full on a flex parent -->
        <a href="<?= get_url('/') ?>"
           class="h-10 bg-white flex items-center rounded-md ">
            <img src="/mirzaam/assets/images/footer/mirzaam.png"
                 alt="Mirzaam"
                 class="h-10 w-full  border border-white/20 hover:border-white/40 rounded-md  transition-colors duration-200  ">
        </a>

        <?php endif; ?>

    <!-- Lang switch — unchanged size, now the height reference
         every other element in this row matches against -->
    <a href="<?= get_switch_url() ?>"
       class="h-10 inline-flex items-center border border-white/20 hover:border-white/40 rounded-md px-4 text-sm text-white transition-colors duration-200">
        <?= ($lang === 'en' ? 'عربي' : 'EN') ?>
    </a>





     
      <?php if (!empty($main_booth_url)): ?>
 
      <!-- ENABLED — same white/black look you already have -->
      <a href="<?= htmlspecialchars($main_booth_url) ?>"
      rel="noopener noreferrer"
       class="h-10 inline-flex items-center justify-center
              bg-white/10 hover:bg-white/20
              text-white/90 text-sm font-medium
              border border-white/25
              px-5 rounded-lg
              transition-colors duration-200">
        <?= __('book_booth') ?>
     </a>
 
     <?php else: ?>
 
     <!-- DISABLED — on a black bg, a low-opacity WHITE fill reads
         as "muted/inactive" without disappearing into the
         background the way a dark gray would. Border makes the
         button's shape clearly readable even at low opacity. -->
     <button type="button"
            disabled
            aria-disabled="true"
            title="<?= htmlspecialchars(__('booth_coming_soon') ?: 'Registration opening soon') ?>"
            class="h-10 inline-flex items-center justify-center gap-2
                  bg-orange-100/10 
                   text-white/50 text-sm font-medium
                   px-4 rounded-lg
                   border border-white/15
                   cursor-not-allowed select-none">
        <?= __('book_booth') ?>
        <span class="text-[8px] font-mono uppercase tracking-wider bg-yellow-500/15 text-yellow-500/80 px-1.5 py-0.5 rounded-full leading-none">
            <?= __('booth_soon_tag') ?: 'Soon' ?>
        </span>
      </button>
 
     <?php endif; ?>
 



      </div>
            <button id="menuToggle" class="lg:hidden text-2xl text-white">☰</button>
        </div>
    </div>
</header>

<div id="mobileMenu" class="fixed top-0 right-0 w-full h-full bg-black z-[999] translate-x-full transition-transform duration-300 overflow-y-auto">
    <div class="p-5 pt-3 min-h-full flex flex-col">

        <!-- Header — logo + close button -->
        <div class="flex items-center justify-between pb-2 mb-2 border-b border-white/10 ">
            <?php if ($isMirzaamiyatPage): ?>
                <img src="/mirzaam/assets/images/logo/mirzaamiyat.png" class="w-[80px]">
            <?php else: ?>
                <img src="/mirzaam/assets/images/logo/WHITE LOGO.png" class="w-[80px]">
            <?php endif; ?>

            <!-- F: proper tap target — circular hit area instead
                 of a bare glyph -->
            <button id="closeMenu"
                    aria-label="Close menu"
                    class=" h-10 flex items-center justify-center rounded-full
                           text-white/80 hover:text-white hover:bg-white/10
                           transition-colors duration-200 text-xl">
                ✕
            </button>
        </div>

        <!-- Menu sections -->
        <div class="space-y-1 flex-grow">
            <?php foreach($MENU as $mi => $menu): ?>
                <div class="mobile-menu-item border-b border-white/10 pb-1 opacity-0 translate-y-2"
                     style="transition-delay: <?= $mi * 60 ?>ms;">

                    <!-- A: chevron replaces "+", rotates via .is-open
                         class toggled in the updated script below -->
                    <button class="mobile-toggle w-full flex justify-between items-center text-white py-3.5 group">
                        <span class="font-medium tracking-wide group-active:text-[var(--secondary,#F4B223)] transition-colors duration-150">
                            <?= __($menu['title']); ?>
                        </span>
                        <svg class="w-4 h-4 text-white/50 transition-transform duration-300 mobile-chevron"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div class="mobile-dropdown max-h-0 overflow-hidden transition-all duration-300 pl-3">
                        <?php foreach($menu['items'] as $item): ?>
                            <?php
                                $isExternal = !empty($item['external']);
                                $href       = $isExternal ? $item['link'] : get_url($item['link']);
                                $target     = $isExternal ? ' target="_blank" rel="noopener noreferrer"' : '';
                            ?>
                            <!-- D: hover/active feedback, gold accent
                                 on tap instead of flat gray always -->
                            <a href="<?= htmlspecialchars($href) ?>"<?= $target ?>
                               class="block py-2.5 text-white/50 hover:text-white active:text-[#C9A267] transition-colors duration-150">
                                <?= __($item['label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- B: bottom actions — lang switch + logo side by side,
             booth button full-width below as the primary action -->
        <div class="pt-6 mt-auto border-t border-white/10 space-y-3">
<!-- Dynamic grid layout class based on the page type -->
<div class="grid gap-3 <?= $isMirzaamiyatPage ? 'grid-cols-2' : 'grid-cols-1 w-full' ?>">
    
    <!-- Language Switch Button -->
    <a href="<?= get_switch_url() ?>"
       class="h-12 flex items-center justify-center border border-white/20 hover:border-white/40 rounded-lg text-lg text-white bg-white/10  transition-colors duration-200">
        <?= ($lang === 'en' ? 'عربي' : 'EN') ?>
    </a>

    <?php if ($isMirzaamiyatPage): ?>
        <!-- Back to Main Mirzaam Button -->
        <!-- Note: bg-white removed so the gold tint bg-[#C9A267]/10 functions correctly -->
        <a href="<?= get_url('/') ?>"
           class="h-12 bg-white flex items-center justify-center border border-[#C9A267]/30 hover:border-[#C9A267]/60 rounded-lg bg-[#C9A267]/10 transition-colors duration-200">
            <img src="/mirzaam/assets/images/footer/mirzaam.png"
                 alt="Mirzaam"
                 class="h-10 w-auto">
        </a>
    <?php endif; ?>

</div>

            <!-- C: booth button now matches desktop's enable/
                 disable logic instead of always showing generic
                 book_booth on Mirzaamiyat pages -->
            <?php if ($isMirzaamiyatPage): ?>

                <?php if (!empty($mz_booth_url)): ?>
                    <a href="<?= htmlspecialchars($mz_booth_url) ?>"
                        rel="noopener noreferrer"
                       class="w-full h-11 flex items-center justify-center
                              bg-[#C9A267] hover:bg-[#d9b67c]
                              text-[#1E2F4D] font-semibold text-sm
                              rounded-lg transition-colors duration-200">
                        <?= __('mz_hero_cta_booth') ?: 'Book Your Booth' ?>
                    </a>
                <?php else: ?>
                    <button type="button"
                            disabled
                            aria-disabled="true"
                            title="<?= htmlspecialchars(__('mz_booth_coming_soon') ?: 'Registration opening soon') ?>"
                            class="w-full h-11 flex items-center justify-center gap-2
                                   bg-[#C9A267]/20 text-[#C9A267]/70
                                   font-semibold text-sm rounded-lg
                                   border border-[#C9A267]/20
                                   cursor-not-allowed select-none">
                        <?= __('mz_hero_cta_booth') ?: 'Book Your Booth' ?>
                        <span class="text-[8px] font-mono uppercase tracking-wider bg-[#1E2F4D]/50 text-[#C9A267]/80 px-1.5 py-0.5 rounded-full leading-none">
                            <?= __('mz_booth_soon_tag') ?: 'Soon' ?>
                        </span>
                    </button>
                <?php endif; ?>

            <?php else: ?>
                <?php if (!empty($main_booth_url)): ?>
 
    <!-- ENABLED — same white/black look you already have -->
    <a href="<?= htmlspecialchars($main_booth_url) ?>"
       target="_blank" rel="noopener noreferrer"
       class="h-12 w-full inline-flex items-center justify-center
              bg-white/10 hover:bg-white/20
              text-white/90 text-sm font-medium
              border border-white/25
              px-5 rounded-lg
              transition-colors duration-200">
        <?= __('book_booth') ?>
    </a>
 
<?php else: ?>
 
    <!-- DISABLED — on a black bg, a low-opacity WHITE fill reads
         as "muted/inactive" without disappearing into the
         background the way a dark gray would. Border makes the
         button's shape clearly readable even at low opacity. -->
    <button type="button"
            disabled
            aria-disabled="true"
            title="<?= htmlspecialchars(__('booth_coming_soon') ?: 'Registration opening soon') ?>"
            class="h-12 inline-flex items-center justify-center gap-2
                   bg-orange-100/10 w-full
                   text-white/50 text-sm font-medium
                   px-4 rounded-lg
                   border border-white/15
                   cursor-not-allowed select-none">
        <?= __('book_booth') ?>
        <span class="text-[8px] font-mono uppercase tracking-wider bg-yellow-500/15 text-yellow-500/80 px-1.5 py-0.5 rounded-full leading-none">
            <?= __('booth_soon_tag') ?: 'Soon' ?>
        </span>
    </button>
 
<?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<script>
(function () {
    const menu = document.getElementById("mobileMenu");

    document.getElementById("menuToggle")?.addEventListener("click", () => {
        menu.style.transform = "translateX(0)";
        // E: stagger the menu items in after the panel slides in
        document.querySelectorAll(".mobile-menu-item").forEach(el => {
            requestAnimationFrame(() => {
                el.classList.remove("opacity-0", "translate-y-2");
                el.classList.add("transition-all", "duration-300");
            });
        });
    });

    document.getElementById("closeMenu")?.addEventListener("click", () => {
        menu.style.transform = "translateX(100%)";
        // Reset stagger state so it replays next time the menu opens
        document.querySelectorAll(".mobile-menu-item").forEach(el => {
            el.classList.add("opacity-0", "translate-y-2");
        });
    });

    document.querySelectorAll(".mobile-toggle").forEach(btn => {
        btn.addEventListener("click", () => {
            const dd = btn.nextElementSibling;
            const chevron = btn.querySelector(".mobile-chevron");
            const isOpen = !!dd.style.maxHeight;

            dd.style.maxHeight = isOpen ? null : dd.scrollHeight + "px";
            // A: rotate the chevron to reflect open/closed state
            chevron.classList.toggle("rotate-180", !isOpen);
        });
    });
})();
</script>