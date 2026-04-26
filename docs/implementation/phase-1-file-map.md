# Phase 1 File Map

Project: CiML / Christus ist mein Leben  
Date: 2026-04-26  
Status: planned file/module structure, not implemented here

## 1. Current Files

Existing theme skeleton:

```text
src/wp-content/themes/ciml-theme/
  style.css
  functions.php
  index.php
  header.php
  footer.php
  front-page.php
  assets/
    css/.gitkeep
    js/.gitkeep
    images/.gitkeep
  template-parts/
    header/.gitkeep
    footer/.gitkeep
    sections/.gitkeep
```

Existing plugin skeleton:

```text
src/wp-content/plugins/ciml-core/
  ciml-core.php
  includes/
    admin/.gitkeep
    demo-data/.gitkeep
    forms/.gitkeep
    helpers/.gitkeep
    options/.gitkeep
    post-types/.gitkeep
    security/.gitkeep
    taxonomies/.gitkeep
```

## 2. Planned Theme Files

Theme responsibility: presentation only.

```text
src/wp-content/themes/ciml-theme/
  style.css
  functions.php
  index.php
  front-page.php
  header.php
  footer.php

  assets/
    css/
      base.css
      layout.css
      components.css
      front-page.css
      responsive.css
    js/
      front-page.js
    images/
      README.md

  inc/
    setup.php
    enqueue.php
    template-tags.php

  template-parts/
    header/
      site-header.php
      navigation.php
    footer/
      site-footer.php
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
```

### Theme File Roles

- `style.css`: WordPress theme header and minimal fallback styles.
- `functions.php`: theme bootstrap only; load setup/enqueue/template helpers.
- `inc/setup.php`: theme supports and nav menus.
- `inc/enqueue.php`: enqueue CSS/JS only.
- `inc/template-tags.php`: presentation helpers and safe fallback render helpers.
- `front-page.php`: section composition for the public Phase 1 homepage.
- `template-parts/sections/*.php`: presentation markup for active prototype sections.
- `assets/css/*.css`: extracted visual system from active prototype.
- `assets/js/front-page.js`: presentation-only scroll/fade/navigation behavior.

Forbidden in theme:

- CPT registration;
- taxonomy registration;
- roles/capabilities;
- admin menus;
- contact form processing;
- private submission storage;
- demo data install/reset;
- Phase 2-5 workflows.

## 3. Planned Plugin Files

Plugin responsibility: core logic only.

```text
src/wp-content/plugins/ciml-core/
  ciml-core.php

  includes/
    bootstrap.php

    post-types/
      belief-item.php
      ministry.php
      sermon.php
      event.php
      team-member.php
      contact-message.php
      register.php

    taxonomies/
      ministry-category.php
      sermon-series.php
      sermon-speaker.php
      event-category.php
      team-role.php
      register.php

    options/
      home-options.php
      service-options.php
      profile-options.php
      contact-options.php
      legal-options.php
      donation-options.php
      demo-data-options.php
      register.php

    admin/
      menu.php
      pages/
        overview.php
        startseite.php
        gottesdienste.php
        gemeinde.php
        glaubensgrundlage.php
        dienste.php
        predigten.php
        veranstaltungen.php
        team.php
        kontakt.php
        rechtliches.php
        spenden.php
        demo-daten.php

    forms/
      contact-form.php
      validators.php
      sanitizers.php

    security/
      capabilities.php
      nonces.php
      access.php

    demo-data/
      phase-1-data.php
      installer.php
      remover.php

    helpers/
      data-providers.php
      escaping.php
      assets.php
```

### Plugin File Roles

- `ciml-core.php`: plugin header and minimal bootstrap.
- `includes/bootstrap.php`: load Phase 1 plugin modules.
- `post-types/register.php`: register only Phase 1 CPTs.
- `taxonomies/register.php`: register only Phase 1 taxonomies.
- `options/register.php`: register only Phase 1 option groups.
- `admin/menu.php`: create `CImL Portal` Phase 1 admin menu.
- `admin/pages/*.php`: settings pages and admin views.
- `forms/contact-form.php`: Phase 1 contact form processing only.
- `security/capabilities.php`: Phase 1 roles/capabilities only.
- `security/nonces.php`: nonce helpers.
- `security/access.php`: capability/access helpers.
- `demo-data/*`: Phase 1 demo data lifecycle only.
- `helpers/data-providers.php`: public read helpers used by theme.
- `helpers/escaping.php`: shared escaping helpers for plugin-rendered admin output.

Forbidden in plugin for Phase 1:

- smallgroups;
- courses;
- volunteer application workflows;
- event signup workflows;
- testimony submission workflows;
- prayer request workflows;
- seelsorge/care request management;
- confidential prayer platform;
- members area;
- rosters;
- internal documents;
- payment processing;
- backup/governance/incident workflows.

## 4. Planned Data Ownership

| Area | Owner | Planned Storage |
| --- | --- | --- |
| Hero/homepage | Plugin | options |
| First visit | Plugin | options |
| Service info | Plugin | options |
| Community profile | Plugin | options |
| Belief cards | Plugin | `ciml_belief_item` |
| Ministries | Plugin | `ciml_ministry` |
| Sermons/media | Plugin | `ciml_sermon` |
| Events | Plugin | `ciml_event` |
| Team | Plugin | `ciml_team_member` |
| Contact info | Plugin | options |
| Contact submissions | Plugin | private `ciml_contact_message` or approved alternative |
| Legal placeholders/status | Plugin | options or managed pages |
| Donation info | Plugin | options |
| Visual rendering | Theme | templates/assets only |

## 5. Planned Module Order

1. Theme asset extraction.
2. Theme section template parts.
3. Plugin bootstrap loader.
4. CPT registration.
5. Taxonomy registration.
6. Option registration.
7. Admin menu/pages.
8. Roles/capabilities.
9. Data-provider helpers.
10. Contact form.
11. Demo-data lifecycle.
12. QA and release gate.

## 6. Open Decisions

- Whether contact submissions use private CPT storage or another approved storage path.
- Whether legal text uses options or WordPress pages.
- Whether sermons/events need public archives in Phase 1 or only homepage sections.
- Whether media links require explicit external-provider consent handling.
- Whether multilingual readiness is required in first implementation pass.
- Whether Phase 1 demo data is kept in PHP arrays, JSON, or another import format.

## 7. Blockers

- Do not implement contact processing until privacy, retention, and routing are decided.
- Do not implement legal production pages until real reviewed text is provided.
- Do not implement any sensitive data module before Phase 3 security gate.
- Do not implement Phase 2 workflows while Phase 1 is not accepted.
- Do not add executable tests until PHP/Composer/PHPUnit or a WordPress test suite is available.

