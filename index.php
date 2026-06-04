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
    <!-- Perfectly balanced geometric arc and symmetrical arrowhead lengths -->
    <path d="M4 4C4 21.12 17.88 35 35 35M35 35H19M35 35V19" 
          stroke="currentColor" 
          stroke-width="2" 
          stroke-linecap="round" 
          stroke-linejoin="round"/>
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
            

<div class="min-w-[20rem] max-h-[14rem] md:min-w-[28rem] md:max-h-[18rem] aspect-[4/5] snap-start group relative rounded-2xl overflow-hidden bg-[var(--background-alt)] border border-white/5 reveal-up">
    <div class="video-trigger-wrapper w-full h-full cursor-pointer relative overflow-hidden" data-video-id="0INmtmL3f5Y">
        
        <div class="absolute top-4 left-4 z-20   rounded-[10%] bg-black/50 backdrop-blur-md border border-white/10 flex items-center justify-center transition-all duration-300 ">
            <img src="./assets/images/brands/ikea-logo.png" alt="Ikea" class="h-9  w-auto object-contain brightness-10 grayscale  transition-all duration-300 group-hover:brightness-100 group-hover:grayscale-0" />
        </div>
        
        <img src="https://img.youtube.com/vi/0INmtmL3f5Y/maxresdefault.jpg" alt="Leader Insight" class="thumbnail-target w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-out scale-100 group-hover:scale-105" loading="lazy" />
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
        <div class="absolute inset-0 flex items-center justify-center z-20">
            <div class="w-16 h-16 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-2xl transition-all duration-300 transform group-hover:scale-110 group-hover:bg-[var(--secondary)] group-hover:text-white group-hover:border group-hover:border-[var(--secondary)]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-0.5"><path d="M8 5.14v14c0 .86.94 1.39 1.66.9l10-7c.61-.43.61-1.37 0-1.8l-10-7C8.94 3.75 8 4.28 8 5.14z"/></svg>
            </div>
        </div>
        <div class="absolute bottom-6 left-6 right-6 z-20 text-right" dir="rtl">
            <h3 class="font-alexandria text-lg md:text-xl font-medium text-white tracking-wide leading-snug drop-shadow-md">صناعة كويتية</h3>
        </div>
    </div>
</div>

<div class="min-w-[20rem] max-h-[14rem] md:min-w-[28rem] md:max-h-[18rem] aspect-[4/5] snap-start group relative rounded-2xl overflow-hidden bg-[var(--background-alt)] border border-white/5 reveal-up">
    <div class="video-trigger-wrapper w-full h-full cursor-pointer relative overflow-hidden" data-video-id="0INmtmL3f5Y">
        
  <div class="absolute top-4 left-4 z-20   rounded-[10%] bg-black/50 backdrop-blur-md border border-white/10 flex items-center justify-center transition-all duration-300 ">
            <img src="./assets/images/brands/ikea-logo.png" alt="Ikea" class="h-9  w-auto object-contain brightness-10 grayscale  transition-all duration-300 group-hover:brightness-100 group-hover:grayscale-0" />
        </div>
        
        <img src="https://img.youtube.com/vi/rMOBbUKAGF0/maxresdefault.jpg" alt="Leader Insight" class="thumbnail-target w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-out scale-100 group-hover:scale-105" loading="lazy" />
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
        <div class="absolute inset-0 flex items-center justify-center z-20">
            <div class="w-16 h-16 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-2xl transition-all duration-300 transform group-hover:scale-110 group-hover:bg-[var(--secondary)] group-hover:text-white group-hover:border group-hover:border-[var(--secondary)]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-0.5"><path d="M8 5.14v14c0 .86.94 1.39 1.66.9l10-7c.61-.43.61-1.37 0-1.8l-10-7C8.94 3.75 8 4.28 8 5.14z"/></svg>
            </div>
        </div>
        <div class="absolute bottom-6 left-6 right-6 z-20 text-right" dir="rtl">
            <h3 class="font-alexandria text-lg md:text-xl font-medium text-white tracking-wide leading-snug drop-shadow-md">و عالم أفضل و جودة منذ 75 سنة</h3>
        </div>
    </div>
</div>

