create table account
(
    id            bigint auto_increment
        primary key,
    loginname     varchar(55)                                                                        not null,
    pwdhash       varchar(60) default '$2y$13$Vs7u2UQ1ltPIWwcXfmpikOxcWLRBlS32A6VeHF./w7OwNDAwpM8uy' not null,
    firstlogin    tinyint(1)  default 1                                                              not null,
    blocked       tinyint(1)  default 0                                                              not null,
    idmitarbeiter bigint                                                                             not null,
    constraint account_loginname_uindex
        unique (loginname),
    constraint idmitarbeiter
        unique (idmitarbeiter)
);

INSERT INTO `mwp-systems`.account (id, loginname, pwdhash, firstlogin, blocked, idmitarbeiter) VALUES (1, 'tboockmeyer', '$2y$13$l/AG4KyGLObXUP7ngbM3IORygaHYhpawn.urfpQxLdFXGtW1WvbNK', 1, 0, 1);
INSERT INTO `mwp-systems`.account (id, loginname, pwdhash, firstlogin, blocked, idmitarbeiter) VALUES (2, 'ascherer', '$2y$13$6xTEV7lluRNWsslfdwAkdejnjoHbF8.ybpqkpLlzGH/UDW0WybROa', 1, 0, 2);