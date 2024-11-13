-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 27 sep 2024 om 07:44
-- Serverversie: 9.0.1
-- PHP-versie: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: jamin_a
DROP DATABASE IF EXISTS jamin_a;
CREATE DATABASE IF NOT EXISTS jamin_a DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE jamin_a;

-- Tabelstructuur voor tabel `country`
DROP TABLE IF EXISTS country;
CREATE TABLE IF NOT EXISTS country (
  `Id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL,
  `CapitalCity` varchar(250) NOT NULL,
  `Continent` varchar(250) NOT NULL,
  `Population` int UNSIGNED NOT NULL,
  `Zipcode` varchar(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Gegevens worden geëxporteerd voor tabel `country`
INSERT INTO `country` (`Id`, `Name`, `CapitalCity`, `Continent`, `Population`, `Zipcode`) VALUES
(1, 'Nederland', 'Amsterdam', 'Europa', 18000000, '2309CB'),
(2, 'Argentini&euml;', 'Buenos Aires', 'Zuid-Amerika', 4294967294, '2309CC'),
(4, 'Japan', 'Tokio', 'Azi&euml;', 125700000, '8761EE'),
(5, 'Zwitserlandd', 'Bern', 'Europa', 8703000, '2345RR'),
(6, 'Noorwegen', 'Oslo', 'Europa', 5550203, '2314UT'),
(11, 'Litouwen', 'Vilnius', 'Europa', 340000000, '9382YY'),
(15, 'Marokko', 'Rabat', 'Afrika', 37500000, '1243HH'),
(16, 'Nepal', 'Kathmandu', 'Azi&euml;', 30000000, '6534GG'),
(17, 'Chili', 'Santiago', 'Zuid-Amerika', 18276870, '8347AA'),
(18, 'Japan', 'Tokio', 'Azi&euml;', 125700000, '2342TT');

-- Tabelstructuur voor tabel `Product`
DROP TABLE IF EXISTS Product;
CREATE TABLE IF NOT EXISTS Product (
  `Id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Naam` VARCHAR(255) NOT NULL,
  `Barcode` VARCHAR(13) NOT NULL,
  `Verpakkingseenheid` VARCHAR(100) NOT NULL,
  `IsActief` BIT NOT NULL DEFAULT 1,
  `Opmerkingen` VARCHAR(255) DEFAULT NULL,
  `DatumAangemaakt` DATETIME(6) NOT NULL,
  `DatumGewijzigd` DATETIME(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Gegevens worden geëxporteerd voor tabel `Product`
INSERT INTO `Product` (`Naam`, `Barcode`, `IsActief`, `Opmerkingen`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
('Mintnopjes', '8719587231278', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Schoolkrijt', '8719587326713', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Honingdrop', '8719587327836', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Zure Beren', '8719587321441', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Cola Flesjes', '8719587321237', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Turtles', '8719587322245', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Witte Muizen', '8719587328256', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Reuzen Slangen', '8719587325641', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Zoute Rijen', '8719587322739', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Winegums', '8719587327527', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Drop Munten', '8719587322345', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Kruis Drop', '8719587322265', 1, NULL, SYSDATE(6), SYSDATE(6)),
('Zoute Ruitjes', '8719587323256', 1, NULL, SYSDATE(6), SYSDATE(6));

-- Tabelstructuur voor tabel `Magazijn`
DROP TABLE IF EXISTS Magazijn;
CREATE TABLE IF NOT EXISTS Magazijn (
  `Id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductId` MEDIUMINT UNSIGNED NOT NULL,
  `VerpakkingsEenheid` DECIMAL(4,1) NOT NULL,
  `AantalAanwezig` SMALLINT UNSIGNED NOT NULL,
  `IsActief` BIT NOT NULL DEFAULT 1,
  `Opmerkingen` VARCHAR(255) DEFAULT NULL,
  `DatumAangemaakt` DATETIME(6) NOT NULL,
  `DatumGewijzigd` DATETIME(6) NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`ProductId`) REFERENCES `Product`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Gegevens worden geëxporteerd voor tabel `Magazijn`
INSERT INTO `Magazijn` (`ProductId`, `VerpakkingsEenheid`, `AantalAanwezig`, `IsActief`, `Opmerkingen`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 5, 453, 1, NULL, SYSDATE(6), SYSDATE(6)),
(2, 2.5, 400, 1, NULL, SYSDATE(6), SYSDATE(6)),
(3, 5, 1, 1, NULL, SYSDATE(6), SYSDATE(6)),
(4, 1, 800, 1, NULL, SYSDATE(6), SYSDATE(6)),
(5, 3, 234, 1, NULL, SYSDATE(6), SYSDATE(6)),
(6, 2, 345, 1, NULL, SYSDATE(6), SYSDATE(6)),
(7, 1, 795, 1, NULL, SYSDATE(6), SYSDATE(6)),
(8, 10, 233, 1, NULL, SYSDATE(6), SYSDATE(6)),
(9, 2.5, 123, 1, NULL, SYSDATE(6), SYSDATE(6)),
(10, 3, 0, 1, NULL, SYSDATE(6), SYSDATE(6)),
(11, 2, 367, 1, NULL, SYSDATE(6), SYSDATE(6)),
(12, 1, 467, 1, NULL, SYSDATE(6), SYSDATE(6)),
(13, 5, 20, 1, NULL, SYSDATE(6), SYSDATE(6));

-- Stored Procedure voor het ophalen van alle producten uit de Magazijn-tabel
DROP PROCEDURE IF EXISTS spReadMagazijnProduct;

DELIMITER //

CREATE PROCEDURE spReadMagazijnProduct()
BEGIN
    SELECT 
        p.Barcode,
        p.Naam,
        p.Verpakkingseenheid,
        m.AantalAanwezig,
        p.Id AS ProductId
    FROM 
        Magazijn m
    JOIN 
        Product p ON m.ProductId = p.Id;
END //
DELIMITER ;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;