<div class="min-w-[20rem] max-h-[14rem] md:min-w-[28rem] md:max-h-[18rem] aspect-[4/5] snap-start group relative rounded-2xl overflow-hidden bg-[var(--background-alt)] border border-white/5 reveal-up">
    <div class="video-trigger-wrapper w-full h-full cursor-pointer relative overflow-hidden" data-video-id="0INmtmL3f5Y">
        
        <div class="absolute top-4 left-4 z-20   rounded-[10%] bg-black/50 backdrop-blur-md border border-white/10 flex items-center justify-center transition-all duration-300 ">
            <img src="./assets/images/brands/technogym-logo.png" alt="Technogym" class="h-9  w-auto object-contain brightness-10 grayscale  transition-all duration-300 group-hover:brightness-100 group-hover:grayscale-0" />
        </div>
        
        <img src="https://img.youtube.com/vi/ggPM2jzM4Ak/maxresdefault.jpg" alt="Leader Insight" class="thumbnail-target w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-out scale-100 group-hover:scale-105" loading="lazy" />
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
        <div class="absolute inset-0 flex items-center justify-center z-20">
            <div class="w-16 h-16 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-2xl transition-all duration-300 transform group-hover:scale-110 group-hover:bg-[var(--secondary)] group-hover:text-white group-hover:border group-hover:border-[var(--secondary)]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-0.5"><path d="M8 5.14v14c0 .86.94 1.39 1.66.9l10-7c.61-.43.61-1.37 0-1.8l-10-7C8.94 3.75 8 4.28 8 5.14z"/></svg>
            </div>
        </div>
        <div class="absolute bottom-6 left-6 right-6 z-20 text-right" dir="rtl">
            <h3 class="font-alexandria text-lg md:text-xl font-medium text-white tracking-wide leading-snug drop-shadow-md">في الأولمبياد من 20 سنة</h3>
        </div>
    </div>
</div>

<div class="min-w-[20rem] max-h-[14rem] md:min-w-[28rem] md:max-h-[18rem] aspect-[4/5] snap-start group relative rounded-2xl overflow-hidden bg-[var(--background-alt)] border border-white/5 reveal-up">
    <div class="video-trigger-wrapper w-full h-full cursor-pointer relative overflow-hidden" data-video-id="0INmtmL3f5Y">
        
         <div class="absolute top-4 left-4 z-20   rounded-[10%] bg-black/50 backdrop-blur-md border border-white/10 flex items-center justify-center transition-all duration-300 ">
            <img src="./assets/images/brands/technogym-logo.png" alt="Technogym" class="h-9  w-auto object-contain brightness-10 grayscale  transition-all duration-300 group-hover:brightness-100 group-hover:grayscale-0" />
        </div>
        
        <img src="https://img.youtube.com/vi/GDlo7MSwslA/maxresdefault.jpg" alt="Leader Insight" class="thumbnail-target w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-out scale-100 group-hover:scale-105" loading="lazy" />
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
        <div class="absolute inset-0 flex items-center justify-center z-20">
            <div class="w-16 h-16 rounded-full bg-white/15 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-2xl transition-all duration-300 transform group-hover:scale-110 group-hover:bg-[var(--secondary)] group-hover:text-white group-hover:border group-hover:border-[var(--secondary)]">
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
<section id="sponsors-portfolio" class="relative w-full py-12 bg-gradient-to-b from-black via-zinc-950 to-black text-white overflow-hidden" dir="ltr">
    
    <!-- Glassmorphic Premium Ambient Backlighting Layer (Section Glow) -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[75rem] h-[35rem] bg-[var(--primary)] rounded-full blur-[180px] opacity-15 pointer-events-none"></div>

    <!-- Section Header Setup with Frosted Glass Accents -->
    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10 flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-8 md:mb-14">
        <div class="reveal-up">
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-medium tracking-tight text-white font-sans">
                Strategic Alliances <br />
                <span class="text-white/40 font-light text-lg md:text-2xl block mt-1">Our Event Sponsors & Partners</span>
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
    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10">
        <!-- Responsive Fix: Added subtle webkit-scrollbar hiding straight into the element styles if no global CSS overrides are active -->
        <div id="sponsors-scroll-track" class="flex overflow-x-auto gap-3 sm:gap-5 pb-6 snap-x snap-mandatory responsive-scroll-behavior" style="-webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">
            
            <?php foreach ($sponsors as $index => $sponsor): ?>
            <!-- Sleek Compact White Premium Card (Highly Responsive Sizing) -->
            <div class="min-w-[155px] sm:min-w-[200px] md:min-w-[240px] aspect-[1.25/1] sm:aspect-[1.35/1] snap-start group relative rounded-xl bg-white border border-slate-100 shadow-2xl hover:shadow-[0_25px_50px_-12px_rgba(0,0,0,0.4)] transition-all duration-500 ease-out p-3 sm:p-4 flex flex-col justify-between overflow-hidden hover:-translate-y-0.5">
                
                <!-- Upper Tier Label Structure Layout -->
                <div class="w-full flex items-center justify-center relative pt-0.5 pb-2 sm:pb-3">
                    <!-- Dynamic Text & Padding Sizing for Mobile Viewports -->
                    <span class="text-[9px] sm:text-[10px] font-bold tracking-wider sm:tracking-widest uppercase text-slate-500 bg-slate-100/80 px-2 sm:px-3 py-0.5 sm:py-1 rounded-full border border-slate-200/40 backdrop-blur-sm text-center truncate max-w-[85%]">
                        <?php echo htmlspecialchars($sponsor['tier_tag']); ?>
                    </span>
                    
                    <!-- Desktop-Only/Hover Link Target (Hidden on small screens to prevent accidental fat-finger clicks near the pill) -->
                    <a href="<?php echo htmlspecialchars($sponsor['website_url']); ?>" target="_blank" rel="noopener noreferrer" class="hidden sm:inline-block absolute right-0 text-slate-400 hover:text-black opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-1 group-hover:translate-x-0 p-1" aria-label="Link to website">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" /></svg>
                    </a>
                </div>

                <!-- Small Soft Gray HR Divider Line -->
                <div class="w-full border-t border-slate-100/80"></div>

                <!-- Centralized Large Content Area Block -->
                <div class="flex-1 flex items-center justify-center p-1.5 sm:p-3">
                    <!-- Mobile Tap-friendly anchor target wrap -->
                    <a href="<?php echo htmlspecialchars($sponsor['website_url']); ?>" target="_blank" rel="noopener noreferrer" class="block w-full text-center overflow-hidden">
                        <img src="<?php echo htmlspecialchars($sponsor['logo_url']); ?>" 
                             alt="<?php echo htmlspecialchars($sponsor['brand_name']); ?> Logo" 
                             class="max-h-11 sm:max-h-16 max-w-[90%] sm:max-w-[85%] mx-auto object-contain transition-transform duration-500 ease-[cubic-bezier(0.215,0.610,0.355,1)] group-hover:scale-106" 
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

