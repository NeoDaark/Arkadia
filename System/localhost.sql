SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE Partida (
      id_partida     int NOT NULL AUTO_INCREMENT,
      id_usuario     int NOT NULL,
      nombre     varchar(32),
      imagen     varchar(50),
      descripcion     varchar(250),
      anyo     varchar(8),
      nv_sobrenatural     int,
      limite     int,
      token char(40),
	  diario varchar(60000),
      PRIMARY KEY (`id_partida`),
      KEY `id_usuario` (`id_usuario`)
);



CREATE TABLE Usuario (
      id_usuario     int NOT NULL AUTO_INCREMENT,
      nickname     varchar(32) UNIQUE,
      imagen     varchar(32),
      nombre     varchar(32),
      apellido     varchar(32),
      email     varchar(32),
      telefono     varchar(32),
      password     varchar(32),
      id_tipo     int,
      num_partidas int DEFAULT NULL, -- < value on guardar el nombre de partides actuals i poder limitaru amb php
      PRIMARY KEY (`id_usuario`)
);



CREATE TABLE Personaje (
      id_personaje     int NOT NULL AUTO_INCREMENT,
      id_usuario     int NOT NULL,
	  id_partida     int,
      id_categoria     int NOT NULL,
      nombre     varchar(32),
      apellido     varchar(32),
      edad     int,
      nivel     int,
      turno     int,
      puntos_vida     int,
      sexo     varchar(32),
      raza     varchar(32),
      pelo     varchar(32),
      ojos     varchar(32),
      altura     varchar(32),
      peso     varchar(32),
      apariencia     int,
      tamanyo     int,
      exp_actual     int,
      c_AGI     int,
      c_CON     int,
      c_DES     int,
      c_FUE     int,
      c_INT     int,
      c_PER     int,
      c_POD     int,
      c_VOL     int,
      nacionalidad     int(11),
      imagen     varchar(32),
      humano     varchar(8),
  puntos_hs     int,
  puntos_hp     int,
  puntos_totales     int,
  ha int,
  hp int,
  he int,
  la int,
  danyo int,
  TA int,
      PRIMARY KEY (`id_personaje`),
      KEY `id_usuario` (`id_usuario`),
      KEY `id_categoria` (`id_categoria`),
  KEY `nacionalidad` (`nacionalidad`)
);



CREATE TABLE IF NOT EXISTS `Nacionalidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `paises`
--

INSERT INTO `Nacionalidad` (`id`, `nombre`) VALUES
(1, 'Abel'),
(2, 'Arlan'),
(3, 'Alberia'),
(4, 'Galgados'),
(5, 'Ilmora'),
(6, 'Helenia'),
(7, 'Kanon'),
(8, 'Haufman'),
(9, 'Goldar'),
(10, 'Hendell'),
(11, 'Moth'),
(12, 'Dwänholf'),
(13, 'Phaion'),
(14, 'Gabriel'),
(15, 'Togarini'),
(16, 'Remo'),
(17, 'Bellafonte'),
(18, 'Lucrecio'),
(19, 'El Dominio'),
(20, 'Argos'),
(21, 'Kushistán'),
(22, 'Estigia'),
(23, 'Salazar'),
(24, 'Nanwe'),
(25, 'Kashmir'),
(26, 'Baho'),
(27, 'Lannet'),
(28, 'Shivat'),
(29, 'Bekent'),
(30, 'Dafne'),
(31, 'Pristina'),
(32, 'Espheria'),
(33, 'Ygdramar'),
(34, 'Manterra'),
(35, 'Corinia'),
(36, 'Arabel'),
(37, 'Elcia'),
(38, 'Itzi'),
(39, 'Dalaborn');



CREATE TABLE Categoria (
      id_categoria     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      descripcion     varchar(3000),
      PRIMARY KEY (`id_categoria`)
);



CREATE TABLE Habilidades_Secundarias (
  id_HS     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      id_rama     int NOT NULL,
      caracteristica     varchar(32),
      PRIMARY KEY (`id_HS`),
      KEY `id_rama` (`id_rama`)
);



CREATE TABLE Rama (
  id_rama     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32) NOT NULL,
      PRIMARY KEY (`id_rama`)
);



CREATE TABLE Habilidades_Primarias (
      id_HP     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      caracteristica     varchar(32),
      PRIMARY KEY (`id_HP`)
);



CREATE TABLE Nivel (
      nivel     int NOT NULL,
      puntos     int,
      incr_caracteristica int,
      exp_necesaria   int,
      presencia_base   int,
      PRIMARY KEY (`nivel`)
);



CREATE TABLE Objeto (
      `id_objeto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) DEFAULT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  `peso` float(4,1) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `public` varchar(8) DEFAULT 'true',
  `disponibilidad` varchar(8) DEFAULT NULL,
  `calidad` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT '6',
      PRIMARY KEY (`id_objeto`)
);



CREATE TABLE Roles (
      id_tipo     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      PRIMARY KEY (`id_tipo`)
);



CREATE TABLE Tipo (
  id_tipo     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32) NOT NULL,
      PRIMARY KEY (`id_tipo`)
);



CREATE TABLE Caracteristica (
      id_caracteristica     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      PRIMARY KEY (`id_caracteristica`)
);

CREATE TABLE Puntos_Vida (
      id_constitucion     int NOT NULL,
      cantidad     int,
      PRIMARY KEY (`id_constitucion`)
);

CREATE TABLE Regeneracion (
      id_constitucion     int NOT NULL,
      regeneracion_Diaria     int,
      PRIMARY KEY (`id_constitucion`)
);

CREATE TABLE Tamanyo (
      id_tamanyo     int NOT NULL,
      altura     varchar(32),
  peso     varchar(32),
      PRIMARY KEY (`id_tamanyo`)
);


CREATE TABLE Caracteristicas_P (
      base     int NOT NULL,
      bono     int,
      PRIMARY KEY (`base`)
);



CREATE TABLE Partida_Usuari (
      id_usuario    int NOT NULL,
      id_partida    int NOT NULL,
      pos   int DEFAULT NULL,
  aceptado varchar(50) DEFAULT 'false'
);


ALTER TABLE Partida_Usuari ADD PRIMARY KEY (id_usuario,id_partida);



CREATE TABLE Personaje_HS (
      id_personaje     int NOT NULL,
      id_HS     int NOT NULL,
	  valor int DEFAULT 0
);


ALTER TABLE Personaje_HS ADD PRIMARY KEY (id_personaje,id_HS);



CREATE TABLE Personaje_HP (
      id_personaje     int NOT NULL,
      id_HP     int NOT NULL
);


ALTER TABLE Personaje_HP ADD PRIMARY KEY (id_personaje,id_HP);



CREATE TABLE Personaje_Objeto (
      id_personaje     int NOT NULL,
      id_objeto     int NOT NULL,
	  cantidad int DEFAULT 1
);


ALTER TABLE Personaje_Objeto ADD PRIMARY KEY (id_personaje,id_objeto);



CREATE TABLE Objeto_Caracteristica (
      id_caracteristica     int NOT NULL,
      id_objeto     int NOT NULL,
      valor     varchar(250)
);


ALTER TABLE Objeto_Caracteristica ADD PRIMARY KEY (id_caracteristica,id_objeto);



CREATE TABLE Partida_Objeto (
      id_partida     int NOT NULL,
      id_objeto     int NOT NULL
);


ALTER TABLE Partida_Objeto ADD PRIMARY KEY (id_partida,id_objeto);


CREATE TABLE Personaje_Habilidades (
      id_habilidad     int NOT NULL,
      id_personaje     int NOT NULL
);


ALTER TABLE Personaje_Habilidades ADD PRIMARY KEY (id_habilidad,id_personaje);




CREATE TABLE Categoria_HP (
      id_categoria     int NOT NULL,
      id_HP     int NOT NULL,
      coste int,
      incr_nv  int
);

ALTER TABLE Categoria_HP ADD PRIMARY KEY (id_categoria,id_HP);

CREATE TABLE Categoria_HS (
      id_categoria     int NOT NULL,
      id_HS     int NOT NULL,
      coste int,
      incr_nv  int
);

ALTER TABLE Categoria_HS ADD PRIMARY KEY (id_categoria,id_HS);

CREATE TABLE Combate (
      id_personaje     int NOT NULL,
      id_partida     int NOT NULL
);


ALTER TABLE Combate ADD PRIMARY KEY (id_partida);







ALTER TABLE Partida ADD FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario);



ALTER TABLE Usuario ADD FOREIGN KEY (id_tipo) REFERENCES Roles (id_tipo);



