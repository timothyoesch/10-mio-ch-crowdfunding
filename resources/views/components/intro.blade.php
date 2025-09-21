<div class="fcksvp-intro fcksvp-section !mt-8">
    <p class="text-2xl">{{__("landing.intro")}}</p>
</div>
<div class="fcksvp-about fcksvp-section !mb-8">
    <h2 class="fckscp-title">{{ __('landing.points.title') }}</h2>
    <div class="flex flex-col gap-4">
        <div class="flex text-2xl gap-4">
            <span class="text-4xl pt-1">
                @svg("fas-arrow-right", 'w-6 h-6')
            </span>
            <span>
                {!! Illuminate\Support\Str::markdown(__('landing.points.point1')) !!}
            </span>
        </div>
        <div class="flex text-2xl gap-4">
            <span class="text-4xl pt-1">
                @svg("fas-arrow-right", 'w-6 h-6')
            </span>
            <span>
                {!! Illuminate\Support\Str::markdown(__('landing.points.point2')) !!}
            </span>
        </div>
        <div class="flex text-2xl gap-4">
            <span class="text-4xl pt-1">
                @svg("fas-arrow-right", 'w-6 h-6')
            </span>
            <span>
                {!! Illuminate\Support\Str::markdown(__('landing.points.point3')) !!}
            </span>
        </div>
    </div>
</div>
