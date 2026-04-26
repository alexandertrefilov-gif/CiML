# 0001 Project Architecture

Date: 2026-04-26

## Decision

The project will use a two-part WordPress architecture:

- `ciml-theme` for presentation, layout, templates, frontend sections, assets, and responsive rendering.
- `ciml-core` for portal logic, data models, Custom Post Types, taxonomies, roles, capabilities, forms, admin screens, demo data, imports/exports, and security rules.

## Rationale

Church data must not be locked inside the theme. Sermons, events, ministries, members, courses, requests, roles, and governance logic must survive a future design change.

The HTML files in `prototypes/` are visual references, not production implementation.

## Consequences

- Theme code must not own business logic.
- Core/plugin code must not depend on one specific visual layout.
- Phase specifications should define which features belong to theme and which belong to core.
- Future WordPress code must be created only after Phase 1 technical specification is accepted.

