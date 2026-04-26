# Phase 1 Technical Specification

Project: CiML / Christus ist mein Leben  
Date: 2026-04-26  
Status: specification, no production code yet

## 1. Purpose

Phase 1 turns the accepted HTML prototype into a maintainable WordPress foundation without changing the visual style.

Primary visual reference:

- `prototypes/active/ciml_phase1_live.html`

Primary architecture decisions:

- `docs/decisions/0001-project-architecture.md`
- `docs/decisions/0002-phase-1-scope.md`
- `docs/decisions/0003-visual-style-freeze.md`

Phase 1 must produce a public church website and a low-risk admin/editor structure. It must not implement sensitive, internal, or Phase 2 workflow modules.

## 2. Architecture

Use a two-part WordPress architecture.

### `ciml-theme`

Responsible for presentation only:

- public templates;
- header and footer;
- frontend section layouts;
- typography, colors, spacing, cards, buttons, grids;
- responsive behavior;
- image rendering;
- frontend JavaScript for non-sensitive UI behavior.

The theme must not own portal data models, roles, permissions, form persistence, or admin logic.

### `ciml-core`

Responsible for portal logic:

- Custom Post Types;
- taxonomies;
- option groups;
- admin pages;
- meta fields;
- roles and capabilities;
- contact form processing;
- demo-data install/reset;
- sanitization, escaping, validation, nonce checks;
- public query helpers used by the theme.

## 3. Visual Style Constraint

The visual style is frozen by `0003-visual-style-freeze.md`.

Implementation must preserve:

- navy/gold/cream palette;
- `Cormorant Garamond` headings and `Source Sans 3` body typography;
- sticky header;
- full-bleed hero with image overlay;
- card and grid proportions;
- current section rhythm and responsive breakpoints;
- current public navigation labels and section order.

No redesign is part of Phase 1.

## 4. Phase 1 Modules

### M01 Dashboard / Admin Overview

Admin-facing overview for Phase 1 only.

Displays:

- active Phase 1 modules count;
- sensitive modules count as `0 active`;
- demo data status;
- release readiness status;
- quick links to editable sections.

No sensitive data or Phase 2 request workflows.

### M02 Homepage / Hero

Public hero and homepage settings.

Fields:

- site display name;
- phase label;
- hero eyebrow;
- hero heading;
- hero intro text;
- primary CTA label and target;
- secondary CTA label and target;
- hero image;
- hero image alt text;
- glass-pane/admin note title and text;
- visibility toggle for admin note.

Storage: options.

### M03 First Visit / Neu Hier

Visitor information module.

Fields:

- section label;
- heading;
- intro paragraphs;
- checklist items;
- CTA label and target;
- phase status note title;
- built modules text;
- not-active modules text.

Storage: options or a structured repeatable option group.

### M04 Worship Services / Gottesdienste

Service information bar.

Fields:

- day/time;
- address;
- language/translation;
- livestream status/link;
- first visitor CTA label and target.

Storage: options.

### M05 Community Profile / Gemeindeprofil

Public identity module.

Fields:

- section label;
- heading;
- body text;
- checklist items;
- statistics cards;
- image;
- image alt text.

Storage: options.

### M06 Statement of Faith / Glaubensgrundlage

Public belief cards.

Data model: `ciml_belief_item`

Fields:

- title;
- short description;
- label/tag;
- sort order;
- visibility status.

Public output: card grid.

### M07 Ministries / Dienste

Public ministry cards.

Data model: `ciml_ministry`

Fields:

- title;
- description;
- featured image;
- image alt text;
- category;
- contact label or contact reference;
- public visibility;
- sort order;
- admin marker text;
- phase boundary note, when relevant.

Taxonomy: `ciml_ministry_category`

Phase 1 must not include volunteer application workflows. Those belong to Phase 2.

### M08 Sermons / Mediathek

Public sermon/media links.

Data model: `ciml_sermon`

Fields:

- title;
- speaker;
- date;
- duration;
- scripture reference;
- series;
- media type;
- external video URL;
- external audio URL;
- optional notes URL/PDF;
- thumbnail image;
- image alt text;
- public visibility;
- sort order.

Taxonomies:

- `ciml_sermon_series`
- `ciml_sermon_speaker`

Phase 1 must use external media links only. No large local media management.

### M09 Events / Veranstaltungen

Public event list.

Data model: `ciml_event`

Fields:

- title;
- start date;
- start time;
- end time;
- location;
- short description;
- category/status label;
- target group;
- public visibility;
- sort order.

Taxonomy: `ciml_event_category`

Phase 1 may show "registration required" as text, but must not implement signup workflows. Event signup belongs to Phase 2.

### M10 Team / Leitung

Public team profiles.

Data model: `ciml_team_member`

Fields:

- name;
- role/title;
- short bio;
- portrait image;
- image alt text;
- public email visibility toggle;
- public phone visibility toggle;
- contact label/link;
- ministry relation;
- sort order;
- public visibility.

Taxonomy: `ciml_team_role`

### M11 Contact

Public contact information and contact form.

Options:

- organization name;
- address;
- phone;
- email;
- languages;
- map/embed toggle, optional later;
- contact card demo-data marker.

Form fields:

- name;
- email;
- topic;
- message;
- privacy consent checkbox;
- hidden honeypot field.

Submission storage: `ciml_contact_message` private entry type or a dedicated custom database table. For Phase 1, private CPT is acceptable if it is excluded from public queries, REST, search, sitemap, and feeds.

### M12 Legal

Public legal placeholders.

Fields:

- imprint title;
- imprint content;
- privacy title;
- privacy content;
- cookie/external media notice;
- legal review status;
- last reviewed date.

