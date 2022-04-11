CREATE DATABASE IF NOT EXISTS db_mercedesAMG DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; 

use db_mercedesAMG;

CREATE TABLE IF NOT EXISTS t_car (
    idCar INT(11) NOT NULL AUTO_INCREMENT,
    carModel varchar(50) NOT NULL,
    carBodywork varchar(50) NOT NULL,
    carNumberDoors INT(11) NOT NULL,
    carConsumptionPerHundred DECIMAL(3,1) NOT NULL,
    carDimension varchar(50) NOT NULL,
    carEngineCubicSize INT(11) NOT NULL,
    carNbEngineCylinder INT(11) NOT NULL,
    carEngineHorsePower INT(11) NOT NULL,
    carCouple INT(11) NOT NULL,
    carMaxSpeed INT(11) NOT NULL,
    carZeroToHundredKM DECIMAL(2,1) NOT NULL,
    carWeight INT(11) NOT NULL,
    carPrice INT(11) NOT NULL,
    carDescription varchar(8192) NOT NULL,
    carMark INT(11) NOT NULL,
    carNumberOfSeats INT(11) NOT NULL,
    PRIMARY KEY (idCar)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS t_user (
    idUser int(11) NOT NULL AUTO_INCREMENT,
    userMail varchar(255) NOT NULL,
    userNickname varchar(100) NOT NULL,
    userFirstName varchar(51) NOT NULL,
    userSurname varchar(47) NOT NULL,
    userPassword varchar(1024) NOT NULL,
    userIsAdmin BOOLEAN DEFAULT 0 NOT NULL,
    PRIMARY KEY (idUser)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS t_comment (
    idComment int(11) NOT NULL AUTO_INCREMENT,
    comCommentText varchar(4000) NOT NULL,
    comDatePost DATETIME NOT NULL,
    idCar INT(11) NOT NULL,
    idUser INT(11) NOT NULl,
    PRIMARY KEY (idComment),
    FOREIGN KEY (idCar) REFERENCES t_car(idCar),
    FOREIGN KEY (idUser) REFERENCES t_user(idUser)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE USER IF NOT EXISTS 'dbUser_AMG'@'localhost' IDENTIFIED BY '.Etml-';
GRANT SELECT, INSERT, UPDATE, DELETE ON `db_mercedesAMG`.* TO 'dbUser_AMG'@'localhost';