ALTER TABLE Personaje ADD FOREIGN KEY (id_categoria) REFERENCES Categoria (id_categoria);
ALTER TABLE Personaje ADD FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario);
ALTER TABLE Personaje ADD FOREIGN KEY (nacionalidad) REFERENCES Nacionalidad (id);




ALTER TABLE Habilidades_Secundarias ADD FOREIGN KEY (id_rama) REFERENCES Rama (id_rama);





ALTER TABLE Objeto ADD FOREIGN KEY (id_tipo) REFERENCES Tipo (id_tipo);













ALTER TABLE Partida_Usuari ADD FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario);
ALTER TABLE Partida_Usuari ADD FOREIGN KEY (id_partida) REFERENCES Partida (id_partida);


ALTER TABLE Personaje_HS ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);
ALTER TABLE Personaje_HS ADD FOREIGN KEY (id_HS) REFERENCES Habilidades_Secundarias (id_HS);


ALTER TABLE Personaje_HP ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);
ALTER TABLE Personaje_HP ADD FOREIGN KEY (id_HP) REFERENCES Habilidades_Primarias (id_HP);


ALTER TABLE Personaje_Objeto ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);
ALTER TABLE Personaje_Objeto ADD FOREIGN KEY (id_objeto) REFERENCES Objeto (id_objeto);


ALTER TABLE Objeto_Caracteristica ADD FOREIGN KEY (id_caracteristica) REFERENCES Caracteristica (id_caracteristica);
ALTER TABLE Objeto_Caracteristica ADD FOREIGN KEY (id_objeto) REFERENCES Objeto (id_objeto);


ALTER TABLE Partida_Objeto ADD FOREIGN KEY (id_partida) REFERENCES Partida (id_partida);
ALTER TABLE Partida_Objeto ADD FOREIGN KEY (id_objeto) REFERENCES Objeto (id_objeto);


ALTER TABLE Personaje_Habilidades ADD FOREIGN KEY (id_habilidad) REFERENCES Habilidades_Esenciales (id_habilidad);
ALTER TABLE Personaje_Habilidades ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);

ALTER TABLE Categoria_HP ADD FOREIGN KEY (id_categoria) REFERENCES Categoria (id_categoria);
ALTER TABLE Categoria_HP ADD FOREIGN KEY (id_HP) REFERENCES Habilidades_Primarias (id_HP);

ALTER TABLE Categoria_HS ADD FOREIGN KEY (id_categoria) REFERENCES Categoria (id_categoria);
ALTER TABLE Categoria_HS ADD FOREIGN KEY (id_HS) REFERENCES Habilidades_Secundarias (id_HS);


--
-- Volcado de datos para la tabla `Roles`
--
INSERT INTO `Roles` (`id_tipo`,`nombre`) VALUES
(0, 'Administrador'),
(1, 'Usuario');


--
-- Volcado de datos para la tabla `Usuario`
--
INSERT INTO  `Animaster`.`Usuario` (
`id_usuario` ,
`nickname` ,
`imagen` ,
`nombre` ,
`apellido` ,
`email` ,
`telefono` ,
`password` ,
`id_tipo` ,
`num_partidas`
)
VALUES 

(NULL ,  'Admin', NULL ,  'admin', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  '0'),
(NULL ,  'david', NULL ,  'david', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  NULL),
(NULL ,  'marc', NULL ,  'marc', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  '1'),
(NULL ,  'gurwinder', NULL ,  'gurwinder', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  NULL),
(NULL ,  'admin2', NULL ,  'admin2', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  '0'),
(NULL ,  'test', NULL ,  'test', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  NULL),
(NULL ,  'test2', NULL ,  'test2', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  NULL);



--
-- Volcado de datos para la tabla `Caracteristicas_P`
--

INSERT INTO `Caracteristicas_P` (`base`, `bono`) VALUES
(1, -30),
(2, -20),
(3, -10),
(4, -5),
(5, 0),
(6, 5),
(7, 5),
(8, 10),
(9, 10),
(10, 15),
(11, 20),
(12, 20),
(13, 25),
(14, 30),
(15, 30),
(16, 35),
(17, 35),
(18, 40),
(19, 40),
(20, 45);

--
-- Volcado de datos para la tabla `Puntos_Vida`
--
INSERT INTO `Puntos_Vida` (`id_constitucion`, `cantidad`) 
VALUES
(1, 5),
(2, 20),
(3, 40),
(4, 55),
(5, 70),
(6, 85),
(7, 95),
(8, 110),
(9, 120),
(10, 135),
(11, 150),
(12, 160),
(13, 175),
(14, 185),
(15, 200),
(16, 215),
(17, 225),
(18, 240),
(19, 250),
(20, 265);


--
-- Volcado de datos para la tabla `Regeneracion`
--
INSERT INTO `Regeneracion` (`id_constitucion`, `regeneracion_Diaria`) 
VALUES
(1, 0),
(2, 0),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(8, 20),
(9, 20),
(10, 30),
(11, 40),
(12, 50),
(13, 75),
(14, 100),
(15, 250),
(16, 500),
(17, 1440),
(18, 2880),
(19, 7200),
(20, 7200);


--
-- Volcado de datos para la tabla `Tamanyo`
--
INSERT INTO `Tamanyo` (`id_tamanyo`, `altura`, `peso`) 
VALUES
(2, '0.20 a 0.60 m', '5 a 15 kg'),
(3, '0.40 a 0.60 m', '10 a 20 kg'),
(4, '0.60 a 1.00 m', '20 a 30 kg'),
(5, '0.80 a 1.20 m', '20 a 50 kg'),
(6, '1.00 a 1.40 m', '30 a 50 kg'),
(7, '1.10 a 1.50 m', '30 a 60 kg'),
(8, '1.20 a 1.60 m', '35 a 70 kg'),
(9, '1.30 a a.60 m', '40 a 80 kg'),
(10, '1.40 a 1.70 m', '40 a 90 kg'),
(11, '1.40 a 1.80 m', '50 a 100 kg'),
(12, '1.50 a 1.80 m', '50 a 120 kg'),
(13, '1.50 a 1.80 m', '50 a 140 kg'),
(14, '1.60 a 1.90 m', '50 a 150 kg'),
(15, '1.60 a 2.00 m', '60 a 180 kg'),
(16, '1.70 a 2.10 m', '70 a 220 kg'),
(17, '1.70 a 2.10 m', '80 a 240 kg'),
(18, '1.80 a 2.20 m', '90 a 260 kg'),
(19, '1.90 a 2.30 m', '100 a 280 kg'),
(20, '2.00 a 2.40 m', '110 a 320 kg'),
(21, '2.10 a 2.60 m', '120 a 450 kg'),
(22, '+2.5 m', '+400 kg');



--
-- Volcado de datos para la tabla `Tipo`
--
INSERT INTO  `Animaster`.`Tipo` (
`id_tipo` ,
`nombre`
)
VALUES (
NULL ,  'alimento'
), (
NULL ,  'armaduras'
), (
NULL ,  'armas y escudos'
), (
NULL ,  'arte y decoración'
), (
NULL ,  'cartas'
), (
NULL ,  'útiles varios'
), (
NULL ,  'venenos'
), (
NULL ,  'vestimenta'
), (
NULL ,  'yelmos'
);


