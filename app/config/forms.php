<?php
/**
 * GLOBAL FORM CONFIG
 * ═══════════════════════════════════════════════════════════
 * Single source of truth for all form settings across the
 * entire site. Currently used by: newsletter, contact page.
 * Any future form should use this too.
 *
 * SAVE AS: app/config/forms.php
 * Require ONCE near the top of index.php:
 *   require __DIR__ . '/app/config/forms.php';
 *
 * ANTI-SPAM: honeypot + 3-second time-trap, built into the
 * shared fouzForm Alpine component. Zero third-party
 * dependencies — no Cloudflare, no Google, no outage risk.
 *
 * FIRST-TIME SETUP:
 * FormSubmit.co will send a one-time verification email to
 * the recipient address below the first time any form is
 * submitted. Click the confirmation link in that email to
 * activate delivery.
 */

$_form_config = [
    // Change this ONE line to update the inbox for every
    // form on the site — newsletter + contact + any future form.
    'recipient'         => '7af28a5f006460b337b52f5a57616f8f', 

    // Anti-spam: minimum seconds before a form submission is
    // accepted as human. Anything faster = bot. 3s is safe —
    // no real human reads and fills a form in under 3 seconds.
    'time_trap_seconds' => 3,
];

// FormSubmit.co endpoint — built from recipient above.
// Never hardcode this URL anywhere else in the codebase.
$_form_config['action_url'] = 'https://formsubmit.co/' . $_form_config['recipient'];