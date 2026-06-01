<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mirzaam Expo 2026</title>
    <script src="https://unpkg.com/@studio-freight/lenis@1.0.34/dist/lenis.min.js"></script>
    <link rel="icon" href="assets/images/favicon.ico">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/header.css">

</head>

<body class="bg-black text-white">

    <!-- HEADER -->
   <?php require_once 'includes/header.php'; ?>

 <section class="relative h-screen overflow-hidden">

    <!-- GIF -->
    <!-- <img
        src="assets/media/hero.gif"
        class="absolute inset-0 w-full h-full object-cover"
        alt="hero"> -->

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- CONTENT -->
    <div class="relative z-10 h-full flex items-center justify-center text-white">
        <h1 class="text-5xl">MIRZAAM EXPO 2026</h1>
    </div>

</section>

<section id="about" class="relative w-full py-12 bg-[var(--background)] text-[var(--text-light)] overflow-hidden" dir="ltr">
    
    <div class="section-glow absolute top-0 left-1/4 w-[40rem] h-[40rem] bg-[var(--primary)] rounded-full blur-[150px] opacity-20 pointer-events-none"></div>

    <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-20 relative z-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 mb-16 md:mb-24">
            
            <div class="lg:col-span-5 reveal-up">
                <h2 class="text-4xl md:text-5xl lg:text-[3.5rem] font-medium leading-[1.1] font-alexandria text-white tracking-tight">
                    One Platform. <br />
                    Infinite Design <br class="hidden md:block" />
                    Possibilities.
                </h2>
            </div>
            
            <div class="lg:col-span-7 flex items-end reveal-up delay-100">
                <p class="text-base md:text-lg text-[#D1D5DB] leading-[1.8] font-light font-alexandria">
                    Launched in 2019, Mirzaam has completely redefined the exhibition landscape, growing into the GCC's ultimate multi-category destination for spaces and living solutions. Spanning over 25,000 square meters at the Kuwait International Fairgrounds, the expo bridges the gap between raw construction and luxury finishings. We bring together a curated collective of over 300 premium brands, connecting visionary creators with over 400,000 discerning homeowners, architects, and real estate developers under one roof.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            
            <div class="group relative overflow-hidden aspect-[16/11] reveal-up delay-200 bg-[var(--background-alt)]">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-700 ease-out"></div>
                <img src="./assets/images/Home/stage.png" class="w-full"/>
            </div>
            
            <div class="group relative overflow-hidden aspect-[16/11] reveal-up delay-300 bg-[var(--background-alt)]">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-700 ease-out"></div>
            </div>
            
            <div class="group relative overflow-hidden aspect-[16/11] reveal-up delay-400 bg-[var(--background-alt)]">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-700 ease-out"></div>
            </div>

        </div>
    </div>
</section>

