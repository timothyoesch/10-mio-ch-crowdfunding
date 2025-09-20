<div class="fcksvp-intro fcksvp-container fcksvp-section !mt-8">
    <p class="text-2xl">{{__("landing.intro")}}</p>
</div>
<div class="fcksvp-about fcksvp-container fcksvp-section">
    <h2 class="fckscp-title">{{ __('landing.points.title') }}</h2>
    <div class="md:pl-4 flex flex-col gap-4">
        <div class="flex text-2xl gap-4">
            <span class="text-4xl">
                👉
            </span>
            <span class="pt-1">
                {!! Illuminate\Support\Str::markdown(__('landing.points.point1')) !!}
            </span>
        </div>
        <div class="flex text-2xl gap-4">
            <span class="text-4xl">
                👉
            </span>
            <span class="pt-1">
                {!! Illuminate\Support\Str::markdown(__('landing.points.point2')) !!}
            </span>
        </div>
        <div class="flex text-2xl gap-4">
            <span class="text-4xl">
                👉
            </span>
            <span class="pt-1">
                {!! Illuminate\Support\Str::markdown(__('landing.points.point3')) !!}
            </span>
        </div>
    </div>
</div>
