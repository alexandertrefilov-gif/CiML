# CImL – Phase 3 Vorbereitung und Ausführung

Projekt: Christus ist mein Leben  
Phase: 3 – Sensible Begleitung  
Ziel: Gebetsanliegen, Seelsorge und Schutzbereiche sicher planen und als kontrollierte Portalstruktur vorbereiten.

---

## 1. Grundsatz

Phase 3 ist keine normale Funktionsphase.  
Sie behandelt sensible Daten und braucht deshalb strengere Regeln als Phase 1 und Phase 2.

Phase 3 darf nicht als „Kontaktformular plus Admin-Liste“ gebaut werden.  
Sie braucht ein eigenes Sicherheitsmodell.

---

## 2. Phase-3-Module

| Modul | Zweck | Risiko |
|---|---|---|
| M21 Seelsorge | Vertrauliche geistliche Begleitung anfragen und intern zuweisen | Kritisch |
| M22 Gebetsteam intern | Gebetsanliegen prüfen, freigeben, intern verteilen | Hoch |
| M23 Kinder- und Jugendschutz | Schutzkonzept, Ansprechpartner, Dokumente, Meldewege | Kritisch |
| M24 Sensible Anfrageverwaltung | Status, Zuweisung, Notizen, Löschung, Export | Kritisch |
| M25 Datenschutz / Einwilligungen | Einwilligung, Löschfristen, Einsichtsrechte | Hoch |
| M26 Security-Gate | Prüfung vor Aktivierung im Live-System | Kritisch |

---

## 3. Nicht-Ziele in Phase 3

Nicht bauen oder nur als Platzhalter dokumentieren:

- medizinische Diagnoseverwaltung
- psychologische Therapieplattform
- Notfall-Chat
- anonyme Krisenintervention ohne Personal
- automatische Veröffentlichung von Gebetsanliegen
- offene Mitgliederliste
- öffentliche Seelsorge-Notizen
- Zahlungs- oder Spendenverwaltung

---

## 4. Datenmodell

### 4.1 Seelsorge-Anfrage

Technischer Typ: `ciml_care_request`

Empfohlene Speicherung: separate geschützte Tabelle oder stark geschützter privater Entry-Type.  
Nicht als normaler öffentlicher WordPress-Beitrag behandeln.

Felder:

| Feld | Typ | Pflicht | Sichtbarkeit |
|---|---|---|---|
| request_id | UUID | Ja | intern |
| first_name | Text | Ja | Seelsorge |
| last_name | Text | Nein | Seelsorge |
| email | E-Mail | Ja | Seelsorge |
| phone | Text | Nein | Seelsorge |
| preferred_contact | Select | Ja | Seelsorge |
| topic | Select | Ja | Seelsorge |
| description | Textarea | Ja | Seelsorge |
| urgency | Select | Ja | Seelsorge |
| consent_privacy | Boolean | Ja | intern |
| consent_care_processing | Boolean | Ja | intern |
| assigned_to | User ID | Nein | Leitung/Seelsorge |
| status | Select | Ja | intern |
| sensitivity_level | Select | Ja | intern |
| internal_notes | Encrypted Textarea empfohlen | Nein | nur Berechtigte |
| created_at | Datetime | Ja | intern |
| updated_at | Datetime | Ja | intern |
| retention_until | Date | Ja | intern |

Status:

- new
- triage
- assigned
- contacted
- in_care
- referred_external
- completed
- closed
- archived
- deletion_requested

Urgency:

- normal
- soon
- urgent
- emergency_notice

Wichtig: Bei „emergency_notice“ muss die Webseite klar anzeigen: Bei akuter Gefahr bitte Notruf/ärztliche Hilfe nutzen. Das Portal ersetzt keine Notfallhilfe.

---

### 4.2 Gebetsanliegen intern

Technischer Typ: `ciml_prayer_request`

Felder:

| Feld | Typ | Pflicht | Sichtbarkeit |
|---|---|---|---|
| request_id | UUID | Ja | intern |
| first_name | Text | Nein | intern |
| email | E-Mail | Nein | intern |
| category | Select | Ja | intern |
| prayer_text | Textarea | Ja | intern |
| may_share_with_prayer_team | Boolean | Ja | intern |
| may_share_anonymized | Boolean | Nein | intern |
| response_requested | Boolean | Nein | intern |
| sensitivity_level | Select | Ja | intern |
| reviewed_by | User ID | Nein | Leitung/Gebet |
| assigned_group | Select | Nein | Leitung/Gebet |
| status | Select | Ja | intern |
| public_version | Textarea | Nein | nur falls freigegeben |
| created_at | Datetime | Ja | intern |
| retention_until | Date | Ja | intern |

Status:

- new
- review_required
- approved_for_prayer_team
- anonymized_for_team
- blocked_sensitive
- redirected_to_care
- completed
- archived
- deletion_requested

Sensitivity:

- normal
- sensitive
- highly_sensitive
- care_required
- child_protection_flag

Regel: Kein Gebetsanliegen wird automatisch öffentlich angezeigt.

---

