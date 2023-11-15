create database estagiosPIT;	

use estagiosPIT;



create table cadastroUsuario
(
id int unsigned not null auto_increment,
cpf varchar(14) not null,
nome varchar(70) not null,
email varchar(45) not null,
dataNascimento date not null,
senha varchar(50) not null,
primary key(id)
);

create table cadastroEmpresa
(
id int unsigned not null auto_increment,
cnpj varchar(20) not null,
nome varchar(70) not null,
ende varchar(70) not null,
cep int not null,
senha varchar(50) not null,
tel int not null,
cidade varchar(25) not null,
estado varchar(2) not null,
primary key(id)
);


create table cadastroEstagio
(
id int not null auto_increment,
nome varchar(100) not null,
localizacao varchar(300) not null,
contato varchar(20) not null,
bolsa DECIMAL(6, 2) not null,
cargaHoraria int not null,
conhecimento varchar(200) not null,
informaçõesExtras varchar(300) not null,
empresa_fk int unsigned not null,
primary key(id),
foreign key (empresa_fk) references cadastroEmpresa(id)
);
SELECT * FROM cadastroEstagio where id=1;

/*TODOS OS SELECTS DE CADA TABELA*/
select * from cadastroEmpresa;
select * from cadastroUsuario;
select * from cadastroEstagio;
SELECT * FROM cadastroEstagio where bolsa between 20 and 2000;
SELECT * from cadastroEstagio where localizacao = 'BELO HORIZONTE' and bolsa between -999999999 and 999999999;
SELECT * FROM cadastroEstagio where bolsa between 0 and 500;
SELECT distinct(localizacao) FROM cadastroEstagio;
/*TODOS OS DROPS DAS TABELAS*/
drop table cadastroUsuario;
drop table cadastroEmpresa;
drop table cadastroEstagio;
*/
/*TODOS OS DELETES DE CADA TABELA
delete from cadastroEmpresa where id!=0;
delete from cadastroUsuario where id!=0;
*/
