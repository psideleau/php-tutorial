CREATE USER 'registration'@'localhost' IDENTIFIED BY 'make_me_a_proper_password';

CREATE DATABASE IF NOT EXISTS `newsletter` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `newsletter`;

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
    `id` int NOT NULL auto_increment,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) UNIQUE NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`email`)
) ENGINE=InnoDB;

GRANT select,insert ON newsletter.registrations TO 'registration'@'localhost';