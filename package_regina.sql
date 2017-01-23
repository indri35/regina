-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2017 at 06:53 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `package_regina`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_product`
--

CREATE TABLE IF NOT EXISTS `t_detail_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SKU` varchar(512) NOT NULL,
  `isi` varchar(512) NOT NULL,
  `id_package` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `t_detail_product`
--

INSERT INTO `t_detail_product` (`id`, `SKU`, `isi`, `id_package`) VALUES
(1, 'BEAR BRAND RTD Milk Tin 30x189ml ID', '30', 2),
(2, 'BEAR BRAND RTD Milk Tin 30x189ml ID', '30', 3),
(3, 'BEAR BRAND RTD Milk Tin 30x189ml ID', '30', 4),
(4, 'CARNATION SCC 10x375g ID', '10', 2),
(5, 'CARNATION SCC 10x375g ID', '10', 3),
(6, 'CARNATION SCC 10x375g ID', '10', 4),
(7, 'COFFEE-MATE NDC Bag in Box 24x450g ID', '24', 3),
(8, 'COFFEE-MATE NDC Bag in Box 24x450g ID', '24', 4),
(9, 'FOXS Spring Tea Tin 12x180g ID', '12', 1),
(10, 'FOXS Spring Tea Tin 12x180g ID', '12', 2),
(11, 'FOXS Spring Tea Tin 12x180g ID', '12', 3),
(12, 'FOXS Spring Tea Tin 12x180g ID', '12', 4),
(13, 'HONEY GOLD Cereal 18x220g N1 ID', '18', 3),
(14, 'HONEY GOLD Cereal 18x220g N1 ID', '18', 4),
(15, 'NESTLE KOKO KRUNCH Cereal 18x170g ID', '18', 1),
(16, 'NESTLE KOKO KRUNCH Cereal 18x170g ID', '18', 2),
(17, 'NESTLE KOKO KRUNCH Cereal 18x170g ID', '18', 3),
(18, 'NESTLE KOKO KRUNCH Cereal 18x170g ID', '18', 4),
(19, 'KOKO KRUNCH Combo Pack 48(20+12)g ID', '48', 3),
(20, 'KOKO KRUNCH Combo Pack 48(20+12)g ID', '48', 4),
(21, 'MILO 3in1 ACTIV-GO24(300+50g)PRFree50gID', '24', 3),
(22, 'MILO 3in1 ACTIV-GO24(300+50g)PRFree50gID', '24', 4),
(23, 'MILO ACTIV-GO 24(300+50g) PRFree50g ID', '24', 1),
(24, 'MILO ACTIV-GO 24(300+50g) PRFree50g ID', '24', 2),
(25, 'MILO ACTIV-GO 24(300+50g) PRFree50g ID', '24', 3),
(26, 'MILO ACTIV-GO 24(300+50g) PRFree50g ID', '24', 4),
(27, 'MILO3in1ACTIV-GO12(1000+100g)PRBPck10%ID', '12', 4),
(28, 'MILO Cereal Combo Pack 48(20+12)g ID', '48', 4),
(29, 'NESC 3/1 White&Creamy Pbg 12(30x18g) ID', '12', 1),
(30, 'NESC 3/1 White&Creamy Pbg 12(30x18g) ID', '12', 2),
(31, 'NESC 3/1 White&Creamy Pbg 12(30x18g) ID', '12', 3),
(32, 'NESC 3/1 White&Creamy Pbg 12(30x18g) ID', '12', 4),
(33, 'NESCAFE CLASSIC Asean Jar Era 24x100g ID', '24', 3),
(34, 'NESCAFE CLASSIC Asean Jar Era 24x100g ID', '24', 4),
(35, 'NESCAFE CLASSIC Asean Jar Era 12x200g ID', '12', 4),
(36, 'NESCAFE CLASSIC Bag Era 24x50g ID', '24', 1),
(37, 'NESCAFE CLASSIC Bag Era 24x50g ID', '24', 2),
(38, 'NESCAFE GOLD Eden Jar 12x100g ID', '12', 4),
(39, 'NESCAFE GOLD Eden Jar 12x50g ID', '12', 3),
(40, 'NESCAFE GOLD Eden Jar 12x50g ID', '12', 4),
(41, 'NESC 3/1 KopiSusu SICh Era10(10x23.5g)ID', '10', 2),
(42, 'NESC 3/1 KopiSusu SICh Era10(10x23.5g)ID', '10', 3),
(43, 'NESC 3/1 KopiSusu SICh Era10(10x23.5g)ID', '10', 4),
(44, 'NESCAFE Original Can 24x240ml XI', '24', 2),
(45, 'NESCAFE Original Can 24x240ml XI', '24', 3),
(46, 'NESCAFE Original Can 24x240ml XI', '24', 4),
(47, 'NESTLE CRUNCH Chips Strw 48x30g ID', '48', 1),
(48, 'NESTLE CRUNCH Chips Strw 48x30g ID', '48', 2),
(49, 'NESTLE CRUNCH Chips Strw 48x30g ID', '48', 3),
(50, 'NESTLE CRUNCH Chips Strw 48x30g ID', '48', 4),
(51, 'POLO Peppermint Rolls 24(12x24g) ID', '24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_order`
--

