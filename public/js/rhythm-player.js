document.addEventListener("DOMContentLoaded", () => {
    // --- ELEMENTS ---
    const container = document.querySelector('.musical-notation-container');
    const listenButton = document.querySelector('.play-sample');
    const tapButton = document.getElementById('start-tapping');
    const tempoProgress = document.getElementById('tempo-progress-overlay');
    const beatMarkers = document.getElementById('beat-markers-overlay');
    const tapFeedbackLayer = document.getElementById('tap-feedback-layer');

    if (!container || !listenButton || !tapButton) return;

    // --- STATE & RHYTHM DATA ---
    let state = 'idle'; // idle, listening, ready_to_tap, tapping
    let metronomeIntervalId = null;
    const rhythmData = {
        pattern: JSON.parse(listenButton.dataset.pattern),
        audioSrc: listenButton.dataset.src,
        metronomeSrc: container.dataset.metronomeSrc,
        bpm: parseInt(listenButton.dataset.bpm, 10),
        noteStartTimes: [],
        totalDuration: 0,
        totalDurationMs: 0,
    };
    let rhythmStartTime = 0;

    // --- METRONOME FUNCTIONS ---

    const startMetronome = () => {
        if (metronomeIntervalId) clearInterval(metronomeIntervalId); // Clear any existing
        if (!rhythmData.metronomeSrc) return;

        const metronomeAudio = new Audio(rhythmData.metronomeSrc);
        const beatIntervalMs = 60000 / rhythmData.bpm;

        metronomeIntervalId = setInterval(() => {
            metronomeAudio.currentTime = 0;
            metronomeAudio.play();
        }, beatIntervalMs);
    };

    const stopMetronome = () => {
        if (metronomeIntervalId) {
            clearInterval(metronomeIntervalId);
            metronomeIntervalId = null;
        }
    };

    // --- CORE LOGIC ---

    const prepareRhythm = () => {
        const quarterNoteDuration = 60 / rhythmData.bpm;
        let currentTime = 0;
        rhythmData.noteStartTimes = [];
        rhythmData.pattern.forEach(duration => {
            const noteDurationSec = duration * quarterNoteDuration;
            rhythmData.noteStartTimes.push(currentTime);
            currentTime += noteDurationSec;
        });
        rhythmData.totalDuration = currentTime;
        rhythmData.totalDurationMs = currentTime * 1000;
    };

    const playListeningMode = () => {
        if (state !== 'idle' && state !== 'ready_to_tap') return;
        state = 'listening';
        updateUI();
        startMetronome();

        let currentTimeMs = 0;
        startTempoBarOverlay();

        rhythmData.pattern.forEach((duration) => {
            setTimeout(() => {
                new Audio(rhythmData.audioSrc).play();
                highlightBeatOverlay();
            }, currentTimeMs);
            currentTimeMs += duration * (60000 / rhythmData.bpm);
        });

        setTimeout(() => {
            hideTempoBarOverlay();
            stopMetronome();
            state = 'ready_to_tap';
            updateUI();
        }, rhythmData.totalDurationMs + 200);
    };

    const startTappingMode = () => {
        if (state !== 'ready_to_tap') return;
        state = 'tapping';
        updateUI();
        startMetronome();

        tapFeedbackLayer.innerHTML = '';
        rhythmStartTime = performance.now();

        setTimeout(() => {
            stopMetronome();
            state = 'ready_to_tap';
            updateUI();
        }, rhythmData.totalDurationMs + 500);
    };

    const handleTap = (event) => {
        if (state !== 'tapping' || event.repeat) return;
        const tapTime = (performance.now() - rhythmStartTime) / 1000;
        if (tapTime < 0 || tapTime > rhythmData.totalDuration + 0.5) return;

        const closestNoteTime = rhythmData.noteStartTimes.reduce((prev, curr) =>
            Math.abs(curr - tapTime) < Math.abs(prev - tapTime) ? curr : prev
        );

        const isCorrect = Math.abs(tapTime - closestNoteTime) <= 0.15;
        createTapMarker(tapTime, isCorrect);
    };

    const createTapMarker = (tapTime, isCorrect) => {
        const marker = document.createElement('div');
        marker.className = `tap-marker ${isCorrect ? 'correct' : 'incorrect'}`;
        const feedbackLayerWidth = tapFeedbackLayer.offsetWidth;
        marker.style.left = `${(tapTime / rhythmData.totalDuration) * feedbackLayerWidth}px`;
        tapFeedbackLayer.appendChild(marker);
    };

    // --- UI & OVERLAY FUNCTIONS ---

    const updateUI = () => {
        listenButton.disabled = state === 'listening' || state === 'tapping';
        tapButton.disabled = state === 'listening' || state === 'tapping';
        tapButton.style.display = state === 'idle' || state === 'listening' ? 'none' : 'inline-block';
        listenButton.innerHTML = state === 'idle' ? '▶️ Listen' : 'Listen Again';
    };

    const startTempoBarOverlay = () => {
        container.classList.add('listening');
        const containerWidth = container.offsetWidth - 20;
        addBeatMarkersOverlay(containerWidth);
        tempoProgress.style.transition = 'none';
        tempoProgress.style.width = '0px';

        setTimeout(() => {
            tempoProgress.style.transition = `width ${rhythmData.totalDurationMs}ms linear`;
            tempoProgress.style.width = `${containerWidth}px`;
        }, 50);
    };

    const hideTempoBarOverlay = () => {
        container.classList.remove('listening');
    };

    const addBeatMarkersOverlay = (containerWidth) => {
        const beatDurationMs = 60000 / rhythmData.bpm;
        const numberOfBeats = Math.floor(rhythmData.totalDurationMs / beatDurationMs);
        beatMarkers.innerHTML = '';
        for (let i = 0; i <= numberOfBeats; i++) {
            const marker = document.createElement('div');
            marker.className = 'beat-marker-overlay';
            marker.style.left = `${(i * beatDurationMs / rhythmData.totalDurationMs) * containerWidth}px`;
            if (i % 4 === 0 || i === 0) {
                marker.classList.add('major-beat');
                marker.setAttribute('data-beat', i + 1);
            }
            beatMarkers.appendChild(marker);
        }
    };

    const highlightBeatOverlay = () => {
        if (tempoProgress) {
            tempoProgress.classList.add('beating');
            setTimeout(() => tempoProgress.classList.remove('beating'), 150);
        }
    };

    // --- EVENT LISTENERS & INITIALIZATION ---
    listenButton.addEventListener('click', playListeningMode);
    tapButton.addEventListener('click', startTappingMode);
    document.addEventListener('keydown', handleTap);
    prepareRhythm();
    updateUI();
});
