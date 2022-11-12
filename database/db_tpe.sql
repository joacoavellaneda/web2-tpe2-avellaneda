-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 02:31:58
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `category`) VALUES
(2, 'Climbing Harnesses'),
(3, 'Climbing Helmet'),
(4, 'Climbing Shoes'),
(76, 'Climbing Ropes'),
(77, 'Climbing Hardware'),
(78, 'Mountaineering Gear');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `color` varchar(75) NOT NULL,
  `size` varchar(75) NOT NULL,
  `description` text NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_products`, `name`, `price`, `color`, `size`, `description`, `id_category`) VALUES
(104, 'Black Diamond airNET Harness - Women\'s', 170, '#000000', 's', ' Patented airNET technology is ultra-breathable for high-end performance while distributing loads evenly during falls\r\n 2 pressure-molded gear loops in front; lightweight and low-profile webbing gear loops in back\r\nImported.\r\nLeg Loop Size	\r\nXS: 18-20 inches\r\n\r\nS: 20-22 inches\r\n\r\nM: 22-24 inches\r\n\r\nL: 24-26 inches\r\n\r\nWeight	\r\n227 grams\r\n\r\nGender	\r\nWomen\'s', 2),
(105, 'Petzl Luna Harness - Women\'s', 89, '#cb159b', 's', 'Soft, breathable mesh fabric lines the harness for better comfort on the skin and hot days on the wall\r\n Contoured waistbelt made from soft, flexible materials follows the natural lines of the body for improved support in the back and hips, and enhanced freedom of movement\r\n Women\'s-specific fit features a longer rise to sit higher on the waist, smaller waist-to-leg ratio, and a specifically angled waist belt that favors curved hips', 2),
(106, 'C.A.M.P. Energy CR-3 Harness - Men\'s', 50, '#4ca545', 'l', ' Thermoformed padding molds to your body for comfort\r\n Adjustable leg loops let you fine-tune the fit\r\n 4 webbing-reinforced gear loops and a haul loop\r\n Certified by the International Climbing and Mountaineering Federation: CE EN 12277, type C.\r\nImported', 2),
(107, 'La Sportiva Zenit Climbing Shoes - Men\'s', 69, '#2e49b8', 'm', ' Multizone knit uppers increase ventilation and breathability while providing a precise, comfortable fit and accommodating feet of varied volumes\r\n Supportive, firm midsoles relieve foot fatigue on long pitches and all-day sessions without sacrificing performance\r\n Dual hook-and-loop strap system offers quick adjustments for a dialed-in fit and easier entry/exit', 4),
(108, 'La Sportiva Tarantulace Climbing Shoes - Men\'s', 89, '#43654c', 's', 'Great for both outdoor and gym climbing\r\n Aggressive 2 mm FriXion® RS rubber heel rands and 5 mm outsoles are sticky, yet hard-wearing and provide a powerful edging platform to keep you glued to small holds', 4),
(109, 'La Sportiva Tarantula Climbing Shoes - Women\'s', 99, '#bf2ba4', 's', 'Unlined leather uppers provide excellent moisture management and stretch enough to make them a joy to put on day after day\r\n Slightly asymmetrical shape helps beginning climbers push the grades at a faster pace\r\n Highly adjustable, dual hook-and-look closure system adapts to various foot types and shape; it\'s easy to use—and easy to get on and off in a flash', 4),
(120, 'Black Diamond Vision Climbing Helmet', 99, '#48bddb', 's', 'Composite EPP foam, EPS foam puck and polycarbonate shell construction enhance durability\r\n Low-profile suspension system offers a comfortable fit\r\n Integrated clips make it easy to securely attach a headlamp (headlamp not included)', 2),
(121, 'Petzl Boreo Climbing Helmet', 60, '#392de6', 's', 'Hybrid construction with thick ABS crown, an EPP foam liner and an EPS foam liner makes it compact on your head\r\n Hard outer shell resists impact and abrasion, and offers reinforced protection against lateral, front and rear impacts\r\n Optimized volume and wide ventilation holes make it a comfortable helmet for all activities', 3),
(122, 'Black Diamond Half Dome Helmet - Women\'s', 59, '#000000', 's', 'Co-molded EPS foam construction with a low-profile ABS shell offers impact protection\r\n Streamlined suspension and headlamp clips add comfort and simplicity\r\n One-handed size-adjustment dial and low-profile chin strap\r\nImported.', 3),
(123, 'Sweet Protection Ascender MIPS Snow Helmet', 219, '#000000', 's', 'Triple-certified for U.S. alpine skiing, European alpine skiing and mountaineering\r\n Rotational motion can cause brain injuries; with MIPS, a low-friction layer slides 10 to 15 mm in all directions, reducing rotational motion to the brain during impact\r\nCompact design packs away with ease', 3),
(124, 'Sterling VR9 9.8 mm Dry-Core Rope', 129, '#94b847', 'null', ' Ideal for anyone from entry-level climbers to occasional climbers or weekend warriors\r\n Core treatment protects against water and dirt, increasing the durability of the rope\r\n Kernmantle design features a stretchy core protected by a durable outer sheath which combine for strength and good handling', 76),
(125, 'Black Diamond Babsi Edition 9.2 mm Dry Rope', 299, '#b257a1', 'null', 'With a core and sheath that are dry treated, this rope is protected against weather from the inside out, and meets the UIAA Water Repellent standard\r\n Utilizes a 1 x 1 weave construction that makes the rope more abrasion resistant\r\n Triple dash middle marker is easy to spot so you can quickly identify the middle of rope', 76),
(126, 'Petzl GRIGRI Belay Device', 99, '#616794', 'null', 'Designed for experienced belayers, the assisted braking function activates when a climber falls; the device pivots, the rope tightens and the cam pinches to block the rope\r\n Always catch falls and feed slack using standard belay techniques, keeping a hand on the brake side of the rope to help engage the cam\r\n Balanced design is optimized for 8.9-10.5 mm rope diameters and is simple to use for belaying both lead or top-rope climbers', 77),
(127, 'Black Diamond HotWire Quickpack - Package of 6', 89, '#cc0000', 'null', 'Dual wiregates eliminate gate flutter and won\'t freeze up in alpine conditions\r\n The durable, easy-to-grab 18mm polyester dogbone features a Straitjacket™ insert to keep the bottom carabiner properly oriented\r\n Includes 6 quickdraws\r\n', 77),
(128, 'Black Diamond HotForge Screwgate Carabiners - Package of 3', 35, '#000000', 'null', 'Low-profile keylock nose prevents snagging and is easy to clip and clean\r\n Accommodates a clove hitch\r\n Easy-to-hold functional shape\r\n Screwgate sleeve\r\n Type B \"Basic\" locking connector\r\n Individual weight: 50g', 77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`) VALUES
(50, 'admin@admin.com', '$2a$12$cP7fRwbW0fGIKJMf2PICb.ltgD4QdXu.EUI4ZwxyOoiGcWxl0QI2O');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `fk_category` (`id_category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
