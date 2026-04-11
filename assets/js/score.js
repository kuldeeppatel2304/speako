function calculateAccuracy(original, spoken) {
    let oWords = getWords(original);
    let sWords = getWords(spoken);

    let match = 0;

    oWords.forEach(word => {
        if (sWords.includes(word)) match++;
    });

    return Math.round((match / oWords.length) * 100);
}

function calculateFluency(original, spoken) {
    let wpm = calculateWPM(spoken, 10); // assume 10 sec

    if (wpm > 120) return 100;
    if (wpm > 90) return 85;
    if (wpm > 60) return 70;
    return 50;
}

function calculateGrammar(spoken) {
    let words = getWords(spoken);

    let mistakes = words.filter(w => w.length <= 2).length;

    return Math.max(0, 100 - (mistakes / words.length) * 100);
}

function calculateTotal(a, f, g) {
    return Math.round((a + f + g) / 3);
}