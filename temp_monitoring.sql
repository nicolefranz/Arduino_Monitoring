-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 02:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temp_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `temps`
--

CREATE TABLE `temps` (
  `id` int(11) NOT NULL,
  `temp` varchar(100) NOT NULL,
  `humidity` varchar(100) NOT NULL,
  `water` varchar(50) NOT NULL,
  `fire` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temps`
--

INSERT INTO `temps` (`id`, `temp`, `humidity`, `water`, `fire`) VALUES
(358, '34.3', '65', '', ''),
(359, '34.9', '64', '', ''),
(360, '36.3', '60', '', ''),
(361, '37.4', '56', '', ''),
(362, '38.4', '51', '', ''),
(363, '39.4', '48', '', ''),
(364, '40.3', '46', '', ''),
(365, '40.9', '44', '', ''),
(366, '41.4', '43', '', ''),
(367, '41.8', '42', '', ''),
(368, '41.9', '41', '', ''),
(369, '41.6', '41', '', ''),
(370, '41.3', '41', '', ''),
(371, '40.8', '42', '', ''),
(372, '40.5', '43', '', ''),
(373, '40', '44', '', ''),
(374, '39.4', '45', '', ''),
(375, '38.9', '46', '', ''),
(376, '38.5', '47', '', ''),
(377, '38.2', '48', '', ''),
(378, '37.9', '50', '', ''),
(379, '37.6', '51', '', ''),
(380, '37.3', '52', '', ''),
(381, '37.1', '53', '', ''),
(382, '36.8', '54', '', ''),
(383, '36.6', '54', '', ''),
(384, '36.4', '55', '', ''),
(385, '36.3', '56', '', ''),
(386, '36.1', '56', '', ''),
(387, '36', '56', '', ''),
(388, '35.9', '57', '', ''),
(389, '35.6', '57', '', ''),
(390, '35.5', '58', '', ''),
(391, '35.4', '59', '', ''),
(392, '35.3', '59', '', ''),
(393, '35.2', '59', '', ''),
(394, '35.1', '60', '', ''),
(395, '35', '60', '', ''),
(396, '34.9', '60', '', ''),
(397, '34.9', '60', '', ''),
(398, '34.9', '60', '', ''),
(399, '34.9', '60', '', ''),
(400, '34.8', '61', '', ''),
(401, '34.8', '61', '', ''),
(402, '34.8', '61', '', ''),
(403, '34.7', '61', '', ''),
(404, '34.7', '61', '', ''),
(405, '34.7', '61', '', ''),
(406, '34.6', '61', '', ''),
(407, '34.6', '61', '', ''),
(408, '34.6', '61', '', ''),
(409, '34.5', '61', '', ''),
(410, '34.5', '61', '', ''),
(411, '34.5', '62', '', ''),
(412, '34.5', '62', '', ''),
(413, '34.4', '62', '', ''),
(414, '34.4', '62', '', ''),
(415, '34.4', '62', '', ''),
(416, '34.3', '62', '', ''),
(417, '34.3', '63', '', ''),
(418, '34.3', '63', '', ''),
(419, '34.4', '63', '', ''),
(420, '34.4', '63', '', ''),
(421, '34.4', '63', '', ''),
(422, '34.4', '63', '', ''),
(423, '34.4', '63', '', ''),
(424, '34.3', '63', '', ''),
(425, '34.3', '63', '', ''),
(426, '34.3', '63', '', ''),
(427, '34.2', '63', '', ''),
(428, '34.1', '63', '', ''),
(429, '34.1', '63', '', ''),
(430, '34.1', '63', '', ''),
(431, '34.1', '63', '', ''),
(432, '34.1', '64', '', ''),
(433, '34', '64', '', ''),
(434, '34', '64', '', ''),
(435, '34', '64', '', ''),
(436, '33.9', '64', '', ''),
(437, '33.8', '64', '', ''),
(438, '33.8', '65', '', ''),
(439, '33.7', '65', '', ''),
(440, '33.6', '65', '', ''),
(441, '33.6', '65', '', ''),
(442, '33.5', '65', '', ''),
(443, '33.5', '66', '', ''),
(444, '33.5', '66', '', ''),
(445, '33.5', '66', '', ''),
(446, '33.5', '66', '', ''),
(447, '33.5', '66', '', ''),
(448, '33.5', '66', '', ''),
(449, '33.5', '66', '', ''),
(450, '33.5', '66', '', ''),
(451, '33.4', '66', '', ''),
(452, '33.4', '66', '', ''),
(453, '33.4', '66', '', ''),
(454, '33.4', '66', '', ''),
(455, '33.4', '66', '', ''),
(456, '33.4', '66', '', ''),
(457, '33.4', '66', '', ''),
(458, '33.4', '66', '', ''),
(459, '33.4', '66', '', ''),
(460, '33.4', '66', '', ''),
(461, '33.4', '66', '', ''),
(462, '33.5', '66', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temps`
--
ALTER TABLE `temps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temps`
--
ALTER TABLE `temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
