<div class="fck-svp__sharebuttons mt-4 md:mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
    <a
        class="fcksvp-button flex justify-center items-center text-2xl gap-x-2 !bg-green-500 !no-underline !text-white"
        href="https://api.whatsapp.com/send?text={{ urlencode(__('step-3.message')) }}"
        target="_blank"
    >
        @svg("fab-whatsapp", 'w-6 h-6')
        {{ __('step-3.share.whatsapp') }}
    </a>
    <a
        class="fcksvp-button flex justify-center items-center text-2xl gap-x-2 !bg-blue-200 !no-underline !text-blue-800"
        href="https://bsky.app/intent/compose?text={{ urlencode(__('step-3.tweet')) }}"
        target="_blank"
    >
        @svg("fab-bluesky", 'w-6 h-6')
        {{ __('step-3.share.bluesky') }}
    </a>
    <a
        class="fcksvp-button flex justify-center items-center text-2xl gap-x-2 !bg-purple-700 !no-underline !text-white"
        href="https://mastodon.social/share?text={{ urlencode(__('step-3.tweet')) }}"
        target="_blank"
    >
        @svg("fab-mastodon", 'w-6 h-6')
        {{ __('step-3.share.mastodon') }}
    </a>
    <a
        class="fcksvp-button flex justify-center items-center text-2xl gap-x-2 !bg-black !no-underline !text-white"
        href="https://threads.net/intent/post?text={{ urlencode(__('step-3.tweet')) }}"
        target="_blank"
    >
        @svg("fab-threads", 'w-6 h-6')
        {{ __('step-3.share.threads') }}
    </a>
    <a
        class="fcksvp-button flex justify-center items-center text-2xl gap-x-2 md:col-span-2 !bg-white !no-underline !text-accent-dark"
        href="mailto:?subject={{ rawurlencode(__('step-3.subject')) }}&body={{ rawurlencode(__('step-3.message')) }}"
        target="_blank"
    >
        @svg("fas-envelope", 'w-6 h-6')
        {{ __('step-3.share.email') }}
    </a>
</div>
