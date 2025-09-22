<div class="fcksvp-intro fcksvp-section !mt-8">
    <p class="text-xl md:text-2xl">{{__("landing.intro.1")}}</p>
    <p class="font-bold text-xl md:text-2xl mt-[1em]">{{__("landing.intro.2")}}</p>
</div>
<div class="fcksvp-about fcksvp-section !mb-8" id="donate-link">
    <h2 class="fckscp-title">{{ __('landing.points.title') }}</h2>
    <div class="flex flex-col gap-4">
        <div class="flex text-xl md:text-2xl gap-4">
            <span class="text-4xl pt-1">
                @svg("fas-arrow-right", 'w-6 h-6')
            </span>
            <span>
                {!! Illuminate\Support\Str::markdown(__('landing.points.point1')) !!}
            </span>
        </div>
        <div class="flex text-xl md:text-2xl gap-4">
            <span class="text-4xl pt-1">
                @svg("fas-arrow-right", 'w-6 h-6')
            </span>
            <span>
                {!! Illuminate\Support\Str::markdown(__('landing.points.point2')) !!}
            </span>
        </div>
    </div>
</div>