--
-- Volcado de datos para la tabla `Categoria`
--
INSERT INTO  `Animaster`.`Categoria` (
`id_categoria` ,
`nombre` ,
`descripcion`
)
VALUES 
(1, 'Guerrero', 'El guerrero es el luchador arquetípico por excelencia. Esta categoría engloba a aquellas personas que han dedicado por completo su vida al combate y son capaces de explotar al máximo su habilidad bélica. Esto les lleva no sólo a dominar el manejo de las armas, sino a, llegado el momento, emplear su energía anímica en la lucha. También tienen facilidad para desarrollar un gran conocimiento en el campo de las tácticas militares y convertirse en cabecillas de ejércitos. Tradicionalmente, los guerreros pueden llegar a trabajar casi de cualquier cosa, desde meros mercenarios a caballeros.'),
(2, 'Guerrero Acróbata', 'Los guerreros acróbatas son luchadores que se han especializado en sacar el máximo provecho a su agilidad y rapidez. Su principal ventaja consiste en aticiparse a los movimientos de sus adversarios y tratar de acabar con ellos antes de que reaccionen. También prefieren esquivar los ataques y estar tan lejos como puedan del lugar donde se da el gople. Se benefician de una gran movilidad, siendo capaces de saltar, caer o correr con una destreza que muy pocos logran igualar. Pueden adoptar cualquier tipo de papel en la sociedad, pero generalmente asumirán profesiones ligadas al combate, como duelista o espadachines.'),
(3, 'Paladín', 'Los paladines son luchadores muy defensivos que combaten apoyándose en ciertas capacidads místicas. Una de sus especialidades consiste en expulsar a los seres sobrenaturales usando sus poderes naturales. Normalmente, muchos se rigen por códigos de conducta basados en normas religiosas o en el honor, aunque no están obligados a ello. Son líderes naturales, capaces de utilizar su carisma y dotes para movilizar a su favor a enormes cantidades de personas, que incluso darán sus vidas por ellos.'),
(4, 'Paladín Oscuro', 'En cierto modo, esta categoría es la opuesta directa al paladín. Es un luchador especializado en el ataque que se apoya en unas limitadas habilidades místicas. Sus principales poderes se basan en el dominio y el control de los seres sobrenaturales, quienes, una vez sometidos a su voluntad, son utilitzados en su beneficio. Tienen grandes capacidades de mando, pero emplean la intimidación y el miedo para subyugar a los demás a sus deseos. Si esto no funciona, persuaden a las personas tratando de conseguir salirse con lo que pretende.'),
(5, 'Maestro en Armas', 'Son luchadores que se han dediado a perfeccionar sus habilidades marciales con todo tipo de armas. Se trata de guerreros natos, los cuales han llevado hasta el límite su capacidad combativa por encima de cualquier otra categoría. Opuestamente a los guerreros convencionales, no emplean ninguna otra habilidad en la lucha más que su maestría en el uso de las armas. En una contienda, ingoran el uso de su energía física y de todo aquello que no sea su propia habilidad marical, pero no por ello dejan de ser los combatientes más hábiles y los más centrados en las verdaderas habilidades marciales. La gran mayoría de caballeros y mercenarios tienen esta categoría.'),
(6, 'Explorador', 'Un explorador es el prototipo tradicional de aventurero. Normalmente, se trata de personas que han sacado el máximo provecho a su capacidad de percibir lo que les rodea y adentrasre donde nadie más sería capaz. Un explorador suele tener siempre sus sentidos pendientes de lo que hay a su alrededor, por lo que es muy complicado cogerle por sorpresa. Es también un rastreador y un superviviente nato, razón por la que tiene grandes conocimientos sobre zonas boscosas o regiones inhóspitas. En la sociedad suele trabajar como cazadores, batidoes o incluso arqueólogos, pero lo más normal es que simplemente se trate de habitantes de territorios apartados donde sus habilidades son necesarias para sobrevivir.'),
(7, 'Sombra', 'Las sombras son luchadores que se mueven en la oscuridad y aprovechan a su favor el entorno. Aunque sus habilidades de combate son excelentes, prefieren acabar con sus enemigos sin darles la oportunidad de responder a su ataques. Para ello, emplean el subterfugio para sorprenderles, o usan otras tácticas más complejas. Incluso si es descubierta, una sombra es capaz de seguir luchando con sus enemigos en igualdad de oportunidades, aunque su resistencia tiende a ser menor que la de otros luchadores. Generalmente ágiles y veloces, prefieren esquivar los ataques en lugar de afrontarlos.'),
(8, 'Ladrón', 'Como sugiere su nombre, un ladrón es un personaje especializado en los campos del sigilo, el robo y la ocultación. Son personas que huyen de los enfrentamientos directos y prefieren confiar en sus habilidades de subterfugio para conseguir lo que desean. Dado que su resistencia física no suele ser demasiado elevada, son muy hábiles huyendo y esquivando golpes cuando son descubiertos. Pueden representar diversos papeles en la sociedad, aunque habitualmente se dedican a la profesión que da nombre a la categoría.'),
(9, 'Asesino', 'Son individuos que se especializan en los campos del subterfugio y la intriga. Se mueven en el anonimato y tratan de que sus víctimas no sean ni siquiera conscientes de qué les ha matado. Emplean técnicas muy refinadas, prefiriendo evitar en todo momento llegar al combate donde son muy vulnerables. Por ello, tras hacer su trabajo, desaparecen de nuevo entre las sombras de las que surgieron. De todas formas, personajes con esta categoria no están necesariamente obligados a representar únicamente el papel de ejecutores dentro de la sociedad, ya que existen muchos otros ámbitos en los que pueden poner en práctica sus excelentes habilidades, como por ejemplo el espionaje.'),
(10, 'Novel', 'Los noveles representan el arquetipo de Sin categoría, o lo que es lo mismo, alguien que no se encuentra dentro de ninguno de los arquetipos que se han explicado hasta el momento. Puede ser cualquier tipo de persona que no tenga una verdadera especialización. Desde campesinos a barcos, pasando por nobles y bufones, el novel es la categoría estándar de Ánima, a la que podrá acceder cualquiera. El novel tiene buenas habilidades en todos los campos, desde la magia al combate, aunque no se especializa en ninguno. Además le resulta excepcionalmente fácil cambiar posteriormente de categoría a la de cualquier otro arquetipo. En muchas ocasiones, cuando un jugador no tenga realmente decidido qué hacer con su personaje, puede empezar como novel y realizar después un cambio de categoría, cuando finalmente encuentre la apropiada.');



--
-- Volcado de datos para la tabla `rama`
--
INSERT INTO `Rama` (`id_rama`, `nombre`) 
VALUES (
NULL, 'Atléticas'), (
NULL, 'Vigor'), (
NULL, 'Perceptivas'), (
NULL, 'Intelectuales'), (
NULL, 'Sociales'), (
NULL, 'Subterfugio'), (
NULL, 'Creativas'), (
NULL, 'Especial');

--
-- Volcado de datos para la tabla `nivel`
--
INSERT INTO `Nivel` (`nivel`, `puntos`, `incr_caracteristica`, `exp_necesaria`, `presencia_base`) 
VALUES 
(NULL, '400', NULL, NULL, '20'),
('1', '600', NULL, NULL, '30'),
('2', '700', '1', '100', '35'),
('3', '800', NULL, '225', '40'),
('4', '900', '1', '375', '45'),
('5', '1000', NULL, '550', '50'),
('6', '1100', '1', '750', '55'),
('7', '1200', NULL, '975', '60'),
('8', '1300', '1', '1225', '65'),
('9', '1400', NULL, '1500', '70'),
('10', '1500', '1', '1800', '75'),
('11', '1600', NULL, '2125', '80'),
('12', '1700', '1', '2475', '85'),
('13', '1800', NULL, '2850', '90'),
('14', '1900', '1', '3250', '95'),
('15', '2000', NULL, '3675', '100'),
('16', '2100', '1', '4125', '105'),
('17', '2200', NULL, '4575', '110'),
('18', '2300', '1', '5025', '115'),
('19', '2400', NULL, '5475', '120'),
('20', '2500', '1', '5925', '125');

--
-- Volcado de datos para la tabla `habilidades_primarias`
--
INSERT INTO `Habilidades_Primarias` (`id_HP`, `nombre`, `caracteristica`) 
VALUES 
(NULL, 'Habilidad Ataque', 'DES'), 
(NULL, 'Habilidad Parada', 'DES'), 
(NULL, 'Habilidad Esquiva', 'AGI'), 
(NULL, 'Llevar Armadura', 'FUE');


