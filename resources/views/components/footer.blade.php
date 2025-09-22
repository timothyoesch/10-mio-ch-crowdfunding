<div class="">
    <div class="flex flex-col-reverse md:flex-row gap-y-8 justify-between">
        <div class="fcksvp-footer__address">
            <p class="font-bold">{{ __('landing.footer.address.title') }}</p>
            <p>
                <b>{{ __('landing.footer.address.line1') }}</b><br>
                {{ __('landing.footer.address.line2') }}<br>
                {{ __('landing.footer.address.line3') }}<br>
                {{ __('landing.footer.address.line4') }}<br>
                {{ __('landing.footer.address.line5') }}
            </p>
            <p>
                <a href="mailto:{{ __('landing.footer.address.line6') }}">
                    {{ __('landing.footer.address.line6') }}
                </a><br>
                <a href="tel:{{ __('landing.footer.address.line7') }}">
                    {{ __('landing.footer.address.line7') }}
                </a>
            </p>
            <p><a href="{{ __('landing.footer.address.line8.url') }}" target="_blank">{{ __('landing.footer.address.line8.text') }}</a></p>
        </div>
        <div class="fcksvp-footer__links">
            <p class="font-bold">{{ __('landing.footer.links.title') }}</p>
            <div class="flex flex-col gap-y-1 mt-3">
                <a href="{{ __('landing.footer.links.line1.url') }}" class="flex gap-x-2 items-center w-fit" target="_blank">
                    <span class="w-4 h-4">{{ svg('fab-instagram') }}</span>
                    <span>{{ __('landing.footer.links.line1.text') }}</span>
                </a>
                <a href="{{ __('landing.footer.links.line2.url') }}" class="flex gap-x-2 items-center w-fit" target="_blank">
                    <span class="w-4 h-4">{{ svg('fab-tiktok') }}</span>
                    <span>{{ __('landing.footer.links.line2.text') }}</span>
                </a>
                <a href="{{ __('landing.footer.links.line3.url') }}" class="flex gap-x-2 items-center w-fit" target="_blank">
                    <span class="w-4 h-4">{{ svg('fab-bluesky') }}</span>
                    <span>{{ __('landing.footer.links.line3.text') }}</span>
                </a>
                <a href="{{ __('landing.footer.links.line4.url') }}" class="flex gap-x-2 items-center w-fit" target="_blank">
                    <span class="w-4 h-4">{{ svg('fab-mastodon') }}</span>
                    <span>{{ __('landing.footer.links.line4.text') }}</span>
                </a>
                <a href="{{ __('landing.footer.links.line5.url') }}" class="flex gap-x-2 items-center w-fit" target="_blank">
                    <span class="w-4 h-4">{{ svg('fab-facebook') }}</span>
                    <span>{{ __('landing.footer.links.line5.text') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .fcksvp-footer__address p + p {
        margin-top: 0.75rem;
    }

    .fcksvp-footer__address a {
        text-decoration: underline !important;
    }

    .fcksvp-footer__links a, .fcksvp-footer__address a {
        color: white;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .fcksvp-footer__links a:hover, .fcksvp-footer__address a:hover {
        color: var(--color-accent);
    }
</style>
