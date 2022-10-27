drop database BDAdministracao;
create database BDAdministracao;
use BDAdministracao;

create table Usuario(
    codUsuario int auto_increment unique not null,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(14) not null,
    matricula varchar(11),
    telefone varchar(15) not null,
    constraint usuario_pk primary key(codUsuario)
);
create table Administrador(
    codAdministrador int auto_increment unique not null,
    codUsuario int unique not null,
    constraint administrador_pk primary key(codAdministrador, codUsuario),
    constraint usuario_fk_administrador foreign key(codUsuario)references Usuario(codUsuario)
);
create table Professor(
    codProfessor int auto_increment not null unique,
    codUsuario int unique not null,
    constraint professor_pk primary key(codProfessor),
    constraint usuario_fk_professor foreign key(codUsuario) references Usuario(codUsuario)
);
create table Curso(
    codCurso int auto_increment not null unique,
    nome varchar(20) unique not null,
    sigla char(2),
    constraint curso_pk primary key(codCurso)
);
create table Turma(
    codTurma int auto_increment unique not null,
    ano int not null,
    nome varchar(10) not null,
    quantidadeAluno int not null,
    curso int not null,
    constraint turma_pk primary key(codTurma),
    constraint curso_fk_turma foreign key(curso) references Curso(codCurso)
);
create table Laboratorio(
	codLaboratorio int auto_increment not null unique,
	sigla varchar(10) not null unique
);
create table Aula(
  codAula int auto_increment unique not null,
  horario time not null,
	laboratorio int not null,
  turma int not null,
  quantAlunos int not null,
  dataAula date not null,
  constraint aula_pk primary key(codAula),
  constraint turma_fk_aula foreign key(turma) references Turma(codTurma),
	constraint laboratorio_fk_aula foreign key(laboratorio) references Laboratorio(codLaboratorio)
);
create table Categoria(
    codCategoria int auto_increment not null unique,
    nome varchar(50) unique not null,
    constraint categoria_pk primary key(codCategoria)
);
create table Material(
    codMaterial int auto_increment not null unique,
    nome varchar(30) not null unique,
    quantidade decimal(6,2),
    categoria int not null,
    constraint categoria_fk_material foreign key(categoria) references Categoria(codCategoria),
    constraint material_pk primary key(codMaterial)
);
create table MateriaisAula(
    codMaterial int not null,
    codAula int not null,
    quantidadeUtilizada int not null,
    constraint materialaula_pk primary key(codMaterial, codAula),
    constraint materialaula_fk_material foreign key(codMaterial) references Material(codMaterial),
    constraint materialaula_fk_aula foreign key(codAula) references Aula(codAula)
);
create table Alimento(
    codAlimento int auto_increment not null unique,
    codMaterial int not null,
    unidade varchar(5) not null,
    constraint alimento_pk primary key(codAlimento, codMaterial),
    constraint material_fk_alimento foreign key(codMaterial) references Material(codMaterial)
);

create user administrador@localhost;
grant all on BDAdministracao.* to administrador@localhost;
set password for 'administrador'@'localhost' = 's3nh@doADM';