

# Beschreibung:
Elega ist eine Marktplatz in der Nutzer die Möglichkeit haben,
nach ihrer Registrierung ihr Fahrzeug zu inserieren. Außerdem
ist es in der Anwendung möglich, Fahrzeuge direkt beim Nutzer,
der es veröffentlicht hat, anzufragen.

## Funktionen
- Benutzerregistrierung und Login
- Hinzufügen und Entfernen von Fahrzeugen (als eingeloggter Nutzer)
- Fahrzeuge anfragen per Telefon oder Email

## Voraussetzungen
- XAMPP 8.2.4
- PHP
- MySQL
- Composer

## Root Verzeichnis
Damit die Startseite direkt unter der Top-Level Domain aufrufbar ist,
muss das Document Root auf der httpd.conf Datei angepasst werden. 
Füge diesen Pfad am Ende hinzu /elega/public
--> `DocumentRoot /Applications/XAMPP/xamppfiles/htdocs/elega/public`

## Composer
Damit die Anwendung funktioniert, muss der Befehl `composer install` 
ausgeführt werden, um die benötigten Dependencies aus der composer.json
zu installieren.

## Starten der Applikation
Nachdem die Dependencies installiert wurden, starte die Server in XAMPP
und rufe die URL: http://localhost/ auf.


