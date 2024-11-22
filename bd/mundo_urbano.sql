-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2024 a las 16:53:51
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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'identificador de la categoria',
  `nombre` varchar(256) NOT NULL COMMENT 'Nombre de la categoria',
  `img` varchar(256) NOT NULL COMMENT 'Imagen para la categoria',
  `banner_img` varchar(256) NOT NULL,
  `descripcion` text DEFAULT NULL COMMENT 'Descripcion opcional para la categoria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `img`, `banner_img`, `descripcion`) VALUES
(1, 'Zapatillas', 'zapatillas-banner-cat.jpg', 'banner-zapas-dc.jpg', 'Descubre nuestra amplia selección de zapatillas urbanas y deportivas para hombre y mujer. '),
(2, 'Hombre', 'hombre-banner-cat.jpg', 'banner-hombre-dc.jpg', 'Explora la categoría de hombre en Mundo Urbano, donde la moda urbana se encuentra con la comodidad y el estilo. '),
(3, 'Mujer', 'mujer-banner-cat.jpg', 'banner-rusty-mujer.jpg', 'Descubre la mejor selección en moda para mujer con prendas y accesorios que resaltan tu estilo único. '),
(4, 'Accesorios', 'accesorios-banner-cat.jpg', 'banner-accesorios.jpg', 'Completa tu estilo con nuestra selección de accesorios. Encuentra todo lo que necesitas para cada ocasión.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(256) NOT NULL COMMENT 'Nombre del color',
  `codigo` varchar(7) NOT NULL COMMENT 'Código Hexadecimal del color'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `color`, `codigo`) VALUES
(1, 'Negro', '#000000'),
(2, 'Gris', '#80808'),
(3, 'Blanco', '#FFFFFF'),
(4, 'Naranja', '#F28B30'),
(5, 'Celeste', '#96BFD9'),
(6, 'Verde agua', '#67B9B5'),
(7, 'Mix', '#FFFFFF'),
(8, 'Azul', '#0000ff'),
(9, 'Purpura', '#7d2181'),
(11, 'Rojo', '#ff0000'),
(12, 'rosa', '#FFC0CB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'identificador de la marca',
  `nombre` varchar(256) NOT NULL COMMENT 'Nombre de la marca',
  `img` varchar(256) NOT NULL COMMENT 'Logo de la marca',
  `descripcion` text DEFAULT NULL COMMENT 'Descripcion de la marca '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `img`, `descripcion`) VALUES
