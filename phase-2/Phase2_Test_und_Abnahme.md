# CImL Phase 2 – Abnahme- und Testplan

## 1. Funktionstests

### Kleingruppen
- [ ] Kleingruppen werden im Admin angelegt.
- [ ] Kleingruppen erscheinen im Frontend.
- [ ] Filter nach Sprache, Stadtteil, Wochentag funktionieren.
- [ ] Anfrageformular validiert Pflichtfelder.
- [ ] Anfrage erscheint nicht öffentlich.
- [ ] Status kann im Admin geändert werden.

### Kurse
- [ ] Kurse werden im Admin angelegt.
- [ ] Kurse erscheinen im Frontend.
- [ ] Anmeldung funktioniert nur mit Datenschutz-Checkbox.
- [ ] Teilnehmerlimit wird angezeigt.
- [ ] Status voll/pausiert/abgeschlossen wirkt im Frontend.

### Mitarbeit
- [ ] Mitarbeit-Bereiche erscheinen im Frontend.
- [ ] Bereich mit Kinderschutz zeigt Warnhinweis/Anforderung.
- [ ] Anfrage wird intern gespeichert.
- [ ] Dienstleiter sieht nur erlaubte Anfragen.

### Event-Anmeldungen
- [ ] Anmeldung ist nur bei aktivierter Registrierung sichtbar.
- [ ] Teilnehmerzahl wird erfasst.
- [ ] Warteliste wird bei vollem Event aktiviert.
- [ ] E-Mail und Name werden validiert.

### News
- [ ] News werden veröffentlicht.
- [ ] Entwürfe sind nicht öffentlich.
- [ ] Kategorien funktionieren.
- [ ] Hervorgehobene News können markiert werden.

### Zeugnisse
- [ ] Zeugnis wird nur mit Einwilligung gespeichert.
- [ ] Zeugnis-Einreichung wird nicht automatisch veröffentlicht.
- [ ] Anonymisierung funktioniert.
- [ ] Freigabe ist erforderlich.

### Einfache Gebetsanliegen
- [ ] Anliegen wird nicht öffentlich ausgegeben.
- [ ] Sensitivity-Flag wird gesetzt.
- [ ] Bei sensiblen Inhalten kann Status auf `redirect_to_care` gesetzt werden.
- [ ] Keine Seelsorge-Fallverwaltung wird erstellt.

## 2. Sicherheitstests

- [ ] Alle Formulare haben Nonce.
- [ ] Honeypot blockiert Bot-Eingaben.
- [ ] Pflichtfelder werden serverseitig geprüft.
- [ ] HTML/Script-Eingaben werden entschärft.
- [ ] Anfrage-Daten erscheinen nicht in REST API.
- [ ] Anfrage-Daten erscheinen nicht in Suche.
- [ ] Anfrage-Daten erscheinen nicht in Sitemap.
- [ ] Besucher sehen keine Admin-Links.
- [ ] Rollenprüfung funktioniert.

## 3. Rollenprüfung

- [ ] Administrator sieht alles.
- [ ] CImL Manager sieht alle Phase-2-Inhalte.
- [ ] CImL Editor kann Inhalte vorbereiten.
- [ ] Event Manager sieht Event-Anmeldungen.
- [ ] Kleingruppen-Koordinator sieht Kleingruppen-Anfragen.
- [ ] Kurs-Manager sieht Kurs-Anmeldungen.
- [ ] Ministry Leader sieht nur eigene Mitarbeit-Anfragen.
- [ ] Prayer Reviewer sieht nur einfache Gebetsanliegen.

## 4. Demo-Daten-Test

- [ ] Demo-Daten können installiert werden.
- [ ] Demo-Daten sind als Demo markiert.
- [ ] Demo-Daten erscheinen im Frontend.
- [ ] Demo-Daten können gelöscht werden.
- [ ] Nach Löschen bleiben keine Demo-Anfragen sichtbar.

## 5. Release-Gate

Phase 2 darf erst als abgeschlossen gelten, wenn:

- keine personenbezogenen Anfragen öffentlich sichtbar sind
- alle Formulare geschützt sind
- Rollenprüfung bestanden ist
- keine Phase-3-Funktionen versehentlich aktiv sind
- Demo-Daten sauber löschbar sind
