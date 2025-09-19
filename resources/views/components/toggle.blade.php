<div class="fcksvp-toggle border-t-2 border-b-2 py-4">
    <p class="fcksvp-toggle__title text-xl md:text-2xl font-bold flex gap-x-4 justify-between items-center cursor-pointer">
        <span>{{ $title }}</span>
        <x-heroicon-s-chevron-down class="h-6 md:h-8 mr-2 shrink-0"/>
    </p>
    <div class="fcksvp-toggle__content--container max-h-0 overflow-hidden text-lg md:text-xl">
        <div class="fcksvp-toggle__content pt-2 pb-6 opacity-0 translate-y-4">
            {!! $slot !!}
        </div>
    </div>
</div>
