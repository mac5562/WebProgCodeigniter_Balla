/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  akos4
 * Created: Mar 2, 2020
 */

CREATE TABLE employees(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    ssn CHAR(9) NOT NULL,
    tin CHAR(10) NOT NULL,
    
    CONSTRAINT PK_employees PRIMARY KEY(id),
    CONSTRAINT UQ_employees_ssn UNIQUE(ssn),
    CONSTRAINT UQ_employees_tin UNIQUE(tin)
);

INSERT INTO employees(name, ssn, tin) 
VALUES('Fish Boi', '012345678', '0123456789');


INSERT INTO employees(name, ssn, tin) 
VALUES('OwO Man', '123456780', '1234567890');

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Ápr 05. 15:54
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `postal_code` char(4) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `cities` (`id`, `postal_code`, `name`) VALUES
(1, '3036', 'Gyöngyöstarján'),
(2, '3300', 'Eger');


ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
