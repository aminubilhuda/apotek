# Graph Report - apotek  (2026-08-09)

## Corpus Check
- 166 files · ~77,133 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 5387 nodes · 16932 edges · 163 communities (151 shown, 12 thin omitted)
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
- lineAt
- ab
- components/select.js
- constructor
- of
- columns/select.js
- W
- _update
- draw
- get
- facet
- file-upload.js
- create
- get
- tables.js
- slice
- _update
- constructor
- T
- t
- advance
- markdown-editor.js
- .slice
- e
- updateElements
- Filament\Tables\Table
- support.js
- fn
- .forEach
- n
- sort
- notifications.js
- draw
- Obat
- te
- addElementByRule
- qt
- updateElements
- Filament v4
- slider.js
- Filament\Resources\Pages\CreateRecord
- i
- parse
- ee
- reduce
- Filament\Schemas\Schema
- kt
- parse
- child
- qt
- getDatasetMeta
- B
- u
- Cn
- add
- create
- StatsOverview.php
- echo.js
- ng
- match
- fn
- vi
- Illuminate\Database\Eloquent\Model
- MetodePembayaranChart
- create
- a
- inRange
- r
- Filament\Resources\Pages\ListRecords
- TransaksiPenjualanResource.php
- mP
- devDependencies
- filament/app.js
- post-autoload-dump
- getSortedVisibleDatasetMetas
- wc
- PelangganResource.php
- r
- buildTicks
- composer.json
- t
- scripts
- require-dev
- schemas.js
- setup
- color-picker.js
- static
- _notify
- config
- actions/actions.js
- components/actions.js
- AppServiceProvider
- AdminPanelProvider.php
- psr-4
- require
- CreateTransaksiPenjualanTable
- le
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
- BackedEnum
- opencode.json
- Up
- graphify.js
- _p
- bo
- vl
- lt
- getLabelAndValue
- c
- clickPercent
- autoload-dev

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

## Communities (163 total, 12 thin omitted)

### Community 0 - "code-editor.js"
Cohesion: 0.01
Nodes (92): aa(), Ai(), aT(), [b.Blockquote](), [b.ListItem](), ba(), Blockquote(), bP() (+84 more)

### Community 1 - "rich-editor.js"
Cohesion: 0.01
Nodes (169): ad(), addAttributes(), addExtensions(), addHackNode(), addTextblockHacks(), am(), Bc(), by() (+161 more)

### Community 2 - "components/chart.js"
Cohesion: 0.01
Nodes (125): om(), abutsStart(), addControllers(), addPlugins(), addScales(), afterDraw(), beforeLayout(), Bh() (+117 more)

### Community 3 - "update"
Cohesion: 0.03
Nodes (146): add(), addChunk(), addEventListener(), addInfoPane(), addInner(), addWindowListeners(), adjust(), annotation() (+138 more)

### Community 4 - "resolve"
Cohesion: 0.06
Nodes (107): Image(), addKeyboardShortcuts(), Ae(), after(), before(), Bf(), blockRange(), bp() (+99 more)

### Community 5 - "stat/chart.js"
Cohesion: 0.02
Nodes (96): addControllers(), addEventListener(), addPlugins(), addScales(), al(), as(), bindEvents(), bindResponsiveEvents() (+88 more)

### Community 6 - "lineAt"
Cohesion: 0.06
Nodes (48): addBlock(), addLineDeco(), applyChanges(), au(), balanced(), baseIndent(), baseIndentFor(), blank() (+40 more)

### Community 7 - "ab"
Cohesion: 0.14
Nodes (25): attrs(), El(), Ko(), Nl(), Ol(), Yo(), Tl(), Do() (+17 more)

### Community 8 - "components/select.js"
Cohesion: 0.07
Nodes (86): [g](), [x](), addBadgesForSelectedOptions(), addSingleBadge(), addSingleSelectionDisplay(), Ae(), applyDisabledState(), At() (+78 more)

### Community 9 - "constructor"
Cohesion: 0.03
Nodes (91): $a(), ad(), add(), af(), apply(), bd(), bg(), cd() (+83 more)

### Community 10 - "of"
Cohesion: 0.05
Nodes (53): checkHover(), combine(), compositionend(), continue(), cu(), dispatch(), Dn(), DQ() (+45 more)

### Community 11 - "columns/select.js"
Cohesion: 0.07
Nodes (89): addBadgesForSelectedOptions(), addSingleBadge(), addSingleSelectionDisplay(), Ae(), applyDisabledState(), At(), B(), be() (+81 more)