<section id="app-connect" class="relative  w-full py-12 bg-black text-[var(--text-light)] overflow-hidden" dir="ltr">
    
    <div class="section-glow absolute bottom-0 right-1/4 w-[35rem] h-[35rem] bg-[var(--primary)] rounded-full blur-[130px] opacity-15 pointer-events-none"></div>

    <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            
            <div class="lg:col-span-6 relative flex items-center justify-center max-h-[500px] md:max-h-[650px] reveal-up">
                
                <div class="relative z-20 w-[260px] md:w-[320px] transition-transform duration-700 hover:scale-[1.02]">
                    <img src="./assets/images/Home/mirzaam-map.png" alt="Mirzaam App Floor Plan" class="w-full h-auto drop-shadow-[0_25px_50px_rgba(0,0,0,0.8)]" />
                </div>

                <div class="absolute z-30 bottom-24 -left-4 md:-left-16 w-[240px] md:w-[290px] p-0.5 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-[0_20px_40px_rgba(0,0,0,0.5)] transition-all duration-500 hover:-translate-y-2 reveal-up delay-200">
                    <img src="./assets/images/Home/mirzai-chat.png" alt="Mirzai AI Chatbot Interface" class="w-full h-auto rounded-2xl" />
                </div>

                <div class="absolute z-10 top-12 right-0 md:-right-6 hidden sm:block opacity-60 pointer-events-none reveal-up delay-300">
                    <div class="flex flex-col items-start gap-2 font-alexandria text-xs text-gray-400 max-w-[150px]">
                        <span>Find vendors and their paths</span>
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" class="text-gray-500 mt-1 transform -scale-x-100 rotate-45">
                            <path d="M1 1C1 20 15 34 34 34M34 34H20M34 34V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-6 flex flex-col justify-center">
                
                <span class="font-alexandria text-xs md:text-sm tracking-[0.3em] uppercase text-[var(--secondary)] mb-6 block font-medium reveal-up">
                    Mirzai Chatbot AI of Mirzaam
                </span>

                <h2 class="text-4xl md:text-5xl lg:text-[3.5rem] font-medium leading-[1.1] font-alexandria text-white tracking-tight mb-8 reveal-up delay-100">
                    UNLOCK THE EXPO. <br />
                    <span class="text-white/40 font-light">COMPLETE LAYERS.</span> <br />
                    AI POWERED CONNECT.
                </h2>

                <p class="text-base md:text-lg text-[#9CA3AF] leading-[1.8] font-light font-alexandria max-w-xl mb-12 reveal-up delay-200">
                    Conversational AI Screen in more conversations of optimized, personalized networking recommendation. Navigate floor plans seamlessly, pinpoint luxury vendors globally, and discover optimal exhibition paths instantaneously.
                </p>

                <div class="flex flex-wrap gap-4 items-center reveal-up delay-300">
                    
                    <a href="#" class="inline-block transition-transform duration-300 hover:-translate-y-1 active:translate-y-0" aria-label="Download on the App Store">
                        <img src="./assets/images/Home/app-store.png" alt="Download on the App Store" class="h-12 w-auto border border-white/80 rounded-xl bg-black" />
                    </a>

                    <a href="#" class="inline-block transition-transform duration-300 hover:-translate-y-1 active:translate-y-0" aria-label="Get it on Google Play">
                        <img src="./assets/images/Home/google-play.png" alt="Get it on Google Play" class="h-12 w-auto border border-white/80 rounded-xl bg-black" />
                    </a>

                </div>

            </div>

        </div>
    </div>
</section>

