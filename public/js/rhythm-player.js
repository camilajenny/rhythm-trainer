function playPattern(pattern, audioSrc, bpm) {
    const beatDurationMs = 60000 / bpm;
    let currentTimeMs = 0;

    // Calculate total pattern duration
    const totalDuration = pattern.reduce((sum, beats) => sum + beats, 0) * beatDurationMs;

    // Start the tempo bar overlay animation
    startTempoBarOverlay(totalDuration, bpm);

    pattern.forEach((restBeats) => {
        setTimeout(() => {
            const audio = new Audio(audioSrc);
            audio.play();

            // Highlight the beat
            highlightBeatOverlay();
        }, currentTimeMs);

        currentTimeMs += restBeats * beatDurationMs;

        // Hide overlay after completion
        setTimeout(() => {
            hideTempoBarOverlay();
        }, totalDuration + 100);
    });
}

function startTempoBarOverlay(totalDuration, bpm) {
    const container = document.querySelector('.musical-notation-container');
    const overlay = document.getElementById('tempo-bar-overlay');
    const progress = document.getElementById('tempo-progress-overlay');

    if (!container || !overlay || !progress) return;

    // Show overlay and add playing class
    container.classList.add('playing');
    overlay.style.display = 'block';

    // Reset progress bar
    progress.style.width = '0%';
    progress.style.transition = 'none';

    // Set container width for the progress bar
    const containerWidth = container.offsetWidth - 20; // Account for padding
    progress.style.width = '0px';
    progress.style.maxWidth = `${containerWidth}px`;

    // Add beat markers
    addBeatMarkersOverlay(totalDuration, bpm, containerWidth);

    // Start animation after a brief delay
    setTimeout(() => {
        progress.style.transition = `width ${totalDuration}ms linear`;
        progress.style.width = `${containerWidth}px`;
    }, 50);
}

function addBeatMarkersOverlay(totalDuration, bpm, containerWidth) {
    const beatMarkers = document.getElementById('beat-markers-overlay');
    const beatDurationMs = 60000 / bpm;
    const numberOfBeats = Math.floor(totalDuration / beatDurationMs);

    // Clear existing markers
    beatMarkers.innerHTML = '';

    // Add beat markers
    for (let i = 0; i <= numberOfBeats; i++) {
        const marker = document.createElement('div');
        marker.className = 'beat-marker-overlay';
        marker.style.left = `${(i * beatDurationMs / totalDuration) * containerWidth}px`;

        // Add number every 4 beats or at the start
        if (i % 4 === 0 || i === 0) {
            marker.classList.add('major-beat');
            marker.setAttribute('data-beat', i + 1);
        }

        beatMarkers.appendChild(marker);
    }
}

function highlightBeatOverlay() {
    const progress = document.getElementById('tempo-progress-overlay');
    if (progress) {
        progress.classList.add('beating');
        setTimeout(() => {
            progress.classList.remove('beating');
        }, 150);
    }
}

function hideTempoBarOverlay() {
    const container = document.querySelector('.musical-notation-container');
    const overlay = document.getElementById('tempo-bar-overlay');

    if (container && overlay) {
        container.classList.remove('playing');
        overlay.style.display = 'none';
    }
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
