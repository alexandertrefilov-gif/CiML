# Phase 1 Animation Roadmap

Projekt: CiML / Christus ist mein Leben

Stand: 2026-04-26

## Ziel

Ruhige, hochwertige, kirchliche Animationen fuer das Phase-1 WordPress-Portal.

Die Animationen sollen den Inhalt fuehren, nicht dominieren. Sie muessen zur bestehenden visuellen Richtung passen und die aktuelle Theme-Struktur respektieren.

Grundlage:

- `src/wp-content/themes/ciml-theme/assets/css/main.css`
- `src/wp-content/themes/ciml-theme/assets/js/main.js`
- `src/wp-content/themes/ciml-theme/front-page.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/`

## 1. Exakte Dateien, die spaeter geaendert werden sollen

### Geplante Aenderungen

- `src/wp-content/themes/ciml-theme/assets/css/main.css`
- `src/wp-content/themes/ciml-theme/assets/js/main.js`
- `src/wp-content/themes/ciml-theme/front-page.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/hero.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/service-bar.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/first-visit.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/community-profile.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/beliefs.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/ministries.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/sermons.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/events.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/team.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/donation.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/contact.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/admin-preview.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/agenda.php`
- `src/wp-content/themes/ciml-theme/template-parts/sections/legal.php`

## 2. CSS-Klassen, die ergaenzt werden sollen

### Animationszustand

- `.fade-in`
- `.fade-in.is-visible`
- `.fade-in--slow`
- `.fade-in--stagger`
- `.reveal`
- `.reveal.is-visible`

### Motion-Helper

- `.motion-safe`
- `.motion-safe--hero`
- `.motion-safe--cards`
- `.motion-safe--cta`

### Header und Navigation

- `.site-header.has-shadow`
- `.site-header.is-scrolled`
- `.nav-link.is-active`

### Karten und CTA

- `.card.is-hovered`
- `.card.is-focused`
- `.cta-link.is-hovered`
- `.cta-link.is-focused`

### Accessibility / Motion

- `.reduce-motion`
- `.sr-only-focusable`

## 3. Benoetigte JS-Logik

### `main.js`

Die spaetere Logik soll klein bleiben und nur UI-Zustaende setzen:

- `IntersectionObserver` fuer `.fade-in` und `.reveal`
- Header-Shadow beim Scrollen
- optionale Stagger-Klasse fuer Karten in Gruppen
- Fokus- und Sichtbarkeitszustand fuer CTA-Elemente
- Fallback ohne `IntersectionObserver`
- Beachtung von `prefers-reduced-motion`

### Was nicht in JS landen soll

- keine GSAP-Initialisierung
- keine Slider-Logik
- keine Parallax-Engine
- keine endlosen Loop-Animationen
- keine Datenabfragen
- keine Theme- oder Plugin-Logik

## 4. Startseitenbereiche, die animiert werden sollen

### Erste Phase

- Hero-Einstieg
- Service-Bar
- First-Visit-Block
- Community-Profile-Block

### Kartenbereiche

- Glaubensgrundlagen
- Dienste
- Predigten
- Veranstaltungen
- Team

### Abschlussbereiche

- Spendenblock
- Kontaktblock
- Admin-Preview-Block
- Agenda
- Legal

## 5. Bereiche, die bewusst nicht animiert werden sollen

- Navigation als Show-Element
- Logos und Branding dauerhaft loopend
- heroische Video-Backgrounds
- Parallax auf grossen Scrollstrecken
- Text, der mit Typing-Effekten erscheint
- Karten, die sich drehen, springen oder stark zoomen
- Floating Blobs, bokehartige Orbs oder dekorative Dauerbewegung
- automatische Slideshows
- dauerhaft pulsierende CTA-Buttons
- Animationen im Admin-Preview-Bereich, die Aufmerksamkeit vom Inhalt wegziehen

## 6. Accessibility-Regeln

- `prefers-reduced-motion` respektieren
- keine Bewegungen fuer wesentliche Inhalte erzwingen
- Fokuszustand immer sichtbar lassen
- animierte Inhalte muessen ohne Animation lesbar bleiben
- `IntersectionObserver` darf keine Inhalte verstecken, die ohne JS unzugänglich waeren
- Touch-Ziele muessen gross genug bleiben
- Animationen duerfen keine Tab-Reihenfolge oder Sprungmarken beeinflussen
- Screenreader duerfen keine rein dekorativen Zustandswechsel als Inhalte interpretieren

## 7. Performance-Regeln

- nur CSS-Transitions fuer einfache Effekte
- JS nur fuer Sichtbarkeitszustand und Header-Shadow
- keine neuen npm Dependencies
- keine GSAP-Installation
- keine Layout-Reflows durch laufende Animationen
- keine animierten Grossbilder, wenn das Bild selbst schon dominant ist
- nur wenige Observer gleichzeitig
- keine Scroll-Listener mit schwerer Berechnung
- Animationen auf `opacity` und `transform` beschraenken

## 8. Testplan

### Visuelle Tests

- Desktop: 1440px
- Laptop: 1024px
- Tablet: 768px
- Mobile: 375px

### Funktionspruefung

- Hero-Reveal erscheint einmalig
- Header bekommt bei Scrollen Schatten
- Karten animieren nur beim ersten Sichtkontakt
- Inhalte bleiben sichtbar, wenn JS fehlt
- keine Animationen bei aktivem Reduced-Motion-Modus

### Barrierefreiheit

- Tastaturfokus pruefen
- Tab-Reihenfolge pruefen
- Farbkontrast auf animierten Elementen pruefen
- Screenreader-Durchlauf fuer sichtbare und nicht sichtbare Inhalte

### Regression

- Prototype-Optik bleibt erhalten
- keine Layoutverschiebung
- keine neue Scroll-Jank
- keine Performance-Einbrueche im Hero oder in Kartenrastern

## 9. Rollback-Plan

Wenn Motion nicht stabil ist oder zu viel Wirkung erzeugt:

1. JS auf Header-Shadow und no-op reduzieren.
2. `.fade-in` sofort sichtbar machen.
3. CSS-Transitions auf einfache Farbwechsel beschraenken.
4. Alle optionalen Reveal-Klassen entfernen.
5. `prefers-reduced-motion` als Standard fuer die betreffenden Sequenzen setzen.

Rollback darf keine Datenmodelle, CPTs, Taxonomien oder Theme-Struktur beruehren.

## 10. Git-Strategie

- Animationen erst in einem separaten Commit umsetzen.
- CSS und JS nicht zusammen mit Content- oder Model-Aenderungen mischen.
- Frontpage-Markup nur dann aendern, wenn Klassen oder Markierungen fuer Motion wirklich noetig sind.
- Jede Aenderung mit einem kurzen QA-Commit begleiten.
- Kein GSAP-Commit, keine Dependency-Aenderung, kein Build-Tooling-Zusatz.

## Empfohlene Reihenfolge

1. CSS-Animation-Basis in `main.css`
2. Sichtbarkeitslogik in `main.js`
3. Klassenzuweisungen in den Section-Templates
4. Optionale Frontpage-Markierungen
5. Visuelle QA und Accessibility-QA
6. Danach erst Feinschliff

## Nicht Teil dieser Roadmap

- keine Implementierung
- keine neuen Dependencies
- kein Datenmodell-Umbau
- keine Plugin-Aenderungen
- keine Admin-, REST-, Form- oder CPT-Logik
- keine Demo-Daten
- keine optisch dominanten Effekte
