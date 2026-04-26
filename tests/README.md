# CiML Test and QA Structure

Status: minimal QA foundation for the Phase 1 WordPress skeleton.

## Current Tool Availability

Checked in the local environment:

- PHP: not available (`php: command not found`)
- Composer: not available (`composer: command not found`)
- Global PHPUnit: not available (`phpunit: command not found`)
- Project PHPUnit: not available (`vendor/bin/phpunit: no such file or directory`)

Because no PHP test environment is available, this repository currently uses manual and static QA checklists only. No executable PHPUnit tests are included at this stage.

## Current QA Scope

The QA files in this directory validate structure only:

- the theme skeleton is structurally installable;
- the plugin skeleton is structurally installable;
- the Phase 1 boundary is respected;
- no Phase 2-5 features are present;
- prototypes remain unchanged.

## Files

- `tests/manual/phase-1-skeleton-checklist.md`
- `tests/static/theme-structure-checklist.md`
- `tests/static/plugin-structure-checklist.md`

## Future PHPUnit / WordPress Test Suite

When PHP and Composer are available, add PHPUnit in a separate step:

1. Add a project `composer.json` with PHPUnit and WordPress test tooling.
2. Add `phpunit.xml.dist`.
3. Install the WordPress test suite in a local test database.
4. Add plugin bootstrap tests for `ciml-core`.
5. Add theme smoke tests only for presentation behavior.
6. Add integration tests for CPTs, taxonomies, options, roles, forms, and admin pages only after those features are actually implemented.

Do not add tests for Phase 2-5 until their gates are approved.