<section id="expo-metrics-blueprint" class="relative w-full py-12 bg-black overflow-hidden" dir="ltr">
    
    <!-- Background Global Layer -->
    <div class="absolute inset-0 pointer-events-none opacity-[0.15]" style="background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 0); background-size: 20px 20px;"></div>

    <div class="w-full px-6 md:px-12 lg:px-16 mx-auto relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-6 sm:gap-x-12 gap-y-12 items-start">
            
            <!-- Metric Card 1: Attendees -->
            <div class="blueprint-metric-card flex items-start justify-center gap-4 sm:gap-6 group relative p-5 sm:p-6 rounded-2xl border border-white/[0.04] bg-white/[0.02] lg:bg-transparent lg:border-transparent transition-all duration-500 lg:hover:bg-white/[0.01]" data-target-value="40000">
                <!-- Card Specific Micro-Glow Layer (Desktop only) -->
                <div class="absolute inset-0 bg-indigo-500/0 lg:group-hover:bg-indigo-500/[0.03] rounded-2xl blur-xl transition-all duration-500 pointer-events-none"></div>
                
                <div class="flex flex-col items-center flex-1 relative z-10">
                    <div class="w-full max-w-[180px] aspect-[1.4/1] mb-6 relative flex items-center justify-center">
                        <svg viewBox="0 0 160 110" class="w-full h-full stroke-current text-white/40 lg:text-white/20 lg:group-hover:text-[var(--secondary)] transition-colors duration-500 fill-none stroke-[1.5] stroke-linecap-round stroke-linejoin-round">
                            <path d="M 5 95 L 5 90 M 155 95 L 155 90 M 5 20 L 10 20 M 155 20 L 150 20" class="opacity-50" />
                            <line x1="5" y1="95" x2="155" y2="95" class="blueprint-axis-line stroke-[2]" />
                            
                            <path d="M 20 95 A 60 60 0 0 1 140 95" class="blueprint-draw-trace" />
                            <path d="M 35 95 A 45 45 0 0 1 125 95" class="blueprint-draw-trace" />
                            <path d="M 50 95 A 30 30 0 0 1 110 95" class="blueprint-draw-trace" />
                            
                            <path d="M 20 95 Q 80 25 125 95" class="blueprint-draw-trace" />
                            <path d="M 140 95 Q 80 25 35 95" class="blueprint-draw-trace" />
                            <path d="M 20 95 Q 50 45 110 95" class="blueprint-draw-trace" />
                            <path d="M 140 95 Q 110 45 50 95" class="blueprint-draw-trace" />
                            
                            <line x1="80" y1="15" x2="80" y2="95" class="blueprint-axis-line opacity-50 stroke-[1]" />
                        </svg>
                    </div>
                    <div class="reveal-up text-center w-full">
                        <span class="metric-odometer block text-3xl sm:text-4xl md:text-5xl font-sans font-medium text-white tracking-tight mb-2">0</span>
                        <span class="block text-[10px] sm:text-xs font-semibold tracking-widest uppercase text-white/50 lg:text-white/40 font-sans">Attendees</span>
                    </div>
                </div>
                <div class="vertical-arabic-label text-gray-300  font-alexandria text-[10px] sm:text-xs font-light select-none lg:group-hover:text-white/60 transition-colors duration-300 self-end mb-2 sm:mb-4 relative z-10" dir="rtl">الحضور</div>
            </div>

            <!-- Metric Card 2: Exhibitors -->
            <div class="blueprint-metric-card flex items-start justify-center gap-4 sm:gap-6 group relative p-5 sm:p-6 rounded-2xl border border-white/[0.04] bg-white/[0.02] lg:bg-transparent lg:border-transparent transition-all duration-500 lg:hover:bg-white/[0.01]" data-target-value="207">
                <!-- Card Specific Micro-Glow Layer (Desktop only) -->
                <div class="absolute inset-0 bg-indigo-500/0 lg:group-hover:bg-indigo-500/[0.03] rounded-2xl blur-xl transition-all duration-500 pointer-events-none"></div>
                
                <div class="flex flex-col items-center flex-1 relative z-10">
                    <div class="w-full max-w-[180px] aspect-[1.4/1] mb-6 relative flex items-center justify-center">
                        <svg viewBox="0 0 160 110" class="w-full h-full stroke-current text-white/40 lg:text-white/20 lg:group-hover:text-[var(--secondary)] transition-colors duration-500 fill-none stroke-[1.5] stroke-linecap-round stroke-linejoin-round">
                            <line x1="5" y1="95" x2="155" y2="95" class="blueprint-axis-line stroke-[2]" />
                            
                            <path d="M 25 95 L 25 45 L 135 45 L 135 95 M 45 95 L 45 45 M 115 95 L 115 45" class="blueprint-draw-trace" />
                            <path d="M 25 32 L 135 32 L 135 45 L 25 45 Z" class="blueprint-draw-trace" />
                            
                            <path d="M 25 45 L 35 32 L 45 45 L 55 32 L 65 45 L 75 32 L 85 45 L 95 32 L 105 45 L 115 32 L 125 45 L 135 32" class="blueprint-draw-trace" />
                            <path d="M 25 32 L 35 45 M 45 32 L 55 45 M 105 32 L 115 45 M 125 32 L 135 45" class="blueprint-draw-trace" />
                            <path d="M 25 95 L 45 45 M 135 95 L 115 45" class="blueprint-draw-trace" />
                        </svg>
                    </div>
                    <div class="reveal-up text-center w-full">
                        <span class="metric-odometer block text-3xl sm:text-4xl md:text-5xl font-sans font-medium text-white tracking-tight mb-2">0</span>
                        <span class="block text-[10px] sm:text-xs font-semibold tracking-widest uppercase text-white/50 lg:text-white/40 font-sans">Exhibitors</span>
                    </div>
                </div>
                <div class="vertical-arabic-label text-gray-300 font-alexandria text-[10px] sm:text-xs font-light select-none lg:group-hover:text-white/60 transition-colors duration-300 self-end mb-2 sm:mb-4 relative z-10" dir="rtl">العارضون</div>
            </div>

            <!-- Metric Card 3: Booths -->
            <div class="blueprint-metric-card flex items-start justify-center gap-4 sm:gap-6 group relative p-5 sm:p-6 rounded-2xl border border-white/[0.04] bg-white/[0.02] lg:bg-transparent lg:border-transparent transition-all duration-500 lg:hover:bg-white/[0.01]" data-target-value="337">
                <!-- Card Specific Micro-Glow Layer (Desktop only) -->
                <div class="absolute inset-0 bg-indigo-500/0 lg:group-hover:bg-indigo-500/[0.03] rounded-2xl blur-xl transition-all duration-500 pointer-events-none"></div>
                
                <div class="flex flex-col items-center flex-1 relative z-10">
                    <div class="w-full max-w-[180px] aspect-[1.4/1] mb-6 relative flex items-center justify-center">
                        <svg viewBox="0 0 160 110" class="w-full h-full stroke-current text-white/40 lg:text-white/20 lg:group-hover:text-[var(--secondary)] transition-colors duration-500 fill-none stroke-[1.5] stroke-linecap-round stroke-linejoin-round">
                            <line x1="5" y1="95" x2="155" y2="95" class="blueprint-axis-line stroke-[2]" />
                            
                            <path d="M 15 92 L 20 90 L 140 90 L 145 92" class="blueprint-draw-trace" />
                            <path d="M 20 48 L 80 20 L 140 48 Z" class="blueprint-draw-trace" />
                            <path d="M 35 48 L 80 28 L 125 48 Z" class="blueprint-draw-trace" />
                            
                            <path d="M 25 90 L 25 48 M 135 90 L 135 48 M 55 90 L 55 42 M 105 90 L 105 42 M 80 90 L 80 20" class="blueprint-draw-trace" />
                            <path d="M 25 58 L 55 54 L 105 54 L 135 58" class="blueprint-draw-trace" />
                        </svg>
                    </div>
                    <div class="reveal-up text-center w-full">
                        <span class="metric-odometer block text-3xl sm:text-4xl md:text-5xl font-sans font-medium text-white tracking-tight mb-2">0</span>
                        <span class="block text-[10px] sm:text-xs font-semibold tracking-widest uppercase text-white/50 lg:text-white/40 font-sans">Booths</span>
                    </div>
                </div>
                <div class="vertical-arabic-label text-gray-300 font-alexandria text-[10px] sm:text-xs font-light select-none lg:group-hover:text-white/60 transition-colors duration-300 self-end mb-2 sm:mb-4 relative z-10" dir="rtl">جناح</div>
            </div>

            <!-- Metric Card 4: Days -->
            <div class="blueprint-metric-card flex items-start justify-center gap-4 sm:gap-6 group relative p-5 sm:p-6 rounded-2xl border border-white/[0.04] bg-white/[0.02] lg:bg-transparent lg:border-transparent transition-all duration-500 lg:hover:bg-white/[0.01]" data-target-value="5">
                <!-- Card Specific Micro-Glow Layer (Desktop only) -->
                <div class="absolute inset-0 bg-indigo-500/0 lg:group-hover:bg-indigo-500/[0.03] rounded-2xl blur-xl transition-all duration-500 pointer-events-none"></div>
                
                <div class="flex flex-col items-center flex-1 relative z-10">
                    <div class="w-full max-w-[180px] aspect-[1.4/1] mb-6 relative flex items-center justify-center">
                        <svg viewBox="0 0 160 110" class="w-full h-full stroke-current text-white/40 lg:text-white/20 lg:group-hover:text-[var(--secondary)] transition-colors duration-500 fill-none stroke-[1.5] stroke-linecap-round stroke-linejoin-round">
                            <line x1="5" y1="55" x2="155" y2="55" class="blueprint-axis-line stroke-[2]" />
                            
                            <path d="M 25 15 L 25 95 M 65 15 L 65 95 M 105 15 L 105 95 M 135 15 L 135 95" class="blueprint-draw-trace opacity-20" />
                            
                            <path d="M 25 55 L 45 55 L 45 35 L 65 35 L 65 55 L 85 55 L 85 75 L 105 75 L 105 55 M 105 30 L 135 30 L 135 55" class="blueprint-draw-trace" />
                            
                            <rect x="22" y="12" width="6" height="6" class="blueprint-draw-trace fill-none" />
                            <rect x="62" y="92" width="6" height="6" class="blueprint-draw-trace fill-none" />
                            <rect x="132" y="12" width="6" height="6" class="blueprint-draw-trace fill-none" />
                            
                            <path d="M 20 15 L 30 15 M 25 10 L 25 20 M 130 15 L 140 15" class="opacity-50" />
                        </svg>
                    </div>
                    <div class="reveal-up text-center w-full">
                        <span class="metric-odometer block text-3xl sm:text-4xl md:text-5xl font-sans font-medium text-white tracking-tight mb-2">0</span>
                        <span class="block text-[10px] sm:text-xs font-semibold tracking-widest uppercase text-white/50 lg:text-white/40 font-sans">Days</span>
                    </div>
                </div>
                <div class="vertical-arabic-label text-gray-300 font-alexandria text-[10px] sm:text-xs font-light select-none lg:group-hover:text-white/60 transition-colors duration-300 self-end mb-2 sm:mb-4 relative z-10" dir="rtl">أيام</div>
            </div>

        </div>
    </div>
