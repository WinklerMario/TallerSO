-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-09-2018 a las 18:16:13
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id3322302_consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Operacion` varchar(45) DEFAULT NULL,
  `Tabla` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idBitacora`, `Usuario`, `Tipo`, `Fecha`, `Operacion`, `Tabla`) VALUES
(1, 'Paola', 'Administrador', '2017-12-12 15:33:12', 'Insert', 'empleados'),
(2, 'Eduardo', 'Usuario', '2017-12-12 15:34:26', 'Delete', 'pacientes'),
(3, 'Paola', 'Administrador', '2017-12-13 02:45:43', 'Update', 'pacientes'),
(4, 'Mario', 'Usuario', '2017-12-13 20:15:14', 'insert', 'receta'),
(5, 'Mario', 'Usuario', '2017-12-13 20:20:35', 'insert', 'receta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `Id_Citas` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` varchar(45) DEFAULT NULL,
  `Tratamiento` varchar(200) DEFAULT NULL,
  `Id_Cedula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`Id_Citas`, `Fecha`, `Hora`, `Tratamiento`, `Id_Cedula`) VALUES
(1, '2017-12-13', '11:45 ', 'seretide cada 8 horas 2 disparos', 1),
(2, '2017-12-16', '11:45', 'Dieta y ejercicio', 1),
(3, '2017-12-13', '13:45', 'Dieta y ejercicio', 2),
(4, '2017-12-13', '14:45', ' reposo en su hogar por al menos 24 horas posteriores a la desaparición de la fiebre', 3),
(5, '2017-12-14', '11:45', 'seretide cada 8 horas 2 disparos', 4),
(6, '2017-12-25', '13:45', 'seretide cada 8 horas 2 disparos', 4),
(7, '2017-12-15', '14:45', 'seretide cada 8 horas 2 disparos', 5);

--
-- Disparadores `citas`
--
DELIMITER $$
CREATE TRIGGER `Actualizara` AFTER UPDATE ON `citas` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"Update","citas")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Eliminara` AFTER DELETE ON `citas` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"Delete","citas")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertara` AFTER INSERT ON `citas` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"insert","citas")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idUsuarios` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Ap_Pa` varchar(45) DEFAULT NULL,
  `Ap_Ma` varchar(45) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT 'Consul_Win@hotmail.com',
  `Direccion` varchar(45) DEFAULT NULL,
  `Sexo` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Estado_Civil` varchar(45) DEFAULT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `Session` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idUsuarios`, `Nombre`, `Ap_Pa`, `Ap_Ma`, `Edad`, `Correo`, `Direccion`, `Sexo`, `Telefono`, `Estado_Civil`, `Contrasena`, `Tipo`, `Session`) VALUES
(1, 'Edgar', 'Pulido', 'Romero', 21, 'edgar_pulrom@hotmail.com', 'kabah con ruta 5', 'Masculino', '9982386343', 'Soltero', 'E', 'Usuario', 'Offline'),
(2, 'Paola', 'Del', 'Tello', 28, '???', '???', 'Femenino', '????', 'Casado', 'P', 'Administrador', 'Online'),
(3, 'Carlos', 'Guzman', 'Mejia', 24, 'mejiaGuzmanca@hotmail.com', '???', 'Masculino', '9987675645', 'Soltero', 'C', 'Usuario', 'Offline'),
(4, 'Karla', 'Jimenez', 'Salcido', 20, 'karlha_JS@hotmail.com', 'Jardines del sur', 'Femenino', '9987162734', 'Soltero', 'K', 'Usuario', 'Offline'),
(5, 'Mario', 'Galvan ', 'Winkler', 20, 'mario_galvan_winkler@hotmail.com', 'Villas del caribe reg 520', 'Masculino', '9982386343', 'Soltero', 'M', 'Usuario', 'Offline'),
(6, 'Damaris', 'Villanueva', 'Garcia', 18, 'Garcia_dm@hotmail.com', 'Reg 235', 'Femenino', 'Soltero', '9987675678', 'D', 'Administrador', 'Offline'),
(8, 'Eduardo', 'Chulin', 'Che', 23, 'eduardo_cc94@hotmail.com', 'R 99 m 7 lt 5', 'Masculino', 'Soltero', '9982391348', 'Stark2010', 'Usuario', 'Offline');

--
-- Disparadores `empleados`
--
DELIMITER $$
CREATE TRIGGER `Delete` AFTER DELETE ON `empleados` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"Delete","empleados")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insert` AFTER INSERT ON `empleados` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"Insert","empleados")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `Id_Cedula` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Ap_Pa` varchar(45) DEFAULT NULL,
  `Ap_Ma` varchar(45) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT '***',
  `Direccion` varchar(85) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Estado_Civil` varchar(45) DEFAULT NULL,
  `Sexo` varchar(45) DEFAULT NULL,
  `Seguro_Medico` varchar(45) DEFAULT NULL,
  `Historial_Medico` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`Id_Cedula`, `Nombre`, `Ap_Pa`, `Ap_Ma`, `Edad`, `Correo`, `Direccion`, `Telefono`, `Fecha_Nacimiento`, `Estado_Civil`, `Sexo`, `Seguro_Medico`, `Historial_Medico`) VALUES
