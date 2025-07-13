function playPattern(pattern, audioSrc, bpm) {
    const beatDurationMs = 60000 / bpm;
    let currentTimeMs = 0;

    pattern.forEach((restBeats) => {
        setTimeout(() => {
            const audio = new Audio(audioSrc);
            audio.play();
        }, currentTimeMs);

        currentTimeMs += restBeats * beatDurationMs;
    });
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.play-sample').forEach(button => {
        button.addEventListener('click', () => {
            const pattern = JSON.parse(button.dataset.pattern);
            const audioSrc = button.dataset.src;
            const bpm = parseInt(button.dataset.bpm);
            playPattern(pattern, audioSrc, bpm);
        });
    });
});
