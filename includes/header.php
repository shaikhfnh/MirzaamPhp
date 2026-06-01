<?php
require_once __DIR__ . '/menu.php';
?>

<header id="mainHeader"
class="fixed top-0 left-0 w-full bg-black border-b border-white/10 z-50">

    <div class="mx-auto px-5">

        <div class="flex items-center justify-between h-[80px]">

            <!-- LEFT -->
            <div class="flex">

                <img src="assets/images/logo/WHITE LOGO.png"
                     class="w-[80px] h-full grid self-center">

                <div class="ms-8 hidden sm:block my-2 w-1 bg-white"></div>

                <div class="ms-8">

                    <div class="hidden lg:block border-l border-white/10">
                        <p class="text-sm">
                            8 - 12 December 2026 I 10:00 : 10:00 > DAILY KIF HALL 5-6
                        </p>
                    </div>

                    <!-- DESKTOP MENU (UNCHANGED STRUCTURE) -->
                    <nav class="hidden lg:flex gap-8 h-[50px] items-end">

                        <div class="flex gap-8">

                            <?php foreach($MENU as $menu): ?>

                                <div class="nav-item group relative text-white text-sm">

                                    <button class="flex items-center gap-1 uppercase tracking-wide">

                                        <span><?= $menu['title']; ?></span>

                                        <svg
                                            class="w-4 h-4 text-white/70 transition-transform duration-300 group-hover:rotate-180"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>

                                    </button>

                                    <div class="dropdown rounded-lg p-3">

                                        <?php foreach($menu['items'] as $item): ?>

                                            <a href="<?= $item['link']; ?>"
                                               class="block py-2 hover:text-yellow-400">

                                                <?= $item['label']; ?>

                                            </a>

                                        <?php endforeach; ?>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </nav>

                </div>
            </div>

            <!-- RIGHT -->
            <div class="hidden lg:flex gap-4 items-center">

                <button id="langToggle" class="border rounded-lg px-3 py-1">
                    <span id="langText">عربي</span>
                </button>

                <button class="bg-white text-black px-5 rounded-lg h-[40px]">
                    Book Your Booth 2026
                </button>

            </div>

            <button id="menuToggle" class="lg:hidden text-2xl">☰</button>

        </div>

    </div>
</header>

<!-- MOBILE MENU (PHP GENERATED, SAME STRUCTURE IDEA) -->
<div id="mobileMenu"
class="fixed top-0 right-0 w-full h-full bg-black z-[999] translate-x-full transition-transform duration-300 overflow-y-auto">

    <div class="p-6">

        <!-- TOP -->
        <div class="flex items-center justify-between mb-3">

            <img src="assets/images/logo/WHITE LOGO.png"
                 class="w-[70px]">

            <button id="closeMenu" class="text-2xl text-white">
                ✕
            </button>

        </div>

        <!-- MOBILE NAV (NOW PHP) -->
        <div class="space-y-4">

            <?php foreach($MENU as $menu): ?>

                <div class="border-b border-white/10 pb-3">

                    <button class="mobile-toggle w-full flex justify-between items-center text-white py-3">

                        <span><?= $menu['title']; ?></span>

                        <span class="text-white/60">+</span>

                    </button>

                    <div class="mobile-dropdown max-h-0 overflow-hidden transition-all duration-300 pl-3">

                        <?php foreach($menu['items'] as $item): ?>

                            <a href="<?= $item['link']; ?>"
                               class="block py-2 text-gray-400">

                                <?= $item['label']; ?>

                            </a>

                        <?php endforeach; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <!-- MOBILE ACTIONS (UNCHANGED STYLE) -->
        <div class="lg:hidden pt-2 absolute bottom-2 w-[90%] border-t border-white/10">

            <div class="grid items-center gap-4">

                <button id="langToggleMobile"
                class="border border-white/20 rounded-lg px-4 py-2 text-sm">

                    <span id="langTextMobile">عربي</span>

                </button>

                <button
                class="bg-white text-black px-5 rounded-lg h-[44px] text-sm font-medium">

                    Book Your Booth 2026

                </button>

            </div>

        </div>

    </div>

</div>

<!-- ONLY MINIMAL JS (KEEP YOUR STYLE EXACT) -->
<script>
const menu = document.getElementById("mobileMenu");
const openBtn = document.getElementById("menuToggle");
const closeBtn = document.getElementById("closeMenu");

openBtn?.addEventListener("click", () => {
    menu.style.transform = "translateX(0)";
});

closeBtn?.addEventListener("click", () => {
    menu.style.transform = "translateX(100%)";
});

// mobile accordion (like your original behavior)
document.querySelectorAll(".mobile-toggle").forEach(btn => {
    btn.addEventListener("click", () => {

        const dd = btn.nextElementSibling;

        if (dd.style.maxHeight) {
            dd.style.maxHeight = null;
        } else {
            dd.style.maxHeight = dd.scrollHeight + "px";
        }

    });
});
</script>