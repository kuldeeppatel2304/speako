function normalizeText(text) {
    return text.toLowerCase().replace(/[^\w\s]/g, "").trim();
}

function getWords(text) {
    return normalizeText(text).split(" ");
}

function calculateWPM(text, seconds) {
    let words = getWords(text).length;
    return Math.round(words / (seconds / 60));
}

function setText(el, text) {
    el.innerText = text;
}

function enable(el) {
    el.disabled = false;
}

function disable(el) {
    el.disabled = true;
}

function isEmpty(text) {
    return !text || text.trim() === "";
}