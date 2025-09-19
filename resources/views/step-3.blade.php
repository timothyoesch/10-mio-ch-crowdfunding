<x-app-layout>
    <div class="min-h-screen bg-accent py-12 text-accent-dark">
        <div class="fcksvp-container">
            <h2 class="fckscp-title !text-accent-dark">
                {{ __('step-3.title', ['fname' => $supporter->first_name, 'lname' => $supporter->last_name] ) }}
            </h2>
            <p class="text-2xl mt-6">{{ __('step-3.paragraph1') }}</p>
            <p class="text-2xl mt-6">{{ __('step-3.paragraph2') }}</p>
            <x-share-buttons />
        </div>
    </div>
</x-app-layout>