<section id="insights-reviews" class="relative w-full py-12 bg-black text-[var(--text-light)] overflow-hidden" dir="ltr">
    
    <div class="section-glow absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[60rem] h-[35rem] bg-[var(--primary)] rounded-full blur-[180px] opacity-10 pointer-events-none"></div>

    <div class="w-full px-6 md:px-12 lg:px-16 mx-auto relative z-10 flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12 md:mb-16">
        <div class="reveal-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium font-alexandria text-white tracking-tight leading-tight">
                Hear From Our <br />
                <span class="text-white/50 font-light">Sponsors & Vendors</span>
            </h2>
            <p class="mt-4 text-white/40 text-sm md:text-base font-light max-w-xl leading-relaxed">
                Discover firsthand perspectives and dynamic success statements directly from the visionary architectural minds driving this year's exhibition platform forward.
            </p>
        </div>

        <div id="insights-nav-controls" class="hidden md:flex items-center gap-3 opacity-0 pointer-events-none transition-all duration-500 ease-out translate-x-4">
            <button id="insights-prev-btn" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 text-white flex items-center justify-center backdrop-blur-md hover:bg-white/15 hover:border-white/20 active:scale-95 transition-all duration-300 shadow-xl" aria-label="Scroll left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            </button>
            <button id="insights-next-btn" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 text-white flex items-center justify-center backdrop-blur-md hover:bg-white/15 hover:border-white/20 active:scale-95 transition-all duration-300 shadow-xl" aria-label="Scroll right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
            </button>
        </div>
    </div>

    <div class="w-full px-6 md:px-12 lg:px-16 mx-auto relative z-10">
        <div id="insights-scroll-track" class="flex overflow-x-auto gap-6 pb-8 snap-x snap-mandatory responsive-scroll-behavior" style="-webkit-overflow-scrolling: touch;">
            
            <div class="min-w-[28rem]  md:min-w-[28rem] md:max-h-[18rem] aspect-[4/5] snap-start group relative rounded-2xl overflow-hidden bg-[var(--background-alt)] border border-white/5 reveal-up">
                <div class="video-trigger-wrapper w-full h-full cursor-pointer relative overflow-hidden" data-video-id="0INmtmL3f5Y">
                    <div class="absolute top-4 left-4 z-20 px-3 py-1.5 rounded-lg bg-black/40 backdrop-blur-md border border-white/10">
                        <img src="./assets/images/brands/kpc-logo.png" alt="KPC" class="h-6 w-auto object-contain brightness-0 invert" />
                    </div>
                    <img src="https://img.youtube.com/vi/0INmtmL3f5Y/maxresdefault.jpg" alt="Leader Insight" class="thumbnail-target w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-out scale-100 group-hover:scale-105" loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 flex items-center justify-center z-20">
                        <div class="w-16 h-16 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-2xl transition-all duration-300 transform group-hover:scale-110 group-hover:bg-[var(--secondary)] group-hover:text-white group-hover:border group-hover:border-white   group-hover:border-[var(--secondary)]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-0.5"><path d="M8 5.14v14c0 .86.94 1.39 1.66.9l10-7c.61-.43.61-1.37 0-1.8l-10-7C8.94 3.75 8 4.28 8 5.14z"/></svg>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 z-20 text-right" dir="rtl">
                        <h3 class="font-alexandria text-lg md:text-xl font-medium text-white tracking-wide leading-snug drop-shadow-md">صناعة كويتية</h3>
                    </div>
                </div>
            </div>

            <div class="min-w-[28rem]  md:min-w-[28rem] md:max-h-[18rem] aspect-[4/5] snap-start group relative rounded-2xl overflow-hidden bg-[var(--background-alt)] border border-white/5 reveal-up delay-100">
                <div class="video-trigger-wrapper w-full h-full cursor-pointer relative overflow-hidden" data-video-id="rMOBbUKAGF0">
                    <div class="absolute top-4 left-4 z-20 px-3 py-1.5 rounded-lg bg-black/40 backdrop-blur-md border border-white/10">
                        <div class="text-white text-xs font-bold tracking-widest uppercase py-0.5 opacity-80">IKEA</div>
                    </div>
                    <img src="https://img.youtube.com/vi/rMOBbUKAGF0/maxresdefault.jpg" alt="Leader Insight" class="thumbnail-target w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-out scale-100 group-hover:scale-105" loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 flex items-center justify-center z-20">
                        <div class="w-16 h-16 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-2xl transition-all duration-300 transform group-hover:scale-110 group-hover:bg-[var(--secondary)] group-hover:text-white group-hover:border group-hover:border-white  group-hover:border-[var(--secondary)]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-0.5"><path d="M8 5.14v14c0 .86.94 1.39 1.66.9l10-7c.61-.43.61-1.37 0-1.8l-10-7C8.94 3.75 8 4.28 8 5.14z"/></svg>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 z-20 text-right" dir="rtl">
                        <h3 class="font-alexandria text-lg md:text-xl font-medium text-white tracking-wide leading-snug drop-shadow-md">و عالم أفضل و جودة منذ 75 سنة</h3>
                    </div>
                </div>
            </div>

            <div class="min-w-[28rem]  md:min-w-[28rem] md:max-h-[18rem] aspect-[4/5] snap-start group relative rounded-2xl overflow-hidden bg-[var(--background-alt)] border border-white/5 reveal-up delay-200">
                <div class="video-trigger-wrapper w-full h-full cursor-pointer relative overflow-hidden" data-video-id="ggPM2jzM4Ak">
                    <div class="absolute top-4 left-4 z-20 px-3 py-1.5 rounded-lg bg-black/40 backdrop-blur-md border border-white/10">
                        <div class="text-white text-xs font-bold tracking-widest uppercase py-0.5 opacity-80">TECHNOGYM</div>
                    </div>
                    <img src="https://img.youtube.com/vi/ggPM2jzM4Ak/maxresdefault.jpg" alt="Leader Insight" class="thumbnail-target w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-out scale-100 group-hover:scale-105" loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 flex items-center justify-center z-20">
                        <div class="w-16 h-16 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-2xl transition-all duration-300 transform group-hover:scale-110 group-hover:bg-[var(--secondary)] group-hover:text-white group-hover:border group-hover:border-white  group-hover:border-[var(--secondary)]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-0.5"><path d="M8 5.14v14c0 .86.94 1.39 1.66.9l10-7c.61-.43.61-1.37 0-1.8l-10-7C8.94 3.75 8 4.28 8 5.14z"/></svg>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 z-20 text-right" dir="rtl">
                        <h3 class="font-alexandria text-lg md:text-xl font-medium text-white tracking-wide leading-snug drop-shadow-md">في الأولمبياد من 20 سنة</h3>
                    </div>
                </div>
            </div>

            <div class="min-w-[28rem]  md:min-w-[28rem] md:max-h-[18rem] aspect-[4/5] snap-start group relative rounded-2xl overflow-hidden bg-[var(--background-alt)] border border-white/5 reveal-up delay-300">
                <div class="video-trigger-wrapper w-full h-full cursor-pointer relative overflow-hidden" data-video-id="GDlo7MSwslA">
                    <div class="absolute top-4 left-4 z-20 px-3 py-1.5 rounded-lg bg-black/40 backdrop-blur-md border border-white/10">
                        <div class="text-white text-xs font-bold tracking-widest uppercase py-0.5 opacity-80">TECHNOGYM</div>
                    </div>
                    <img src="https://img.youtube.com/vi/GDlo7MSwslA/maxresdefault.jpg" alt="Leader Insight" class="thumbnail-target w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-out scale-100 group-hover:scale-105" loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 flex items-center justify-center z-20">
                        <div class="w-16 h-16 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-2xl transition-all duration-300 transform group-hover:scale-110 group-hover:bg-[var(--secondary)] group-hover:text-white group-hover:border group-hover:border-white  group-hover:border-[var(--secondary)]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-0.5"><path d="M8 5.14v14c0 .86.94 1.39 1.66.9l10-7c.61-.43.61-1.37 0-1.8l-10-7C8.94 3.75 8 4.28 8 5.14z"/></svg>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 z-20 text-right" dir="rtl">
                        <h3 class="font-alexandria text-lg md:text-xl font-medium text-white tracking-wide leading-snug drop-shadow-md">في الأولمبياد من 20 سنة</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- INSIGHTS & SPONSORS PORTFOLIO SECTION -->