--
-- Volcado de datos para la tabla `habilidades_secundarias`
--
INSERT INTO `Habilidades_Secundarias` (`id_HS`, `nombre`, `id_rama`, `caracteristica`) 
VALUES 
(1, 'Acrobacias', '1', 'AGI'), 
(2, 'Atletismo', '1', 'AGI'), 
(3, 'Montar', '1', 'AGI'), 
(4, 'Nadar', '1', 'AGI'), 
(5, 'Trepar', '1', 'AGI'), 
(6, 'Saltar', '1', 'FUE'), 
(7, 'Frialdad', '2', 'VOL'), 
(8, 'P. Fuerza', '2', 'FUE'), 
(9, 'Res. Dolor', '2', 'VOL'), 
(10, 'Advertir', '3', 'PER'), 
(11, 'Buscar', '3', 'PER'), 
(12, 'Rastrear', '3', 'PER'),
(13, 'Animales', '4', 'INT'),
(14, 'Ciencia', '4', 'INT'),
(15, 'Herbolaria', '4', 'INT'),
(16, 'Historia', '4', 'INT'),
(17, 'Medicina', '4', 'INT'),
(18, 'Memorizar', '4', 'INT'),
(19, 'Navegacion', '4', 'INT'),
(20, 'Ocultismo', '4', 'INT'),
(21, 'Tasacion', '4', 'INT'),
(22, 'Ley', '4', 'INT'),
(23, 'Tactica', '4', 'INT'),
(24, 'Estilo', '5', 'POD'),
(25, 'Intimidar', '5', 'VOL'),
(26, 'Liderazgo', '5', 'POD'),
(27, 'Persuasion', '5', 'INT'),
(28, 'Comerciar', '5', 'INT'),
(29, 'Callejeo', '5', 'INT'),
(30, 'Etiqueta', '5', 'INT'),
(31, 'Cerrajeria', '6', 'DES'),
(32, 'Disfraz', '6', 'DES'),
(33, 'Ocultarse', '6', 'PER'),
(34, 'Robo', '6', 'DES'),
(35, 'Sigilo', '6', 'AGI'),
(36, 'Tramperia', '6', 'PER'),
(37, 'Venenos', '6', 'INT'),
(38, 'Arte', '7', 'DES'),
(39, 'Baile', '7', 'AGI'),
(40, 'Forja', '7', 'DES'),
(41, 'T. Manos', '7', 'DES'),
(42, 'Canto', '7', 'VOL'),
(43, 'Runas', '7', 'DES'),
(44, 'Animismo', '7', 'POD'),
(45, 'Alquimia', '7', 'INT'),
(46, 'Especial1', '8', 'DES'),
(47, 'Especial2', '8', 'DES'),
(48, 'Especial3', '8', 'AGI'),
(49, 'Especial4', '8', 'INT');


--
-- Volcado de datos para la tabla `categoria_hp`
--
INSERT INTO `Categoria_HP` (`id_HP`, `id_categoria`, `coste`, `incr_nv`) 
VALUES 
('1', '1', '2', '5'),
('2', '1', '2', '5'),
('3', '1', '2', NULL),
('4', '1', '2', '5'),
('1', '2', '2', '5'),
('2', '2', '3', NULL),
('3', '2', '2', '5'),
('4', '2', '2', NULL),
('1', '3', '2', NULL),
('2', '3', '2', '5'),
('3', '3', '2', NULL),
('4', '3', '2', '10'),
('1', '4', '2', '5'),
('2', '4', '2', NULL),
('3', '4', '2', NULL),
('4', '4', '2', '5'),
('1', '5', '2', '5'),
('2', '5', '2', '5'),
('3', '5', '2', NULL),
('4', '5', '1', '10'),
('1', '6', '2', '5'),
('2', '6', '2', NULL),
('3', '6', '2', NULL),
('4', '6', '2', NULL),
('1', '7', '2', '5'),
('2', '7', '3', NULL),
('3', '7', '2', '5'),
('4', '7', '2', NULL),
('1', '8', '2', NULL),
('2', '8', '3', NULL),
('3', '8', '2', '5'),
('4', '8', '3', NULL),
('1', '9', '2', '5'),
('2', '9', '3', NULL),
('3', '9', '2', NULL),
('4', '9', '3', NULL),
('1', '10', '2', NULL),
('2', '10', '2', NULL),
('3', '10', '2', NULL),
('4', '10', '2', NULL);

--
-- Volcado de datos para la tabla `categoria_hs`
--
INSERT INTO `Categoria_HS` (`id_categoria`, `id_HS`, `coste`, `incr_nv`) 
VALUES 
('1', '1', '2', NULL),
('1', '2', '2', NULL),
('1', '3', '2', NULL),
('1', '4', '2', NULL),
('1', '5', '2', NULL),
('1', '6', '2', NULL),
('1', '7', '2', NULL),
('1', '8', '1', '5'),
('1', '9', '2', NULL),
('1', '10', '2', NULL),
('1', '11', '2', NULL),
('1', '12', '2', NULL),
('1', '13', '3', NULL),
('1', '14', '3', NULL),
('1', '15', '3', NULL),
('1', '16', '3', NULL),
('1', '17', '3', NULL),
('1', '18', '3', NULL),
('1', '19', '3', NULL),
('1', '20', '3', NULL),
('1', '21', '3', NULL),
('1', '22', '3', NULL),
('1', '23', '3', NULL),
('1', '24', '3', NULL),
('1', '25', '3', NULL),
('1', '26', '2', NULL),
('1', '27', '2', NULL),
('1', '28', '2', NULL),
('1', '29', '2', NULL),
('1', '30', '2', NULL),
('1', '31', '2', NULL),
('1', '32', '2', NULL),
('1', '33', '2', NULL),
('1', '34', '2', NULL),
('1', '35', '2', NULL),
('1', '36', '2', NULL),
('1', '37', '2', NULL),
('1', '38', '2', NULL),
('1', '39', '2', NULL),
('1', '40', '2', NULL),
('1', '41', '2', NULL),
('1', '42', '2', NULL),
('1', '43', '2', NULL),
('1', '44', '2', NULL),
('1', '45', '2', NULL),
('1', '46', '2', NULL),
('1', '47', '2', NULL),
('1', '48', '2', NULL),
('1', '49', '2', NULL),


('2', '1', '2', '10'),
('2', '2', '2', '10'),
('2', '3', '2', NULL),
('2', '4', '2', NULL),
('2', '5', '2', NULL),
('2', '6', '2', '10'),
('2', '7', '2', NULL),
('2', '8', '2', NULL),
('2', '9', '2', NULL),
('2', '10', '2', NULL),
('2', '11', '2', NULL),
('2', '12', '2', NULL),
('2', '13', '3', NULL),
('2', '14', '3', NULL),
('2', '15', '3', NULL),
('2', '16', '3', NULL),
('2', '17', '3', NULL),
('2', '18', '3', NULL),
('2', '19', '3', NULL),
('2', '20', '3', NULL),
('2', '21', '3', NULL),
('2', '22', '3', NULL),
('2', '23', '3', NULL),
('2', '24', '2', '10'),
('2', '25', '2', NULL),
('2', '26', '2', NULL),
('2', '27', '2', NULL),
('2', '28', '2', NULL),
('2', '29', '2', NULL),
('2', '30', '2', NULL),
('2', '31', '2', NULL),
('2', '32', '2', NULL),
('2', '33', '2', NULL),
('2', '34', '2', NULL),
('2', '35', '2', NULL),
('2', '36', '2', NULL),
('2', '37', '2', NULL),
('2', '38', '2', NULL),
('2', '39', '2', NULL),
('2', '40', '2', NULL),
('2', '41', '2', '10'),
('2', '42', '2', NULL),
('2', '43', '2', NULL),
('2', '44', '2', NULL),
('2', '45', '2', NULL),
('2', '46', '2', NULL),
('2', '47', '2', NULL),
('2', '48', '2', NULL),
('2', '49', '2', NULL),

('3', '1', '2', NULL),
('3', '2', '2', NULL),
('3', '3', '2', NULL),
('3', '4', '2', NULL),
('3', '5', '2', NULL),
('3', '6', '2', NULL),
('3', '7', '2', '10'),
('3', '8', '2', NULL),
('3', '9', '1', '10'),
('3', '10', '2', NULL),
('3', '11', '2', NULL),
('3', '12', '2', NULL),
('3', '13', '2', NULL),
('3', '14', '2', NULL),
('3', '15', '2', NULL),
('3', '16', '2', NULL),
('3', '17', '2', NULL),
('3', '18', '2', NULL),
('3', '19', '2', NULL),
('3', '20', '2', NULL),
('3', '21', '2', NULL),
('3', '22', '2', NULL),
('3', '23', '2', NULL),
('3', '24', '1', '5'),
('3', '25', '1', NULL),
('3', '26', '1', '10'),
('3', '27', '1', NULL),
('3', '28', '1', NULL),
('3', '29', '1', NULL),
('3', '30', '1', NULL),
('3', '31', '3', NULL),
('3', '32', '3', NULL),
('3', '33', '3', NULL),
('3', '34', '3', NULL),
('3', '35', '3', NULL),
('3', '36', '3', NULL),
('3', '37', '3', NULL),
('3', '38', '2', NULL),
('3', '39', '2', NULL),
('3', '40', '2', NULL),
('3', '41', '2', NULL),
('3', '42', '2', NULL),
('3', '43', '2', NULL),
('3', '44', '2', NULL),
('3', '45', '2', NULL),
('3', '46', '2', NULL),
('3', '47', '2', NULL),
('3', '48', '2', NULL),
('3', '49', '2', NULL),

