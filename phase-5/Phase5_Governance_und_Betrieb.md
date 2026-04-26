# CImL – Phase 5 Governance und Betrieb

Projekt: Christus ist mein Leben  
Phase: 5 – Governance, Betrieb, Audit und Release-Sicherheit  
Ziel: Das Portal wird nicht nur gebaut, sondern kontrolliert betrieben, geprüft, gesichert und wartbar gemacht.

---

## 1. Grundsatz

Phase 5 ist die Betriebs- und Governance-Phase.

Nach Phase 1–4 existieren:
- öffentliche Webseite
- Gemeindeleben-Module
- sensible Begleitungslogik
- Mitgliederbereich

Phase 5 beantwortet die Frage:

Wie bleibt das System sicher, nachvollziehbar, wartbar und kontrolliert?

---

## 2. Phase-5-Module

| Modul | Zweck | Risiko |
|---|---|---|
| M32 Audit-Log | Nachvollziehbarkeit von Änderungen und Zugriffen | Hoch |
| M33 Freigabe-Workflow | Inhalte vor Veröffentlichung prüfen | Mittel/Hoch |
| M34 Backup- und Restore-Konzept | Wiederherstellung bei Fehlern | Hoch |
| M35 Export / Löschung | DSGVO-Auskunft, Export und Löschprozesse | Hoch |
| M36 Rollen-Review | regelmäßige Rechteprüfung | Hoch |
| M37 Systemstatus | technische Übersicht über Portalzustand | Mittel |
| M38 Wartungsmodus | kontrollierte Wartung ohne Chaos | Mittel |
| M39 Release-Gates | GO/NO-GO vor Updates und Deployments | Hoch |
| M40 Dokumentation | technische und organisatorische Betriebsdokumentation | Mittel |
| M41 Incident-Prozess | Umgang mit Datenschutz-, Sicherheits- oder Systemvorfällen | Hoch |
| M42 Mehrsprachigkeit-Vorbereitung | spätere DE/RU/EN-Struktur betrieblich vorbereiten | Mittel |

---

## 3. Nicht-Ziele in Phase 5

Nicht bauen:

- neue große Frontend-Funktionen
- neue Seelsorgeprozesse
- neue Mitgliederfunktionen
- unkontrollierte Admin-Freigaben
- automatisierte Löschung ohne menschliche Prüfung
- automatische Veröffentlichung sensibler Inhalte
- produktive Zahlungsabwicklung

Phase 5 stabilisiert, prüft und regelt das System.

---

## 4. Governance-Struktur

### 4.1 Betriebsrollen

| Rolle | Aufgabe |
|---|---|
| Portal Owner | fachliche Gesamtverantwortung |
| Technical Admin | WordPress, Hosting, Updates, Backups |
| Content Lead | Freigabe öffentlicher Inhalte |
| Data Protection Lead | Datenschutz, Löschung, Export, Einwilligungen |
| Security Reviewer | Audit, Zugriffe, Rollenprüfung |
| Release Manager | Deployment, GO/NO-GO, Rollback |
| Incident Coordinator | Vorfälle koordinieren |

---

## 5. Audit-Log

Technischer Typ: `ciml_audit_log`

### Ereignisse

| Event | Beschreibung |
|---|---|
| login_success | erfolgreicher Login |
| login_failed | fehlgeschlagener Login |
| content_created | Inhalt erstellt |
| content_updated | Inhalt geändert |
| content_deleted | Inhalt gelöscht |
| content_published | Inhalt veröffentlicht |
| sensitive_viewed | sensibler Eintrag geöffnet |
| sensitive_status_changed | Status sensibler Eintrag geändert |
| role_changed | Rolle/Berechtigung geändert |
| file_downloaded | interne Datei heruntergeladen |
| export_created | Export erstellt |
| deletion_requested | Löschung beantragt |
| deletion_completed | Löschung abgeschlossen |
| settings_changed | Portal-Einstellung geändert |
| release_started | Release gestartet |
| release_completed | Release abgeschlossen |
| rollback_started | Rollback gestartet |
| incident_created | Vorfall erstellt |

