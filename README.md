# CiML

CiML is the planning and prototype repository for the church portal **Christus ist mein Leben**.

The project goal is a modular WordPress-based portal with two clearly separated sides:

- public website for visitors;
- protected admin/editor area for church leadership and authorized workers.

The repository currently contains planning documents, HTML prototypes, phase execution packages, audit notes, and a development roadmap. It does **not** yet contain production WordPress code.

## Current Status

Status: planning and prototype stage.

Ready:

- project concept and module roadmap;
- Phase 1 public portal HTML prototype;
- Phase 2 target HTML prototype;
- Phase 2-5 execution packages;
- project audit and development roadmap;
- architecture decisions for the next development steps.

Not ready yet:

- installable WordPress theme;
- `ciml-core` plugin;
- real Custom Post Types, taxonomies, roles, capabilities;
- real admin screens;
- production form handling;
- hosting, deployment, backup/restore process.

## Structure

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
```

## File Roles

- `AUDIT.md` describes what exists, what is duplicated, what is misplaced, and what structure should guide development.
- `ROADMAP.md` defines the recommended development sequence.
- `docs/concept/` contains the overall project summary.
- `docs/planning/` contains the module agenda and phase roadmap.
- `docs/decisions/` contains accepted project decisions.
- `prototypes/active/` contains the active visual references for Phase 1 and Phase 2.
- `prototypes/reference/` contains older or alternative visual reference material.
- `archives/` stores the original ZIP packages.
- `phases/` contains the unpacked phase packages used for planning and later implementation.

## Development Rules

- Do not rewrite the project from scratch.
- Do not change the visual style without a separate decision.
- Keep presentation in the future `ciml-theme`.
- Keep portal logic, data models, roles, forms, and admin features in the future `ciml-core`.
- Do not implement Phase 2-5 before Phase 1 is specified, built, and accepted.
- Do not build sensitive Phase 3 modules without a security gate.

## Next Step

Create the Phase 1 technical specification before writing WordPress code:

```text
docs/specs/phase-1-technical-spec.md
docs/qa/phase-1-checklist.md
```

After that, create the WordPress skeleton for:

- `src/wp-content/themes/ciml-theme`
- `src/wp-content/plugins/ciml-core`

