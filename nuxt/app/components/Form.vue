<template>
    <div class="fcksvp-container pt-18">
        <h2 class="fckscp-title">{{ $t('landing.form.label') }}</h2>
    </div>
    <div class="fcksvp-container__full w-fit">
        <form
            class="fcksvp-donationform w-fit text-2xl"
        >
            <div class="flex items-baseline gap-4 mb-6">
                <p>{{ $t('landing.form.before') }}</p>
                <input
                    class="border-b-6 focus:border-accent focus:text-accent focus:outline-none w-40 text-6xl text-center font-black bg-transparent"
                    value="0.5"
                    type="string"
                    name="amount"
                />
                <div class="flex gap-x-2">
                    <div>
                        <input type="radio" name="scale" id="franken" value="francs" checked />
                        <label for="franken">{{$t('landing.form.scale.francs')}}</label>
                    </div>
                    <span>
                        /
                    </span>
                    <div>
                        <input type="radio" name="scale" id="rappens" value="rappens" />
                        <label for="rappens">{{$t('landing.form.scale.rappens')}}</label>
                    </div>
                </div>
                <p> {{ $t('landing.form.after') }}</p>
            </div>
            <button type="submit" class="fcksvp-button">
                {{ $t('landing.form.button') }}
            </button>
        </form>
    </div>
</template>

<style scoped>
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