Storage: options or WordPress pages managed through admin settings.

Before live launch, placeholder legal text must be replaced by reviewed production content.

### M13 Donation Info Block

Public donation information block.

Fields:

- section label;
- heading;
- body text;
- external donation URL or contact CTA;
- legal notes link;
- demo-bank-data flag.

Storage: options.

No payment processing in Phase 1.

## 5. Custom Post Types

Register in `ciml-core`.

| CPT | Public | REST | Search | Archive | Purpose |
| --- | --- | --- | --- | --- | --- |
| `ciml_belief_item` | yes | read-only optional | no | no | belief cards |
| `ciml_ministry` | yes | read-only optional | yes | optional | ministry cards |
| `ciml_sermon` | yes | read-only optional | yes | optional | sermon/media links |
| `ciml_event` | yes | read-only optional | yes | optional | public events |
| `ciml_team_member` | yes | read-only optional | no | no | public team profiles |
| `ciml_contact_message` | no | no | no | no | private contact submissions |

`ciml_contact_message` must be protected:

- `public` false;
- `show_in_rest` false;
- `exclude_from_search` true;
- no public archive;
- admin access controlled by capabilities.

## 6. Taxonomies

Register in `ciml-core`.

- `ciml_ministry_category` for `ciml_ministry`;
- `ciml_sermon_series` for `ciml_sermon`;
- `ciml_sermon_speaker` for `ciml_sermon`;
- `ciml_event_category` for `ciml_event`;
- `ciml_team_role` for `ciml_team_member`.

Taxonomies should be editable in admin and safely rendered in the frontend.

## 7. Options

Use a single namespaced option storage strategy, for example:

- `ciml_phase1_home_options`;
- `ciml_phase1_service_options`;
- `ciml_phase1_profile_options`;
- `ciml_phase1_contact_options`;
- `ciml_phase1_legal_options`;
- `ciml_phase1_donation_options`;
- `ciml_demo_data_options`.

All options must be:

- registered with sanitization callbacks;
- capability protected;
- escaped at output;
- exportable later for governance.

## 8. Admin Pages

Top-level menu: `CImL Portal`

Phase 1 submenu:

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
- Demo-Daten;

Admin pages must:

- be capability-protected;
- use WordPress nonce checks for saves;
- sanitize all input;
- show demo-data markers clearly;
- never expose visitor-facing edit controls on the public site.

## 9. Roles and Capabilities

Phase 1 should keep roles simple.

Roles:

- `administrator`;
- `ciml_manager`;
- `ciml_editor`;
- `ciml_event_editor`;
- `ciml_media_editor`;
- `ciml_contact_reviewer`.

Capabilities:

- `manage_ciml_settings`;
- `edit_ciml_public_content`;
- `edit_ciml_ministries`;
- `edit_ciml_sermons`;
- `edit_ciml_events`;
- `edit_ciml_team`;
- `read_ciml_contact_messages`;
- `delete_ciml_contact_messages`;
- `manage_ciml_demo_data`.

Do not add Phase 3 roles in Phase 1.

## 10. Theme Template Structure

Future target structure:

```text
src/wp-content/themes/ciml-theme/
  style.css
  functions.php
  assets/
    css/
    js/
    images/
  template-parts/
    header/
    footer/
    sections/
      hero.php
      service-bar.php
      first-visit.php
      community-profile.php
      beliefs.php
      ministries.php
      sermons.php
      events.php
      team.php
      donation.php
      contact.php
      admin-preview.php
      agenda.php
      legal.php
  front-page.php
  page.php
```

This is a target structure only. Do not create these files until implementation is approved.

## 11. Plugin Structure

Future target structure:

```text
src/wp-content/plugins/ciml-core/
  ciml-core.php
  includes/
    post-types/
    taxonomies/
    options/
    admin/
    forms/
    security/
    demo-data/
    helpers/
```

This is a target structure only. Do not create these files until implementation is approved.

## 12. Contact Form Security

The Phase 1 contact form must include:

- nonce/CSRF protection;
- honeypot field;
- server-side validation;
- sanitization;
- output escaping;
- privacy consent checkbox;
- rate limiting or throttling strategy;
- optional email notification without exposing full sensitive content in logs;
- clear success/error messages;
- no public rendering of submissions;
- no REST endpoint for submissions unless separately secured and approved.

Validation rules:

- name required, length-limited;
- email required and valid;
- topic must be from an allowed list;
- message required, length-limited;
- consent required;
- honeypot must remain empty.

## 13. Demo Data

Phase 1 needs a demo-data lifecycle:

- install demo data;
- mark demo data visibly in admin;
- mark demo content on public site only where appropriate;
- reset/delete demo data;
- avoid mixing demo data with production content.

Demo-data status appears in the dashboard.

## 14. Public Rendering Rules

All public output must be escaped according to context:

- text nodes;
- attributes;
- URLs;
- HTML where limited rich text is allowed.

Images must include alt text. External image/media URLs must be validated.

Public templates must query only visible/published content.

## 15. Explicit Non-Goals

Do not build in Phase 1:

- smallgroup workflows;
- course registration;
- event registration;
- volunteer application workflow;
- testimony submission workflow;
- simple prayer request workflow;
- seelsorge/care request management;
- confidential prayer platform;
- members area;
- rosters;
- internal documents;
- payment processing;
- local large-scale video hosting;
- governance/incident workflows.

## 16. Implementation Gate

WordPress implementation may start only after this spec and `docs/qa/phase-1-checklist.md` are reviewed and accepted.

Phase 2 may start only after Phase 1 QA passes and release decision is recorded.

