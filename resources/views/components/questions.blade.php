<div class="fcksvp-container fcksvp-section text-start" id="faq">
    <h2 class="fckscp-title">{{ __('landing.faq.title') }}</h2>
    <x-toggle title="{{ __('landing.faq.q1') }}">
        {!!
            Illuminate\Support\Str::markdown(
                __('landing.faq.a1', [
                    "estimated_duration" => round(app(App\Settings\SiteSettings::class)->estimated_duration, 0),
                    "estimated_donation" => round(app(App\Settings\SiteSettings::class)->estimated_duration * 0.25, 2)
                ])
            )
        !!}
    </x-toggle>
    @for ($i = 2; $i <= 4; $i++)
        <x-toggle title="{{ __('landing.faq.q' . $i) }}">
            {!!
                Illuminate\Support\Str::markdown(
                    __('landing.faq.a' . $i)
                )
            !!}
        </x-toggle>
    @endfor
</div>


<script>
    document.querySelectorAll(".fcksvp-toggle").forEach((toggle) => {
        toggle.addEventListener("click", function () {
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
    });
</script>
