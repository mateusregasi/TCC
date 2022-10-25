insert into Curso values (default, 'Agropecuária', 'TA'), (default, 'Meio Ambiente', 'MA'), (default, 'Informática', 'TI'), (default, 'Agroindústria', 'AI');

insert into Turma values (default, 2022, 'TA101', 30, 1), (default, 2022, 'TA102', 30, 1), (default, 2022, 'MA103', 30, 2), (default, 2022, 'MA104', 30, 2), (default, 2022, 'TI105', 30, 3), (default, 2022, 'AI107', 30, 4), (default, 2022, 'TA201', 30, 1), (default, 2022, 'TA202', 30, 1), (default, 2022, 'MA203', 30, 2), (default, 2022, 'MA204', 30, 2), (default, 2022, 'TI205', 30, 3), (default, 2022, 'AI207', 30, 4), (default, 2022, 'TA301', 30, 1), (default, 2022, 'TA302', 30, 1), (default, 2022, 'MA303', 30, 2), (default, 2022, 'MA304', 30, 2), (default, 2022, 'TI305', 30, 3), (default, 2022, 'AI306', 30, 4), (default, 2022, 'AI307', 30, 4);

insert into Laboratorio values (default, "Lab1"), (default, "Lab2"), (default, "Lab3"); 

insert into Usuario values (default, "Usuario 1", "usuario1@gmail.com", "usuario123", "21 9999-99990"), (default, "Usuario 2", "usuario2@gmail.com", "usuario123", "21 9999-99990"), (default, "Usuario 3", "usuario3@gmail.com", "usuario123", "21 9999-99990"), (default, "Usuario 4", "usuario4@gmail.com", "usuario123", "21 9999-99990");

insert into Administrador values (default, 1), (default, 2);

insert into Professor values (default, 3), (default, 4);

insert into Categoria values (default, "Ferramenta"), (default, "Vegetal"), (default, "Derivado Animal"), (default, "Carne"); 

insert into Material values (default, "Ovo", 50, 3), (default, "Faca", 50, 1), (default, "Carne de Coelho", 50, 4), (default, "Couve", 50, 2);

insert into Alimento values (default, 1, "uni"), (default, 3, "kg"), (default, 4, "kg");

insert into Aula values (default, "07:00:00", "08:30:00", 1, 1, 30, "2022-09-23"), (default, "08:30:00", "09:00:00", 1, 2, 30, "2022-09-23"), (default, "09:20:00", "10:50:00", 1, 3, 30, "2022-09-23");

insert into MaterialAula values (1, 1, 10), (2, 1, 30), (3, 1, 10);