### Felder

| Feld | Typ | Pflicht |
|---|---|---|
| log_id | UUID | Ja |
| event_type | Select | Ja |
| user_id | User ID | Nein |
| actor_role | Text | Nein |
| object_type | Text | Nein |
| object_id | Text | Nein |
| object_label | Text | Nein |
| ip_hash | Text | Nein |
| user_agent_hash | Text | Nein |
| severity | Select | Ja |
| message | Textarea | Ja |
| created_at | Datetime | Ja |

Severity:
- info
- notice
- warning
- critical

Regel:
Audit-Logs dürfen nicht von normalen Redakteuren gelöscht werden.

---

## 6. Freigabe-Workflow

Technischer Typ: `ciml_approval_flow`

### Content-Status

- draft
- ready_for_review
- changes_requested
- approved
- scheduled
- published
- archived

### Pflicht für öffentliche Inhalte

| Inhalt | Freigabe erforderlich |
|---|---|
| Startseite | Ja |
| Gottesdienste | Ja |
| Dienste | optional |
| Predigten | optional, aber empfohlen |
| News | Ja |
| Zeugnisse | Ja, zwingend mit Einwilligung |
| Spendenhinweise | Ja |
| Rechtliches | Ja |
| Schutzkonzept | Ja |
| interne Dokumente | nach Zielgruppe |

### Felder

| Feld | Typ |
|---|---|
| content_id | Relation |
| submitted_by | User ID |
| reviewed_by | User ID |
| approval_status | Select |
| review_comment | Textarea |
| submitted_at | Datetime |
| reviewed_at | Datetime |

---

## 7. Backup und Restore

### Backup-Kategorien

| Kategorie | Inhalt |
|---|---|
| DB Backup | WordPress-Datenbank |
| Files Backup | Uploads, Theme, Plugin |
| Config Backup | Einstellungen, Rollen, Capabilities |
| Export Backup | strukturierte Portal-Daten |
| Pre-Release Backup | Sicherung vor Deployment |

### Regeln

- automatisches tägliches Backup
- zusätzliches Backup vor jedem Release
- Restore-Test mindestens monatlich
- Backup-Status im Admin sichtbar
- Rollback-Anleitung dokumentiert
- keine sensiblen Exportdateien ungeschützt speichern

---

## 8. Export / Löschung / DSGVO

### Exporttypen

| Export | Zweck |
|---|---|
| member_data_export | Mitgliederdaten |
| request_data_export | Kontakt-/Anfragedaten |
| sensitive_data_export | Seelsorge/Gebet nur streng berechtigt |
| content_export | öffentliche Inhalte |
| audit_export | Audit-Protokoll |

### Löschprozess

Status:

- deletion_requested
- verified
- scheduled_for_deletion
- deleted
- deletion_denied
- archived_due_to_retention

Regeln:

- keine automatische Löschung sensibler Daten ohne Prüfung
- Löschung wird protokolliert
- gesetzliche/organisatorische Aufbewahrungsfristen beachten
- Export vor Löschung optional möglich
- Löschanforderung nur durch berechtigte Rollen abschließen

---

## 9. Rollen-Review

### Regelmäßiger Review

- monatlich: Admin- und Managerrollen prüfen
- quartalsweise: Teamleiter und interne Rollen prüfen
- sofort: nach Mitarbeiterwechsel
- sofort: nach Sicherheitsvorfall

### Prüfpunkte

- Hat der Benutzer noch Funktion?
- Braucht er die Rolle noch?
- Hat er sensible Rechte?
- Ist 2FA nötig?
- Wann war letzter Login?
- Gibt es inaktive Admins?

---

## 10. Systemstatus

Admin-Dashboard zeigt:

