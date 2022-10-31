DROP DATABASE IF EXISTS base;

CREATE DATABASE base;

USE base;

CREATE TABLE administradores(
	idAdmin smallint unsigned auto_increment not null,
	nombreAdmin VARCHAR(50) not null unique,
	email VARCHAR(50) not null unique,
	password VARCHAR(255) not null,
	primary key(idAdmin)
);

CREATE TABLE suscriptores(
	idSuscriptor smallint unsigned auto_increment not null,
	nombreSuscriptor VARCHAR(50) not null unique,
	email VARCHAR(50) not null unique,
	password VARCHAR(255) not null,
	documento VARCHAR(50) not null,
	nombre VARCHAR(50) not null,
	apellidos VARCHAR(50) not null,
	telefono VARCHAR(11) not null,
	metodoPago ENUM('mercadoPago', 'tarjeta', 'paypal'),
	fechaAlta DATETIME,
	primary key(idSuscriptor)
);

CREATE TABLE banners(
	idBanner smallint unsigned auto_increment not null,
	src VARCHAR(255) not null,
	publicado BOOLEAN,
	primary key(idBanner)
);

CREATE TABLE gestiona(
	idAdmin smallint unsigned not null,
	idBanner smallint unsigned not null,
	primary key(idAdmin, idBanner),
	foreign key(idAdmin) references administradores(idAdmin),
	foreign key(idBanner) references banners(idBanner)
);

CREATE TABLE deportes(
	idDeporte smallint unsigned auto_increment not null,
	nombreDeporte VARCHAR(50)not null unique,
	tipoDeporte ENUM('porPuntos', 'porTiempo', 'porSets'),
	primary key(idDeporte)
);

CREATE TABLE eventos(
	idEvento smallint unsigned auto_increment not null,
	fechaHora DATETIME not null,
	resultado VARCHAR(10) not null,
	idDeporte smallint unsigned not null,
	infracciones VARCHAR(100) not null,
	ubicacion VARCHAR(100) not null,
	primary key(idEvento),
	foreign key(idDeporte) references deportes(idDeporte)
);

CREATE TABLE deporteFavorito(
	idSuscriptor smallint unsigned not null,
	idDeporte smallint unsigned not null,
	primary key(idSuscriptor),
	foreign key(idSuscriptor) references suscriptores(idSuscriptor),
	foreign key(idDeporte) references deportes(idDeporte)
);

CREATE TABLE suscripcionEvento(
	idSuscriptor smallint unsigned not null,
	idEvento smallint unsigned not null,
	fechaAlta DATE not null,
	fechaBaja DATE not null,
	primary key(idSuscriptor, idEvento),
	foreign key(idSuscriptor) references suscriptores(idSuscriptor),
	foreign key(idEvento) references eventos(idEvento)
);

CREATE TABLE deportistas(
	idDeportista smallint unsigned auto_increment not null,
	nombreDeportista VARCHAR(50) not null,
	apellidos VARCHAR(50) not null,
	paisDeportista VARCHAR(50) not null,
	primary key(idDeportista)
);

CREATE TABLE equipos(
	idEquipo smallint unsigned auto_increment not null,
	nombreEquipo VARCHAR(50) not null,
	paisEquipo VARCHAR(50) not null,
	dt VARCHAR(50) not null,
	primary key(idEquipo)
);

CREATE TABLE deportistaDeporte(
	idDeportista smallint unsigned not null,
	idDeporte smallint unsigned not null,
	primary key(idDeportista, idDeporte),
	foreign key(idDeportista) references deportistas(idDeportista),
	foreign key(idDeporte) references deportes(idDeporte)
);

CREATE TABLE deportistaEvento(
	idDeportista smallint unsigned not null,
	idEvento smallint unsigned not null,
	primary key(idDeportista, idEvento),
	foreign key(idDeportista) references deportistas(idDeportista),
	foreign key(idEvento) references eventos(idEvento)
);

CREATE TABLE equipoLocatarioEvento(
	idEvento smallint unsigned not null,
	idEquipo smallint unsigned not null,
	primary key(idEvento),
	foreign key(idEvento) references eventos(idEvento),
	foreign key(idEquipo) references equipos(idEquipo)
);

CREATE TABLE equipoVisitanteEvento(
	idEvento smallint unsigned not null,
	idEquipo smallint unsigned not null,
	primary key(idEvento),
	foreign key(idEvento) references eventos(idEvento),
	foreign key(idEquipo) references equipos(idEquipo)
);

