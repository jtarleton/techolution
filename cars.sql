CREATE DATABASE `techolution` COLLATE 'utf8_general_ci';
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `make` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL
) ENGINE='InnoDB';
INSERT INTO `cars` (`make`, `model`)
VALUES ('Ford', 'Edge');
INSERT INTO `cars` (`make`, `model`)
VALUES ('Ford', 'Escape');
INSERT INTO `cars` (`make`, `model`)
VALUES ('Acura', 'IDX');
INSERT INTO `cars` (`make`, `model`)
VALUES ('Acura', 'MDX');

SELECT *
FROM `cars` WHERE make=:make

