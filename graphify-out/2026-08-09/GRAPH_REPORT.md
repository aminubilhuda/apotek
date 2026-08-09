# Graph Report - apotek  (2026-08-09)

## Corpus Check
- 164 files · ~77,052 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 5382 nodes · 16925 edges · 151 communities (136 shown, 15 thin omitted)
- Extraction: 88% EXTRACTED · 12% INFERRED · 0% AMBIGUOUS · INFERRED: 2055 edges (avg confidence: 0.72)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `dcf7254e`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- code-editor.js
- rich-editor.js
- components/chart.js
- update
- resolve
- stat/chart.js
- a
- ab
- components/select.js
- H
- i
- columns/select.js
- W
- _update
- draw
- fromObject
- facet
- file-upload.js
- constructor
- get
- tables.js
- slice
- _update
- constructor
- T
- y
- advance
- markdown-editor.js
- .slice
- p
- updateElements
- User
- support.js
- fn
- .forEach
- t
- sort
- notifications.js
- draw
- Obat
- te
- Hi
- qt
- updateElements
- Filament v4
- slider.js
- Filament\Resources\Pages\CreateRecord
- forward
- buildTicks
- ee
- reduce
- Filament\Tables\Table
- it
- parse
- copy
- qt
- getDatasetMeta
- eq
- u
- _a
- add
- hd
- StatsOverview.php
- echo.js
- ng
- qe
- fn
- vi
- Illuminate\Database\Eloquent\Model
- MetodePembayaranChart
- addProseMirrorPlugins
- a
- inRange
- sync
- Filament\Resources\Pages\ListRecords
- TransaksiPenjualanResource
- find
- devDependencies
- filament/app.js
- post-autoload-dump
- TransaksiTerbaruWidget.php
- r
- isHorizontal
- composer.json
- t
- scripts
- require-dev
- schemas.js
- setup
- static
- extra
- config
- actions/actions.js
- components/actions.js
- AppServiceProvider
- AdminPanelProvider.php
- psr-4
- require
- CreateTransaksiPenjualanTable
- n
- post-create-project-cmd
- Illuminate\Database\Migrations\Migration
- CreateDokterTable
- CreateResepTable
- CreateDetailResepTable
- CreateDetailTransaksiTable
- Illuminate\Database\Seeder
- ExampleTest
- AGENTS.md
- Crawl-All Robots Policy
- Laravel Prompts
- ManagePengaturans.php
- opencode.json
- graphify.js

## God Nodes (most connected - your core abstractions)
1. `n()` - 238 edges
2. `t()` - 154 edges
3. `update()` - 140 edges
4. `i()` - 137 edges
5. `constructor()` - 128 edges
6. `a()` - 94 edges
7. `u()` - 94 edges
8. `resolve()` - 92 edges
9. `y()` - 88 edges
10. `_update()` - 87 edges

## Surprising Connections (you probably didn't know these)
- `Eloquent ORM` --semantically_similar_to--> `Eloquent ORM`  [INFERRED] [semantically similar]
  .github/copilot-instructions.md → README.md
- `Ue()` --indirect_call--> `n()`  [INFERRED]
  public/js/filament/filament/echo.js → public/js/filament/forms/components/date-time-picker.js
- `getExtension()` --indirect_call--> `Ht()`  [INFERRED]
  public/js/filament/forms/components/file-upload.js → public/js/filament/filament/echo.js
- `constructor()` --indirect_call--> `i()`  [INFERRED]
  public/js/filament/forms/components/color-picker.js → public/js/filament/forms/components/date-time-picker.js
