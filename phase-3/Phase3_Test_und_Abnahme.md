# CImL Phase 3 – Security- und Abnahmeplan

## 1. Zugriffstests

- [ ] Besucher können keine Seelsorge-Anfragen sehen.
- [ ] Besucher können keine Gebetsanliegen sehen.
- [ ] Redakteure können keine Seelsorge-Anfragen sehen.
- [ ] Medien-Team kann keine sensiblen Anfragen sehen.
- [ ] Gebetsteam sieht nur freigegebene/anonymisierte Anliegen.
- [ ] Seelsorge-Mitarbeiter sieht nur zugewiesene Fälle.
- [ ] Seelsorge-Leitung sieht alle Seelsorgefälle.
- [ ] Administrator sieht Systemoptionen, aber Zugriff wird protokolliert.

## 2. Öffentlichkeitsprüfung

- [ ] Keine sensiblen Inhalte im Frontend.
- [ ] Keine sensiblen Inhalte in Suche.
- [ ] Keine sensiblen Inhalte in REST API.
- [ ] Keine sensiblen Inhalte in Sitemap.
- [ ] Keine sensiblen Inhalte in RSS.
- [ ] Keine sensiblen Inhalte in E-Mail-Betreff oder Volltext.

## 3. Formularprüfung

- [ ] Nonce vorhanden.
- [ ] Honeypot vorhanden.
- [ ] Datenschutz-Einwilligung Pflicht.
- [ ] Seelsorge-Einwilligung Pflicht.
- [ ] Notfallhinweis sichtbar.
- [ ] Pflichtfelder serverseitig validiert.
- [ ] Eingaben werden sanitisiert.
- [ ] Ausgaben werden escaped.

## 4. Statusprüfung

- [ ] Seelsorge: new → triage → assigned → contacted → in_care → completed möglich.
- [ ] Gebet: new → review_required → approved/anonymized/blocked/redirected möglich.
- [ ] Löschanforderung kann gesetzt werden.
- [ ] Archivierung kann gesetzt werden.
- [ ] Statusänderung wird protokolliert.

## 5. Auditprüfung

- [ ] Öffnen eines sensiblen Eintrags wird protokolliert.
- [ ] Statusänderung wird protokolliert.
- [ ] Zuweisung wird protokolliert.
- [ ] Export wird protokolliert.
- [ ] Löschung wird protokolliert.

## 6. Demo-Daten

- [ ] Demo-Daten sind klar markiert.
- [ ] Demo-Daten können installiert werden.
- [ ] Demo-Daten können vollständig gelöscht werden.
- [ ] Keine Demo-Daten bleiben nach Löschung sichtbar.

## 7. Release-Gate

Phase 3 darf erst freigegeben werden, wenn alle Punkte oben bestanden sind.  
Bei einem Fehler im Zugriffsschutz: NO-GO.
