<?php
/**
 * These variables are injected from index.php
 * @var string $lang
 * @var array $footer_explore_menu
 * @var array $footer_expos_blueprint
 * @var array $footer_contact_menu
 */

?>
<footer class="w-full border-t-[1px] border-gray-700" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
    <div class="bg-black text-white px-6 md:px-12 py-6">
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <div class="flex flex-col">
                <img src="/mirzaam/assets/images/logo/WHITE LOGO.png" alt="Mirzaam Logo" class="h-16 w-auto mb-8 object-contain self-center md:self-start">
                <h4 class="font-bold uppercase tracking-[0.2em] text-[11px] opacity-50 mb-2">
                    <?= __('footer_show_days') ?>
                </h4>
                <p class="text-[14px] leading-relaxed opacity-90">
                    <?= __('footer_schedule_html') ?>
                </p>
            </div>

            <div>
                <h4 class="font-bold uppercase tracking-[0.2em] text-[16px] mb-4 pb-1 border-b border-white/10">
                    <?= __('footer_explore_title') ?>
                </h4>
                <ul class="space-y-3 text-[14px] opacity-90">
                    <?php foreach ($footer_explore_menu as $item): ?>
                        <li>
                            <a href="<?= $item['url'] ?>" class="relative inline-block w-fit transition-all duration-300 hover:text-white after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1px] after:bg-white after:transition-all after:duration-300">
                                <?= __($item['lang_key']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <h4 class="font-bold uppercase tracking-[0.2em] text-[16px] mb-4 pb-1 border-b border-white/10">
                    <?= __('footer_contact_title') ?>
                </h4>
                <ul class="space-y-3 text-[14px] opacity-90">
                    <?php foreach ($footer_contact_menu as $item): ?>
                        <li>
                            <a href="<?= $item['url'] ?>" class="relative inline-block w-fit transition-all duration-300 hover:text-white after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1px] after:bg-white after:transition-all after:duration-300">
                                <?= __($item['lang_key']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="flex flex-col gap-6 rounded-lg">
                <div class="w-full h-40 border border-white/20 rounded-sm overflow-hidden rounded-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3478.4312!2d47.96!3d29.27!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDE2JzEyLjAiTiA0N8KwNTcnMzYuMCJF!5e0!3m2!1sen!2skw!4v1!5m2!1sen!2skw" 
                            class="w-full h-full  rounded-lg" 
                            allowfullscreen="" loading="lazy">
                    </iframe>
                </div>

                <div class="text-center">
                    <h4 class="font-bold uppercase tracking-[0.2em] text-[10px] opacity-80 mb-4">
                        <?= __('footer_follow_us') ?>
                    </h4>
                   <div class="flex justify-center gap-4">

    <!-- Instagram — glass base, gradient-tinted border + icon
         color retained as a subtle brand hint even in glass form -->
    <a href="https://www.instagram.com/mirzaamexpo/" target="_blank" rel="noopener noreferrer"
       aria-label="Instagram Profile"
       class="social-icon-btn group relative w-11 h-11 rounded-full flex items-center justify-center
              bg-white/10 backdrop-blur-xl border border-white/15
              hover:bg-white/20 hover:border-white/30 hover:scale-110
              hover:shadow-[0_8px_24px_-4px_rgba(220,39,67,0.4)]
              transition-all duration-300">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="url(#ig-gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <defs>
                <linearGradient id="ig-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#f09433"/>
                    <stop offset="30%" stop-color="#e6683c"/>
                    <stop offset="60%" stop-color="#dc2743"/>
                    <stop offset="100%" stop-color="#bc1888"/>
                </linearGradient>
            </defs>
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
        </svg>
    </a>

    <!-- WhatsApp — glass base, real green icon glyph -->
    <a href="https://api.whatsapp.com/send/?phone=96565783517&text&type=phone_number&app_absent=0"
       target="_blank" rel="noopener noreferrer"
       aria-label="Chat on WhatsApp"
       class="social-icon-btn group relative w-11 h-11 rounded-full flex items-center justify-center
              bg-white/10 backdrop-blur-xl border border-white/15
              hover:bg-white/20 hover:border-white/30 hover:scale-110
              hover:shadow-[0_8px_24px_-4px_rgba(37,211,102,0.4)]
              transition-all duration-300">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="#25D366">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.149-.198.297-.768.966-.941 1.164-.173.198-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.52-.075-.149-.669-1.612-.916-2.206-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479s1.065 2.875 1.213 3.074c.149.198 2.095 3.2 5.077 4.487.71.306 1.263.489 1.694.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.174-1.413-.074-.124-.272-.198-.57-.347zM12.042 0C5.495 0 .162 5.333.162 11.88c0 2.093.547 4.136 1.588 5.938L0 24l6.353-1.667a11.86 11.86 0 005.689 1.448h.005c6.547 0 11.88-5.333 11.88-11.88A11.913 11.913 0 0012.042 0zm0 21.77h-.004a9.88 9.88 0 01-5.032-1.378l-.36-.214-3.769.988 1.005-3.675-.234-.377a9.86 9.86 0 01-1.516-5.233c.002-5.443 4.43-9.87 9.876-9.87a9.82 9.82 0 016.98 2.894 9.82 9.82 0 012.89 6.98c-.003 5.445-4.43 9.875-9.876 9.875z"/>
        </svg>
    </a>

    <!-- Email — glass base, blue icon -->
    <a href="mailto:info@mirzaam.com" aria-label="Send Email"
       class="social-icon-btn group relative w-11 h-11 rounded-full flex items-center justify-center
              bg-white/10 backdrop-blur-xl border border-white/15
              hover:bg-white/20 hover:border-white/30 hover:scale-110
              hover:shadow-[0_8px_24px_-4px_rgba(59,130,246,0.4)]
              transition-all duration-300">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
        </svg>
    </a>

    <!-- Phone — glass base, teal icon -->
    <a href="tel:+96593333555" aria-label="Call Office"
       class="social-icon-btn group relative w-11 h-11 rounded-full flex items-center justify-center
              bg-white/10 backdrop-blur-xl border border-white/15
              hover:bg-white/20 hover:border-white/30 hover:scale-110
              hover:shadow-[0_8px_24px_-4px_rgba(20,184,166,0.4)]
              transition-all duration-300">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#14B8A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
        </svg>
    </a>

</div>
                </div>
            </div>
        </div>
    </div>

    <section class="w-full bg-[#0a0a0a] px-6 py-5 text-center border-t border-white/5">
        <div class="max-w-2xl mx-auto flex flex-col items-center gap-4">
            <p class="text-[8px] uppercase tracking-[0.3em] text-white/70 font-bold">
                <?= __('footer_fouz_label') ?>
            </p>
             <a href="https://fouzexpos.com/"
               target="_blank"
               rel="noopener noreferrer">
               <img src="/mirzaam/assets/images/Home/fouzlogo.png" alt="Fouz Expo" class="h-20 ">
            </a>
            <p class="text-[12px] leading-relaxed font-light text-white/80">
                <?= __('footer_fouz_mission') ?>
            </p>
        </div>
    </section>

<div class="bg-white px-6 md:px-12 py-8 border-t border-black/5">
    <div class="text-center mb-6">
        <h5 class="text-[9px] uppercase tracking-[0.4em] text-black/40 font-bold">
            <?= __('footer_expos_headline') ?>
        </h5>
    </div>

    <!-- aspect-[21/9] is wider/shorter than aspect-video (16/9) —
         crops the empty top/bottom space your logos were leaving. -->
    <div class="max-w-[1100px] mx-auto grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach ($footer_expos_blueprint as $expo): ?>
            <a href="<?= htmlspecialchars($expo['url']) ?>"
            <?= str_contains($expo['url'], $base_path) ? 'target="_self"' : 'target="_blank"' ?>
               rel="noopener noreferrer"
               class="aspect-[10/2] md:aspect-[21/9] flex items-center justify-center md:p-3 sm:p-4 border border-black/5 rounded-xl shadow-sm bg-white hover:shadow-md hover:border-black/20 transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">
                <img src="<?= $expo['image'] ?>" alt="<?= strip_tags(__('footer_expos_headline')) ?>" class="max-h-full max-w-full w-auto h-auto object-contain">
            </a>
        <?php endforeach; ?>
    </div>
</div>

    <div class="bg-[#12161f] text-white/50 text-center py-6 text-[10px] uppercase tracking-widest">
        <?= __('footer_copyright') ?>
    </div>
</footer>