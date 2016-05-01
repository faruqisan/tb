-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2016 at 01:49 PM
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
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
`id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `chat` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `time`, `sender_id`, `receiver_id`, `chat`) VALUES
(1, '2016-04-28 19:39:53', 2, 12, 'Siang dok'),
(2, '2016-04-28 20:16:36', 12, 2, 'siang jg'),
(3, '2016-04-28 20:43:28', 12, 2, 'tes'),
(4, '2016-04-29 05:56:48', 2, 13, 'halo om'),
(5, '2016-04-30 07:38:33', 13, 2, 'Siapa ini');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `id_privilage`) VALUES
(1, 'defaultApprover', '5e8edd851d2fdfbd7415232c67367cc3', 2),
(2, 'pasien@tb', 'f5c25a0082eb0748faedca1ecdcfb131', 1),
(3, 'developer@tb', '5e8edd851d2fdfbd7415232c67367cc3', 1),
(4, 'admin@tb', '21232f297a57a5a743894a0e4a801fc3', 2),
(9, 'register@tb', '9de4a97425678c5b1288aa70c1669a64', 1),
(10, 'register2@tb', '5b72e328b5146478475b6d51911027ac', 1),
(11, 'pasiengagal@tb', '07abd50f55559c4b0168064eafb7ee03', 1),
(12, 'dokter@tb', 'd22af4180eee4bd95072eb90f94930e5', 3),
(13, 'dokter2@tb', '83ac5c3ef493ab7cdebd68dc1712ca89', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE IF NOT EXISTS `user_information` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `id_user`, `firstname`, `lastname`, `dob`, `address`, `phone`) VALUES
(1, 2, 'Dummy', 'Patient', '1995-02-14', 'Dummy Address', '08111111111'),
(2, 3, 'dev', 'eloper', '2016-04-01', 'hhh', '333333333'),
(3, 4, 'Haruka', 'Kanata', '2016-04-01', 'asd', '124124'),
(4, 9, 'A', 'B', '2016-04-27', 'Jl.Gajah Mada no 210', '081222225317'),
(5, 10, 'T', 'H', '2016-04-27', 'Jl.Gajah Mada no 210', '081222225317'),
(6, 11, 'pasien', 'gagal', '1999-02-12', 'asgasdgasd', '08789878671'),
(7, 12, 'dokter', 'radjiman', '1992-03-02', 'padang', '+628136339'),
(8, 13, 'Ikhsan', 'Faruqi', '2016-12-12', 'bdg', '898989');

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
  `approver_id` int(11) DEFAULT '1',
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `id_user`, `video_link`, `upload_time`, `approved_status`, `approver_id`, `keterangan`) VALUES
(1, 3, 'video/developer@tb/20160420_013758.mp4', '2016-04-22 08:16:08', 'DECLINED', 4, 'kurang maksimal'),
(3, 3, 'video/developer@tb/20160421_014124.mp4', '2016-04-27 07:50:08', 'ACCEPTED', 12, 'a'),
(4, 3, 'video/developer@tb/20160421_0141241.mp4', '2016-04-22 08:30:23', 'ACCEPTED', 4, 'Tinggal 2 obat lagi'),
(6, 2, 'video/pasien@tb/20160424_131517.mp4', '2016-04-24 06:16:30', 'NEW', 1, NULL),
(8, 2, 'video/pasien@tb/trim_E9C905E7-6286-46D1-A4AB-26CF53D90B771.MOV', '2016-04-24 16:32:42', 'DECLINED', 4, 'Salah pencet'),
(9, 2, 'video/pasien@tb/20160427_233126.mp4', '2016-04-27 04:31:33', 'NEW', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_comment`
--

