<div class="fcksvp-container">
    <p class="text-3xl md:text-5xl">{!! __("landing.counter.before", ['duration' => 2]) !!}</p>
    <div class="flex justify-center items-baseline text-accent">
        <p class="text-[6rem] leading-[0.9] font-black font-mono my-6" id="amountcounter">
            {{
                number_format(0, 2, '.', "'")
            }}
        </p>
        <span>CHF</span>
    </div>
    <p class="text-3xl md:text-5xl">{!! __("landing.counter.after", ['duration' => 2]) !!}</p>
    <p class="mt-6">{!! __("landing.counter.note") !!}</p>
</div>
