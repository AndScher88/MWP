create table productgroup
(
    id          int auto_increment
        primary key,
    warengruppe varchar(500) not null,
    constraint productgroup_un
        unique (warengruppe)
);

INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (25, 'Crimpen und Zubehör');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (8, 'Drosseln');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (9, 'Halbleiter');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (4, 'Kabel');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (30, 'Kabelschuhe');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (26, 'Kabelverschraubung');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (1, 'Klemmen');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (2, 'Klemmen-Zubehör');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (10, 'Löten und Zubehör');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (5, 'Schalter');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (6, 'Schalter-Zubehör');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (32, 'Schnupsi');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (11, 'Schraube');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (3, 'Spannungsableiter');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (7, 'Transformatoren');
INSERT INTO `mwp-systems`.productgroup (id, warengruppe) VALUES (12, 'Werkzeug');