CREATE TABLE IF NOT EXISTS `video_comment` (
`id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `commenter_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_comment`
--

INSERT INTO `video_comment` (`id`, `video_id`, `commenter_id`, `comment`, `comment_date`) VALUES
(1, 8, 2, 'tes', '2016-04-24 14:21:38'),
(2, 4, 2, 'apa apaan ini !', '2016-04-24 16:01:10');

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
-- Stand-in structure for view `vw_chat`
--
CREATE TABLE IF NOT EXISTS `vw_chat` (
`id` int(11)
,`sender_id` int(11)
,`receiver_email` varchar(255)
,`time` timestamp
,`chat` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_comment`
--
CREATE TABLE IF NOT EXISTS `vw_comment` (
`id` int(11)
,`video_id` int(11)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`comment` varchar(255)
,`comment_date` timestamp
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
-- Stand-in structure for view `vw_dokter`
--
CREATE TABLE IF NOT EXISTS `vw_dokter` (
`id` int(11)
,`email` varchar(255)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`dob` date
,`phone` varchar(255)
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
-- Stand-in structure for view `vw_pasien`
--
CREATE TABLE IF NOT EXISTS `vw_pasien` (
`id` int(11)
,`email` varchar(255)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`dob` date
,`phone` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_video`
--
CREATE TABLE IF NOT EXISTS `vw_user_video` (
`id` int(11)
,`id_user` int(11)
,`video_link` varchar(255)
,`upload_time` timestamp
,`keterangan` varchar(255)
,`email` varchar(255)
,`approved_status` enum('NEW','DECLINED','ACCEPTED','')
);
-- --------------------------------------------------------

--
-- Structure for view `vw_acc_video`
--
DROP TABLE IF EXISTS `vw_acc_video`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_acc_video` AS select `video`.`id` AS `id`,`video`.`id_user` AS `id_user`,`user_information`.`firstname` AS `firstname`,`user_information`.`lastname` AS `lastname`,`user`.`email` AS `email`,`video`.`video_link` AS `video_link`,`video`.`upload_time` AS `upload_time`,`video`.`keterangan` AS `keterangan` from ((`video` join `user`) join `user_information`) where ((`video`.`id_user` = `user`.`id`) and (`video`.`id_user` = `user_information`.`id_user`) and (`video`.`approved_status` = 'ACCEPTED'));

-- --------------------------------------------------------

--
-- Structure for view `vw_chat`
--
DROP TABLE IF EXISTS `vw_chat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_chat` AS select `chat`.`id` AS `id`,`chat`.`sender_id` AS `sender_id`,`user`.`email` AS `receiver_email`,`chat`.`time` AS `time`,`chat`.`chat` AS `chat` from (`chat` join `user`) where (`chat`.`receiver_id` = `user`.`id`);

-- --------------------------------------------------------

--
-- Structure for view `vw_comment`
--
DROP TABLE IF EXISTS `vw_comment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_comment` AS select `video_comment`.`id` AS `id`,`video_comment`.`video_id` AS `video_id`,`user_information`.`firstname` AS `firstname`,`user_information`.`lastname` AS `lastname`,`video_comment`.`comment` AS `comment`,`video_comment`.`comment_date` AS `comment_date` from (`video_comment` join `user_information`) where (`video_comment`.`commenter_id` = `user_information`.`id_user`);

-- --------------------------------------------------------

--
-- Structure for view `vw_dec_video`
--
DROP TABLE IF EXISTS `vw_dec_video`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_dec_video` AS select `video`.`id` AS `id`,`video`.`id_user` AS `id_user`,`user_information`.`firstname` AS `firstname`,`user_information`.`lastname` AS `lastname`,`user`.`email` AS `email`,`video`.`video_link` AS `video_link`,`video`.`upload_time` AS `upload_time`,`video`.`keterangan` AS `keterangan` from ((`video` join `user`) join `user_information`) where ((`video`.`id_user` = `user`.`id`) and (`video`.`id_user` = `user_information`.`id_user`) and (`video`.`approved_status` = 'DECLINED'));

-- --------------------------------------------------------

--
-- Structure for view `vw_dokter`
--
DROP TABLE IF EXISTS `vw_dokter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_dokter` AS select `user`.`id` AS `id`,`user`.`email` AS `email`,`user_information`.`firstname` AS `firstname`,`user_information`.`lastname` AS `lastname`,`user_information`.`dob` AS `dob`,`user_information`.`phone` AS `phone` from (`user` join `user_information`) where ((`user_information`.`id_user` = `user`.`id`) and (`user`.`id_privilage` = 3));

-- --------------------------------------------------------

--
-- Structure for view `vw_new_video`
--
DROP TABLE IF EXISTS `vw_new_video`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_new_video` AS select `video`.`id` AS `id`,`video`.`id_user` AS `id_user`,`user_information`.`firstname` AS `firstname`,`user_information`.`lastname` AS `lastname`,`user`.`email` AS `email`,`video`.`video_link` AS `video_link`,`video`.`upload_time` AS `upload_time` from ((`video` join `user`) join `user_information`) where ((`video`.`id_user` = `user`.`id`) and (`video`.`id_user` = `user_information`.`id_user`) and (`video`.`approved_status` = 'NEW'));

-- --------------------------------------------------------

--
-- Structure for view `vw_pasien`
--
DROP TABLE IF EXISTS `vw_pasien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pasien` AS select `user`.`id` AS `id`,`user`.`email` AS `email`,`user_information`.`firstname` AS `firstname`,`user_information`.`lastname` AS `lastname`,`user_information`.`dob` AS `dob`,`user_information`.`phone` AS `phone` from (`user` join `user_information`) where ((`user_information`.`id_user` = `user`.`id`) and (`user`.`id_privilage` = 1));

-- --------------------------------------------------------

--
-- Structure for view `vw_user_video`
--
DROP TABLE IF EXISTS `vw_user_video`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_video` AS select `video`.`id` AS `id`,`video`.`id_user` AS `id_user`,`video`.`video_link` AS `video_link`,`video`.`upload_time` AS `upload_time`,`video`.`keterangan` AS `keterangan`,`user`.`email` AS `email`,`video`.`approved_status` AS `approved_status` from (`video` join `user`) where (`video`.`approver_id` = `user`.`id`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`id`), ADD KEY `sender_id` (`sender_id`,`receiver_id`), ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `privilage`
--
ALTER TABLE `privilage`
 ADD PRIMARY KEY (`id`), ADD KEY `desc` (`desc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `id_privilage` (`id_privilage`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`,`approver_id`), ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `video_comment`
--
ALTER TABLE `video_comment`
 ADD PRIMARY KEY (`id`), ADD KEY `video_id` (`video_id`,`commenter_id`), ADD KEY `commenter_id` (`commenter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `privilage`
--
ALTER TABLE `privilage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `video_comment`
--
ALTER TABLE `video_comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`),
ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`);

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

--
-- Constraints for table `video_comment`
--
ALTER TABLE `video_comment`
ADD CONSTRAINT `video_comment_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`),
ADD CONSTRAINT `video_comment_ibfk_2` FOREIGN KEY (`commenter_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
