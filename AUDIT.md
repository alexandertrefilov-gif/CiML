# Аудит проекта CiML

Дата аудита: 2026-04-26

## Краткий вывод

Проект находится на стадии концепции, фазового планирования и HTML-прототипов. Рабочей WordPress-реализации пока нет: отсутствуют `ciml-theme`, `ciml-core`, PHP-файлы темы/плагина, установочная структура WordPress, реальные шаблоны, обработчики форм и роли.

Готовы:

- концепция портала и фазовая архитектура;
- два DOCX-документа с общей логикой, модулями, фазами, открытыми решениями и целевой структурой;
- HTML-прототип Phase 1;
- HTML-прототип Phase 2;
- исходная статическая версия `website.html`;
- фазовые пакеты Phase 2-5 с README, backlog, demo-data, тест-планами и prompt-файлами;
- `.gitignore` под WordPress.

Не готово:

- installable WordPress theme;
- plugin/core layer `ciml-core`;
- Custom Post Types, taxonomies, roles, capabilities;
- реальные admin screens;
- реальные формы с nonce, validation, sanitizing, spam protection, privacy consent;
- importer/demo-data lifecycle;
- production legal texts, hosting, deployment, backup/restore;
- security gates для Phase 3-5.

## Что было проверено

Проверены файлы в корне проекта и распакованные ZIP-пакеты:

- `README.md`
- `.gitignore`
- `website.html`
- `ciml_phase1_live.html`
- `ciml_phase2_after_execution.html`
- `CImL_Projektplan_Module_Agenda.docx`
- `CImL_Gesamtprojekt_Zusammenfassung.docx`
- `CImL_Phase2_Ausfuehrungspaket.zip`
- `CImL_Phase3_Ausfuehrungspaket.zip`
- `CImL_Phase4_Ausfuehrungspaket.zip`
- `CImL_Phase5_Governance_Betrieb.zip`
- `phase-2/*`
- `phase-3/*`
- `phase-4/*`
- `phase-5/*`

Оригинальные ZIP-файлы не удалялись. Их содержимое распаковано в отдельные каталоги `phase-2`, `phase-3`, `phase-4`, `phase-5`.

## Текущее состояние файлов

### `README.md`

Содержит только:

```md
# CiML
Privat
```

Этого недостаточно для дальнейшей разработки. README нужно расширить: назначение проекта, текущий статус, список артефактов, правила работы с фазами, как запускать/проверять HTML-прототипы, что считается источником истины.

### `.gitignore`

Содержит WordPress-oriented ignore rules: WordPress core, config, uploads, logs, default themes/plugins. Это соответствует будущему направлению проекта.

Риск: если позже WordPress-структура будет храниться в репозитории частично, нужно явно whitelist-ить `wp-content/themes/ciml-theme` и `wp-content/plugins/ciml-core`, иначе можно случайно не добавить нужные файлы в git.

### `website.html`

Статическая HTML-страница с названием:

`Evangeliums Gemeinde Berlin - Christus ist unser Leben`

Содержит полноценный визуальный прототип публичного сайта: hero, service bar, community sections, ministries, media, events, donate, newsletter, footer. Это выглядит как исходная или альтернативная визуальная версия до фазовой детализации.

Статус: полезно как визуальный/reference-прототип, но это не текущий главный файл Phase 1, потому что:

- бренд отличается от `Christus ist mein Leben`;
- нет явной phase/admin логики как в `ciml_phase1_live.html`;
- структура больше похожа на standalone landing/public website.

Рекомендация: оставить как reference в будущей папке `prototypes/legacy/` или `prototypes/reference/`.

### `ciml_phase1_live.html`

Статическая HTML-визуализация Phase 1:

- публичный портал;
- visitor-facing modules;
- admin preview;
- phase agenda;
- demo warnings;
- явная граница: нет Seelsorge, members area, duty rosters, payments.

