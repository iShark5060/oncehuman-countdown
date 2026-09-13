# Once Human Countdown

[![CI](https://img.shields.io/github/actions/workflow/status/iShark5060/OnceHuman-Countdown/ci.yml?style=flat-square&label=CI)](https://github.com/iShark5060/OnceHuman-Countdown/actions/workflows/ci.yml)
[![PR](https://img.shields.io/github/actions/workflow/status/iShark5060/OnceHuman-Countdown/pr.yml?style=flat-square&label=PR)](https://github.com/iShark5060/OnceHuman-Countdown/actions/workflows/pr.yml)
![PHP](https://img.shields.io/badge/PHP-static-777BB4?logo=php&logoColor=white&style=flat-square)
[![Cursor](https://img.shields.io/badge/Cursor-IDE-141414?logo=cursor&logoColor=white&style=flat-square)](https://cursor.com)

A one-page countdown for an Once Human game server. Phase, daily reset, weekly reset. Open it, glance at the timers, get back in the instance.

Static PHP plus a bit of JavaScript. No build step. Edit the variables near the top of `index.php` for server name, timezone, and the schedule arrays.

```bash
php -S 127.0.0.1:8080
```

Then visit `http://127.0.0.1:8080/`.
