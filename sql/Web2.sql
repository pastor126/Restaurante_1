create table tipo(
	codigo serial not null primary key,
	nome varchar(50) not null
	);
	
create table chefe(
	codigo serial not null primary key,
	nome varchar(50) not null,
	cpf char (11) not null unique,
	salario numeric (10,2),
	data_nascimento date,
	data_cadastro timestamp default current_timestamp
	);

create table cozinha(
	codigo serial not null primary key,
	nome varchar(50) not null,
	local varchar(50) not null
	);
	
create table prato(
	codigo serial not null primary key,
	nome varchar(50) not null,
	img text,
	preco numeric (10,2),
	custo numeric (10,2),
	data_criacao date default current_date,
	codigo_tipo int references tipo(codigo),
	codigo_chefe int references chefe(codigo), 
	codigo_cozinha int references cozinha(codigo)
	);


insert into tipo(nome)
values('Sobremesa');
insert into tipo(nome)
values('Carnes');
insert into tipo(nome)
values('Peixe');
insert into tipo(nome)
values('Entrada');
insert into tipo(nome)
values('Frango');
insert into tipo(nome)
values('Sopas');

insert into chefe(nome, cpf, salario, data_nascimento, data_cadastro)
values('Eduardo','88899933755',20000,'1968-10-03','2015-03-12');
insert into chefe(nome, cpf, salario, data_nascimento, data_cadastro)
values('Amanda','87777977755',15000,'2000-12-03','2019-03-12');
insert into chefe(nome, cpf, salario, data_nascimento, data_cadastro)
values('Luis','33377977222',12000,'2002-04-03','2020-03-12');
insert into chefe(nome, cpf, salario, data_nascimento, data_cadastro)
values('Duilio','31117977222',12000,'2000-04-03','2022-03-12');


insert into cozinha(nome, local)
values('CG_Cozinha','Campo Grande');
insert into cozinha(nome, local)
values('AQ_Cozinha','Aquidauana');
insert into cozinha(nome, local)
values('DO_Cozinha','Dourados');


insert into prato(nome, img,preco, custo, data_criacao, codigo_tipo, codigo_chefe, codigo_cozinha)
values('Bolo de chocolate', 'https://s2.glbimg.com/_9Gs4YecKE8AA5E7WEP9tGFXwxI=/1200x/smart/filters:cover():strip_icc()/i.s3.glbimg.com/v1/AUTH_1f540e0b94d8437dbbc39d567a1dee68/internal_photos/bs/2022/9/Z/gh0wHHQ7iE4SeEPcATQA/bolo-de-chocolate-fofinho-receita-2.jpg',
	   150,100, current_date,1,2,1);
insert into prato(nome, img,preco, custo, data_criacao, codigo_tipo, codigo_chefe, codigo_cozinha)
values('Moqueca de peixe', 'https://www.receitasnestle.com.br/sites/default/files/srh_recipes/9ae6e28383dc732ba697d21aaa71edbf.jpg',
	   250,160, current_date,3,1,3);
insert into prato(nome, img,preco, custo, data_criacao, codigo_tipo, codigo_chefe, codigo_cozinha)
values('Bolo de Abacaxi', 'https://assets.delirec.com/images%2FFuq3Dmz8kUdHkdb3fPLxiWllKsn2%2Frecipe%2Fde0b61a4-8876-4e5d-a638-3f58b64ffc76-Bolo-de-abacaxi-gallery-0',
	   150,100, current_date,1,2,1);
insert into prato(nome, img,preco, custo, data_criacao, codigo_tipo, codigo_chefe, codigo_cozinha)
values('Creme de Abacaxi', 'https://i.ytimg.com/vi/fBcxmXbAXtc/maxresdefault.jpg',
	   220,100, '2018-02-23',1,2,1);
insert into prato(nome, img,preco, custo, data_criacao, codigo_tipo, codigo_chefe, codigo_cozinha)
values('Mousse de Abacaxi', 'https://img.itdg.com.br/tdg/images/recipes/000/004/364/58357/58357_original.jpg?mode=crop&width=710&height=400',
	   210,100, '2017-02-23',1,1,2);
insert into prato(nome, img,preco, custo, data_criacao, codigo_tipo, codigo_chefe, codigo_cozinha)
values('Tábua de Frios', 'https://img.itdg.com.br/tdg/images/recipes/000/165/220/132713/132713_original.jpg?mode=crop&width=710&height=400',
	   100,100, '2017-02-23',4,4,2);

select * from prato
select * from tipo


