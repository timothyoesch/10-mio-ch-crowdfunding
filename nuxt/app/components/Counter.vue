<script setup>
import CountUp from 'vue-countup-v3'
import { ref } from 'vue';
let duration = ref(0);
let startAmount = ref(0);
let amount = ref(2836.54);
let options = {
    decimalPlaces: 2,
    separator: '’',
    useEasing: false,
}

onMounted(() => {
    setInterval(() => {
        startAmount.value = amount.value;
        amount.value = amount.value + Math.floor(Math.random() * 2) + 1;
    }, 2000);

    setInterval(() => {
        //Calculate time between now and Sep. 18, 2025 19:20:00
        let countDownDate = new Date("Sep 18, 2025 19:20:00").getTime();
        let now = new Date().getTime();
        let distance = now - countDownDate;
        // Format as minutes:seconds
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
        duration.value = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
    }, 1000);
});



onMounted(() => {
    setInterval(() => {
    }, 2000);
});

</script>
<template>
    <div class="fcksvp-container">
        <p class="text-5xl" v-html="$t('landing.counter.before', { duration })"></p>
        <div class="flex justify-center items-baseline text-accent">
            <p class="text-[6rem] leading-[0.9] font-black font-mono my-6">
                <CountUp
                    :startVal="startAmount"
                    :endVal="amount"
                    :duration="2"
                    :options="options"
                />
            </p>
            <span>CHF</span>
        </div>
        <p class="text-5xl" v-html="$t('landing.counter.after')"></p>
    </div>
</template>
