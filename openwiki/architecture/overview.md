---
type: Architecture Overview
title: Page structure
description: PHP schedule config feeding client-side countdowns.
tags: [architecture]
timestamp: 2026-07-21T00:00:00Z
---

# Page structure

`index.php` holds timezone, server name/type, and phase-day arrays, then emits values into JS globals. `countdown.js` updates the DOM; the page meta-refreshes periodically. There is no backend beyond PHP date math at request time.