Статус: лучший текущий кандидат на основной Phase 1 prototype.

Ограничение: это не production code. Формы статические, данные hardcoded, admin preview визуальный, WordPress-интеграции нет.

### `ciml_phase2_after_execution.html`

Статическая HTML-визуализация Phase 2:

- Kleingruppen;
- Kurse;
- Mitarbeit;
- Anfragen;
- News;
- Zeugnisse;
- simple prayer requests;
- admin structure preview;
- explicit boundary to Phase 3.

Статус: полезный target prototype для Phase 2, но не замена реализации. Он должен остаться эталоном поведения и структуры после того, как Phase 1 будет технически собрана.

### DOCX-документы

#### `CImL_Projektplan_Module_Agenda.docx`

Планировочный документ Phase 0:

- Zwei-Seiten-Prinzip;
- целевая архитектура `ciml-theme` + `ciml-core`;
- модульная карта M01-M25;
- weekly roadmap;
- gates and definition of done;
- открытые решения перед implementation.

Статус: базовая agenda. Хорошо подходит как источник стратегического порядка работ.

#### `CImL_Gesamtprojekt_Zusammenfassung.docx`

Расширенная Gesamtdatei:

- общая идея проекта;
- Phase 1-5;
- модули;
- open points;
- technical target structure;
- приоритетные задачи;
- decision list before implementation;
- вывод: planning largely complete, production build not released.

Статус: главный концептуальный документ. Его нужно считать верхним источником истины до появления технической спецификации Phase 1.

### ZIP-пакеты и распакованные phase-папки

#### `phase-2`

Содержит:

- `Phase2_Technische_Umsetzung.md`
- `phase2-demo-data.json`
- `Phase2_Backlog.csv`
- `Phase2_Test_und_Abnahme.md`
- `Claude_Code_Prompt_Phase2.txt`
- `README.md`

Статус: Phase 2 fachlich/technisch vorbereitet, но "Noch kein produktiver Code".

Основные planned modules:

- smallgroups;
- courses;
- volunteer areas;
- news;
- testimonies;
- event signups;
- simple prayer request boundary.

#### `phase-3`

Содержит security-focused пакет для sensitive care:

- care requests;
- prayer requests;
- safeguarding;
- Datenschutz/Einwilligungen;
- audit;
- export/delete;
- roles and capabilities.

Статус: подготовлено, но требует отдельного security gate. Не должно строиться как обычный contact-form workflow.

#### `phase-4`

Содержит пакет members area:

- login-protected area;
- member profiles;
- internal events;
- rosters;
- documents;
- trainings;
- internal notices;
- role-based visibility.

Статус: подготовлено концептуально. Нельзя строить до security boundaries Phase 3/4 и file access model.

#### `phase-5`

Содержит governance/operations пакет:

- audit log;
- approval workflow;
- backup/restore;
- export/delete;
- role review;
- system status;
- maintenance mode;
- release gates;
- incidents.

Статус: operating model prepared. Не является frontend feature phase.

## Дублирование

### Концептуальное дублирование

Есть осознанное дублирование между:

- DOCX-документами;
- phase README;
- phase technical specs;
- Claude prompt files;
- HTML agenda/admin sections.

Это нормально для планирования, но перед технической реализацией нужен один source of truth:

1. `docs/concept/CImL_Gesamtprojekt_Zusammenfassung.docx` как верхний документ.
2. `docs/planning/CImL_Projektplan_Module_Agenda.docx` как roadmap/agenda.
3. `phases/phase-*/` как phase execution packages.
4. `prototypes/*.html` как визуальные reference files.
5. `docs/decisions/` как место для решений, которые заменяют спорные или устаревшие части.

### HTML-дублирование

`website.html`, `ciml_phase1_live.html`, `ciml_phase2_after_execution.html` пересекаются по визуальному стилю и public-site sections.

Рекомендуемая роль:

