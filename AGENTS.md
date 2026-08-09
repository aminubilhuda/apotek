# AGENTS.md

Laravel 12 pharmacy ("apotek") app using **Filament v4** admin panel, Livewire 3, PHPUnit 11, SQLite. All tables/columns are Indonesian; models use **custom primary keys** (`id_obat`, `id_supplier`, ...) with explicit `$table`, `$primaryKey`, and FK/owner keys on every relationship — never assume `id`.

## Critical: PHP environment

The system `php` in PATH is a broken `php@7.3` (missing libzip) — **do not use `php` or `composer` bare**. Every Laravel command must be run with:

```bash
PHP=/Users/godboy/Library/FlyEnv/app/static-php-8.5.6/bin/php
COMPOSER=/Users/godboy/Library/FlyEnv/app/composer-2.9.8/composer
$PHP artisan migrate
$PHP $COMPOSER install
```

Node/npm are fine at `/Users/godboy/Library/FlyEnv/env/node/bin` (node v26, npm 11).

PHP 8.5 emits `PDO::MYSQL_ATTR_SSL_CA` deprecations to stderr — harmless noise in CLI output. `public/index.php` already suppresses them for web responses via `error_reporting(E_ALL & ~E_DEPRECATED)`; don't "fix" the vendor warnings.

## Setup & commands

```bash
$PHP artisan migrate --seed          # fresh install; SQLite file is database/database.sqlite (must exist, empty file ok)
$PHP artisan serve --port=8123       # dev server
npm run build                        # after Blade changes (Vite; public/build manifests)
$PHP artisan test                    # suite (tests use in-memory SQLite; ~0.2s)
```

Admin panel is at `/admin` (panel id `admin`). Seed admin: `admin@apotek.com` (password from `UserFactory`, default `password`). Nota printing route: `GET /transaksi/{transaksi}/cetak-nota` → `NotaController@cetak`, views in `resources/views/nota`.

## Architecture notes

- **Stock is observer-driven, not manual.** `AppServiceProvider` registers `DetailPembelianObserver` and `DetailTransaksiObserver`; they mutate `Obat->stok` and append `KartuStok` rows. Writes to `DetailPembelian`/`DetailTransaksi` must go through Eloquent models (events fire), never raw inserts.
- **Filament resources** live in `app/Filament/Resources` (one dir per model: `Obats`, `Dokters`, `Pembelians`, `TransaksiPenjualans`, ...). Follow sibling resource structure (`Pages/` + `Forms/` + `Tables/` split, `PengaturanResource` is a single-page singleton — the one exception).
- **Eloquent models** use `casts()` methods (not `$casts`), and relationships always pass explicit foreign/owner keys. Indonesian column names (`id_obat`, `nama_obat`, `stok_awal`).
- Bootstrap: `bootstrap/app.php` + `bootstrap/providers.php` (no `app/Console/Kernel.php`, no middleware dir).
- Frontend Blade in `resources/views/`; `welcome.blade.php` is the landing page, rest of UI is Filament.

## Testing

PHPUnit (no Pest). Filament tests need `Filament::setCurrentPanel('admin')` and an authenticated user. Run single: `$PHP artisan test --filter=testName` or full file `$PHP artisan test tests/Feature/XxxTest.php`.

## Conventions

- Follow Laravel Boost/pint style: `vendor/bin/pint` on changed PHP files (via `$PHP vendor/bin/pint`).
- PHP 8.3+ idioms, typed closures/params, `fake()` inside factories.
- Migrations use bigint custom PKs and follow the naming `create_<table>_table.php`; when altering a column include all prior attributes.
- Keep Indonesian domain terminology in model/table names and UI.

## graphify

This project has a knowledge graph at graphify-out/ with god nodes, community structure, and cross-file relationships.

When the user types `/graphify`, use the installed graphify skill or instructions before doing anything else.

Rules:
- For codebase questions, first run `graphify query "<question>"` when graphify-out/graph.json exists. Use `graphify path "<A>" "<B>"` for relationships and `graphify explain "<concept>"` for focused concepts. These return a scoped subgraph, usually much smaller than GRAPH_REPORT.md or raw grep output.
- Dirty graphify-out/ files are expected after hooks or incremental updates; dirty graph files are not a reason to skip graphify. Only skip graphify if the task is about stale or incorrect graph output, or the user explicitly says not to use it.
- If graphify-out/wiki/index.md exists, use it for broad navigation instead of raw source browsing.
- Read graphify-out/GRAPH_REPORT.md only for broad architecture review or when query/path/explain do not surface enough context.
- After modifying code, run `graphify update .` to keep the graph current (AST-only, no API cost).
