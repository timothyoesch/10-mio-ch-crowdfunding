import { CountUp } from 'countup.js';

const polling = 3000; // 3 seconds
const animateCounter = (startVal, endVal, duration = polling / 1000, element = 'amountcounter', useEasing = false, decimalPlaces = 0) => {
    new CountUp(element, endVal, {
        startVal: startVal,
        duration: duration,
        separator: "'",
        useEasing: useEasing,
        decimalPlaces: decimalPlaces,
    }).start();
};

const getTotalDonationsFromApi = async () => {
    let response = await fetch('/api/donations/sum');
    let data = await response.json();
    return data || { donations_total: 0 };
}


window.addEventListener('DOMContentLoaded', async () => {
    if (!document.getElementById('amountcounter')) return;
    let startVal = 0;
    let startValPerMinute = 0;
    const data = await getTotalDonationsFromApi();
    let endVal = data.data.donations_total || 0;
    let endValPerMinute = data.data.sum_per_minute_donations || 0;
    animateCounter(startVal, endVal, 1, 'amountcounter', true, endVal > 1000 ? 0 : 2);
    animateCounter(startVal, endVal, 1, 'fixed-amountcounter', true, endVal > 1000 ? 0 : 2);
    animateCounter(startValPerMinute, endValPerMinute, 1, 'perminutecounter', false, 0);
    startVal = endVal;
    startValPerMinute = endValPerMinute;
    setInterval(async () => {
        const data = await getTotalDonationsFromApi();
        let endVal = data.data.donations_total || 0;
        if (endVal !== startVal) {
            animateCounter(startVal, endVal, polling / 1000, 'amountcounter', false, endVal > 1000 ? 0 : 2);
            animateCounter(startVal, endVal, polling / 1000, 'fixed-amountcounter', false, endVal > 1000 ? 0 : 2);
            startVal = endVal;
        }
        let endValPerMinute = data.data.sum_per_minute_donations || 0;
        if (endValPerMinute !== startValPerMinute) {
            animateCounter(startValPerMinute, endValPerMinute, 1, 'perminutecounter', false, 0);
            startValPerMinute = endValPerMinute;
        }
    }, polling); // Update every 5 seconds
});


// Duration Counter
const getVoteDataFromApi = async () => {
    let response = await fetch('/api/votes/sum');
    let data = await response.json();
    return data || {
        seconds: 0,
        count: 0,
        active: false,
    }
};

const formatDuration = (totalSeconds) => {
    const minutes = Math.floor(totalSeconds / 60);
    const seconds = Math.floor(totalSeconds % 60);
    let formatString = '';
    formatString += `${minutes.toString().padStart(2, '0')}:`;
    formatString += `${seconds.toString().padStart(2, '0')}`;
    return formatString;
};

var durationInterval;
const updateDurationDisplay = (voteData) => {
    if (durationInterval) {
        clearInterval(durationInterval);
    }
    let durationElement = document.getElementById('durationcounter');
    durationElement.innerHTML = formatDuration(voteData.data.seconds);
    if (voteData.data.active) {
        durationInterval = setInterval(() => {
            voteData.data.seconds += 1;
            durationElement.innerHTML = formatDuration(voteData.data.seconds);
        }, 1000);
    }
};

window.addEventListener('DOMContentLoaded', async () => {
    if (!document.getElementById('durationcounter')) return;
    let voteData = await getVoteDataFromApi();
    updateDurationDisplay(voteData);
    let activeVote = voteData.data.active_vote;

    setInterval(async () => {
        let updatedVoteData = await getVoteDataFromApi();
        activeVote = updatedVoteData.data.active_vote;
        updateDurationDisplay(updatedVoteData);
    }, 10000); // Update every 10 seconds
});
