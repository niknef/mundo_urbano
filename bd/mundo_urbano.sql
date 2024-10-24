-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 12:29 AM
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
-- Database: `mundo_urbano`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'identificador de la categoria',
  `nombre` varchar(256) NOT NULL COMMENT 'Nombre de la categoria',
  `img` varchar(256) NOT NULL COMMENT 'Imagen para la categoria',
  `descripcion` text DEFAULT NULL COMMENT 'Descripcion opcional para la categoria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `img`, `descripcion`) VALUES
(1, 'Zapatillas', 'banner_zapatillas.jpg', 'Descubre nuestra amplia selección de zapatillas urbanas y deportivas para hombre y mujer. En Mundo Urbano, encontrarás modelos exclusivos de las mejores marcas, diseñados para brindar comodidad, estilo y rendimiento.'),
(2, 'Hombre', 'banner_hombre.jpg', 'Explora la categoría de hombre en Mundo Urbano, donde la moda urbana se encuentra con la comodidad y el estilo. Nuestra selección incluye ropa y calzado de las mejores marcas, diseñados para el hombre moderno que busca destacar en cualquier ocasión.');

-- --------------------------------------------------------

--
-- Table structure for table `colores`
--

CREATE TABLE `colores` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(256) NOT NULL COMMENT 'Nombre del color',
  `codigo` varchar(7) NOT NULL COMMENT 'Código Hexadecimal del color'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colores`
--

INSERT INTO `colores` (`id`, `color`, `codigo`) VALUES
(1, 'Negro', '#000000'),
(2, 'Gris', '#80808'),
(3, 'Blanco', '#FFFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'identificador de la marca',
  `nombre` varchar(256) NOT NULL COMMENT 'Nombre de la marca',
  `img` varchar(256) NOT NULL COMMENT 'Logo de la marca',
  `descripcion` text DEFAULT NULL COMMENT 'Descripcion de la marca '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `img`, `descripcion`) VALUES
(1, 'DC', 'logo_dc.png', 'DC Shoes es una marca global fundada en 1994, conocida principalmente por su calzado y ropa inspirada en deportes de acción como skateboarding, snowboarding y BMX. La marca se destaca por su estilo urbano y diseños innovadores, siendo muy popular entre los jóvenes que practican deportes extremos. '),
(2, 'QuikSilver', 'logo_quiksilver.png', 'Quiksilver es una marca australiana fundada en 1969, reconocida mundialmente por su conexión con el surf y la cultura de los deportes acuáticos. Originalmente especializada en la fabricación de trajes de baño y accesorios para surfistas, Quiksilver ha expandido su línea de productos para incluir ropa, calzado y equipamiento relacionado con el surf, el skate y la vida al aire libre.'),
(3, 'Rusty', 'logo_rusty.png', 'Rusty es una marca australiana fundada en 1985, conocida principalmente por su conexión con el mundo del surf. Originalmente enfocada en la fabricación de tablas de surf, Rusty ha expandido su oferta a una amplia gama de ropa, accesorios y trajes de baño, manteniendo siempre su estilo ligado a la cultura del surf y al estilo de vida playero.'),
(4, 'Spiral', 'logo_spiral.png', 'Spiral Shoes es una marca argentina de calzado que se destaca por ofrecer zapatillas urbanas con un estilo juvenil y accesible. Popular entre adolescentes y jóvenes adultos, Spiral Shoes se enfoca en brindar diseños modernos y cómodos, adaptados a las tendencias actuales del streetwear. ');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Campo identificador principal de la tabla',
  `categoria_id` int(10) UNSIGNED NOT NULL COMMENT 'Identificador para categorias',
  `marca_id` int(10) UNSIGNED NOT NULL COMMENT 'Identificador para marcas',
  `color_id` int(10) UNSIGNED NOT NULL COMMENT 'Identificador para colores',
  `nombre` varchar(256) NOT NULL COMMENT 'Nombre del Producto',
  `descripcion` text DEFAULT NULL COMMENT 'Descripcion del producto',
  `tipo` varchar(256) DEFAULT NULL COMMENT 'Tipo del producto',
  `precio` decimal(11,2) NOT NULL COMMENT 'Precio del producto',
  `img` varchar(256) NOT NULL COMMENT 'Imagen principal del producto',
  `temporada` enum('Invierno','Otoño','Primavera','Verano','Mixto') NOT NULL COMMENT 'Temporada del producto',
  `fecha_ingreso` date NOT NULL COMMENT 'Fecha en la que ingreso el producto a la tienda'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `marca_id`, `color_id`, `nombre`, `descripcion`, `tipo`, `precio`, `img`, `temporada`, `fecha_ingreso`) VALUES
(1, 1, 1, 3, 'Court Graffik Ss (wlk)', 'La Court Graffik sigue mejorando con el tiempo, su clásica silueta hinchada siempre está evolucionando con colores de moda, llamativos logotipos de DC y nuevas telas que se destacan entre la multitud. Capellada de PU Sintético + Forrería liviana de lengüeta + Cuello y lengüeta con espuma acolchada para máximo confort y soporte + Perforaciones de ventilación para una mejor respirabilidad del pie + Suela Cupsole de caucho resistente a la abrasión con costura alrededor, proveyendo mayor durabilidad y resistencia + Diseño Pill Pattern de DC en pisada.', 'Zapatillas Urbana', 144990.00, 'court-graffik-wlk.jpg', 'Verano', '2024-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `talles`
--

CREATE TABLE `talles` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la tabla talles',
  `categoria_talle` varchar(256) NOT NULL COMMENT 'Nombre para identificar a que talle pertenece ( Zapatilla Dc, Zapatilla Rusty, Remeras, etc..)',
  `talle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `talles`
--

INSERT INTO `talles` (`id`, `categoria_talle`, `talle`) VALUES
(1, 'Zapatillas DC Hombre', '8'),
(2, 'Zapatillas DC Hombre', '9'),
(3, 'Zapatillas DC Hombre', '10'),
(4, 'Zapatillas DC Hombre', '11'),
(5, 'Zapatillas DC Hombre', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `talles`
--
ALTER TABLE `talles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'identificador de la categoria', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'identificador de la marca', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Campo identificador principal de la tabla', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `talles`
--
ALTER TABLE `talles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla talles', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
