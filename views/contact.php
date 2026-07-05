<?php
/**
 * Contact page view
 * Form → FormSubmit.co → developer@fnh.group
 * reCAPTCHA v2 — add your site key to $_recaptcha_site_key below
 *
 * FIRST-TIME SETUP:
 * FormSubmit.co will send a one-time verification email to the
 * recipient address the first time this form is submitted.
 * Click the confirmation link in that email to activate delivery.
 *
 * ALL TEXT now flows through __() — every previous hardcoded
 * $isRtl ? '...' : '...' ternary has been replaced with a
 * translation key. See lang-en-contact-additions.php and
 * lang-ar-contact-additions.php for the new keys to add.
 */

$isRtl  = ($lang === 'ar');
$success = isset($_GET['success']) && $_GET['success'] === '1';

// ── CONFIG ────────────────────────────────────────────────────
$_form_recipient = 'developer@fnh.group';
$_recaptcha_site_key = ''; // TODO: add site key here
// ─────────────────────────────────────────────────────────────
?>

<?php if (!empty($_recaptcha_site_key)): ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<div class="bg-white text-zinc-900 antialiased" dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">

    <!-- ── SUCCESS BANNER ───────────────────────────────────── -->
    <?php if ($success): ?>
    <div class="bg-emerald-50 border-b border-emerald-100 px-4 py-5 wv-reveal" data-reveal>
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 flex items-center gap-3 sm:gap-4">
            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white shrink-0">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <div>
                <p class="font-semibold text-emerald-900 text-sm"><?= __('ct_success_title') ?></p>
                <p class="text-emerald-700 text-xs sm:text-sm font-light"><?= __('ct_success_desc') ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- ── HERO ──────────────────────────────────────────────── -->
    <section id="ct-hero" class="relative w-full mt-20 overflow-hidden" style="min-height:62vh;">

        <div class="absolute inset-0 overflow-hidden">
            <img src="https://mirzaam.com/wp-content/uploads/2024/10/dsc07442-min-2048x1368-1.webp"
                 alt="Mirzaam Expo"
                 class="w-full h-full object-cover object-center ct-kenburns">
            <div class="absolute inset-0 pointer-events-none"
                 style="background: linear-gradient(to top, rgba(9,9,11,0.6) 0%, rgba(9,9,11,0.05) 50%, rgba(9,9,11,0.15) 100%);"></div>
        </div>

        <div class="relative z-10 max-w-none grid grid-cols-1 lg:grid-cols-12" style="min-height:62vh;">

            <!-- Dark panel -->
            <div class="lg:col-span-5 bg-zinc-950 relative flex flex-col justify-between
                        px-5 sm:px-10 lg:px-14 xl:px-20 py-10 sm:py-12 md:py-16 min-h-[460px] sm:min-h-[520px] lg:min-h-0">

                <!-- Top: title & desc -->
                <div class="wv-reveal" data-reveal>
                    <span class="inline-flex items-center gap-3 text-[10px] sm:text-[11px] tracking-[0.3em] uppercase text-yellow-500 font-semibold font-mono mb-4 sm:mb-5">
                        <span class="w-6 sm:w-7 h-px bg-yellow-500/60"></span>
                        <?= __('ct_hero_eyebrow') ?>
                    </span>
                    <h1 class="text-3xl sm:text-5xl lg:text-[3.25rem] xl:text-6xl font-bold tracking-tight text-white mb-4 sm:mb-5 leading-[1.08] sm:leading-[1.05]">
                        <?= __('ct_hero_title') ?>
                    </h1>
                    <p class="text-white/55 font-light text-sm sm:text-base max-w-sm leading-relaxed">
                        <?= __('ct_hero_desc') ?>
                    </p>
                </div>

                <!-- Bottom: quick contact info -->
                <div class="mt-8 sm:mt-10 pt-6 sm:pt-8 border-t border-white/10 space-y-4 sm:space-y-5 wv-reveal" data-reveal data-delay="100">
                    <a href="https://maps.google.com/?q=Al+Andalus+Tower+Hawally+Kuwait"
                       target="_blank" rel="noopener"
                       class="flex items-start gap-3 sm:gap-4 group">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full border border-white/15 flex items-center justify-center text-yellow-500 shrink-0 mt-0.5 group-hover:border-yellow-500/50 group-active:scale-95 transition-all duration-200">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.686 2 6 4.686 6 8c0 4.5 6 12 6 12s6-7.5 6-12c0-3.314-2.686-6-6-6z"/>
                                <circle cx="12" cy="8" r="2"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] sm:text-[10px] text-white/35 uppercase tracking-widest font-mono mb-1"><?= __('ct_info_address_label') ?></p>
                            <p class="text-white/80 text-[13px] sm:text-sm font-light leading-snug group-hover:text-white transition-colors duration-200">
                                <?= __('ct_address_line') ?>
                            </p>
                        </div>
                    </a>

                    <a href="mailto:info@mirzaam.com" class="flex items-center gap-3 sm:gap-4 group">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full border border-white/15 flex items-center justify-center text-yellow-500 shrink-0 group-hover:border-yellow-500/50 group-active:scale-95 transition-all duration-200">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <rect x="2" y="4" width="20" height="16" rx="2"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2 7l10 7 10-7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] sm:text-[10px] text-white/35 uppercase tracking-widest font-mono mb-1"><?= __('ct_info_email_label') ?></p>
                            <p class="text-white/80 text-[13px] sm:text-sm font-light group-hover:text-white transition-colors duration-200">info@mirzaam.com</p>
                        </div>
                    </a>

                    <a href="tel:+96593333555" class="flex items-center gap-3 sm:gap-4 group">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full border border-white/15 flex items-center justify-center text-yellow-500 shrink-0 group-hover:border-yellow-500/50 group-active:scale-95 transition-all duration-200">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M22 16.92v3a2 2 0 01-2.18 2A19.86 19.86 0 013.09 4.18 2 2 0 015.09 2h3a2 2 0 012 1.72 12.65 12.65 0 00.7 2.81 2 2 0 01-.45 2.11L9.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.65 12.65 0 002.81.7A2 2 0 0122 16.92z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] sm:text-[10px] text-white/35 uppercase tracking-widest font-mono mb-1"><?= __('ct_info_phone_label') ?></p>
                            <p class="text-white/80 text-[13px] sm:text-sm font-light group-hover:text-white transition-colors duration-200">+965 9333 3555</p>
                        </div>
                    </a>
                </div>

                <div class="hidden lg:block absolute top-0 bottom-0 <?= $isRtl ? 'left-0' : '-right-16' ?> w-20 bg-zinc-950 pointer-events-none"
                     style="clip-path: <?= $isRtl ? 'polygon(0 0, 100% 0, 100% 100%)' : 'polygon(0 0, 0 100%, 100% 100%)' ?>;"></div>
            </div>

            <!-- Right — stat card, desktop only -->
            <div class="hidden lg:flex lg:col-span-7 items-end justify-end p-12 xl:p-16">
                <div class="ct-stat-card wv-reveal" data-reveal data-delay="200">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                        <span class="text-[10px] uppercase tracking-[0.25em] text-white/60 font-mono font-semibold">
                            <?= __('ct_stat_brand_label') ?>
                        </span>
                    </div>
                    <p class="text-white text-lg font-light leading-snug mb-5 max-w-[240px]">
                        <?= __('ct_stat_headline') ?>
                    </p>
                    <div class="grid grid-cols-2 gap-x-6 pt-4 border-t border-white/10">
                        <div>
                            <p class="text-xl font-bold text-white tracking-tight"><?= __('ct_stat_value_1') ?></p>
                            <p class="text-[9px] uppercase tracking-wider text-white/40 font-mono mt-0.5"><?= __('ct_stat_label_1') ?></p>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-white tracking-tight"><?= __('ct_stat_value_2') ?></p>
                            <p class="text-[9px] uppercase tracking-wider text-white/40 font-mono mt-0.5"><?= __('ct_stat_label_2') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ── FORM SECTION ──────────────────────────────────────── -->
    <section class="w-full border-t border-zinc-100">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-10 sm:py-16 md:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-10 lg:gap-14">

                <!-- Left: hours + brand note -->
                <div class="lg:col-span-4 space-y-4 sm:space-y-5">

                    <div class="bg-zinc-950 rounded-2xl p-5 sm:p-7 wv-reveal" data-reveal>
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white/8 flex items-center justify-center text-yellow-500 mb-4 sm:mb-5">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/>
                            </svg>
                        </div>
                        <p class="text-[9px] sm:text-[10px] font-bold uppercase tracking-[0.2em] text-yellow-500 font-mono mb-3 sm:mb-4">
                            <?= __('ct_info_hours_label') ?>
                        </p>
                        <p class="text-white/50 font-light text-[13px] sm:text-sm mb-1">
                            <?= __('ct_hours_days') ?>
                        </p>
                        <p class="text-white font-semibold text-sm sm:text-base mb-3 sm:mb-4">
                            <?= __('ct_hours_time') ?>
                        </p>
                        <div class="h-px bg-white/10 mb-3 sm:mb-4"></div>
                        <p class="text-white/50 text-[11px] sm:text-xs font-light leading-relaxed">
                            <?= __('ct_hours_note') ?>
                        </p>
                    </div>

                    <div class="bg-black border border-zinc-100 rounded-2xl p-5 sm:p-6 wv-reveal" data-reveal data-delay="80">
                        <p class="text-[9px] sm:text-[10px] font-bold uppercase tracking-[0.2em] text-yellow-600 font-mono mb-3">
                            <?= __('ct_organised_by_label') ?>
                        </p>
                        <div class="flex justify-center items-center w-full">
                            <img src="/mirzaam/assets/images/Home/fouzlogo.png" alt="Fouz Expo" class="h-10 sm:h-12">
                        </div>
                        <div class="h-px bg-white/10 my-3 sm:my-4"></div>
                        <p class="text-white/50 text-[11px] sm:text-xs font-light leading-relaxed">
                            <?= __('ct_organised_by_desc') ?>
                        </p>
                    </div>
                </div>

                <!-- Right: form -->
                <div class="lg:col-span-8 wv-reveal" data-reveal data-delay="80">
                    <div class="bg-white rounded-2xl border border-zinc-100 shadow-[0_4px_32px_-8px_rgba(0,0,0,0.07)] p-5 sm:p-7 md:p-10">

                        <div class="mb-6 sm:mb-8">
                            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 mb-2">
                                <?= __('ct_form_title') ?>
                            </h2>
                            <p class="text-zinc-500 font-light text-xs sm:text-sm">
                                <?= __('ct_form_subtitle') ?>
                            </p>
                        </div>

                        <form id="contact-form"
                              action="https://formsubmit.co/<?= htmlspecialchars($_form_recipient) ?>"
                              method="POST" novalidate>

                            <input type="hidden" name="_subject"  value="Mirzaam Expo — New Contact Enquiry">
                            <input type="hidden" name="_captcha"  value="false">
                            <input type="hidden" name="_template" value="table">
                            <input type="hidden" name="_next"     value="<?= htmlspecialchars(get_url('contact') . '?success=1') ?>">
                            <input type="text"   name="_honey"    style="display:none" tabindex="-1" autocomplete="off">

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 mb-4 sm:mb-5">

                                <div class="field-group">
                                    <label class="ct-label" for="ct-name">
                                        <?= __('ct_form_name') ?> <span class="text-yellow-600">*</span>
                                    </label>
                                    <input type="text" id="ct-name" name="name" required autocomplete="name"
                                        placeholder="<?= htmlspecialchars(__('ct_form_name_ph')) ?>" class="ct-input">
                                    <p class="ct-error hidden"><?= __('ct_error_required') ?></p>
                                </div>

                                <div class="field-group">
                                    <label class="ct-label" for="ct-email">
                                        <?= __('ct_form_email') ?> <span class="text-yellow-600">*</span>
                                    </label>
                                    <input type="email" id="ct-email" name="email" required autocomplete="email"
                                        placeholder="<?= htmlspecialchars(__('ct_form_email_ph')) ?>" class="ct-input">
                                    <p class="ct-error ct-error-email hidden"><?= __('ct_error_email') ?></p>
                                </div>

                                <div class="field-group">
                                    <label class="ct-label" for="ct-phone"><?= __('ct_form_phone') ?></label>
                                    <input type="tel" id="ct-phone" name="phone" autocomplete="tel"
                                        placeholder="<?= htmlspecialchars(__('ct_form_phone_ph')) ?>" class="ct-input">
                                </div>

                                <div class="field-group">
                                    <label class="ct-label" for="ct-company"><?= __('ct_form_company') ?></label>
                                    <input type="text" id="ct-company" name="company" autocomplete="organization"
                                        placeholder="<?= htmlspecialchars(__('ct_form_company_ph')) ?>" class="ct-input">
                                </div>
                            </div>

                            <div class="field-group mb-4 sm:mb-5">
                                <label class="ct-label" for="ct-type">
                                    <?= __('ct_form_type') ?> <span class="text-yellow-600">*</span>
                                </label>
                                <div class="relative">
                                    <select id="ct-type" name="enquiry_type" required class="ct-input appearance-none cursor-pointer">
                                        <option value="" disabled selected><?= htmlspecialchars(__('ct_form_type_ph')) ?></option>
                                        <option value="Exhibiting"><?= __('ct_type_exhibiting') ?></option>
                                        <option value="Visiting"><?= __('ct_type_visiting') ?></option>
                                        <option value="Media"><?= __('ct_type_media') ?></option>
                                        <option value="General"><?= __('ct_type_general') ?></option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 <?= $isRtl ? 'left-4' : 'right-4' ?> flex items-center text-zinc-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                <p class="ct-error hidden"><?= __('ct_error_required') ?></p>
                            </div>

                            <div class="field-group mb-5 sm:mb-6">
                                <label class="ct-label" for="ct-message">
                                    <?= __('ct_form_message') ?> <span class="text-yellow-600">*</span>
                                </label>
                                <textarea id="ct-message" name="message" required rows="5"
                                    placeholder="<?= htmlspecialchars(__('ct_form_message_ph')) ?>" class="ct-input resize-none"></textarea>
                                <p class="ct-error hidden"><?= __('ct_error_required') ?></p>
                            </div>

                            <?php if (!empty($_recaptcha_site_key)): ?>
                            <div class="mb-5 sm:mb-6">
                                <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars($_recaptcha_site_key) ?>"></div>
                                <p id="recaptcha-error" class="hidden text-[11px] text-red-500 mt-2 font-medium">
                                    <?= __('ct_error_recaptcha') ?>
                                </p>
                            </div>
                            <?php else: ?>
                            <div class="mb-5 sm:mb-6 rounded-xl border border-dashed border-yellow-300 bg-yellow-50 px-4 sm:px-5 py-3 sm:py-4">
                                <p class="text-[11px] sm:text-[12px] text-yellow-800 font-medium mb-1">🔑 Developer Note — reCAPTCHA not active</p>
                                <p class="text-[10px] sm:text-[11px] text-yellow-700 font-light">
                                    Get a free site key at
                                    <a href="https://www.google.com/recaptcha/admin/create" target="_blank" class="underline">google.com/recaptcha</a>
                                    then add it to <code class="bg-yellow-100 px-1 rounded font-mono">$_recaptcha_site_key</code> at the top of this file.
                                </p>
                            </div>
                            <?php endif; ?>

                            <!-- Submit row — stacks on mobile, full-width button -->
                            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-between gap-3 sm:gap-4 pt-1">
                                <p class="text-[11px] text-zinc-400 font-light text-center sm:text-left">
                                    <span class="text-yellow-600">*</span> <?= __('ct_form_required_note') ?>
                                </p>
                                <button type="submit" id="ct-submit"
                                    class="inline-flex items-center justify-center gap-2.5 bg-zinc-950 hover:bg-yellow-500 active:scale-[0.98] text-white hover:text-zinc-900 font-semibold text-sm px-8 py-3.5 rounded-full transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed group w-full sm:w-auto">
                                    <span id="ct-submit-text"><?= __('ct_form_submit') ?></span>
                                    <svg id="ct-submit-arrow" class="w-4 h-4 group-hover:translate-x-0.5 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                    </svg>
                                    <svg id="ct-submit-spinner" class="w-4 h-4 hidden animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                    </svg>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

