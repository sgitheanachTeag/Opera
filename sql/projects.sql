create table projects (
    `id` int(11) NOT NULL AUTO_INCREMENT,
--  `news_id` int(11),
    `header` varchar(128) COLLATE utf8_bin NOT NULL,
    `header_short` varchar(128) COLLATE utf8_bin NOT NULL,
    `slug` varchar(128) COLLATE utf8_bin NOT NULL,
    `body` text COLLATE utf8_bin NOT NULL,
    `dt_from` datetime,
    `dt_to` datetime,
    `is_public` boolean not null default 1,
    `dt_created` datetime,
--  `created_by` int,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
