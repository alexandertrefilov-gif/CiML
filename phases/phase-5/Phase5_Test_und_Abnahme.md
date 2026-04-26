# CImL Phase 5 – Test- und Abnahmeplan

## 1. Audit-Log

- [ ] Content-Änderungen werden protokolliert.
- [ ] Rollenänderungen werden protokolliert.
- [ ] sensible Zugriffe werden protokolliert.
- [ ] Datei-Downloads werden protokolliert.
- [ ] Release- und Rollback-Aktionen werden protokolliert.
- [ ] normale Redakteure können Audit-Logs nicht löschen.

## 2. Freigabe-Workflow

- [ ] News können auf ready_for_review gesetzt werden.
- [ ] Zeugnisse benötigen Einwilligung und Freigabe.
- [ ] Rechtliche Seiten benötigen Freigabe.
- [ ] Spendenhinweise benötigen Freigabe.
- [ ] Veröffentlichung ohne Berechtigung ist blockiert.

## 3. Backup / Restore

- [ ] Backup-Status wird angezeigt.
- [ ] Pre-Release-Backup wird vor Release verlangt.
- [ ] letzter Restore-Test ist dokumentiert.
- [ ] Rollback-Plan ist vorhanden.
- [ ] Backup-Dateien sind geschützt.

## 4. Export / Löschung

- [ ] Löschanforderung kann erstellt werden.
- [ ] Löschanforderung braucht Prüfung.
- [ ] Löschung wird protokolliert.
- [ ] Export sensibler Daten ist nur für berechtigte Rollen möglich.
- [ ] Retention kann Löschung blockieren.

## 5. Rollen-Review

- [ ] Adminrollen werden monatlich geprüft.
- [ ] sensible Rollen verlangen besondere Prüfung.
- [ ] inaktive Admins werden markiert.
- [ ] Rollenwechsel wird auditiert.

## 6. Wartungsmodus

- [ ] Wartungsmodus kann aktiviert werden.
- [ ] Besucher sehen Wartungshinweis.
- [ ] Admins bleiben eingeloggt.
- [ ] Aktivierung wird protokolliert.

## 7. Release-Gate

- [ ] Backup vorhanden.
- [ ] Changelog vorhanden.
- [ ] betroffene Module benannt.
- [ ] Sicherheitstest bestanden.
- [ ] Rollenprüfung bestanden.
- [ ] Rollback-Plan vorhanden.
- [ ] GO/NO-GO dokumentiert.

## 8. Incident-Prozess

- [ ] Incident kann angelegt werden.
- [ ] Severity wird gesetzt.
- [ ] Owner wird gesetzt.
- [ ] Statuswechsel wird protokolliert.
- [ ] Postmortem kann markiert werden.

## Release-Grenze

NO-GO, wenn:
- kein Backup vorhanden ist
- Rollback fehlt
- sensible REST-/Suchblockade fehlschlägt
- Adminrollen ungeprüft sind
- Demo-Daten produktiv sichtbar sind
