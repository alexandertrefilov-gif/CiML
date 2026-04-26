# Phase 1 Read-Only Helpers Report

Datum: 2026-04-26

## Umfang

Implementiert und geprüft wurde ein read-only Helper Layer für öffentliche Phase-1 Inhalte im Plugin `ciml-core`.

Geänderte Bereiche:

- `src/wp-content/plugins/ciml-core/includes/helpers/register.php`
- `tests/phpunit/PluginStructureTest.php`
- `tests/bootstrap.php`

Nicht geändert wurden:

- `prototypes/`
- `src/wp-content/themes/ciml-theme/`
- CPT-Registrierung
- Taxonomie-Registrierung
- Admin-, Forms-, Options-, Security- oder Demo-Data-Module

## Implementierte Helper

Ergänzt wurden nur read-only Helper:

- `ciml_core_get_public_content_post_types()`
- `ciml_core_is_public_content_post_type( $post_type )`
- `ciml_core_get_public_content_query_args( $post_type, $limit = 10 )`

Die Helper führen keine Datenbankabfrage aus.

## Erlaubte CPTs

Die Helper erlauben genau diese öffentlichen Phase-1 CPTs:

- `ciml_belief_item`
- `ciml_ministry`
- `ciml_sermon`
- `ciml_event`
- `ciml_team_member`

`ciml_contact_message` ist nicht erlaubt.

## Query-Args-Verhalten

Für erlaubte CPTs gibt `ciml_core_get_public_content_query_args()` konservative read-only Query-Argumente zurück:

- `post_type`
- `post_status` als `publish`
- `posts_per_page` mit Obergrenze `50`
- `orderby`
- `order`
- `no_found_rows`
- `ignore_sticky_posts`
- deaktivierte Meta- und Term-Cache-Aktualisierung

Für nicht erlaubte CPTs gibt die Funktion einen sicheren Fallback zurück:

```php
array()
```

## Bewusst nicht implementiert

Nicht implementiert wurden:

- `WP_Query`
- `get_posts()`
- `wp_insert_post()`
- Admin Hooks
- Form Hooks
- REST/AJAX Hooks
- Meta Fields
- Options UI
- Rollen oder Capabilities
- Formulare oder Formularverarbeitung
- Demo-Daten
- Theme-Rendering-Änderungen
- Phase-2-5 Features
- sensible Module

## Tests

### PHP Lint

Ausgeführt:

```sh
php -l src/wp-content/plugins/ciml-core/includes/helpers/register.php
php -l tests/bootstrap.php
```

Ergebnis:

```text
No syntax errors detected in src/wp-content/plugins/ciml-core/includes/helpers/register.php
No syntax errors detected in tests/bootstrap.php
```

### Composer Test

Ausgeführt:

```sh
composer test
```

Ergebnis:

```text
OK (18 tests, 52 assertions)
```

### PHPUnit Direktlauf

Ausgeführt:

```sh
vendor/bin/phpunit
```

Ergebnis:

```text
OK (18 tests, 52 assertions)
```

## Ergänzte PHPUnit-Abdeckung

Ergänzt wurden Tests für:

- exakte erlaubte CPT-Liste mit fünf Public-CPTs;
- Ausschluss von `ciml_contact_message`;
- sichere read-only Query-Args für erlaubte CPTs;
- sicherer Fallback für verbotene CPTs.

Zusätzlich wurde in `tests/bootstrap.php` ein minimaler `absint()`-Stub ergänzt, damit die WordPress-nahe Helper-Validierung ohne echte WordPress-Runtime testbar bleibt.

## Scope-Prüfung

Bestanden:

- `prototypes/` unverändert;
- Theme-Dateien unverändert;
- keine Admin Pages;
- keine Rollen-/Capability-Registrierung;
- keine Formulare;
- kein `ciml_contact_message`;
- keine Demo-Daten;
- keine Meta Fields;
- keine Options UI;
- keine Phase-2-5 Features;
- keine sensiblen Module.

## Offene Grenzen

- Die Tests bleiben Struktur- und Helper-Tests ohne echte WordPress-Runtime.
- Die Helper liefern nur Query-Args; die spätere Nutzung im Theme ist noch nicht implementiert.
- Eine WordPress-Integrationstestbasis fehlt weiterhin.
- Meta Fields, Options, Admin Pages, Rollen/Capabilities, Formulare und Demo-Daten bleiben separate spätere Schritte.

## Ergebnis

Der read-only Helper Layer ist umgesetzt und bleibt innerhalb des erlaubten Phase-1 Scopes. Es werden keine Datenbankabfragen ausgeführt und keine produktiven Workflows aktiviert.
