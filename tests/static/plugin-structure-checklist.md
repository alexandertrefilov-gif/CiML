# Plugin Structure Checklist

Target: `src/wp-content/plugins/ciml-core/`

## Required Installable Plugin Files

- [ ] `ciml-core.php` exists.
- [ ] `ciml-core.php` contains `Plugin Name: CiML Core`.
- [ ] `ciml-core.php` contains a plugin description.
- [ ] `ciml-core.php` contains `Text Domain: ciml-core`.

## Placeholder Structure

- [ ] `includes/post-types/` exists.
- [ ] `includes/taxonomies/` exists.
- [ ] `includes/options/` exists.
- [ ] `includes/admin/` exists.
- [ ] `includes/forms/` exists.
- [ ] `includes/security/` exists.
- [ ] `includes/demo-data/` exists.
- [ ] `includes/helpers/` exists.

## Core Logic Boundary

- [ ] Plugin contains only placeholders at skeleton stage.
- [ ] Plugin does not implement real CPTs yet.
- [ ] Plugin does not implement real roles/capabilities yet.
- [ ] Plugin does not implement real contact form processing yet.
- [ ] Plugin does not implement real admin pages yet.
- [ ] Plugin does not implement Phase 2-5 features.
- [ ] Plugin does not implement sensitive modules without a security gate.

## Future Test Coverage

When a PHP test environment exists, add tests for:

- plugin header detection;
- activation/deactivation behavior;
- CPT registration after implementation;
- taxonomy registration after implementation;
- option registration after implementation;
- capability checks after implementation;
- contact form validation after implementation;
- admin page authorization after implementation.

Executable PHP lint was not run because PHP is not installed in the local environment.

