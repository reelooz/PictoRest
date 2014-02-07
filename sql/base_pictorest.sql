SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"; 
SET time_zone = "+00:00"; 
  
CREATE TABLE IF NOT EXISTS `Utilisateurs`(
`idUtil` INT(10) NOT NULL AUTO_INCREMENT, 
`identifiant` VARCHAR(40) UNIQUE NOT NULL, 
`passwd` TEXT NOT NULL, 
`apiKey` TEXT NOT NULL, 
PRIMARY KEY (`idUtil`) 
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
  
INSERT INTO `Utilisateurs` (`idUtil`,`identifiant`, `passwd`, `apiKey`)  VALUES 
(1,'Parakeet77','e4e03e93afe7fcae2a52521ee434480c', 'ahahah'); 
INSERT INTO `Utilisateurs` (`idUtil`,`identifiant`, `passwd`, `apiKey`)  VALUES 
(2,'Claudy','997e5730b999d0eb5ec2b6d9541ee35e', 'ahahah'); 
  
CREATE TABLE IF NOT EXISTS `Albums`( 
`idAlbum` INT(10) NOT NULL AUTO_INCREMENT, 
`titreAlbum` VARCHAR(40) NOT NULL, 
`desc` TEXT, 
`dateAlbum` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00', 
`photoCouv` INT(10) default NULL, 
`idUtil` INT(10) NOT NULL, 
PRIMARY KEY (`idAlbum`), 
FOREIGN KEY (`idUtil`) REFERENCES `Utilisateurs`(`idUtil`) 
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
INSERT INTO `Albums` (`idAlbum`, `titreAlbum`, `desc`,`dateAlbum`,`photoCouv`,`idUtil`)  VALUES 
(1,'album1','album1description','2013-12-12 15:43:00',1,1);
INSERT INTO `Albums` (`idAlbum`, `titreAlbum`, `desc`,`dateAlbum`,`photoCouv`,`idUtil`)  VALUES  
(2,'album2','album2description','2013-12-12 15:43:00',2,2); 
  
CREATE TABLE IF NOT EXISTS `Feeds`( 
`idFeed` INT(10) NOT NULL AUTO_INCREMENT, 
`idUtil` INT(10) NOT NULL, 
`idAlbum` INT(10) NOT NULL, 
`dateFeed` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00', 
PRIMARY KEY (`idFeed`), 
FOREIGN KEY (`idUtil`) REFERENCES `Utilisateur`(`idUtil`),
FOREIGN KEY (`idAlbum`) REFERENCES `Albums`(`idAlbum`) 
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 

INSERT INTO `Feeds` (`idUtil`,`idAlbum`, `dateFeed`)  VALUES 
(1,1,'2013-12-12 15:43:00');
INSERT INTO `Feeds` (`idUtil`,`idAlbum`, `dateFeed`)  VALUES 
(2,2,'2013-12-12 15:43:00'); 
  
CREATE TABLE IF NOT EXISTS `Photos`( 
`idPhoto` INT(10) NOT NULL AUTO_INCREMENT, 
`titrePhoto` VARCHAR(40) NOT NULL, 
`desc` TEXT,
`cheminThumb` TEXT NOT NULL, 
`cheminFull` TEXT NOT NULL,
`datePhoto` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00', 
`idAlbum` INT(10) NOT NULL, 
PRIMARY KEY (`idPhoto`) ,
FOREIGN KEY (`idAlbum`) REFERENCES `Albums`(`idAlbum`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 

INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);
INSERT INTO `Photos` (`titrePhoto`, `desc`, `cheminThumb`, `cheminFull`, `datePhoto`, `idAlbum`)  VALUES 
('TitrePhoto','DescPhoto','/PictoRest/web/images/thumb/test.png','cheminFull','2013-12-12 15:43:00', 1);



