# CImL Phase 2 – Technische Umsetzungsspezifikation

## 1. Ziel

Phase 2 baut die Module, die Menschen aktiv mit dem Gemeindeleben verbinden:

1. Kleingruppen
2. Kurse / Nächste Schritte
3. Mitarbeit / Dienen
4. Event-Anmeldungen
5. News / Berichte
6. Zeugnisse
7. einfache Gebetsanliegen

Die Phase folgt dem vorhandenen Projektplan: Phase 2 umfasst Kleingruppen, Kurse, Mitarbeit, News, Zeugnisse, Event-Anmeldungen und einfache Gebetsanliegen. Sensible Bereiche wie Seelsorge und vertrauliche Gebetsverwaltung bleiben Phase 3.

## 2. Nicht-Ziele

In Phase 2 NICHT bauen:

- Seelsorge-Fallverwaltung
- vertrauliche Gebetsteam-Plattform
- Mitgliederbereich
- Dienstpläne
- interne Dokumente
- Kinderschutz-Meldeformular
- Zahlungsabwicklung
- medizinische oder psychologische Krisenverwaltung

## 3. Technische Grundannahmen

- WordPress
- Logik bevorzugt in `ciml-core`
- Design/Frontend bevorzugt in `ciml-theme`
- Demo-Daten dürfen installiert werden
- personenbezogene Anfrage-Daten dürfen nicht öffentlich ausgegeben werden
- alle Formulare brauchen Nonce, Validierung, Sanitizing und Datenschutz-Checkbox

## 4. Neue Custom Post Types

### 4.1 `ciml_smallgroup`

Zweck: Kleingruppen und Hauskreise verwalten.

Admin-Felder:

- Gruppenname
- Kurzbeschreibung
- Langbeschreibung
- Leiter
- Co-Leiter
- interner Kontakt
- Stadtteil
- öffentlicher Treffpunkt
- private Adresse
- Wochentag
- Uhrzeit
- Rhythmus
- Sprache
- Zielgruppe
- Thema
- maximale Teilnehmerzahl
- aktuelle Teilnehmerzahl
- Kinder möglich
- Anmeldung offen
- Sichtbarkeit
- Status
- Bild
- Sortierung

Frontend:

- Kartenansicht
- Filter
- Detailansicht
- Anfragebutton

### 4.2 `ciml_course`

Zweck: Glaubensgrundkurs, Taufkurs, Mitgliedschaftskurs, Bibelkurs, Mitarbeiterschulung.

Admin-Felder:

- Kurstitel
- Kategorie
- Kurzbeschreibung
- Langbeschreibung
- Zielgruppe
- Startdatum
- Enddatum
- Uhrzeit
- Dauer
- Ort
- Leiter
- interner Kontakt
- Teilnehmerlimit
- Anmeldung offen
- Kostenhinweis
- Material-Link
- Status
- Sichtbarkeit
- Bild

Frontend:

- Kursübersicht
- Kursdetail
- Anmeldung

### 4.3 `ciml_volunteer_area`

Zweck: Mitarbeit-Bereiche beschreiben.

Admin-Felder:

- Titel
- Kategorie
- Beschreibung
- Voraussetzungen
- Schulung erforderlich
- Kinderschutz erforderlich
- Ansprechpartner
- interner Kontakt
- Status
- Sichtbarkeit
- Bild

Frontend:

- Mitarbeit-Übersicht
- Bereichskarten
- Anfrageformular

### 4.4 `ciml_news`

Zweck: Gemeindeleben, Berichte und Ankündigungen.

Admin-Felder:

- Titel
- Kategorie
- Auszug
- Inhalt
- Autor-Anzeige
- Veröffentlichungsdatum
- Bild
- Lesedauer
- Hervorgehoben
- Sichtbarkeit
- Status

Frontend:

- News-Grid
- Detailseite
- Kategorie-Filter

### 4.5 `ciml_testimony`

Zweck: Zeugnisse kontrolliert veröffentlichen.

Admin-Felder:

- Titel
- Zeugnistext
- Anzeigename
- anonym anzeigen
- Alter optional
- Kategorie
- Video-Link
- Bild
- Einwilligung vorhanden
- Einwilligungsdatum
- freigegeben durch
- Sichtbarkeit
- Status

Frontend:

- Zeugnisse-Grid
- keine Veröffentlichung ohne Einwilligung

## 5. Formular-Entry-Typen

### 5.1 `ciml_smallgroup_request`

Speichert Kleingruppen-Anfragen.