</section>

<div id="fair-moments-slider" class="editorial-slider-container relative w-full min-h-screen bg-black overflow-hidden flex flex-col justify-between py-6 md:py-12" dir="ltr">
    
    <div class="absolute inset-0 z-20 pointer-events-none bg-gradient-to-t from-black/60 via-transparent to-black/30"></div>
    <div class="absolute inset-0 z-20 pointer-events-none bg-white/[0.01]"></div>

    <div class="slider-panels-track absolute inset-0 w-full h-full z-10">
        
        <div class="editorial-slide absolute inset-0 w-full h-full flex flex-col justify-center items-center py-12">
            <img src="./assets/images/Home/Previous-2025-1.png" alt="Previous Fair Moment 1" class="absolute inset-0 w-full h-full object-cover transform" />
            <div class="w-full max-w-4xl mx-auto px-6 text-center relative z-30 selection:bg-white selection:text-black">
                <div class="flex flex-col items-center justify-center space-y-2 md:space-y-4">
                    <h3 class="text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif italic font-light tracking-wide leading-none capitalize drop-shadow-md">Moments</h3>
                    <h2 class="text-white text-[10px] sm:text-xs md:text-sm lg:text-base font-sans font-medium tracking-[0.2em] sm:tracking-[0.35em] uppercase drop-shadow-md">From Previous Fairs</h2>
                    <p class="text-white/90 text-base sm:text-lg md:text-2xl font-serif italic font-light tracking-wider pt-0.5 drop-shadow-sm">2025</p>
                </div>
            </div>
        </div>

        <div class="editorial-slide absolute inset-0 w-full h-full flex flex-col justify-end items-center pb-20 md:pb-28 py-12">
            <img src="./assets/images/Home/Previous-2025-2.png" alt="Previous Fair Moment 2" class="absolute inset-0 w-full h-full object-cover transform" />
            <div class="w-full max-w-4xl mx-auto px-6 text-center relative z-30 selection:bg-white selection:text-black">
                <div class="flex flex-col items-center justify-center space-y-1.5 md:space-y-2.5">
                    <h3 class="text-white text-2xl sm:text-3xl md:text-4xl font-serif italic font-light tracking-wide leading-none capitalize drop-shadow-md">Contemporary Space</h3>
                    <h2 class="text-white/80 text-[9px] sm:text-[10px] md:text-sm font-sans font-medium tracking-[0.15em] sm:tracking-[0.2em] uppercase drop-shadow-md">Exhibition Architecture Overview</h2>
                </div>
            </div>
        </div>

        <div class="editorial-slide absolute inset-0 w-full h-full flex flex-col justify-end items-center pb-20 md:pb-28 py-12">
            <img src="./assets/images/Home/Previous-2025-3.png" alt="Previous Fair Moment 3" class="absolute inset-0 w-full h-full object-cover transform" />
            <div class="w-full max-w-4xl mx-auto px-6 text-center relative z-30 selection:bg-white selection:text-black">
                <div class="flex flex-col items-center justify-center space-y-1.5 md:space-y-2.5">
                    <h3 class="text-white text-2xl sm:text-3xl md:text-4xl font-serif italic font-light tracking-wide leading-none capitalize drop-shadow-md">Curated Highlights</h3>
                    <h2 class="text-white/80 text-[9px] sm:text-[10px] md:text-sm font-sans font-medium tracking-[0.15em] sm:tracking-[0.2em] uppercase drop-shadow-md">Fine Art Collections Displayed</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="w-full relative z-30 opacity-0 pointer-events-none select-none"></div>

    <div class="w-full max-w-7xl mx-auto px-6 md:px-12 relative z-30 flex items-center justify-center mt-auto mb-2 md:mb-4">
        <div class="slider-nav-indicators flex items-center gap-2.5 md:gap-3">
            <button class="editorial-pill-indicator" aria-label="View Exhibit Panel 1"></button>
            <button class="editorial-pill-indicator" aria-label="View Exhibit Panel 2"></button>
            <button class="editorial-pill-indicator" aria-label="View Exhibit Panel 3"></button>
        </div>
    </div>