<?php
// Centrally managed Sponsors Data Array (Clean Minimal Edition)
$sponsors = [
    [
        "brand_name"  => "Al Wazzan",
        "tier_tag"    => "Platinum Sponsor",
        "logo_url"    => "./assets/images/brands/alwazzan-logo.png", // References your sponsors.png file
        "website_url" => "https://www.alwazzan.com"
    ],
    [
        "brand_name"  => "Boubyan",
        "tier_tag"    => "Banking Sponsor",
        "logo_url"    => "./assets/images/brands/boubyan-logo.png", // References your sponsors.png file
        "website_url" => "https://www.bankboubyan.com"
    ],
    [
        "brand_name"  => "IKEA",
        "tier_tag"    => "Platinum Sponsor",
        "logo_url"    => "./assets/images/brands/ikea-logo.png", // References your sponsors.png file
        "website_url" => "https://www.ikea.com"
    ],
    [
        "brand_name"  => "Deema",
        "tier_tag"    => "Strategic Sponsor",
        "logo_url"    => "./assets/images/brands/deema-logo.png", // References your sponsors.png file
        "website_url" => "https://www.deema.com"
    ],
    [
        "brand_name"  => "Technogym",
        "tier_tag"    => "Platinum Sponsor",
        "logo_url"    => "./assets/images/brands/technogym-logo.png", // References your sponsors.png file
        "website_url" => "https://www.technogym.com"
    ],
    [
        "brand_name"  => "Al Rai",
        "tier_tag"    => "Media Sponsor",
        "logo_url"    => "./assets/images/brands/alrai-logo.png", // References your sponsors.png file
        "website_url" => "https://www.alrai.com"
    ]
];
?>
<!-- PREMIUM WHITE CARD SPONSORS SECTOR -->
<section id="sponsors-portfolio" class="relative w-full py-24 bg-gradient-to-b from-black via-zinc-950 to-black text-white overflow-hidden" dir="ltr">
    
    <!-- Glassmorphic Premium Ambient Backlighting Layer (Section Glow) -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[75rem] h-[35rem] bg-[var(--primary)] rounded-full blur-[180px] opacity-15 pointer-events-none"></div>

    <!-- Section Header Setup with Frosted Glass Accents -->
    <div class="w-full px-6 md:px-12 lg:px-16 mx-auto relative z-10 flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12 md:mb-14">
        <div class="reveal-up">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-medium tracking-tight text-white font-sans">
                Strategic Alliances <br />
                <span class="text-white/40 font-light">Our Event Sponsors & Partners</span>
            </h2>
        </div>

        <!-- Glassmorphism Reusable Navigation Array -->
        <div id="sponsors-nav-controls" class="hidden md:flex items-center gap-2 opacity-0 pointer-events-none transition-all duration-500 ease-out translate-x-4">
            <button id="sponsors-prev-btn" class="w-11 h-11 rounded-xl bg-white/5 border border-white/10 text-white/70 flex items-center justify-center backdrop-blur-md hover:bg-white/15 hover:text-white active:scale-95 transition-all duration-300 shadow-xl" aria-label="Scroll left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            </button>
            <button id="sponsors-next-btn" class="w-11 h-11 rounded-xl bg-white/5 border border-white/10 text-white/70 flex items-center justify-center backdrop-blur-md hover:bg-white/15 hover:text-white active:scale-95 transition-all duration-300 shadow-xl" aria-label="Scroll right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
            </button>
        </div>
    </div>

    <!-- Horizontal Scrolling Track Container -->
    <div class="w-full px-6 md:px-12 lg:px-16 mx-auto relative z-10">
        <div id="sponsors-scroll-track" class="flex overflow-x-auto gap-5 pb-6 snap-x snap-mandatory responsive-scroll-behavior" style="-webkit-overflow-scrolling: touch;">
            
            <?php foreach ($sponsors as $index => $sponsor): ?>
            <!-- Sleek Compact White Premium Card (Stationary Grid Design) -->
            <div class="min-w-[190px] sm:min-w-[220px] md:min-w-[240px] aspect-[1.35/1] snap-start group relative rounded-xl bg-white border border-slate-100 shadow-2xl hover:shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] transition-shadow duration-500 ease-out p-4 flex flex-col justify-between overflow-hidden">
                
                <!-- Upper Tier Label Structure Layout -->
                <div class="w-full flex items-center justify-between">
                    <!-- Glassmorphism Tier Pill Token Contrast Badge -->
                    <span class="text-[10px] font-semibold tracking-wider uppercase text-slate-500 bg-slate-100/80 px-2.5 py-1 rounded border border-slate-200/60 backdrop-blur-sm">
                        <?php echo htmlspecialchars($sponsor['tier_tag']); ?>
                    </span>
                    
                    <!-- Web External Trigger Arrow Link Layout -->
                    <a href="<?php echo htmlspecialchars($sponsor['website_url']); ?>" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-black opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-1 group-hover:translate-x-0" aria-label="Link to website">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" /></svg>
                    </a>
                </div>

                <!-- Centralized Large Content Area Block -->
                <div class="flex-1 flex items-center justify-center p-1.5">
                    <a href="<?php echo htmlspecialchars($sponsor['website_url']); ?>" target="_blank" rel="noopener noreferrer" class="block w-full text-center overflow-hidden">
                        <!-- Upgraded to scale from 100% to 112% cleanly inside container boundaries -->
                        <img src="<?php echo htmlspecialchars($sponsor['logo_url']); ?>" 
                             alt="<?php echo htmlspecialchars($sponsor['brand_name']); ?> Logo" 
                             class="sponsor-logo-render max-h-20 max-w-[180px] mx-auto object-contain transition-transform duration-500 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-112" 
                             loading="lazy" />
                    </a>
                </div>

                <!-- Structural padding balance anchor base -->
                <div class="w-full h-0.5"></div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<section id="expo-metrics-blueprint" class="relative w-full py-28 md:py-36 bg-[#070913] overflow-hidden" dir="ltr">
    
    <div class="absolute inset-0 blueprint-grid-matrix pointer-events-none opacity-20"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[85rem] h-[45rem] bg-indigo-950/20 rounded-full blur-[180px] pointer-events-none"></div>

    <div class="w-full px-6 md:px-12 lg:px-16 mx-auto relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-12 gap-y-16 items-start">
            
            <div class="blueprint-metric-card flex items-start justify-center gap-6 group" data-target-value="40000">
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full max-w-[180px] aspect-[1.4/1] mb-6 relative flex items-center justify-center">
                        <svg viewBox="0 0 160 110" class="w-full h-full stroke-current text-white/20 group-hover:text-[var(--secondary)] transition-colors duration-500 fill-none stroke-[0.7] stroke-linecap-round stroke-linejoin-round">
                            <path d="M 5 95 L 5 90 M 155 95 L 155 90 M 5 20 L 10 20 M 155 20 L 150 20" class="opacity-30" />
                            <line x1="5" y1="95" x2="155" y2="95" class="blueprint-axis-line" />
                            
                            <path d="M 20 95 A 60 60 0 0 1 140 95" class="blueprint-draw-trace" />
                            <path d="M 35 95 A 45 45 0 0 1 125 95" class="blueprint-draw-trace delay-100" />
                            <path d="M 50 95 A 30 30 0 0 1 110 95" class="blueprint-draw-trace delay-200" />
                            
                            <path d="M 20 95 Q 80 25 125 95" class="blueprint-draw-trace delay-300" />
                            <path d="M 140 95 Q 80 25 35 95" class="blueprint-draw-trace delay-300" />
                            <path d="M 20 95 Q 50 45 110 95" class="blueprint-draw-trace delay-400" />
                            <path d="M 140 95 Q 110 45 50 95" class="blueprint-draw-trace delay-400" />
                            
                            <line x1="80" y1="15" x2="80" y2="95" class="blueprint-axis-line opacity-40" />
                        </svg>
                    </div>
                    <div class="reveal-up text-center w-full">
                        <span class="metric-odometer block text-4xl md:text-5xl font-sans font-medium text-white tracking-tight mb-2">0</span>
                        <span class="block text-xs font-semibold tracking-widest uppercase text-white/40 font-sans">Attendies</span>
                    </div>
                </div>
                <div class="vertical-arabic-label text-slate-500 font-alexandria text-xs font-light select-none group-hover:text-white/60 transition-colors duration-300 self-end mb-4" dir="rtl">الحضور</div>
            </div>

            <div class="blueprint-metric-card flex items-start justify-center gap-6 group" data-target-value="207">
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full max-w-[180px] aspect-[1.4/1] mb-6 relative flex items-center justify-center">
                        <svg viewBox="0 0 160 110" class="w-full h-full stroke-current text-white/20 group-hover:text-[var(--secondary)] transition-colors duration-500 fill-none stroke-[0.7] stroke-linecap-round stroke-linejoin-round">
                            <line x1="5" y1="95" x2="155" y2="95" class="blueprint-axis-line" />
                            
                            <path d="M 25 95 L 25 45 L 135 45 L 135 95 M 45 95 L 45 45 M 115 95 L 115 45" class="blueprint-draw-trace" />
                            <path d="M 25 32 L 135 32 L 135 45 L 25 45 Z" class="blueprint-draw-trace delay-100" />
                            
                            <path d="M 25 45 L 35 32 L 45 45 L 55 32 L 65 45 L 75 32 L 85 45 L 95 32 L 105 45 L 115 32 L 125 45 L 135 32" class="blueprint-draw-trace delay-200" />
                            <path d="M 25 32 L 35 45 M 45 32 L 55 45 M 105 32 L 115 45 M 125 32 L 135 45" class="blueprint-draw-trace delay-300" />
                            <path d="M 25 95 L 45 45 M 135 95 L 115 45" class="blueprint-draw-trace delay-400" />
                        </svg>
                    </div>
                    <div class="reveal-up text-center w-full">
                        <span class="metric-odometer block text-4xl md:text-5xl font-sans font-medium text-white tracking-tight mb-2">0</span>
                        <span class="block text-xs font-semibold tracking-widest uppercase text-white/40 font-sans">Exhibitors</span>
                    </div>
                </div>
                <div class="vertical-arabic-label text-slate-500 font-alexandria text-xs font-light select-none group-hover:text-white/60 transition-colors duration-300 self-end mb-4" dir="rtl">العارضون</div>
            </div>

            <div class="blueprint-metric-card flex items-start justify-center gap-6 group" data-target-value="337">
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full max-w-[180px] aspect-[1.4/1] mb-6 relative flex items-center justify-center">
                        <svg viewBox="0 0 160 110" class="w-full h-full stroke-current text-white/20 group-hover:text-[var(--secondary)] transition-colors duration-500 fill-none stroke-[0.7] stroke-linecap-round stroke-linejoin-round">
                            <line x1="5" y1="95" x2="155" y2="95" class="blueprint-axis-line" />
                            
                            <path d="M 15 92 L 20 90 L 140 90 L 145 92" class="blueprint-draw-trace" />
                            <path d="M 20 48 L 80 20 L 140 48 Z" class="blueprint-draw-trace delay-100" />
                            <path d="M 35 48 L 80 28 L 125 48 Z" class="blueprint-draw-trace delay-200" />
                            
                            <path d="M 25 90 L 25 48 M 135 90 L 135 48 M 55 90 L 55 42 M 105 90 L 105 42 M 80 90 L 80 20" class="blueprint-draw-trace delay-300" />
                            <path d="M 25 58 L 55 54 L 105 54 L 135 58" class="blueprint-draw-trace delay-400" />
                        </svg>
                    </div>
                    <div class="reveal-up text-center w-full">
                        <span class="metric-odometer block text-4xl md:text-5xl font-sans font-medium text-white tracking-tight mb-2">0</span>
                        <span class="block text-xs font-semibold tracking-widest uppercase text-white/40 font-sans">Booths</span>
                    </div>
                </div>
                <div class="vertical-arabic-label text-slate-500 font-alexandria text-xs font-light select-none group-hover:text-white/60 transition-colors duration-300 self-end mb-4" dir="rtl">جناح</div>
            </div>

            <div class="blueprint-metric-card flex items-start justify-center gap-6 group" data-target-value="5">
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full max-w-[180px] aspect-[1.4/1] mb-6 relative flex items-center justify-center">
                        <svg viewBox="0 0 160 110" class="w-full h-full stroke-current text-white/20 group-hover:text-[var(--secondary)] transition-colors duration-500 fill-none stroke-[0.7] stroke-linecap-round stroke-linejoin-round">
                            <line x1="5" y1="55" x2="155" y2="55" class="blueprint-axis-line" />
                            
                            <path d="M 25 15 L 25 95 M 65 15 L 65 95 M 105 15 L 105 95 M 135 15 L 135 95" class="blueprint-draw-trace opacity-10" />
                            
                            <path d="M 25 55 L 45 55 L 45 35 L 65 35 L 65 55 L 85 55 L 85 75 L 105 75 L 105 55 M 105 30 L 135 30 L 135 55" class="blueprint-draw-trace delay-100" />
                            
                            <rect x="22" y="12" width="6" height="6" class="blueprint-draw-trace delay-200 fill-none" />
                            <rect x="62" y="92" width="6" height="6" class="blueprint-draw-trace delay-200 fill-none" />
                            <rect x="132" y="12" width="6" height="6" class="blueprint-draw-trace delay-300 fill-none" />
                            
                            <path d="M 20 15 L 30 15 M 25 10 L 25 20 M 130 15 L 140 15" class="opacity-40" />
                        </svg>
                    </div>
                    <div class="reveal-up text-center w-full">
                        <span class="metric-odometer block text-4xl md:text-5xl font-sans font-medium text-white tracking-tight mb-2">0</span>
                        <span class="block text-xs font-semibold tracking-widest uppercase text-white/40 font-sans">Days</span>
                    </div>
                </div>
                <div class="vertical-arabic-label text-slate-500 font-alexandria text-xs font-light select-none group-hover:text-white/60 transition-colors duration-300 self-end mb-4" dir="rtl">أيام</div>
            </div>

        </div>
    </div>
</section>

<div id="video-modal-lightbox" class="fixed inset-0 z-[9999] flex items-center justify-center invisible opacity-0 transition-all duration-500 ease-out bg-black/40 backdrop-blur-xl">
    <div class="absolute inset-0 container-close-overlay cursor-pointer"></div>
    
    <div class="relative w-full max-w-6xl aspect-video mx-4 bg-white/[0.03] backdrop-blur-2xl border border-white/15 rounded-3xl overflow-hidden scale-95 opacity-0 transform transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] modal-window-frame shadow-[0_25px_60px_-15px_rgba(0,0,0,0.9)]">
        <button class="absolute top-5 right-5 z-50 w-11 h-11 rounded-xl bg-black/40 border border-white/10 text-white flex items-center justify-center backdrop-blur-md hover:bg-white hover:text-black hover:scale-105 transition-all duration-300 modal-close-btn shadow-lg" aria-label="Close video player">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <div class="w-full h-full" id="modal-iframe-injection-target"></div>
    </div>
</div>

    <!-- CONTENT -->
    <main class="pt-[140px]">

    </main>

    <script type="module" src="assets/js/main.js"></script>

</body>
</html>