--
-- Paste your SQL dump into this file
--

--
-- Tabelstructuur voor tabel `dm_login_attempts`
--

CREATE TABLE IF NOT EXISTS `dm_login_attempts` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `reason` int(11) NOT NULL,
  `ip` varchar(256) NOT NULL,
  PRIMARY KEY (`time`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dm_roles`
--

CREATE TABLE IF NOT EXISTS `dm_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dm_users`
--

CREATE TABLE IF NOT EXISTS `dm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
