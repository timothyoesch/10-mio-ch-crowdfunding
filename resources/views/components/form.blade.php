<div class="fcksvp-section !mt-8">
    <div>
        <form
            class="fcksvp-donationform w-fit text-xl md:text-2xl mx-auto md:mx-0"
            action="/api/donations"
            method="POST"
        >
            @csrf

            <div class="flex flex-col md:flex-row items-center emd:items-baseline gap-4 mb-4">
                <p>{{ __('landing.form.before') }}</p>
                <input
                    class="border-b-6 focus:border-accent focus:text-accent focus:outline-none w-40 text-6xl text-center font-black bg-transparent"
                    value="0.5"
                    type="string"
                    name="amount"
                    inputmode="numeric"
                />
                <div class="flex flex-row md:flex-col gap-x-2 items-center md:items-start md:my-auto md:leading-[1.1] md:pt-4 md:text-xl">
                    <div>
                        <input type="radio" name="scale" id="franken" value="francs" checked/>
                        <label for="franken">{{__('landing.form.scale.francs')}}</label>
                    </div>
                    <span class="md:hidden">
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
            <p class="text-sm mb-6">
                {!! __('landing.form.donation_equivalence',
                ['total_donation' => 0.5 * app(\App\Settings\SiteSettings::class)->estimated_duration]
                ) !!}
            </p>
            <div class="flex justify-center md:justify-start">
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
}

form.fcksvp-donationform input[type="radio"] + label {
    font-weight: bold;
    opacity: 0.25;
    transition: all 0.3s ease;
}
</style>

<script>
    document.querySelector("form.fcksvp-donationform").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission
        setTimeout(() => {
            let submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerText = "{{__('landing.form.button.processing')}}"; // Optional: Change button text to indicate processing
        }, 500);
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
            if (data.data.uuid) {
                window.location.href = `/2/${data.data.uuid}`;
            }
        }).catch((error) => {
            console.error("Error:", error);
            // Re-enable the submit button in case of error
            submitButton.disabled = false;
            submitButton.innerText = "{{ __('landing.form.button') }}"; // Reset button text
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

    // Update total donation equivalence on amount input change
    document.querySelector('input[name="amount"]').addEventListener("input", function(event) {
        const amount = parseFloat(event.target.value);
        const scale = document.querySelector('input[name="scale"]:checked').value;
        let totalDonation = 0;
        if (isNaN(amount)) {
            document.getElementById("total_donation").innerText = "0";
            return;
        }
        if (scale === "francs") {
            totalDonation = (amount * {{app(\App\Settings\SiteSettings::class)->estimated_duration}}).toFixed(0) || 0; // 300 minutes
        } else {
            totalDonation = ((amount / 100) * {{app(\App\Settings\SiteSettings::class)->estimated_duration}}).toFixed(0) || 0; // 300 minutes
        }
        document.getElementById("total_donation").innerText = totalDonation;
    });
</script>
