SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `eshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `eshop`;

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `collections` (`id`, `name`, `value`, `image`) VALUES
(1, 'Многофункциональные устройства (МФУ)', 'mfu', 'AltaLink C8130.jpg'),
(2, 'Принтеры', 'printers', 'Принтер_Phaser_3020.jpg'),
(3, 'Сканеры', 'scanners', 'DocuMate_4830i.jpg');

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `items` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `name`, `image`, `price`, `model`, `year`, `country`, `collection_id`) VALUES
(1, 'AltaLink C8130', 'AltaLink C8130.jpg', 298000, 'С8130', 2013, 'Китай', 1),
(2, 'МФУ Xerox B215', 'МФУ Xerox B215.jpg', 138000, 'B215', 2014, 'Китай', 1),
(3, 'МФУ Xerox C315', 'МФУ Xerox C315.png', 168000, 'С315', 2012, 'Китай', 1),
(4, 'Принтер Phaser 3020', NULL, 30000, '3020', 2016, 'Россия', 2),
(5, '\r\nПринтер Phaser 6020', NULL, 25000, '6020', 2010, 'Венгрия', 2),
(6, 'Принтер Phaser 6510', NULL, 110000, '6510', 2021, 'Китай', 2),
(7, 'DocuMate 6460', NULL, 15000, '6460', NULL, 'Китай', 3),
(8, 'Duplex Portable Scanner', NULL, 25000, NULL, NULL, 'Польша', 3),
(9, 'DocuMate 4830i', NULL, 55000, '4830i', 1998, 'Япония', 3);

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `surname`, `patronymic`, `login`, `password`, `email`, `is_admin`) VALUES
(1, 'Салават', 'Зиатдинов', 'Ринатович', 'avavion', 'avavionmvm', 'avavion@gmail.com', 0),
(2, 'Алан', 'Богов', 'Андреевич', 'avavionmvm', '1b66da814a3f4108a78f80ddeb58d37d', 'avavionmvm@gmail.com', 0),
(3, 'Василий', 'Рогов', 'Денисович', 'weavers', '55d09101fa7c612133657b412e704736', 'weavers@gmail.com', 0);


ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_collections` (`collection_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_collections` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
