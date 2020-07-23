create table mitarbeiterdaten
(
    id            bigint auto_increment,
    vorname       varchar(20)                         not null,
    nachname      varchar(20)                         not null,
    strasse       varchar(30)                         null,
    hausnummer    varchar(6)                          null,
    stadt         varchar(20)                         null,
    postleitzahl  int                                 null,
    geburtsdatum  date                                null,
    telefonnummer varchar(14)                         null,
    email         varchar(40)                         null,
    abteilung     varchar(20) collate utf8_unicode_ci null,
    constraint id
        unique (id)
);

create index id_2
    on mitarbeiterdaten (id);

alter table mitarbeiterdaten
    add primary key (id);

INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (2, 'Andrej', 'Scherer', 'Am Riesenkamp', '15', 'Wedel', 22880, '1988-10-30', '015150673007', 'andy.scherer1887@gmail.com', 'Engineering');
INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (3, 'Nina', 'Diekert', 'Am Riesenkamp', '15', 'Wedel', 22880, '1991-03-30', '01725393929', 'n.diekert@live.de', 'Human Resources');
INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (5, 'Arne', 'Westphal', 'Hammerbrook', '???', 'Hammerbrook', 20537, '1989-02-23', '015161603549', 'a.westphal@me.com', 'IT');
INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (9, 'Viktor', 'Scherer', 'Seafordkehre', '6', 'Bönningstedt', 25474, '1981-03-23', '017682212696', '', 'Sales');
INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (10, 'Ralf', 'Diekert', 'Pestalozzistraße', '28', 'Wedel', 22880, '1957-12-01', '0410384503', 'ralf.diekert@eu.de', 'IT');
INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (16, 'Anna', 'Scherer', 'Lindenstraße', '62a', 'Wedel', 22880, '1956-10-08', '017672158230', 'anna.scherer1956@gmail.com', 'Human Resources');
INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (17, 'Alexander', 'Scherer', 'Lindenstraße', '62a', 'Wedel', 22880, '1955-08-24', '041039030561', '', 'Lager');
INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (18, 'Thomas', 'Bockmeyer', 'Rübenkamp', '132', 'Hamburg', 22307, '1989-04-13', '017663301035', 't.boockmeyer@googlemail.com', 'IT');
INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (21, 'Alexander', 'Scherer', 'Klevendeicher Chaussee', '???', 'Moorrege', 25436, '1984-09-01', '017662744130', '', 'Lager');
INSERT INTO `mwp-systems`.mitarbeiterdaten (id, vorname, nachname, strasse, hausnummer, stadt, postleitzahl, geburtsdatum, telefonnummer, email, abteilung) VALUES (23, 'Julia', 'Kitze', 'Eilbektal', '2B', 'Hamburg', 22089, '1991-07-04', '015151887750', '', '');