</div>
<?php
$categories = [
    ["title" => "Carpentry &<br/>Wardrobe Fitout", "img" => "https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Bathroom Fitouts",             "img" => "https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Carpets & Textiles",           "img" => "https://images.unsplash.com/photo-1513519245088-0e12902e5a38?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Cleaning Services",            "img" => "https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Contracting Company",          "img" => "https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Counter Tops & Stone",         "img" => "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Curtains & Drapes",            "img" => "https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Custom Furniture",             "img" => "https://images.unsplash.com/photo-1540518614846-7eded433c457?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Electrical Sockets",           "img" => "https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Home Appliances",              "img" => "https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Elevator Fitout",              "img" => "https://images.unsplash.com/photo-1563911302283-d2bc1dd0d44b?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Exterior Doors & Windows",     "img" => "https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Finances & Systems",           "img" => "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Food & Beverage",              "img" => "https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Home Accessories",             "img" => "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1200&q=90"],
    ["title" => "Home Automation Systems",      "img" => "https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1200&q=90"],
];
?>

<section id="categories-hybrid-section" class="relative w-full py-12 bg-black text-white overflow-hidden" dir="ltr">
    
    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10 flex items-end justify-between gap-6 mb-10">
        <div class="reveal-up">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-medium tracking-tight text-white uppercase font-alexandria leading-none">
                Strategic Categories <br />
                <span class="text-white/40 font-light text-xs md:text-sm tracking-[0.2em] block mt-3 uppercase">Explore Our Featured Event Sectors & Fitouts</span>
            </h2>
        </div>

        <div id="categories-nav-controls" class="hidden items-center gap-1 opacity-0 transition-all duration-300 ease-out">
            <button id="categories-prev-btn" class="w-12 h-12 bg-white/5 border border-white/10 text-white/70 flex items-center justify-center hover:bg-white/15 hover:text-white active:scale-95 transition-all duration-300" aria-label="Scroll left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            </button>
            <button id="categories-next-btn" class="w-12 h-12 bg-white/5 border border-white/10 text-white/70 flex items-center justify-center hover:bg-white/15 hover:text-white active:scale-95 transition-all duration-300" aria-label="Scroll right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
            </button>
        </div>
    </div>

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10">
        
        <div id="categories-scroll-track" class="flex flex-row flex-nowrap overflow-x-auto gap-2 md:gap-3 pb-6 transition-all duration-300 ease-in-out" style="-webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">
            
            <?php foreach ($categories as $index => $cat): ?>
                <?php $sectorNumber = str_pad($index + 1, 2, "0", STR_PAD_LEFT); ?>
                
                <div class="category-slider-card flex-shrink-0 w-[240px]   relative aspect-[0.75/1] group overflow-hidden border border-white/10 bg-zinc-900 transition-all duration-500 ease-out rounded-none">
                    <img src="<?php echo $cat['img']; ?>" alt="<?php echo strip_tags($cat['title']); ?>" class="absolute inset-0 w-full h-full object-cover transform scale-100 transition-transform duration-700 ease-out group-hover:scale-105" loading="lazy" />
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/20 to-transparent z-20"></div>
                    
                    <div class="absolute inset-x-0 bottom-0 p-4 sm:p-6 flex flex-col justify-end z-30 bg-gradient-to-t from-black/90 via-black/30 to-transparent">
                        <span class="text-[9px] font-medium tracking-[0.25em] text-white/40 uppercase mb-1.5">Sector // <?php echo $sectorNumber; ?></span>
                        <h3 class="text-white text-xs sm:text-sm md:text-base font-normal tracking-wide font-alexandria uppercase leading-tight">
                            <?php echo $cat['title']; ?>
                        </h3>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="flex justify-center ">
            <button id="toggle-categories-grid-btn" class="px-8 py-4 bg-transparent border border-white/20 text-white text-xs font-medium tracking-[0.2em] uppercase hover:bg-white hover:text-black hover:border-white active:scale-95 transition-all duration-300 rounded-none">
                View All Categories
            </button>
        </div>
    </div>
