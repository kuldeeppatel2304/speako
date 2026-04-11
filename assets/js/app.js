let paragraph = "";
let paragraphId = null;
let speechText = "";

// Elements
const pEl = document.getElementById("paragraph");
const sEl = document.getElementById("spokenText");

const startBtn = document.getElementById("startBtn");
const recordBtn = document.getElementById("recordBtn");
const stopBtn = document.getElementById("stopBtn");
const submitBtn = document.getElementById("submitBtn");

// Result
const accEl = document.getElementById("accuracy");
const fluEl = document.getElementById("fluency");
const graEl = document.getElementById("grammar");
const totEl = document.getElementById("total");

// Init speech
initSpeech((text) => {
    speechText = text;
    setText(sEl, text);
});

// Start
startBtn.onclick = async () => {
    let data = await getParagraph();

    if (data.status === "success") {
    paragraph = data.data.content;
    paragraphId = data.data.id;

    setText(pEl, paragraph);
    enable(recordBtn);
} else {
    alert("Failed to load paragraph");
}

    setText(pEl, paragraph);

    enable(recordBtn);
};

// Record
recordBtn.onclick = () => {
    startRecording();
    disable(recordBtn);
    enable(stopBtn);
};

// Stop
stopBtn.onclick = () => {
    stopRecording();

    disable(stopBtn);
    enable(submitBtn);
};
// Submit
submitBtn.onclick = async () => {

    if (isEmpty(speechText)) {
        alert("Speak something first!");
        return;
    }

    let a = calculateAccuracy(paragraph, speechText);
    let f = calculateFluency(paragraph, speechText);
    let g = calculateGrammar(speechText);
    let t = calculateTotal(a, f, g);

    setText(accEl, a + "%");
    setText(fluEl, f + "%");
    setText(graEl, g + "%");
    setText(totEl, t + "%");

    await saveResult({
        user_id: null,
        paragraph_id: paragraphId,
        spoken_text: speechText,
        accuracy: a,
        fluency: f,
        grammar: g,
        total: t
    });

    disable(submitBtn);
};