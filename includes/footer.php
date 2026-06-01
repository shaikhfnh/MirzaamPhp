<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Mirzaam | Premium Design Exhibition</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.min.css">
    <!-- Alexandria Font -->
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #232A42;
            --secondary: #F4B223;
            --background: #000000;
            --background-alt: #0A0F1C;
            --text-light: #F3F4F6;
        }
        
        * {
            font-family: 'Alexandria', sans-serif;
        }
        
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.85)), url('https://picsum.photos/id/1015/2000/1200');
            background-size: cover;
            background-position: center;
        }
        
        .glass-panel {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .luxury-heading {
            font-size: 3.5rem;
            line-height: 1.1;
            letter-spacing: -0.04em;
        }
        
        .section-glow {
            box-shadow: 0 0 60px -15px rgb(244 178 35 / 0.15);
        }
        
        .reveal-up {
            opacity: 0;
            transform: translateY(60px);
            transition: all 1.2s cubic-bezier(0.25, 0.1, 0.25, 1);
        }
        
        .reveal-up.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        .cinematic-text {
            background: linear-gradient(90deg, #F3F4F6, #F4B223, #F3F4F6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-black text-[#F3F4F6] overflow-x-hidden">
    <!-- HEADER will be included via JS -->

    <!-- ABOUT HERO -->
    <section class="hero-bg h-screen flex items-center relative">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black"></div>
        
        <div class="max-w-7xl mx-auto px-6 md:px-12 relative z-10">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-3 px-6 py-3 glass-panel rounded-full border border-white/10 mb-8">
                    <div class="w-3 h-3 bg-[#F4B223] rounded-full animate-pulse"></div>
                    <span class="uppercase tracking-[3px] text-sm font-medium">Since 2019</span>
                </div>
                
                <h1 class="luxury-heading text-6xl md:text-7xl leading-none font-medium mb-8">
                    One Platform.<br>
                    <span class="cinematic-text">Infinite Design Possibilities.</span>
                </h1>
                
                <p class="text-xl md:text-2xl text-white/80 max-w-2xl leading-relaxed">
                    Mirzaam has redefined the exhibition landscape in the GCC, becoming the ultimate multi-category destination for spaces and living solutions.
                </p>
                
                <div class="flex items-center gap-8 mt-12">
                    <a href="#" onclick="document.getElementById('story-section').scrollIntoView({ behavior: 'smooth' })" 
                       class="magnetic-btn group px-10 py-6 bg-white text-black font-medium rounded-2xl flex items-center gap-3 hover:bg-[#F4B223] transition-all duration-500">
                        Discover Our Story
                        <i class="ri-arrow-down-line text-2xl group-hover:translate-y-1 transition-transform"></i>
                    </a>
                    
                    <div class="flex items-center gap-6 text-sm">
                        <div>
                            <div class="text-[#F4B223] text-4xl font-light">300+</div>
                            <div class="text-white/60">Premium Brands</div>
                        </div>
                        <div class="h-12 w-px bg-white/10"></div>
                        <div>
                            <div class="text-[#F4B223] text-4xl font-light">400K+</div>
                            <div class="text-white/60">Discerning Visitors</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-12 left-1/2 flex flex-col items-center gap-2 text-xs tracking-widest">
            <span class="opacity-60">SCROLL TO EXPLORE</span>
            <i class="ri-arrow-down-s-line text-3xl animate-bounce"></i>
        </div>
    </section>

    <!-- STORY SECTION -->
    <section id="story-section" class="py-24 md:py-32 bg-[#0A0F1C]">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="grid md:grid-cols-12 gap-16 items-center">
                <!-- Left Content -->
                <div class="md:col-span-5 space-y-8">
                    <div class="reveal-up">
                        <span class="px-5 py-2.5 text-xs uppercase tracking-[2px] border border-white/20 rounded-full">OUR JOURNEY</span>
                    </div>
                    
                    <h2 class="text-5xl md:text-6xl font-medium leading-tight reveal-up">
                        Bridging raw construction<br>with timeless luxury.
                    </h2>
                    
                    <div class="prose prose-lg text-white/70 max-w-md reveal-up">
                        <p class="text-lg">
                            Launched in 2019, Mirzaam has grown into Kuwait's premier design destination, spanning over 25,000 square meters at the Kuwait International Fairgrounds.
                        </p>
                        <p>
                            We bring together over 300 carefully curated premium brands, connecting visionary creators with more than 400,000 architects, interior designers, real estate developers, and discerning homeowners under one roof.
                        </p>
                    </div>
                    
                    <div class="flex items-center gap-4 pt-6 reveal-up">
                        <div class="h-px w-12 bg-gradient-to-r from-transparent via-[#F4B223] to-transparent"></div>
                        <span class="uppercase text-xs tracking-widest text-[#F4B223]">Kuwait • GCC</span>
                    </div>
                </div>
                
                <!-- Right Image Grid -->
                <div class="md:col-span-7">
                    <div class="grid grid-cols-2 gap-4 md:gap-6">
                        <div class="space-y-4 md:space-y-6">
                            <img src="https://picsum.photos/id/1015/800/600" 
                                 alt="Mirzaam Exhibition Hall" 
                                 class="w-full aspect-video object-cover rounded-3xl reveal-up">
                            <img src="https://picsum.photos/id/106/800/520" 
                                 alt="Premium Booth Design" 
                                 class="w-full aspect-[4/3] object-cover rounded-3xl reveal-up">
                        </div>
                        <div class="space-y-4 md:space-y-6 pt-8 md:pt-16">
                            <img src="https://picsum.photos/id/201/800/520" 
                                 alt="Industry Leaders Networking" 
                                 class="w-full aspect-[4/3] object-cover rounded-3xl reveal-up">
                            <img src="https://picsum.photos/id/870/800/600" 
                                 alt="Luxury Interior Showcase" 
                                 class="w-full aspect-video object-cover rounded-3xl reveal-up">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VALUES / HIGHLIGHTS -->
    <section class="py-20 md:py-28 bg-black border-t border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="grid md:grid-cols-3 gap-8 md:gap-12">
                <div class="glass-panel p-8 md:p-10 rounded-3xl section-glow reveal-up">
                    <div class="text-[#F4B223] mb-6">
                        <i class="ri-community-line text-5xl"></i>
                    </div>
                    <h3 class="text-3xl font-medium mb-4">Curated Excellence</h3>
                    <p class="text-white/70">
                        Over 300 premium international and regional brands hand-selected to represent the pinnacle of design and innovation.
                    </p>
                </div>
                
                <div class="glass-panel p-8 md:p-10 rounded-3xl section-glow reveal-up" style="transition-delay: 150ms">
                    <div class="text-[#F4B223] mb-6">
                        <i class="ri-lightbulb-flash-line text-5xl"></i>
                    </div>
                    <h3 class="text-3xl font-medium mb-4">Infinite Inspiration</h3>
                    <p class="text-white/70">
                        From raw construction materials to the most luxurious finishes — Mirzaam is the complete ecosystem of spatial design.
                    </p>
                </div>
                
                <div class="glass-panel p-8 md:p-10 rounded-3xl section-glow reveal-up" style="transition-delay: 300ms">
                    <div class="text-[#F4B223] mb-6">
                        <i class="ri-handshake-line text-5xl"></i>
                    </div>
                    <h3 class="text-3xl font-medium mb-4">Meaningful Connections</h3>
                    <p class="text-white/70">
                        Connecting 400,000+ professionals and enthusiasts with the creators shaping tomorrow’s living environments.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- LEGACY SECTION -->
    <section class="py-24 bg-[#0A0F1C]">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row gap-16 items-center">
                <div class="md:w-5/12">
                    <div class="sticky top-24">
                        <h2 class="text-5xl md:text-6xl font-medium leading-none mb-8 reveal-up">
                            Where heritage meets future living.
                        </h2>
                        <div class="h-px w-20 bg-[#F4B223] mb-8"></div>
                        <p class="text-lg text-white/70 max-w-md">
                            Every edition of Mirzaam tells a story — of evolving tastes, groundbreaking materials, and the timeless pursuit of beauty in the spaces we inhabit.
                        </p>
                    </div>
                </div>
                
                <div class="md:w-7/12">
                    <div class="aspect-video bg-zinc-900 rounded-3xl overflow-hidden relative group">
                        <img src="https://picsum.photos/id/1016/1200/630" 
                             alt="Mirzaam Exhibition Atmosphere" 
                             class="w-full h-full object-cover transition-all duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <div class="inline-flex items-center gap-2 px-5 py-2 bg-black/60 backdrop-blur-md rounded-2xl text-sm">
                                <span class="text-[#F4B223]">●</span>
                                <span>Kuwait International Fairgrounds</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS BAR -->
    <div class="bg-black py-12 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-12 text-center">
                <div class="reveal-up">
                    <div class="text-5xl font-light text-[#F4B223]">25,000+</div>
                    <div class="text-sm uppercase tracking-widest mt-2 text-white/60">Square Meters</div>
                </div>
                <div class="reveal-up">
                    <div class="text-5xl font-light text-[#F4B223]">300+</div>
                    <div class="text-sm uppercase tracking-widest mt-2 text-white/60">Premium Brands</div>
                </div>
                <div class="reveal-up">
                    <div class="text-5xl font-light text-[#F4B223]">400,000+</div>
                    <div class="text-sm uppercase tracking-widest mt-2 text-white/60">Visitors</div>
                </div>
                <div class="reveal-up">
                    <div class="text-5xl font-light text-[#F4B223]">5</div>
                    <div class="text-sm uppercase tracking-widest mt-2 text-white/60">Days of Excellence</div>
                </div>
            </div>
        </div>
    </div>

    <!-- FINAL CTA -->
    <section class="py-28 bg-black">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h2 class="text-5xl md:text-6xl font-medium mb-8">Be part of the future of design.</h2>
            <p class="text-xl text-white/70 mb-12 max-w-lg mx-auto">
                Whether you're an exhibitor, architect, designer, or visionary homeowner — Mirzaam is your platform.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="#" class="px-12 py-6 bg-white text-black rounded-2xl font-medium text-lg hover:bg-[#F4B223] transition-colors">
                    Join as Exhibitor
                </a>
                <a href="#" class="px-12 py-6 border border-white/30 hover:border-white/60 rounded-2xl font-medium text-lg transition-colors">
                    Visit as Guest
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER will be included via JS -->

    <script>
        // Tailwind script already included via CDN
        function initializeReveal() {
            const reveals = document.querySelectorAll('.reveal-up');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, { threshold: 0.15 });
            
            reveals.forEach(el => observer.observe(el));
        }
        
        // Magnetic button effect
        document.addEventListener('DOMContentLoaded', () => {
            initializeReveal();
            
            const magneticBtns = document.querySelectorAll('.magnetic-btn');
            magneticBtns.forEach(btn => {
                btn.addEventListener('mousemove', (e) => {
                    const rect = btn.getBoundingClientRect();
                    const x = (e.clientX - rect.left) / rect.width - 0.5;
                    const y = (e.clientY - rect.top) / rect.height - 0.5;
                    btn.style.transform = `translate(${x * 12}px, ${y * 12}px)`;
                });
                
                btn.addEventListener('mouseleave', () => {
                    btn.style.transform = 'translate(0, 0)';
                });
            });
        });
    </script>
</body>
</html>