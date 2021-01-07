{{-- Google translate eternal javascript source is included ins footer via wp_enqueue_scripts in app/setup file --}}
<div id="google_translate_element2" class="cookiebot-consent-require"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script>
<a class="cookiebot-consent-link" href="javascript: Cookiebot.renew()">{{ get_field('cookiebot_cookie_consent_warning_link_text','option') }}</a>
