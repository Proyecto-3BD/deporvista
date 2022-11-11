DROP DATABASE IF EXISTS base;

CREATE DATABASE base;

CREATE USER 'amdin'@'localhost' IDENTIFIED BY '5678';
GRANT ALL PRIVILEGES  ON base.*  TO 'admin'@'localhost';
CREATE USER 'user'@'localhost' IDENTIFIED BY '8910';
GRANT SELECT, INSERT, UPDATE, DELETE ON base.*  TO 'user'@'localhost';
FLUSH PRIVILEGES;

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
	primary key(idSuscriptor, idDeporte),
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
	anio YEAR,
	primary key (idCompeticion)
);

CREATE TABLE eventoCompeticion(
	idCompeticion smallint unsigned not null,
	idEvento smallint unsigned not null,
	primary key (idCompeticion, idEvento),
	foreign key (idCompeticion) references competiciones(idCompeticion),
	foreign key (idEvento) references eventos(idEvento)
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
), ('Luis',
	'Suarez',
	'Uruguay'
), ('Kevin',
	'Dawson',
	'Uruguay'
);



INSERT into equipos
	(nombreEquipo, paisEquipo, dt)
	VALUES
	('Basañez',
	'Uruguay', 
	'Oreja Martinez'
	),
	('Nacional',
	'Uruguay', 
	'Pablo Repetto'
	),
	('Penarol',
	'Uruguay', 
	'Gregory Perez'
	),
	('Los Angeles Lakers',
	'Estados Unidos', 
	'Darvin Ham'
	),
	('Golden State Warriors',
	'Estados Unidos', 
	'Steve Kerr'
	),
	('Barcelona',
	'España', 
	'Xavi'
	), ('Real Madrid',
	'España', 
	'Ancelotti'
	),
	('Federer',
	'Suiza', 
	'-'
	),
	('Nadal',
	'España', 
	'-'
	),
	('Villarreal', 
	'España', 
	'Quique Setién'), 
	('Athletic Club', 
	'España', 
	'Ernesto Valverde'), 
	('Club Atlético de Madrid',
'España',  
'Diego Simeone'), 
('Sevilla', 
'España', 
'Jorge Sampaoli'), 
('Arsenal', 
'Inglaterra', 
'Mikel Arteta'), 
('Liverpool', 
'Inglaterra', 
'Jürgen Klopp'), 
('Chelsea', 
'Inglaterra', 
'Graham Potter'), 
('Manchester United', 
'Inglaterra', 
'Erik ten Hag'), 
('Newcastle United', 
'Inglaterra', 'Eddie Howe'), 
('Brentford', 
'Inglaterra', 
'Thomas Frank'), 
('Leicester City', 
'Inglaterra', 
'Brendan Rodgers'), 
('Defensor Sporting', 
'Uruguay', 
'Marcelo Méndez'), 
('Albion', 
'Uruguay', 
'Ignacio Risso'), 
('Danubio', 
'Uruguay', 
'Jorge Fossati'), 
('Fenix', 
'Uruguay', 
'Juan Ramón Carrasco'), 
('Rentistas', 
'Uruguay', 
'Rodolfo Neme'), 
('Rampla Jr', 
'Uruguay', 
'Marcelo Suárez'), 
('Torque', 
'Uruguay', 
'Lucas Nardi'), 
('Progreso', 
'Uruguay', 
'Álvaro Fuerte'), 
('Platense', 
'Argentina', 
'Omar De Felippe'), 
('Racing', 
'Argentina', 
'Fernando Gago'), 
('Boca Jr', 
'Argentina', 
'Hugo Ibarra'), 
('Rosario Central', 
'Argentina', 
'Leandro Somoza'), 
('Velez', 
'Argentina', 
'Alexander Medina'), 
('Lanus', 
'Argentina', 
'Jorge Almiron'), 
('River Plate', 
'Argentina', 
'Marcelo Gallardo'), 
('Newells', 
'Argentina', 
'Gerardo Martinez'), 
('Juventus', 
'Italia', 
'Massimiliano Allegri'), 
('Napoli', 
'Italia', 
'Luciano Spalletti'), 
('Inter', 
'Italia', 
'Simone Inzaghi'), 
('Rangers', 'Italia', 
'Giovanni van Bronckhorst'), 
('Empoli', 
'Italia', 
'Paolo Zanetti'), 
('Torino', 'Italia', 
'Ivan Jurić'), 
('Roma', 
'Italia', 
'José Mourinho'), 
('Lazio', 
'Italia', 
'Maurizio Sarri'), 
('Spezia', 
'Italia', 
'Luca Gotti'), 
('Bucks', 
'Estados Unidos', 
'Mike Budenholzer'), 
('Cavaliers', 
'Estados Unidos', 
'J. B. Bickerstaff'), 
('Celtics', 
'Estados Unidos', 
'Joe Mazzulla'), 
('Hawks', 
'Estados Unidos', 
'Nate McMillan'), 
('Hornets', 
'Estados Unidos', 
'Steve Clifford'), 
('Bulls', 
'Estados Unidos', 
'Billy Donovan'), 
('Knicks', 
'Estados Unidos', 
'Tom Thibodeau'), 
('Pistons', 
'Estados Unidos', 
'Dawne Casey'), 
('Raptors', 
'Canada', 
'Nick Nurse'), 
('Nets', 
'Estados Unidos', 
'Ime Udoka'), 
('76ers', 
'Estados Unidos', 
'Doc Rivers'), 
('Nuggets', 
'Estados Unidos', 
'Michael Malone'), 
('Suns', 
'Estados Unidos', 
'Monty Williams'), 
('Kings', 
'Estados Unidos', 
'Mike Brown'), 
('Pelicans', 
'Estados Unidos', 
'Willie Green'), 
('Grizzlies', 
'Estados Unidos', 
'Taylor Jenkins'), 
('Jazz', 
'Estados Unidos', 
'Will Hardy'), 
('Spurs', 
'Estados Unidos', 
'Gregg Popvich'), 
('Thunder', 
'Estados Unidos', 
'Mark Daigneault'), 
('Timberwolves', 
'Estados Unidos', 
'Chris Finch'), 
('Rockets', 
'Estados Unidos', 
'Stephen Silas'), 
('Clippers', 
'Estados Unidos', 
'Tyronn Lue'), 
('Mavericks', 
'Estados Unidos', 
'Jason Kidd'), 
('Goes', 
'Uruguay', 
'Guillermo Narvarte'), 
('Aguada', 
'Uruguay', 
'Leandro Ramella'), 
('Hebraica y Macabi', 
'Uruguay', 
'Daniel Lovera'), 
('Malvin', 
'Uruguay', 
'Pablo López'),
 ('Bigua', 
'Uruguay', 
'Diego Cal'),
('Olimpia', 
'Uruguay', 
'Gerardo Jauri'), 
('Trouville', 
'Uruguay',
'Marcelo Signorelli'), 
('Casper Ruud',
'Noruega',
'-'),  
('Carlos Alcaraz',
'España',
'-'), 
('Karen Jachanov',
'Rusia',
'-'), 
('Matteo Berrettini',
'Italia',
'-'),
('Frances Tiafoe',
'Estados Unidos',
'-'),
('Nick Kyrgios',
'Australia',
'-')
;