('4', '1', '2', NULL),
('4', '2', '2', NULL),
('4', '3', '2', NULL),
('4', '4', '2', NULL),
('4', '5', '2', NULL),
('4', '6', '2', NULL),
('4', '7', '1', '5'),
('4', '8', '2', NULL),
('4', '9', '2', '10'),
('4', '10', '2', NULL),
('4', '11', '2', NULL),
('4', '12', '2', NULL),
('4', '13', '2', NULL),
('4', '14', '2', NULL),
('4', '15', '2', NULL),
('4', '16', '2', NULL),
('4', '17', '2', NULL),
('4', '18', '2', NULL),
('4', '19', '2', NULL),
('4', '20', '2', NULL),
('4', '21', '2', NULL),
('4', '22', '2', NULL),
('4', '23', '2', NULL),
('4', '24', '1', '5'),
('4', '25', '1', '10'),
('4', '26', '1', NULL),
('4', '27', '1', '5'),
('4', '28', '1', NULL),
('4', '29', '1', NULL),
('4', '30', '1', NULL),
('4', '31', '2', NULL),
('4', '32', '2', NULL),
('4', '33', '2', NULL),
('4', '34', '2', NULL),
('4', '35', '2', NULL),
('4', '36', '2', NULL),
('4', '37', '2', NULL),
('4', '38', '2', NULL),
('4', '39', '2', NULL),
('4', '40', '2', NULL),
('4', '41', '2', NULL),
('4', '42', '2', NULL),
('4', '43', '2', NULL),
('4', '44', '2', NULL),
('4', '45', '2', NULL),
('4', '46', '2', NULL),
('4', '47', '2', NULL),
('4', '48', '2', NULL),
('4', '49', '2', NULL),

('5', '1', '2', NULL),
('5', '2', '2', NULL),
('5', '3', '2', NULL),
('5', '4', '2', NULL),
('5', '5', '2', NULL),
('5', '6', '2', NULL),
('5', '7', '1', NULL),
('5', '8', '1', '5'),
('5', '9', '1', NULL),
('5', '10', '2', NULL),
('5', '11', '2', NULL),
('5', '12', '2', NULL),
('5', '13', '3', NULL),
('5', '14', '3', NULL),
('5', '15', '3', NULL),
('5', '16', '3', NULL),
('5', '17', '3', NULL),
('5', '18', '3', NULL),
('5', '19', '3', NULL),
('5', '20', '3', NULL),
('5', '21', '3', NULL),
('5', '22', '3', NULL),
('5', '23', '3', NULL),
('5', '24', '2', NULL),
('5', '25', '2', NULL),
('5', '26', '2', NULL),
('5', '27', '2', NULL),
('5', '28', '2', NULL),
('5', '29', '2', NULL),
('5', '30', '2', NULL),
('5', '31', '3', NULL),
('5', '32', '3', NULL),
('5', '33', '3', NULL),
('5', '34', '3', NULL),
('5', '35', '3', NULL),
('5', '36', '3', NULL),
('5', '37', '3', NULL),
('5', '38', '2', NULL),
('5', '39', '2', NULL),
('5', '40', '2', NULL),
('5', '41', '2', NULL),
('5', '42', '2', NULL),
('5', '43', '2', NULL),
('5', '44', '2', NULL),
('5', '45', '2', NULL),
('5', '46', '2', NULL),
('5', '47', '2', NULL),
('5', '48', '2', NULL),
('5', '49', '2', NULL),

('6', '1', '2', NULL),
('6', '2', '2', NULL),
('6', '3', '2', NULL),
('6', '4', '2', NULL),
('6', '5', '2', NULL),
('6', '6', '2', NULL),
('6', '7', '3', NULL),
('6', '8', '3', NULL),
('6', '9', '3', NULL),
('6', '10', '1', '10'),
('6', '11', '1', '10'),
('6', '12', '1', '10'),
('6', '13', '1', '5'),
('6', '14', '3', NULL),
('6', '15', '2', '5'),
('6', '16', '3', NULL),
('6', '17', '2', NULL),
('6', '18', '3', NULL),
('6', '19', '3', NULL),
('6', '20', '3', NULL),
('6', '21', '3', NULL),
('6', '22', '3', NULL),
('6', '23', '3', NULL),
('6', '24', '2', NULL),
('6', '25', '2', NULL),
('6', '26', '2', NULL),
('6', '27', '2', NULL),
('6', '28', '2', NULL),
('6', '29', '2', NULL),
('6', '30', '2', NULL),
('6', '31', '2', NULL),
('6', '32', '2', NULL),
('6', '33', '2', NULL),
('6', '34', '2', NULL),
('6', '35', '2', NULL),
('6', '36', '1', '5'),
('6', '37', '2', NULL),
('6', '38', '2', NULL),
('6', '39', '2', NULL),
('6', '40', '2', NULL),
('6', '41', '2', NULL),
('6', '42', '2', NULL),
('6', '43', '2', NULL),
('6', '44', '2', NULL),
('6', '45', '2', NULL),
('6', '46', '2', NULL),
('6', '47', '2', NULL),
('6', '48', '2', NULL),
('6', '49', '2', NULL),

('7', '1', '2', NULL),
('7', '2', '2', NULL),
('7', '3', '2', NULL),
('7', '4', '2', NULL),
('7', '5', '2', NULL),
('7', '6', '2', NULL),
('7', '7', '2', NULL),
('7', '8', '2', NULL),
('7', '9', '2', NULL),
('7', '10', '2', '10'),
('7', '11', '2', '10'),
('7', '12', '2', NULL),
('7', '13', '3', NULL),
('7', '14', '3', NULL),
('7', '15', '3', NULL),
('7', '16', '3', NULL),
('7', '17', '3', NULL),
('7', '18', '3', NULL),
('7', '19', '3', NULL),
('7', '20', '3', NULL),
('7', '21', '3', NULL),
('7', '22', '3', NULL),
('7', '23', '3', NULL),
('7', '24', '2', NULL),
('7', '25', '2', NULL),
('7', '26', '2', NULL),
('7', '27', '2', NULL),
('7', '28', '2', NULL),
('7', '29', '2', NULL),
('7', '30', '2', NULL),
('7', '31', '2', NULL),
('7', '32', '2', NULL),
('7', '33', '2', '10'),
('7', '34', '2', NULL),
('7', '35', '2', '10'),
('7', '36', '2', NULL),
('7', '37', '2', NULL),
('7', '38', '2', NULL),
('7', '39', '2', NULL),
('7', '40', '2', NULL),
('7', '41', '2', NULL),
('7', '42', '2', NULL),
('7', '43', '2', NULL),
('7', '44', '2', NULL),
('7', '45', '2', NULL),
('7', '46', '2', NULL),
('7', '47', '2', NULL),
('7', '48', '2', NULL),
('7', '49', '2', NULL),

('8', '1', '1', NULL),
('8', '2', '1', NULL),
('8', '3', '1', NULL),
('8', '4', '1', NULL),
('8', '5', '1', NULL),
('8', '6', '1', NULL),
('8', '7', '3', NULL),
('8', '8', '3', NULL),
('8', '9', '3', NULL),
('8', '10', '2', '5'),
('8', '11', '2', '5'),
('8', '12', '2', NULL),
('8', '13', '3', NULL),
('8', '14', '3', NULL),
('8', '15', '3', NULL),
('8', '16', '3', NULL),
('8', '17', '3', NULL),
('8', '18', '3', NULL),
('8', '19', '3', NULL),
('8', '20', '3', NULL),
('8', '21', '1', NULL),
('8', '22', '3', NULL),
('8', '23', '3', NULL),
('8', '24', '2', NULL),
('8', '25', '2', NULL),
('8', '26', '2', NULL),
('8', '27', '2', NULL),
('8', '28', '2', NULL),
('8', '29', '2', NULL),
('8', '30', '2', NULL),
('8', '31', '1', NULL),
('8', '32', '1', NULL),
('8', '33', '1', '5'),
('8', '34', '1', '10'),
('8', '35', '1', '5'),
('8', '36', '1', '5'),
('8', '37', '1', NULL),
('8', '38', '2', NULL),
('8', '39', '2', NULL),
('8', '40', '2', NULL),
('8', '41', '2', '5'),
('8', '42', '2', NULL),
('8', '43', '2', NULL),
('8', '44', '2', NULL),
('8', '45', '2', NULL),
('8', '46', '2', NULL),
('8', '47', '2', NULL),
('8', '48', '2', NULL),
('8', '49', '2', NULL),

