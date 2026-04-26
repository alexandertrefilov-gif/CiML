# Roadmap дальнейшей разработки CiML

Дата: 2026-04-26

## Принцип

Проект не нужно переписывать. Текущие HTML и документы использовать как reference/source material. Дальше двигаться фазами: сначала порядок и архитектура, потом Phase 1, затем Phase 2-5 только через gates.

Визуальный стиль не менять без отдельного согласования.

## Этап 0. Зафиксировать рабочую базу

Цель: превратить текущий набор файлов в управляемый проект.

Шаги:

1. Утвердить `ciml_phase1_live.html` как основной visual reference для Phase 1.
2. Утвердить `ciml_phase2_after_execution.html` как target reference для Phase 2.
3. Оставить `website.html` как legacy/reference prototype.
4. Утвердить, что ZIP-файлы остаются архивами, а `phase-2`...`phase-5` используются как рабочие распакованные пакеты.
5. Принять или скорректировать структуру из `AUDIT.md`.
6. Добавить decision log.

Definition of Done:

- структура хранения утверждена;
- README описывает статус проекта;
- понятно, какие файлы являются source/reference/archive;
- нет спорного статуса у HTML-прототипов.

## Этап 1. Phase 1 technical specification

Цель: подготовить техническую спецификацию до написания WordPress-кода.

Шаги:

1. Выписать Phase 1 modules:
   - dashboard;
   - homepage;
   - first visit;
   - services;
   - community profile;
   - statement of faith;
   - ministries;
   - sermons/media;
   - events;
   - team;
   - contact;
   - legal;
   - donation info block.
2. Решить, какие данные являются options, какие CPT, какие taxonomies.
3. Описать admin menu Phase 1.
4. Описать roles/capabilities Phase 1 без sensitive roles.
5. Описать form handling для contact only:
   - nonce;
   - validation;
   - sanitizing;
   - escaping;
   - spam protection;
   - privacy consent;
   - storage/email rules.
6. Описать demo-data strategy:
   - install;
   - mark;
   - reset/delete.
7. Описать QA checklist.

Definition of Done:

- есть `docs/specs/phase-1-technical-spec.md`;
- есть `docs/qa/phase-1-checklist.md`;
- нет unresolved blocker для начала кода Phase 1.

## Этап 2. Создать WordPress-скелет

Цель: создать минимальную, расширяемую структуру без смены дизайна.

Шаги:

1. Создать `src/wp-content/themes/ciml-theme`.
2. Создать `src/wp-content/plugins/ciml-core`.
3. Проверить `.gitignore`, чтобы эти папки не игнорировались.
4. В `ciml-theme` вынести только presentation:
   - templates;
   - assets;
   - frontend sections;
   - responsive layout.
5. В `ciml-core` вынести logic:
   - CPT;
   - taxonomies;
   - options;
   - roles/capabilities;
   - admin pages;
   - forms;
   - demo data.

Definition of Done:

- theme installable;
- plugin installable;
- активация не ломает WordPress;
- нет business logic внутри theme.

## Этап 3. Реализовать Phase 1 public portal

Цель: перенести `ciml_phase1_live.html` в WordPress без визуальной переработки.

Шаги:

1. Собрать base theme layout:
   - header;
   - footer;
   - typography;
   - colors;
   - spacing;
   - responsive rules.
2. Перенести public sections из HTML-прототипа.
3. Подключить данные из `ciml-core` вместо hardcoded content.
4. Реализовать Phase 1 CPT/options.
5. Реализовать admin fields.
6. Реализовать contact form безопасно.
7. Добавить demo-data importer.
8. Проверить frontend/admin separation.

Definition of Done:

- public site соответствует visual reference;
- Phase 1 content editable from admin;
- visitor не видит admin controls;
- contact form protected;
- no sensitive modules active.

## Этап 4. QA и Release Candidate Phase 1

Цель: не переходить к Phase 2 до проверки Phase 1.

Проверки:

- responsive desktop/tablet/mobile;
- accessibility basics;
- escaping output;
- form security;
- role/capability access;
- no demo data leakage as real data;
- legal placeholders marked;
- performance baseline;
- no PHP warnings;
- no broken assets;
- no accidental Phase 2/3 activation.

Definition of Done:

- Phase 1 checklist passed;
- known issues documented;
- release decision recorded.

## Этап 5. Phase 2 implementation

Условие входа: Phase 1 approved.

Основа:

- `phase-2/Phase2_Technische_Umsetzung.md`
- `phase-2/Phase2_Backlog.csv`
- `phase-2/phase2-demo-data.json`
- `ciml_phase2_after_execution.html`

Основные работы:

- smallgroups;
- courses;
- volunteer areas;
- news;
- testimonies;
- event signups;
- request admin lists;
- role/capability extensions;
- frontend filters and grids;
- protected forms.

Gate:

- no sensitive Phase 3 data;
- all request data internal only;
- test plan passed.

## Этап 6. Phase 3 security design and implementation

Условие входа: Phase 2 approved.

Основа:

- `phase-3/Phase3_Vorbereitung_und_Ausfuehrung.md`
- `phase-3/Phase3_Test_und_Abnahme.md`

Правило: если security model не закрыт, не строить partial sensitive module.

Основные работы:

- care requests;
- prayer review;
- safeguarding public info;
- audit;
- export/delete;
- retention;
- strict capabilities;
- no REST/search/sitemap/RSS for sensitive entries.

Gate:

- security review passed;
- no public leakage;
- access audit works.

## Этап 7. Phase 4 members area

Условие входа: Phase 3 boundaries approved.

Основа:

- `phase-4/Phase4_Vorbereitung_und_Ausfuehrung.md`
- `phase-4/Phase4_Test_und_Abnahme.md`

Основные работы:

- login area;
- member profiles;
- internal events;
- rosters;
- protected documents/downloads;
- trainings;
- internal notices.

Gate:

- no public file access;
- no Phase 3 data visible in members area;
- deactivated members lose access.

## Этап 8. Phase 5 governance and operations

Условие входа: Phase 1-4 operational baseline exists.

Основа:

- `phase-5/Phase5_Governance_und_Betrieb.md`
- `phase-5/Phase5_Test_und_Abnahme.md`

Основные работы:

- audit log;
- approval workflow;
- backup/restore process;
- export/delete process;
- role review;
- system status;
- maintenance mode;
- release gates;
- incident process;
- documentation structure.

Gate:

- release process repeatable;
- backups/restores tested;
- roles reviewed;
- incident process documented.

## Ближайшие рекомендуемые действия

1. Подтвердить предложенную структуру проекта.
2. После подтверждения перенести файлы по папкам без удаления оригинального смысла.
3. Расширить `README.md`.
4. Создать `docs/specs/phase-1-technical-spec.md`.
5. Создать WordPress skeleton только после утверждения Phase 1 spec.

