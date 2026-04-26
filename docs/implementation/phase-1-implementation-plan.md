# Phase 1 Implementation Plan

Project: CiML / Christus ist mein Leben  
Date: 2026-04-26  
Status: implementation preparation only

## 1. Current Skeleton Check

Checked sources:

- `docs/specs/phase-1-technical-spec.md`
- `docs/qa/phase-1-checklist.md`
- `prototypes/active/ciml_phase1_live.html`
- `src/wp-content/themes/ciml-theme/`
- `src/wp-content/plugins/ciml-core/`
- `tests/`

Current result:

- WordPress theme skeleton exists.
- WordPress plugin skeleton exists.
- Theme has required installable files: `style.css`, `index.php`, `functions.php`, `header.php`, `footer.php`, `front-page.php`.
- Plugin has installable header file: `ciml-core.php`.
- Test/QA documentation exists under `tests/`.
- No executable PHP test environment is currently documented as available.
- No prototype files were changed for this plan.

The skeleton is ready for the next implementation step, but it does not yet implement Phase 1 modules.

## 2. Implementation Principle

Do not rebuild the project. Implement Phase 1 by evolving the current skeleton.

Boundaries:

- `ciml-theme` remains presentation only.
- `ciml-core` remains the core logic layer.
- Prototypes remain references and must not be edited as implementation files.
- Phase 2-5 features stay out of scope.
- Sensitive modules require a later security gate.
- No production readiness should be claimed until QA and legal gates pass.

## 3. Phase 1 Work Sequence

### Step 1: Theme Asset Foundation

Goal: move the visual language from the active prototype into maintainable theme assets without redesign.

Planned work:

- split CSS into theme asset files;
- enqueue CSS through WordPress APIs;
- add minimal frontend JavaScript for presentation-only behavior;
- preserve Phase 1 prototype colors, typography, spacing, cards, buttons, header, hero, grids, and responsive behavior.

Theme only. No CPT, role, form, or admin logic.

### Step 2: Theme Template Parts

Goal: convert the Phase 1 prototype sections into reusable presentation templates.

Planned sections:

- hero;
- service bar;
- first visit;
- community profile;
- belief cards;
- ministries;
- sermons;
- events;
- team;
- donation info;
- contact presentation;
- admin preview presentation;
- agenda;
- legal;
- footer content.

The theme should call safe data-provider functions from `ciml-core` later. Until those exist, use guarded fallbacks only.

### Step 3: Core Data Registration

Goal: register Phase 1 data structures in `ciml-core`.

Planned CPTs:

- `ciml_belief_item`;
- `ciml_ministry`;
- `ciml_sermon`;
- `ciml_event`;
- `ciml_team_member`;
- `ciml_contact_message` as private/non-public submission storage.

Planned taxonomies:

- `ciml_ministry_category`;
- `ciml_sermon_series`;
- `ciml_sermon_speaker`;
- `ciml_event_category`;
- `ciml_team_role`.

No Phase 2 signup/request workflows.

### Step 4: Core Options

Goal: register Phase 1 option groups.

Planned option groups:

- homepage/hero;
- first visit;
- service information;
- community profile;
- contact information;
- legal placeholders/status;
- donation info;
- demo data status.

All option saves must use capability checks, nonce verification, sanitization, and safe output helpers.

### Step 5: Admin Pages

Goal: add Phase 1 admin structure only.

Planned admin menu:

- CImL Portal;
- Overview;
- Startseite;
- Gottesdienste;
- Gemeinde;
- Glaubensgrundlage;
- Dienste;
- Predigten;
- Veranstaltungen;
- Team;
- Kontakt;
- Rechtliches;
- Spenden;
- Demo-Daten.

No members area, seelsorge, confidential prayer, duty rosters, internal documents, payment, incident, backup, or governance workflows.

### Step 6: Roles and Capabilities

Goal: define only low-risk Phase 1 roles/capabilities.

Planned roles:

- `ciml_manager`;
- `ciml_editor`;
- `ciml_event_editor`;
- `ciml_media_editor`;
- `ciml_contact_reviewer`.

Planned capabilities:

- `manage_ciml_settings`;
- `edit_ciml_public_content`;
- `edit_ciml_ministries`;
- `edit_ciml_sermons`;
- `edit_ciml_events`;
- `edit_ciml_team`;
- `read_ciml_contact_messages`;
- `delete_ciml_contact_messages`;
- `manage_ciml_demo_data`.

No Phase 3 sensitive roles.

### Step 7: Contact Form Preparation

Goal: implement only the Phase 1 public contact form after data/security structure is in place.

Required controls:

- nonce/CSRF protection;
- honeypot;
- server-side validation;
- sanitization;
- escaping;
- privacy consent;
- rate limiting or throttling decision;
- private storage or approved mail-only routing;
- no public output;
- no REST exposure.

This step is blocked until contact storage/routing is decided.

### Step 8: Demo Data Lifecycle

Goal: create Phase 1 demo data only.

Required actions:

- install demo data;
- mark demo data;
- reset/delete demo data;
- prevent accidental overwrite of production content.

No Phase 2-5 demo data import in Phase 1 implementation.

### Step 9: QA

Goal: validate Phase 1 against documented checklists.

Use:

- `docs/qa/phase-1-checklist.md`;
- `tests/manual/phase-1-skeleton-checklist.md`;
- `tests/static/theme-structure-checklist.md`;
- `tests/static/plugin-structure-checklist.md`.

Executable PHPUnit or WordPress integration tests should be added only after PHP, Composer, PHPUnit, and a WordPress test suite are available.

## 4. Open Decisions

- Real church identity data: final organization name, address, phone, email, representatives.
- Legal text source and review owner for Impressum, Datenschutz, cookies, external media.
- Contact form routing: private CPT storage, email-only, or hybrid.
- Retention policy for contact messages.
- Spam/rate-limit strategy.
- Real media policy: external video/audio providers and consent/cookie handling.
- Image source policy: remote URLs, local media library, licensing, alt text ownership.
- Multilingual scope: German only for Phase 1 or translation-ready implementation.
- Hosting/staging environment for real WordPress installability checks.
- PHP/Composer/PHPUnit availability for automated tests.

## 5. Blockers

- No production launch before legal texts are reviewed.
- No real contact form launch before privacy consent, storage/routing, retention, and spam protection are decided.
- No sensitive modules before a Phase 3 security gate.
- No Phase 2 workflows before Phase 1 release gate passes.
- No executable PHP QA until PHP/Composer/PHPUnit are available.

## 6. Definition of Ready for Coding

Phase 1 coding can proceed when:

- this plan is accepted;
- file map is accepted;
- open contact/legal decisions have owners;
- the current skeleton is committed and stable;
- the implementation target remains Phase 1 only.

