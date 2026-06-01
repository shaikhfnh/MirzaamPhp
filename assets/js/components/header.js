import { MENU } from "../modules/menudata.js";

export function initHeader() {

    const root = document.getElementById("header-root");

    if (!root) return;

    // ================= LOAD TEMPLATE =================
    fetch("header.html")
        .then(res => res.text())
        .then(html => {

            root.innerHTML = html;

            initLogic();
        });

    function initLogic() {

        const desktopMenu = document.getElementById("desktopMenu");
        const mobileMenuList = document.getElementById("mobileMenuList");

        const mobileMenu = document.getElementById("mobileMenu");
        const menuToggle = document.getElementById("menuToggle");
        const closeMenu = document.getElementById("closeMenu");

        const langToggle = document.getElementById("langToggle");
        const langText = document.getElementById("langText");

        // ================= DESKTOP MENU =================
desktopMenu.innerHTML = MENU.map(m => `
    <div class="nav-item group relative text-white text-sm">

        <button class="flex items-center gap-1 uppercase tracking-wide">

            <span>${m.title}</span>

            <svg
                class="w-4 h-4 text-white/70 transition-transform duration-300 group-hover:rotate-180"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7" />

            </svg>

        </button>

        <div class="dropdown rounded-lg p-3">
            ${m.items.map(i => `
                <a href="${i.link}"
                   class="block py-2 hover:text-yellow-400">
                    ${i.label}
                </a>
            `).join("")}
        </div>

    </div>
`).join("");

        // ================= MOBILE MENU =================
    mobileMenuList.innerHTML = MENU.map(m => `
    <div>

      <button class="mobile-toggle w-full flex items-center justify-between py-4 border-b border-white/10">

    <span>${m.title}</span>

    <svg
        class="mobile-icon w-4 h-4 transition-transform duration-300"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">

        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7" />

    </svg>

</button>

        <div class="mobile-dropdown">
            ${m.items.map(i => `
                <a href="${i.link}"
                   class="block py-2 text-gray-400">
                    ${i.label}
                </a>
            `).join("")}
        </div>

    </div>
`).join("");

        // ================= MOBILE TOGGLE =================
        menuToggle.addEventListener("click", () => {
            mobileMenu.classList.add("open");
        });

        closeMenu.addEventListener("click", () => {
            mobileMenu.classList.remove("open");
        });

        // ================= MOBILE ACCORDION =================
        document.querySelectorAll(".mobile-toggle").forEach(btn => {

            btn.addEventListener("click", () => {

                const dd = btn.nextElementSibling;

                dd.style.maxHeight =
                    dd.style.maxHeight ? null : dd.scrollHeight + "px";
            });

        });

        // ================= LANGUAGE =================
        let lang = new URLSearchParams(location.search).get("lang") || "en";

        function applyLang() {
            document.documentElement.dir = lang === "ar" ? "rtl" : "ltr";
            langText.innerText = lang === "ar" ? "EN" : "عربي";
        }

        applyLang();

        langToggle.addEventListener("click", () => {

            lang = lang === "ar" ? "en" : "ar";

            const url = new URL(location.href);

            if (lang === "ar") url.searchParams.set("lang", "ar");
            else url.searchParams.delete("lang");

            location.href = url.toString();
        });

    }
}