(1, 'Mario', 'Galvan', 'Winkler', 21, 'mario_galvan_winkler@hotmail.com', 'Villas del caribe reg 520', '9982386343', '1996-03-28', 'Soltero', 'Masculino', 'Si', 'asma influenza h1n11'),
(2, 'Jose', 'Hernandez', 'Jimenez', 30, 'JHJ_1987@hotmail.com', 'Villa  marino reg 523', '9987675678', '1987-05-10', 'Casado', 'Masculino', 'No', 'Diabetes'),
(3, 'Pamela', 'Ruiz', 'Garcia', 45, 'PamRG_101@hotmail.com', 'Paseos del Caribe reg 515', '9980564867', '1972-08-03', 'Casado', 'Femenino', 'Si', 'influenza h1n13'),
(4, 'Vanessa', 'Ramirez', 'Ramos', 25, 'Vanessa_Ramos@hotmail.com', 'Los heroes reg 203', '9981435672', '1992-06-16', 'Soltero', 'Femenino', 'Si', 'asma'),
(5, 'Guillermo', 'Tepo', 'Martinez', 8, 'Memo', 'Jardines', '9987456317', '2009-09-20', 'Soltero', 'Masculiino', 'Si', 'asma');

--
-- Disparadores `pacientes`
--
DELIMITER $$
CREATE TRIGGER `Actualizar` AFTER UPDATE ON `pacientes` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"Update","pacientes")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Eliminar` AFTER DELETE ON `pacientes` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"Delete","pacientes")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar` AFTER INSERT ON `pacientes` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"insert","pacientes")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `Id_Receta` int(11) NOT NULL,
  `Farmaco` varchar(50) DEFAULT NULL,
  `Dosis` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Id_Cedula` int(11) DEFAULT NULL,
  `Id_Citas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`Id_Receta`, `Farmaco`, `Dosis`, `Descripcion`, `Id_Cedula`, `Id_Citas`) VALUES
(1, 'Jarabe Ambroxol', '100ml', 'Una cucharada cada 8 horas', 1, 1),
(2, 'Tolbutamida', 'tabletas de 500 mg', '1000-2000 mg diarios Y se toma dos o tres veces por día', 2, 3),
(4, 'Oseltamivir', '100ml', 'Una cucharada cada 8 horas', 3, 4),
(5, 'Jarabe Ambroxol', '100ml', 'Una cucharada cada 8 horas', 4, 5),
(6, 'Jarabe Ambroxol', '100ml', 'Una cucharada cada 8 horas', 5, 7),
(7, 'Tolbutamida', 'tabletas de 500 mg', '1000-2000 mg diarios Y se toma dos o tres veces por día', 6, 8),
(8, 'Oseltamivir', '100ml', 'Una cucharada cada 8 horas', 3, NULL),
(9, 'Oseltamivir', '100ml', 'Una cucharada cada 8 horas', 3, NULL);

--
-- Disparadores `receta`
--
DELIMITER $$
CREATE TRIGGER `Actualiza` AFTER UPDATE ON `receta` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"Update","receta")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Elimina` AFTER DELETE ON `receta` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"Delete","receta")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inserta` AFTER INSERT ON `receta` FOR EACH ROW insert into bitacora values 
(null,(select Nombre from empleados where Session="Online")
,(select Tipo from empleados where Session="Online"),now(),"insert","receta")
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idBitacora`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Id_Citas`),
  ADD KEY `Id_Citas` (`Id_Citas`),
  ADD KEY `Id_Cedula_idx` (`Id_Cedula`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`Id_Cedula`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`Id_Receta`),
  ADD KEY `Id_Citas_idx` (`Id_Citas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Id_Citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `Id_Cedula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `Id_Receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `Id_Cedula` FOREIGN KEY (`Id_Cedula`) REFERENCES `pacientes` (`Id_Cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
