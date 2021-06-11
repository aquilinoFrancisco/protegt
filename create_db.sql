drop database if exists alumno;

create database alumno;

use alumno;

drop table alumnos;

create table alumnos(
	alumnoID int not null  auto_increment,
	alumno varchar(500) not null,
	fecha_creacion date not null,
);


INSERT INTO comentarios (comentario, fecha_creacion,videoID)
VALUES ('Aquilino', '2021-06-11',1);

grant select, insert, update, delete
on alumno.*
to alumno@localhost identified by "root@localhost";
