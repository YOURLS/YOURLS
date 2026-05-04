# Local Docker stack

A `docker compose up` away from a working YOURLS install with the new
Blade-based UI enabled.

## Quickstart

```bash
docker compose up --build
```

Open http://localhost:8080/admin/ and log in:

- username: `admin`
- password: `changeme`

The first request triggers `admin/install.php` which creates the
schema. Run it once, then return to `/admin/` for the dashboard.

## What you get

- **web** — PHP 8.1 + Apache on port 8080, with the YOURLS source
  bind-mounted from the host so edits on disk are reflected
  immediately.
- **db** — MariaDB 11 with database `yourls`, user `yourls`, password
  `yourls`. Exposed on host port 33306 for tools like TablePlus.
- **assets** — one-shot helper to (re)build the Tailwind/Alpine
  bundle. Triggered explicitly: `docker compose run --rm assets`.
- **test** — runs the UI PHPUnit suite:
  `docker compose run --rm test`.

## Environment knobs

Override anything declared in `docker-compose.yml` via shell env or a
`.env` file at the repo root:

```bash
YOURLS_USER=marco YOURLS_PASS=secret docker compose up
```

Useful UI knobs (see `ui/README.md` for the full list):

| Variable | Default | Purpose |
|---|---|---|
| `YOURLS_DEBUG` | `true` | Verbose error pages and debug log. |
| `YOURLS_UI_DISABLE` | `false` | Disable the new Blade UI; legacy renderer takes over. |
| `YOURLS_UI_LEGACY_ASSETS` | `true` | Stop loading jQuery/common/tablesorter when set to `false`. |
| `YOURLS_UI_KIT` | `true` | Open `/admin/ui-kit.php` for the visual component catalog. |

## Common commands

```bash
# Rebuild everything from scratch
docker compose down -v && docker compose up --build

# Open a shell in the web container
docker compose exec web bash

# Run the UI test suite
docker compose run --rm test

# Rebuild the asset bundle after editing Tailwind / Alpine sources
docker compose run --rm assets

# Tail YOURLS debug log (live)
docker compose exec web tail -f /var/www/html/user/debug.log
```

## Going to production

The image and compose file in this directory are **dev only**:

- Apache `mod_php` with verbose errors on.
- Plaintext MySQL credentials in env.
- No HTTPS / reverse proxy.
- Source bind-mounted from host (production should `COPY` the source
  into the image instead).

Use it to validate the new UI against your plugin set; for production
deployments, wrap the same `Dockerfile` runtime stage behind nginx +
PHP-FPM, mount only the read-only source, and rotate
`YOURLS_COOKIEKEY` and DB credentials.