('9', '1', '2', NULL),
('9', '2', '2', NULL),
('9', '3', '2', NULL),
('9', '4', '2', NULL),
('9', '5', '2', NULL),
('9', '6', '2', NULL),
('9', '7', '2', '10'),
('9', '8', '3', NULL),
('9', '9', '3', NULL),
('9', '10', '1', '10'),
('9', '11', '1', '10'),
('9', '12', '1', NULL),
('9', '13', '3', NULL),
('9', '14', '3', NULL),
('9', '15', '3', NULL),
('9', '16', '3', NULL),
('9', '17', '3', NULL),
('9', '18', '2', NULL),
('9', '19', '3', NULL),
('9', '20', '3', NULL),
('9', '21', '3', NULL),
('9', '22', '3', NULL),
('9', '23', '3', NULL),
('9', '24', '2', NULL),
('9', '25', '2', NULL),
('9', '26', '2', NULL),
('9', '27', '2', NULL),
('9', '28', '2', NULL),
('9', '29', '2', NULL),
('9', '30', '2', NULL),
('9', '31', '2', NULL),
('9', '32', '2', NULL),
('9', '33', '2', '10'),
('9', '34', '2', NULL),
('9', '35', '1', '10'),
('9', '36', '2', '10'),
('9', '37', '2', '10'),
('9', '38', '2', NULL),
('9', '39', '2', NULL),
('9', '40', '2', NULL),
('9', '41', '2', NULL),
('9', '42', '2', NULL),
('9', '43', '2', NULL),
('9', '44', '2', NULL),
('9', '45', '2', NULL),
('9', '46', '2', NULL),
('9', '47', '2', NULL),
('9', '48', '2', NULL),
('9', '49', '2', NULL),

('10', '1', '2', NULL),
('10', '2', '2', NULL),
('10', '3', '2', NULL),
('10', '4', '2', NULL),
('10', '5', '2', NULL),
('10', '6', '2', NULL),
('10', '7', '2', NULL),
('10', '8', '2', NULL),
('10', '9', '2', NULL),
('10', '10', '2', NULL),
('10', '11', '2', NULL),
('10', '12', '2', NULL),
('10', '13', '2', NULL),
('10', '14', '2', NULL),
('10', '15', '2', NULL),
('10', '16', '2', NULL),
('10', '17', '2', NULL),
('10', '18', '2', NULL),
('10', '19', '2', NULL),
('10', '20', '2', NULL),
('10', '21', '2', NULL),
('10', '22', '2', NULL),
('10', '23', '2', NULL),
('10', '24', '2', NULL),
('10', '25', '2', NULL),
('10', '26', '2', NULL),
('10', '27', '2', NULL),
('10', '28', '2', NULL),
('10', '29', '2', NULL),
('10', '30', '2', NULL),
('10', '31', '2', NULL),
('10', '32', '2', NULL),
('10', '33', '2', NULL),
('10', '34', '2', NULL),
('10', '35', '2', NULL),
('10', '36', '2', NULL),
('10', '37', '2', NULL),
('10', '38', '2', NULL),
('10', '39', '2', NULL),
('10', '40', '2', NULL),
('10', '41', '2', NULL),
('10', '42', '2', NULL),
('10', '43', '2', NULL),
('10', '44', '2', NULL),
('10', '45', '2', NULL),
('10', '46', '2', NULL),
('10', '47', '2', NULL),
('10', '48', '2', NULL),
('10', '49', '2', NULL);




--
-- Volcado de datos para la tabla `caracteristica`
--
INSERT INTO `Caracteristica` (`id_caracteristica`, `nombre`) VALUES
(1, 'Daño'),
(2, 'Turno'),
(3, 'FUE Req.'),
(4, 'Crítico 1'),
(5, 'Crítico 2'),
(6, 'Tipo de arma'),
(7, 'Especial'),
(8, 'Enterza'),
(9, 'Rotura'),
(10, 'Presencia'),
(11, 'Tipo'),
(12, 'Cadencia de Fuego'),
(13, 'Recarga'),
(14, 'Alcance'),
(15, 'Requerimiento de Armadura'),
(16, 'Penalizador natural'),
(17, 'Restricción al movimiento'),
(18, 'Localización'),
(19, 'Classe'),
(20, 'TA_FIL'),
(21, 'Penalización a la percepción'),
(22, 'Dureza');



--
-- Volcado de datos para la tabla `objeto`
--
INSERT INTO `Objeto` (`id_objeto`, `nombre`, `descripcion`, `peso`, `precio`, `public`, `disponibilidad`, `calidad`, `id_tipo`) 
VALUES
(1, 'Oro', 'Moneda de oro', 0.0, 1000, 'true', NULL, 0, 6),
(2, 'Plata', 'Moneda de plata', 0.0, 10, 'true', NULL, 0, 6),
(3, 'Bronce', 'Moneda de bronce', 0.0, 1, 'true', NULL, 0, 6),
(4, 'Alabarda', '', 3, 12000, 'true', NULL, 0, 3),
(5, 'Arpón', '', 2, 50000, 'true', NULL, 0, 3),
(6, 'Cadena', '', 2, 2000, 'true', NULL, 0, 3),
(7, 'Cestus', '', 0.5, 3000, 'true', NULL, 0, 3),
(8, 'Cimitarra', '', 1, 10000, 'true', NULL, 0, 3),
(9, 'Daga', '', 0.5, 500, 'true', NULL, 0, 3),
(10, 'Daga de parada', '', 0.6, 10000, 'true', NULL, 0, 3),
(11, 'Espada ancha', '', 1.5, 10000, 'true', NULL, 0, 3),
(12, 'Espada bastarda', '', 2, 20000, 'true', NULL, 0, 3),
(13, 'Espada corta', '', 0.8, 2000, 'true', NULL, 0, 3),
(14, 'Espada larga', '', 1.4, 5000, 'true', NULL, 0, 3),
(15, 'Estilete', '', 0.4, 600, 'true', NULL, 0, 3),
(16, 'Acolchada', '', 3, 1000, 'true', NULL, 0, 2),
(17, 'Anillas', '', 9, 50000, 'true', NULL, 0, 2),
(18, 'Completa', '', 20, 400000, 'true', NULL, 0, 2),
(19, 'Completa de cuero', '', 7, 5000, 'true', NULL, 0, 2),
(20, 'Completa de campaña', '', 25, 800000, 'true', NULL, 0, 2),
(21, 'Completa pesada', '', 30, 700000, 'true', NULL, 0, 2),
(22, 'Cota de cuero', '', 3, 1000, 'true', NULL, 0, 2),
(23, 'Cuero endurecido', '', 4, 15000, 'true', NULL, 0, 2),
(24, 'Cuero tachonado', '', 4.5, 25000, 'true', NULL, 0, 2),
(25, 'Escamas', '', 9, 120000, 'true', NULL, 0, 2),
(26, 'Gabardina', '', 1.5, 50, 'true', NULL, 0, 2),
(27, 'Mallas', '', 13, 70000, 'true', NULL, 0, 2),
(28, 'Peto', '', 4, 40000, 'true', NULL, 0, 2),
(29, 'Piel', '', 2, 5000, 'true', NULL, 0, 2),
(30, 'Piezas', '', 6, 40000, 'true', NULL, 0, 2),
(31, 'Placas', '', 18, 300000, 'true', NULL, 0, 2),
(32, 'Semicompleta', '', 13, 100000, 'true', NULL, 0, 2);


--
-- Volcado de datos para la tabla `objeto_caracteristica`
--
INSERT INTO `Objeto_Caracteristica` (`id_caracteristica`, `id_objeto`, `valor`) 
VALUES 
(1, 4, '60'),
(2, 4, '-15'),
(3, 4, '6 / 11'),
(4, 4, 'FIL'),
(5, 4, 'CON'),
(6, 4, 'Asta / Mandoble'),
(7, 4, 'A dos manos'),
(8, 4, '15'),
(9, 4, '4'),
(10, 4, '20'),
(11, 4, NULL),
(12, 4, NULL),
(13, 4, NULL),
(14, 4, NULL),
(15, 4, NULL),
(16, 4, NULL),
(17, 4, NULL),
(18, 4, NULL),
(19, 4, NULL),
(20, 4, NULL),
(21, 4, NULL),
(22, 4, NULL),

(1, 5, '35'),
(2, 5, '-5'),
(3, 5, '5'),
(4, 5, 'PEN'),
(5, 5, ''),
(6, 5, 'Asta'),
(7, 5, 'A una o a dos manos, Lanzable'),
(8, 5, '11'),
(9, 5, NULL),
(10, 5, '15'),
(11, 5, NULL),
(12, 5, NULL),
(13, 5, NULL),
(14, 5, NULL),
(15, 5, NULL),
(16, 5, NULL),
(17, 5, NULL),
(18, 5, NULL),
(19, 5, NULL),
(20, 5, NULL),
(21, 5, NULL),
(22, 5, NULL),

