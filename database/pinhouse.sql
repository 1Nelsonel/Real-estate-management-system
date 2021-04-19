-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 09:52 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `names`, `email`, `phone`, `password`) VALUES
(2, 'admin', 'admin@gmail.com', '+254 724 599 343', '$2y$10$bTQNTiK3FKvTaHd/qJUW..s4k7vCxwTT4kO5L4gXVCb9GOoPf4Nt6'),
(3, 'Nelsonel Admin', 'admin@gmail.com', '+254 798 616 085', '$2y$10$PvaqItccRiNAcfYNunn4de9KsAk4yQH2GE1MD0cQy5CQxZvIxo.zW');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `house_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `names`, `house_id`, `location`, `user_id`, `status`) VALUES
(9, 'mary cheru', 4, 'Nairobi', 9, 'Approved'),
(10, 'sally kwamboka', 7, 'Kiambu', 10, 'booked'),
(11, 'leshanta cheptoo', 3, 'Kisumu', 11, 'Approved'),
(13, 'Esther Solin', 10, 'Dolor possimus sint', 13, 'booked'),
(14, 'brenda moraa', 12, 'Sit est nobis temp', 14, 'Approved'),
(16, 'Jonna Kiptoo', 3, 'Kisumu', 15, 'Approved'),
(17, 'testing', 11, 'Dolorem eu tempore ', 7, 'booked'),
(18, 'bob', 23, 'Amet delectus even', 8, 'Approved'),
(19, 'Bella Mwakazi', 12, 'Sit est nobis temp', 12, 'booked'),
(20, 'Albert Ltupukwa', 20, 'Consequuntur rerum q', 20, 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `names`, `email`, `phone`, `password`) VALUES
(2, 'Emerson Eaton', 'firinove@mailinator.com', '+1 (371) 738-2918', ''),
(3, 'Brenden Dickerson', 'polev@mailinator.com', '+1 (572) 295-6237', ''),
(4, 'Audra Pacheco', 'hiny@gmail.com', '+1 (346) 505-9453', ''),
(5, 'Cameron Sullivan', 'xyz@mail.com', '+1 (483) 349-1192', '$2y$10$Hn2gOIWDO4V46HOelMGH4.sQnITbJEfwfvXVC8XlGI3SWgU3ZJ0we'),
(6, 'buyer buy', 'buy@gmail.com', '075895226', '$2y$10$LyE5D0cKcy./.Kc4G7YbceYdHmNmhBdEaCPmxtq0CWmRlKSUxI5oy'),
(7, 'testing', 'testing@gmail.com', '0798616085', '$2y$10$uUz4mZJnjWdVBUYr.DzyHOxuHelbbRpviSMRX/Ek/ypyCKtmbFKMe'),
(8, 'bob', 'bob@gmail.com', '0703849583', '$2y$10$UscGhzdQSFHQzgwr/HuJbuh0Q1qiICPHszsiA/U3TDGF5TT66OERe'),
(9, 'mary cheru', 'cheru@gmail.com', '0725689541', '$2y$10$T1i1Eld3KUpGjqStrpFSOui34b3vWMsBI60Ps8hBgy11C/u5hZ44m'),
(10, 'sally kwamboka', 'sally@gmail.com', '0724509368', '$2y$10$ZRp5GHMGxJ9DdW3wT2Omd.eLRlaCcrsLCfdoQ13mqUhTgJMeActnS'),
(11, 'leshanta cheptoo', 'lesh@gmail.com', '0724599343', '$2y$10$8wa73sSsZRmEvzDqzFnU1OW3ut3mR1uGQVcNP7Pv0gVoaKSAu6zqW'),
(12, 'Bella Mwakazi', 'bella@gmail.com', '0715685932', '$2y$10$pnYzWO6xMZ7Zpiye/4yHOuwnouZqBMm6.QWHGHn44E8uFzScWleE6'),
(13, 'Esther Solin', 'solin@gmail.com', '0724429839', '$2y$10$l4kW6TSaOI2mEe4YY0bEWed3wn5uR2IpqQJoushX/M1SpRe0dVxCS'),
(14, 'brenda moraa', 'brenda@gmail.com', '0706143330', '$2y$10$QCn4KFhdBQ9BQhaanG6LbeYmBRqxmtj5eFgm.FLAiZDK0zJVpyvyK'),
(15, 'Jonna Kiptoo', 'jonaa@gmail.com', '0724356895', '$2y$10$rkZrJsXqBCALCZIuPYr6yu53UNHlBDnJfF587oImXKH88q6/C7EWq'),
(16, 'Ruth sister', 'ruth@gmail.com', '07986532', '$2y$10$Bn9.6QJLRnl5OPgUnXC19OMp3dNYZSG6PeN9eHCGfGqX5c.3SWiF2'),
(17, 'Audra Washington', 'duqo@gmail.com', '+1 (808) 837-3424', '$2y$10$yj4nYx059CGSxiPkBDZczOa6ZXdsYRM2hn22FMhC76k0SMBTo1NJG'),
(18, 'Wing Montoya', 'fylikis@gmail.com', '+1 (137) 748-9327', '$2y$10$zjHMlqtZDSUvdNO8zYb0jeXyjSqVRAvh18IKvi/aKH2QkUns/xyoy'),
(19, 'Naomi Conrad', 'pupe@mailinator.com', '+1 (262) 945-6022', '$2y$10$cGwevIMgMAD2cfGM/taF7el9gLp3QOwbuSagzxMqL/XMdb1W22sGu'),
(20, 'Albert Ltupukwa', 'albert@gmail.com', '0769857412', '$2y$10$yWSXn.fuLb9Oz6fzPatWcunIWbp32vajHiu5GObBi6x7O6PoNr9Im');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `title`, `location`, `description`, `picture`, `price`, `status`) VALUES
(1, 'Daima holdings', 'Eldoret', '5 bedroom 2 living room own compound', 'uploads/1997267property-1.jpg', 50000, 'approved'),
(2, 'Minus veniam', 'Nakuru', '4 Bedrooms, 1 livingroom down stair and swimming pool', 'uploads/4092384property-2.jpg', 120000, 'booked'),
(3, 'Officia mollitia ', 'Kisumu', '6 Bedroom shared compuond and playground', 'uploads/6519940property-3.jpg', 90000, 'Approved'),
(4, 'Veniam Elparazio ', 'Nairobi', '6 Bedroom 2 living room and swimmung pool', 'uploads/5229235property-4.jpg', 56000, 'Approved'),
(5, 'Reprehenderit lorem ', 'Mombasa', '4 Bedroom off-the show  with compoundand a large playground', 'uploads/3841979property-5.jpg', 50000, 'booked'),
(8, 'Quam omnis id itaque', 'Sunt perspiciatis e', 'Eos elit consequat', 'uploads/56886463-br-1-bath-House-17-Temple-Ave-House-for-Rent-in-Stratford-2XUQS_Rax5L79M.jpg', 400000, 'available'),
(9, 'Ut eu enim perferend', 'Voluptatum obcaecati', 'Vitae non quis dolor', 'uploads/98589346-Bedroom-house-for-sale-in-Karen-f_Bkdv0ZG7n8JM.jpg', 90000, 'sold'),
(10, 'Quibusdam iste culpa', 'Dolor possimus sint', 'Culpa exercitatione', 'uploads/468576613-Signs-Your-Home-Has-Good-Resale-Value-Bob-Vila-dgxVi85uy_UnHM.jpg', 640, 'booked'),
(11, 'Voluptas numquam rec', 'Dolorem eu tempore ', 'Expedita quas rerum ', 'uploads/789850213-Signs-Your-Home-Has-Good-Resale-Value-Bob-Vila-dgxVi85uy_UnHM.jpg', 609000, 'booked'),
(12, 'Dolores modi non nis', 'Sit est nobis temp', 'Pariatur swimming pool and a play field', 'uploads/6960810Arbor-Woods-North-Collection-Archives-Stonegate-Builders--NhSE1anonpfFM.jpg', 53000, 'booked'),
(13, 'Aliquam ad laboris e', 'Corrupti facere com', 'Sit illo laudantium', 'uploads/9680003Austrian-Houses-A-collection-curated-by-Divisare-vNnjTn0aoG2D4M.jpg', 521, 'available'),
(14, 'Reprehenderit adipi', 'Inventore autem enim', 'Voluptatem Qui esse', 'uploads/8937042Bronte-House-2018-—-To-the-Mil-RNUD8RgRRg4YOM.jpg', 539000, 'available'),
(15, 'Ut sapiente omnis er', 'Deserunt non quae au', 'Illo magna est moles', 'uploads/4003085Corner-House-DSDHA-Arch2Ocom-Nsoar_Bo92oqZM.jpg', 872000, 'booked'),
(16, 'Nobis tempor in inci', 'Nisi quis exercitati', 'Optio quos hic dolo', 'uploads/3465124Custom-Home-Builders-Westfield-NJ-Michael-Robert-Construction-8RfQJLOKcEfj_M.jpg', 974000, 'booked'),
(17, 'Maiores elit quibus', 'Sit magna labore pro', 'Deserunt qui est au', 'uploads/1099628Pin-di-Annalisa-Basto-su-house-Architettura-moderna-Casa-di-A5K32_BwAddE7M.jpg', 58400, 'booked'),
(18, 'Quo non pariatur Om', 'Maiores quis officia', 'Tempor aut voluptas ', 'uploads/4601224Wallpaper-Street-Mansion-Houses-Cities-600x800-E5hHoq_yxgM8yM.jpg', 97000, 'available'),
(19, 'Incidunt debitis no', 'Quia ea qui natus in', 'Culpa dicta suscipi', 'uploads/7116106Modern-House-Design-Ideas-House-front-design-Modern-house-KKR0z0UuJA08SM.jpg', 90000, 'available'),
(20, 'Nisi labore adipisic', 'Consequuntur rerum q', 'A ut dolores incidun', 'uploads/6203754𝙿𝙸𝙽𝚃𝙴𝚁𝙴𝚂𝚃-𝚊𝚛𝚒𝚎𝚕𝚒𝚣𝚊𝚋𝚎𝚝𝚑𝚑𝚑𝚑-Dream-beach-ZwbZK5sVuACcOM.jpg', 96000, 'booked'),
(21, 'Qui exercitationem o', 'Incidunt aliquid ve', 'Rem unde nihil labor', 'uploads/1351279THIS-is-a-Gorgeous-House-A-Fresh-Take-on-Traditional-Design-5jhI5YEqMLUeQM.jpg', 72000, 'sold'),
(22, 'Corrupti et iure te', 'Doloribus sint delen', 'Possimus numquam al', 'uploads/4994436Summertime-in-Connecticut-Em-for-Marvelous-JOEzIwQDJFU2lM.jpg', 100000, 'available'),
(23, 'Veritatis voluptatem', 'Amet delectus even', 'Sed aut ad ipsam ad ', 'uploads/2846571Arbor-Woods-North-Collection-Archives-Stonegate-Builders--NhSE1anonpfFM.jpg', 93500, 'Approved'),
(24, 'Est fugiat Nam nobi', 'Ea tenetur sit dolor', 'Quisquam tempore ex', 'uploads/3012577Pin-on-tiny-homes-gkoeTvZaKOlDtM.jpg', 54500, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `names`, `message`, `phone`, `email`) VALUES
(2, 'Nelson Mokoro', 'Hello engineer good job', '0798616085', 'nelsonmokoro37@gmail.com'),
(4, 'Albert Ltupukwa', 'Hallo PinHouse i am asking if you cam allow payments in instalment Thank You.', '0769857412', 'albert@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `sale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `house_id`, `buyer_id`, `sale_date`) VALUES
(1, 5, 3, '2021-04-15'),
(3, 4, 2, '2021-04-15'),
(4, 7, 4, '2021-04-15'),
(5, 13, 2, '2021-04-17'),
(8, 13, 2, '2021-04-18'),
(46, 9, 10, '2021-04-19'),
(47, 21, 20, '2021-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `names`, `email`, `phone`, `password`) VALUES
(1, 'Nelsonel Admin', 'nelsonel@gmail.com', '1', '$2y$10$gCN1RwrdqX.FEVFjjf89XeHZDxg6O3brLifkFsxx.dH9Ppg.74dY.'),
(2, 'Brenda Kerubo', 'bkerubo@gmail.com', '0', '$2y$10$mMyphOTWNL0pGVJp6Gg4a.uPpaPiF64xmfoupO/UaAyxG/LjNW39q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `buyers` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`),
  ADD CONSTRAINT `sales_ibfk_5` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
