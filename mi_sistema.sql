-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2024 a las 22:25:49
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
-- Base de datos: `mi_sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `precio` decimal(20,2) NOT NULL,
  `categoria` varchar(80) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`id`, `producto`, `precio`, `categoria`, `descripcion`, `creado_en`, `imagen`) VALUES
(22, 'prueba 1', 233.00, 'asd', 'aasd', '2024-12-05 01:07:04', 'photo-1542291026-7eec264c27ff.avif'),
(23, 'fsa', 2445.00, 'asdad', 'aaaaa', '2024-12-05 01:07:22', 'photo-1542291026-7eec264c27ff.avif'),
(25, 'asdas', 21323.00, 'asda', 'qwewe', '2024-12-05 08:18:30', 'LOGO.jpg'),
(26, 'asdasd', 21323.00, '21323', '123123', '2024-12-05 08:21:31', 'photo-1542291026-7eec264c27ff.avif'),
(27, 'prueba 2', 2100.00, 'si', 'asdasd', '2024-12-05 21:21:05', 'photo-1542291026-7eec264c27ff.avif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(64) DEFAULT NULL,
  `token_expira` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`, `token`, `token_expira`) VALUES
(6, 'leo', '$2y$10$ngWvweeh3E/737b3c7uJNu/L/qI9G6O.dgJz2uK8lCAFum7Sth0ky', 'leand3741@gmail.com', NULL, NULL),
(7, 'alejo', '$2y$10$2C60bvXncyHfpqiVP4CH7e3K1mAEdqh6KewNdcv2x3Prq5OBppEBC', 'alego@gmail.com', NULL, NULL),
(8, 'lobo', '$2y$10$keEBM5E2z3n0rZEr8p9QV.QGXQSb8Slv7LdmkR/6VrPwB29R8Xs1y', 'lobojose@gmail.com', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
