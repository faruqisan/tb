-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2016 at 11:25 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tb`
--

-- --------------------------------------------------------

--
-- Table structure for table `privilage`
--

CREATE TABLE IF NOT EXISTS `privilage` (
`id` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privilage`
--

INSERT INTO `privilage` (`id`, `desc`) VALUES
(2, 'admin'),
(3, 'dokter'),
(1, 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_privilage` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `id_privilage`) VALUES
(1, 'dev@tb', '5e8edd851d2fdfbd7415232c67367cc3', 1),
(2, 'pasien@tb', 'f5c25a0082eb0748faedca1ecdcfb131', 1),
(3, 'developer@tb', '5e8edd851d2fdfbd7415232c67367cc3', 1),
(4, 'admin@tb', '21232f297a57a5a743894a0e4a801fc3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE IF NOT EXISTS `user_information` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id_user`, `firstname`, `lastname`, `dob`, `address`, `phone`) VALUES
(2, 'Dummy', 'Patient', '1995-02-14', 'Dummy Address', '08111111111'),
(3, 'dev', 'eloper', '2016-04-01', 'hhh', '333333333'),
(4, 'Haruka', 'Kanata', '2016-04-01', 'asd', '124124');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approved_status` enum('NEW','DECLINED','ACCEPTED','') DEFAULT 'NEW',
  `approver_id` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `id_user`, `video_link`, `upload_time`, `approved_status`, `approver_id`, `keterangan`) VALUES
(1, 3, 'video/developer@tb/20160420_013758.mp4', '2016-04-22 08:16:08', 'DECLINED', 4, 'kurang maksimal'),
(2, 3, 'video/developer@tb/20160420_013558.mp4', '2016-04-22 08:16:25', 'DECLINED', 4, 'bukan orang asli'),
(3, 3, 'video/developer@tb/20160421_014124.mp4', '2016-04-22 08:29:32', 'ACCEPTED', 4, 'Bagus lanjutkan'),
(4, 3, 'video/developer@tb/20160421_0141241.mp4', '2016-04-22 08:30:23', 'ACCEPTED', 4, 'Tinggal 2 obat lagi');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_acc_video`
--
CREATE TABLE IF NOT EXISTS `vw_acc_video` (
`id` int(11)
,`id_user` int(11)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`email` varchar(255)
,`video_link` varchar(255)
,`upload_time` timestamp
,`keterangan` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_dec_video`
--
CREATE TABLE IF NOT EXISTS `vw_dec_video` (
`id` int(11)
,`id_user` int(11)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`email` varchar(255)
,`video_link` varchar(255)
,`upload_time` timestamp
,`keterangan` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_new_video`
--
CREATE TABLE IF NOT EXISTS `vw_new_video` (
`id` int(11)
,`id_user` int(11)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`email` varchar(255)
,`video_link` varchar(255)
,`upload_time` timestamp
);
-- --------------------------------------------------------

--
-- Structure for view `vw_acc_video`
--
DROP TABLE IF EXISTS `vw_acc_video`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_acc_video` AS select `video`.`id` AS `id`,`video`.`id_user` AS `id_user`,`user_information`.`firstname` AS `firstname`,`user_information`.`lastname` AS `lastname`,`user`.`email` AS `email`,`video`.`video_link` AS `video_link`,`video`.`upload_time` AS `upload_time`,`video`.`keterangan` AS `keterangan` from ((`video` join `user`) join `user_information`) where ((`video`.`id_user` = `user`.`id`) and (`video`.`id_user` = `user_information`.`id_user`) and (`video`.`approved_status` = 'ACCEPTED'));

-- --------------------------------------------------------

--
-- Structure for view `vw_dec_video`
--
DROP TABLE IF EXISTS `vw_dec_video`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_dec_video` AS select `video`.`id` AS `id`,`video`.`id_user` AS `id_user`,`user_information`.`firstname` AS `firstname`,`user_information`.`lastname` AS `lastname`,`user`.`email` AS `email`,`video`.`video_link` AS `video_link`,`video`.`upload_time` AS `upload_time`,`video`.`keterangan` AS `keterangan` from ((`video` join `user`) join `user_information`) where ((`video`.`id_user` = `user`.`id`) and (`video`.`id_user` = `user_information`.`id_user`) and (`video`.`approved_status` = 'DECLINED'));

-- --------------------------------------------------------

--
-- Structure for view `vw_new_video`
--
DROP TABLE IF EXISTS `vw_new_video`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_new_video` AS select `video`.`id` AS `id`,`video`.`id_user` AS `id_user`,`user_information`.`firstname` AS `firstname`,`user_information`.`lastname` AS `lastname`,`user`.`email` AS `email`,`video`.`video_link` AS `video_link`,`video`.`upload_time` AS `upload_time` from ((`video` join `user`) join `user_information`) where ((`video`.`id_user` = `user`.`id`) and (`video`.`id_user` = `user_information`.`id_user`) and (`video`.`approved_status` = 'NEW'));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `privilage`
--
ALTER TABLE `privilage`
 ADD PRIMARY KEY (`id`), ADD KEY `desc` (`desc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD KEY `id_privilage` (`id_privilage`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
 ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`,`approver_id`), ADD KEY `approver_id` (`approver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `privilage`
--
ALTER TABLE `privilage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_privilage`) REFERENCES `privilage` (`id`);

--
-- Constraints for table `user_information`
--
ALTER TABLE `user_information`
ADD CONSTRAINT `user_information_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`approver_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
