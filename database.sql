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
(2, 'danilo', 'gasd12'),
(3, 'filippo', 'postuy666'),
(4, 'oreste', 'tmrchio82'),
(5, 'luca', 'kd2jam'),
(6, 'dario', '31lowrem'),
(7, 'sebastiano', '4muniz4'),
(8, 'antonio', 'ciuppi75'),
(9, 'cristina', 'berfectqui2'),
(10, 'jessica', 'ioryunzfrunz');


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
(1, 'A Game of Thrones', 'George R. R. Martin'),
(2, 'A Clash of Kings', 'George R. R. Martin'),
(3, 'A Storm of Swords', 'George R. R. Martin'),
(4, 'A Feast for Crows', 'George R. R. Martin'),
(5, 'A Dance with Dragons', 'George R. R. Martin'),
(6, 'The Winds of Winter', 'George R. R. Martin'),
(7, 'A Dream of Spring', 'George R. R. Martin'),
(8, 'Software libero pensiero libero', 'Richard Stallman'),
(9, 'Perche\' sono vegetariana', 'Margherita hack'),
(10, 'I miei primi novant\'anni laici e ribelli', 'Margherita hack'),
(11, 'A caccia dei misteri spaventosi del cielo', 'Margherita hack'),
(12, 'In piena liberta\' e consapevolezza', 'Margherita hack'),
(13, 'La mia vita in bicicletta', 'Margherita hack');

-- Create `clients` table
DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

-- table `clients` content
DELETE FROM `clients`;
INSERT INTO `clients` (`id`, `pin`) VALUES
(110, 123456789),
(111, 432342198);