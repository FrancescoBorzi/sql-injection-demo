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
(1, 'admin', 'pwd1'),
(2, 'user', 'pwdusr'),
(3, 'user3', 'pwd-3');


-- Create `books` table
DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL DEFAULT '0',
  `author` VARCHAR(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3;

-- table `books` content
DELETE FROM `books`;
INSERT INTO `books` (`id`, `title`, `author`) VALUES 
(1, 'Libro1', 'Autore1'),
(2, 'Book', 'Someone');