# Sound Generation

This document outlines the scripts used for generating different sounds in the application.

## Organic Woodblock (`sonic-pi/pluck.py`)

This script generates a natural, soft, and percussive woodblock sound.

```python
# Organic Woodblock - A natural, soft, and percussive sound
use_synth :pluck
play 73, release: 0.07, sustain: 0.13, attack: 0.02, decay: 0.02, amp: 2.5, noise_seed: 4
```

## Sci-Fi Ping (`sonic-pi/beep.py`)

This script produces a clean, short, electronic tone, like a sci-fi ping.

```python
# Sci-Fi Ping - A clean, short, electronic tone
use_synth :beep
play 73, attack: 0.03, decay: 0.02, sustain: 0.02, release: 0.18, amp: 0.8
```
