
create database if not exists id8972026_webhost;
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nick_user` varchar(40) NOT NULL,
  `contrasenha` varchar(250) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(100) DEFAULT 'sin direccion',
  `ciudad` varchar(20) DEFAULT 'sin ciudad',
  `recuerdame` char(2) DEFAULT 'no',
  `estado` char(2) DEFAULT 'no',
  `foto` varchar(50) DEFAULT 'no foto',
  `alta` varchar(50) NOT NULL,
  `latitud` varchar(100) NOT NULL,
  `longitud` varchar(100) NOT NULL,
  `dni` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nick_user`, `contrasenha`, `nombre`, `correo`, `telefono`, `direccion`, `ciudad`, `recuerdame`, `estado`, `foto`, `alta`, `latitud`, `longitud`, `dni`) VALUES
(34, 'pikoro1234', '$2y$10$AvoJ52zApSfH5qiS3QErjuS5UJcqYmUqX9VjiJ9zooHOCvHva5XGS', 'jorge fiorilo', 'donjuan.jfc@gmail.com', '634825951', 'calle llobregat #22', 'barcelona', 'of', 'on', '', 'Thu-17-12-2020', '41.4094426', '2.2143123', ''),
(44, 'jorgeTest', '$2y$10$fE8ufNgcKiZd2cjtlPUNdOVkHWEhduVffHHqyCOJIZOAht0U1q0Dq', 'jorge Fiorilo', 'donjuan.jfc@gmail.com', 'sin datos', 'sin datos', 'sin datos', 'si', 'on', 'nofoto', 'Wed-31-03-2021', '41.374860006093456', '2.118470036479863', '12345678Z'),
(45, 'donjuan', '$2y$10$6Oyon8WKv/8r6O/zfwlI0OvYzlGMHgKitj/G8Ee1GYSsmMWXozceO', 'don juan fiorilo', 'donjuan.jfc@gmail.com', 'sin datos', '12345', 'sin datos', 'si', 'on', 'nofoto', 'Fri-02-04-2021', '41.38974685360012', '2.108010513165929', '12345678Z');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `imagen_front` varchar(250) DEFAULT 'sin imagen',
  `imagen_back` varchar(250) DEFAULT 'sin imagen',
  `imagen_left` varchar(250) DEFAULT 'sin imagen',
  `nombre` varchar(100) NOT NULL,
  `precio` double(6,2) NOT NULL,
  `descripcion` varchar(600) DEFAULT 'no descripcion',
  `peso` varchar(100) DEFAULT '0',
  `dimension` varchar(100) DEFAULT '00cm alto,00cm ancho ',
  `marca` varchar(100) DEFAULT 'sin marca',
  `color` varchar(100) DEFAULT 'sin color',
  `envase` varchar(100) DEFAULT 'sin envase',
  `categoria` varchar(3) NOT NULL DEFAULT '0',
  `estado` varchar(100) DEFAULT 'no estado',
  `fecha` varchar(20) DEFAULT NULL,
  `numero_visitas` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `imagen_front`, `imagen_back`, `imagen_left`, `nombre`, `precio`, `descripcion`, `peso`, `dimension`, `marca`, `color`, `envase`, `categoria`, `estado`, `fecha`, `numero_visitas`, `id_cliente`) VALUES
(93, 'http://localhost/TiendaPHP-Ajax/uploads/02042021172536Captura de pantalla de 2021-03-08 18-57-28.png', 'http://localhost/TiendaPHP-Ajax/uploads/02042021172536Captura de pantalla de 2021-03-01 19-01-30.png', 'http://localhost/TiendaPHP-Ajax/uploads/02042021172536Captura de pantalla de 2021-03-08 18-19-02.png', 'yeso', 100.00, 'yeso para reparaciones en la casa', 'sin peso especificado', 'sin dimension especificada', 'sin marca', 'ningun color', 'sin envase', '3', 'activo', '02-04-2021', 14, 44),
(116, 'http://localhost/TiendaPHP-Ajax/uploads/23042021222840Captura de pantalla de 2021-01-10 20-50-09.png', 'http://localhost/TiendaPHP-Ajax/uploads/23042021222840Captura de pantalla de 2021-01-10 20-50-09.png', 'http://localhost/TiendaPHP-Ajax/uploads/23042021222840Captura de pantalla de 2021-01-10 20-50-09.png', 'mobil sony Z1s LTE', 300.00, 'sin descripcion', 'sin peso especificado', 'sin dimension especificada', 'sin marca', 'ningun color', 'sin envase', '4', 'stock', '23-04-2021', 6, 34);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;