- `ciml_phase1_live.html` - active Phase 1 visual target;
- `ciml_phase2_after_execution.html` - Phase 2 target after Phase 1 implementation;
- `website.html` - legacy/reference prototype.

### ZIP и распакованные каталоги

После распаковки содержимое ZIP дублируется в `phase-2`...`phase-5`. Удалять ZIP сейчас не нужно: они могут служить immutable source packages.

Рекомендация:

- оставить ZIP в `archives/`;
- оставить распакованные phase-пакеты в `phases/phase-2`...`phases/phase-5`;
- в README указать, что ZIP - оригинальные пакеты, а рабочая документация читается из `phases/`.

## Что лежит неправильно

Сейчас все проектные артефакты лежат в корне. Для дальнейшей разработки это станет проблемой: корень смешивает prototypes, archives, docs, WordPress planning и будущий код.

Проблемные места:

- HTML-прототипы лежат рядом с DOCX и ZIP;
- распакованные phase folders лежат рядом с архивами;
- DOCX-документы не отделены от рабочих phase specs;
- нет папки `docs/`;
- нет папки `prototypes/`;
- нет папки `archives/`;
- нет технических папок будущего WordPress-кода;
- README слишком короткий;
- нет decision log.

## Рекомендуемая структура проекта

```text
CiML/
  README.md
  AUDIT.md
  ROADMAP.md
  .gitignore

  docs/
    concept/
      CImL_Gesamtprojekt_Zusammenfassung.docx
    planning/
      CImL_Projektplan_Module_Agenda.docx
    decisions/
      0001-project-architecture.md
      0002-phase-1-scope.md
      0003-visual-style-freeze.md
    qa/
      phase-1-checklist.md

  prototypes/
    active/
      ciml_phase1_live.html
      ciml_phase2_after_execution.html
    reference/
      website.html

  archives/
    CImL_Phase2_Ausfuehrungspaket.zip
    CImL_Phase3_Ausfuehrungspaket.zip
    CImL_Phase4_Ausfuehrungspaket.zip
    CImL_Phase5_Governance_Betrieb.zip

  phases/
    phase-2/
    phase-3/
    phase-4/
    phase-5/

  src/
    wp-content/
      themes/
        ciml-theme/
      plugins/
        ciml-core/

  tools/
    importers/
    scripts/
```

Важно: это предложение структуры. В этом аудите файлы не переносились, чтобы не менять проект без отдельного согласования.

## Что не нужно делать сейчас

- Не переписывать проект заново.
- Не начинать с Phase 2-5 implementation.
- Не менять визуальный стиль без отдельного решения.
- Не смешивать theme logic и church/business logic.
- Не превращать sensitive modules Phase 3 в обычные WordPress posts.
- Не строить members downloads без защищенной выдачи файлов.
- Не удалять ZIP, пока не утверждена новая структура хранения.

## Риски

### Высокие

- Нет утвержденных реальных данных общины: адрес, юридические тексты, контакты, фото, ответственные лица.
- Нет решения по hosting/staging/production.
- Нет source of truth для Phase 1 technical scope.
- Формы пока только статические prototypes.
- Sensitive phases требуют security design до реализации.

### Средние

- Много дублирования между документами может привести к расхождению требований.
- `.gitignore` может скрыть будущие WordPress theme/plugin files, если структура будет создана внутри ignored paths без whitelist.
- `website.html` может сбивать с толку как альтернативная версия бренда.

### Низкие

- ZIP и распакованные phase folders дублируют друг друга, но это управляемо.
- README пока пустой, но это легко исправить.

## Рекомендации по следующему шагу

1. Утвердить, что Phase 1 является первым техническим scope.
2. Утвердить визуальный стиль `ciml_phase1_live.html` как frozen reference.
3. Создать decision log.
4. Перенести файлы в предложенную структуру только после подтверждения.
5. Сформировать Phase 1 technical specification.
6. Только после этого создать `ciml-theme` и `ciml-core`.