(1, 'DC', 'logo_dc.png', 'DC Shoes es una marca global fundada en 1994, conocida principalmente por su calzado y ropa inspirada en deportes de acción como skateboarding, snowboarding y BMX. La marca se destaca por su estilo urbano y diseños innovadores, siendo muy popular entre los jóvenes que practican deportes extremos. '),
(2, 'QuikSilver', 'logo_quiksilver.png', 'Quiksilver es una marca australiana fundada en 1969, reconocida mundialmente por su conexión con el surf y la cultura de los deportes acuáticos. Originalmente especializada en la fabricación de trajes de baño y accesorios para surfistas, Quiksilver ha expandido su línea de productos para incluir ropa, calzado y equipamiento relacionado con el surf, el skate y la vida al aire libre.'),
(3, 'Rusty', 'logo_rusty.png', 'Rusty es una marca australiana fundada en 1985, conocida principalmente por su conexión con el mundo del surf. Originalmente enfocada en la fabricación de tablas de surf, Rusty ha expandido su oferta a una amplia gama de ropa, accesorios y trajes de baño, manteniendo siempre su estilo ligado a la cultura del surf y al estilo de vida playero.'),
(4, 'Spiral', 'logo_spiral.png', 'Spiral Shoes es una marca argentina de calzado que se destaca por ofrecer zapatillas urbanas con un estilo juvenil y accesible. Popular entre adolescentes y jóvenes adultos, Spiral Shoes se enfoca en brindar diseños modernos y cómodos, adaptados a las tendencias actuales del streetwear. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `id` int(10) UNSIGNED NOT NULL,
  `temporada` enum('Verano','Primavera','Otoño','Invierno','Mixto') DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `descuento` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id`, `temporada`, `anio`, `descuento`) VALUES
(1, NULL, 2023, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
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
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `marca_id`, `color_id`, `nombre`, `descripcion`, `tipo`, `precio`, `img`, `temporada`, `fecha_ingreso`) VALUES
(1, 1, 1, 3, 'Court Graffik Ss (wlk)', 'La Court Graffik sigue mejorando con el tiempo, su clásica silueta hinchada siempre está evolucionando con colores de moda, llamativos logotipos de DC y nuevas telas que se destacan entre la multitud. Capellada de PU Sintético + Forrería liviana de lengüeta + Cuello y lengüeta con espuma acolchada para máximo confort y soporte + Perforaciones de ventilación para una mejor respirabilidad del pie + Suela Cupsole de caucho resistente a la abrasión con costura alrededor, proveyendo mayor durabilidad y resistencia + Diseño Pill Pattern de DC en pisada.', 'Zapatillas Urbana', 144990.00, 'court-graffik-wlk.jpg', 'Verano', '2024-10-24'),
(2, 1, 4, 1, 'Trip Premium', 'Estamos emocionados de presentar el modelo TRIP, la zapatilla que combina la robustez del calzado skater profesional con un estilo chunky de última tendencia. Diseñada para ofrecer el máximo confort y durabilidad, la TRIP presenta cordones Spiral Laces Chunky y un relleno de espuma de alta densidad de 20 mm, que garantizan un ajuste superior y comodidad sin igual.', 'Zapatillas Urbanas', 92819.00, 'trip-premium.jpg', 'Invierno', '2023-07-11'),
(3, 1, 4, 3, 'G.O.A.T High', 'GOAT HIGH se destaca por su altura sobre el tobillo y un elegante cierre de velcro que proporciona tanto estilo como sujeción. La zapatilla incorpora una espuma de poliuretano de alta densidad y refuerzos internos en Goma EVA, diseñados para ofrecer una protección superior contra golpes e impactos durante la práctica del skate. La suela de goma de alta resistencia a la abrasión garantiza una tracción duradera, mientras que la capellada está confeccionada en cuero vacuno natural.', 'Botas', 109199.00, 'goat-high-white.jpg', 'Invierno', '2024-05-07'),
(4, 1, 1, 3, 'Court Graffik Ss (Xw)', 'La Court Graffik sigue mejorando con el tiempo, su clásica silueta hinchada siempre está evolucionando con colores de moda, llamativos logotipos de DC y nuevas telas que se destacan entre la multitud. Capellada de PU Sintético + Forrería liviana de lengüeta + Cuello y lengüeta con espuma acolchada para máximo confort y soporte + Perforaciones de ventilación para una mejor respirabilidad del pie + Suela Cupsole de caucho resistente a la abrasión con costura alrededor, proveyendo mayor durabilidad y resistencia + Diseño Pill Pattern de DC en pisada.', 'Zapatillas urbana', 144990.00, 'court-graffik-xw.jpg', 'Verano', '2024-11-03'),
(5, 1, 1, 2, 'Lynx Zero (Wdb)', 'Capellada de Cuero, Nobuck, descarne o Mesh + Logo lateral de DC modeado en TPR + Cuello y lengüeta con espuma acolchada para proveer mayor confort + Forrería en mesh respirable + Plantilla interna en EVA + Pisada con diseño Pill Pattern de DC.', 'Zapatillas Urbana', 159990.00, 'lynx-zero-gris.jpg', 'Invierno', '2023-07-11'),
(7, 2, 1, 1, 'Chaqueta Static 94 (Neg)', 'TELA 100% Poliester Campera Tejido: Mini ripstop Fit: Boxy Estampa reflex en pecho y espalda Cordon en cintura Ventilacion en canesu central trasero Avios DC.', 'Chaqueta ', 169990.00, 'campera-dc-static.jpg', 'Verano', '2023-11-10'),
(8, 2, 1, 1, 'Chaleco Static 94', 'TELA 100% Algodon Chaleco Tejido: Gabardina elastizada Fit: Boxy Estampa reflex en el frente Bolsillos con fuelles y- tapa Avios DC', 'Chaleco', 116990.00, 'chaleco-dc-static.jpg', 'Verano', '2023-11-10'),
(9, 2, 3, 4, 'Buzo Canguro Biceps Orange', 'Buzo manga corta-manga larga con capucha, bolsillo tipo canguro, con cintura y puños de ribb elastizado. Tejido: Frisa invisible. Composición: Algodón 88% - Poliéster 12% Tipo de calce: Relaxed fit. Artes: Estampados en serigrafía de plastisol.', 'Buzo Canguro', 51990.00, 'buzo-rusty-orange.jpg', 'Invierno', '2024-05-10'),
(10, 2, 3, 1, 'Campera Canguro Pure O2 Black', 'Campera con capucha, bolsillo tipo canguro, con cintura y puños de ribb elastizado. Tejido: Frisa invisible. Composición: Algodón 88% - Poliéster 12% Tipo de calce: Regular fit.', 'Campera', 59990.00, 'campera-rusty-pure.jpg', 'Invierno', '2023-05-10'),
(11, 2, 3, 5, 'Jean Dungaree Denim Ash Blue', 'Este pantalón de jean estilo worker está confeccionado en denim índigo 100% algodón, diseñado para ofrecer durabilidad y comodidad con un calce relaxed fit. Cuenta con un lavado stone wash con enzimático, sin localizado, que le otorga un acabado robusto.', 'Pantalon Jean', 104900.00, 'pantalon-rusty-dungaree.jpg', 'Primavera', '2024-09-26'),
(12, 3, 1, 1, 'Remera Shift Oversized', 'TELA 100% Algodón Remera manga corta  Tejido: Jersey 24.1 Fit: Oversized Estampa en el frente Avios DC.', 'Remera', 32990.00, 'shift-oversized.jpg', 'Verano', '2024-11-10'),
(13, 3, 1, 6, 'The Weekend New Fit (Vee)', 'La remera DC para mujer en color verde está confeccionada en 100% algodón de alta calidad, con tejido Jersey 30.1 que ofrece suavidad y comodidad. Presenta un diseño de manga corta y un corte New Fit que se ajusta perfectamente a la silueta femenina, ideal para un look casual y urbano', 'Remera', 28990.00, 'the-weekend.jpg', 'Verano', '2022-11-10'),
(14, 3, 3, 1, 'Billie Low Wide Canvas Carpenter Black', 'Pantalón carpintero recto tiro bajo con detalles de presilla para martillo bordada. Bolsillos plaque delantero. Bolsillos plaque traseros con bordado logo a contratono. Tejido: lona tejida - 100% poliamida', 'Pantalon Jean', 74990.00, 'billie-low.jpg', 'Invierno', '2024-05-10'),
(15, 3, 3, 1, 'Jean Penny Black Slim Black', 'Este jean slim fit de tiro medio está confeccionado en Stretch Denim, compuesto por 98% algodón y 2% elastano, ofreciendo una combinación ideal de comodidad y flexibilidad. Presenta un lavado enzimático super stone wash que le da un aspecto desgastado en color negro, con roturas comunes y tajos en la bota para un estilo moderno y urbano.', 'Pantalon Jean', 94990.00, 'penny-black.jpg', 'Verano', '2021-11-10'),
(16, 4, 3, 1, 'Mochila Off Road* Black/Purple', 'Esta mochila de viaje y outdoor, con capacidad de 22 litros, está diseñada para la aventura y la comodidad. Sus dimensiones de 44 cm de alto, 31 cm de ancho y 16 cm de profundidad la hacen ideal para llevar lo esencial. Fabricada en poliéster resistente con detalles en red de poliéster.', 'Mochila', 74890.00, 'mochila-rusty-road.jpg', 'Invierno', '2023-05-10'),
(17, 4, 3, 7, 'Medias All Day Invisible 5- Pack', 'El pack de 5 medias All Day Invisible está diseñado para brindar comodidad y discreción en cualquier calzado. Fabricadas con materiales suaves y elásticos, estas medias invisibles se ajustan perfectamente al pie, proporcionando una sensación de ligereza durante todo el día.', 'Medias Cortas', 27490.00, 'media-rusty-allday.jpg', 'Verano', '2021-11-10'),
(18, 4, 3, 1, 'Gorra Chronic 4 Flexfit', 'Gorra de gabardina elastizada con visera semi curva y logo bordado en 3D El calce esta regulado por elástico con personalizado de marca.', 'Gorra', 34890.00, 'gorra-rusty-chronic-negra.jpg', 'Verano', '2024-11-10'),
(19, 4, 3, 1, 'Morral Sicarius Negro', 'Este morral de cordura, con dimensiones de 18 cm de ancho, 24 cm de alto y 7 cm de profundidad, combina estilo y funcionalidad en un diseño compacto. Incluye un patch festoneado en el frente que le añade un toque distintivo.', 'Morral', 25990.00, 'morral-rusty-sicarius.jpg', 'Mixto', '2021-11-10'),
(23, 2, 2, 1, 'Musculosa Quiksilver Sunset ', 'Descubre la musculosa Quiksilver Sunset negra, el equilibrio perfecto entre estilo y funcionalidad. Fabricada con materiales de alta calidad, esta prenda es ideal para actividades al aire libre, el gimnasio o looks casuales. ', 'Musculosa', 25900.00, '1732283663.jpg', 'Verano', '2023-06-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talles`
--

CREATE TABLE `talles` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la tabla talles',
  `categoria_talle` varchar(256) NOT NULL COMMENT 'Nombre para identificar a que talle pertenece ( Zapatilla Dc, Zapatilla Rusty, Remeras, etc..)',
  `talle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talles`
--

INSERT INTO `talles` (`id`, `categoria_talle`, `talle`) VALUES
(1, 'Zapatillas DC Hombre', '8'),
(2, 'Zapatillas DC Hombre', '9'),
(3, 'Zapatillas DC Hombre', '10'),
(4, 'Zapatillas DC Hombre', '11'),
(5, 'Zapatillas DC Hombre', '12'),
(6, 'Zapatillas Argentina', '35'),
(7, 'Zapatillas Argentina', '36'),
(8, 'Zapatillas Argentina', '37'),
(9, 'Zapatillas Argentina', '38'),
(10, 'Zapatillas Argentina', '39'),
(11, 'Zapatillas Argentina', '40'),
(12, 'Zapatillas Argentina', '41'),
(13, 'Zapatillas Argentina', '42'),
(14, 'Zapatillas Argentina', '43'),
(15, 'Zapatillas Argentina', '44'),
(16, 'Zapatillas Argentina', '45'),
(17, 'Indumentaria', 'XS'),
(18, 'Indumentaria', 'S'),
(19, 'Indumentaria', 'M'),
(20, 'Indumentaria', 'L'),
(21, 'Indumentaria', 'XL'),
(22, 'Indumentaria', '2XL'),
(23, 'Indumentaria', '3XL'),
(24, 'Pantalon Mujer', '24'),
(25, 'Pantalon Mujer', '26'),
(26, 'Pantalon Mujer', '28'),
(27, 'Pantalon Mujer', '30'),
(28, 'Pantalon Mujer', '32'),
(29, 'Pantalon Mujer', '34'),
(30, 'Pantalon Hombre', '28'),
(31, 'Pantalon Hombre', '30'),
(32, 'Pantalon Hombre', '32'),
(33, 'Pantalon Hombre', '34'),
(34, 'Pantalon Hombre', '36'),
(35, 'Pantalon Hombre', '38'),
(36, 'Pantalon Hombre', '40'),
(37, 'Unico', 'U');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talle_x_producto`
--

CREATE TABLE `talle_x_producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `talle_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0 COMMENT 'Cantidad del producto, por defecto es 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talle_x_producto`
--

INSERT INTO `talle_x_producto` (`id`, `producto_id`, `talle_id`, `cantidad`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 14, 24, 1),
(6, 14, 25, 1),
(7, 9, 17, 1),
(8, 9, 18, 1),
(9, 10, 19, 1),
(10, 8, 20, 1),
(11, 4, 2, 1),
(19, 23, 17, 1),
(20, 23, 18, 1),
(21, 23, 19, 2),
(22, 23, 20, 1),
(23, 23, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `alias_usuario` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('admin','superadmin','usuario','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `alias_usuario`, `nombre`, `apellido`, `password`, `rol`) VALUES
(1, 'nicolas.firpo@davinci.edu.ar', 'nicofirpo', 'nicolas', 'firpo', 'test1234', 'superadmin');

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
(3, 'nosotros', 'Nosotros', 0, 0),
(4, 'productos', 'Todos los productos', 0, 1),
(5, 'detalle_producto', 'Detalle del Producto', 0, 1),
(6, 'oferta', 'Ofertas', 0, 1),
(7, 'alumno', 'Alumno', 0, 1),
(8, 'contacto', 'Contacto', 0, 1),
(9, '404', 'Página no encontrada', 0, 1),
(10, '403', 'Pagina no disponible', 0, 1),
(11, 'dashboard', 'Panel de control', 0, 1),
(12, 'admin_marcas', 'Administrador de marcas', 0, 1),
(13, 'admin_colores', 'Administrador de colores', 0, 1),
(14, 'admin_categorias', 'Administrador de categorias', 0, 1),
(15, 'admin_productos', 'Administrador de productos', 0, 1),
(17, 'add_color', 'Agregar un color', 0, 1),
(18, 'add_marcas', 'Agregar una Marca', 0, 1),
(19, 'add_categorias', 'Agregar una categoria', 0, 1),
(20, 'edit_color', 'Edita un color', 0, 1),
(21, 'delete_color', 'Eliminar un color', 0, 1),
(22, 'edit_categoria', 'Editar categoria', 0, 1),
(23, 'edit_marca', 'Editar Marca', 0, 1),
(24, 'delete_marca', 'Eliminar Marca', 0, 1),
(25, 'delete_categoria', 'Eliminar categoria', 0, 1),
(26, 'admin_talles', 'Administrador de talles', 0, 1),
(27, 'add_categoria_talle', 'Agregar categoría de talle', 0, 1),
(28, 'delete_categoria_talle', 'Eliminar una categoría de talles completa', 0, 1),
(29, 'edit_categoria_talle', 'Editar Nombre de la categoria', 0, 1),
(30, 'add_talle_categoria', 'Agregar talles a la categoria', 0, 1),
(31, 'edit_talle', 'Editar un talle', 0, 1),
(32, 'delete_talle', 'Eliminar un talle', 0, 1),
(33, 'marcas', 'Marcas', 0, 1),
(34, 'edit_oferta', 'Edita la Oferta', 0, 1),
(36, 'add_productos', 'Agrega un nuevo producto', 0, 1),
(37, 'delete_producto', 'Eliminar un producto', 0, 1),
(38, 'edit_producto', 'Edita un producto', 0, 1),
(39, 'login', 'Iniciar Sesión ', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indices de la tabla `talles`
--
ALTER TABLE `talles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `talle_x_producto`
--
ALTER TABLE `talle_x_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `talle_id` (`talle_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `alias_usuario` (`alias_usuario`);

--
-- Indices de la tabla `vistas`
--
ALTER TABLE `vistas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'identificador de la categoria', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'identificador de la marca', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Campo identificador principal de la tabla', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `talles`
--
ALTER TABLE `talles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla talles', AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `talle_x_producto`
--
ALTER TABLE `talle_x_producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vistas`
--
ALTER TABLE `vistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `colores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `talle_x_producto`
--
ALTER TABLE `talle_x_producto`
  ADD CONSTRAINT `talle_x_producto_ibfk_1` FOREIGN KEY (`talle_id`) REFERENCES `talles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `talle_x_producto_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