- `_freeze()` --indirect_call--> `t()`  [INFERRED]
  public/js/filament/forms/components/file-upload.js → public/js/filament/forms/components/date-time-picker.js

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **Filament Core Feature Set** — _github_copilot_instructions_filament, _github_copilot_instructions_filament_panels, _github_copilot_instructions_filament_schemas, _github_copilot_instructions_filament_forms, _github_copilot_instructions_filament_tables, _github_copilot_instructions_filament_actions, _github_copilot_instructions_filament_widgets, _github_copilot_instructions_filament_infolists, _github_copilot_instructions_filament_notifications, _github_copilot_instructions_filament_resources [EXTRACTED 1.00]
- **Laravel Boost Developer Toolset** — _github_copilot_instructions_boost_mcp_server, _github_copilot_instructions_search_docs_tool, _github_copilot_instructions_artisan_cli, _github_copilot_instructions_tinker_tool, _github_copilot_instructions_database_query_tool, _github_copilot_instructions_browser_logs_tool, _github_copilot_instructions_get_absolute_url_tool [EXTRACTED 1.00]
- **Laravel 12 Application Ecosystem Stack** — _github_copilot_instructions_laravel_framework, _github_copilot_instructions_filament, _github_copilot_instructions_livewire, _github_copilot_instructions_alpine_js, _github_copilot_instructions_laravel_sail, _github_copilot_instructions_laravel_pint, _github_copilot_instructions_phpunit, _github_copilot_instructions_vite_bundler [EXTRACTED 1.00]

## Communities (151 total, 15 thin omitted)

### Community 0 - "code-editor.js"
Cohesion: 0.01
Nodes (90): aa(), Ai(), aT(), [b.Blockquote](), [b.ListItem](), ba(), Blockquote(), bP() (+82 more)

### Community 1 - "rich-editor.js"
Cohesion: 0.01
Nodes (126): addExtensions(), addHackNode(), addTextblockHacks(), allowsMarks(), am(), ba(), Bc(), bg() (+118 more)

### Community 2 - "components/chart.js"
Cohesion: 0.01
Nodes (103): addControllers(), addPlugins(), addScales(), Bh(), bl(), calculateCircumference(), _circumference(), co() (+95 more)

### Community 3 - "update"
Cohesion: 0.03
Nodes (140): add(), addChunk(), addEventListener(), addInfoPane(), addInner(), addWindowListeners(), adjust(), annotation() (+132 more)

### Community 4 - "resolve"
Cohesion: 0.06
Nodes (121): addCommands(), addKeyboardShortcuts(), Ae(), after(), before(), Bf(), blockRange(), bp() (+113 more)

### Community 5 - "stat/chart.js"
Cohesion: 0.02
Nodes (114): addControllers(), addEventListener(), addPlugins(), addScales(), al(), as(), bindResponsiveEvents(), bl() (+106 more)

### Community 6 - "a"
Cohesion: 0.04
Nodes (79): addElement(), applyChanges(), au(), balanced(), baseIndent(), baseIndentFor(), Bh(), blank() (+71 more)

### Community 7 - "ab"
Cohesion: 0.09
Nodes (39): Ko(), Nl(), Ol(), Yo(), al(), bo(), co(), Dn() (+31 more)

### Community 8 - "components/select.js"
Cohesion: 0.06
Nodes (90): constructor(), [g](), style(), update(), [x](), addBadgesForSelectedOptions(), addSingleBadge(), addSingleSelectionDisplay() (+82 more)

### Community 9 - "H"
Cohesion: 0.04
Nodes (69): add(), ai(), apply(), cf(), ch(), ci(), _computeLabelSizes(), createResolver() (+61 more)

### Community 10 - "i"
Cohesion: 0.04
Nodes (82): aQ(), B(), boundChange(), commit(), compare(), comparePoint(), compareRange(), compositionend() (+74 more)

### Community 11 - "columns/select.js"
Cohesion: 0.07
Nodes (90): A(), addBadgesForSelectedOptions(), addSingleBadge(), addSingleSelectionDisplay(), Ae(), applyDisabledState(), At(), B() (+82 more)

### Community 12 - "W"
Cohesion: 0.05
Nodes (87): a$(), A1(), Ac(), addCompletion(), addCompletions(), addNamespace(), addNamespaceObject(), ag() (+79 more)