(1, 6, '35'),
(2, 6, NULL),
(3, 6, '6'),
(4, 6, 'CON'),
(5, 6, NULL),
(6, 6, 'Cuerda'),
(7, 6, 'Compleja, Presa(Fuerza 8)'),
(8, 6, '13'),
(9, 6, '2'),
(10, 6, '15'),
(11, 6, NULL),
(12, 6, NULL),
(13, 6, NULL),
(14, 6, NULL),
(15, 6, NULL),
(16, 6, NULL),
(17, 6, NULL),
(18, 6, NULL),
(19, 6, NULL),
(20, 6, NULL),
(21, 6, NULL),
(22, 6, NULL),

(1, 7, '25'),
(2, 7, '10'),
(3, 7, '3'),
(4, 7, 'PEN'),
(5, 7, 'FIL'),
(6, 7, 'Arma corta'),
(7, 7, NULL),
(8, 7, '11'),
(9, 7, '-2'),
(10, 7, '15'),
(11, 7, NULL),
(12, 7, NULL),
(13, 7, NULL),
(14, 7, NULL),
(15, 7, NULL),
(16, 7, NULL),
(17, 7, NULL),
(18, 7, NULL),
(19, 7, NULL),
(20, 7, NULL),
(21, 7, NULL),
(22, 7, NULL),

(1, 8, '50'),
(2, 8, '-5'),
(3, 8, '5'),
(4, 8, 'FIL'),
(5, 8, NULL),
(6, 8, 'Espada'),
(7, 8, NULL),
(8, 8, '13'),
(9, 8, '4'),
(10, 8, '20'),
(11, 8, NULL),
(12, 8, NULL),
(13, 8, NULL),
(14, 8, NULL),
(15, 8, NULL),
(16, 8, NULL),
(17, 8, NULL),
(18, 8, NULL),
(19, 8, NULL),
(20, 8, NULL),
(21, 8, NULL),
(22, 8, NULL),

(1, 9, '30'),
(2, 9, '20'),
(3, 9, '3'),
(4, 9, 'PEN'),
(5, 9, 'FIL'),
(6, 9, 'Arma corta'),
(7, 9, 'Lanzable, Precisa'),
(8, 9, '10'),
(9, 9, '-2'),
(10, 9, '15'),
(11, 9, NULL),
(12, 9, NULL),
(13, 9, NULL),
(14, 9, NULL),
(15, 9, NULL),
(16, 9, NULL),
(17, 9, NULL),
(18, 9, NULL),
(19, 9, NULL),
(20, 9, NULL),
(21, 9, NULL),
(22, 9, NULL),

(1, 10, '30'),
(2, 10, '15'),
(3, 10, '3'),
(4, 10, 'PEN'),
(5, 10, 'FIL'),
(6, 10, 'Arma corta'),
(7, 10, 'Lanzable, Traba el arma, Precisa'),
(8, 10, '12'),
(9, 10, NULL),
(10, 10, '20'),
(11, 10, NULL),
(12, 10, NULL),
(13, 10, NULL),
(14, 10, NULL),
(15, 10, NULL),
(16, 10, NULL),
(17, 10, NULL),
(18, 10, NULL),
(19, 10, NULL),
(20, 10, NULL),
(21, 10, NULL),
(22, 10, NULL),

(1, 11, '55'),
(2, 11, '-5'),
(3, 11, '5'),
(4, 11, 'FIL'),
(5, 11, NULL),
(6, 11, 'Espada'),
(7, 11, NULL),
(8, 11, '15'),
(9, 11, '3'),
(10, 11, '25'),
(11, 11, NULL),
(12, 11, NULL),
(13, 11, NULL),
(14, 11, NULL),
(15, 11, NULL),
(16, 11, NULL),
(17, 11, NULL),
(18, 11, NULL),
(19, 11, NULL),
(20, 11, NULL),
(21, 11, NULL),
(22, 11, NULL),

(1, 12, '70'),
(2, 12, '-30'),
(3, 12, '7 / 9'),
(4, 12, 'FIL'),
(5, 12, 'CON'),
(6, 12, 'Espada / Mandoble'),
(7, 12, NULL),
(8, 12, '15'),
(9, 12, '5'),
(10, 12, '25'),
(11, 12, NULL),
(12, 12, NULL),
(13, 12, NULL),
(14, 12, NULL),
(15, 12, NULL),
(16, 12, NULL),
(17, 12, NULL),
(18, 12, NULL),
(19, 12, NULL),
(20, 12, NULL),
(21, 12, NULL),
(22, 12, NULL),

(1, 13, '40'),
(2, 13, '15'),
(3, 13, '4'),
(4, 13, 'PEN'),
(5, 13, 'FIL'),
(6, 13, 'arma corta'),
(7, 13, 'Precisa'),
(8, 13, '12'),
(9, 13, '1'),
(10, 13, '20'),
(11, 13, NULL),
(12, 13, NULL),
(13, 13, NULL),
(14, 13, NULL),
(15, 13, NULL),
(16, 13, NULL),
(17, 13, NULL),
(18, 13, NULL),
(19, 13, NULL),
(20, 13, NULL),
(21, 13, NULL),
(22, 13, NULL),

(1, 14, '50'),
(2, 14, NULL),
(3, 14, '6'),
(4, 14, 'FIL'),
(5, 14, NULL),
(6, 14, 'Espada'),
(7, 14, NULL),
(8, 14, '13'),
(9, 14, '3'),
(10, 14, '25'),
(11, 14, NULL),
(12, 14, NULL),
(13, 14, NULL),
(14, 14, NULL),
(15, 14, NULL),
(16, 14, NULL),
(17, 14, NULL),
(18, 14, NULL),
(19, 14, NULL),
(20, 14, NULL),
(21, 14, NULL),
(22, 14, NULL),

(1, 15, '25'),
(2, 15, '20'),
(3, 15, '3'),
(4, 15, 'PEN'),
(5, 15, NULL),
(6, 15, 'Arma corta'),
(7, 15, 'Lanzable, precisa'),
(8, 15, '8'),
(9, 15, '-3'),
(10, 15, '15'),
(11, 15, NULL),
(12, 15, NULL),
(13, 15, NULL),
(14, 15, NULL),
(15, 15, NULL),
(16, 15, NULL),
(17, 15, NULL),
(18, 15, NULL),
(19, 15, NULL),
(20, 15, NULL),
(21, 15, NULL),
(22, 15, NULL),

(1, 16, NULL),
(2, 16, NULL),
(3, 16, NULL),
(4, 16, NULL),
(5, 16, NULL),
(6, 16, NULL),
(7, 16, NULL),
(8, 16, '10'),
(9, 16, NULL),
(10, 16, '25'),
(11, 16, NULL),
(12, 16, NULL),
(13, 16, NULL),
(14, 16, NULL),
(15, 16, NULL),
(16, 16, '-5'),
(17, 16, NULL),
(18, 16, 'Camisola'),
(19, 16, 'Blanda'),
(20, 16, '1'),
(21, 16, NULL),
(22, 16, NULL),

(1, 17, NULL),
(2, 17, NULL),
(3, 17, NULL),
(4, 17, NULL),
(5, 17, NULL),
(6, 17, NULL),
(7, 17, NULL),
(8, 17, '15'),
(9, 17, NULL),
(10, 17, '30'),
(11, 17, NULL),
(12, 17, NULL),
(13, 17, NULL),
(14, 17, NULL),
(15, 17, '60'),
(16, 17, '-20'),
(17, 17, '2'),
(18, 17, 'Camisola'),
(19, 17, 'Blanda'),
(20, 17, '4'),
(21, 17, NULL),
(22, 17, NULL),

(1, 18, NULL),
(2, 18, NULL),
(3, 18, NULL),
(4, 18, NULL),
(5, 18, NULL),
(6, 18, NULL),
(7, 18, NULL),
(8, 18, '18'),
(9, 18, NULL),
(10, 18, '45'),
(11, 18, NULL),
(12, 18, NULL),
(13, 18, NULL),
(14, 18, NULL),
(15, 18, '100'),
(16, 18, '-50'),
(17, 18, '4'),
(18, 18, 'Completa'),
(19, 18, 'Dura'),
(20, 18, '5'),
(21, 18, NULL),
(22, 18, NULL),

