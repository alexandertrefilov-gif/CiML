# Phase 1 CPT Registration Audit

Datum: 2026-04-26

## Umfang

Geprüft wurde die Phase-1 Public-CPT-Registrierung im Plugin `ciml-core`.

Geprüfte Grundlagen:

- `docs/decisions/0004-phase-1-core-implementation-gate.md`
- `docs/qa/phase-1-cpt-registration-report.md`
- `src/wp-content/plugins/ciml-core/includes/post-types/register.php`
- `tests/phpunit/PluginStructureTest.php`
- `composer.json`
- `.gitignore`
- `git status`

## Bestandene Prüfungen

### Erlaubte CPT-Liste

In `ciml_core_get_public_post_types()` sind genau diese fünf CPTs definiert:

- `ciml_belief_item`
- `ciml_ministry`
- `ciml_sermon`
- `ciml_event`
- `ciml_team_member`

Status: Bestanden.

### Verbotener Contact-CPT

`ciml_contact_message` wird nicht registriert.

Der String kommt nur im Negativtest vor:

- `tests/phpunit/PluginStructureTest.php`

Status: Bestanden.

### Scope-Grenzen

Es wurden keine neuen Implementierungen gefunden für:

- Taxonomien;
- Meta Fields;
- Admin Pages;
- Rollen oder Capabilities;
- Formulare oder Formularverarbeitung;
- Demo-Daten-Installation;
- Phase-2-5 Features;
- sensible Module.

Hinweis: Bestehende Placeholder-Dateien für spätere Module sind weiterhin vorhanden, aber sie registrieren keine aktiven Funktionen.

Status: Bestanden.

### Theme und Prototypes

Keine Änderungen an:

- `prototypes/`
- `src/wp-content/themes/ciml-theme/`

Status: Bestanden.

### PHP Lint

Ausgeführt:

```sh
php -l src/wp-content/plugins/ciml-core/includes/post-types/register.php
```

Ergebnis:

```text
No syntax errors detected in src/wp-content/plugins/ciml-core/includes/post-types/register.php
```

Status: Bestanden.

### Composer Test

Ausgeführt:

```sh
composer test
```

Ergebnis:

```text
OK (10 tests, 30 assertions)
```

Status: Bestanden.

### PHPUnit Direktlauf

Ausgeführt:

```sh
vendor/bin/phpunit
```

Ergebnis:

```text
OK (10 tests, 30 assertions)
```

Status: Bestanden.

### Commit-Status von Tooling-Artefakten

`vendor/` und `.phpunit.cache/` sind nicht committed.

Geprüft mit:

```sh
git ls-files vendor .phpunit.cache
```

Ergebnis: keine getrackten Dateien.

Status: Bestanden fuer "nicht committed".

## Offene Punkte

- `.gitignore` schließt `vendor/` und `.phpunit.cache/` aktuell nicht aus.
- Deshalb erscheinen beide Verzeichnisse weiterhin als untracked im Arbeitsbaum.
- Die CPT-Registrierung wurde noch nicht in einer echten WordPress-Runtime aktiviert geprüft.
- Die Tests bleiben Strukturtests und ersetzen keine WordPress-Integrationstests.
- Taxonomien, Meta Fields, Admin Pages, Rollen/Capabilities, Formulare und Demo-Daten bleiben separate spätere Schritte.

## Blocker

Kein Blocker für den aktuellen CPT-Registration-Scope.

Blocker vor weiteren aktiven Core-Schritten:

- `.gitignore` sollte in einem separaten Maintenance-Schritt um `vendor/` und `.phpunit.cache/` ergänzt werden.
- Vor Contact- oder Formularlogik müssen Datenschutz, Routing, Retention, Spam-Schutz und Security Gate entschieden sein.
- Vor Admin Pages und Rollen/Capabilities sollte eine WordPress-Runtime- oder Integrationstestbasis verfügbar sein.

## Nächste empfohlene Schritte

1. In einem separaten Maintenance-Schritt `.gitignore` um lokale Tooling-Artefakte ergänzen:
   - `vendor/`
   - `.phpunit.cache/`
2. Danach als nächsten Phase-1 Core-Schritt eine eigene Gate-Entscheidung für Taxonomien vorbereiten.
3. Erst nach separater Freigabe Taxonomien für die bereits registrierten Public-CPTs implementieren.
4. Formulare, `ciml_contact_message`, Admin Pages, Rollen/Capabilities und Demo-Daten weiterhin nicht implementieren.

## Ergebnis

Die Phase-1 Public-CPT-Registrierung hält die Entscheidung `0004-phase-1-core-implementation-gate.md` ein.

Registriert werden nur die fünf erlaubten öffentlichen CPTs. `ciml_contact_message` wird nicht registriert. Die PHP- und PHPUnit-Prüfungen sind bestanden.
