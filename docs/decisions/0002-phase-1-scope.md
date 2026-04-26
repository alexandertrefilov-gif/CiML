# 0002 Phase 1 Scope

Date: 2026-04-26

## Decision

Phase 1 is the first implementation scope.

Phase 1 includes the public portal and low-risk admin/editor structure for:

- homepage;
- first visitor information;
- worship service information;
- community profile;
- statement of faith;
- ministries;
- sermons/media links;
- events;
- team/leadership;
- contact;
- legal placeholders;
- donation information block;
- basic dashboard/admin preview structure.

## Out of Scope

Phase 1 must not implement:

- smallgroups and courses as full connection workflows;
- event signup workflows;
- testimony submission workflows;
- sensitive care/seelsorge case management;
- confidential prayer team platform;
- members area;
- duty rosters;
- internal documents;
- payment processing.

## Acceptance Gate

Phase 1 can move forward only when:

- public content is editable from admin structures;
- forms have nonce, validation, sanitizing, escaping, spam protection, and privacy consent;
- no sensitive modules are active;
- demo data is clearly marked;
- frontend does not expose admin controls;
- responsive QA has passed.