</section>



<?php
// Define the data for the Mirzaam years
$mirzaam_years = [
    ['year' => '2019', 'image' => './assets/images/Home/mirzaam2019.png'],
    ['year' => '2021', 'image' => './assets/images/Home/mirzaam2021.png'],
    ['year' => '2022', 'image' => './assets/images/Home/mirzaam2022.png'],
    ['year' => '2023', 'image' => './assets/images/Home/mirzaam2023.png'],
    ['year' => '2024', 'image' => './assets/images/Home/mirzaam2024.png'],
    ['year' => '2025', 'image' => './assets/images/Home/mirzaam2025.png'],
];
?>

<section class="w-full bg-black py-0">
    <div class="flex flex-col lg:flex-row w-full min-h-[600px]">
        
        <!-- Left Side: Text -->
        <div class="w-full lg:w-1/2 p-12 md:p-20 flex flex-col justify-center items-start relative bg-white">
            <div class="absolute inset-0 opacity-40" style="background-image: url('./assets/images/Home/MIRZAAMDARKPATTERN 4.png'); background-size: cover; background-position: center;"></div>
            
            <div class="relative z-10">
                <h2 class="text-black text-4xl md:text-7xl font-bold uppercase tracking-tighter leading-[0.9]">PREVIOUS</h2>
                <h2 class="text-black text-4xl md:text-7xl ml-12 md:ml-32 font-bold uppercase tracking-tighter leading-[0.9]">MIRZAAM</h2>
                <div class="w-60 h-1 bg-black mt-4 md:mt-8"></div>
            </div>
        </div>

        <!-- Right Side: PHP Iterated Grid -->
        <div class="w-full lg:w-1/2 grid grid-cols-2 grid-rows-3 gap-0 border-l border-white/10">
            <?php foreach ($mirzaam_years as $item): ?>
                <a href="#" class="relative overflow-hidden group border-b border-r border-white/10 last:border-r-0">
                    <img src="<?php echo $item['image']; ?>" alt="Mirzaam <?php echo $item['year']; ?>" 
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" />
                    
                    <!-- Styled Year Badge with Border Radius -->
                    <div class="absolute bottom-4 left-4 z-10">
                        <span class="text-white text-[10px] font-bold tracking-[0.2em] uppercase bg-black/50 backdrop-blur-md px-3 py-1.5 rounded-md border border-white/10 group-hover:opacity-0 transition-all duration-300">
                            <?php echo $item['year']; ?>
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Enhanced Editorial Review Section -->
<section class="w-full py-16 bg-black text-white border-y border-white/5">
    <div class="w-full px-4 md:px-16 mx-auto">
        
      <div class="mb-8">
            <h2 class="text-3xl md:text-4xl font-normal uppercase tracking-wide">
                <span class="block text-white/40 mb-2">Hear what our past</span>
                Attendees & Partners
            </h2>
        </div>

        <!-- Review Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 border-t border-l border-white/10">
            
            <!-- Review 1 -->
            <div class="p-8 border-r border-b border-white/10 hover:bg-white/[0.03] transition-colors duration-500 group">
                <div class="flex gap-6 items-start">
                    <div class="w-14 h-14 flex-shrink-0 grayscale group-hover:grayscale-0 transition-all duration-700 overflow-hidden border border-white/10">
                        <img src="https://images.unsplash.com/photo-1594751128071-4a9202a462e8?auto=format&fit=crop&w=200&q=80" alt="Professional" class="w-full h-full object-cover" />
                    </div>
                    <div>
                        <p class="text-[15px] italic text-white/70 leading-relaxed mb-6 font-light">"The precision of the fitout and the seamless flow of the event made it the most productive exhibition I have attended in years."</p>
                        <h4 class="text-[11px] tracking-[0.25em] uppercase font-bold text-white/90">— Elena Richardson</h4>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="p-8 border-r border-b border-white/10 hover:bg-white/[0.03] transition-colors duration-500 group">
                <div class="flex gap-6 items-start">
                    <div class="w-14 h-14 flex-shrink-0 grayscale group-hover:grayscale-0 transition-all duration-700 overflow-hidden border border-white/10">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=200&q=80" alt="Professional" class="w-full h-full object-cover" />
                    </div>
                    <div>
                        <p class="text-[15px] italic text-white/70 leading-relaxed mb-6 font-light">"A masterclass in industry innovation. Mirzaam consistently sets the benchmark for design events in the region."</p>
                        <h4 class="text-[11px] tracking-[0.25em] uppercase font-bold text-white/90">— Marcus Thorne</h4>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="p-8 border-b border-white/10 hover:bg-white/[0.03] transition-colors duration-500 group">
                <div class="flex gap-6 items-start">
                    <div class="w-14 h-16 flex-shrink-0 grayscale group-hover:grayscale-0 transition-all duration-700 overflow-hidden border border-white/10">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=200&q=80" alt="Professional" class="w-full h-full object-cover" />
                    </div>
                    <div>
                        <p class="text-[15px] italic text-white/70 leading-relaxed mb-6 font-light">"Incredible atmosphere and perfectly curated exhibitors. We have already secured our spot for next year."</p>
                        <h4 class="text-[11px] tracking-[0.25em] uppercase font-bold text-white/90">— Sarah Jenkins</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="w-full bg-black py-20 border-t border-white/10">
    <div class="max-w-[1600px] mx-auto px-6 md:px-12">
        
        <div class="flex flex-wrap items-center justify-between gap-6 mb-12">
            <div class="flex items-center gap-4">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
                <h2 class="text-xl md:text-2xl font-bold uppercase tracking-tight text-white">
                    @MirzaamExpo
                </h2>
            </div>
            
            <a href="#" class="bg-[#0095f6] hover:bg-[#1877f2] text-white text-sm font-semibold px-6 py-2 rounded-lg transition-all duration-300">
                Follow
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-2">
            <?php 
            $feed = [
                'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1518780664697-55e3ad937233?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1518780664697-55e3ad937233?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80',

            ];
            
            foreach ($feed as $img): ?>
                <a href="#" class="relative aspect-[3/4] overflow-hidden rounded-md group">
                    <img src="<?php echo $img; ?>" alt="Mirzaam Post" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Final Refined Newsletter Section -->
