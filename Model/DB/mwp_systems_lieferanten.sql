create table lieferanten
(
    id           int auto_increment
        primary key,
    firma        varchar(30) not null,
    strasse      varchar(30) null,
    hausnummer   varchar(10) null,
    postleitzahl varchar(6)  null,
    stadt        varchar(30) null,
    vorname      varchar(30) null,
    nachname     varchar(30) null
)
    collate = utf8_unicode_ci;

INSERT INTO `mwp-systems`.lieferanten (id, firma, strasse, hausnummer, postleitzahl, stadt, vorname, nachname) VALUES (1, 'Phoenix Contact', 'Flachsmarktstraße', '8', '32825', 'Blomberg', 'Jan', 'Carls');
INSERT INTO `mwp-systems`.lieferanten (id, firma, strasse, hausnummer, postleitzahl, stadt, vorname, nachname) VALUES (2, 'Albert Zajadacz', 'Stellingen', '', '20255', 'Hamburg', 'Andreas', 'Hillermann');
INSERT INTO `mwp-systems`.lieferanten (id, firma, strasse, hausnummer, postleitzahl, stadt, vorname, nachname) VALUES (4, 'Krah', 'Iregendwo Weg', '444', '12325', 'Diestadt', 'Harald', 'Dings');
INSERT INTO `mwp-systems`.lieferanten (id, firma, strasse, hausnummer, postleitzahl, stadt, vorname, nachname) VALUES (6, 'Ninteno', 'Irdendwo', '', '', '', 'Nina', 'Diekert');
INSERT INTO `mwp-systems`.lieferanten (id, firma, strasse, hausnummer, postleitzahl, stadt, vorname, nachname) VALUES (7, 'DEHN SE + Co KG', 'Rennweg', '15', '90489', 'Nürnberg', 'Manfred', 'Kienlein');
INSERT INTO `mwp-systems`.lieferanten (id, firma, strasse, hausnummer, postleitzahl, stadt, vorname, nachname) VALUES (8, 'Weidmüller GmbH & Co, KG', 'Klingenbergstraße', '26', '32758', 'Detmold', '', '');
INSERT INTO `mwp-systems`.lieferanten (id, firma, strasse, hausnummer, postleitzahl, stadt, vorname, nachname) VALUES (9, 'Eaton Electtric GmbH', 'Hein-Moeller-Straße', '7-11', '53115', 'Bonn', '', '');
INSERT INTO `mwp-systems`.lieferanten (id, firma, strasse, hausnummer, postleitzahl, stadt, vorname, nachname) VALUES (10, 'Adolf Würth GmbH & Co. KG', 'Reinhold-Würth-Straße', '12-17', '74653', 'Küntelsau-Gaisbach', 'Marc', 'Rehfeld');