INSERT into competiciones
	(nombreCompeticion, paisCompeticion, anio)
	VALUES
	('Primera division de Uruguay',
	'Uruguay',
	'2020'
	), ('Premier League',
	'Inglaterra',
	'2020'
	), ('LaLiga',
	'España',
	'2020'
	), ('Primera division de Argentina',
	'Argentina',
	'2020'
	), ('LUB',
	'Uruguay',
	'2020'
	), ('NBA Este',
	'Estados Unidos',
	'2020'
	), ('NBA Oeste',
	'Estados Unidos',
	'2020'
	), ('Serie A',
	'Italia',
	'2020'
	), ('US Open',
	'Estados Unidos',
	'2020'
	), ('Wimbledon',
	'Inglaterra',
	'2020'
	), ('Roland-Garros',
	'Francia',
	'2020'
	), ('Austarlian Open',
	'Australia',
	'2020'
	);


INSERT INTO deportes
    (nombreDeporte, tipoDeporte)
    VALUES
    ('futbol',
    'porPuntos'
    ), ('basketball',
    'porPuntos'
    ), ('tenis',
    'porPuntos'
    ), ('rugby',
    'porPuntos'
    ), ('golf',
    'porPuntos'
    ), ('hockey',
    'porPuntos'
    ), ('cricket',
    'porPuntos'
);