<section class="w-full bg-black py-6 md:py-32 overflow-hidden border-t border-white/10 relative">
    
    <!-- Increased opacity to 0.08 for better visibility -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none">
        <h2 class="text-[25vw] md:text-[22vw] font-black uppercase tracking-tighter text-white/[0.08] leading-none whitespace-nowrap">
            MIRZAAM
        </h2>
    </div>
    
    <div class="px-6 md:px-20 relative z-10 max-w-[1600px] mx-auto">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-12 lg:gap-0">
            
            <!-- Text Content: Optimized for mobile/desktop hierarchy -->
            <div class="max-w-xl">
                <h3 class="text-white text-3xl md:text-5xl font-bold uppercase tracking-tight">Stay Updated.</h3>
                <p class="text-white/70 text-base md:text-lg mt-4 font-light leading-relaxed">
                    Join the archives for exclusive exhibition insights, curated design trends, and partner announcements delivered to your inbox.
                </p>
            </div>

            <!-- Interaction Area: Responsive Widths -->
            <div class="flex flex-col gap-4 w-full lg:w-96">
                <input type="email" placeholder="ENTER YOUR EMAIL" 
                       class="bg-transparent border-b border-white/40 py-4 text-white placeholder-white/50 outline-none focus:border-white transition-all duration-300 tracking-[0.2em] text-sm uppercase w-full">
                
                <button class="w-full bg-white text-black md:py-4 py-2 font-bold uppercase tracking-[0.3em] text-[11px] hover:bg-transparent hover:text-white border border-white transition-all duration-300">
                    Subscribe
                </button>
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

 
    <!-- HEADER -->
   <?php require_once 'includes/footer.php'; ?>

    </main>

    <script type="module" src="assets/js/main.js"></script>

</body>
</html>