# Erdmann & Freunde Grid-Erweiterung für Contao

Mit **euf_grid** kannst du Content-Elemente in Contao an einem 12-spaltigen Grid ausrichten.

Wir empfehlen dir, die Erweiterung in Verbindung mit unserem Contao Theme SOLO zu verwenden. Mehr Infos: http://erdmann-freunde.de/themes/solo/

## Was die Erweiterung macht:

Nach der Installation werden den Content-Elementen 2 neue Felder für die Eingabe von Grid-Klassen und weiteren Optionen hinzugefügt. Außerdem stehen weitere Content-Elemente zur Verschachtelung in Reihen und Spalten zur Verfügung.

## Update-Hinweise
- Ab Version 3.0 basiert die Grid-Erweiterung auf [CSS Grid Layout](https://developer.mozilla.org/de/docs/Web/CSS/CSS_Grid_Layout). Dadurch ergeben sich ganz neue Möglichkeiten in der Darstellung und Ausrichtung von Inhalten, allerdings ist die Version 3 nur eingeschränkt kompatibel mit der vorherigen Version. Zum Beispiel müssen zusätzliche Abstände, die vorher mit den Offset-Klassen (`.offset-md-1`) erstellt wurden, nun mit der neuen Klasse `.grid-start-[viewport]-[spaltennummer]` erzeugt werden. Ein Update von 2 auf 3 sollte vorab in einer Testumgebung geprüft werden, nicht in einer Live-Umgebung!
- Ab Version 2.2.3 endet der offizielle Support für Contao 3.5. Dies macht sich unter anderem dadurch bemerkbar, dass sich die mitgelieferte CSS-Datei nicht mehr im Seitenlayout laden lässt.
- Beim **Update** von 2.0.3 auf Version 2.1.0 wurde die alte Art (zusätzliche Checkbox bei den CSS-Frameworks), das mitgelieferte Grid-CSS einzubinden, entfernt und durch ein neues Feld im Layout unter den Style-Einstellungen ersetzt. Wenn du das CSS über den alten Weg eingebunden hattest, empfehlen wir dir, das CSS **vor** dem Update aus den ausgewählten Frameworks zu entfernen und nach dem Update dieses wieder über das neue Feld hinzuzufügen.