### Community 12 - "W"
Cohesion: 0.05
Nodes (89): a$(), A1(), Ac(), addCompletion(), addCompletions(), addNamespace(), addNamespaceObject(), ag() (+81 more)

### Community 13 - "_update"
Cohesion: 0.03
Nodes (109): aa(), addBox(), addElements(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterDatasetsUpdate(), afterFit() (+101 more)

### Community 14 - "draw"
Cohesion: 0.04
Nodes (107): acquireContext(), adjustHitBoxes(), ai(), Bf(), bn(), bs(), bt(), bu() (+99 more)

### Community 15 - "get"
Cohesion: 0.04
Nodes (94): after(), ag(), al(), Am(), Ao(), as(), before(), _cachedScopes() (+86 more)

### Community 16 - "facet"
Cohesion: 0.04
Nodes (88): accept(), active(), ad(), addElement(), ao(), ay(), b0(), between() (+80 more)

### Community 17 - "file-upload.js"
Cohesion: 0.08
Nodes (13): constructor(), _freeze(), getExtension(), getType(), im(), registerListeners(), Zp(), qd() (+5 more)

### Community 18 - "create"
Cohesion: 0.03
Nodes (84): ac(), ah(), cc(), clone(), Cm(), create(), dtFormatter(), ec() (+76 more)

### Community 19 - "get"
Cohesion: 0.05
Nodes (65): addRange(), after(), AP(), before(), Cf(), clear(), coordsAt(), covers() (+57 more)

### Community 20 - "tables.js"
Cohesion: 0.09
Nodes (63): ae(), areRecordsSelected(), areRecordsToggleable(), B(), be(), C(), canSelectAllRecords(), Ce() (+55 more)

### Community 21 - "slice"
Cohesion: 0.05
Nodes (67): addDelimiter(), addToSet(), af(), append(), apply(), Ar(), become(), bQ() (+59 more)

### Community 22 - "_update"
Cohesion: 0.05
Nodes (70): addElements(), afterBuildTicks(), afterCalculateLabelRotation(), afterDataLimits(), afterDraw(), afterFit(), afterSetDimensions(), afterTickToLabelConversion() (+62 more)

### Community 23 - "constructor"
Cohesion: 0.04
Nodes (73): Aa(), addNode(), append(), constructor(), createCommandManager(), createDoc(), createSchema(), createView() (+65 more)

### Community 24 - "T"
Cohesion: 0.07
Nodes (42): ph(), ae(), apply(), ba(), Bt(), Ce(), constructor(), createResolver() (+34 more)

### Community 25 - "t"
Cohesion: 0.12
Nodes (86): Ht(), w(), Fu(), Iu(), kd(), node(), $r(), XT() (+78 more)

### Community 26 - "advance"
Cohesion: 0.06
Nodes (56): activeForPoint(), addBlockWidget(), addChild(), addGaps(), addLeafElement(), addNode(), advance(), ATXHeading() (+48 more)

### Community 27 - "markdown-editor.js"
Cohesion: 0.04
Nodes (189): _a(), Ac(), Ae(), af(), ai(), al(), An(), ao() (+181 more)

### Community 28 - ".slice"
Cohesion: 0.05
Nodes (59): accepts(), addInner(), addMaps(), addStep(), addTransform(), appendMap(), appendMapping(), appendMappingInverted() (+51 more)

### Community 29 - "e"
Cohesion: 0.08
Nodes (56): add(), addCommands(), addNodeView(), addProseMirrorPlugins(), An(), ax(), bm(), cb() (+48 more)

### Community 30 - "updateElements"
Cohesion: 0.06
Nodes (58): addEventListener(), applyStack(), aspectRatio(), au(), bindResponsiveEvents(), _calculateBarIndexPixels(), _calculateBarValuePixels(), countVisibleElements() (+50 more)

### Community 31 - "Filament\Tables\Table"
Cohesion: 0.06
Nodes (21): DoktersTable, ObatsTable, PelanggansTable, PembeliansTable, ResepsTable, SuppliersTable, TransaksiPenjualansTable, TransaksiTerbaruWidget (+13 more)

### Community 32 - "support.js"
Cohesion: 0.07
Nodes (27): bo(), close(), closeQuietly(), co(), ft(), Ga(), gs(), hs() (+19 more)

### Community 33 - "fn"
Cohesion: 0.08
Nodes (53): themeClasses(), Ah(), atEnd(), atStart(), Bh(), bi(), bw(), ci() (+45 more)

### Community 34 - ".forEach"
Cohesion: 0.06
Nodes (55): addOptions(), addPasteRules(), c0(), chain(), children(), compile(), d0(), Db() (+47 more)

### Community 35 - "n"
Cohesion: 0.11
Nodes (19): addTree(), e(), n(), o(), r(), s(), Aa(), Bi() (+11 more)

### Community 36 - "sort"
Cohesion: 0.15
Nodes (14): bT(), build(), defineModifier(), hasResult(), Ig(), jl(), kQ(), normalized() (+6 more)

### Community 37 - "notifications.js"
Cohesion: 0.05
Nodes (28): actions(), button(), close(), configureAnimations(), configureTransitions(), constructor(), danger(), dispatch() (+20 more)

### Community 38 - "draw"
Cohesion: 0.06
Nodes (72): acquireContext(), adjustHitBoxes(), At(), bi(), calculateLabelRotation(), clear(), _computeGridLineItems(), _computeLabelArea() (+64 more)

### Community 39 - "Obat"
Cohesion: 0.08
Nodes (9): TopObatChart, DetailPembelian, DetailTransaksi, KartuStok, Obat, DetailPembelianObserver, DetailTransaksiObserver, ObatSeeder (+1 more)

### Community 40 - "te"
Cohesion: 0.05
Nodes (8): Wd(), br(), Id(), ji(), qi(), Ri(), te(), Vi()

### Community 41 - "addElementByRule"
Cohesion: 0.11
Nodes (30): _a(), addAll(), addDOM(), addElement(), addElementByRule(), addTextNode(), addToSet(), allowsMarkType() (+22 more)

### Community 42 - "qt"
Cohesion: 0.07
Nodes (40): alpha(), Bc(), Bo(), cs(), darken(), desaturate(), explainFromTokens(), Fc() (+32 more)

### Community 43 - "updateElements"
Cohesion: 0.08
Nodes (40): afterAutoSkip(), Ao(), applyStack(), buildLookupTable(), _calculateBarIndexPixels(), _calculateBarValuePixels(), cc(), countVisibleElements() (+32 more)

### Community 44 - "Filament v4"
Cohesion: 0.05
Nodes (46): Alpine.js, Artisan CLI, Laravel Boost MCP Server, bootstrap/app.php, browser-logs Tool, database-query Tool, Eloquent ORM, Filament v4 (+38 more)

### Community 45 - "slider.js"
Cohesion: 0.09
Nodes (38): Ae(), ar(), Be(), Bt(), De(), _e(), Ee(), er() (+30 more)

### Community 46 - "Filament\Resources\Pages\CreateRecord"
Cohesion: 0.09
Nodes (12): CreateDokter, EditDokter, ObatResource, CreateObat, EditObat, CreatePembelian, CreateResep, EditResep (+4 more)

### Community 47 - "i"
Cohesion: 0.06
Nodes (54): addActive(), aQ(), atLastNode(), be(), boundChange(), commit(), compare(), comparePoint() (+46 more)

### Community 48 - "parse"
Cohesion: 0.05
Nodes (57): afterAutoSkip(), ar(), At(), bi(), buildLookupTable(), buildOrUpdateElements(), cn(), determineDataLimits() (+49 more)

### Community 49 - "ee"
Cohesion: 0.06
Nodes (38): an(), average(), beforeDatasetsDraw(), beforeDraw(), Ca(), cf(), dataset(), dh() (+30 more)

### Community 50 - "reduce"
Cohesion: 0.08
Nodes (45): addActions(), advanceFully(), advanceStack(), allActions(), canShift(), close(), deadEnd(), dynamicPrecedence() (+37 more)

### Community 51 - "Filament\Schemas\Schema"
Cohesion: 0.09
Nodes (11): DokterForm, KartuStokRelationManager, ObatForm, PelangganForm, PembelianForm, ResepForm, SupplierForm, DetailTransaksiRelationManager (+3 more)

### Community 52 - "kt"
Cohesion: 0.21
Nodes (17): ad(), cd(), Ct(), dr(), Ie(), ir(), kt(), ld() (+9 more)

### Community 53 - "parse"
Cohesion: 0.07
Nodes (45): Qa(), defaultZone(), an(), buildOrUpdateScales(), ch(), D(), determineDataLimits(), dh() (+37 more)

### Community 54 - "child"
Cohesion: 0.05
Nodes (92): addNodeMark(), allowedMarks(), allowsMarks(), ap(), at(), Bn(), Bt(), Ca() (+84 more)

### Community 55 - "qt"
Cohesion: 0.12
Nodes (34): ae(), B(), cr(), de(), dt(), Ee(), fr(), g() (+26 more)

### Community 56 - "getDatasetMeta"
Cohesion: 0.07
Nodes (41): bl(), lm(), Ot(), Tt(), afterDatasetsUpdate(), bc(), beforeLayout(), fc() (+33 more)

### Community 57 - "B"
Cohesion: 0.08
Nodes (37): B(), ba(), bg(), buildProps(), can(), commands(), createCan(), createChain() (+29 more)

### Community 58 - "u"
Cohesion: 0.17
Nodes (21): u(), ai(), ar(), destroy(), fe(), Ha(), $i(), ir() (+13 more)

### Community 59 - "Cn"
Cohesion: 0.17
Nodes (32): aa(), ba(), br(), Bt(), Cn(), ct(), Da(), Fa() (+24 more)

### Community 60 - "add"
Cohesion: 0.06
Nodes (47): Gm(), Wa(), _a(), aa(), add(), alpha(), beforeUpdate(), br() (+39 more)

### Community 61 - "create"
Cohesion: 0.09
Nodes (29): addChanges(), addSelection(), applyTransaction(), asSingle(), Bn(), Cg(), co(), compose() (+21 more)

### Community 62 - "StatsOverview.php"
Cohesion: 0.15
Nodes (6): PenjualanPembelianChart, StatsOverview, Pembelian, Filament\Widgets\LineChartWidget, Filament\Widgets\StatsOverviewWidget, Illuminate\Support\Carbon

### Community 63 - "echo.js"
Cohesion: 0.09
Nodes (13): ar(), b(), cr(), g(), Me(), P(), Pr(), qt() (+5 more)

### Community 64 - "ng"
Cohesion: 0.10
Nodes (28): acceptToken(), allows(), bc(), c$(), Cc(), $d(), define(), domEventHandlers() (+20 more)

### Community 65 - "match"
Cohesion: 0.12
Nodes (24): CQ(), De(), ey(), getCursor(), highlight(), HT(), JT(), ki() (+16 more)

### Community 66 - "fn"
Cohesion: 0.16
Nodes (32): _a(), c(), ca(), d(), Dn(), E(), ei(), En() (+24 more)

### Community 67 - "vi"
Cohesion: 0.10
Nodes (25): active(), _animateOptions(), cancel(), _createAnimations(), _createDescriptors(), _d(), Dd(), _descriptors() (+17 more)

### Community 68 - "Illuminate\Database\Eloquent\Model"
Cohesion: 0.08
Nodes (13): RegisterStudent, Controller, NotaController, DetailResep, Dokter, Pelanggan, Pengaturan, Resep (+5 more)

### Community 69 - "MetodePembayaranChart"
Cohesion: 0.28
Nodes (3): MetodePembayaranChart, StokPerKategoriChart, Filament\Widgets\DoughnutChartWidget

### Community 70 - "create"
Cohesion: 0.05
Nodes (74): Wb(), addInputRules(), addMark(), addStoredMark(), ao(), Ay(), bd(), bx() (+66 more)

### Community 71 - "a"
Cohesion: 0.25
Nodes (8): a(), at(), d(), f(), H(), ji(), L(), pt()

### Community 72 - "inRange"
Cohesion: 0.07
Nodes (43): average(), bh(), dataset(), En(), first(), getCenterPoint(), _getLegendItemAt(), getProps() (+35 more)

### Community 73 - "r"
Cohesion: 0.12
Nodes (24): apply(), as(), At(), Do(), es(), is(), it(), Ka() (+16 more)

### Community 74 - "Filament\Resources\Pages\ListRecords"
Cohesion: 0.10
Nodes (8): ListDokters, ListKartuStoks, ListObats, EditPembelian, ListPembelians, PembelianResource, ListReseps, Filament\Resources\Pages\ListRecords

### Community 75 - "TransaksiPenjualanResource.php"
Cohesion: 0.14
Nodes (4): CreateTransaksiPenjualan, EditTransaksiPenjualan, ListTransaksiPenjualans, TransaksiPenjualanResource

### Community 76 - "mP"
Cohesion: 0.07
Nodes (41): Ah(), bidiSpans(), Bl(), bO(), configure(), coordsAtPos(), dP(), extend() (+33 more)

### Community 77 - "devDependencies"
Cohesion: 0.10
Nodes (19): axios, concurrently, laravel-vite-plugin, devDependencies, axios, concurrently, laravel-vite-plugin, tailwindcss (+11 more)

### Community 78 - "filament/app.js"
Cohesion: 0.14
Nodes (10): B(), C(), close(), init(), P(), R(), setUpResizeObserver(), V() (+2 more)

### Community 79 - "post-autoload-dump"
Cohesion: 0.50
Nodes (4): post-autoload-dump, Illuminate\\Foundation\\ComposerScripts::postAutoloadDump, @php artisan filament:upgrade, @php artisan package:discover --ansi

### Community 80 - "getSortedVisibleDatasetMetas"
Cohesion: 0.13
Nodes (17): beforeDatasetDraw(), beforeDatasetsDraw(), beforeDraw(), _calculatePadding(), co(), _drawDatasets(), Ge(), getPixelForTick() (+9 more)

### Community 81 - "wc"
Cohesion: 0.17
Nodes (16): ac(), cs(), Es(), getBasePosition(), getBaseValue(), getDistanceFromCenterForValue(), getPointPositionForValue(), lo() (+8 more)

### Community 82 - "PelangganResource.php"
Cohesion: 0.18
Nodes (4): CreatePelanggan, EditPelanggan, ListPelanggans, PelangganResource

### Community 83 - "r"
Cohesion: 0.16
Nodes (16): Be(), Dt(), ei(), Fe(), He(), i(), ir(), le() (+8 more)

### Community 84 - "buildTicks"
Cohesion: 0.09
Nodes (33): Ar(), buildTicks(), calculateCircumference(), _circumference(), _computeAngle(), _computeLabelItems(), _computeLabelSizes(), computeTickLimit() (+25 more)

### Community 85 - "composer.json"
Cohesion: 0.14
Nodes (13): description, extra, laravel, keywords, dont-discover, license, minimum-stability, name (+5 more)

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

### Community 91 - "color-picker.js"
Cohesion: 0.15
Nodes (3): constructor(), style(), update()

### Community 92 - "static"
Cohesion: 0.28
Nodes (4): bootScopedByUser(), UserFactory, Illuminate\Database\Eloquent\Factories\Factory, static

### Community 93 - "_notify"
Cohesion: 0.20
Nodes (14): active(), _animateOptions(), cancel(), _createAnimations(), _createDescriptors(), _descriptors(), _notify(), _notifyStateChanges() (+6 more)

### Community 94 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 96 - "actions/actions.js"
Cohesion: 0.73
Nodes (5): closeModal(), generateModalId(), init(), openModal(), syncActionModals()

### Community 99 - "AdminPanelProvider.php"
Cohesion: 0.29
Nodes (5): Dashboard, AccountWidget, AdminPanelProvider, Filament\Panel, Filament\PanelProvider

### Community 100 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 101 - "require"
Cohesion: 0.40
Nodes (5): require, filament/filament, laravel/framework, laravel/tinker, php

### Community 103 - "le"
Cohesion: 0.29
Nodes (11): be(), de(), Gt(), j(), je(), le(), Oe(), Pl() (+3 more)

### Community 104 - "post-create-project-cmd"
Cohesion: 0.50
Nodes (4): post-create-project-cmd, @php artisan key:generate --ansi, @php artisan migrate --graceful --ansi, @php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\

### Community 105 - "Illuminate\Database\Migrations\Migration"
Cohesion: 0.28
Nodes (3): CreatePelangganTable, CreatePembelianTable, Illuminate\Database\Migrations\Migration

### Community 110 - "Illuminate\Database\Seeder"
Cohesion: 0.25
Nodes (5): DatabaseSeeder, DokterSeeder, PengaturanSeeder, Illuminate\Database\Console\Seeds\WithoutModelEvents, Illuminate\Database\Seeder

### Community 112 - "AGENTS.md"
Cohesion: 0.25
Nodes (6): Architecture notes, Conventions, Critical: PHP environment, graphify, Setup & commands, Testing

### Community 135 - "BackedEnum"
Cohesion: 0.08
Nodes (10): DokterResource, KartuStokResource, ManagePengaturans, PengaturanResource, ResepResource, ListSuppliers, SupplierResource, BackedEnum (+2 more)

### Community 148 - "opencode.json"
Cohesion: 0.50
Nodes (3): plugin, $schema, .opencode/plugins/graphify.js

### Community 149 - "Up"
Cohesion: 0.24
Nodes (10): done(), Gr(), ib(), lift(), move(), ob(), Tt(), Up() (+2 more)

### Community 155 - "_p"
Cohesion: 0.25
Nodes (9): Lp(), Mp(), _p(), Qp(), sa(), wp(), xt(), Ye() (+1 more)

### Community 156 - "bo"
Cohesion: 0.25
Nodes (9): oh(), bo(), eh(), ih(), mo(), nh(), sh(), th() (+1 more)

### Community 157 - "vl"
Cohesion: 0.25
Nodes (8): bi(), ll(), ol(), Rp(), Sp(), vl(), xl(), xp()

### Community 158 - "lt"
Cohesion: 0.36
Nodes (8): e(), ha(), It(), lt(), ra(), va(), Wt(), yp()

### Community 159 - "getLabelAndValue"
Cohesion: 0.32
Nodes (8): _createItems(), Ea(), format(), getLabelAndValue(), getLabelForValue(), ne(), numeric(), Qc()

### Community 160 - "c"
Cohesion: 0.33
Nodes (6): c(), em(), Fe(), o(), s(), Se()

### Community 161 - "clickPercent"
Cohesion: 0.60
Nodes (5): clickPercent(), getPosition(), mouseUp(), moveplayhead(), timelineClicked()

### Community 162 - "autoload-dev"
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Tests\\

## Knowledge Gaps
- **100 isolated node(s):** `$schema`, `.opencode/plugins/graphify.js`, `$schema`, `name`, `type` (+95 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **12 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `n()` connect `n` to `code-editor.js`, `rich-editor.js`, `components/chart.js`, `update`, `resolve`, `stat/chart.js`, `lineAt`, `ab`, `components/select.js`, `constructor`, `of`, `columns/select.js`, `W`, `_update`, `draw`, `get`, `facet`, `create`, `get`, `tables.js`, `slice`, `_update`, `constructor`, `T`, `t`, `advance`, `markdown-editor.js`, `.slice`, `vl`, `e`, `updateElements`, `support.js`, `.forEach`, `draw`, `addElementByRule`, `qt`, `i`, `parse`, `ee`, `kt`, `parse`, `child`, `getDatasetMeta`, `B`, `u`, `Cn`, `add`, `create`, `echo.js`, `ng`, `match`, `fn`, `vi`, `inRange`, `r`, `mP`, `getSortedVisibleDatasetMetas`, `wc`, `r`, `t`, `le`?**
  _High betweenness centrality (0.102) - this node is a cross-community bridge._
- **Why does `u()` connect `u` to `update`, `lineAt`, `constructor`, `of`, `W`, `draw`, `get`, `facet`, `tables.js`, `_update`, `T`, `t`, `advance`, `markdown-editor.js`, `e`, `updateElements`, `fn`, `.forEach`, `n`, `draw`, `updateElements`, `slider.js`, `i`, `parse`, `ee`, `reduce`, `parse`, `child`, `qt`, `B`, `fn`, `vi`, `inRange`, `r`, `mP`, `filament/app.js`, `wc`, `buildTicks`, `t`?**
  _High betweenness centrality (0.051) - this node is a cross-community bridge._
- **Why does `Zi()` connect `draw` to `facet`, `rich-editor.js`, `add`, `stat/chart.js`?**
  _High betweenness centrality (0.040) - this node is a cross-community bridge._
- **Are the 237 inferred relationships involving `n()` (e.g. with `cr()` and `He()`) actually correct?**
  _`n()` has 237 INFERRED edges - model-reasoned connections that need verification._
- **Are the 153 inferred relationships involving `t()` (e.g. with `code-editor.js` and `add()`) actually correct?**
  _`t()` has 153 INFERRED edges - model-reasoned connections that need verification._
- **Are the 24 inferred relationships involving `update()` (e.g. with `gT()` and `Pr()`) actually correct?**
  _`update()` has 24 INFERRED edges - model-reasoned connections that need verification._
- **Are the 134 inferred relationships involving `i()` (e.g. with `code-editor.js` and `add()`) actually correct?**
  _`i()` has 134 INFERRED edges - model-reasoned connections that need verification._