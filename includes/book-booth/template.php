<?php
/**
 * ═══════════════════════════════════════════════════════════
 * BOOK YOUR BOOTH — shared form template (FULL, FINAL)
 * SAVE AS: includes/book-booth/template.php — full replacement
 * ═══════════════════════════════════════════════════════════
 * FIX — category dropdown not reacting: the checkbox state
 * (catDropdownOpen, selectedCategories) now lives in its OWN
 * properly-declared nested x-data on the field-group itself,
 * instead of being bolted onto the parent via bare assignment
 * in x-init. Bare assignment to undeclared property names
 * inside x-init doesn't reliably attach to Alpine's reactive
 * data — no error is thrown, but the click handler and the
 * x-show end up disconnected from each other. A real x-data
 * declaration guarantees Alpine tracks it correctly.
 *
 * FIX — dropdown scroll not working: this site runs Lenis
 * (global smooth-scroll), which intercepts wheel events before
 * they reach small internal scroll areas like this dropdown —
 * the exact same issue already solved once before for the App
 * Connect phone mockup. That fix added a `.scroll-container`
 * class that a wheel-listener in main.js's initAppMockup()
 * already watches for site-wide (stops propagation, scrolls
 * the element directly). Added that same class here — zero new
 * JS needed, reuses the existing mechanism.
 *
 * All previous fixes retained: safe JSON config passing (no
 * more form-disappearing bug), no max-width cap on the card,
 * submit button aligned to reading-direction end on desktop,
 * numeric-only phone input.
 */

$isRtl = ($lang === 'ar');
$_cfg  = $boothFormConfig;

$_formJsConfig = [
    'actionUrl'        => $_form_config['action_url'],
    'subject'          => $_cfg['subject'],
    'successTitle'     => __('bb_form_success_title') ?: 'Thank you!',
    'successDesc'      => __('bb_form_success_desc') ?: 'Our team will reach out to confirm your booth details shortly.',
    'failedTitle'      => 'Something went wrong.',
    'failedDesc'       => 'Please try again in a moment.',
    'botDetectedTitle' => 'Submission blocked.',
    'botDetectedDesc'  => 'Your submission was flagged as automated. Please try again.',
    'autoRevertMs'     => 0,
    'timeTrapSeconds'  => $_form_config['time_trap_seconds'],
    'fields' => [
        'company_name'     => ['required' => true],
        'contact_name'     => ['required' => true],
        'phone'            => ['required' => true],
        'email'            => ['required' => true, 'email' => true],
        'company_location' => ['required' => true],
        'instagram'        => ['required' => true],
        'category'         => ['required' => true],
    ],
];
?>

