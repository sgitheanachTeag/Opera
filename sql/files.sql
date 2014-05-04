create table files (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    name varchar(64),
    suffix varchar(4),
    filesize int,
    file_class int(1),-- tiskova zprava, etc... typ.
    dt_created datetime,
    `is_public` boolean not null default 1,
    `header` varchar(128) COLLATE utf8_bin NOT NULL,
    `abstract` text COLLATE utf8_bin ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
