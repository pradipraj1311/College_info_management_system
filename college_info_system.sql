-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 10:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_info_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `branch_code` varchar(10) NOT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `intake` int(11) DEFAULT NULL,
  `sq` int(11) DEFAULT NULL COMMENT 'Seats to be filled by ACPC',
  `aiqg` int(11) DEFAULT NULL COMMENT 'All India Quota based on GUJCET',
  `aiqj` int(11) DEFAULT NULL COMMENT 'All India Quota based on JEE (Main) Paper-1',
  `filled` int(11) DEFAULT NULL,
  `vacant` int(11) DEFAULT NULL,
  `academic_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `university_id`, `branch_code`, `branch_name`, `intake`, `sq`, `aiqg`, `aiqj`, `filled`, `vacant`, `academic_year`) VALUES
(1, 1, 'CHEM', 'Chemical Engineering', 68, 68, 0, 0, 68, 0, '2024'),
(2, 1, 'CIVIL', 'Civil Engineering', 75, 75, 0, 0, 75, 0, '2024'),
(3, 1, 'CE', 'Computer Engineering', 56, 56, 0, 0, 56, 0, '2024'),
(4, 1, 'EC', 'Electronics & Communication', 56, 56, 0, 0, 56, 0, '2024'),
(5, 1, 'IC', 'Instrumentation & Control', 56, 56, 0, 0, 56, 0, '2024'),
(6, 2, 'CHEM', 'Chemical Engineering', 65, 25, 0, 31, 25, 0, '2024'),
(7, 2, 'CIVIL', 'Civil Engineering', 130, 50, 0, 62, 50, 0, '2024'),
(8, 2, 'CE', 'Computer Engineering', 325, 124, 0, 156, 124, 0, '2024'),
(9, 2, 'EC', 'Electronics & Communication', 195, 75, 0, 93, 75, 0, '2024'),
(10, 3, 'CHEM', 'Chemical Engineering', 75, 75, 0, 0, 74, 0, '2024'),
(11, 3, 'CIVIL', 'Civil Engineering', 150, 150, 0, 0, 150, 0, '2024'),
(12, 3, 'CE', 'Computer Engineering', 150, 150, 0, 0, 150, 0, '2024'),
(13, 3, 'EC', 'Electronics & Communication', 150, 150, 0, 0, 150, 0, '2024'),
(14, 3, 'IC', 'Instrumentation & Control', 113, 113, 0, 0, 113, 0, '2024'),
(17, 3, 'ME', 'MECH', 150, 150, 0, 0, 150, 0, '2024'),
(18, 3, 'IT', 'IT', 150, 150, 0, 0, 150, 0, '2024');

-- --------------------------------------------------------

--
-- Table structure for table `cutoff_data`
--

CREATE TABLE `cutoff_data` (
  `id` int(11) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `tfws` int(11) DEFAULT NULL,
  `open` int(11) DEFAULT NULL,
  `ews` int(11) DEFAULT NULL,
  `sebc` int(11) DEFAULT NULL,
  `sc` int(11) DEFAULT NULL,
  `st` int(11) DEFAULT NULL,
  `academic_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cutoff_data`
--

INSERT INTO `cutoff_data` (`id`, `university_id`, `branch_code`, `tfws`, `open`, `ews`, `sebc`, `sc`, `st`, `academic_year`) VALUES
(1, 1, 'CE', 119, 289, 400, 551, 2340, 24410, '2024'),
(2, 1, 'EC', 914, 1924, 2103, 4831, 21513, 35897, '2024'),
(3, 1, 'CHEM', 1637, 5502, 6095, 9794, 15274, 34490, '2024'),
(4, 1, 'IC', 6538, 12200, 15540, 21980, 32257, NULL, '2024'),
(5, 1, 'CIVIL', 8788, 18668, 28023, 27190, 37074, 32293, '2024'),
(6, 2, 'CE', 102, 302, 391, 839, 4021, 23814, '2024'),
(7, 2, 'EC', 388, 1127, 1545, 4538, 5107, 34216, '2024'),
(8, 2, 'CHEM', 825, 3824, 5827, 13593, 28142, 50354, '2024'),
(9, 2, 'CIVIL', 1310, 10642, 20153, 23928, 27585, 39787, '2024'),
(10, 3, 'CE', 313, 586, 775, 1050, 4165, 17142, '2024'),
(11, 3, 'IT', 731, 1073, 1404, 1708, 5922, 17249, '2024'),
(12, 3, 'EC', 1581, 2705, 3536, 5585, 12321, 34018, '2024'),
(13, 3, 'ME', 2525, 4933, 6142, 8879, 21903, 29369, '2024'),
(14, 3, 'CHEM', 2585, 4782, 5278, 7384, 14947, 19532, '2024'),
(15, 3, 'CIVIL', 3509, 7254, 9185, 13266, 16873, 19286, '2024'),
(16, 3, 'IC', 5389, 10377, 11988, 18916, 29231, 39432, '2024');

-- --------------------------------------------------------

--
-- Table structure for table `intake_metadata`
--

CREATE TABLE `intake_metadata` (
  `id` int(11) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `academic_year` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intake_metadata`
