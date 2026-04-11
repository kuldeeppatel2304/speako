async function getParagraph() {
    const res = await fetch("backend/api/get-paragraph.php");
    return await res.json();
}

async function saveResult(data) {
    await fetch("backend/api/save-result.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    });
}