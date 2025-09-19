<div class="fcksvp-container pt-24 pb-42 text-start" id="faq">
    <h2 class="fckscp-title">{{ __('landing.about.faq.title') }}</h2>
    <x-toggle title="{{ __('landing.about.howmuch.title') }}">
        {!! __('landing.about.howmuch.description') !!}
    </x-toggle>
    <x-toggle title="{{ __('landing.about.who.title') }}">
        {!!
            Illuminate\Support\Str::markdown(__('landing.about.who.description'))
        !!}
    </x-toggle>
</div>


<script>
    window.addEventListener("click", function (event) {
        let toggle = event.target.closest(".fcksvp-toggle");
        if (!toggle) return;
        if (event.target.closest(".fcksvp-toggle__content--container")) return;
        let conentContainer = toggle.querySelector(".fcksvp-toggle__content--container");
        if (!conentContainer) return;
        let content = toggle.querySelector(".fcksvp-toggle__content");
        if (!content) return;
        let icon = toggle.querySelector(".fcksvp-toggle__title svg");
        if (!icon) return;
        if (!toggle.open) {
            conentContainer.animate({
                maxHeight: [0, conentContainer.scrollHeight + "px", "unset"]
            },
            {
                duration: 300,
                fill: "forwards"
            });
            icon.animate({
                transform: ["rotate(0deg)", "rotate(180deg)"]
            },
            {
                duration: 200,
                fill: "forwards"
            });
            setTimeout(() => {
                content.animate({
                    opacity: [0, 1],
                    transform: ["translateY(1rem)", "translateY(0)"]
                },
                {
                    duration: 500,
                    fill: "forwards",
                    easing: "ease-in-out"
                });
            }, 100);
        } else {
            conentContainer.animate({
                maxHeight: [conentContainer.scrollHeight + "px", 0, 0]
            },
            {
                duration: 300,
                fill: "forwards"
            });
            icon.animate({
                transform: ["rotate(180deg)", "rotate(0deg)"]
            },
            {
                duration: 200,
                fill: "forwards"
            });
            content.animate({
                opacity: [1, 0],
                transform: ["translateY(0)", "translateY(1rem)"]
            },
            {
                duration: 200,
                fill: "forwards"
            });
        }
        toggle.open = !toggle.open;
    });
</script>