Status: `new`, `reviewed`, `assigned`, `contacted`, `completed`, `archived`.

### 5.2 `ciml_course_signup`

Speichert Kursanmeldungen.

Status: `new`, `confirmed`, `waitlisted`, `declined`, `completed`, `archived`.

### 5.3 `ciml_event_signup`

Erweitert Phase-1-Events um echte Anmeldung.

Status: `new`, `confirmed`, `waitlisted`, `declined`, `cancelled`, `completed`, `archived`.

### 5.4 `ciml_volunteer_request`

Speichert Mitarbeit-Anfragen.

Status: `new`, `reviewed`, `assigned`, `contacted`, `training`, `active`, `declined`, `archived`.

### 5.5 `ciml_testimony_submission`

Speichert eingereichte Zeugnisse, aber veröffentlicht sie nicht automatisch.

Status: `new`, `reviewed`, `needs_consent`, `approved`, `converted_to_testimony`, `declined`, `archived`.

### 5.6 `ciml_prayer_request_simple`

Nimmt einfache Gebetsanliegen auf.

Status: `new`, `reviewed`, `redirect_to_care`, `completed`, `archived`.

Wichtig: Keine automatische Veröffentlichung. Keine Seelsorge-Fallverwaltung.

## 6. Admin-Menü Phase 2

CImL Portal

- Übersicht
- Inhalte
  - Kleingruppen
  - Kurse
  - Mitarbeit-Bereiche
  - News
  - Zeugnisse
- Anfragen
  - Kleingruppen-Anfragen
  - Kurs-Anmeldungen
  - Event-Anmeldungen
  - Mitarbeit-Anfragen
  - Zeugnis-Einreichungen
  - Einfache Gebetsanliegen
- Einstellungen
  - Anfrage-Empfänger
  - Formulartexte
  - Datenschutz-Hinweise
  - Status-Vorlagen
  - Demo-Daten Phase 2

## 7. Rollen und Capabilities

- `administrator`: alles
- `ciml_manager`: alle Phase-2-Module und Anfragen
- `ciml_editor`: News, Zeugnisse, Kurse und Kleingruppen vorbereiten
- `ciml_event_manager`: Events und Event-Anmeldungen
- `ciml_smallgroup_coordinator`: Kleingruppen und Kleingruppen-Anfragen
- `ciml_course_manager`: Kurse und Kurs-Anmeldungen
- `ciml_ministry_leader`: eigene Mitarbeit-Bereiche und Anfragen
- `ciml_prayer_reviewer`: einfache Gebetsanliegen prüfen, keine Seelsorge

## 8. Sicherheitsregeln

Für alle Formulare:

- Nonce/CSRF-Schutz
- Honeypot-Feld
- serverseitige Validierung
- Sanitizing
- Escaping
- Datenschutz-Checkbox
- kein öffentliches Listing von Anfragen
- keine REST-Ausgabe personenbezogener Anfrage-Daten
- keine Einträge in Sitemap/RSS/Suche
- Statusänderungen protokollieren
- Lösch-/Archivierungslogik vorbereiten

## 9. Demo-Daten

Die Datei `phase2-demo-data.json` enthält ausgedachte Eckdaten für:

- 4 Kleingruppen
- 4 Kurse
- 6 Mitarbeit-Bereiche
- 3 News-Beiträge
- 3 Zeugnisse
- Beispiel-Anfragen für jedes Formular

Alle Daten sind Demo-Daten und müssen im Admin als solche markiert sein.

## 10. Reihenfolge der technischen Umsetzung

1. Taxonomien registrieren
2. CPTs registrieren
3. Meta-Felder definieren
4. Formular-Entry-Typen definieren
5. Admin-Menü erweitern
6. Rollen/Capabilities ergänzen
7. Demo-Daten-Importer bauen
8. Frontend-Templates bauen
9. Formulare bauen
10. Anfrage-Adminlisten bauen
11. Statuslogik bauen
12. Sicherheitstest
13. Responsive Test
14. Abnahme

## 11. Definition of Done

Phase 2 ist technisch fertig, wenn:

- alle CPTs funktionieren
- alle Demo-Daten importierbar sind
- alle Frontend-Übersichten sichtbar sind
- alle Formulare validieren
- alle Anfragen intern gespeichert oder kontrolliert verarbeitet werden
- keine Anfrage öffentlich sichtbar ist
- Rollenprüfung bestanden ist
- keine sensiblen Phase-3-Daten verarbeitet werden
- Admin kann Status ändern
- Demo-Daten können gelöscht werden
