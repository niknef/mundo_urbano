-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2024 a las 21:56:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mundo_urbano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistas`
--

CREATE TABLE `vistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `restringida` tinyint(3) UNSIGNED NOT NULL,
  `activa` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vistas`
--

INSERT INTO `vistas` (`id`, `nombre`, `titulo`, `restringida`, `activa`) VALUES
(1, 'inicio', 'Tienda Online de Indumentaria y Calzado', 0, 1),
(2, 'todos_productos', 'Todos los Productos', 0, 1),
(3, 'nosotros', 'Nosotros', 0, 1),
(4, 'productos', 'Todos los productos', 0, 1),
(5, 'detalle_producto', 'Detalle del Producto', 0, 1),
(6, 'oferta', 'Ofertas', 0, 1),
(7, 'alumno', 'Alumno', 0, 1),
(8, 'contacto', 'Contacto', 0, 1),
(9, '404', 'Página no encontrada', 0, 1),
(10, '403', 'Pagina no disponible', 0, 1),
(11, 'dashboard', 'Panel de control', 2, 1),
(12, 'admin_marcas', 'Administrador de marcas', 2, 1),
(13, 'admin_colores', 'Administrador de colores', 2, 1),
(14, 'admin_categorias', 'Administrador de categorias', 2, 1),
(15, 'admin_productos', 'Administrador de productos', 2, 1),
(17, 'add_color', 'Agregar un color', 2, 1),
(18, 'add_marcas', 'Agregar una Marca', 2, 1),
(19, 'add_categorias', 'Agregar una categoria', 2, 1),
(20, 'edit_color', 'Edita un color', 2, 1),
(21, 'delete_color', 'Eliminar un color', 2, 1),
(22, 'edit_categoria', 'Editar categoria', 2, 1),
(23, 'edit_marca', 'Editar Marca', 2, 1),
(24, 'delete_marca', 'Eliminar Marca', 2, 1),
(25, 'delete_categoria', 'Eliminar categoria', 2, 1),
(26, 'admin_talles', 'Administrador de talles', 2, 1),
(27, 'add_categoria_talle', 'Agregar categoría de talle', 2, 1),
(28, 'delete_categoria_talle', 'Eliminar una categoría de talles completa', 2, 1),
(29, 'edit_categoria_talle', 'Editar Nombre de la categoria', 2, 1),
(30, 'add_talle_categoria', 'Agregar talles a la categoria', 2, 1),
(31, 'edit_talle', 'Editar un talle', 2, 1),
(32, 'delete_talle', 'Eliminar un talle', 2, 1),
(33, 'marcas', 'Marcas', 0, 1),
(34, 'edit_oferta', 'Edita la Oferta', 2, 1),
(36, 'add_productos', 'Agrega un nuevo producto', 2, 1),
(37, 'delete_producto', 'Eliminar un producto', 2, 1),
(38, 'edit_producto', 'Edita un producto', 2, 1),
(39, 'login', 'Iniciar Sesión ', 0, 1),
(40, 'usuario', 'Información del usuario', 1, 1),
(41, 'register', 'Registrarse como usuario nuevo', 0, 1),
(42, 'editar_usuario', 'Editar tu usuario', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vistas`
--
ALTER TABLE `vistas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vistas`
--
ALTER TABLE `vistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
