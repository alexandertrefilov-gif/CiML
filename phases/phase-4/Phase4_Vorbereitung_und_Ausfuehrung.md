# CImL – Phase 4 Vorbereitung und Ausführung

Projekt: Christus ist mein Leben  
Phase: 4 – Mitgliederbereich und interne Gemeindestruktur  
Ziel: geschützter interner Bereich für Gemeindemitglieder, Mitarbeiter und Leitung.

---

## 1. Grundsatz

Phase 4 baut nicht die öffentliche Webseite weiter aus, sondern den geschützten internen Bereich.

Die öffentliche Seite bleibt für Besucher einfach.  
Der Mitgliederbereich ist nur nach Login sichtbar.

Wichtig:
Mitgliederbereich bedeutet nicht automatisch Zugriff auf sensible Seelsorge- oder Gebetsdaten.  
Phase 3 bleibt ein separater Hochsicherheitsbereich.

---

## 2. Phase-4-Module

| Modul | Zweck | Risiko |
|---|---|---|
| M24 Mitgliederbereich | geschützter Login-Bereich für Gemeindemitglieder | Hoch |
| M25 Interne Termine | interne Gemeindetermine, Diensttreffen, Schulungen | Mittel |
| M26 Dienstpläne | Dienstpläne für Teams und Mitarbeiter | Hoch |
| M27 Interne Dokumente | Schulungsmaterial, Protokolle, PDFs, Leitfäden | Hoch |
| M28 Schulungen | interne Mitarbeiterschulung, Material, Fortschritt | Mittel |
| M29 Interne Nachrichten | zielgruppenbezogene interne Hinweise | Mittel |
| M30 Mitgliederprofil | einfache Stammdaten, Rollen, Teams | Hoch |
| M31 Downloads | geschützte Dateien je Rolle/Team | Hoch |

---

## 3. Nicht-Ziele in Phase 4

Nicht bauen:

- offene Mitgliederliste für alle
- private Adressen öffentlich im Mitgliederbereich
- Seelsorgefälle im Mitgliederbereich
- vertrauliche Gebetsfälle im Mitgliederbereich
- Kinderschutzfälle im Mitgliederbereich
- Chat-System ohne Moderation
- Zahlungsverwaltung
- automatische personenbezogene Auswertungen

---

## 4. Rollenmodell Phase 4

### Rollen

| Rolle | Bedeutung |
|---|---|
| ciml_member | bestätigtes Gemeindemitglied |
| ciml_team_member | Mitarbeiter in einem Dienst |
| ciml_team_leader | Dienstleiter / Teamleiter |
| ciml_training_manager | Schulungsverwaltung |
| ciml_document_manager | interne Dokumente verwalten |
| ciml_membership_manager | Mitgliederzugang verwalten |
| ciml_leadership | Leitung / Pastor |
| administrator | technische Vollrechte |

### Grundregel

Ein Mitglied sieht nur Inhalte, die für seine Rolle, Gruppe oder sein Team freigegeben sind.

---

## 5. Datenmodell

### 5.1 Mitgliederprofil

Technischer Typ: `ciml_member_profile`

Felder:

| Feld | Typ | Pflicht | Hinweis |
|---|---|---|---|
| user_id | WordPress User ID | Ja | verbunden mit WP-Benutzer |
| member_status | Select | Ja | pending / active / paused / archived |
| display_name_public | Text | Ja | im internen Bereich |
| phone_private | Text | Nein | nur berechtigte Rollen |
| email | E-Mail | Ja | User-E-Mail |
| teams | Relation | Nein | Dienst-Teams |
| smallgroups | Relation | Nein | Kleingruppen |
| training_status | Relation | Nein | absolvierte Schulungen |
| consent_internal_area | Boolean | Ja | Einwilligung |
| created_at | Datetime | Ja | intern |
| updated_at | Datetime | Ja | intern |

Status:

- pending
- active
- paused
- archived
- access_revoked

---

### 5.2 Interner Termin

Technischer Typ: `ciml_internal_event`

Felder:

| Feld | Typ | Pflicht |
|---|---|---|
| title | Text | Ja |
| description | WYSIWYG | Nein |
| start_date | Date | Ja |
| start_time | Time | Nein |
| end_date | Date | Nein |
| end_time | Time | Nein |
| location | Text | Nein |
| target_roles | Multi Select | Ja |
| target_teams | Relation | Nein |
| registration_required | Boolean | Nein |
| status | Select | Ja |
| visibility | Select | Ja |

---

### 5.3 Dienstplan

Technischer Typ: `ciml_roster`

Felder:

| Feld | Typ | Pflicht |
|---|---|---|
| title | Text | Ja |
| team | Relation | Ja |
| service_date | Date | Ja |
| service_time | Time | Nein |
| role_slot | Text | Ja |
| assigned_user | User ID | Nein |
| backup_user | User ID | Nein |
| status | Select | Ja |
| notes_internal | Textarea | Nein |
| published_to_team | Boolean | Ja |

Status:

- draft
- published
- changed
- confirmed
- cancelled
- archived

---

### 5.4 Internes Dokument

Technischer Typ: `ciml_internal_document`

Felder:

