let recognition;
let isRecording = false;

function initSpeech(callback) {
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        alert("Use Chrome browser!");
        return;
    }

    recognition = new SpeechRecognition();
    recognition.lang = "en-US";
    recognition.continuous = true;
    recognition.interimResults = true;

    recognition.onresult = (event) => {
        let transcript = "";

        for (let i = 0; i < event.results.length; i++) {
            transcript += event.results[i][0].transcript + " ";
        }

        callback(transcript.trim());
    };

    recognition.onend = () => {
        isRecording = false;
        console.log("Recording stopped");
    };

    recognition.onerror = (e) => {
        console.error("Speech error:", e);
        isRecording = false;
    };
}

// Start
function startRecording() {
    if (!recognition || isRecording) return;

    recognition.start();
    isRecording = true;
}

// Stop
function stopRecording() {
    if (!recognition || !isRecording) return;

    recognition.stop();
    isRecording = false;
}