### Community 13 - "_update"
Cohesion: 0.03
Nodes (107): aa(), addElements(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterDatasetsUpdate(), afterDraw(), afterFit() (+99 more)

### Community 14 - "draw"
Cohesion: 0.05
Nodes (87): acquireContext(), adjustHitBoxes(), bn(), bs(), bt(), bu(), calculateLabelRotation(), _calculatePadding() (+79 more)

### Community 15 - "fromObject"
Cohesion: 0.03
Nodes (106): abutsStart(), after(), al(), Am(), Ao(), as(), before(), bm() (+98 more)

### Community 16 - "facet"
Cohesion: 0.04
Nodes (69): accept(), active(), applyTransaction(), asSingle(), ay(), between(), blur(), Br() (+61 more)

### Community 17 - "file-upload.js"
Cohesion: 0.05
Nodes (58): be(), bi(), c(), clickPercent(), constructor(), de(), e(), em() (+50 more)

### Community 18 - "constructor"
Cohesion: 0.03
Nodes (92): ac(), ag(), ah(), bg(), Bo(), $c(), _cachedScopes(), cc() (+84 more)

### Community 19 - "get"
Cohesion: 0.04
Nodes (73): addRange(), after(), AP(), before(), Cf(), clear(), clearDelayedAndroidKey(), coordsAt() (+65 more)

### Community 20 - "tables.js"
Cohesion: 0.09
Nodes (64): ae(), areRecordsSelected(), areRecordsToggleable(), B(), be(), C(), canSelectAllRecords(), Ce() (+56 more)

### Community 21 - "slice"
Cohesion: 0.05
Nodes (70): ad(), addDelimiter(), addToSet(), af(), ao(), append(), Ar(), b0() (+62 more)

### Community 22 - "_update"
Cohesion: 0.05
Nodes (72): addElements(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterDraw(), afterFit(), afterSetDimensions(), afterTickToLabelConversion() (+64 more)

### Community 23 - "constructor"
Cohesion: 0.03
Nodes (100): Aa(), ad(), add(), bm(), by(), cd(), cg(), connectSelection() (+92 more)

### Community 24 - "T"
Cohesion: 0.05
Nodes (60): _a(), aa(), ae(), alpha(), apply(), ba(), Bt(), ca() (+52 more)

### Community 25 - "y"
Cohesion: 0.16
Nodes (68): w(), kd(), $r(), v(), at(), b(), Be(), $c() (+60 more)

### Community 26 - "advance"
Cohesion: 0.05
Nodes (60): activeForPoint(), addBlock(), addBlockWidget(), addChild(), addGaps(), addLeafElement(), addLineDeco(), addNode() (+52 more)

### Community 27 - "markdown-editor.js"
Cohesion: 0.05
Nodes (86): Ac(), af(), ai(), ao(), Ba(), bc(), bl(), Bt() (+78 more)

### Community 28 - ".slice"
Cohesion: 0.05
Nodes (88): accepts(), addMaps(), addStep(), addTransform(), An(), ap(), appendMap(), appendMapping() (+80 more)

### Community 29 - "p"
Cohesion: 0.07
Nodes (42): p(), acquireContext(), bh(), calculateLabelRotation(), _computeGridLineItems(), Ct(), Dr(), drawBorder() (+34 more)

### Community 30 - "updateElements"
Cohesion: 0.03
Nodes (105): addBox(), addEventListener(), applyStack(), ar(), aspectRatio(), At(), au(), buildOrUpdateScales() (+97 more)

### Community 31 - "User"
Cohesion: 0.05
Nodes (18): DoktersTable, ObatsTable, PelanggansTable, PembeliansTable, ResepsTable, SuppliersTable, TransaksiPenjualansTable, TransaksiPenjualan (+10 more)

### Community 32 - "support.js"
Cohesion: 0.06
Nodes (47): apply(), as(), At(), B(), bo(), close(), closeQuietly(), co() (+39 more)

### Community 33 - "fn"
Cohesion: 0.08
Nodes (53): themeClasses(), Ah(), atEnd(), atStart(), Bh(), bi(), bw(), ci() (+45 more)

### Community 34 - ".forEach"
Cohesion: 0.04
Nodes (73): addAttributes(), addInner(), addNodeView(), addOptions(), Bs(), $c(), c0(), chain() (+65 more)

### Community 35 - "t"
Cohesion: 0.08
Nodes (32): Fu(), Iu(), node(), XT(), e(), f(), o(), r() (+24 more)

### Community 36 - "sort"
Cohesion: 0.15
Nodes (14): bT(), build(), defineModifier(), hasResult(), Ig(), jl(), kQ(), normalized() (+6 more)

### Community 37 - "notifications.js"
Cohesion: 0.05
Nodes (28): actions(), button(), close(), configureAnimations(), configureTransitions(), constructor(), danger(), dispatch() (+20 more)

### Community 38 - "draw"
Cohesion: 0.08
Nodes (47): gu(), adjustHitBoxes(), At(), beforeDatasetDraw(), beforeDatasetsDraw(), beforeDraw(), bi(), clear() (+39 more)

### Community 39 - "Obat"
Cohesion: 0.09
Nodes (8): TopObatChart, DetailPembelian, DetailTransaksi, KartuStok, Obat, DetailPembelianObserver, DetailTransaksiObserver, Filament\Widgets\BarChartWidget

### Community 40 - "te"
Cohesion: 0.04
Nodes (12): Wd(), Bn(), br(), Id(), ji(), qd(), qi(), Ri() (+4 more)

### Community 41 - "Hi"
Cohesion: 0.10
Nodes (33): _a(), addAll(), addDOM(), addElement(), addElementByRule(), addTextNode(), addToSet(), allowedMarks() (+25 more)

### Community 42 - "qt"
Cohesion: 0.06
Nodes (44): alpha(), Bc(), color(), cs(), darken(), desaturate(), explainFromTokens(), Fc() (+36 more)

### Community 43 - "updateElements"
Cohesion: 0.07
Nodes (51): afterAutoSkip(), Ar(), buildLookupTable(), _calculateBarIndexPixels(), _calculateBarValuePixels(), cc(), countVisibleElements(), _createItems() (+43 more)

### Community 44 - "Filament v4"
Cohesion: 0.05
Nodes (46): Alpine.js, Artisan CLI, Laravel Boost MCP Server, bootstrap/app.php, browser-logs Tool, database-query Tool, Eloquent ORM, Filament v4 (+38 more)

### Community 45 - "slider.js"
Cohesion: 0.09
Nodes (39): Ae(), ar(), Be(), Bt(), De(), _e(), Ee(), er() (+31 more)

### Community 46 - "Filament\Resources\Pages\CreateRecord"
Cohesion: 0.07
Nodes (16): CreateDokter, EditDokter, CreateObat, EditObat, CreatePelanggan, EditPelanggan, CreatePembelian, EditPembelian (+8 more)

### Community 47 - "forward"
Cohesion: 0.09
Nodes (30): addActive(), addChanges(), be(), Bn(), co(), compose(), composeDesc(), createSet() (+22 more)

### Community 48 - "buildTicks"
Cohesion: 0.08
Nodes (34): af(), afterAutoSkip(), Bf(), bi(), buildLookupTable(), buildTicks(), cn(), _generate() (+26 more)

### Community 49 - "ee"
Cohesion: 0.07
Nodes (37): an(), average(), beforeDatasetsDraw(), beforeDraw(), dataset(), dh(), ee(), fn() (+29 more)

### Community 50 - "reduce"
Cohesion: 0.07
Nodes (48): addActions(), advanceFully(), advanceStack(), allActions(), canShift(), close(), deadEnd(), dynamicPrecedence() (+40 more)

### Community 51 - "Filament\Tables\Table"
Cohesion: 0.05
Nodes (22): DokterResource, DokterForm, KartuStokResource, ObatResource, KartuStokRelationManager, ObatForm, PelangganResource, PelangganForm (+14 more)

### Community 52 - "it"
Cohesion: 0.12
Nodes (31): Ht(), define(), _getTestState(), ad(), An(), cd(), dr(), dt() (+23 more)

### Community 53 - "parse"
Cohesion: 0.08
Nodes (44): an(), buildOrUpdateScales(), ch(), D(), determineDataLimits(), dh(), diff(), endOf() (+36 more)

### Community 54 - "copy"
Cohesion: 0.05
Nodes (86): addNodeMark(), append(), at(), Bn(), Bt(), Ca(), canAppend(), canReplace() (+78 more)

### Community 55 - "qt"
Cohesion: 0.18
Nodes (26): ae(), cr(), de(), dt(), Ee(), fr(), Ge(), Gt() (+18 more)

### Community 56 - "getDatasetMeta"
Cohesion: 0.07
Nodes (38): afterDatasetsUpdate(), Ao(), applyStack(), bc(), beforeLayout(), fc(), gc(), generateLabels() (+30 more)

### Community 57 - "eq"
Cohesion: 0.13
Nodes (25): addNode(), destroyBetween(), destroyRest(), eq(), findIndexWithChild(), findNodeMatch(), inParent(), isLocked() (+17 more)

### Community 58 - "u"
Cohesion: 0.21
Nodes (27): u(), ai(), ar(), c(), Cn(), d(), E(), f() (+19 more)

### Community 59 - "_a"
Cohesion: 0.17
Nodes (31): _a(), aa(), ba(), br(), Bt(), ct(), Da(), ei() (+23 more)

### Community 60 - "add"
Cohesion: 0.08
Nodes (34): active(), add(), _animateOptions(), _cachedScopes(), cancel(), ci(), _createAnimations(), _createDescriptors() (+26 more)

### Community 61 - "hd"
Cohesion: 0.09
Nodes (26): $a(), ad(), bd(), beforeLayout(), cd(), data(), Fa(), first() (+18 more)

### Community 62 - "StatsOverview.php"
Cohesion: 0.15
Nodes (6): PenjualanPembelianChart, StatsOverview, Pembelian, Filament\Widgets\LineChartWidget, Filament\Widgets\StatsOverviewWidget, Illuminate\Support\Carbon

### Community 63 - "echo.js"
Cohesion: 0.09
Nodes (13): ar(), b(), cr(), g(), Me(), P(), Pr(), qt() (+5 more)

### Community 64 - "ng"
Cohesion: 0.09
Nodes (33): acceptToken(), allows(), bc(), c$(), Cc(), CQ(), De(), ey() (+25 more)

### Community 65 - "qe"
Cohesion: 0.27
Nodes (10): gs(), hs(), kn(), Mo(), ms(), qe(), St(), Tr() (+2 more)

### Community 66 - "fn"
Cohesion: 0.15
Nodes (27): ca(), Dn(), En(), fn(), Gi(), h(), ia(), Ii() (+19 more)

### Community 67 - "vi"
Cohesion: 0.09
Nodes (26): active(), _animateOptions(), cancel(), _createAnimations(), _createDescriptors(), _d(), Dd(), _descriptors() (+18 more)

### Community 68 - "Illuminate\Database\Eloquent\Model"
Cohesion: 0.08
Nodes (13): RegisterStudent, Controller, NotaController, DetailResep, Dokter, Pelanggan, Pengaturan, Resep (+5 more)

### Community 69 - "MetodePembayaranChart"
Cohesion: 0.28
Nodes (3): MetodePembayaranChart, StokPerKategoriChart, Filament\Widgets\DoughnutChartWidget

### Community 70 - "addProseMirrorPlugins"
Cohesion: 0.03
Nodes (111): Image(), Wb(), addInputRules(), addMark(), addPasteRules(), addProseMirrorPlugins(), addStoredMark(), ao() (+103 more)

### Community 71 - "a"
Cohesion: 0.25
Nodes (8): a(), at(), d(), f(), H(), ji(), L(), pt()

### Community 72 - "inRange"
Cohesion: 0.06
Nodes (52): ac(), average(), cs(), dataset(), En(), Es(), first(), getBasePosition() (+44 more)

### Community 73 - "sync"
Cohesion: 0.39
Nodes (8): canReuseDOM(), createDOM(), kf(), reuseDOM(), setAttrs(), setDOM(), sync(), syncDOM()

### Community 74 - "Filament\Resources\Pages\ListRecords"
Cohesion: 0.10
Nodes (9): ListDokters, ListKartuStoks, ListObats, ListPelanggans, ListPembelians, ListReseps, ListSuppliers, ListTransaksiPenjualans (+1 more)

### Community 76 - "find"
Cohesion: 0.05
Nodes (57): addSelection(), Ah(), attrs(), bidiSpans(), Bl(), bO(), checkHover(), configure() (+49 more)

### Community 77 - "devDependencies"
Cohesion: 0.10
Nodes (19): axios, concurrently, laravel-vite-plugin, devDependencies, axios, concurrently, laravel-vite-plugin, tailwindcss (+11 more)

### Community 78 - "filament/app.js"
Cohesion: 0.14
Nodes (10): B(), C(), close(), init(), P(), R(), setUpResizeObserver(), V() (+2 more)

### Community 79 - "post-autoload-dump"
Cohesion: 0.50
Nodes (4): post-autoload-dump, Illuminate\\Foundation\\ComposerScripts::postAutoloadDump, @php artisan filament:upgrade, @php artisan package:discover --ansi

### Community 83 - "r"
Cohesion: 0.16
Nodes (16): Be(), Dt(), ei(), Fe(), He(), i(), ir(), le() (+8 more)

### Community 84 - "isHorizontal"
Cohesion: 0.08
Nodes (38): buildTicks(), calculateCircumference(), _calculatePadding(), _circumference(), _computeAngle(), _computeLabelItems(), _computeLabelSizes(), computeTickLimit() (+30 more)

### Community 85 - "composer.json"
Cohesion: 0.14
Nodes (13): autoload-dev, psr-4, description, keywords, license, minimum-stability, name, prefer-stable (+5 more)

### Community 86 - "t"
Cohesion: 0.18
Nodes (12): Ce(), De(), di(), e(), Ie(), ii(), oi(), Re() (+4 more)

### Community 87 - "scripts"
Cohesion: 0.18
Nodes (11): scripts, dev, post-update-cmd, pre-package-uninstall, test, Composer\\Config::disableProcessTimeout, Illuminate\\Foundation\\ComposerScripts::prePackageUninstall, npx concurrently -c \"#93c5fd,#c4b5fd,#fb7185,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1\" \"php artisan pail --timeout=0\" \"npm run dev\" --names=server,queue,logs,vite --kill-others (+3 more)

### Community 88 - "require-dev"
Cohesion: 0.22
Nodes (9): require-dev, fakerphp/faker, laravel/boost, laravel/pail, laravel/pint, laravel/sail, mockery/mockery, nunomaduro/collision (+1 more)

### Community 90 - "setup"
Cohesion: 0.25
Nodes (8): post-root-package-install, setup, composer install, npm install, npm run build, @php artisan key:generate, @php artisan migrate --force, @php -r \"file_exists('.env') || copy('.env.example', '.env');\

### Community 92 - "static"
Cohesion: 0.28
Nodes (4): bootScopedByUser(), UserFactory, Illuminate\Database\Eloquent\Factories\Factory, static

### Community 93 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 94 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 96 - "actions/actions.js"
Cohesion: 0.73
Nodes (5): closeModal(), generateModalId(), init(), openModal(), syncActionModals()

### Community 99 - "AdminPanelProvider.php"
Cohesion: 0.60
Nodes (3): AdminPanelProvider, Filament\Panel, Filament\PanelProvider

### Community 100 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 101 - "require"
Cohesion: 0.40
Nodes (5): require, filament/filament, laravel/framework, laravel/tinker, php

### Community 103 - "n"
Cohesion: 0.08
Nodes (67): addTree(), n(), _a(), Ae(), ar(), as(), bf(), ci() (+59 more)

### Community 104 - "post-create-project-cmd"
Cohesion: 0.50
Nodes (4): post-create-project-cmd, @php artisan key:generate --ansi, @php artisan migrate --graceful --ansi, @php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\

### Community 105 - "Illuminate\Database\Migrations\Migration"
Cohesion: 0.28
Nodes (3): CreatePelangganTable, CreatePembelianTable, Illuminate\Database\Migrations\Migration

### Community 110 - "Illuminate\Database\Seeder"
Cohesion: 0.20
Nodes (6): DatabaseSeeder, DokterSeeder, ObatSeeder, PengaturanSeeder, Illuminate\Database\Console\Seeds\WithoutModelEvents, Illuminate\Database\Seeder

### Community 112 - "AGENTS.md"
Cohesion: 0.25
Nodes (6): Architecture notes, Conventions, Critical: PHP environment, graphify, Setup & commands, Testing

### Community 148 - "opencode.json"
Cohesion: 0.50
Nodes (3): plugin, $schema, .opencode/plugins/graphify.js

## Knowledge Gaps
- **100 isolated node(s):** `$schema`, `.opencode/plugins/graphify.js`, `$schema`, `name`, `type` (+95 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **15 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `n()` connect `n` to `code-editor.js`, `rich-editor.js`, `components/chart.js`, `update`, `resolve`, `stat/chart.js`, `a`, `ab`, `components/select.js`, `H`, `i`, `columns/select.js`, `W`, `_update`, `draw`, `fromObject`, `facet`, `file-upload.js`, `constructor`, `get`, `tables.js`, `slice`, `_update`, `constructor`, `T`, `y`, `advance`, `markdown-editor.js`, `.slice`, `p`, `updateElements`, `support.js`, `.forEach`, `t`, `draw`, `te`, `qt`, `forward`, `ee`, `it`, `parse`, `copy`, `getDatasetMeta`, `u`, `_a`, `add`, `hd`, `echo.js`, `ng`, `fn`, `vi`, `addProseMirrorPlugins`, `inRange`, `sync`, `find`, `r`, `isHorizontal`, `t`?**
  _High betweenness centrality (0.101) - this node is a cross-community bridge._
- **Why does `Zi()` connect `draw` to `T`, `rich-editor.js`, `stat/chart.js`, `slice`?**
  _High betweenness centrality (0.040) - this node is a cross-community bridge._
- **Why does `u()` connect `u` to `code-editor.js`, `update`, `resolve`, `a`, `H`, `i`, `W`, `draw`, `fromObject`, `facet`, `constructor`, `tables.js`, `_update`, `T`, `y`, `advance`, `markdown-editor.js`, `.slice`, `p`, `updateElements`, `support.js`, `fn`, `.forEach`, `t`, `draw`, `updateElements`, `slider.js`, `forward`, `buildTicks`, `ee`, `reduce`, `parse`, `copy`, `qt`, `_a`, `hd`, `fn`, `vi`, `addProseMirrorPlugins`, `inRange`, `find`, `filament/app.js`, `isHorizontal`, `t`, `n`?**
  _High betweenness centrality (0.032) - this node is a cross-community bridge._
- **Are the 237 inferred relationships involving `n()` (e.g. with `cr()` and `He()`) actually correct?**
  _`n()` has 237 INFERRED edges - model-reasoned connections that need verification._
- **Are the 153 inferred relationships involving `t()` (e.g. with `code-editor.js` and `add()`) actually correct?**
  _`t()` has 153 INFERRED edges - model-reasoned connections that need verification._
- **Are the 24 inferred relationships involving `update()` (e.g. with `gT()` and `Pr()`) actually correct?**
  _`update()` has 24 INFERRED edges - model-reasoned connections that need verification._
- **Are the 134 inferred relationships involving `i()` (e.g. with `code-editor.js` and `add()`) actually correct?**
  _`i()` has 134 INFERRED edges - model-reasoned connections that need verification._