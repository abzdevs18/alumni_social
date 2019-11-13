-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 06:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `f_k` int(11) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `intro` varchar(100) DEFAULT NULL,
  `experience` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `f_k`, `address`, `phone`, `email`, `intro`, `experience`) VALUES
(1, 19, 'Siaton', '8080', 'ann@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `add_emp`
--

CREATE TABLE `add_emp` (
  `id` int(11) NOT NULL,
  `f_k` int(11) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `job_related_field` tinyint(1) NOT NULL,
  `company` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_email`
--

CREATE TABLE `admin_email` (
  `id` int(11) NOT NULL,
  `f_k` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_email`
--

INSERT INTO `admin_email` (`id`, `f_k`, `email`) VALUES
(0, 4, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_post`
--

CREATE TABLE `admin_post` (
  `post_id` int(11) NOT NULL,
  `f_k` int(11) NOT NULL,
  `post_content` varchar(250) DEFAULT NULL,
  `post_Date` varchar(250) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_post`
--

INSERT INTO `admin_post` (`post_id`, `f_k`, `post_content`, `post_Date`, `timestamp`) VALUES
(1, 4, 'To the Future', 'February 9, 2019', '2019-03-01 05:37:24'),
(2, 4, '', 'February 10, 2019', '2019-03-01 05:37:24'),
(3, 4, 'Welcome Graduates! Stay tuned for our posts.', 'February 10, 2019', '2019-03-01 05:37:24'),
(4, 4, 'Message our Admin if you have any questions.', 'February 10, 2019', '2019-03-01 05:37:24'),
(5, 4, 'Developer Lim, a product of our very own Campus, takes the mic!', 'February 10, 2019', '2019-03-01 05:37:24'),
(6, 4, '', 'February 10, 2019', '2019-03-01 05:37:24'),
(7, 4, 'What was your course back then? See the list of courses from your different batchmates on the Alumni Section. It would be fun looking at their profiles.', 'February 10, 2019', '2019-03-01 05:37:24'),
(8, 4, 'Our logo which symbolizes tons of symbolism and reflects the vision of the system itself. We bet you spot the iconic royal blue, bright red, and saturated yellow reference. ;)', 'February 10, 2019', '2019-03-01 05:37:24'),
(9, 4, 'FAQs! Only Facts!', 'February 10, 2019', '2019-03-01 05:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile_photo`
--

CREATE TABLE `admin_profile_photo` (
  `id` int(11) NOT NULL,
  `f_k` int(11) NOT NULL,
  `prof_status` int(1) NOT NULL,
  `image_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_profile_photo`
--

INSERT INTO `admin_profile_photo` (`id`, `f_k`, `prof_status`, `image_path`) VALUES
(1, 4, 0, '200px-Negros_Oriental_State_University.png'),
(2, 4, 1, '200px-Negros_Oriental_State_University.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `lastname`, `gender`, `password`, `status`) VALUES
(4, 'admin', 'admin', 'Male', '$2y$10$qbpm4zVpKjpShNyUiyjqV.tpoAplbvWLp7BHjKBbJ1lMwZIAiY.We', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_content` char(250) NOT NULL,
  `comment_date` varchar(100) DEFAULT NULL,
  `comment_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `f_k` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `batch` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `email_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date_send` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `featured_img`
--

CREATE TABLE `featured_img` (
  `img_id` int(11) NOT NULL,
  `img_fk` int(11) NOT NULL,
  `img_path` varchar(250) NOT NULL,
  `date_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_upload`
--

CREATE TABLE `image_upload` (
  `img_id` int(11) NOT NULL,
  `img_fk` int(11) NOT NULL,
  `img_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_upload`
--

INSERT INTO `image_upload` (`img_id`, `img_fk`, `img_path`) VALUES
(2, 2, '4.jpg'),
(3, 3, '4.jpg'),
(4, 4, '5.jpg'),
(5, 5, '6.jpg'),
(6, 6, '1.jpg'),
(7, 7, '2.jpg'),
(8, 8, 'L.png'),
(9, 9, 'faq.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `reaction_id` int(7) NOT NULL,
  `post_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `post_like` int(7) NOT NULL,
  `month` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_msg`
--

CREATE TABLE `tbl_msg` (
  `msg_id` int(11) NOT NULL,
  `msg_receiver` int(11) NOT NULL,
  `msg_sender` int(11) NOT NULL,
  `msg_content` varchar(250) NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_data`
--

CREATE TABLE `tmp_data` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_data`
--

INSERT INTO `tmp_data` (`id`, `name`, `course`) VALUES
(1, 'Nur Rhaihana Lim', 'BSInt'),
(2, 'Johanna Mae Cadano', 'BSInt'),
(3, 'Ann Melanie Valencia', 'BSBA'),
(4, 'Georgette Ventula', 'BSHM'),
(5, 'Reggienal Suarez', 'BSED'),
(6, 'Ann Tan', 'BSInt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `yearGraduate` int(4) NOT NULL,
  `Employed` int(1) NOT NULL,
  `Unemployed` int(1) NOT NULL,
  `course` char(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userLastName` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `userGender` char(6) NOT NULL,
  `birth_details` varchar(20) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `account_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `yearGraduate`, `Employed`, `Unemployed`, `course`, `userName`, `userLastName`, `password`, `userGender`, `birth_details`, `online`, `account_status`) VALUES
(0, 2019, 1, 0, 'B.S. in Information Technology', 'Admin', 'Admin', '$2y$10$zlWxGB8mIgqqVk5sjY3gMOreIuVAu9cm./ZnknVM4iJtHhzvFMiXq', 'Male', '891993', 1, 0),
(19, 2019, 0, 0, 'BSInt', 'Ann', 'Tan', '$2y$10$ZgLr8l0sUiz2lgf2gP0ANe0cglcYDbTmlQdTU6tdy4Z9nxVIOqy1e', 'Female', '891993', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_user_photo`
--

CREATE TABLE `user_user_photo` (
  `img_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_photo` tinyint(1) NOT NULL,
  `img_path` varchar(250) NOT NULL,
  `img_Up_time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_upload`
--

CREATE TABLE `video_upload` (
  `video_id` int(11) NOT NULL,
  `video_fk` int(11) NOT NULL,
  `video_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wall_img`
--

CREATE TABLE `wall_img` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wall_use` tinyint(1) NOT NULL,
  `wall_path` varchar(250) NOT NULL,
  `wall_up_time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_k` (`f_k`);

--
-- Indexes for table `add_emp`
--
ALTER TABLE `add_emp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_k` (`f_k`);

--
-- Indexes for table `admin_email`
--
ALTER TABLE `admin_email`
  ADD KEY `admin_email_ibfk_1` (`f_k`);

--
-- Indexes for table `admin_post`
--
ALTER TABLE `admin_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `f_k` (`f_k`);

--
-- Indexes for table `admin_profile_photo`
--
ALTER TABLE `admin_profile_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_k` (`f_k`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_k` (`f_k`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `featured_img`
--
ALTER TABLE `featured_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `img_fk` (`img_fk`);

--
-- Indexes for table `image_upload`
--
ALTER TABLE `image_upload`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `img_fk` (`img_fk`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`reaction_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `msg_sender` (`msg_sender`);

--
-- Indexes for table `tmp_data`
--
ALTER TABLE `tmp_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_photo`
--
ALTER TABLE `user_user_photo`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `video_upload`
--
ALTER TABLE `video_upload`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `video_fk` (`video_fk`);

--
-- Indexes for table `wall_img`
--
ALTER TABLE `wall_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_emp`
--
ALTER TABLE `add_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_post`
--
ALTER TABLE `admin_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_profile_photo`
--
ALTER TABLE `admin_profile_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_img`
--
ALTER TABLE `featured_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_upload`
--
ALTER TABLE `image_upload`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `reaction_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_data`
--
ALTER TABLE `tmp_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_user_photo`
--
ALTER TABLE `user_user_photo`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_upload`
--
ALTER TABLE `video_upload`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wall_img`
--
ALTER TABLE `wall_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`f_k`) REFERENCES `users` (`id`);

--
-- Constraints for table `add_emp`
--
ALTER TABLE `add_emp`
  ADD CONSTRAINT `add_emp_ibfk_1` FOREIGN KEY (`f_k`) REFERENCES `users` (`id`);

--
-- Constraints for table `admin_email`
--
ALTER TABLE `admin_email`
  ADD CONSTRAINT `admin_email_ibfk_1` FOREIGN KEY (`f_k`) REFERENCES `admin_user` (`id`);

--
-- Constraints for table `admin_post`
--
ALTER TABLE `admin_post`
  ADD CONSTRAINT `admin_post_ibfk_1` FOREIGN KEY (`f_k`) REFERENCES `admin_user` (`id`);

--
-- Constraints for table `admin_profile_photo`
--
ALTER TABLE `admin_profile_photo`
  ADD CONSTRAINT `admin_profile_photo_ibfk_1` FOREIGN KEY (`f_k`) REFERENCES `admin_user` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `admin_post` (`post_id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`f_k`) REFERENCES `users` (`id`);

--
-- Constraints for table `featured_img`
--
ALTER TABLE `featured_img`
  ADD CONSTRAINT `featured_img_ibfk_1` FOREIGN KEY (`img_fk`) REFERENCES `users` (`id`);

--
-- Constraints for table `image_upload`
--
ALTER TABLE `image_upload`
  ADD CONSTRAINT `image_upload_ibfk_1` FOREIGN KEY (`img_fk`) REFERENCES `admin_post` (`post_id`);

--
-- Constraints for table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `admin_post` (`post_id`),
  ADD CONSTRAINT `reactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  ADD CONSTRAINT `tbl_msg_ibfk_1` FOREIGN KEY (`msg_sender`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_user_photo`
--
ALTER TABLE `user_user_photo`
  ADD CONSTRAINT `user_user_photo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `video_upload`
--
ALTER TABLE `video_upload`
  ADD CONSTRAINT `video_upload_ibfk_1` FOREIGN KEY (`video_fk`) REFERENCES `admin_post` (`post_id`);

--
-- Constraints for table `wall_img`
--
ALTER TABLE `wall_img`
  ADD CONSTRAINT `wall_img_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
