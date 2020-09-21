create database dbrevisao;
use dbrevisao;

create table tbpaciente(
idpaciente int primary key auto_increment,
nome varchar(50) not null,
email  varchar (100) not null unique,
sexo varchar(2) not null,
usuario varchar (20) not null unique,
senha varchar (200) not null
)engine InnoDB;

insert into tbpaciente (nome,email,sexo,usuario,senha)
values ('Mario Bros','mario@gmail.com','M','mario',md5('123'));

insert into tbpaciente (nome,email,sexo,usuario,senha)
values ('Ben10','ben10@ig.com','M','ben',md5('123'));

select * from tbpaciente;