insert into deporteFavorito(idSuscriptor, idDeporte) values(1,1);
insert into deporteFavorito(idSuscriptor, idDeporte) values(1,2);
insert into deporteFavorito(idSuscriptor, idDeporte) values(1,3);

INSERT INTO eventos
    (fechaHora, resultado, idDeporte, infracciones, ubicacion)
    VALUES
    ('2022-10-24 20:00:00',
    '2-0',
	'1',
    '1rojas, 2amarilla',
    'Estadio Centenario' 
    ), 
	('2022-10-28 21:30:00',
    '3-5',
	'1',
    '5amarilla',
    'Estadio GPC' 
    ), 
	('2022-11-24 22:00:00',
    '0-0',
	'1',
    '0',
    'La Bombonera' 
	), 
	('2022-11-02 18:00:00',
    '1-2',
	'1',
    '2amarilla',
    'Campeón Del Siglo' 
	), 
	('2022-11-03 07:00:00',
    '4-2',
	'1',
    '3amarilla',
    'Estadio GPC' 
	), 
	('2022-12-03 11:00:00',
    '0-0',
	'1',
    '0',
    'La Bombonera' 
	), 
	('2022-12-13 12:00:00',
    '0-0',
	'1',
    '0',
    'Estadio Centenario' 
	), 
	('2022-11-02 12:00:00',
    '0-0',
	'2',
    '0',
    'Staples Center' 
), 
	('2022-11-07 23:00:00',
    '0-0',
	'1',
    '0',
    'Estadio de la Cerámica' 
), 
	('2022-11-07 23:15:00',
    '0-0',
	'1',
    '0',
    'Old Trafford' 
), 
	('2022-11-07 22:15:00',
    '0-0',
	'1',
    '0',
    'Monumental' 
), 
	('2022-11-07 21:15:00',
    '0-0',
	'2',
    '0',
    'Rocket Mortgage FieldHouse' 
), 
	('2022-11-07 21:15:00',
    '0-0',
	'2',
    '0',
    'Trouville Cancha' 
), 
	('2022-11-07 21:15:00',
    '0-0',
	'1',
    '0',
    'Estadio Juventus' 
), 
	('2022-11-07 22:15:00',
    '0-0',
	'3',
    '0',
    'US Open' 
), 
	('2022-11-07 22:15:00',
    '0-0',
	'3',
    '0',
    'Wimbledon' 
), 
	('2022-11-07 22:15:00',
    '0-0',
	'3',
    '0',
    'Roland-Garros' 
), 
	('2022-11-07 22:15:00',
    '0-0',
	'3',
    '0',
    'Austarlian Open' 
);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (1, 1);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (1, 2);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (2, 2);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (2, 3);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (3, 1);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (3, 3);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (4, 1);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (4, 3);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (5, 2);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (5, 3);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (6, 2);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (6, 1);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (7, 3);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (7, 2);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (8, 4);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (8, 5);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (9, 10);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (9, 11);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (10, 17);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (10, 18);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (11, 35);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (11, 34);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (12, 47);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (12, 48);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (13, 75);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (13, 70);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (14, 37);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (14, 39);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (15, 76);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (15, 77);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (16, 79);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (16, 80);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (17, 79);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (17, 76);

insert into equipoLocatarioEvento(idEvento, idEquipo) values (18, 77);
insert into equipoVisitanteEvento(idEvento, idEquipo) values (18, 78);

INSERT into deportistaEvento
	(idDeportista, idEvento)
	VALUES
	('1',
	'2'
	),
	('2',
	'2'
	),
	('3',
	'2'
);

INSERT into deportistaEquipo
	(idDeportista, idEquipo, rol)
	VALUES
	('1',
	'2',
	'-'
), ('2',
	'2',
	'-'
), ('3',
	'3',
	'-'
);

insert into eventoCompeticion
	(idCompeticion, idEvento)
	values
	('1', '1'),
	('1', '2'),
	('1', '3'),
	('1', '4'),
	('1', '5'),
	('1', '6'),
	('1', '7'),
	('7', '8'),
	('3', '9'),
	('2', '10'),
	('4', '11'),
	('6', '12'),
	('5', '13'),
	('8', '14'),
	('9', '15'),
	('10', '16'),
	('11', '17'),
	('12', '18');

INSERT into deportistaEquipo
	(idDeportista, idEquipo, rol)
	VALUES 
	('1', '1', 'volante');
