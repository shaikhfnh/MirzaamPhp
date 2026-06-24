<?php
/**
 * Privacy Policy, Terms & Conditions, Raffle Draw Terms
 * Route: /privacy
 * No data file needed — all content is static legal text.
 */
$isRtl = ($lang === 'ar');
?>

<div class="bg-white text-zinc-900 antialiased" dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">

    <!-- ══════════════════════════════════════════════════════
         HERO — dark, compact, authoritative
    ══════════════════════════════════════════════════════ -->
    <section class="relative mt-10 w-full bg-zinc-950 overflow-hidden">
        <!-- Subtle grid texture -->
        <div class="absolute inset-0 opacity-[0.03]"
             style="background-image:repeating-linear-gradient(0deg,transparent,transparent 39px,#fff 39px,#fff 40px),repeating-linear-gradient(90deg,transparent,transparent 39px,#fff 39px,#fff 40px);"></div>

        <div class="relative z-10 max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20">
            <span class="inline-flex items-center gap-3 text-[11px] tracking-[0.3em] uppercase text-yellow-500 font-semibold font-mono mb-5 wv-reveal" data-reveal>
                <span class="w-7 h-px bg-yellow-500/60"></span>
                Fouz Expos Company
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white mb-4 leading-[1.05] wv-reveal" data-reveal data-delay="60">
                <?= $isRtl ? 'الخصوصية والشروط' : 'Privacy & Terms' ?>
            </h1>
            <p class="text-white/50 font-light text-sm max-w-lg wv-reveal" data-reveal data-delay="120">
                <?= $isRtl
                    ? 'تاريخ السريان: ١ نوفمبر ٢٠٢٤ — معرض مرزام، تطبيق مرزام، وسحب القرعة.'
                    : 'Effective Date: November 1, 2024 — Mirzaam Expo, Mirzaam App, and Raffle Draw.' ?>
            </p>
        </div>
    </section>


    <!-- ══════════════════════════════════════════════════════
         TAB NAV + CONTENT
    ══════════════════════════════════════════════════════ -->
    <div x-data="{ tab: 'privacy' }">

        <!-- Sticky tab bar -->
        <div class="sticky top-0 z-30 bg-white border-b border-zinc-100 shadow-[0_2px_12px_rgba(0,0,0,0.05)]">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24">
                <div class="flex overflow-x-auto gap-0 scrollbar-hide" style="-webkit-overflow-scrolling:touch;scrollbar-width:none;">
                    <?php
                    $tabs = [
                        ['id' => 'privacy', 'en' => 'Privacy Policy',      'ar' => 'سياسة الخصوصية'],
                        ['id' => 'terms',   'en' => 'Terms & Conditions',   'ar' => 'الشروط والأحكام'],
                        ['id' => 'raffle',  'en' => 'Raffle Draw Terms',    'ar' => 'شروط القرعة'],
                    ];
                    foreach ($tabs as $t):
                    ?>
                        <button @click="tab = '<?= $t['id'] ?>'"
                                class="relative shrink-0 px-5 sm:px-7 py-4 text-sm font-semibold transition-colors duration-200 whitespace-nowrap"
                                :class="tab === '<?= $t['id'] ?>'
                                    ? 'text-zinc-900'
                                    : 'text-zinc-400 hover:text-zinc-600'">
                            <?= $isRtl ? $t['ar'] : $t['en'] ?>
                            <span class="absolute bottom-0 inset-x-0 h-[2px] rounded-full transition-all duration-300"
                                  :class="tab === '<?= $t['id'] ?>' ? 'bg-yellow-500' : 'bg-transparent'"></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-14 md:py-20">
            <div class="max-w-3xl">

                <!-- ── PRIVACY POLICY ─────────────────────── -->
                <div x-show="tab === 'privacy'"
                     x-transition:enter="transition duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0">

                    <?php
                    $privacy_sections = [
                        [
                            'n' => '1',
                            'title' => 'Information We Collect',
                            'content' => '<p><strong class="text-zinc-900">Account Information:</strong> When creating an account, we collect your phone number for verification purposes via OTP.</p>
<p class="mt-3"><strong class="text-zinc-900">Google Sign-In Information:</strong> If you choose to log in using Google Sign-In via Firebase, we may access your Google user data (e.g., name and email). This information is used solely for authentication and account creation.</p>
<p class="mt-3"><strong class="text-zinc-900">Usage Data:</strong> We collect information about your use of the App, including actions taken within the voting and image upload features, to improve the user experience.</p>',
                        ],
                        [
                            'n' => '2',
                            'title' => 'Purpose of Data Collection',
                            'content' => '<p><strong class="text-zinc-900">Account Access and Verification:</strong> We use phone numbers and Google Sign-In data to confirm user identity and provide secure account access.</p>
<p class="mt-3"><strong class="text-zinc-900">Voting and Raffle Participation:</strong> Personal data submitted for voting and raffle purposes is used solely to administer and validate these features. Raffle entry data is shared with the Kuwaiti Ministry of Commerce to verify winners.</p>
<p class="mt-3"><strong class="text-zinc-900">Expo Information and Analytics:</strong> We use non-identifiable usage data to analyze and improve App features, ensuring users have access to relevant expo-related content.</p>
<p class="mt-3"><strong class="text-zinc-900">Raffle Entry Information:</strong> For eligible purchases, users may enter the raffle by submitting their phone number, email address, and civil ID number. This information is collected solely for entry verification and selection purposes.</p>',
                        ],
                        [
                            'n' => '3',
                            'title' => 'How We Share Your Information',
                            'content' => '<p><strong class="text-zinc-900">Raffle Entry Data:</strong> Phone number, email, and civil ID are shared with the Ministry of Commerce in Kuwait to validate entries and select winners.</p>
<p class="mt-3"><strong class="text-zinc-900">Google User Data:</strong> We do not share Google user data with third parties. The data is used strictly as disclosed in this policy and conforms to Google\'s Limited Use requirements.</p>
<p class="mt-3"><strong class="text-zinc-900">Service Providers:</strong> We may use trusted third-party services to help operate and maintain the App. All such parties are bound by confidentiality agreements and are prohibited from using personal data for unauthorized purposes.</p>',
                        ],
                        [
                            'n' => '4',
                            'title' => 'In-Product Privacy Notifications',
                            'content' => '<p>We provide prominent in-app privacy notifications detailing how your data is accessed, used, and stored. These notifications are easily accessible in the App interface to ensure transparency.</p>',
                        ],
                        [
                            'n' => '5',
                            'title' => 'Data Security',
                            'content' => '<p>We implement industry-standard security measures to protect your personal information from unauthorized access, alteration, or disclosure.</p>',
                        ],
                        [
                            'n' => '6',
                            'title' => 'User Rights',
                            'content' => '<p><strong class="text-zinc-900">Access and Correction:</strong> You have the right to request access to or correction of your personal information by contacting us at info@fouzexpos.com.</p>
<p class="mt-3"><strong class="text-zinc-900">Data Deletion:</strong> You may request deletion of your account and personal information at any time; however, certain information required for raffle entry may need to be retained as per regulatory requirements.</p>',
                        ],
                        [
                            'n' => '7',
                            'title' => 'Data Retention',
                            'content' => '<p>We retain your personal information only for as long as necessary to fulfill the purposes outlined in this policy or as required by law.</p>',
                        ],
                        [
                            'n' => '8',
                            'title' => 'International Data Transfers',
                            'content' => '<p>By using the App, you agree to the transfer, storage, and processing of your information in Kuwait, which may have data protection laws different from those in your country.</p>',
                        ],
                        [
                            'n' => '9',
                            'title' => "Children's Privacy",
                            'content' => '<p>The App is not intended for use by individuals under 18. We do not knowingly collect personal data from children under this age.</p>',
                        ],
                        [
                            'n' => '10',
                            'title' => 'Compliance with Google Policies',
                            'content' => '<p>Our use of Google Sign-In adheres to Google\'s Limited Use requirements. We do not use, share, or store Google user data for purposes other than those explicitly disclosed in this Privacy Policy.</p>',
                        ],
                        [
                            'n' => '11',
                            'title' => 'Changes to this Privacy Policy',
                            'content' => '<p>We may update this Privacy Policy from time to time. All changes will be posted within the App, and continued use indicates your acceptance.</p>',
                        ],
                    ];
                    ?>

                    <div class="pp-header mb-10">
                        <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-2">Legal Document</span>
                        <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900">Privacy Policy</h2>
                        <p class="text-zinc-400 text-sm mt-2 font-light">Effective Date: November 1, 2024</p>
                    </div>

                    <div class="space-y-0 divide-y divide-zinc-100">
                        <?php foreach ($privacy_sections as $s): ?>
                            <div class="py-7 group">
                                <div class="flex items-start gap-5">
                                    <span class="shrink-0 w-8 h-8 rounded-full bg-zinc-950 text-yellow-500 text-[11px] font-bold font-mono flex items-center justify-center mt-0.5">
                                        <?= $s['n'] ?>
                                    </span>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-zinc-900 font-bold text-base mb-3 leading-snug">
                                            <?= htmlspecialchars($s['title']) ?>
                                        </h3>
                                        <div class="text-zinc-600 text-[15px] leading-relaxed font-light">
                                            <?= $s['content'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


                <!-- ── TERMS & CONDITIONS ─────────────────── -->
                <div x-show="tab === 'terms'"
                     x-transition:enter="transition duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     style="display:none;">

                    <?php
                    $terms_sections = [
                        [
                            'n' => '1',
                            'title' => 'Acceptance of Terms',
                            'content' => '<p>By accessing or using the App, you confirm that you accept these Terms and agree to abide by them. If you do not agree with any part of these Terms, you must discontinue use of the App immediately.</p>
<p class="mt-3">We may modify these Terms from time to time. Any changes will be posted on the App, and continued use following such changes indicates your acceptance.</p>',
                        ],
                        [
                            'n' => '2',
                            'title' => 'Account Registration and Security',
                            'content' => '<p><strong class="text-zinc-900">Account Creation:</strong> To access certain features, users must create an account using a phone number verified via OTP. You agree to provide accurate and complete information during registration and to keep your account information up-to-date.</p>
<p class="mt-3"><strong class="text-zinc-900">Account Security:</strong> You are solely responsible for maintaining the confidentiality of your account and password. If you suspect unauthorized access to your account, you must notify us immediately.</p>',
                        ],
                        [
                            'n' => '3',
                            'title' => 'User Conduct',
                            'content' => '<p>You agree not to misuse the App by engaging in any activity that could damage or impair its functionality. This includes attempting unauthorized access, sharing fraudulent information, or uploading inappropriate or offensive content.</p>',
                        ],
                        [
                            'n' => '4',
                            'title' => 'App Features and Usage',
                            'content' => '<p><strong class="text-zinc-900">Best Booth Voting:</strong> Users may participate in the voting feature, selecting their choice for the best booth in each of three categories. Users are limited to one vote per category to ensure fair results.</p>
<p class="mt-3"><strong class="text-zinc-900">Raffle Draw Entry:</strong> Upon making eligible purchases at the expo, users may enter the raffle by providing their phone number, email, and civil ID number. This information is collected for verification and raffle entry only and will be shared with the Ministry of Commerce in Kuwait to validate entries.</p>
<p class="mt-3"><strong class="text-zinc-900">Expo Information:</strong> The App provides event-related information, including a floor plan, sponsor listings, and other resources to enhance the expo experience.</p>
<p class="mt-3"><strong class="text-zinc-900">Image Uploads:</strong> Users can upload images of their best finds within the expo to save and reference during or after the event.</p>',
                        ],
                        [
                            'n' => '5',
                            'title' => 'Intellectual Property Rights',
                            'content' => '<p><strong class="text-zinc-900">Ownership:</strong> FEC owns all intellectual property rights in the App and its content, including text, graphics, logos, and software. Unauthorized use, reproduction, or distribution of any content is prohibited.</p>
<p class="mt-3"><strong class="text-zinc-900">User-Generated Content:</strong> By uploading content (such as images) to the App, you grant FEC a non-exclusive, royalty-free license to use, display, and share this content within the App.</p>',
                        ],
                        [
                            'n' => '6',
                            'title' => 'Data Collection and Privacy',
                            'content' => '<p>All data collected, including for registration, voting, and raffle entries, is governed by our Privacy Policy. Users consent to the processing of their data as outlined in our Privacy Policy, which includes sharing raffle information with the Kuwaiti Ministry of Commerce for winner verification.</p>',
                        ],
                        [
                            'n' => '7',
                            'title' => 'Limitation of Liability',
                            'content' => '<p>To the fullest extent permitted by law, FEC shall not be liable for any direct, indirect, incidental, special, or consequential damages arising from your use or inability to use the App.</p>',
                        ],
                        [
                            'n' => '8',
                            'title' => 'Governing Law and Jurisdiction',
                            'content' => '<p>These Terms are governed by the laws of Kuwait. Any disputes arising from the use of the App will be subject to the exclusive jurisdiction of the Kuwaiti courts.</p>',
                        ],
                        [
                            'n' => '9',
                            'title' => 'Termination of Access',
                            'content' => '<p>We reserve the right to suspend or terminate access to the App, in whole or in part, without notice or liability if you breach any provision of these Terms or engage in any unlawful activity.</p>',
                        ],
                        [
                            'n' => '10',
                            'title' => 'Contact Us',
                            'content' => '<p>For questions regarding these Terms, please contact us at <a href="tel:+96593333555" class="text-yellow-600 hover:underline font-medium">+965 9333 3555</a> or email <a href="mailto:info@fouzexpos.com" class="text-yellow-600 hover:underline font-medium">info@fouzexpos.com</a>.</p>',
                        ],
                    ];
                    ?>

                    <div class="pp-header mb-10">
                        <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-2">Legal Document</span>
                        <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900">Terms & Conditions</h2>
                        <p class="text-zinc-400 text-sm mt-2 font-light">Effective Date: November 1, 2024 · Mirzaam App — operated by Fouz Expos Company</p>
                    </div>

                    <div class="space-y-0 divide-y divide-zinc-100">
                        <?php foreach ($terms_sections as $s): ?>
                            <div class="py-7">
                                <div class="flex items-start gap-5">
                                    <span class="shrink-0 w-8 h-8 rounded-full bg-zinc-950 text-yellow-500 text-[11px] font-bold font-mono flex items-center justify-center mt-0.5">
                                        <?= $s['n'] ?>
                                    </span>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-zinc-900 font-bold text-base mb-3 leading-snug">
                                            <?= htmlspecialchars($s['title']) ?>
                                        </h3>
                                        <div class="text-zinc-600 text-[15px] leading-relaxed font-light">
                                            <?= $s['content'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


                <!-- ── RAFFLE DRAW TERMS ───────────────────── -->
                <div x-show="tab === 'raffle'"
                     x-transition:enter="transition duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     style="display:none;">

                    <div class="pp-header mb-10">
                        <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-2">Mirzaam Expo 2024</span>
                        <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900">Raffle Draw Terms</h2>
                        <p class="text-zinc-400 text-sm mt-2 font-light">Valid for expo dates: December 9–14, 2024</p>
                    </div>

                    <?php
                    $raffle_groups = [
                        [
                            'title' => 'Eligible Invoices',
                            'items' => [
                                'Participants can combine invoices from official exhibitors at Mirzaam 2024 to meet the minimum of 25 KWD or multiples (e.g., 50 KWD = 2 coupons).',
                                'Only invoices issued during the expo dates (Dec 9–14, 2024) are valid.',
                                'Invoices issued before or after the expo will not be accepted.',
                            ],
                        ],
                        [
                            'title' => 'Invoice Stamping',
                            'items' => [
                                'All invoices must be stamped with the official "Mirzaam" stamp by the exhibitor.',
                                'Unstamped invoices are not eligible for the draw.',
                            ],
                        ],
                        [
                            'title' => 'Coupon Exchange',
                            'items' => [
                                'Participants receive one coupon for every 25 KWD spent or multiples (e.g., 25 KWD = 1 coupon, 50 KWD = 2 coupons).',
                            ],
                        ],
                        [
                            'title' => 'Using the App',
                            'items' => [
                                'Download the Mirzaam app and log in or register using a valid mobile number.',
                                'Present your QR code to the staff to receive draw coupons with unique serial numbers.',
                            ],
                        ],
                        [
                            'title' => 'Entering Coupons',
                            'items' => [
                                'Enter the coupon serial numbers in the app under the "Draw Section."',
                                'Ensure each coupon serial number is entered correctly.',
                                'Each coupon serial number can only be used once.',
                            ],
                        ],
                        [
                            'title' => 'Entering Full Information',
                            'items' => [
                                'Participants must provide their full correct name, civil ID number, and phone number when entering the draw.',
                                'These details are mandatory to ensure we can contact winners.',
                            ],
                        ],
                        [
                            'title' => 'Verification Requirements',
                            'items' => [
                                'Winners must retain their original invoices for verification.',
                                'The original stamped invoices will be required to claim prizes.',
                            ],
                        ],
                        [
                            'title' => 'Raffle Draw',
                            'items' => [
                                'The raffle draw will take place at the Ministry of Commerce after the expo ends.',
                                'Winners will be contacted by phone on the day of the draw.',
                                "Winners' names will also be announced on the Mirzaam Expo Instagram channel.",
                            ],
                        ],
                        [
                            'title' => 'Claiming Prizes',
                            'items' => [
                                'Winners must verify their win through the Ministry of Commerce website.',
                                'If the winner cannot be reached within 14 days of the draw, an alternative winner will be selected.',
                            ],
                        ],
                        [
                            'title' => 'Final Deadline',
                            'items' => [
                                'All entries must be submitted by 10 PM on December 14, 2024.',
                            ],
                        ],
                        [
                            'title' => 'Disqualifications',
                            'items' => [
                                'Invoices without the official Mirzaam stamp, incorrect coupon serial numbers, or incomplete participant details will result in disqualification.',
                            ],
                        ],
                        [
                            'title' => 'Administrative Rights',
                            'items' => [
                                'Mirzaam management reserves the right to verify invoices and coupons.',
                            ],
                        ],
                    ];
                    ?>

                    <div class="space-y-6">
                        <?php foreach ($raffle_groups as $i => $group): ?>
                            <div class="bg-white border border-zinc-100 rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(0,0,0,0.04)]">
                                <!-- Group header -->
                                <div class="flex items-center gap-4 px-6 py-4 border-b border-zinc-100 bg-zinc-50/70">
                                    <div class="w-7 h-7 rounded-full bg-zinc-950 flex items-center justify-center shrink-0">
                                        <span class="text-yellow-500 text-[10px] font-bold font-mono"><?= $i + 1 ?></span>
                                    </div>
                                    <h3 class="font-bold text-zinc-900 text-sm tracking-tight"><?= htmlspecialchars($group['title']) ?></h3>
                                </div>

                                <!-- Bullet items with yellow accent markers -->
                                <ul class="px-6 py-4 space-y-3">
                                    <?php foreach ($group['items'] as $item): ?>
                                        <li class="flex items-start gap-3.5 text-sm text-zinc-600 font-light leading-relaxed">
                                            <span class="mt-[6px] shrink-0">
                                                <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 12 12">
                                                    <path d="M6 0L7.854 4.146 12 6 7.854 7.854 6 12 4.146 7.854 0 6 4.146 4.146z"/>
                                                </svg>
                                            </span>
                                            <span><?= htmlspecialchars($item) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Important notice strip -->
                    <div class="mt-8 rounded-2xl bg-zinc-950 px-6 py-5 flex items-start gap-4">
                        <div class="w-9 h-9 rounded-full bg-yellow-500/15 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-white font-semibold text-sm mb-1">Important</p>
                            <p class="text-white/55 text-sm font-light leading-relaxed">
                                All raffle entries are subject to verification by Mirzaam management and the Kuwaiti Ministry of Commerce.
                                Mirzaam management reserves the right to disqualify any entry that does not comply with these terms.
                            </p>
                        </div>
                    </div>
                </div>

            </div><!-- /max-w-3xl -->
        </div><!-- /content area -->

    </div><!-- /x-data -->

</div>