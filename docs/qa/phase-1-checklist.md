# Phase 1 QA Checklist

Project: CiML / Christus ist mein Leben  
Date: 2026-04-26  
Status: checklist for future implementation

This checklist is for validating the future Phase 1 WordPress implementation. It does not imply WordPress code exists yet.

## 1. Scope Gate

- [ ] Phase 1 follows `docs/specs/phase-1-technical-spec.md`.
- [ ] Visual style follows `prototypes/active/ciml_phase1_live.html`.
- [ ] No typography, color, layout, or component redesign was introduced without a new decision.
- [ ] No Phase 2 workflow is active.
- [ ] No Phase 3 sensitive module is active.
- [ ] No members area, rosters, internal documents, or payment processing exists.

## 2. Architecture

- [ ] Presentation code is in `ciml-theme`.
- [ ] Portal logic is in `ciml-core`.
- [ ] Theme does not register CPTs, roles, admin pages, or process forms.
- [ ] Plugin does not hard-code visual layout details that belong to the theme.
- [ ] Plugin activation and deactivation do not break public rendering.

## 3. Public Modules

- [ ] Homepage hero renders from editable data.
- [ ] Service information bar renders editable service data.
- [ ] First visitor section renders editable text, checklist, CTA, and status note.
- [ ] Community profile renders editable text, image, checklist, and stats.
- [ ] Statement of faith cards render from `ciml_belief_item`.
- [ ] Ministries render from `ciml_ministry`.
- [ ] Sermons/media render from `ciml_sermon`.
- [ ] Events render from `ciml_event`.
- [ ] Team profiles render from `ciml_team_member`.
- [ ] Donation info block renders editable info only, with no payment processing.
- [ ] Legal section renders reviewed placeholders or production legal text.
- [ ] Footer contact data renders from editable options.

## 4. Admin Pages

- [ ] `CImL Portal` admin menu exists.
- [ ] Overview page shows Phase 1 module status.
- [ ] Startseite settings save correctly.
- [ ] Gottesdienste settings save correctly.
- [ ] Gemeinde settings save correctly.
- [ ] Glaubensgrundlage content is manageable.
- [ ] Dienste content is manageable.
- [ ] Predigten content is manageable.
- [ ] Veranstaltungen content is manageable.
- [ ] Team content is manageable.
- [ ] Kontakt settings and submissions are manageable.
- [ ] Rechtliches settings save correctly.
- [ ] Spenden settings save correctly.
- [ ] Demo-Daten page can install and reset demo data.
- [ ] Admin pages are hidden from unauthorized users.

## 5. Data Models

- [ ] `ciml_belief_item` is registered correctly.
- [ ] `ciml_ministry` is registered correctly.
- [ ] `ciml_sermon` is registered correctly.
- [ ] `ciml_event` is registered correctly.
- [ ] `ciml_team_member` is registered correctly.
- [ ] `ciml_contact_message` is private and not publicly queryable.
- [ ] Taxonomies are registered and editable.
- [ ] Sort order and visibility controls work.
- [ ] Draft/private content does not appear publicly.

## 6. Contact Form

- [ ] Form includes nonce/CSRF protection.
- [ ] Form includes honeypot spam protection.
- [ ] Name is required and length-limited.
- [ ] Email is required and validated.
- [ ] Topic accepts only allowed values.
- [ ] Message is required and length-limited.
- [ ] Privacy consent is required.
- [ ] Invalid submissions show clear errors.
- [ ] Valid submissions are stored privately or routed according to approved storage rules.
- [ ] Contact submissions are not exposed in public pages.
- [ ] Contact submissions are not exposed in REST, search, sitemap, archive, or feed output.
- [ ] Email notifications do not leak unnecessary personal data.

## 7. Security

- [ ] All admin saves verify nonce.
- [ ] All admin saves verify capability.
- [ ] All user input is sanitized.
- [ ] All public output is escaped according to context.
- [ ] URLs are validated before output.
- [ ] Uploaded/selected images are restricted to allowed media types.
- [ ] Unauthorized users cannot access CImL admin pages.
- [ ] Public visitors cannot see admin controls.
- [ ] `ciml_contact_message` cannot be queried publicly.
- [ ] No sensitive Phase 3 capability or role is present.

## 8. Demo Data

- [ ] Demo data can be installed.
- [ ] Demo data is marked in admin.
- [ ] Demo data can be reset/deleted.
- [ ] Demo data does not overwrite production content without explicit confirmation.
- [ ] Public demo markers are used only where appropriate.
- [ ] Dashboard shows demo-data status.

## 9. Visual and Responsive QA

- [ ] Desktop layout matches the Phase 1 prototype.
- [ ] Tablet layout is usable and does not overlap.
- [ ] Mobile layout is usable and does not overlap.
- [ ] Header remains readable and stable.
- [ ] Hero image and overlay render correctly.
- [ ] Cards keep stable proportions.
- [ ] Buttons and labels fit their containers.
- [ ] Contact form is usable on mobile.
- [ ] Footer remains readable on mobile.
- [ ] No visual regression from the active prototype without approval.

## 10. Accessibility Basics

- [ ] Skip link exists and works.
- [ ] Main landmark exists.
- [ ] Navigation has an accessible label.
- [ ] Images have meaningful alt text or are correctly decorative.
- [ ] Form labels are connected to inputs.
- [ ] Focus states are visible.
- [ ] Color contrast is acceptable for primary text and controls.
- [ ] Heading order is coherent.

## 11. Performance and Assets

- [ ] CSS and JavaScript are enqueued through WordPress APIs.
- [ ] No unnecessary frontend scripts load on every page.
- [ ] Images are appropriately sized.
- [ ] External fonts are loaded intentionally.
- [ ] No broken image URLs.
- [ ] No broken internal anchors.
- [ ] No PHP warnings or notices in debug mode.

## 12. Release Gate

Phase 1 is release-candidate ready only when:

- [ ] all critical checklist items pass;
- [ ] known non-critical issues are documented;
- [ ] legal placeholders are either reviewed or clearly blocked from production launch;
- [ ] contact form security passes;
- [ ] role/capability checks pass;
- [ ] demo-data lifecycle works;
- [ ] release decision is recorded in `docs/decisions/`.

