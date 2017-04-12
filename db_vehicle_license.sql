-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2017 at 04:09 AM
-- Server version: 5.7.17
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vehicle_license`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owner_reg`
--

CREATE TABLE `tbl_owner_reg` (
  `fld_fname` text,
  `fld_mname` text NOT NULL,
  `fld_lname` text NOT NULL,
  `fld_nrn` varchar(10) NOT NULL,
  `fld_address1` varchar(80) NOT NULL,
  `fld_address2` varchar(80) NOT NULL,
  `fld_region` varchar(80) NOT NULL,
  `fld_zip` text NOT NULL,
  `fld_gender` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_owner_reg`
--

INSERT INTO `tbl_owner_reg` (`fld_fname`, `fld_mname`, `fld_lname`, `fld_nrn`, `fld_address1`, `fld_address2`, `fld_region`, `fld_zip`, `fld_gender`) VALUES
('Adrian', 'J', 'Pinder', '1111111111', '123 Black Rock', '3rd Avenue', 'Christ Church', 'BB20009', 'female'),
('a', 'a', 'a', '1000000000', 'a', 'a', 'Christ Church', 'BB20009', 'female'),
('y', 'y', 'y', '1000000005', 'h', 'h', 'Christ Church', 'BB20009', 'female'),
('Clio', 'Z', 'Watkins', '7512030120', 'Diamond Corner - Highway B', 'Belleplaine Housing Area (WORRELL VALE)', 'Christ Church', 'BB25012', 'female'),
('Nicole', 'D', 'Oneil', '8002020121', 'Highway 2 Charles Duncan O\'Neal Highway', 'Alleyne School Road', 'St. Thomas', 'BB25012', 'male'),
('Francis', 'C', 'Acosta', '7512030122', 'Rose Hill Tenantry', 'Belleplaine Housing Area (BELLEPLAINE)', 'St. Peter', 'BB25012', 'female'),
('Randall', 'M', 'Lang', '7512030118', 'Boscobel - Highway B2', 'Ermy Bourne Highway', 'St. Philip', 'BB25012', 'male'),
('Chava', 'U', 'Pollard', '8412110119', 'Charles Duncan O\'Neal Highway (Highway 1)', 'Farell\'s Road', 'St. Andrew', 'BB25012', 'female'),
('Karen', 'Y', 'Potter', '7512030117', 'Savannah Road (SHOREY VILLAGE)', 'Redman Road', 'St. John', 'BB25012', 'male'),
('Cassady', 'S', 'Mcpherson', '7512030116', 'Savannah Road (GREENLAND TENANTRY)', 'Highway 2 Belleplaine', 'St. James', 'BB25007', 'male'),
('Gregory', 'E', 'Delaney', '7512030115', 'Savannah Road (GREENLAND)', 'Belleplaine Housing Area (WALKERS)', 'St. Peter', 'BB25006', 'female'),
('Maile', 'H', 'Valdez', '7512030114', 'Douglin Tenantry Road', 'Turners Hall - Swann /Highway C (WALKERS)', 'St. Thomas', 'BB25003', 'male'),
('Josephine', 'T', 'Avila', '7512030113', 'Highway B - Shorey Village/Morgan Lewis', 'Bawdens -Walkers Road /Highway C', 'Christ Church', 'BB25003', 'female'),
('Xyla', 'D', 'Doyle', '7512030111', 'Regency Park', 'Isolation Road (BELLEPLAINE)', 'St. Philip', 'BB15028', 'male'),
('Noah', 'A', 'Mcfadden', '7512030112', 'Dover Gardens', 'Turners Hall - Swann /Highway C (BAWDENS)', 'St. Andrew', 'BB25001', 'male'),
('Abbot', 'W', 'Meyer', '8912030110', 'Hastings', 'Franklyn Doughlin Tenantry Road', 'St. John', 'BB15094', 'female'),
('Marcia', 'Z', 'Blackburn', '7512030123', 'Savannah Road', 'Jordan\'s Road', 'St. James', 'BB25012', 'male'),
('Mollie', 'E', 'Carpenter', '6212030124', 'Sedge Pond', 'Worrell\'s Road', 'St. John', 'BB25015', 'female'),
('Shellie', 'E', 'Alvarez', '7204030125', 'Douglin Tenantry Road', 'Belleplaine Housing Area', 'St. Philip', 'BB25015', 'female'),
('Russell', 'T', 'Britt', '7512030126', 'Highway 2 (WALKERS)', 'Franklyn Doughlin Tenantry Road', 'St. Andrew', 'BB25017', 'female'),
('Benedict', 'P', 'Miles', '7512030127', 'Highway 2 (WALKERS BAY)', 'Jordan\'s Road A', 'St. Lucy', 'BB25020', 'female'),
('Shelly', 'P', 'Mckee', '7512030128', 'Bawdens -Walkers Road /Highway C', 'Highway 2 Belleplaine', 'St. George', 'BB25023', 'male'),
('Cassandra', 'C', 'Grant', '4712030129', 'Bawden (BAWDEN)', 'Highway 2 Haggatts', 'St. Michael', 'BB25024', 'male'),
('David', 'B', 'Hobbs', '7512030130', 'Franklyn Doughlin Tenantry Road', 'Babylon Road', 'St. Peter', 'BB25025', 'female'),
('Phoebe', 'H', 'Harrington', '5512030131', 'Isolation Road (BELLEPLAINE)', 'Redman Road (WALKERS)', 'St. James', 'BB25025', 'female'),
('Drake', 'Y', 'Lester', '7512030132', 'Turners Hall - Swann /Highway C (BAWDENS)', 'Redman Road (WALKERS)', 'St. John', 'BB25026', 'female'),
('Ruth', 'D', 'Chandler', '7512030133', 'Bawdens -Walkers Road /Highway C', 'St. Simons', 'St. Philip', 'BB25026', 'male'),
('Darius', 'M', 'Hull', '9009080134', 'Turners Hall - Swann /Highway C (WALKERS)', 'Turners Hall - Swann /Highway C', 'St. Andrew', 'BB25029', 'male'),
('Suki', 'B', 'Curry', '7512030135', 'Belleplaine Housing Area (WALKERS)', 'Hillaby', 'St. Lucy', 'BB25029', 'male'),
('Alexander', 'C', 'Crosby', '7512030136', 'Highway 2 Belleplaine', 'Mose Bottom Tenantry Road (GREGG FARM)', 'St. George', 'BB25029', 'male'),
('Jerome', 'C', 'Sullivan', '7512030137', 'Redman Road', 'Mose Bottom Tenantry Road (TURNER HALL)', 'St. Michael', 'BB25031', 'male'),
('Oleg', 'H', 'Dalton', '7512030138', 'Ermy Bourne Highway', 'Belleplaine Housing Area', 'St. Peter', 'BB25031', 'female'),
('Brenna', 'E', 'Gallagher', '7512030139', 'Farell\'s Road', 'Oxnards Gardens', 'St. James', 'BB25032', 'female'),
('Yeo', 'C', 'Noble', '7512030140', 'Belleplaine Housing Area (WORRELL VALE)', 'Bawdens -Walkers Road /Highway C', 'St. John', 'BB25033', 'female'),
('Stephanie', 'H', 'Tyson', '8111030141', 'Alleyne School Road', 'Bawden (BAWDEN)', 'St. Philip', 'BB25033', 'female'),
('Sigourney', 'T', 'Mclaughlin', '7512030142', 'Belleplaine Housing Area (BELLEPLAINE)', 'Franklyn Doughlin Tenantry Road', 'St. Andrew', 'BB25033', 'female'),
('Angela', 'B', 'Kaufman', '7512030143', 'Jordan\'s Road', 'Isolation Road (BELLEPLAINE)', 'St. Lucy', 'BB25033', 'male'),
('Harding', 'J', 'Logan', '9212200144', 'Worrell\'s Road', 'Turners Hall - Swann /Highway C (BAWDENS)', 'St. George', 'BB25034', 'female'),
('Lev', 'Y', 'Russell', '7512030145', 'Belleplaine Housing Area', 'Bawdens -Walkers Road /Highway C', 'St. Michael', 'BB25034', 'female'),
('Baker', 'N', 'Rios', '7512030146', 'Franklyn Doughlin Tenantry Road', 'Turners Hall - Swann /Highway C (WALKERS)', 'St. Peter', 'BB25034', 'male'),
('Cain', 'H', 'Hendrix', '7512030147', 'Jordan\'s Road A', 'Belleplaine Housing Area (WALKERS)', 'St. James', 'BB25035', 'male'),
('Unity', 'K', 'Hansen', '7512030148', 'Highway 2 Belleplaine', 'Highway 2 Belleplaine', 'St. John', 'BB25035', 'female'),
('Orla', 'C', 'Todd', '7512030149', 'Highway 2 Haggatts', 'Redman Road', 'St. Philip', 'BB25036', 'female'),
('Nola', 'F', 'Glover', '7512030150', 'Babylon Road', 'Ermy Bourne Highway', 'St. Andrew', 'BB25036', 'male'),
('Gabriel', 'S', 'Blackburn', '7512030151', 'Redman Road (WALKERS)', 'Farell\'s Road', 'St. Lucy', 'BB25037', 'male'),
('Xander', 'E', 'Alvarez', '7512030152', 'Redman Road (WALKERS)', 'Belleplaine Housing Area (WORRELL VALE)', 'St. George', 'BB25041', 'female'),
('Logan', 'I', 'Benson', '7512030153', 'St. Simons', 'Alleyne School Road', 'St. Michael', 'BB25044', 'male'),
('Basil', 'B', 'Terry', '7512030154', 'Turners Hall - Swann /Highway C', 'Belleplaine Housing Area (BELLEPLAINE)', 'St. Peter', 'BB25046', 'female'),
('Kyle', 'Q', 'Wall', '7512030155', 'Hillaby', 'Charles Duncan O\'Neal Highway (Highway 1)', 'St. James', 'BB25049', 'female'),
('Wilma', 'I', 'Santos', '7512030156', 'Mose Bottom Tenantry Road (GREGG FARM)', 'Diamond Corner - Highway B', 'St. John', 'BB25050', 'male'),
('Ivan', 'C', 'Rosa', '7512030157', 'Mose Bottom Tenantry Road (TURNER HALL)', 'Highway 2 Charles Duncan O\'Neal Highway', 'St. Philip', 'BB25051', 'male'),
('Priscilla', 'Z', 'Reilly', '7512030158', 'Belleplaine Housing Area', 'Rose Hill Tenantry', 'St. Andrew', 'BB25051', 'female'),
('Alfred', 'X', 'Hitchcock', '8209090123', 'Oxnards Gardens', 'Savannah Road', 'St. James', 'BB20009', 'male'),
('Shonique', 'S', 'Wall', '8209091111', 'Test', 'Test', 'Christ Church', 'BB11235', 'male'),
('Allyson', 'J', 'Felix', '2202021111', 'Nelson Road', 'Ave #2', 'St. Andrew', 'BB54321', 'female'),
('Alpha', 'J', 'Abrams', '7111030220', 'Avenue1', 'Street 2', 'St. Peter', 'BB01020', 'female'),
('Andra', 'B', 'Blackman', '8801010102', 'Axl Road', 'Ave #2', 'St. Peter', 'BB12567', 'female'),
('Raiden', 'O', 'Meeks', '8901031122', 'Coverly', 'Gardens', 'Christ Church', 'BB10935', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `fld_pay_vehno` varchar(6) NOT NULL,
  `fld_pay_hcode` varchar(100) NOT NULL,
  `fld_pay_stdate` date NOT NULL,
  `fld_pay_endate` date NOT NULL,
  `fld_pay_amt` decimal(10,2) NOT NULL,
  `fld_pay_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`fld_pay_vehno`, `fld_pay_hcode`, `fld_pay_stdate`, `fld_pay_endate`, `fld_pay_amt`, `fld_pay_date`) VALUES
