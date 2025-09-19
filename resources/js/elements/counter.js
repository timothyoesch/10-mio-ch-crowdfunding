import { CountUp } from 'countup.js';

const animateCounter = (startVal, endVal, duration = 5, element = 'amountcounter') => {
    new CountUp(element, endVal, {
        startVal: startVal,
        duration: duration,
        separator: "'",
        useEasing: false,
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
    animateCounter(startVal, endVal, 1);
    animateCounter(startValPerMinute, endValPerMinute, 1, 'perminutecounter');
    startVal = endVal;
    startValPerMinute = endValPerMinute;
    setInterval(async () => {
        const data = await getTotalDonationsFromApi();
        let endVal = data.data.donations_total || 0;
        if (endVal !== startVal) {
            animateCounter(startVal, endVal);
            startVal = endVal;
        }
        let endValPerMinute = data.data.sum_per_minute_donations || 0;
        if (endValPerMinute !== startValPerMinute) {
            animateCounter(startValPerMinute, endValPerMinute, 1, 'perminutecounter');
            startValPerMinute = endValPerMinute;
        }
    }, 5000); // Update every 5 seconds
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
const updateDurationDisplay = async () => {
    if (durationInterval) {
        clearInterval(durationInterval);
    }
    let voteData = await getVoteDataFromApi();
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
    await updateDurationDisplay();
    setInterval(async () => {
        await updateDurationDisplay();
    }, 10000); // Update every 10 seconds
});
