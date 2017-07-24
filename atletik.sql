-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2017 at 09:25 AM
-- Server version: 5.7.19-0ubuntu0.17.04.1
-- PHP Version: 7.0.18-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atletik`
--

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `id_run` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`id`, `id_run`, `id_user`) VALUES
(1, 2, 1),
(13, 4, 1),
(14, 2, 4),
(15, 3, 8),
(16, 4, 16),
(17, 2, 11),
(18, 3, 6),
(19, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `times` float NOT NULL,
  `point` int(11) NOT NULL,
  `id_run` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `run`
--

CREATE TABLE `run` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `validate` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `run`
--

INSERT INTO `run` (`id`, `name`, `city`, `date`, `validate`) VALUES
(1, 'Run 2eme edition', 'Peta Ouchnok', '2017-07-18', 1),
(2, 'Run 1ere edition', 'Troufaillon Les oies', '2017-07-28', 0),
(3, 'Course contre l\'autisme', 'Guiclan', '2017-07-27', 0),
(4, 'Course contre le cancer', 'Pleyber-Christ', '2017-07-30', 0),
(5, 'TEST', 'Guiclan', '2017-07-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `coef` float NOT NULL,
  `age_min` int(2) NOT NULL,
  `age_max` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `coef`, `age_min`, `age_max`) VALUES
(1, 'Masters', 1.35, 41, 120),
(2, 'Seniors', 1, 23, 40),
(3, 'Espoirs', 1.09, 20, 22),
(4, 'Juniors', 1.18, 18, 19),
(5, 'Cadets', 1.21, 16, 17),
(6, 'Minimes', 1.35, 14, 15),
(7, 'Benjamins', 1.42, 12, 13),
(8, 'Poussins', 1.5, 10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `typ_id` int(11) DEFAULT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `birthday`, `typ_id`, `role`) VALUES
(1, 'Biddal', '$2y$13$DSqMGPeo84qhEwLLrwGJEuIlYWtNAIg4V9lVXi0mi884LFdZqHjOm', 'Biddau', 'Jean-christophe', '1985-03-25', 2, 'ROLE_ADMIN'),
(2, 'Duss', '$2y$13$pSetLbiwhIK3XsaEXxqDoOuZbE.Mrk81vPNoCOjEcr6f5j4pjDQWy', 'Duss', 'Jean-claude', '1985-01-30', 2, 'ROLE_USER'),
(4, 'Bibi', 'Bibi', 'Bibi', 'Lafrite', '1965-03-21', 1, 'ROLE_USER'),
(5, 'Robert', 'Robert', 'Robert', 'Camembert', '1989-08-20', 2, 'ROLE_USER'),
(6, 'Christine', 'Christine', 'Christine', 'Boutin', '1992-01-29', 2, 'ROLE_USER'),
(7, 'Albert', 'Albert', 'Albert', 'Heinstein', '1995-06-12', 3, 'ROLE_USER'),
(8, 'Marguaret', 'Marguaret', 'Marguaret', 'Thatcher', '2003-02-07', 6, 'ROLE_USER'),
(9, 'Jules', 'Jules', 'Jules', 'Cesar', '1991-02-21', 2, 'ROLE_USER'),
(10, 'Momo', 'Momo', 'Momo', 'Ise', '1997-04-15', 3, 'ROLE_USER'),
(11, 'Sidharta', 'Sidharta', 'Sidharta', 'gautama', '1991-03-18', 2, 'ROLE_USER'),
(12, 'Adolf', 'Adolf', 'Adolf', 'Hitler', '2006-07-21', 8, 'ROLE_USER'),
(13, 'Oussama', 'Oussama', 'Oussama', 'Ben Laden', '2001-05-30', 5, 'ROLE_USER'),
(14, 'Jonnhy', 'Jonnhy', 'Jonnhy', 'Haliday', '1989-02-28', 2, 'ROLE_USER'),
(15, 'Justin', 'Justin', 'Justin', 'Bieber', '1982-01-06', 2, 'ROLE_USER'),
(16, 'Nicky', 'Nicky', 'Nicky', 'Larson', '2006-02-16', 8, 'ROLE_USER'),
(17, 'Lionel', 'Lionel', 'Lionel', 'Duboeuf', '2004-03-04', 7, 'ROLE_USER'),
(18, 'Pika', 'Pika', 'Pika', 'Tchu', '1999-03-13', 4, 'ROLE_USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idrun` (`id_run`),
  ADD KEY `FKiduser` (`id_user`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_runid` (`id_run`),
  ADD KEY `FK_userid` (`id_user`);

--
-- Indexes for table `run`
--
ALTER TABLE `run`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idtyp` (`typ_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `run`
--
ALTER TABLE `run`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_idrun` FOREIGN KEY (`id_run`) REFERENCES `run` (`id`),
  ADD CONSTRAINT `FKiduser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `FK_runid` FOREIGN KEY (`id_run`) REFERENCES `run` (`id`),
  ADD CONSTRAINT `FK_userid` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_idtyp` FOREIGN KEY (`typ_id`) REFERENCES `type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
