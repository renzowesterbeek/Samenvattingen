# Cygnus Samenvattingen
Samenvattingen gemaakt door leerlingen, allemaal overzichtelijk op één website.

## Todo

- [ ] Overzichtelijkheid
- [ ] Goeie zoekfunctie
- [ ] Beoordelingen
- [ ] Commentaar
- [ ] Favorieten
- [ ] Custom error pagina's
- [ ] Template/tutorial maken overzichtelijke mooie samenvatting + tips & tricks / hulp hoe een te maken
- [ ] identieke bestanden check
- [ ] revisies

## Prioriteiten
- 1 Authenticatie
- 2 Upload functie
- 3 Databases
- 4 Favorieten
- 5 zoekfunctie
- 6 Identieke
- 7 Revisies
- 4 vormgeving
- 8 beoordeling
- 9 Commentaar

## Bestandsnaamgeving
Server: ID-revisie.docx

Download: VakTitelAuteur.docx

## Gegevens over samenvattingen:

| Wat | Voorbeeld |
|-----|-----------|
| Originele bestandsnaam | Mijn samenvatting.docx |
| Unieke id | 4628 |
| Titel* | Samenvatting |
| Auteur | Renzo Westerbeek |
| Uploader | Laszlo Schoonheid |
| Anoniem | false |
| Timestamp upload | 7-11-2015 |
| Datum bestand gemodificeerd | 8-11-2015 |
| Vak* | Aardrijkskunde |
| Leerjaar* | 5 |
| Niveau | VWO |
| Methode > hoofstuk(ken) > paragraaf/paragrafen | De Geo, H5.3 |
| Tags |
| Grootte | 12.582.912 bytes |
| Extensie (docx etc) |
| Revisie nr | 2 |
| Type | Samenvatting |

## Bestandsstructuur
- index.php (homepage, viewer voor lijsten met categorieën)
- view.php (viewer voor 1 bestand)
- get.php (returned alle samenvattingen gevonden met keywords in JSON format (auteur, vak, jaarlaag, etc))
- 📁 css/
- 📁 js/
- 📁 backend/   _PHP functies_
  - connect.php _Connect-script_
  - system.php  _General system-wide functies_
- 📁 includes/  _Pagina-onderdelen voor hergebruik_
- 📁 files/     _Geuploade samenvattingen_

## Databases
- Bestanden + info
- Commentaar / beoordelingen
- Users (incl voorkeuren)
