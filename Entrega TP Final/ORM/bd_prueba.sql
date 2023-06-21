CREATE TABLE IF NOT EXISTS persona (
    nrodoc int(11) NOT NULL,
    nombre varchar(50) NOT NULL,
    apellido varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    PRIMARY KEY ( nrodoc )
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE utf8_unicode_ci;