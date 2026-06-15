<?php
/**
 * These variables are injected from index.php/init
 * @var string $lang
 * @var array $site_blueprint 
 */

// Grab the specific data for this page
$exhibitions_data = $site_blueprint['about']['exhibitions'];
$highlights_data = $site_blueprint['about']['highlights'];
?>

<section class="relative w-full bg-[#0a0a0a] text-white overflow-hidden min-h-screen flex items-center border-b border-white/10" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-[var(--primary)]/10 blur-[130px] rounded-full"></div>
    </div>

    <div class="relative z-10 w-full flex flex-col lg:flex-row items-stretch min-h-screen">
        <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 md:px-16 lg:pl-[8%] lg:pr-24 py-12 order-2 lg:order-1">
            <div class="animate-slide-up" style="animation-delay: 0.1s;">
                <div class="inline-flex items-center gap-5 mb-6">
                    <span class="w-16 h-[3px] bg-white shadow-[0_0_10px_var(--primary)]"></span>
                    <span class="text-base md:text-lg lg:text-xl tracking-[0.3em] uppercase text-white font-bold font-alexandria">
                        <?= __('about_vis_subtitle') ?>
                    </span>
                </div>
                <h1 class="text-5xl md:text-[4rem] font-bold mb-10 font-alexandria leading-[1.1] text-white tracking-tight">
                    <?= __('about_vis_title') ?>
                </h1>
            </div>
            
            <div class="space-y-6 text-[#A1A1AA] text-lg md:text-xl leading-[1.8] font-light animate-slide-up" style="animation-delay: 0.3s;">
                <p><?= __('about_vis_p1') ?></p>
                <p><?= __('about_vis_p2') ?></p>
                <p><?= __('about_vis_p3') ?></p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 relative min-h-[60vh] lg:min-h-screen order-1 lg:order-2 group overflow-hidden bg-black flex items-center">
            <img src="/mirzaam/assets/images/about/fnhbw.webp" alt="<?= strip_tags(__('about_vis_title')) ?>" class="absolute inset-0 w-full h-full object-cover object-top grayscale-[50%] opacity-80 transition-all duration-[1.5s] ease-out group-hover:scale-105 group-hover:grayscale-0 group-hover:opacity-100">
            
            <div class="absolute hidden md:block inset-0 bg-gradient-to-r from-[#0a0a0a] via-[#0a0a0a]/60 to-transparent opacity-100 lg:w-1/3"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent opacity-100 lg:hidden h-1/2 mt-auto"></div>

            <div class="absolute md:bottom-12 bottom-4 left-6 bg-[#111111]/90 backdrop-blur-2xl border border-white/10 p-5 md:p-6 rounded-[2rem] shadow-[0_30px_60px_rgba(0,0,0,0.9)] flex items-center gap-5 transition-all duration-700 ease-out group-hover:-translate-y-4 group-hover:border-[var(--secondary)]/50 z-20">
                <div class="md:w-14 w-10 h-10 md:h-14 rounded-full bg-[var(--secondary)] flex items-center justify-center text-black shrink-0 shadow-[0_0_25px_var(--secondary)] transition-transform duration-500 group-hover:scale-110">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                </div>
                <div>
                    <div class="text-[10px] md:text-[11px] text-[var(--secondary)] uppercase tracking-[0.2em] font-bold mb-1"><?= __('about_vis_badge_sub') ?></div>
                    <div class="text-[10px] md:text-sm md:text-base font-medium font-alexandria text-white leading-tight"><?= __('about_vis_badge_title') ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative w-full bg-[#050506] text-white py-12 border-b border-white/[0.05] overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div class="absolute inset-0 bg-[radial-gradient(#ffffff02_1px,transparent_1px)] [background-size:20px_20px] opacity-60 pointer-events-none"></div>
    <div class="absolute top-0 right-10 w-[500px] h-[500px] bg-[var(--primary)]/5 blur-[160px] rounded-full pointer-events-none transform -translate-y-1/3"></div>
    <div class="absolute bottom-[-5%] left-5 w-[400px] h-[400px] bg-[var(--secondary)]/5 blur-[130px] rounded-full pointer-events-none"></div>

    <div class="w-full relative z-10">
        <div class="w-full px-6 md:px-12 lg:px-16 xl:px-24 flex flex-col md:flex-row md:items-end justify-between gap-8 mb-6">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-4 mb-4">
                    <span class="w-10 h-[2px] bg-gradient-to-r from-[var(--secondary)] to-transparent"></span>
                    <span class="text-xs tracking-[0.35em] uppercase text-[var(--secondary)] font-bold font-alexandria">
                        <?= __('about_exh_subtitle') ?>
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-alexandria text-white tracking-tight leading-[1.2] mb-4">
                    <?= __('about_exh_title') ?>
                </h2>
                <p class="text-neutral-400 text-sm md:text-base font-light leading-relaxed max-w-2xl">
                    <?= __('about_exh_desc') ?>
                </p>
            </div>

            <div id="events-nav-controls" class="hidden gap-3 self-start md:self-end z-20">
                <button id="events-prev-btn" class="w-12 h-12 rounded-full border border-white/10 backdrop-blur-md flex items-center justify-center bg-neutral-950/40 text-neutral-400 hover:text-white hover:border-white/20 active:scale-95 transition-all duration-300 group"><svg class="w-4 h-4 transform group-hover:-translate-x-0.5 rtl:group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg></button>
                <button id="events-next-btn" class="w-12 h-12 rounded-full border border-white/10 backdrop-blur-md flex items-center justify-center bg-neutral-950/40 text-neutral-400 hover:text-white hover:border-white/20 active:scale-95 transition-all duration-300 group"><svg class="w-4 h-4 transform group-hover:translate-x-0.5 rtl:group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg></button>
            </div>
        </div>

        <div id="events-scroll-track" class="w-full flex gap-6 overflow-x-auto px-6 md:px-12 lg:px-16 xl:px-24 pt-8 pb-14 scrollbar-none style-scroll select-none snap-x snap-mandatory">
            
            <?php foreach ($exhibitions_data as $item): ?>
                <div style="--accent-glow: <?= $item['accent_color'] ?>;" class="event-slider-card w-[260px] md:w-[310px] lg:w-[330px] shrink-0 snap-start group relative bg-gradient-to-b from-[#0f0f10] to-[#070708] border border-white/[0.03] rounded-[2rem] p-6 flex flex-col justify-between transition-all duration-500 hover:border-white/[0.09] hover:-translate-y-3 overflow-hidden shadow-[0_20px_50px_-15px_rgba(0,0,0,0.9)]">
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none mix-blend-screen" style="background: radial-gradient(circle 180px at 50% -10px, <?= $item['accent_color'] ?>12, transparent 80%);"></div>
                    <div>
                        <div class="relative w-full aspect-[4/3] bg-neutral-900/60 border border-white/[0.05] rounded-2xl mb-5 overflow-hidden">
                            <img src="<?= $item['image'] ?>" alt="" class="w-full h-full object-cover opacity-100 group-hover:scale-105 transition-all duration-700 pointer-events-none ease-out">
                            <div class="absolute top-4 left-4 z-20 <?= $item['tag_class'] ?> font-bold font-alexandria text-[9px] tracking-wider px-3 py-1.5 rounded-lg uppercase shadow-md">
                                <?= __('about_exh_' . $item['key'] . '_tag') ?>
                            </div>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold font-alexandria text-neutral-200 group-hover:text-white mb-2.5 transition-colors duration-300 tracking-tight">
                            <?= __('about_exh_' . $item['key'] . '_title') ?>
                        </h3>
                        <p class="text-neutral-400 group-hover:text-neutral-300 text-xs md:text-sm font-light leading-relaxed transition-colors duration-300">
                            <?= __('about_exh_' . $item['key'] . '_desc') ?>
                        </p>
                    </div>
                    <div class="mt-8 pt-5 border-t border-white/[0.04] flex items-center justify-between relative z-20">
                        <span class="text-[11px] tracking-[0.15em] font-bold uppercase font-alexandria transition-all duration-300 group-hover:tracking-[0.2em]" style="color: <?= $item['accent_color'] ?>;">
                            <?= __('about_exh_' . $item['key'] . '_meta') ?>
                        </span>
                        <div class="w-8 h-8 rounded-full bg-neutral-900 border border-white/5 flex items-center justify-center text-neutral-500 group-hover:text-white transition-all duration-300">
                            <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 rtl:group-hover:-translate-x-0.5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<section class="relative w-full bg-[#050506] text-white py-12 border-b border-white/[0.05] overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div class="absolute inset-0 bg-[radial-gradient(#ffffff01_1px,transparent_1px)] [background-size:32px_32px] opacity-30 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-[var(--secondary)]/[0.03] blur-[150px] rounded-full pointer-events-none"></div>

    <div class="w-full relative z-10 px-6 md:px-12 lg:px-24">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20">
            <div class="lg:col-span-5">
                <div class="inline-flex items-center gap-3 mb-6">
                    <span class="w-8 h-[1px] bg-[var(--secondary)]"></span>
                    <span class="text-xs tracking-[0.4em] uppercase text-[var(--secondary)] font-bold font-alexandria"><?= __('about_strat_subtitle') ?></span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold font-alexandria leading-[1.15]">
                    <?= __('about_strat_title') ?>
                </h2>
            </div>
            <div class="lg:col-span-7 border-l rtl:border-r rtl:border-l-0 rtl:pr-8 border-white/[0.08] pl-8 flex flex-col justify-center">
                <p class="text-neutral-400 text-lg leading-relaxed"><?= __('about_strat_desc') ?></p>
            </div>
        </div>

        <div class="pt-12 border-t border-white/[0.08] grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <div class="inline-flex items-center gap-3 mb-6">
                    <span class="w-8 h-[1px] bg-[var(--secondary)]"></span>
                    <span class="text-xs tracking-[0.4em] uppercase text-[var(--secondary)] font-bold font-alexandria"><?= __('about_miss_subtitle') ?></span>
                </div>
                <h3 class="text-2xl md:text-3xl font-bold font-alexandria mb-6"><?= __('about_miss_title') ?></h3>
                <p class="text-neutral-400 leading-relaxed mb-8"><?= __('about_miss_p1') ?></p>
                <p class="text-neutral-400 leading-relaxed"><?= __('about_miss_p2') ?></p>
            </div>

            <div class="bg-white/[0.02] p-8 md:p-10 rounded-2xl border border-white/[0.05] flex flex-col h-full justify-center">
                <p class="italic text-white/90 text-lg font-light leading-relaxed mb-8"><?= __('about_miss_quote') ?></p>
                <div class="pt-8 border-t border-white/[0.1]">
                    <h4 class="text-sm font-bold text-[var(--secondary)] uppercase tracking-widest mb-3"><?= __('about_miss_box_title') ?></h4>
                    <p class="text-neutral-400 text-sm leading-relaxed"><?= __('about_miss_box_desc') ?></p>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="relative w-full bg-[#050506] text-white py-12 border-b border-white/[0.05] overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div class="absolute inset-0 bg-[radial-gradient(#ffffff01_1px,transparent_1px)] [background-size:32px_32px] opacity-30 pointer-events-none"></div>

    <div class="w-full relative z-10 px-6 md:px-12 lg:px-24">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            
            <div class="lg:col-span-4">
                <div class="inline-flex items-center gap-3 mb-6">
                    <span class="w-8 h-[1px] bg-[var(--secondary)]"></span>
                    <span class="text-xs tracking-[0.4em] uppercase text-[var(--secondary)] font-bold font-alexandria"><?= __('about_leg_subtitle') ?></span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold font-alexandria mb-8 leading-tight"><?= __('about_leg_title') ?></h2>
                <p class="text-neutral-400 leading-relaxed font-light text-lg"><?= __('about_leg_p1') ?></p>
                <div class="mt-8 p-6 border-l rtl:border-r rtl:border-l-0 border-[var(--secondary)] bg-white/[0.02]">
                    <p class="italic text-white/80 leading-relaxed"><?= __('about_leg_quote') ?></p>
                </div>
                <p class="mt-8 text-neutral-400 leading-relaxed"><?= __('about_leg_p2') ?></p>
            </div>

            <div class="lg:col-span-8 bg-white/[0.02] p-8 md:p-12 rounded-2xl border border-white/[0.05]">
                <div class="inline-flex items-center gap-3 mb-8">
                    <span class="w-8 h-[1px] bg-[var(--secondary)]"></span>
                    <span class="text-xs tracking-[0.4em] uppercase text-[var(--secondary)] font-bold font-alexandria"><?= __('about_high_subtitle') ?></span>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <?php foreach ($highlights_data as $highlight): ?>
                        <div class="space-y-4">
                            <h4 class="text-white font-bold font-alexandria">
                                <?= __('about_high_' . $highlight['key'] . '_title') ?>
                            </h4>
                            <p class="text-neutral-400 text-sm leading-relaxed">
                                <?= __('about_high_' . $highlight['key'] . '_desc') ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php 
// Include categories
$categories_list = $home_categories_blueprint; 
include 'includes/categories-section.php'; 
?>