('J2750', '878090f169', '2017-03-21', '2018-03-22', '670.00', '2017-04-10'),
('U899', '8326fd812d', '2016-07-07', '2016-12-01', '899.00', '2017-04-10'),
('E2222', 'f920b98ec3', '2015-01-01', '2016-12-01', '500.00', '2017-04-10'),
('U899', '74158f85ab', '2017-01-01', '2018-01-01', '800.00', '2017-04-11'),
('L2991', 'ad81aaeff4', '2017-03-21', '2018-03-21', '500.00', '2017-04-11'),
('J2750', '43001b1f19', '2016-07-07', '2016-12-01', '56.00', '2017-04-11'),
('O94', '272d833164', '2015-08-11', '2016-08-11', '1600.00', '2017-04-11'),
('J239', '52f2ff52ec', '2002-12-12', '2003-12-12', '750.00', '2017-04-11'),
('X3458', 'd6d3a1c7d5', '2007-04-21', '2008-04-21', '990.00', '2017-04-11'),
('J234', 'f5b76ad34f', '2012-02-02', '2013-02-02', '700.00', '2017-04-11'),
('O93', 'b928486dfc', '2017-04-11', '2018-04-11', '850.00', '2017-04-11'),
('L2995', '2df4a0cc39', '2016-04-11', '2017-04-11', '1600.00', '2017-04-11'),
('M113', 'f5c5fc6da8', '2017-04-11', '2018-04-11', '1600.00', '2017-04-11'),
('M110', 'c3739e6562', '2017-01-01', '2018-01-01', '450.00', '2017-04-11'),
('P2689', 'f2080e7b4e', '2012-02-02', '2013-02-02', '990.00', '2017-04-11'),
('XX1', 'a6fbf7286d', '2012-02-02', '2013-02-02', '1000.00', '2017-04-11'),
('B234', '7768e91c5d', '2000-12-12', '2001-12-12', '1605.00', '2017-04-11'),
('XT1', 'cbe72ec57c', '2009-09-09', '2010-09-09', '500.00', '2017-04-11'),
('A1234', 'eafd22f510', '2013-08-21', '2013-08-21', '780.00', '2017-04-11'),
('XE1023', 'a7389280a3', '2014-08-21', '2015-08-21', '560.00', '2017-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qrsecure`
--

CREATE TABLE `tbl_qrsecure` (
  `fld_qr_vehno` varchar(6) CHARACTER SET latin1 NOT NULL,
  `fld_qr_hcode` varchar(20) CHARACTER SET latin1 NOT NULL,
  `fld_qr_saltno` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fld_qr_message` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fld_qr_iterations` int(11) NOT NULL,
  `fld_qr_encryptmech` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_qrsecure`
--

INSERT INTO `tbl_qrsecure` (`fld_qr_vehno`, `fld_qr_hcode`, `fld_qr_saltno`, `fld_qr_message`, `fld_qr_iterations`, `fld_qr_encryptmech`) VALUES
('J2750', '878090f169', '1ba5fd925518bfa2c727', 'J27502017-04-10670', 5, 'sha256'),
('U899', '8326fd812d', '72e0b121f77558af5411', 'U8992017-04-10899', 5, 'sha256'),
('E2222', 'f920b98ec3', '6859771b75a1167286dd', 'E22222017-04-10500.00', 5, 'sha256'),
('U899', '74158f85ab', '46f0c739c3e34050dcb8', 'U8992017-04-11800', 5, 'sha256'),
('L2991', 'ad81aaeff4', '4b85d3b1791c0f2c5f6f', 'L29912017-04-11500', 5, 'sha256'),
('J2750', '43001b1f19', '7bb860b3a94cfa06e21e', 'J27502017-04-1156', 5, 'sha256'),
('O94', '272d833164', '911a7b685fd2294a2a57', 'O942017-04-111600', 5, 'sha256'),
('J239', '52f2ff52ec', 'dab6c684fd26b358196f', 'J2392017-04-11750', 5, 'sha256'),
('X3458', 'd6d3a1c7d5', 'ccb8b7cb5e7459f58e79', 'X34582017-04-11990', 5, 'sha256'),
('J234', 'f5b76ad34f', 'b81cf58794bdd4143229', 'J2342017-04-11700', 5, 'sha256'),
('O93', 'b928486dfc', '5a46bbc8a1706ca97c40', 'O932017-04-11850.00', 5, 'sha256'),
('L2995', '2df4a0cc39', 'd9dae046d5d10fdecf70', 'L29952017-04-111600', 5, 'sha256'),
('M113', 'f5c5fc6da8', 'fa265fd9fe027718f82c', 'M1132017-04-111600', 5, 'sha256'),
('M110', 'c3739e6562', 'fd703b1a6fdcbd97a630', 'M1102017-04-11450', 5, 'sha256'),
('P2689', 'f2080e7b4e', '01d483f20de03469d092', 'P26892017-04-11990', 5, 'sha256'),
('XX1', 'a6fbf7286d', '6ff5a67291e69290ae5b', 'XX12017-04-111000.00', 5, 'sha256'),
('B234', '7768e91c5d', '4044242173cc07148cba', 'B2342017-04-111605', 5, 'sha256'),
('XT1', 'cbe72ec57c', '9587181c8391a6b3cf9e', 'XT12017-04-11500.00', 5, 'sha256'),
('A1234', 'eafd22f510', '0b53fc31b5bf0536fce5', 'A12342017-04-11780', 5, 'sha256'),
('XE1023', 'a7389280a3', '7e6cb6b4b6fc47a09aa1', 'XE10232017-04-11560', 5, 'sha256');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_validation_test`
--

CREATE TABLE `tbl_validation_test` (
  `fld_name` text NOT NULL,
  `fld_email` text NOT NULL,
  `fld_website` text NOT NULL,
  `fld_comment` text NOT NULL,
  `fld_gender` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_validation_test`
--

INSERT INTO `tbl_validation_test` (`fld_name`, `fld_email`, `fld_website`, `fld_comment`, `fld_gender`) VALUES
('s', 'apinder@gmail.com', 'www.cnn.com', 'a', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_veh_reg`
--

CREATE TABLE `tbl_veh_reg` (
  `fld_owner_nrn` varchar(10) NOT NULL,
  `fld_veh_no` varchar(6) NOT NULL,
  `fld_veh_type` text NOT NULL,
  `fld_veh_model` text NOT NULL,
  `fld_veh_colour` text NOT NULL,
  `fld_veh_weight` int(11) NOT NULL,
  `fld_veh_chassis` varchar(15) NOT NULL,
  `fld_veh_engno` varchar(15) NOT NULL,
  `fld_veh_regdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_veh_reg`
--

INSERT INTO `tbl_veh_reg` (`fld_owner_nrn`, `fld_veh_no`, `fld_veh_type`, `fld_veh_model`, `fld_veh_colour`, `fld_veh_weight`, `fld_veh_chassis`, `fld_veh_engno`, `fld_veh_regdate`) VALUES
('1111111111', 'J2750', 'Toyota', 'Corolla', 'Blue', 1040, 'ljljljl4342', 'lkjl434232', '2016-08-07'),
('1111111111', 'U899', 'Mazda', '3', 'Blue', 6666, '4545hhh', 'hhh555', '2016-08-07'),
('7512030151', 'E2222', 'Hyundai', 'Elantra', 'White', 1717, 'JLJ67L332JLKAA', 'SDGSWWN8894', '2016-07-17'),
('7512030150', 'L2995', 'Suzuki', 'Vitara', 'Light Blue', 2300, '33LLNL338501L', 'SDGSWWN8893', '2016-07-16'),
('7512030149', 'L2994', 'Suzuki', 'Vitara', 'Silver', 1500, 'JJJNEII38381ND', 'SDGSWWN8892', '2016-07-15'),
('7512030148', 'L2993', 'Suzuki', 'Vitara', 'Beige', 2000, 'KJJLKJKL334433', 'SDGSWWN8891', '2016-07-14'),
('7512030147', 'L2992', 'Suzuki', 'Vitara', 'Green', 1040, 'JLKJLW99090', 'SDGSWWN8890', '2016-07-13'),
('7512030146', 'L2991', 'Suzuki', 'Vitara', 'Brown', 1040, '229475KL938LL', 'SDGSWWN8889', '2016-07-12'),
('7512030145', 'L2990', 'Suzuki', 'Vitara', 'Grey', 1238, 'AAK339918INLS', 'SDGSWWN8888', '2016-07-11'),
('9212200144', 'O94', 'Suzuki', 'Vitara', 'Yellow', 1500, 'ANSEI289RUBQ', 'SDGSWWN8887', '2016-07-10'),
('7512030143', 'O93', 'Suzuki', 'Vitara', 'Black', 1200, 'JLK933QQUEGB', 'SDGSWWN8886', '2016-07-09'),
('7512030142', 'O92', 'Suzuki', 'Vitara', 'Red', 1088, '1239JLKACXXIQ', 'JKLKJVVAIOQ899', '2016-07-08'),
('8111030141', 'O91', 'Suzuki', 'Vitara', 'White', 1199, '2323HJ3H2KAU', 'JKLKJVVAIOQ898', '2016-07-07'),
('7512030140', 'O90', 'Suzuki', 'Vitara', 'Light Blue', 2109, 'JJQQIIENA9999', 'JKLKJVVAIOQ897', '2016-07-06'),
('7512030139', 'X3460', 'Nissan', 'Sentra', 'Silver', 1234, 'JLK338ASEUFA', 'JKLKJVVAIOQ896', '2016-07-05'),
('7512030138', 'X3459', 'Nissan', 'Sentra', 'Beige', 1717, 'QQIOI9933JLKJD', 'JKLKJVVAIOQ895', '2016-07-04'),
('7512030137', 'X3458', 'Nissan', 'Sentra', 'Green', 2300, 'ASFKJXCUE822K', 'JKLKJVVAIOQ894', '2016-07-03'),
('7512030136', 'X3457', 'Nissan', 'Sentra', 'Brown', 1500, 'JL2332JLSDJLAQ', 'JKLKJVVAIOQ893', '2016-07-02'),
('7512030135', 'X3456', 'Nissan', 'Sentra', 'Grey', 2000, 'ADSLIENC9999', 'JKLKJVVAIOQ892', '2016-07-01'),
('9009080134', 'J239', 'Nissan', 'Sentra', 'Yellow', 1040, 'SFDS234222323', 'JKLKJVVAIOQ891', '2016-06-30'),
('7512030133', 'J238', 'BMW', '3 Series', 'Black', 1040, '22226678888DD', 'JKLKJVVAIOQ890', '2016-06-29'),
('7512030132', 'J237', 'BMW', '3 Series', 'Red', 1238, '44477888HHH', 'DHDFHGKKL244', '2016-06-28'),
('5512030131', 'J236', 'BMW', '3 Series', 'White', 1500, 'DSFS32322', 'DHDFHGKKL243', '2016-06-27'),
('7512030130', 'J235', 'BMW', '3 Series', 'Light Blue', 1200, '555555YDFGHGFH', 'DHDFHGKKL242', '2016-06-26'),
('4712030129', 'J234', 'BMW', '3 Series', 'Silver', 1090, '4545HFGHD', 'DHDFHGKKL241', '2016-06-25'),
('7512030128', 'J233', 'BMW', '3 Series', 'Beige', 1000, 'FGGSDG4545', 'DHDFHGKKL240', '2016-06-24'),
('7512030127', 'M114', 'BMW', '3 Series', 'Green', 1500, 'SFDI9999KKKK', 'DHDFHGKKL239', '2016-06-23'),
('7512030126', 'M113', 'BMW', '3 Series', 'Brown', 2000, '323JLKASDF9', 'DHDFHGKKL238', '2016-06-22'),
('7204030125', 'M112', 'Mazda', '3', 'Grey', 1040, 'BKALKJ23LK32', 'DHDFHGKKL237', '2016-06-21'),
('6212030124', 'M111', 'Mazda', '3', 'Yellow', 1040, 'ACOC122936', 'DHDFHGKKL236', '2016-06-20'),
('7512030123', 'M110', 'Mazda', '3', 'Black', 1238, 'ACOC122935', 'DHDFHGKKL235', '2016-06-19'),
('7512030122', 'M109', 'Mazda', '3', 'Red', 1500, 'ACOC122934', 'DHDFHGKKL234', '2016-06-18'),
('8002020121', 'P2689', 'Mazda', '3', 'White', 1200, 'ACOC122933', 'DFGDFSG7900', '2016-06-17'),
('7512030120', 'P2688', 'Mazda', '3', 'Light Blue', 1090, 'ACOC122932', 'DFGDFSG7899', '2016-06-16'),
('8412110119', 'P2687', 'Toyota', 'Camry', 'Silver', 1000, 'ACOC122931', 'DFGDFSG7898', '2016-06-15'),
('7512030118', 'P2686', 'Toyota', 'Camry', 'Beige', 1500, 'ACOC122930', 'DFGDFSG7897', '2016-06-14'),
('7512030117', 'P2685', 'Toyota', 'Camry', 'Green', 2000, 'ACOC122929', 'DFGDFSG7896', '2016-06-13'),
('7512030116', 'P2684', 'Toyota', 'Corolla', 'Brown', 1040, 'ACOC122928', 'DFGDFSG7895', '2016-06-12'),
('7512030115', 'P2683', 'Toyota', 'Corolla', 'Grey', 1040, 'ACOC122927', 'DFGDFSG7894', '2016-06-11'),
('7512030114', 'P2682', 'Toyota', 'Corolla', 'Yellow', 1238, 'ACOC122926', 'DFGDFSG7893', '2016-06-10'),
('7512030113', 'P2681', 'Toyota', 'Corolla', 'Black', 1500, 'ACOC122925', 'DFGDFSG7892', '2016-06-09'),
('7512030112', 'P2680', 'Toyota', 'Yaris', 'Red', 1200, 'ACOC122924', 'DFGDFSG7891', '2016-06-08'),
('7512030111', 'P2679', 'Toyota', 'Yaris', 'White', 1090, 'ACOC122923', 'DFGDFSG7890', '2016-06-07'),
('8912030110', 'P2678', 'Toyota', 'Yaris', 'Light Blue', 1000, 'ACOC122922', '233GSDF', '2016-06-06'),
('7512030152', 'E2223', 'Hyundai', 'Elantra', 'Red', 1234, '23JLK5LKJGA9S', 'SDGSWWN8895', '2016-07-18'),
('7512030153', 'E2224', 'Hyundai', 'Elantra', 'Black', 2109, 'AAAJKLJ4LK444', 'SDGSWWN8896', '2016-07-19'),
('7512030154', 'E2225', 'Hyundai', 'Elantra', 'Yellow', 1199, 'AAAJKLJ4LK445', 'SSDFGSDKJK998', '2016-07-20'),
('7512030155', 'E2226', 'Hyundai', 'Elantra', 'Grey', 1088, 'AAAJKLJ4LK446', 'SSDFGSDKJK999', '2016-07-21'),
('7512030156', 'E2227', 'Hyundai', 'Elantra', 'Brown', 1111, 'AAAJKLJ4LK447', 'SSDFGSDKJK1000', '2016-07-22'),
('7512030157', 'E2228', 'Hyundai', 'Elantra', 'Green', 1112, 'AAAJKLJ4LK448', 'SSDFGSDKJK1001', '2016-07-23'),
('7512030158', 'E2229', 'Hyundai', 'Elantra', 'Beige', 1457, 'AAAJKLJ4LK449', 'SSDFGSDKJK1002', '2016-07-24'),
('8209090123', 'E2230', 'Hyundai', 'Elantra', 'Silver', 1390, 'AAAJKLJ4LK450', 'SSDFGSDKJK1003', '2016-07-25'),
('2202021111', 'XT1', 'Mercedes', 'Benz', 'Beige', 1500, 'XTYT0909', 'RTTY0809', '2016-08-29'),
('7111030220', 'B234', 'Holden', 'Colorado', 'Blue', 2345, '23424999ssaa9', 'jklk3233242', '2017-03-21'),
('8801010102', 'A1234', 'Toyota', 'Corolla XE', 'Black', 3466, 'lkjlk42342lkj', 'lkjl34234', '2017-03-21'),
('8901031122', 'XE1023', 'Mazda', '3', 'Brown', 1234, 'KJLKJ79797', '23424asfsdaf', '2017-03-22'),
('1111111111', 'XX1', 'Volkswagen', 'Amarok', 'White', 3000, '223DXC', 'GG593', '2017-04-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_owner_reg`
--
ALTER TABLE `tbl_owner_reg`
  ADD PRIMARY KEY (`fld_nrn`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`fld_pay_hcode`),
  ADD KEY `fld_pay_vehno` (`fld_pay_vehno`);

--
-- Indexes for table `tbl_qrsecure`
--
ALTER TABLE `tbl_qrsecure`
  ADD PRIMARY KEY (`fld_qr_hcode`);

--
-- Indexes for table `tbl_validation_test`
--
ALTER TABLE `tbl_validation_test`
  ADD PRIMARY KEY (`fld_name`(50));

--
-- Indexes for table `tbl_veh_reg`
--
ALTER TABLE `tbl_veh_reg`
  ADD PRIMARY KEY (`fld_veh_no`),
  ADD KEY `fld_owner_nrn` (`fld_owner_nrn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
