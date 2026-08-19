# Once Human Countdown

[![CI](https://github.com/iShark5060/OnceHuman-Countdown/actions/workflows/ci.yml/badge.svg)](https://github.com/iShark5060/OnceHuman-Countdown/actions/workflows/ci.yml)
[![PR](https://github.com/iShark5060/OnceHuman-Countdown/actions/workflows/pr.yml/badge.svg)](https://github.com/iShark5060/OnceHuman-Countdown/actions/workflows/pr.yml)
![PHP](https://img.shields.io/badge/PHP-static-777BB4?logo=php&logoColor=white)
[![Cursor](https://img.shields.io/badge/Cursor-IDE-141414?logo=cursor&logoColor=white)](https://cursor.com)

Static PHP + JavaScript page with countdown timers for an Once Human game server: phase, daily, and weekly resets.

## Requirements

- PHP (any recent version) or a static host that can serve `index.php` / rewrite to it
- No build step

## Quick start

Serve the repo root with any PHP-capable web server, or open via local PHP:

```bash
php -S 127.0.0.1:8080
```

Then visit `http://127.0.0.1:8080/`.

Edit the PHP variables near the top of `index.php` for server name, timezone, and schedule arrays.

## Scripts

| Script             | Description                                  |
| ------------------ | -------------------------------------------- |
| `scripts/validate` | Checks required files exist (CI smoke gate). |

## Development

Agent-oriented docs: [openwiki/quickstart.md](openwiki/quickstart.md).

Engineering standards: AppBase `docs/org-standards/` with [personal-repos.md](https://github.com/Dark-Avian-Labs/AppBase/blob/main/docs/org-standards/personal-repos.md) (GitHub-hosted runners).
