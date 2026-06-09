<?php
// Ensure i18n.php is loaded in index.php before this file
require_once __DIR__ . '/../app/data/menu.php';
?>

<header id="mainHeader" class="fixed top-0 left-0 w-full bg-black border-b border-white/10 z-50">
    <div class="mx-auto px-5">
        <div class="flex items-center justify-between h-[80px]">
            <div class="flex">
                <a href="<?= get_url('/') ?>">
                    <img src="/mirzaam/assets/images/logo/WHITE LOGO.png" class="w-[80px] h-full grid self-center">
                </a>
                <div class="ms-8 hidden sm:block my-2 w-1 bg-white"></div>
                <div class="ms-8">
                    <div class="hidden lg:block border-l border-white/10 ">
                       <p class="text-sm">
    <span class="text-[var(--secondary)]"><?= __('header_date') ?></span> 
    &nbsp;<?= __('header_time') ?>&nbsp; 
    <?= __('header_location') ?>
</p>
                    </div>
                    <nav class="hidden lg:flex gap-8 h-[50px] items-end">
                        <div class="flex gap-8">
                            <?php foreach($MENU as $menu): ?>
                                <div class="nav-item group relative text-white text-sm">
                                    <button class="flex items-center gap-1 uppercase tracking-wide">
                                        <span><?= __($menu['title']); ?></span>
                                        <svg class="w-4 h-4 text-white/70 transition-transform duration-300 group-hover:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="dropdown absolute bg-black border border-white/10 rounded-lg p-3 hidden group-hover:block z-50">
                                        <?php foreach($menu['items'] as $item): ?>
                                            <a href="<?= get_url($item['link']); ?>" class="block py-2 hover:text-yellow-400">
                                                <?= __($item['label']); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="hidden lg:flex gap-4 items-center">
             <a href="<?= get_switch_url() ?>" class="border rounded-lg px-3 py-1">
                        <?= ($lang === 'en' ? 'عربي' : 'EN') ?>
                </a>
                <button class="bg-white text-black px-5 rounded-lg h-[40px]">
                    <?= __('book_booth') ?>
                </button>
            </div>
            <button id="menuToggle" class="lg:hidden text-2xl text-white">☰</button>
        </div>
    </div>
</header>

<div id="mobileMenu" class="fixed top-0 right-0 w-full h-full bg-black z-[999] translate-x-full transition-transform duration-300 overflow-y-auto">
    <div class="p-6 min-h-full flex flex-col">
        <div class="flex items-center justify-between mb-8">
            <img src="/mirzaam/assets/images/logo/WHITE LOGO.png" class="w-[70px]">
            <button id="closeMenu" class="text-2xl text-white">✕</button>
        </div>
        
        <div class="space-y-4 flex-grow">
            <?php foreach($MENU as $menu): ?>
                <div class="border-b border-white/10 pb-3">
                    <button class="mobile-toggle w-full flex justify-between items-center text-white py-3">
                        <span><?= __($menu['title']); ?></span>
                        <span class="text-white/60">+</span>
                    </button>
                    <div class="mobile-dropdown max-h-0 overflow-hidden transition-all duration-300 pl-3">
                        <?php foreach($menu['items'] as $item): ?>
                            <a href="<?= get_url($item['link']); ?>" class="block py-2 text-gray-400">
                                <?= __($item['label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pt-8 mt-auto border-t border-white/10">
            <div class="grid grid-cols-1 items-center gap-4">
                <a href="<?= get_switch_url() ?>" class="border border-white/20 rounded-lg px-4 py-3 text-sm text-center">
                    <?= ($lang === 'en' ? 'عربي' : 'EN') ?>
                </a>
                <button class="bg-white text-black px-5 rounded-lg h-[44px] text-sm font-medium">
                    <?= __('book_booth') ?>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    const menu = document.getElementById("mobileMenu");
    document.getElementById("menuToggle")?.addEventListener("click", () => menu.style.transform = "translateX(0)");
    document.getElementById("closeMenu")?.addEventListener("click", () => menu.style.transform = "translateX(100%)");
    document.querySelectorAll(".mobile-toggle").forEach(btn => {
        btn.addEventListener("click", () => {
            const dd = btn.nextElementSibling;
            dd.style.maxHeight = dd.style.maxHeight ? null : dd.scrollHeight + "px";
        });
    });
</script>