# Phase 1 Taxonomy Registration Audit

Datum: 2026-04-26

## Umfang

Geprüft wurde die Phase-1 Public-Taxonomy-Registrierung im Plugin `ciml-core`.

Geprüfte Grundlagen:

- `docs/decisions/0004-phase-1-core-implementation-gate.md`
- `docs/qa/phase-1-taxonomy-registration-report.md`
- `src/wp-content/plugins/ciml-core/includes/taxonomies/register.php`
- `src/wp-content/plugins/ciml-core/includes/post-types/register.php`
- `tests/phpunit/PluginStructureTest.php`
- `composer.json`
- `git status`

## Bestandene Prüfungen

### Erlaubte Taxonomien

In `ciml_core_get_public_taxonomies()` sind genau diese fünf Taxonomien definiert:

| Taxonomie | Zugeordneter CPT | Status |
| --- | --- | --- |
| `ciml_ministry_category` | `ciml_ministry` | Bestanden |
| `ciml_sermon_series` | `ciml_sermon` | Bestanden |
| `ciml_sermon_speaker` | `ciml_sermon` | Bestanden |
| `ciml_event_category` | `ciml_event` | Bestanden |
| `ciml_team_role` | `ciml_team_member` | Bestanden |

Die Registrierung erfolgt über:

```php
add_action( 'init', 'ciml_core_register_taxonomies' );
```

Status: Bestanden.

### Keine Contact-Taxonomie

Es wird keine Taxonomie für `ciml_contact_message` registriert.

Der String `ciml_contact_message` kommt nur in Negativtests vor:

- `tests/phpunit/PluginStructureTest.php`

Status: Bestanden.

### Scope-Grenzen

Es wurden keine neuen Implementierungen gefunden für:

- Meta Fields;
- Admin Pages;
- Rollen oder Capabilities;
- Formulare oder Formularverarbeitung;
- Demo-Daten-Installation;
- Phase-2-5 Features;
- sensible Module.

Status: Bestanden.

### Theme und Prototypes

Keine Änderungen an:

- `prototypes/`
- `src/wp-content/themes/ciml-theme/`

Status: Bestanden.

### PHP Lint

Ausgeführt:

```sh
php -l src/wp-content/plugins/ciml-core/includes/taxonomies/register.php
```

Ergebnis:

```text
No syntax errors detected in src/wp-content/plugins/ciml-core/includes/taxonomies/register.php
```

Status: Bestanden.

### Composer Test

Ausgeführt:

```sh
composer test
```

Ergebnis:

```text
OK (14 tests, 40 assertions)
```

Status: Bestanden.

### PHPUnit Direktlauf

Ausgeführt:

```sh
vendor/bin/phpunit
```

Ergebnis:

```text
OK (14 tests, 40 assertions)
```

Status: Bestanden.

## Offene Punkte

- Die Tests sind weiterhin Strukturtests ohne echte WordPress-Runtime.
- Die Taxonomie-Registrierung wurde noch nicht in einer laufenden WordPress-Installation aktiviert geprüft.
- Es gibt noch keine Meta Fields für Sortierung, Sichtbarkeit oder fachliche Zusatzdaten.
- Options, Admin Pages, Rollen/Capabilities, Formulare und Demo-Daten bleiben spätere separate Schritte.
- `ciml_contact_message` bleibt blockiert, bis Datenschutz, Routing, Retention und Security Gate entschieden sind.

## Blocker

Keine Blocker für den aktuellen Phase-1 Public-Taxonomy-Scope.

Blocker vor weiteren aktiven Core-Schritten:

- Vor Meta Fields muss entschieden werden, welche Felder als Post Meta und welche als Options geführt werden.
- Vor Admin Pages und Rollen/Capabilities sollte eine WordPress-Runtime- oder Integrationstestbasis verfügbar sein.
- Vor Contact- oder Formularlogik müssen Datenschutz, Routing, Retention, Spam-Schutz und Security Gate entschieden sein.

## Nächste empfohlene Schritte

1. Eine separate Gate-Entscheidung für den nächsten Core-Schritt erstellen.
2. Als nächstes eher risikoarme öffentliche Options oder read-only Data Provider vorbereiten.
3. Meta Fields nur nach klarer Feldliste und Teststrategie ergänzen.
4. Formulare, `ciml_contact_message`, Admin Pages, Rollen/Capabilities und Demo-Daten weiterhin nicht implementieren.

## Ergebnis

Die Phase-1 Public-Taxonomy-Registrierung hält den erlaubten Scope ein.

Registriert werden nur die fünf öffentlichen Taxonomien für die bereits registrierten Public-CPTs. Es wird keine Taxonomie für `ciml_contact_message` registriert. PHP- und PHPUnit-Prüfungen sind bestanden.
