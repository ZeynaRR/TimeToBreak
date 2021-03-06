-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2021 at 07:54 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetobreak`
--

-- --------------------------------------------------------

--
-- Table structure for table `belong`
--

DROP TABLE IF EXISTS `belong`;
CREATE TABLE IF NOT EXISTS `belong` (
  `idUser` int(11) NOT NULL,
  `idRoom` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `break`
--

DROP TABLE IF EXISTS `break`;
CREATE TABLE IF NOT EXISTS `break` (
  `idBreak` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `datetimeBeginBreak` datetime NOT NULL,
  `datetimeEndBreak` datetime NOT NULL,
  `datetimeLastUpdate` datetime NOT NULL DEFAULT current_timestamp(),
  `nameOfTheBreak` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idBreak`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `idGame` int(11) NOT NULL AUTO_INCREMENT,
  `nameOfTheGame` varchar(255) COLLATE utf8_bin NOT NULL,
  `contentOfTheGame` text COLLATE utf8_bin NOT NULL,
  `linkToTheGame` varchar(255) COLLATE utf8_bin NOT NULL,
  `imageGame` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idGame`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`idGame`, `nameOfTheGame`, `contentOfTheGame`, `linkToTheGame`, `imageGame`, `tags`) VALUES
(1, 'Skribbl.io', 'Similaire au Pictionary, ce jeu en multijoueurs vous fera perdre la t??te ! Sur une partie, chaque joueur, ?? tour de r??le, tentera de faire deviner aux autres un mot ?? travers un dessin ! \r\nUne r??activit?? est de mise puisque les points reviendront au joueur qui trouvera le plus vite le mot associ?? au dessin. \r\nA la fin, le joueur avec le plus de points remporte la partie ! \r\nAlors ?? vos crayons ! ;) \r\n ', 'https://skribbl.io/', 'images/games/skribbl.jpg', 'dessin, devinette, rire'),
(2, 'Gartic Phone', 'Ce jeu en multijoueurs plus connu comme le jeu du t??l??phone arabe vous assurera un bon moment de convivialit?? et de rire ! \r\nAu d??but de la partie, chaque joueur ??crit une phrase un peu myst??rieuse. Chacune d\'elle devra ensuite ??tre interpr??t??e au moyen d\'un dessin par un autre joueur puis ces dessins devront ??tre transmis ?? un autre joueur qui devra cette fois-ci mettre ?? l\'??crit sa compr??hension du dessin ! Lorsque chaque joueur a rencontr?? tous les sc??narios possibles, le jeu s\'arr??te et vous pourrez constater ?? quel point votre phrase de d??part a ??t?? modifi??e ! :D', 'https://garticphone.com/fr', 'images/games/garticPhone.jpg', 'dessin, devinette, rire'),
(4, 'Sudoku', 'Ce jeu en forme de grille bien connu vous attend ! Faites un petit sudoku pour vous mettre au d??fi vos capacit??s de r??flexion tout en vous amusant! \r\nRappelez-vous le but du jeu est de remplir la grille avec une s??rie de chiffres (1 ?? 9) tous diff??rents, qui ne se trouvent jamais plus d???une fois sur une m??me ligne, dans une m??me colonne ou dans une m??me r??gion !', 'https://sudoku.com/fr', 'images/games/sudoku.png', 'r??flexion, r??solution de probl??me'),
(6, 'Echecs', 'D??butant, amateur ou confirm??, ce jeu d\'??checs en ligne est fait pour vous! En plus de pouvoir jouer contre vos amis, vous aurez aussi la possibilit?? de jouer contre des inconnus ou encore contre l\'ordinateur. Pour les d??butants pas de probl??me, Chess.com a tout pr??vu! Des probl??mes sont ??galement disponibles pour vous entrainer. \r\nRendez-vous sur l\'??chiquier !', 'https://www.chess.com/', 'images/games/chess.png\r\n', 'r??flexion,d??fi');

-- --------------------------------------------------------

--
-- Table structure for table `mailingnotification`
--

DROP TABLE IF EXISTS `mailingnotification`;
CREATE TABLE IF NOT EXISTS `mailingnotification` (
  `idMailingNotification` int(11) NOT NULL AUTO_INCREMENT,
  `idBreak` int(11) NOT NULL,
  `numberMail` int(11) NOT NULL,
  PRIMARY KEY (`idMailingNotification`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `idRoom` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `datetimeSendMessage` datetime NOT NULL DEFAULT current_timestamp(),
  `contentOfTheMessage` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `idRoom` int(11) NOT NULL AUTO_INCREMENT,
  `nameOfTheRoom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idRoom`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`idRoom`, `nameOfTheRoom`) VALUES
(4, 'Jeux'),
(3, 'Cuisine'),
(5, 'Peinture'),
(6, 'Sport'),
(7, 'Litt??rature '),
(8, 'Mode'),
(9, 'Blagues'),
(10, 'Musique'),
(11, 'Cin??ma'),
(12, 'Tennis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `pseudoUser` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `mailUser` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `passwordUser` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `credentialUser` int(11) NOT NULL,
  `Ban` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `mailUser` (`mailUser`),
  UNIQUE KEY `pseudoUser` (`pseudoUser`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `pseudoUser`, `mailUser`, `passwordUser`, `credentialUser`, `Ban`) VALUES
(15, 'moderateurTTB', 'vera.schreiber@ttb.com', '$2y$10$Iih3GJ4OReIluw92XQCJGOeqjbjljtpp9P/LSBCFloXV39xltDiFK', 2, 0),
(14, 'adminTTB', 'yvan.watanabe@ttb.com', '$2y$10$faSF.vHPlvopYZ5VZax1SuA/NNWf4LnvZMdbbVl0mm9P4bMM0df4S', 3, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