| Feld | Typ | Pflicht |
|---|---|---|
| title | Text | Ja |
| description | Textarea | Nein |
| file_id | Media/File | Ja |
| document_category | Taxonomy | Ja |
| target_roles | Multi Select | Ja |
| target_teams | Relation | Nein |
| version | Text | Nein |
| expires_at | Date | Nein |
| status | Select | Ja |
| download_allowed | Boolean | Ja |
| view_log_enabled | Boolean | Ja |

Kategorien:

- Schulung
- Protokoll
- Leitfaden
- Dienstplan
- Formular
- Vorlage
- Rechtliches intern

---

### 5.5 Schulung

Technischer Typ: `ciml_training`

Felder:

| Feld | Typ | Pflicht |
|---|---|---|
| title | Text | Ja |
| description | WYSIWYG | Ja |
| target_roles | Multi Select | Ja |
| target_teams | Relation | Nein |
| material_file | File | Nein |
| video_url | URL | Nein |
| completion_required | Boolean | Ja |
| quiz_required | Boolean | Nein |
| status | Select | Ja |

Teilnahme-Entry: `ciml_training_completion`

| Feld | Typ | Pflicht |
|---|---|---|
| training_id | Relation | Ja |
| user_id | User ID | Ja |
| status | Select | Ja |
| completed_at | Datetime | Nein |
| confirmed_by | User ID | Nein |

---

### 5.6 Interne Nachricht

Technischer Typ: `ciml_internal_notice`

Felder:

| Feld | Typ | Pflicht |
|---|---|---|
| title | Text | Ja |
| message | WYSIWYG | Ja |
| priority | Select | Ja |
| target_roles | Multi Select | Ja |
| target_teams | Relation | Nein |
| publish_from | Datetime | Ja |
| publish_until | Datetime | Nein |
| status | Select | Ja |

Priority:

- normal
- important
- urgent

---

## 6. Sichtbarkeit

| Sichtbarkeit | Bedeutung |
|---|---|
| member_only | alle aktiven Mitglieder |
| team_only | nur bestimmtes Team |
| leader_only | Leitung / Teamleiter |
| role_based | bestimmte Rollen |
| admin_only | Administrator |
| hidden | ausgeblendet |

---

## 7. Admin-Struktur Phase 4

CImL Portal

- Mitgliederbereich
  - Übersicht
  - Mitgliederzugänge
  - Interne Termine
  - Dienstpläne
  - Interne Dokumente
  - Schulungen
  - Interne Nachrichten
  - Downloads
  - Zugriffsprüfung
  - Einwilligungen

---

## 8. Sicherheitsregeln

1. Mitgliederbereich ist nur nach Login sichtbar.
2. Interne Seiten erhalten `noindex`.
3. Jede interne Datei wird über Berechtigungsprüfung ausgeliefert.
4. Direkte Datei-URLs vermeiden oder absichern.
5. Keine Seelsorge- oder Gebetsfälle im Mitgliederbereich.
6. Keine Kinderschutzfälle im Mitgliederbereich.
7. Dienstpläne nur für betroffene Teams/Rollen.
8. Zugriff auf interne Dokumente optional protokollieren.
9. Rollenwechsel muss protokolliert werden.
10. Mitgliedszugang kann deaktiviert werden.
11. Datenschutz-Einwilligung für internen Bereich erforderlich.
12. Export/Löschung von Mitgliederdaten vorbereiten.

---

## 9. Demo-Daten

Demo-Teams:

- Lobpreis
- Medien & Technik
- Empfang
- Kinderarbeit
- Diakonie
- Kleingruppenleitung

Demo-Mitglieder:

- Daniel Hoffmann – Leitung
- Maria Hoffmann – Seelsorge / Leitung
- Anna Schneider – Lobpreis / Medien
- Viktor Neumann – Technik / Organisation
- Elena Fischer – Kinderarbeit
- Markus Weber – Jugend / Kleingruppen

Demo-Dienstplan:

- Sonntag 10:00 Gottesdienst
- Lobpreis: Anna Schneider
- Ton: Viktor Neumann
- Beamer: Leon Maier
- Empfang: Julia Weber
- Kinderarbeit: Elena Fischer

Demo-Dokumente:

- Mitarbeiter-Leitfaden
- Schutzkonzept Kurzfassung
- Technik-Checkliste
- Lobpreis-Ablauf
- Empfangsleitfaden

Demo-Schulungen:

- Grundlagen Mitarbeit
- Datenschutz im Dienst
- Kinderschutz-Basisschulung
- Technik-Einweisung

---

## 10. Phase-4-Gates

Phase 4 darf erst freigegeben werden, wenn:

- Login-Schutz funktioniert
- noindex aktiv ist
- Rollenprüfung bestanden ist
- interne Dateien nicht öffentlich direkt abrufbar sind
- keine Phase-3-Daten im Mitgliederbereich sichtbar sind
- Dienstpläne nur berechtigten Teams sichtbar sind
- Mitgliederzugänge deaktivierbar sind
- Demo-Daten löschbar sind

---

## 11. Definition of Done

Phase 4 gilt als vorbereitet und ausführbar, wenn:

1. Mitgliederrollen definiert sind.
2. Datenmodell für Profile, Termine, Dienstpläne, Dokumente und Schulungen steht.
3. Admin-Struktur definiert ist.
4. Sicherheitsregeln dokumentiert sind.
5. Demo-Daten erstellt sind.
6. HTML-Vorschau den Mitgliederbereich zeigt.
7. klare Grenze zu Phase 3 eingehalten wird.