<style>
.ct-kenburns {
    transform: scale(1.0);
    transition: transform 14s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    will-change: transform;
}
#ct-hero.is-visible .ct-kenburns { transform: scale(1.08); }
@media (prefers-reduced-motion: reduce) {
    .ct-kenburns { transition: none !important; transform: none !important; }
}
.ct-stat-card {
    max-width: 280px;
    padding: 26px 24px;
    border-radius: 18px;
    background: rgba(9, 9, 11, 0.55);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255, 255, 255, 0.12);
    box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.5);
}
</style>

<script>
(function () {
    var heroSection = document.getElementById('ct-hero');
    if (!heroSection) return;
    var io = new IntersectionObserver(function (entries, obs) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                heroSection.classList.add('is-visible');
                obs.unobserve(heroSection);
            }
        });
    }, { threshold: 0.15 });
    io.observe(heroSection);
}());
</script>

<style>
.ct-label {
    display: block;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: #71717a;
    margin-bottom: 8px;
}
.ct-input {
    width: 100%;
    padding: 12px 16px;
    border-radius: 12px;
    border: 1px solid #e4e4e7;
    background-color: #fafafa;
    color: #18181b;
    font-size: 14px;
    transition: border-color 0.2s, background-color 0.2s, box-shadow 0.2s;
}
.ct-input::placeholder { color: #a1a1aa; }
.ct-input:focus {
    outline: none;
    border-color: #eab308;
    background-color: #fff;
    box-shadow: 0 0 0 3px rgba(234,179,8,0.1);
}
.ct-input.is-invalid { border-color: #f87171; background-color: #fef2f2; }
.ct-input.is-valid { border-color: #34d399; }
.ct-error { font-size: 11px; color: #ef4444; margin-top: 6px; font-weight: 500; }

/* Mobile: bigger tap targets, 16px font on inputs to prevent iOS zoom */
@media (max-width: 640px) {
    .ct-input { font-size: 16px; padding: 13px 16px; }
}
</style>

<script>
(function () {
    'use strict';

    const form    = document.getElementById('contact-form');
    const btn     = document.getElementById('ct-submit');
    const btnText = document.getElementById('ct-submit-text');
    const arrow   = document.getElementById('ct-submit-arrow');
    const spinner = document.getElementById('ct-submit-spinner');

    if (!form) return;

    const RULES = {
        'ct-name':    { required: true },
        'ct-email':   { required: true, email: true },
        'ct-type':    { required: true },
        'ct-message': { required: true },
    };

    const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function getError(input) {
        const group = input.closest('.field-group');
        if (!group) return null;
        if (input.id === 'ct-email') {
            return group.querySelector('.ct-error-email') || group.querySelector('.ct-error');
        }
        return group.querySelector('.ct-error');
    }

    function validate(input) {
        const rules = RULES[input.id];
        if (!rules) return true;

        const val   = input.value.trim();
        const error = getError(input);
        let   valid = true;

        if (rules.required && val === '') {
            valid = false;
        } else if (rules.email && val && !EMAIL_RE.test(val)) {
            valid = false;
        }

        if (valid) {
            input.classList.remove('is-invalid');
            if (val) input.classList.add('is-valid');
            if (error) error.classList.add('hidden');
        } else {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            if (error) error.classList.remove('hidden');
        }

        return valid;
    }

    Object.keys(RULES).forEach(function (id) {
        const el = document.getElementById(id);
        if (!el) return;
        el.addEventListener('blur', function () { validate(el); });
        el.addEventListener('input', function () {
            if (el.classList.contains('is-invalid')) validate(el);
        });
    });

    form.addEventListener('submit', function (e) {
        let allValid = true;

        Object.keys(RULES).forEach(function (id) {
            const el = document.getElementById(id);
            if (el && !validate(el)) allValid = false;
        });

        const recaptchaWidget = form.querySelector('.g-recaptcha');
        const recaptchaError  = document.getElementById('recaptcha-error');
        if (recaptchaWidget && typeof grecaptcha !== 'undefined') {
            const token = grecaptcha.getResponse();
            if (!token) {
                if (recaptchaError) recaptchaError.classList.remove('hidden');
                allValid = false;
            } else {
                if (recaptchaError) recaptchaError.classList.add('hidden');
            }
        }

        if (!allValid) {
            e.preventDefault();
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstInvalid.focus();
            }
            return;
        }

        btnText.textContent = '<?= addslashes(__('ct_form_sending')) ?>';
        arrow.classList.add('hidden');
        spinner.classList.remove('hidden');
        btn.disabled = true;
    });
}());
</script>