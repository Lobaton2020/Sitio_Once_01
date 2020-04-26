create database Recuerdo_1101;
use Recuerdo_1101;
-- rol del usuario
-- 1 es usuario
-- 2 es admin
create table Usuario (
id_usuario_PK int not null auto_increment,
nombre_usuario varchar (100) not null,
apellido_usuario varchar (100) not null,
correo_usuario  varchar (100) not null,
clave_usuario varchar (150) not null,
estado_usuario boolean not null,
rol_usuario int not null,
fecha_creacion_usuario datetime not null,
primary key(id_usuario_PK)
);
 create table Registro_Login(
 id_registro_login int not nulL auto_increment,
 id_usuario_FK int not null,
 fecha date not null,
 hora  time not null,
 primary key(id_registro_login),
 foreign key (id_usuario_FK) references Usuario(id_usuario_PK)
 );
 
create table Imagen (
id_imagen_PK int not null auto_increment,
id_usuario_FK int not null,
ruta_imagen varchar(200) not null,
titulo_imagen varchar (100)null,
descripcion_imagen varchar (200)null,
estado_imagen boolean not null,
fecha_insercion_imagen datetime not null,
primary key (id_imagen_PK),
foreign key (id_usuario_FK) references Usuario (id_usuario_PK)
);

create table Comentario(
id_comentario_PK int not null auto_increment,
id_usuario_FK INT not null,
descripcion_comentario mediumtext not null,
primary key (id_comentario_PK),
foreign key (id_usuario_FK) references Usuario (id_usuario_PK)
);
create view Listado_Imagenes as
select u.nombre_usuario,u.apellido_usuario,i.id_imagen_PK,i.id_usuario_FK,i.ruta_imagen,i.titulo_imagen,i.descripcion_imagen,i.fecha_insercion_imagen
      from Imagen as i inner join Usuario as u on i.id_usuario_FK = u.id_usuario_PK
      where estado_imagen = 1 order by id_imagen_PK desc ; 

create view Historial_Registro_Login as
select rl.id_registro_login,u.nombre_usuario,u.apellido_usuario,rl.fecha,rl.hora 
from Registro_Login as rl inner join Usuario as u on u.id_usuario_PK = rl.id_usuario_FK order by rl.id_registro_login desc;
