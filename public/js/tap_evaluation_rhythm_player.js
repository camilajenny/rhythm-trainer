document.addEventListener('DOMContentLoaded', () => {
    const playButton = document.querySelector('.play-sample');
    const tapFeedbackLayer = document.getElementById('tap-feedback-layer');
    const container = document.querySelector('.musical-notation-container');

    if (!playButton || !tapFeedbackLayer || !container) {
        console.error('Required elements for tap evaluation are missing.');
        return;
    }

    let noteStartTimes = [];
    let rhythmStartTime = 0;
    let totalDuration = 0;
    let isPlaying = false;
    const tapTolerance = 0.1; // 100ms tolerance for a 'correct' tap

    const prepareTappableRhythm = () => {
        const bpm = parseInt(playButton.dataset.bpm, 10);
        const pattern = JSON.parse(playButton.dataset.pattern);
        const quarterNoteDuration = 60 / bpm; // duration of a quarter note in seconds

        noteStartTimes = [];
        let currentTime = 0;

        pattern.forEach(duration => {
            // The duration in pattern_data is relative to a whole note (4)
            const noteDuration = duration * quarterNoteDuration;
            noteStartTimes.push(currentTime);
            currentTime += noteDuration;
        });

        totalDuration = currentTime;
    };

    playButton.addEventListener('click', () => {
        // IMPORTANT: This should be synchronized with the actual audio playback start time.
        rhythmStartTime = performance.now();
        isPlaying = true;
        prepareTappableRhythm();

        // Clear previous markers
        tapFeedbackLayer.innerHTML = '';

        // Stop listening for taps after the rhythm has finished.
        setTimeout(() => {
            isPlaying = false;
        }, totalDuration * 1000 + 500); // Add a small buffer
    });

    document.addEventListener('keydown', (event) => {
        if (!isPlaying || event.repeat) {
            return;
        }

        const tapTime = (performance.now() - rhythmStartTime) / 1000; // time in seconds

        if (tapTime < 0 || tapTime > totalDuration) {
            return; // Ignore taps before the start or after the end.
        }

        // Find the closest expected note time to the user's tap
        const closestNoteTime = noteStartTimes.reduce((prev, curr) => {
            return (Math.abs(curr - tapTime) < Math.abs(prev - tapTime) ? curr : prev);
        });

        const difference = Math.abs(tapTime - closestNoteTime);
        const isCorrect = difference <= tapTolerance;

        createTapMarker(tapTime, isCorrect);
    });

    const createTapMarker = (tapTime, isCorrect) => {
        const marker = document.createElement('div');
        marker.className = `tap-marker ${isCorrect ? 'correct' : 'incorrect'}`;

        const feedbackLayerWidth = tapFeedbackLayer.offsetWidth;
        const leftPosition = (tapTime / totalDuration) * feedbackLayerWidth;

        marker.style.left = `${leftPosition}px`;
        tapFeedbackLayer.appendChild(marker);

        marker.addEventListener('animationend', () => {
            marker.remove();
        });
    };
});