--

INSERT INTO `intake_metadata` (`id`, `university_id`, `academic_year`, `description`) VALUES
(1, 1, '2024', 'Intake = Total Seats in 2024 (provisional)\nSQ = Seats to be filled by ACPC\nAIQG = All India Quota based on GUJCET\nAIQJ = All India Quota based on JEE (Main) Paper-1\nFilled & Vacant as per Round 2 - 2024');

-- --------------------------------------------------------

--
-- Table structure for table `jee_cutoff`
--

CREATE TABLE `jee_cutoff` (
  `id` int(11) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `tfws` varchar(20) DEFAULT NULL,
  `open` varchar(20) DEFAULT NULL,
  `ews` varchar(20) DEFAULT NULL,
  `sebc` varchar(20) DEFAULT NULL,
  `sc` varchar(20) DEFAULT NULL,
  `st` varchar(20) DEFAULT NULL,
  `academic_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jee_cutoff`
--

INSERT INTO `jee_cutoff` (`id`, `university_id`, `branch_code`, `tfws`, `open`, `ews`, `sebc`, `sc`, `st`, `academic_year`) VALUES
(1, 1, 'CE', NULL, '900138', NULL, '900598', '902914', NULL, '2024'),
(2, 1, 'EC', NULL, '900811', NULL, '901691', NULL, NULL, '2024'),
(3, 1, 'CHEM', NULL, '901468', NULL, NULL, NULL, NULL, '2024'),
(4, 1, 'IC', NULL, '902238', '903514', '905888', NULL, NULL, '2024'),
(5, 1, 'CIVIL', '902695', '902909', '911723', '908558', NULL, NULL, '2024'),
(13, 3, 'IT', '900154', '900307', '900949', '901143', '902429', '912047', '2024'),
(14, 3, 'CE', '900125', '900646', '900714', '900747', '902967', '913142', '2024'),
(15, 3, 'EC', '900961', '901228', '901606', '901480', '908830', '910902', '2024'),
(16, 3, 'ME', '901774', '901754', '903153', '902653', '903534', '913901', '2024'),
(17, 3, 'IC', '902764', '901826', '901924', '903718', '916485', '917328', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `placement_data`
--

CREATE TABLE `placement_data` (
  `id` int(11) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `placement_percentage` decimal(5,2) DEFAULT NULL,
  `avg_package` decimal(10,2) DEFAULT NULL,
  `highest_package` decimal(10,2) DEFAULT NULL,
  `placement_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placement_data`
--

INSERT INTO `placement_data` (`id`, `university_id`, `branch_code`, `placement_percentage`, `avg_package`, `highest_package`, `placement_year`) VALUES
(1, 1, 'CSE', 90.01, 8.22, 21.00, '2024'),
(2, 1, 'IT', 87.34, 6.00, 13.40, '2024'),
(3, 1, 'EC', 82.23, 5.26, 14.50, '2024'),
(4, 1, 'IC', 80.36, 5.55, 7.80, '2024'),
(5, 1, 'ME', 73.34, 5.04, 7.80, '2024'),
(6, 2, 'CE', 96.00, 9.95, 52.25, '2024'),
(7, 2, 'CHEM', 83.00, 6.13, 13.00, '2024'),
(8, 2, 'EC', 85.00, 8.80, 35.56, '2024'),
(9, 2, 'ME', 95.00, 13.60, 14.92, '2024'),
(18, 3, 'CE', 82.00, 6.00, 19.00, '2024'),
(19, 3, 'IT', 71.00, 5.00, 14.00, '2024'),
(20, 3, 'CIVIL', 74.00, 5.00, 8.00, '2024'),
(21, 3, 'CHEM', 60.00, 5.37, 7.45, '2024'),
(22, 3, 'EC', 75.00, 4.56, 8.24, '2024'),
(23, 3, 'ME', 87.56, 7.34, 11.22, '2024'),
(24, 3, 'IC', 50.45, 3.78, 5.23, '2024');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `fees_per_year` decimal(10,2) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `established_year` int(11) DEFAULT NULL,
  `location_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `short_name`, `full_name`, `type`, `fees_per_year`, `address`, `phone`, `website`, `email`, `established_year`, `location_url`) VALUES
(1, 'Dharmsinh Desai University', 'DDU (GIA)', 'Dharmsinh Desai University, Faculty Of Technology (GIA) Nadiad', 'Gov.', 1500.00, 'Dharmsinh Desai University, College Road, Nadiad 387001', '0268-2520502', 'www.ddu.ac.in', 'examcontroller@ddu.ac.in, registrar@ddu.ac.in', 1968, 'https://maps.google.com/?q=Dharmsinh+Desai+University+Nadiad'),
(2, 'Nirma University', 'Nirma', 'Nirma University', 'Priv.', 255000.00, 'Sarkhej-Gandhinagar Highway, Chandlodia, Gota, Ahmedabad, Gujarat 382481', '079-71652000', 'www.nirmauni.ac.in', 'info@nirmauni.ac.in', 1995, 'https://maps.google.com/?q=Nirma+University+Ahmedabad'),
(3, 'LD College of Engineering', 'LDCE', 'LD College of Engineering', 'Gov.', 1500.00, 'Opp Gujarat University, Navrangpura, Ahmedabad - 380015', '\'079-26302887', 'www.ldce.ac.in', 'ldce-abad-dte@gujarat.gov.in', 1948, 'https://maps.google.com/?q=LD+College+of+Engineering+Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'user1', 'rathva2006@gmail.com', '1234'),
(2, 'admin', 'rathva2005@gmail.com', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `cutoff_data`
--
ALTER TABLE `cutoff_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `intake_metadata`
--
ALTER TABLE `intake_metadata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `jee_cutoff`
--
ALTER TABLE `jee_cutoff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `placement_data`
--
ALTER TABLE `placement_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cutoff_data`
--
ALTER TABLE `cutoff_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `intake_metadata`
--
ALTER TABLE `intake_metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jee_cutoff`
--
ALTER TABLE `jee_cutoff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `placement_data`
--
ALTER TABLE `placement_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `cutoff_data`
--
ALTER TABLE `cutoff_data`
  ADD CONSTRAINT `cutoff_data_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `intake_metadata`
--
ALTER TABLE `intake_metadata`
  ADD CONSTRAINT `intake_metadata_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `jee_cutoff`
--
ALTER TABLE `jee_cutoff`
  ADD CONSTRAINT `jee_cutoff_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `placement_data`
--
ALTER TABLE `placement_data`
  ADD CONSTRAINT `placement_data_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