CREATE TABLE IF NOT EXISTS `t_order` (
  `user_code` varchar(225) NOT NULL,
  `package_code` varchar(225) NOT NULL,
  `order_code` int(128) NOT NULL AUTO_INCREMENT,
  `status` varchar(225) NOT NULL,
  `qty` int(128) NOT NULL,
  `price` int(128) NOT NULL,
  PRIMARY KEY (`order_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `t_order`
--

INSERT INTO `t_order` (`user_code`, `package_code`, `order_code`, `status`, `qty`, `price`) VALUES
('US7817', 'PACK001', 1, 'Cart', 1, 2500000),
('', 'PACK003', 4, 'Order', 10, 3500000),
('0909', 'PACK001', 14, 'Order', 9, 36000000),
('0909', 'PACK002', 15, 'Order', 10, 40000000),
('0909', 'PACK003', 16, 'Order', 15, 60000000),
('0909', 'PACK004', 17, 'Order', 11, 44000000),
('0909', 'PACK001', 18, 'Order', 1, 2500000),
('0909', 'PACK001', 20, 'Order', 1, 2500000),
('0909', 'PACK001', 21, 'Cart', 1, 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `t_package`
--

CREATE TABLE IF NOT EXISTS `t_package` (
  `id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `name` varchar(225) NOT NULL,
  `product` text NOT NULL,
  `price` int(128) NOT NULL,
  `stock` int(128) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_package`
--

INSERT INTO `t_package` (`id`, `code`, `name`, `product`, `price`, `stock`) VALUES
(1, 'PACK001', 'Silver Pack', 'NESCAFE CLASSIC 50g, NESCAFE 3in1 Creamy 18gr, FOX''S Spring Tea 180g, NESTLE CRUNCH 30g, KOKO KRUNCH 170g, MILO 300g', 2500000, 499),
(2, 'PACK002', 'Bronze Pack', 'NESCAFE CLASSIC 50g, NESCAFE 3in1 Creamy 18gr, FOX''S Spring Tea 180g, NESTLE CRUNCH 30g, NESCAFE RTD 240ml BPW, BEAR BRAND STM 195g, KOKO KRUNCH 170g, MILO 300g, CARNATION SCC 380g FSC, NESCAFE KOPI SUSU PPP 23.5gr', 3000000, 299),
(3, 'PACK003', 'Platinum Pack', 'NESCAFE CLASSIC 100g, NESCAFE 3in1 Creamy 18gr, NESCAFE GOLD BLEND 50g A+, COFFEMATE 450g, FOX''S Spring Tea 180g, NESTLE CRUNCH 30g, NESCAFE RTD 240ml BPW, BEAR BRAND STM 195g, GOLD 220g, KOKO KRUNCH COMBO PACK 32g, KOKO KRUNCH 170g, MILO 3/1  300g, MILO 300g, CARNATION SCC 380g FSC, NESCAFE KOPI SUSU PPP 23.5gr', 3500000, 439),
(4, 'PACK004', 'Gold Pack', 'NESCAFE CLASSIC 200g, NESCAFE CLASSIC 100g, NESCAFE 3in1 Creamy 18gr, NESCAFE GOLD BLEND 100g A+, NESCAFE GOLD BLEND 50g A+, COFFEMATE 450g, FOX''S Spring Tea 180g, POLO 24g, NESTLE CRUNCH 30g, NESCAFE RTD 240ml BPW, BEAR BRAND STM 195g, GOLD 220g, KOKO KRUNCH COMBO PACK 32g, MILO BALLS COMBO PACK 32g, KOKO KRUNCH 170g, MILO 3/1  300g, MILO 300g, MILO 3in1 POUCH 12 x 1KG, CARNATION SCC 380g FSC, NESCAFE KOPI SUSU PPP 23.5gr', 4000000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `code` varchar(225) NOT NULL,
  `distributor_code` varchar(225) DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `distributor_name` varchar(225) DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `reset_pass` varchar(225) DEFAULT NULL,
  `hak_akses` int(128) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`code`, `distributor_code`, `name`, `distributor_name`, `email`, `image`, `password`, `reset_pass`, `hak_akses`) VALUES
('0088', NULL, 'dssdsd', NULL, 'indriyanisn@gmail.com', 'Screenshot_2016-02-08-14-02-08-2.png', '07304e56c452be73ad2b51a4647d0300', NULL, 1),
('009320', '7283620', 'assdn', 'sds', 'sds12ju3@gmail.com', 'Screenshot_2016-02-12-19-42-20.png', '6351efe055f2f2bb1cfa0e244bc4ed58', NULL, 2),
('0909', '4334ff', 'bb', 'vvv', 'indriyavnni@gmail.com', 'Screenshot_2016-02-12-08-07-08.png', '71f7be7b8496f7ece8454b1bcdcd2162', NULL, 2),
('AD004', NULL, 'Indriyani', NULL, 'indriyani@gmail.com', 'indri.png', 'd6f9ac680b876154ea32dcf4ff1b5a95', NULL, 1),
('AD005', NULL, 'aa', NULL, 'indriyanaicx@gmail.com', 'Screenshot_2016-02-08-14-02-08-1.png', '6c57b2a3120e2f591929049f25c6f11b', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