- WordPress-Version
- Theme-Version
- Core-Plugin-Version
- letzte Backups
- letzter Restore-Test
- offene Freigaben
- offene Löschanfragen
- offene Security-Hinweise
- Demo-Daten aktiv / nicht aktiv
- Suchmaschinen-Schutz interner Seiten
- REST-Block sensibler Daten
- Rollenprüfung Status
- letzte Incidents

---

## 11. Wartungsmodus

Funktionen:

- Wartungsmodus aktivieren
- Meldung für Besucher
- Admin-Zugang bleibt aktiv
- interne Vorschau für berechtigte Rollen
- Startzeit / Endzeit
- Grund der Wartung
- Verantwortlicher
- Protokollierung im Audit-Log

---

## 12. Release-Gates

Jeder Release bekommt ein GO/NO-GO.

### Release-Checkliste

- Backup erstellt
- Restore-Punkt dokumentiert
- Changelog vorhanden
- betroffene Module benannt
- Sicherheitsprüfung bestanden
- Rollenprüfung bestanden
- Formularprüfung bestanden
- mobile Prüfung bestanden
- rechtliche Seiten unverändert oder geprüft
- Demo-Daten nicht produktiv sichtbar
- Rollback-Plan vorhanden

### Status

- planned
- in_review
- approved
- blocked
- deployed
- rolled_back
- failed

---

## 13. Incident-Prozess

Technischer Typ: `ciml_incident`

### Incident-Arten

- security
- privacy
- availability
- content_error
- data_loss
- access_error
- release_failure

### Severity

- SEV1 kritisch
- SEV2 hoch
- SEV3 mittel
- SEV4 niedrig

### Felder

| Feld | Typ |
|---|---|
| incident_id | UUID |
| title | Text |
| severity | Select |
| type | Select |
| description | Textarea |
| detected_at | Datetime |
| owner | User ID |
| status | Select |
| actions_taken | Textarea |
| resolved_at | Datetime |
| postmortem_required | Boolean |

Status:

- open
- investigating
- contained
- resolved
- postmortem
- closed

---

## 14. Dokumentation

Pflichtdokumente:

- Systemübersicht
- Rollenmatrix
- Modulmatrix
- Backup-/Restore-Anleitung
- Release-Prozess
- Incident-Prozess
- Datenschutzprozess
- Export-/Löschprozess
- Admin-Handbuch
- Redaktionshandbuch
- Sicherheitscheckliste
- Phase-Gates

---

## 15. Demo-Daten Phase 5

Demo-Release:

- Release: Phase 2.1 – Kursanmeldungen verbessert
- Status: in_review
- Backup: erfolgreich
- Gate: wartet auf Rollenprüfung

Demo-Incident:

- Titel: Demo – falscher Zugriff auf internes Dokument verhindert
- Severity: SEV3
- Status: contained
- Maßnahme: Rollenprüfung angepasst

Demo-Audit:

- Anna Schneider hat internes Dokument heruntergeladen
- Viktor Neumann hat Dienstplan geändert
- Daniel Hoffmann hat Release Review freigegeben
- System hat Backup erfolgreich erstellt

---

## 16. Phase-5-Gates

Phase 5 ist erst abgeschlossen, wenn:

1. Audit-Log-Modell steht.
2. Freigabe-Workflow steht.
3. Backup-/Restore-Konzept dokumentiert ist.
4. Export-/Löschprozess dokumentiert ist.
5. Rollen-Review-Prozess definiert ist.
6. Release-Gate definiert ist.
7. Incident-Prozess definiert ist.
8. Admin-Dashboard für Betrieb geplant ist.
9. HTML-Vorschau Governance zeigt.
10. Dokumentationsstruktur steht.

---

## 17. Definition of Done

Phase 5 gilt als fachlich abgeschlossen, wenn das Portal nicht nur Funktionen hat, sondern kontrolliert betrieben werden kann:

- Änderungen sind nachvollziehbar.
- Releases sind prüfbar.
- Backups sind geregelt.
- Rollen werden regelmäßig geprüft.
- Datenschutzprozesse sind sichtbar.
- Vorfälle haben Prozess.
- Betrieb ist dokumentiert.
