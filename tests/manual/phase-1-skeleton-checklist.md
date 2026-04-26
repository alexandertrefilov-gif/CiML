# Phase 1 Skeleton Manual QA Checklist

Use this checklist for the current skeleton before implementation work continues.

## Environment

- [ ] PHP availability has been checked.
- [ ] Composer availability has been checked.
- [ ] PHPUnit availability has been checked.
- [ ] Missing tools are documented in `tests/README.md`.

## Repository Boundaries

- [ ] Work happened inside the existing CiML repository.
- [ ] Existing project structure was not deleted.
- [ ] `prototypes/active/ciml_phase1_live.html` was not changed.
- [ ] `prototypes/active/ciml_phase2_after_execution.html` was not changed.
- [ ] No Phase 2-5 feature was implemented.
- [ ] No sensitive module was implemented without a security gate.

## Phase 1 Skeleton

- [ ] Theme directory exists: `src/wp-content/themes/ciml-theme/`.
- [ ] Plugin directory exists: `src/wp-content/plugins/ciml-core/`.
- [ ] Theme is presentation-only.
- [ ] Plugin contains only core-logic placeholders.
- [ ] No production promise is made by the skeleton.

## Next QA Step

- [ ] Run static checklist for theme structure.
- [ ] Run static checklist for plugin structure.
- [ ] Add executable tests only after PHP, Composer, PHPUnit, and WordPress test suite are available.

