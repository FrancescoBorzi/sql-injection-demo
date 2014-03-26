-- Create database
DROP DATABASE IF EXISTS `sqli`;
CREATE DATABASE IF NOT EXISTS `sqli` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sqli`;


-- Create `users` table
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- table `users` content
DELETE FROM `users`;
INSERT INTO `users` (`id`, `username`, `password`) VALUES 
(0000000001, 'admin', 'pwd1'),
(0000000002, 'user', 'pwdusr'),
(0000000003, 'user3', 'pwd-3');