### 4.3 Kinderschutz / Schutzkonzept

Technischer Typ: `ciml_safeguarding`

Phase 3 sollte zuerst öffentliche Schutzinformationen abbilden, keine Fallverwaltung für Kinderschutzfälle ohne gesondertes Konzept.

Felder:

| Feld | Typ | Pflicht |
|---|---|---|
| title | Text | Ja |
| public_summary | WYSIWYG | Ja |
| safeguarding_officer_name | Text | Ja |
| safeguarding_contact_email | E-Mail | Ja |
| emergency_instruction | Textarea | Ja |
| code_of_conduct_pdf | File | Nein |
| protection_concept_pdf | File | Nein |
| last_review_date | Date | Ja |
| next_review_date | Date | Nein |
| status | Select | Ja |

Wichtig: Meldeformular für Kinderschutzfälle nur nach Rechts-/Datenschutzprüfung aktivieren.

---

## 5. Rollen und Capabilities

Neue Rollen:

| Rolle | Zweck |
|---|---|
| ciml_care_lead | Seelsorge-Leitung, alle Seelsorgefälle |
| ciml_care_worker | Nur zugewiesene Seelsorgefälle |
| ciml_prayer_lead | Gebetsanliegen prüfen und freigeben |
| ciml_prayer_team | Nur freigegebene/anonymisierte Anliegen sehen |
| ciml_safeguarding_officer | Schutzkonzept verwalten |
| ciml_security_auditor | Audit-Log und Zugriff prüfen |

Capabilities:

- read_ciml_care_requests
- manage_ciml_care_requests
- assign_ciml_care_requests
- read_assigned_ciml_care_requests
- read_ciml_prayer_requests
- review_ciml_prayer_requests
- read_approved_prayer_items
- manage_ciml_safeguarding
- view_ciml_sensitive_audit
- export_ciml_sensitive_data
- delete_ciml_sensitive_data

---

## 6. Admin-Struktur Phase 3

CImL Portal

- Sensible Begleitung
  - Sicherheitsübersicht
  - Seelsorge-Anfragen
  - Gebetsanliegen prüfen
  - Freigegebene Gebetsliste
  - Schutzkonzept
  - Datenschutz / Einwilligungen
  - Audit-Log
  - Löschung / Export

---

## 7. Sicherheitsregeln

Pflicht:

1. Admin-Zugriff nur mit Capability-Prüfung.
2. Keine sensiblen Einträge in öffentlicher Suche.
3. Keine sensiblen Einträge in REST API.
4. Keine sensiblen Einträge in Sitemap/RSS.
5. Keine E-Mail mit vollständigen sensiblen Inhalten.
6. Benachrichtigung nur: „Neue Anfrage eingegangen“.
7. Interne Notizen nur für berechtigte Rollen.
8. Statusänderungen protokollieren.
9. Zugriff auf sensible Einträge protokollieren.
10. Lösch-/Archivierungslogik definieren.
11. Datenschutz-Einwilligung verpflichtend.
12. Notfallhinweis sichtbar.
13. Kinderschutzfälle nicht ohne Spezialkonzept als normales Formular sammeln.

Empfohlen:

- Verschlüsselung sensibler Notizen
- 2FA für Seelsorge-/Leitungsrollen
- kurzer Session-Timeout für sensible Bereiche
- Export nur für Administrator + Security Auditor
- keine personenbezogenen Daten in URL-Parametern

---

## 8. Demo-Daten

Demo-Daten dürfen nur intern sichtbar sein und müssen klar markiert werden.

Demo-Seelsorge:

- Person: „Demo Person A“
- Thema: Lebenskrise
- Dringlichkeit: normal
- Status: triage
- Sensitivity: sensitive

Demo-Gebet:

- Kategorie: Familie
- Text: Bitte betet für Frieden und Weisheit in einer schwierigen familiären Situation.
- Status: review_required
- Sensitivity: normal

Demo-Schutzkonzept:

- Ansprechpartner: Elena Fischer
- E-Mail: schutz@christus-ist-mein-leben.de
- Status: draft

---

## 9. Phase-3-Gates

Phase 3 darf erst technisch aktiviert werden, wenn:

- Rollenmodell geprüft ist
- Zugriffstest bestanden ist
- REST/Suche/Sitemap/RSS blockiert sind
- Datenschutztexte vorbereitet sind
- Notfallhinweis sichtbar ist
- Audit-Log funktioniert
- Demo-Daten gelöscht werden können
- keine sensiblen Inhalte öffentlich sichtbar sind

---

## 10. Definition of Done

Phase 3 gilt als vorbereitet und ausführbar, wenn:

1. Datenmodell für Seelsorge, Gebet und Schutzkonzept definiert ist.
2. Rollen und Capabilities definiert sind.
3. Admin-Struktur definiert ist.
4. Sicherheitsregeln dokumentiert sind.
5. Demo-Daten markiert sind.
6. Phase-3-HTML-Vorschau die Logik zeigt.
7. klare Grenze zu medizinischen/psychologischen Notfällen vorhanden ist.
8. Abnahme- und Testplan vorhanden ist.