<div class="bg-white text-zinc-900 antialiased" dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">

    <section class="w-full mt-20 px-4 sm:px-8 lg:px-16 xl:px-24 py-14 md:py-20">

        <!-- Header -->
        <div class="text-center mb-10 wv-reveal" data-reveal>
            <span class="inline-flex items-center gap-3 text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono mb-4">
                <span class="w-6 h-px bg-yellow-500/60"></span>
                <?= htmlspecialchars($_cfg['eyebrow']) ?>
                <span class="w-6 h-px bg-yellow-500/60"></span>
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-zinc-900 mb-4 leading-[1.05]">
                <?= htmlspecialchars($_cfg['title']) ?>
            </h1>
            <p class="text-zinc-500 font-light text-sm sm:text-base max-w-md mx-auto">
                <?= htmlspecialchars($_cfg['subtitle']) ?>
            </p>
        </div>

        <div class="bg-white rounded-2xl border border-zinc-100 shadow-[0_4px_32px_-8px_rgba(0,0,0,0.07)] p-6 sm:p-8 md:p-12 wv-reveal" data-reveal data-delay="80">

            <div x-data="fouzForm(<?= htmlspecialchars(json_encode($_formJsConfig), ENT_QUOTES) ?>)">

                <!-- FORM STATE -->
                <form x-show="state === 'form' || state === 'submitting'"
                      x-cloak
                      @submit.prevent="submit"
                      novalidate>

                    <!-- HONEYPOT -->
                    <div style="position:absolute;left:-9999px;top:-9999px;" aria-hidden="true">
                        <input type="text" name="_company_fax" x-model="honeypot" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="space-y-5">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="field-group">
                                <label class="ct-label" for="bb-company"><?= __('bb_form_company') ?: 'Company Name' ?> <span class="text-yellow-600">*</span></label>
                                <input type="text" id="bb-company" x-model="values.company_name" @input="errors.company_name = ''"
                                    :class="errors.company_name ? 'is-invalid' : ''" class="ct-input">
                                <p class="ct-error" x-show="errors.company_name" x-text="errors.company_name"></p>
                            </div>
                            <div class="field-group">
                                <label class="ct-label" for="bb-contact"><?= __('bb_form_contact_name') ?: 'Contact Name' ?> <span class="text-yellow-600">*</span></label>
                                <input type="text" id="bb-contact" x-model="values.contact_name" @input="errors.contact_name = ''"
                                    :class="errors.contact_name ? 'is-invalid' : ''" class="ct-input">
                                <p class="ct-error" x-show="errors.contact_name" x-text="errors.contact_name"></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="field-group">
                                <label class="ct-label" for="bb-phone"><?= __('bb_form_phone') ?: 'Phone' ?> <span class="text-yellow-600">*</span></label>
                                <input type="tel" id="bb-phone" x-model="values.phone"
                                    @input="values.phone = values.phone.replace(/[^0-9+\s-]/g, ''); errors.phone = ''"
                                    :class="errors.phone ? 'is-invalid' : ''" class="ct-input">
                                <p class="ct-error" x-show="errors.phone" x-text="errors.phone"></p>
                            </div>
                            <div class="field-group">
                                <label class="ct-label" for="bb-email"><?= __('bb_form_email') ?: 'Contact Email' ?> <span class="text-yellow-600">*</span></label>
                                <input type="email" id="bb-email" x-model="values.email" @input="errors.email = ''"
                                    :class="errors.email ? 'is-invalid' : ''" class="ct-input">
                                <p class="ct-error" x-show="errors.email" x-text="errors.email"></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="field-group">
                                <label class="ct-label" for="bb-location"><?= __('bb_form_location') ?: 'Company Location' ?> <span class="text-yellow-600">*</span></label>
                                <input type="text" id="bb-location" x-model="values.company_location" @input="errors.company_location = ''"
                                    :class="errors.company_location ? 'is-invalid' : ''" class="ct-input">
                                <p class="ct-error" x-show="errors.company_location" x-text="errors.company_location"></p>
                            </div>
                            <div class="field-group">
                                <label class="ct-label" for="bb-instagram"><?= __('bb_form_instagram') ?: 'Instagram' ?> <span class="text-yellow-600">*</span></label>
                                <input type="text" id="bb-instagram" x-model="values.instagram" @input="errors.instagram = ''"
                                    :class="errors.instagram ? 'is-invalid' : ''" placeholder="@yourbrand" class="ct-input">
                                <p class="ct-error" x-show="errors.instagram" x-text="errors.instagram"></p>
                            </div>
                        </div>

                        <!-- CATEGORY — multi-select dropdown, own nested
                             x-data scope so state is properly reactive -->
                        <div class="field-group"
                             x-data="{ catDropdownOpen: false, selectedCategories: [] }"
                             x-init="$watch('selectedCategories', val => { values.category = val.join(', '); if (val.length) errors.category = ''; })">

                            <label class="ct-label"><?= __('bb_form_category') ?: 'Category' ?> <span class="text-yellow-600">*</span></label>

                            <div class="relative" @click.outside="catDropdownOpen = false">
                                <button type="button"
                                        @click="catDropdownOpen = !catDropdownOpen"
                                        :class="errors.category ? 'is-invalid' : ''"
                                        class="ct-input flex items-center justify-between cursor-pointer text-left rtl:text-right">
                                    <span class="truncate" :class="selectedCategories.length ? 'text-zinc-900' : 'text-zinc-400'"
                                          x-text="selectedCategories.length
                                                    ? selectedCategories.length + ' <?= __('bb_form_category_selected') ?: 'selected' ?>'
                                                    : '<?= __('bb_form_category_ph') ?: 'Select categories' ?>'">
                                    </span>
                                    <svg class="w-4 h-4 text-zinc-400 flex-shrink-0 transition-transform duration-200"
                                         :class="catDropdownOpen ? 'rotate-180' : ''"
                                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>

                                <!-- Dropdown panel — scroll-container class
                                     reuses the site-wide Lenis wheel-stop
                                     mechanism already wired up in main.js -->
                                <div x-show="catDropdownOpen" x-cloak
                                     x-transition:enter="transition duration-150 ease-out"
                                     x-transition:enter-start="opacity-0 -translate-y-1"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     class="scroll-container absolute z-30 mt-2 w-full max-h-72 overflow-y-auto
                                            bg-white border border-zinc-200 rounded-xl shadow-lg p-2"
                                     style="-webkit-overflow-scrolling: touch;">
                                    <?php foreach ($_cfg['categories'] as $catKey => $catLabel): ?>
                                    <label class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg hover:bg-zinc-50 cursor-pointer transition-colors duration-150">
                                        <input type="checkbox"
                                               x-model="selectedCategories"
                                               value="<?= htmlspecialchars($catLabel) ?>"
                                               class="w-4 h-4 rounded border-zinc-300 text-yellow-500 focus:ring-yellow-500/30 focus:ring-2 cursor-pointer flex-shrink-0">
                                        <span class="text-sm text-zinc-700"><?= htmlspecialchars($catLabel) ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Selected chips -->
                            <div x-show="selectedCategories.length > 0" class="flex flex-wrap gap-2 mt-3">
                                <template x-for="cat in selectedCategories" :key="cat">
                                    <span class="inline-flex items-center gap-1.5 bg-yellow-50 text-yellow-700 border border-yellow-200 text-xs font-medium px-3 py-1.5 rounded-full">
                                        <span x-text="cat"></span>
                                        <button type="button"
                                                @click="selectedCategories = selectedCategories.filter(c => c !== cat)"
                                                class="hover:text-yellow-900 transition-colors duration-150">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </span>
                                </template>
                            </div>

                            <p class="ct-error" x-show="errors.category" x-text="errors.category"></p>
                        </div>

                        <div class="field-group">
                            <label class="ct-label" for="bb-message"><?= __('bb_form_message') ?: 'Your Message (optional)' ?></label>
                            <textarea id="bb-message" x-model="values.message" rows="4" class="ct-input resize-none"></textarea>
                        </div>

                    </div>

                    <!-- Submit -->
                    <div class="pt-2 mt-6 flex flex-col <?= $isRtl ? 'md:items-start' : 'md:items-end' ?>">
                        <button type="submit" :disabled="state === 'submitting'"
                            class="w-full md:w-auto md:min-w-[280px] inline-flex items-center justify-center gap-2.5 bg-zinc-950 hover:bg-yellow-500 active:scale-[0.98] text-white hover:text-zinc-900 font-semibold text-sm px-8 py-4 rounded-full transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed group">
                            <span x-show="state === 'form'"><?= __('bb_form_submit') ?: 'Submit' ?></span>
                            <span x-show="state === 'submitting'"><?= __('bb_form_sending') ?: 'Sending...' ?></span>
                            <svg x-show="state === 'form'" class="w-4 h-4 group-hover:translate-x-0.5 transition-transform duration-200 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                            <svg x-show="state === 'submitting'" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                            </svg>
                        </button>
                        <p class="text-[11px] text-zinc-400 font-light text-center <?= $isRtl ? 'md:text-left' : 'md:text-right' ?> mt-4 w-full md:w-auto">
                            <span class="text-yellow-600">*</span> <?= __('bb_form_required_note') ?: 'Required fields' ?>
                        </p>
                    </div>
                </form>

                <!-- SUCCESS STATE -->
                <div x-show="state === 'success'" x-cloak x-transition class="text-center py-12">
                    <div class="w-14 h-14 mx-auto rounded-full bg-emerald-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-zinc-900 mb-2" x-text="successTitle"></h3>
                    <p class="text-zinc-500 text-sm" x-text="successDesc"></p>
                </div>

                <!-- FAILED STATE -->
                <div x-show="state === 'failed'" x-cloak x-transition class="text-center py-12">
                    <div class="w-14 h-14 mx-auto rounded-full bg-red-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-zinc-900 mb-2" x-text="failedTitle"></h3>
                    <p class="text-zinc-500 text-sm mb-4" x-text="failedDesc"></p>
                    <button type="button" @click="retry()" class="text-yellow-600 text-sm font-semibold hover:text-yellow-700">
                        <?= __('bb_form_try_again') ?: 'Try again' ?>
                    </button>
                </div>

            </div>
        </div>

    </section>
</div>

<style>
.ct-label {
    display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.15em;
    text-transform: uppercase; color: #71717a; margin-bottom: 8px;
}
.ct-input {
    width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid #e4e4e7;
    background-color: #fafafa; color: #18181b; font-size: 14px;
    transition: border-color 0.2s, background-color 0.2s, box-shadow 0.2s;
}
.ct-input::placeholder { color: #a1a1aa; }
.ct-input:focus {
    outline: none; border-color: #eab308; background-color: #fff;
    box-shadow: 0 0 0 3px rgba(234,179,8,0.1);
}
.ct-input.is-invalid { border-color: #f87171; background-color: #fef2f2; }
.ct-error { font-size: 11px; color: #ef4444; margin-top: 6px; font-weight: 500; }
@media (max-width: 640px) {
    .ct-input { font-size: 16px; padding: 13px 16px; }
}
</style>