CREATE TABLE deportistaEquipo(
	idDeportista smallint unsigned not null,
	idEquipo smallint unsigned not null,
	rol VARCHAR(10) not null,
	primary key(idDeportista, idEquipo),
	foreign key(idDeportista) references deportistas(idDeportista),
	foreign key(idEquipo) references equipos(idEquipo)
);

CREATE TABLE competiciones(
	idCompeticion smallint unsigned auto_increment not null,
	nombreCompeticion VARCHAR(50) not null,
	paisCompeticion VARCHAR(50) not null,
	anio DATE,
	primary key (idCompeticion)
);

CREATE TABLE eventoCompeticion(
	idCompeticion smallint unsigned not null,
	idEvento smallint unsigned not null,
	fechaInicio DATE,
	fechaFin DATE,
	primary key (idCompeticion, idEvento),
	foreign key (idCompeticion) references competiciones(idCompeticion),
	foreign key (idEvento) references eventos(idEvento)
);

CREATE TABLE deportistaCompeticion(
	idDeportista smallint unsigned not null,
	idCompeticion smallint unsigned not null,
	primary key(idDeportista, idCompeticion),
	foreign key(idDeportista) references deportistas(idDeportista),
	foreign key(idCompeticion) references competiciones(idCompeticion)
);


INSERT into administradores
	(nombreAdmin, email, password)
	VALUES
	('admin', 'e@mail', '$2a$12$Jzo7dMRXPmVrblHeUAm79eFpQSc1Vwcg6Gh3zmo/I3EGe3LEU/2fC')
;

INSERT into suscriptores
	(nombreSuscriptor, email, password, documento,
	nombre, apellidos, telefono, metodoPago, fechaAlta)
	VALUES
	('usuario',
	'e@mail',
	'$2a$12$Jzo7dMRXPmVrblHeUAm79eFpQSc1Vwcg6Gh3zmo/I3EGe3LEU/2fC', 
	'41234560',
	'Pablo',
	'Cohelo',
	'098375895',
	'mercadoPago',
	'2020-01-01 10:10:10'
);

INSERT into deportistas
	(nombreDeportista, apellidos, paisDeportista)
	VALUES
	('Edinson',
	'Cavanni',
	'Uruguay'
);


INSERT into equipos
	(nombreEquipo, paisEquipo, dt)
	VALUES
	('Basañez',
	'Uruguay', 
	'Oreja Martinez'
);

INSERT INTO deportes
    (nombreDeporte, tipoDeporte)
    VALUES
    ('futbol',
    'porPuntos'
    );

INSERT INTO eventos
    (fechaHora, resultado, idDeporte, infracciones, ubicacion)
    VALUES
    ('2022-10-24 20:00:00',
    '2-0',
	'1',
    '1rojas, 2amarilla',
    'estadio Centenariio' 
    );

INSERT INTO eventos
    (fechaHora, resultado, idDeporte, infracciones, ubicacion)
    VALUES
    ('2022-10-28 21:30:00',
    '3-5',
	'1',
    '5amarilla',
    'estadio GPC' 
    );

INSERT INTO eventos
    (fechaHora, resultado, idDeporte, infracciones, ubicacion)
    VALUES
    ('2022-11-28 22:00:00',
    '',
	'',
    '',
    'estadio GPC' 
    );

INSERT into competiciones
	(nombreCompeticion, paisCompeticion, anio)
	VALUES
	('LigaUruguay',
	'Uruguay',
	'2020-01-01'
);

INSERT into deportistaEquipo
	(idDeportista, idEquipo, rol)
	VALUES 
	((SELECT max(idDeportista) AS idDeportista FROM deportistas), 
	(SELECT max(idEquipo) AS idEquipo FROM equipos),
	'volante');

INSERT into deportistaCompeticion
	(idDeportista, idCompeticion)
	VALUES 
	((SELECT max(idDeportista) AS idDeportista FROM deportistas), 
	(SELECT max(idCompeticion) AS idCompeticion FROM competiciones)
	);

	INSERT INTO eventos
	(fechaHora, resultado,infracciones, ubicacion)
	VALUES
	(2022-10-24 20:00:00,
	'2-0',
	'1rojas,2amarilla',
	'estadio Centenario' 
	);