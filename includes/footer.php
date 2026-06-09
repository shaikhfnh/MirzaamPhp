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
                <div class="w-full h-32 border border-white/20 rounded-sm overflow-hidden rounded-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3478.4312!2d47.96!3d29.27!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDE2JzEyLjAiTiA0N8KwNTcnMzYuMCJF!5e0!3m2!1sen!2skw!4v1!5m2!1sen!2skw" 
                            class="w-full h-full grayscale-[50%] brightness-[0.8] hover:grayscale-0 hover:brightness-100 transition-all duration-700 rounded-lg" 
                            allowfullscreen="" loading="lazy">
                    </iframe>
                </div>

                <div class="text-center">
                    <h4 class="font-bold uppercase tracking-[0.2em] text-[10px] opacity-50 mb-4">
                        <?= __('footer_follow_us') ?>
                    </h4>
                    <div class="flex justify-center gap-6">
                        <a href="#" aria-label="Instagram Profile" class="opacity-60 hover:opacity-100 transition-opacity">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </a>
                        <a href="mailto:info@mirzaam.com" aria-label="Send Email" class="opacity-60 hover:opacity-100 transition-opacity">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </a>
                        <a href="tel:+96500000000" aria-label="Call Office" class="opacity-60 hover:opacity-100 transition-opacity">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
            <p class="text-[8px] uppercase tracking-[0.3em] text-white/20 font-bold">
                <?= __('footer_fouz_label') ?>
            </p>
            <img src="/mirzaam/assets/images/Home/fouzlogo.png" alt="Fouz Expo" class="h-10 opacity-70">
            <p class="text-[12px] leading-relaxed font-light text-white/50">
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

        <div class="max-w-[1000px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-4">
            <?php foreach ($footer_expos_blueprint as $expo): ?>
                <div class="flex items-center justify-center p-4 border border-black/5 rounded-xl shadow-sm bg-white hover:shadow-md hover:border-black/20 transition-all duration-300 transform hover:-translate-y-0.5">
                    <img src="<?= $expo['image'] ?>" alt="<?= strip_tags(__('footer_expos_headline')) ?>" class="h-8 w-auto object-contain">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="bg-[#12161f] text-white/30 text-center py-6 text-[10px] uppercase tracking-widest">
        <?= __('footer_copyright') ?>
    </div>
</footer>