# Phase 1 Taxonomy Registration Report

Datum: 2026-04-26

## Umfang

Implementiert und geprüft wurde der nächste Phase-1 Core-Schritt: Registrierung der öffentlichen Low-Risk-Taxonomien im Plugin `ciml-core`.

Geänderte Bereiche:

- `src/wp-content/plugins/ciml-core/includes/taxonomies/register.php`
- `tests/phpunit/PluginStructureTest.php`

Nicht geändert wurden:

- `prototypes/`
- `src/wp-content/themes/ciml-theme/`
- andere Plugin-Module

## Implementierte Taxonomien

Registriert werden nur diese fünf öffentlichen Phase-1 Taxonomien:

| Taxonomie | Zugeordneter CPT | Hierarchical | Public | REST |
| --- | --- | --- | --- | --- |
| `ciml_ministry_category` | `ciml_ministry` | true | true | true |
| `ciml_sermon_series` | `ciml_sermon` | false | true | true |
| `ciml_sermon_speaker` | `ciml_sermon` | false | true | true |
| `ciml_event_category` | `ciml_event` | true | true | true |
| `ciml_team_role` | `ciml_team_member` | true | true | true |

Die Registrierung erfolgt kontrolliert über:

```php
add_action( 'init', 'ciml_core_register_taxonomies' );
```

## Bewusst nicht implementiert

Nicht implementiert wurden:

- Taxonomien für `ciml_contact_message`;
- Meta Fields;
- Admin Pages;
- Rollen oder Capabilities;
- Formulare oder Formularverarbeitung;
- Demo-Daten;
- Theme-Rendering-Änderungen;
- Phase-2-5 Features;
- sensible Module.

## Tests

### PHP Lint

Ausgeführt:

```sh
php -l src/wp-content/plugins/ciml-core/includes/taxonomies/register.php
php -l tests/phpunit/PluginStructureTest.php
```

Ergebnis:

```text
No syntax errors detected in src/wp-content/plugins/ciml-core/includes/taxonomies/register.php
No syntax errors detected in tests/phpunit/PluginStructureTest.php
```

### Composer Test

Ausgeführt:

```sh
composer test
```

Ergebnis:

```text
OK (14 tests, 40 assertions)
```

### PHPUnit Direktlauf

Ausgeführt:

```sh
vendor/bin/phpunit
```

Ergebnis:

```text
OK (14 tests, 40 assertions)
```

## Ergänzte PHPUnit-Abdeckung

Ergänzt wurden Tests für:

- Existenz der Taxonomie-Registrierungsfunktion;
- Existenz der Taxonomie-Definitionsfunktion;
- Hook-Registrierung auf `init`;
- exakte erlaubte Taxonomie-Liste mit fünf Taxonomien;
- Ausschluss von Taxonomien für `ciml_contact_message`.

## Scope-Prüfung

Bestanden:

- `prototypes/` unverändert;
- Theme-Dateien unverändert;
- keine Meta Fields;
- keine Rollen-/Capability-Registrierung;
- keine Admin Pages;
- keine Formularverarbeitung;
- kein `ciml_contact_message`;
- keine Demo-Daten;
- keine Phase-2-5 Features;
- keine sensiblen Module.

## Offene Grenzen

- Die Tests sind weiterhin Strukturtests ohne echte WordPress-Runtime.
- Taxonomie-Registrierung wurde noch nicht in einer laufenden WordPress-Installation aktiviert geprüft.
- Options, Meta Fields, Admin Pages, Rollen, Capabilities, Demo-Daten und Formulare bleiben separate spätere Schritte.
- Contact-Message-Speicherung bleibt blockiert, bis Datenschutz, Routing, Retention und Security Gate entschieden sind.

## Ergebnis

Der Phase-1 Taxonomy-Schritt ist umgesetzt: `ciml-core` registriert nur die fünf öffentlichen Taxonomien für bereits registrierte Public-CPTs. Die bestehenden Scope-Grenzen bleiben eingehalten, und die PHP-/PHPUnit-Prüfungen sind grün.
