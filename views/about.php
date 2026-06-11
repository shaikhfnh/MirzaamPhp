<section class="relative w-full bg-[#0a0a0a] text-white overflow-hidden min-h-screen flex items-center border-b border-white/10">
    
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-[var(--primary)]/10 blur-[130px] rounded-full"></div>
    </div>

    <div class="relative z-10 w-full flex flex-col lg:flex-row items-stretch min-h-screen">
        
        <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 md:px-16 lg:pl-[8%] lg:pr-24 py-12 order-2 lg:order-1">
            
            <div class="animate-slide-up" style="animation-delay: 0.1s;">
                <div class="inline-flex items-center gap-5 mb-6">
                    <span class="w-16 h-[3px] bg-white shadow-[0_0_10px_var(--primary)]"></span>
                    <span class="text-base md:text-lg lg:text-xl tracking-[0.3em] uppercase text-white font-bold font-alexandria">
                        The Visionary
                    </span>
                </div>
                
                <h1 class="text-5xl md:text-[4rem] font-bold mb-10 font-alexandria leading-[1.1] text-white tracking-tight">
                    Farah Al <br class="hidden lg:block"/> Humaidhi
                </h1>
            </div>
            
            <div class="space-y-6 text-[#A1A1AA] text-lg md:text-xl leading-[1.8] font-light animate-slide-up" style="animation-delay: 0.3s;">
                <p>
                    <strong class="text-white font-semibold">Farah Al Humaidhi</strong>, the innovative mind behind Mirzaam expo, is the winner of the Forbes Kuwait Most Powerful Entrepreneurship Award for 2023. Since 2004, she has founded several companies and initiatives in the field of interior design, such as Interior Art, and later founded Farah Home in 2012 – her first brand.
                </p>
                <p>
                    She then launched <span class="text-white italic">“Courses by Farah”</span>, a section of training courses in interior design, which later developed into online courses, and finally Dawrat Academy, which achieved widespread success.
                </p>
                <p>
                    Specialists in interior design in the Middle East, led by Farah Al Humaidhi, aim to support and elevate the industry both regionally and globally. She reflects her commitment to transforming spaces into unique experiences, aligning with Mirzaam’s mission of providing aesthetic and practical ideas for the dream home.
                </p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 relative min-h-[60vh] lg:min-h-screen order-1 lg:order-2 group overflow-hidden bg-black flex items-center">
            
            <img 
                src="/mirzaam/assets/images/about/fnhbw.webp" 
                alt="Farah Al Humaidhi" 
                class="absolute inset-0 w-full h-full object-cover object-top grayscale-[50%] opacity-80 transition-all duration-[1.5s] ease-out group-hover:scale-105 group-hover:grayscale-0 group-hover:opacity-100"
            >
            
            <div class="absolute hidden md:block inset-0 bg-gradient-to-r from-[#0a0a0a] via-[#0a0a0a]/60 to-transparent opacity-100 lg:w-1/3"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent opacity-100 lg:hidden h-1/2 mt-auto"></div>

            <div class="absolute md:bottom-12 bottom-4 left-6  bg-[#111111]/90 backdrop-blur-2xl border border-white/10 p-5 md:p-6 rounded-[2rem] shadow-[0_30px_60px_rgba(0,0,0,0.9)] flex items-center gap-5 transition-all duration-700 ease-out group-hover:-translate-y-4 group-hover:border-[var(--secondary)]/50 z-20">
                
                <div class="md:w-14 w-10 h-10 md:h-14 rounded-full bg-[var(--secondary)] flex items-center justify-center text-black shrink-0 shadow-[0_0_25px_var(--secondary)] transition-transform duration-500 group-hover:scale-110">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                
                <div>
                    <div class="text-[10px] md:text-[11px] text-[var(--secondary)] uppercase tracking-[0.2em] font-bold mb-1">Forbes Kuwait</div>
                    <div class="text-[10px]  md:text-sm md:text-base font-medium font-alexandria text-white leading-tight">Most Powerful<br/>Entrepreneur 2023</div>
                </div>
            </div>
            
        </div>
    </div>

    <style>
        @keyframes slideUp {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up {
            animation: slideUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
    </style>
</section>

<?php
$exhibitions = [
    [
        'title' => 'Mirzaam Exhibition',
        'tag' => 'Flagship',
        'tag_class' => 'bg-[var(--secondary)] text-black',
        'accent_color' => '#E2B13C',
        'image' => '/mirzaam/assets/images/Home/stage.png',
        'desc' => 'The ultimate platform bridging all interior design disciplines under one roof. Unifying materials suppliers, furniture brands, design studios, and academics.',
        'meta' => 'MENA Expansion'
    ],
    [
        'title' => 'Mirzaamiyat',
        'tag' => 'Upcoming',
        'tag_class' => 'bg-red-400 text-black',
        'accent_color' => '#E76F51', 
        'image' => '/mirzaam/assets/images/Home/stage.png',
        'desc' => 'An exclusive showcase curated to bring modern, premium, and entirely unique home supplies directly to modern spaces and elite properties.',
        'meta' => 'Home Supplies'
    ],
    [
        'title' => 'IXIR Exhibition',
        'tag' => 'Wellness',
        'tag_class' => 'bg-emerald-400 text-black',
        'accent_color' => '#34d399',
        'image' => '/mirzaam/assets/images/Home/stage.png',
        'desc' => 'A dedicated platform specializing entirely in health, lifestyle wellness, and architectural innovations designed to increase human quality of life.',
        'meta' => 'Quality of Life'
    ],
    [
        'title' => 'MamaBaby Expo',
        'tag' => 'Kids & Family',
        'tag_class' => 'bg-blue-500 text-white',
        'accent_color' => '#00b2f8ff',
        'image' => '/mirzaam/assets/images/Home/stage.png',
        'desc' => 'A premium, highly anticipated lifestyle showcase focusing comprehensively on modern motherhood, baby essentials, and innovative kids interiors.',
        'meta' => 'Family & Spaces'
    ]
];
?>

<section class="relative w-full bg-[#050506] text-white py-20 lg:py-28 border-b border-white/[0.05] overflow-hidden">
    
    <div class="absolute inset-0 bg-[radial-gradient(#ffffff02_1px,transparent_1px)] [background-size:20px_20px] opacity-60 pointer-events-none"></div>
    <div class="absolute top-0 right-10 w-[500px] h-[500px] bg-[var(--primary)]/5 blur-[160px] rounded-full pointer-events-none transform -translate-y-1/3"></div>
    <div class="absolute bottom-[-5%] left-5 w-[400px] h-[400px] bg-[var(--secondary)]/5 blur-[130px] rounded-full pointer-events-none"></div>

    <div class="w-full relative z-10">
        
        <div class="w-full px-6 md:px-12 lg:px-16 xl:px-24 flex flex-col md:flex-row md:items-end justify-between gap-8 mb-6">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-4 mb-4">
                    <span class="w-10 h-[2px] bg-gradient-to-r from-[var(--secondary)] to-transparent"></span>
                    <span class="text-xs tracking-[0.35em] uppercase text-[var(--secondary)] font-bold font-alexandria">
                        Exhibitions Hub
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-alexandria text-white tracking-tight leading-[1.2] mb-4">
                    Upcoming Events & <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-white to-white/40">The Fouz Expos Legacy</span>
                </h2>
                <p class="text-neutral-400 text-sm md:text-base font-light leading-relaxed max-w-2xl">
                    Mirzaam Exhibition is proudly organized by <strong class="text-white font-medium font-alexandria text-xs">Fouz Expos Company</strong>. We bring structural specialties, premium furniture brands, and interior studios directly into unified display tracks.
                </p>
            </div>

            <div id="events-nav-controls" class="hidden gap-3 self-start md:self-end z-20">
                <button id="events-prev-btn" aria-label="Scroll Left" class="w-12 h-12 rounded-full border border-white/10 backdrop-blur-md flex items-center justify-center bg-neutral-950/40 text-neutral-400 hover:text-white hover:border-white/20 active:scale-95 transition-all duration-300 group">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-0.5 rtl:group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                </button>
                <button id="events-next-btn" aria-label="Scroll Right" class="w-12 h-12 rounded-full border border-white/10 backdrop-blur-md flex items-center justify-center bg-neutral-950/40 text-neutral-400 hover:text-white hover:border-white/20 active:scale-95 transition-all duration-300 group">
                    <svg class="w-4 h-4 transform group-hover:translate-x-0.5 rtl:group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                </button>
            </div>
        </div>

        <div id="events-scroll-track" class="w-full flex gap-6 overflow-x-auto px-6 md:px-12 lg:px-16 xl:px-24 pt-8 pb-14 scrollbar-none style-scroll select-none snap-x snap-mandatory">
            
            <?php foreach ($exhibitions as $item): ?>
                <div style="--accent-glow: <?= $item['accent_color'] ?>;" 
                     class="event-slider-card w-[260px] md:w-[310px] lg:w-[330px] shrink-0 snap-start group relative bg-gradient-to-b from-[#0f0f10] to-[#070708] border border-white/[0.03] rounded-[2rem] p-6 flex flex-col justify-between transition-all duration-500 hover:border-white/[0.09] hover:-translate-y-3 overflow-hidden shadow-[0_20px_50px_-15px_rgba(0,0,0,0.9)]">
                    
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none mix-blend-screen"
                         style="background: radial-gradient(circle 180px at 50% -10px, <?= $item['accent_color'] ?>12, transparent 80%);"></div>
                    
                    <div>
                    <div class="relative w-full aspect-[4/3] bg-neutral-900/60 border border-white/[0.05] rounded-2xl mb-5 overflow-hidden">
    <img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>" 
         class="w-full h-full object-cover opacity-100 group-hover:scale-105 transition-all duration-700 pointer-events-none ease-out">
    
    <div class="absolute top-4 left-4 z-20 <?= $item['tag_class'] ?> font-bold font-alexandria text-[9px] tracking-wider px-3 py-1.5 rounded-lg uppercase shadow-md">
        <?= $item['tag'] ?>
    </div>
</div>
                        <h3 class="text-xl md:text-2xl font-bold font-alexandria text-neutral-200 group-hover:text-white mb-2.5 transition-colors duration-300 tracking-tight">
                            <?= $item['title'] ?>
                        </h3>
                        <p class="text-neutral-400 group-hover:text-neutral-300 text-xs md:text-sm font-light leading-relaxed transition-colors duration-300">
                            <?= $item['desc'] ?>
                        </p>
                    </div>

                    <div class="mt-8 pt-5 border-t border-white/[0.04] flex items-center justify-between relative z-20">
                        <span class="text-[11px] tracking-[0.15em] font-bold uppercase font-alexandria transition-all duration-300 group-hover:tracking-[0.2em]" style="color: <?= $item['accent_color'] ?>;">
                            <?= $item['meta'] ?>
                        </span>
                        
                        <div class="w-8 h-8 rounded-full bg-neutral-900 border border-white/5 flex items-center justify-center text-neutral-500 group-hover:text-white transition-all duration-300">
                            <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 rtl:group-hover:-translate-x-0.5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <style>
        .scrollbar-none::-webkit-scrollbar { display: none; }
        .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
        .style-scroll { cursor: grab; }
        .style-scroll:active { cursor: grabbing; }
        
        /* Premium external localized glow effect on hover */
        .event-slider-card:hover {
            box-shadow: 0 30px 65px -10px rgba(0, 0, 0, 0.9), 0 0 35px -10px var(--accent-glow);
        }
    </style>
</section>



<section class="relative w-full bg-[#050506] text-white py-24 lg:py-36 border-b border-white/[0.05] overflow-hidden">
    
    <div class="absolute inset-0 bg-[radial-gradient(#ffffff01_1px,transparent_1px)] [background-size:32px_32px] opacity-50 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[300px] bg-[var(--secondary)]/[0.02] blur-[150px] rounded-full pointer-events-none"></div>

    <div class="w-full relative z-10 px-6 md:px-12 lg:px-16 xl:px-24">
        
        <div class="max-w-4xl mb-16 lg:mb-24">
            <div class="inline-flex items-center gap-3 mb-4">
                <span class="w-8 h-[1px] bg-[var(--secondary)]"></span>
                <span class="text-xs tracking-[0.4em] uppercase text-[var(--secondary)] font-bold font-alexandria">
                    Strategy
                </span>
            </div>
            <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold font-alexandria text-white tracking-tight leading-[1.15]">
                An integrated platform engineered for <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-white to-white/50">commercial and educational excellence.</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 xl:gap-16 pt-12 border-t border-white/[0.08]">
            
            <div class="flex flex-col justify-between group">
                <div>
                    <div class="text-xs font-bold font-alexandria text-[var(--secondary)] tracking-widest uppercase mb-6 flex items-center gap-2">
                        <span>01 .</span>
                        <span class="opacity-40 group-hover:opacity-100 transition-opacity duration-300">Integration</span>
                    </div>
                    
                    <h3 class="text-xl font-bold font-alexandria text-white mb-4 tracking-tight">
                        Integrated Environment
                    </h3>
                </div>
                <p class="text-neutral-400 text-sm lg:text-base font-light leading-relaxed">
                    Mirzaam Exhibition seeks to create an integrated environment that brings together companies specialized in supplying materials and products related to interior design, academics, and specialists in this field.
                </p>
            </div>

            <div class="flex flex-col justify-between group">
                <div>
                    <div class="text-xs font-bold font-alexandria text-[var(--secondary)] tracking-widest uppercase mb-6 flex items-center gap-2">
                        <span>02 .</span>
                        <span class="opacity-40 group-hover:opacity-100 transition-opacity duration-300">Interaction</span>
                    </div>
                    
                    <h3 class="text-xl font-bold font-alexandria text-white mb-4 tracking-tight">
                        Direct Interaction
                    </h3>
                </div>
                <p class="text-neutral-400 text-sm lg:text-base font-light leading-relaxed">
                    Mirzaam provides an ideal platform for businesses to directly interact with customers, giving them the opportunity to effectively present their products and services to an engaged market.
                </p>
            </div>

            <div class="flex flex-col justify-between group">
                <div>
                    <div class="text-xs font-bold font-alexandria text-[var(--secondary)] tracking-widest uppercase mb-6 flex items-center gap-2">
                        <span>03 .</span>
                        <span class="opacity-40 group-hover:opacity-100 transition-opacity duration-300">Education</span>
                    </div>
                    
                    <h3 class="text-xl font-bold font-alexandria text-white mb-4 tracking-tight">
                        Knowledge Transfer
                    </h3>
                </div>
                <p class="text-neutral-400 text-sm lg:text-base font-light leading-relaxed">
                    Aims to enhance the transfer of knowledge from specialists to students. The exhibition includes several lectures and workshops presented by a group of interior designers, architects, and contractors, ensuring a rich educational experience.
                </p>
            </div>

        </div>

    </div>
</section>
<section class="relative w-full bg-[#050506] text-white py-24 lg:py-32 border-b border-white/[0.05]">
    <div class="w-full px-6 md:px-12 lg:px-16 xl:px-24">
        
        <div class="max-w-5xl mb-24 lg:mb-32">
            <div class="inline-flex items-center gap-3 mb-6">
                <span class="w-8 h-[1px] bg-[var(--secondary)]"></span>
                <span class="text-xs tracking-[0.4em] uppercase text-[var(--secondary)] font-bold font-alexandria">Our Mission</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-bold font-alexandria leading-[1.2] mb-10">
                Transforming spaces into <span class="text-white/40">vibrant havens</span> that reflect the identity of their owners.
            </h2>
            <p class="text-neutral-400 text-lg md:text-xl font-light leading-relaxed max-w-3xl">
                We believe that every space reflects the personality of its owner. We strive to enable individuals to achieve this perfect fit between space and personal identity. Our mission extends to providing an educational sanctuary for students and specialists, creating a unique and exceptional experience for every visitor.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
            
            <div class="space-y-6">
                <div class="inline-flex items-center gap-3">
                    <span class="w-8 h-[1px] bg-[var(--secondary)]"></span>
                    <span class="text-xs tracking-[0.4em] uppercase text-[var(--secondary)] font-bold font-alexandria">Why Mirzaam?</span>
                </div>
                <h3 class="text-3xl md:text-4xl font-bold font-alexandria tracking-tight text-white">
                    Modernizing the region through <span class="text-[var(--secondary)]">design discipline</span>
                </h3>
            </div>

            <div class="space-y-8 text-neutral-400">
                <p class="leading-relaxed">
                    Due to the evolution of housing materials in Kuwait—from clay to concrete—the original "Mirzaam" had to be reimagined. Transformed from wood to metal, it became the first visible modernization of the home, launching interior design across the region.
                </p>
                <div class="pl-6 border-l border-[var(--secondary)]/50">
                    <p class="italic text-white/80 font-light text-lg">
                        "Just as the traditional Mirzaam filtered rainwater to a single point, our exhibition filters and unifies the design industry."
                    </p>
                </div>
                <p class="leading-relaxed">
                    Our ultimate goal is to expand this ecosystem across the MENA region, bridging those within the interior design discipline to create personalized, beautiful spaces for our society.
                </p>
            </div>

        </div>
    </div>
</section>
<section class="relative w-full bg-[#050506] text-white py-24 lg:py-32 border-b border-white/[0.05]">
    <div class="w-full px-6 md:px-12 lg:px-16 xl:px-24">
        
        <div class="mb-16">
            <div class="inline-flex items-center gap-3 mb-4">
                <span class="w-8 h-[1px] bg-[var(--secondary)]"></span>
                <span class="text-xs tracking-[0.4em] uppercase text-[var(--secondary)] font-bold font-alexandria">
                    Key Highlights
                </span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold font-alexandria">
                Why Mirzaam defines <br/><span class="text-white/40">the industry standard.</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-16">
            
            <div class="border-l border-white/[0.08] pl-6">
                <h3 class="text-lg font-bold font-alexandria mb-3">Industry Connectivity</h3>
                <p class="text-neutral-400 text-sm leading-relaxed">
                    We bridge the gap between enthusiasts and professionals. Mirzaam provides a diverse environment where all home design needs are met under one roof, fostering a seamless link between clients and experts.
                </p>
            </div>

            <div class="border-l border-white/[0.08] pl-6">
                <h3 class="text-lg font-bold font-alexandria mb-3">Commercial Exposure</h3>
                <p class="text-neutral-400 text-sm leading-relaxed">
                    Participants build lasting relationships with interested visitors. By showcasing services directly and presenting exclusive offers, companies can turn exhibition footfall into long-term commercial success.
                </p>
            </div>

            <div class="border-l border-white/[0.08] pl-6">
                <h3 class="text-lg font-bold font-alexandria mb-3">Expert Knowledge Exchange</h3>
                <p class="text-neutral-400 text-sm leading-relaxed">
                    We foster open dialogue between industry titans—including our founder Farah Al Humaidhi—and aspiring designers, creating an environment where ideas are not just shared, but transformed into reality.
                </p>
            </div>

            <div class="border-l border-white/[0.08] pl-6">
                <h3 class="text-lg font-bold font-alexandria mb-3">Trends & Education</h3>
                <p class="text-neutral-400 text-sm leading-relaxed">
                    Our curated lecture series offers students and specialists a direct window into the latest design trends. It is a unique opportunity to gain inspiration from the pioneers shaping the future of interior architecture.
                </p>
            </div>

        </div>
    </div>
</section>