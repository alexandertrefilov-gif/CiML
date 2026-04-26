# Phase 1 Theme Presentation Audit

Datum: 2026-04-26

## Umfang

Geprüft wurde die abgeschlossene statische Phase-1 Theme-Presentation im bestehenden Repository CiML.

Geprüfte Quellen:

- `docs/specs/phase-1-technical-spec.md`
- `docs/qa/phase-1-checklist.md`
- `docs/implementation/phase-1-implementation-plan.md`
- `docs/implementation/phase-1-file-map.md`
- `prototypes/active/ciml_phase1_live.html`
- `src/wp-content/themes/ciml-theme/`

Nicht geändert wurden:

- `prototypes/`
- `src/wp-content/plugins/ciml-core/`
- bestehende Theme-Logik außerhalb dieser Audit-Dokumentation

## Ergebnis

Status: Bestanden mit offenen Punkten.

Die statische Phase-1 Theme-Presentation ist strukturell vollständig genug für den nächsten Review-Schritt. Es wurden keine Blocker gefunden, die gegen den aktuellen Scope sprechen.

## Bestanden

### Statische Public Sections

Alle aktuell erwarteten statischen Phase-1 Sections sind im Theme vorhanden und werden über `front-page.php` geladen.

| Section | Datei | Status |
| --- | --- | --- |
| Hero | `template-parts/sections/hero.php` | Bestanden |
| Service Bar | `template-parts/sections/service-bar.php` | Bestanden |
| First Visit | `template-parts/sections/first-visit.php` | Bestanden |
| Community Profile | `template-parts/sections/community-profile.php` | Bestanden |
| Beliefs | `template-parts/sections/beliefs.php` | Bestanden |
| Ministries | `template-parts/sections/ministries.php` | Bestanden |
| Sermons | `template-parts/sections/sermons.php` | Bestanden |
| Events | `template-parts/sections/events.php` | Bestanden |
| Team | `template-parts/sections/team.php` | Bestanden |
| Donation | `template-parts/sections/donation.php` | Bestanden |
| Contact | `template-parts/sections/contact.php` | Bestanden |
| Admin Preview | `template-parts/sections/admin-preview.php` | Bestanden |
| Agenda | `template-parts/sections/agenda.php` | Bestanden |
| Legal | `template-parts/sections/legal.php` | Bestanden |

### Reihenfolge in `front-page.php`

`front-page.php` lädt die Sections in einer sinnvollen öffentlichen Seitenreihenfolge:

1. Hero
2. Service Bar
3. First Visit
4. Community Profile
5. Beliefs
6. Ministries
7. Sermons
8. Events
9. Team
10. Donation
11. Contact
12. Admin Preview
13. Agenda
14. Legal

Die Reihenfolge entspricht dem Charakter einer statischen Phase-1 Startseite: Einstieg, Gemeindeprofil, Inhalte, praktische Informationen, danach Preview- und rechtliche Bereiche.

### Presentation-Layer-Grenze

Das Theme bleibt auf Presentation Layer beschränkt:

- Template Parts enthalten statisches Markup.
- Styles liegen in `assets/css/main.css`.
- UI-JavaScript liegt in `assets/js/main.js`.
- `functions.php` wird nur für Theme-Setup und Asset-Enqueueing genutzt.

Es wurden keine Hinweise auf Datenbanklogik, Formularverarbeitung, Rollenverwaltung, Admin Pages oder CPT-Registrierung im Theme gefunden.

### Keine Plugin- oder Core-Logik im Theme

Im Theme wurden keine Implementierungen für Core-Aufgaben gefunden:

- keine `register_post_type()`-Aufrufe
- keine `register_taxonomy()`-Aufrufe
- keine Rollen- oder Capability-Registrierung
- keine Admin-Menüs
- keine Aktivierungs-Hooks
- keine Speicherung oder Verarbeitung von Formulardaten
- keine E-Mail-Verarbeitung

Die Abgrenzung zwischen Theme und Plugin bleibt damit erhalten.

### Keine Phase-2-5 Features oder sensiblen Module

Es wurden keine produktiven Phase-2-5 Features implementiert.

Sensible oder spätere Module werden nur als statische Scope-Grenzen oder deaktivierte Hinweise erwähnt, nicht als Funktion:

- keine Seelsorgeverwaltung
- keine vertraulichen Gebetsdaten
- kein Mitgliederbereich
- keine Dienstplanverwaltung
- keine Zahlungsabwicklung
- keine produktive Admin-Funktion

Die Contact Section enthält nur statisches Markup mit deaktivierten Controls und keine echte Formularverarbeitung.

### Unveränderte Bereiche

Die Prüfung ergab keine Änderungen an:

- `prototypes/`
- `src/wp-content/plugins/ciml-core/`

## Offen

- Eine PHP-Syntaxprüfung konnte nicht ausgeführt werden, weil in der aktuellen Umgebung keine PHP-CLI verfügbar ist.
- Composer und PHPUnit sind in der aktuellen Umgebung ebenfalls nicht verfügbar.
- Eine Browser- oder WordPress-Runtime-Prüfung wurde nicht durchgeführt.
- Visuelle Abnahme gegen den aktiven Prototyp steht noch aus.
- Finale Texte, echte Kontaktdaten, rechtliche Inhalte und Datenschutzdetails bleiben fachlich offen.
- Dynamische Datenintegration über `ciml-core` ist absichtlich noch nicht umgesetzt.

## Blocker

Keine Blocker für den aktuellen statischen Phase-1 Presentation-Scope.

Blocker vor produktionsnaher Umsetzung:

- lokale oder Staging-WordPress-Umgebung fehlt
- PHP/Composer/PHPUnit-Testumgebung fehlt
- rechtliche Prüfung für Kontakt, Datenschutz, Spendenhinweise und Impressum fehlt
- fachliche Entscheidung zur späteren Datenquelle für Sermons, Events, Team und Kontakt fehlt

## Nächste empfohlene Schritte

1. Audit-Datei committen.
2. WordPress lokal oder auf Staging installieren und das Theme manuell aktivieren.
3. Visuelle Prüfung gegen `prototypes/active/ciml_phase1_live.html` durchführen.
4. PHP/Composer/PHPUnit-Umgebung ergänzen.
5. Danach die Plugin-Foundation für Phase 1 in kleinen Schritten vorbereiten, ohne Phase-2-5 Module zu aktivieren.
