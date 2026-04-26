# Phase 1 CPT Registration Report

Datum: 2026-04-26

## Umfang

Implementiert und geprüft wurde der erste durch `docs/decisions/0004-phase-1-core-implementation-gate.md` freigegebene Core-Schritt: Registrierung der öffentlichen Low-Risk-CPTs im Plugin `ciml-core`.

Geänderte Bereiche:

- `src/wp-content/plugins/ciml-core/includes/post-types/register.php`
- `tests/phpunit/PluginStructureTest.php`

Nicht geändert wurden:

- `prototypes/`
- `src/wp-content/themes/ciml-theme/`
- andere Plugin-Module

## Implementierte CPTs

Registriert werden nur diese fünf öffentlichen Phase-1 Content-CPTs:

| CPT | Zweck | Public | REST | Archive |
| --- | --- | --- | --- | --- |
| `ciml_belief_item` | Glaubensgrundlagen | true | true | false |
| `ciml_ministry` | Dienste | true | true | false |
| `ciml_sermon` | Predigten/Mediathek | true | true | false |
| `ciml_event` | Veranstaltungen | true | true | false |
| `ciml_team_member` | Teamprofile | true | true | false |

Die Registrierung erfolgt kontrolliert über:

```php
add_action( 'init', 'ciml_core_register_post_types' );
```

## Bewusst nicht implementiert

Nicht implementiert wurden:

- `ciml_contact_message`
- Taxonomien
- Meta Fields
- Admin Pages
- Rollen oder Capabilities
- Formulare oder Formularverarbeitung
- Demo-Daten
- Theme-Rendering-Änderungen
- Phase-2-5 Features
- sensible Module

## Tests

### PHP Lint

Ausgeführt für die geänderten PHP-Dateien:

```sh
php -l src/wp-content/plugins/ciml-core/includes/post-types/register.php
php -l tests/phpunit/PluginStructureTest.php
```

Ergebnis:

```text
No syntax errors detected in src/wp-content/plugins/ciml-core/includes/post-types/register.php
No syntax errors detected in tests/phpunit/PluginStructureTest.php
```

### Composer Test

Ausgeführt:

```sh
composer test
```

Ergebnis:

```text
OK (10 tests, 30 assertions)
```

### PHPUnit Direktlauf

Ausgeführt:

```sh
vendor/bin/phpunit
```

Ergebnis:

```text
OK (10 tests, 30 assertions)
```

## Ergänzte PHPUnit-Abdeckung

Ergänzt wurden Tests für:

- Existenz der CPT-Registrierungsfunktion;
- Existenz der CPT-Definitionsfunktion;
- Hook-Registrierung auf `init`;
- exakte erlaubte CPT-Liste mit fünf CPTs;
- Ausschluss von `ciml_contact_message`.

## Scope-Prüfung

Bestanden:

- `prototypes/` unverändert;
- Theme-Dateien unverändert;
- keine Taxonomie-Registrierung;
- keine Rollen-/Capability-Registrierung;
- keine Admin Pages;
- keine Formularverarbeitung;
- kein `ciml_contact_message`;
- keine Demo-Daten;
- keine Phase-2-5 Features;
- keine sensiblen Module.

Hinweis: `vendor/` und `.phpunit.cache/` bleiben lokale Tooling-Artefakte und werden nicht committed.

## Offene Grenzen

- Die Tests sind weiterhin Strukturtests ohne echte WordPress-Runtime.
- CPT-Registrierung wurde nicht in einer laufenden WordPress-Installation aktiviert geprüft.
- Taxonomien, Optionen, Admin Pages, Rollen, Capabilities, Demo-Daten und Formulare bleiben separate spätere Schritte.
- Contact-Message-Speicherung bleibt blockiert, bis Datenschutz, Routing, Retention und Security Gate entschieden sind.

## Ergebnis

Der erste erlaubte Core-Schritt ist umgesetzt: `ciml-core` registriert nur die fünf freigegebenen öffentlichen Phase-1 CPTs. Die bestehenden Scope-Grenzen bleiben eingehalten, und die PHP-/PHPUnit-Prüfungen sind grün.
