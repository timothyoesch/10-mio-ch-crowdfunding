<div class="min-h-screen bg-accent py-12 text-accent-dark">
    <div class="fcksvp-container">
        <h2 class="fckscp-title !text-accent-dark">{{ __('step-2.form.title') }}</h2>
        <p class="text-2xl mt-6">{{ __('step-2.form.description') }}</p>
        <form
            class="fcksvp-supporterform text-2xl mt-12"
            action="/api/supporters"
            method="POST"
        >
            @csrf
            <input type="hidden" name="donation_uuid" value="{{ $donation->uuid }}" />
            <div class="grid gap-x-4 gap-y-8 grid-cols-1 md:grid-cols-2 w-full">
                <div class="fcksvp-formgroup">
                    <label for="first_name">{{ __('step-2.form.first_name') }}</label>
                    <input
                        class="fcksvp-input"
                        type="text"
                        id="first_name"
                        name="first_name"
                        required
                    />
                </div>
                <div class="fcksvp-formgroup">
                    <label for="last_name">{{ __('step-2.form.last_name') }}</label>
                    <input
                        class="fcksvp-input"
                        type="text"
                        id="last_name"
                        name="last_name"
                        required
                    />
                </div>
                <div class="fcksvp-formgroup">
                    <label for="email">{{ __('step-2.form.email') }}</label>
                    <input
                        class="fcksvp-input"
                        type="email"
                        id="email"
                        name="email"
                        required
                    />
                </div>
                <div class="fcksvp-formgroup">
                    <label for="phone">{{ __('step-2.form.phone') }}</label>
                    <input
                        class="fcksvp-input"
                        type="tel"
                        id="phone"
                        name="phone"
                        placeholder="{{ __('step-2.form.phone.placeholder') }}"
                    />
                </div>
                <div class="fcksvp-formgroup md:col-span-2">
                    <label class="inline-flex">
                        <input
                            type="checkbox"
                            class="form-checkbox h-5 w-5 text-accent-dark"
                            name="optin"
                        />
                        <span class="ml-2 text-xl">{!!
                            Illuminate\Support\Str::markdown(__('step-2.form.optin'))
                        !!}</span>
                    </label>
                </div>
                <div class="fcksvp-formgroup md:col-span-2 flex items-end">
                    <button type="submit" class="fcksvp-button fcksvp-button w-fit">
                        {{ __('step-2.form.button') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.fcksvp-formgroup {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    text-align: left;
    width: 100%;
}

.fcksvp-formgroup input {
    border-bottom: 3px solid var(--color-accent-dark);
    padding: 0.5rem;
}

.fcksvp-formgroup *:focus {
    outline: none;
}
</style>

<script>
    document.querySelector("form.fcksvp-supporterform").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(event.target);

        // Send the POST request using Fetch API
        fetch(this.action, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(Object.fromEntries(formData))
        })
        .then(response => response.json())
        .then(data => {
            console.log("Success:", data);
            if (data.data.uuid) {
                window.location.href = `/3/${data.data.uuid}`;
            }
        })
    });
</script>
