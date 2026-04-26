# Phase 1 Plugin Foundation Audit

Datum: 2026-04-26

## Umfang

Geprüft wurde die aktuelle Phase-1 Plugin/Core Foundation von `ciml-core`.

Gelesene Grundlagen:

- `README.md`
- `AUDIT.md`
- `ROADMAP.md`
- `docs/specs/phase-1-technical-spec.md`
- `docs/qa/phase-1-checklist.md`
- `docs/implementation/phase-1-implementation-plan.md`
- `docs/implementation/phase-1-file-map.md`
- `docs/decisions/0001-project-architecture.md`
- `docs/decisions/0002-phase-1-scope.md`
- `docs/decisions/0003-visual-style-freeze.md`
- `docs/qa/phase-1-theme-presentation-audit.md`

Geprüfte Codebereiche:

- `src/wp-content/plugins/ciml-core/`
- `src/wp-content/themes/ciml-theme/` nur zur Scope-Abgrenzung
- `prototypes/` nur zur Änderungsprüfung

## Erkannter nächster Schritt

Nach dem abgeschlossenen Theme-Presentation-Audit und der neuen Plugin-Core-Foundation ist der nächste sichere Schritt ein struktureller Audit der Plugin-Foundation.

Eine weitere Implementierung von CPTs, Taxonomien, Optionen, Admin Pages, Rollen, Formularen oder Demo-Daten wäre noch zu früh, weil:

- die Foundation gerade erst als Placeholder-Struktur angelegt wurde;
- Phase 1 noch nicht vollständig gegen QA- und Release-Gates geprüft ist;
- Kontaktformular, Datenschutz, Retention und Routing weiterhin offene Entscheidungen enthalten;
- keine lokale PHP-/WordPress-Testumgebung verfügbar ist.

## Bestanden

### Plugin-Struktur

Die geplanten Phase-1 Plugin-Bereiche sind vorhanden:

| Bereich | Pfad | Status |
| --- | --- | --- |
| Bootstrap | `includes/bootstrap.php` | Bestanden |
| Post Types | `includes/post-types/register.php` | Bestanden |
| Taxonomies | `includes/taxonomies/register.php` | Bestanden |
| Options | `includes/options/register.php` | Bestanden |
| Admin | `includes/admin/register.php` | Bestanden |
| Forms | `includes/forms/register.php` | Bestanden |
| Security | `includes/security/register.php` | Bestanden |
| Demo Data | `includes/demo-data/register.php` | Bestanden |
| Helpers | `includes/helpers/register.php` | Bestanden |

### Kontrolliertes Laden

`ciml-core.php` definiert den Plugin-Include-Pfad und lädt `includes/bootstrap.php` über `plugins_loaded`.

`includes/bootstrap.php` lädt die vorhandenen Placeholder-Dateien kontrolliert über eine kleine Loader-Funktion.

Status: Bestanden.

### Keine aktiven Datenmodelle

Es wurden keine aktiven WordPress-Datenmodelle registriert:

- keine CPT-Registrierung;
- keine Taxonomy-Registrierung;
- keine Option- oder Settings-Registrierung;
- keine Meta-Registrierung;
- keine privaten Contact-Message-Modelle.

Status: Bestanden.

### Keine Admin-, Rollen- oder Formularlogik

Es wurden keine aktiven Verwaltungs- oder Eingabeprozesse gefunden:

- keine Admin-Menüs;
- keine Admin Pages;
- keine Rollen;
- keine Capabilities;
- keine Formularhandler;
- keine AJAX- oder REST-Handler;
- keine E-Mail-Verarbeitung;
- keine Speicherung von Nutzereingaben.

Status: Bestanden.

### Keine Phase-2-5 Features

Es wurden keine Phase-2-5 Features aktiviert:

- keine Kleingruppen- oder Kurs-Workflows;
- keine Event-Anmeldung;
- keine Zeugnis- oder Gebetsanfrage-Workflows;
- keine Seelsorge- oder vertraulichen Module;
- kein Mitgliederbereich;
- keine Dienstpläne;
- keine Zahlungsabwicklung;
- keine Governance- oder Incident-Workflows.

Status: Bestanden.

### Theme- und Prototype-Grenzen

Die Prüfung ergab keine Änderungen an:

- `prototypes/`
- `src/wp-content/themes/ciml-theme/`

Das Theme bleibt Presentation Layer. Die neue Prüfung hat keine Theme-Logik verändert.

Status: Bestanden.

## Offen

- PHP-CLI ist in der aktuellen Umgebung nicht verfügbar.
- Composer ist in der aktuellen Umgebung nicht verfügbar.
- PHPUnit ist in der aktuellen Umgebung nicht verfügbar.
- `vendor/bin/phpunit` ist nicht vorhanden.
- PHP-Syntaxprüfung und WordPress-Plugin-Aktivierungstest konnten daher nicht ausgeführt werden.
- Eine echte WordPress-Runtime für Aktivierungs-, Admin- und Frontend-Prüfungen fehlt.
- Kontaktformular-Speicherung, Routing, Retention und Datenschutzfreigabe sind weiterhin offen.
- Rechtstexte und Produktionsdaten sind weiterhin offen.

## Blocker

Keine Blocker für den aktuellen Placeholder-Foundation-Scope.

Blocker vor dem nächsten funktionalen Core-Schritt:

- PHP-/WordPress-Testumgebung fehlt.
- Kontaktformular-Entscheidungen sind nicht abgeschlossen.
- Rechtliche Freigaben für Kontakt, Datenschutz, Spendenhinweise und Impressum fehlen.
- Phase-1 Release Gate ist noch nicht bestanden.

## Bewusst nicht implementiert

Nicht implementiert wurden:

- echte CPTs;
- echte Taxonomien;
- echte Option Groups;
- Admin Pages;
- Rollen oder Capabilities;
- Formularverarbeitung;
- Demo-Daten-Installer;
- öffentliche Datenprovider;
- Security Gates für sensitive Module;
- Phase-2-5 Features.

## Prüfresultat

Die Phase-1 Plugin/Core Foundation ist als Placeholder-Struktur stimmig und hält die Architekturgrenzen ein.

Der nächste Implementierungsschritt sollte erst nach einer verfügbaren PHP-/WordPress-Testumgebung und einer klaren Entscheidung über die erste risikoarme Core-Funktion erfolgen.

## Empfohlener nächster Schritt

Als nächstes sollte die QA-/Testbasis für den Plugin-Core konkretisiert werden:

1. PHP/Composer/PHPUnit oder eine WordPress-Testumgebung bereitstellen.
2. Danach einen minimalen Plugin-Bootstrap-Test ergänzen.
3. Erst danach mit dem ersten echten Core-Modul beginnen, vorzugsweise einem risikoarmen read-only/helper-orientierten Modul statt Kontaktformular oder Rollenverwaltung.
