SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cars` (`id`, `make`, `model`, `url`) VALUES
(1,	'Ford',	'Edge',	'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Ford_Edge%2C_IAA_2017%2C_%281Y7A3333%29.jpg/320px-Ford_Edge%2C_IAA_2017%2C_%281Y7A3333%29.jpg'),
(2,	'Ford',	'Escape',	'https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/2018_Ford_Escape_%28ZG%29_Trend_AWD_wagon_%282018-10-29%29_01.jpg/320px-2018_Ford_Escape_%28ZG%29_Trend_AWD_wagon_%282018-10-29%29_01.jpg'),
(3,	'Acura',	'ILX',	'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/2013_Acura_ILX_2.4_--_07-13-2012.JPG/320px-2013_Acura_ILX_2.4_--_07-13-2012.JPG'),
(4,	'Acura',	'MDX',	'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Acura_MDX_facelift_front_6.10.18.jpg/320px-Acura_MDX_facelift_front_6.10.18.jpg');