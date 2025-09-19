<div class=" fcksvp-section">
    <div class="fcksvp-container" id="donate-link">
        <h2 class="fckscp-title">{{ __('landing.form.label') }}</h2>
    </div>
    <div class="fcksvp-container__full w-fit">
        <form
            class="fcksvp-donationform w-fit text-2xl"
            action="/api/donations"
            method="POST"
        >
            @csrf

            <div class="flex flex-col md:flex-row items-center md:items-baseline gap-4 mb-6">
                <p>{{ __('landing.form.before') }}</p>
                <input
                    class="border-b-6 focus:border-accent focus:text-accent focus:outline-none w-40 text-6xl text-center font-black bg-transparent"
                    value="0.5"
                    type="string"
                    name="amount"
                />
                <div class="flex gap-x-2 items-center">
                    <div>
                        <input type="radio" name="scale" id="franken" value="francs" checked />
                        <label for="franken">{{__('landing.form.scale.francs')}}</label>
                    </div>
                    <span>
                        |
                    </span>
                    <div>
                        <input type="radio" name="scale" id="rappens" value="rappens" />
                        <label for="rappens">{{__('landing.form.scale.rappens')}}</label>
                    </div>
                </div>
                <div class="flex">
                    <p> {{ __('landing.form.after') }}</p>
                    <a href="#faq">
                        <x-heroicon-s-information-circle class="text-accent h-6 md:h-8 mr-2 shrink-0"/>
                    </a>
                </div>
            </div>
            <div class="fcksvp-container flex justify-center">
                <button type="submit" class="fcksvp-button">
                    {{ __('landing.form.button') }}
                </button>
            </div>
        </form>
    </div>
</div>

<style>
form.fcksvp-donationform input[type="radio"] {
    visibility: hidden;
    width: 0;
    height: 0;
}

/** Style labels based on whether their associated radio button is checked */
form.fcksvp-donationform input[type="radio"]:checked + label {
    opacity: 1;
    font-weight: bold;
}

form.fcksvp-donationform input[type="radio"] + label {
    opacity: 0.25;
    transition: all 0.3s ease;
}
</style>

<script>
    document.querySelector("form.fcksvp-donationform").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(event.target);
        // Append type of donation
        formData.append("type", "perminute");

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
                window.location.href = `/2/${data.data.uuid}`;
            }
        }).catch((error) => {
            console.error("Error:", error);
        });
    });

    document.querySelectorAll('input[name="scale"]').forEach((elem) => {
        elem.addEventListener("change", function(event) {
            const scale = event.target.value;
            console.log("Scale changed to:", scale);
            let amountInput = document.querySelector('input[name="amount"]');
            let amount = parseFloat(amountInput.value);

            if (scale === "francs") {
                // Convert from francs to rappens
                amount = (amount / 100).toFixed(2);
            } else {
                // Convert from rappens to francs
                amount = (amount * 100).toFixed(0);
            }

            // Update the amount input field with the converted value
            amountInput.value = amount;
        });
    });
</script>