(1, 19, NULL),
(2, 19, NULL),
(3, 19, NULL),
(4, 19, NULL),
(5, 19, NULL),
(6, 19, NULL),
(7, 19, NULL),
(8, 19, '12'),
(9, 19, NULL),
(10, 19, '25'),
(11, 19, NULL),
(12, 19, NULL),
(13, 19, NULL),
(14, 19, NULL),
(15, 19, '10'),
(16, 19, '0'),
(17, 19, '1'),
(18, 19, 'Completa'),
(19, 19, 'Blanda'),
(20, 19, '1'),
(21, 19, NULL),
(22, 19, NULL),

(1, 20, NULL),
(2, 20, NULL),
(3, 20, NULL),
(4, 20, NULL),
(5, 20, NULL),
(6, 20, NULL),
(7, 20, NULL),
(8, 20, '20'),
(9, 20, NULL),
(10, 20, '50'),
(11, 20, NULL),
(12, 20, NULL),
(13, 20, NULL),
(14, 20, NULL),
(15, 20, '150'),
(16, 20, '-70'),
(17, 20, '6'),
(18, 20, 'Completa'),
(19, 20, 'Dura'),
(20, 20, '7'),
(21, 20, NULL),
(22, 20, NULL),

(1, 21, NULL),
(2, 21, NULL),
(3, 21, NULL),
(4, 21, NULL),
(5, 21, NULL),
(6, 21, NULL),
(7, 21, NULL),
(8, 21, '12'),
(9, 21, NULL),
(10, 21, '25'),
(11, 21, NULL),
(12, 21, NULL),
(13, 21, NULL),
(14, 21, NULL),
(15, 21, '0'),
(16, 21, '0'),
(17, 21, '0'),
(18, 21, 'Completa'),
(19, 21, 'Blanda'),
(20, 21, '1'),
(21, 21, NULL),
(22, 21, NULL),

(1, 22, NULL),
(2, 22, NULL),
(3, 22, NULL),
(4, 22, NULL),
(5, 22, NULL),
(6, 22, NULL),
(7, 22, NULL),
(8, 22, '13'),
(9, 22, NULL),
(10, 22, '25'),
(11, 22, NULL),
(12, 22, NULL),
(13, 22, NULL),
(14, 22, NULL),
(15, 22, '-10'),
(16, 22, '20'),
(17, 22, '0'),
(18, 22, 'Peto'),
(19, 22, 'Dura'),
(20, 22, '2'),
(21, 22, NULL),
(22, 22, NULL),

(1, 23, NULL),
(2, 23, NULL),
(3, 23, NULL),
(4, 23, NULL),
(5, 23, NULL),
(6, 23, NULL),
(7, 23, NULL),
(8, 23, '14'),
(9, 23, NULL),
(10, 23, '25'),
(11, 23, NULL),
(12, 23, NULL),
(13, 23, NULL),
(14, 23, NULL),
(15, 23, '-10'),
(16, 23, '25'),
(17, 23, '1'),
(18, 23, 'Peto'),
(19, 23, 'Dura'),
(20, 23, '2'),
(21, 23, NULL),
(22, 23, NULL),

(1, 24, NULL),
(2, 24, NULL),
(3, 24, NULL),
(4, 24, NULL),
(5, 24, NULL),
(6, 24, NULL),
(7, 24, NULL),
(8, 24, '13'),
(9, 24, NULL),
(10, 24, '25'),
(11, 24, NULL),
(12, 24, NULL),
(13, 24, NULL),
(14, 24, NULL),
(15, 24, '-10'),
(16, 24, '20'),
(17, 24, '0'),
(18, 24, 'Peto'),
(19, 24, 'Dura'),
(20, 24, '2'),
(21, 24, NULL),
(22, 24, NULL),

(1, 25, NULL),
(2, 25, NULL),
(3, 25, NULL),
(4, 25, NULL),
(5, 25, NULL),
(6, 25, NULL),
(7, 25, NULL),
(8, 25, '17'),
(9, 25, NULL),
(10, 25, '25'),
(11, 25, NULL),
(12, 25, NULL),
(13, 25, NULL),
(14, 25, NULL),
(15, 25, '-25'),
(16, 25, '80'),
(17, 25, '3'),
(18, 25, 'Completa'),
(19, 25, 'Dura'),
(20, 25, '2'),
(21, 25, NULL),
(22, 25, NULL),

(1, 26, NULL),
(2, 26, NULL),
(3, 26, NULL),
(4, 26, NULL),
(5, 26, NULL),
(6, 26, NULL),
(7, 26, NULL),
(8, 26, '10'),
(9, 26, NULL),
(10, 26, '25'),
(11, 26, NULL),
(12, 26, NULL),
(13, 26, NULL),
(14, 26, NULL),
(15, 26, '-5'),
(16, 26, '0'),
(17, 26, '0'),
(18, 26, 'Completa'),
(19, 26, 'Blanda'),
(20, 26, '1'),
(21, 26, NULL),
(22, 26, NULL),

(1, 27, NULL),
(2, 27, NULL),
(3, 27, NULL),
(4, 27, NULL),
(5, 27, NULL),
(6, 27, NULL),
(7, 27, NULL),
(8, 27, '10'),
(9, 27, NULL),
(10, 27, '20'),
(11, 27, NULL),
(12, 27, NULL),
(13, 27, NULL),
(14, 27, NULL),
(15, 27, '-5'),
(16, 27, '0'),
(17, 27, '0'),
(18, 27, 'Completa'),
(19, 27, 'Blanda'),
(20, 27, '1'),
(21, 27, NULL),
(22, 27, NULL),

(1, 28, NULL),
(2, 28, NULL),
(3, 28, NULL),
(4, 28, NULL),
(5, 28, NULL),
(6, 28, NULL),
(7, 28, NULL),
(8, 28, '16'),
(9, 28, NULL),
(10, 28, '30'),
(11, 28, NULL),
(12, 28, NULL),
(13, 28, NULL),
(14, 28, NULL),
(15, 28, '-15'),
(16, 28, '40'),
(17, 28, '1'),
(18, 28, 'Peto'),
(19, 28, 'Dura'),
(20, 28, '4'),
(21, 28, NULL),
(22, 28, NULL),

(1, 29, NULL),
(2, 29, NULL),
(3, 29, NULL),
(4, 29, NULL),
(5, 29, NULL),
(6, 29, NULL),
(7, 29, NULL),
(8, 29, '10'),
(9, 29, NULL),
(10, 29, '25'),
(11, 29, NULL),
(12, 29, NULL),
(13, 29, NULL),
(14, 29, NULL),
(15, 29, '-10'),
(16, 29, '10'),
(17, 29, '0'),
(18, 29, 'Camisola'),
(19, 29, 'Blanda'),
(20, 29, '2'),
(21, 29, NULL),
(22, 29, NULL),

(1, 30, NULL),
(2, 30, NULL),
(3, 30, NULL),
(4, 30, NULL),
(5, 30, NULL),
(6, 30, NULL),
(7, 30, NULL),
(8, 30, '15'),
(9, 30, NULL),
(10, 30, '30'),
(11, 30, NULL),
(12, 30, NULL),
(13, 30, NULL),
(14, 30, NULL),
(15, 30, '-20'),
(16, 30, '50'),
(17, 30, '2'),
(18, 30, 'Completa'),
(19, 30, 'Dura'),
(20, 30, '4'),
(21, 30, NULL),
(22, 30, NULL),

(1, 31, NULL),
(2, 31, NULL),
(3, 31, NULL),
(4, 31, NULL),
(5, 31, NULL),
(6, 31, NULL),
(7, 31, NULL),
(8, 31, '17'),
(9, 31, NULL),
(10, 31, '35'),
(11, 31, NULL),
(12, 31, NULL),
(13, 31, NULL),
(14, 31, NULL),
(15, 31, '-35'),
(16, 31, '90'),
(17, 31, '4'),
(18, 31, 'Completa'),
(19, 31, 'Dura'),
(20, 31, '5'),
(21, 31, NULL),
(22, 31, NULL),

(1, 32, NULL),
(2, 32, NULL),
(3, 32, NULL),
(4, 32, NULL),
(5, 32, NULL),
(6, 32, NULL),
(7, 32, NULL),
(8, 32, '16'),
(9, 32, NULL),
(10, 32, '35'),
(11, 32, NULL),
(12, 32, NULL),
(13, 32, NULL),
(14, 32, NULL),
(15, 32, '-20'),
(16, 32, '70'),
(17, 32, '3'),
(18, 32, 'Completa'),
(19, 32, 'Dura'),
(20, 32, '4'),
(21, 32, NULL),
(22, 32, NULL);











