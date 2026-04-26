# Theme Structure Checklist

Target: `src/wp-content/themes/ciml-theme/`

## Required Installable Theme Files

- [ ] `style.css` exists.
- [ ] `style.css` contains `Theme Name: CiML Theme`.
- [ ] `style.css` contains a theme description.
- [ ] `style.css` contains `Text Domain: ciml-theme`.
- [ ] `index.php` exists.
- [ ] `functions.php` exists.
- [ ] `header.php` exists.
- [ ] `footer.php` exists.
- [ ] `front-page.php` exists.

## Presentation Boundary

- [ ] Theme does not register Custom Post Types.
- [ ] Theme does not register taxonomies.
- [ ] Theme does not create roles or capabilities.
- [ ] Theme does not process contact forms.
- [ ] Theme does not create admin pages.
- [ ] Theme does not implement Phase 2-5 features.

## Phase 1 Visual Boundary

- [ ] Theme skeleton references Phase 1 only.
- [ ] Theme preserves the approved visual direction from `prototypes/active/ciml_phase1_live.html`.
- [ ] Theme does not modify prototype files.
- [ ] Any later visual change requires a decision document.

## Current Structural Result

At the time this checklist was created, the required skeleton files were present:

- `style.css`
- `index.php`
- `functions.php`
- `header.php`
- `footer.php`
- `front-page.php`

Executable PHP lint was not run because PHP is not installed in the local environment.

