-- Tabla Carrera
CREATE TABLE Carrera (
    idCarrera INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla Profesor
CREATE TABLE Profesor (
    idProfesor INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    contraseña VARCHAR(100) NOT NULL
);

-- Tabla Alumnos
CREATE TABLE Alumnos (
    idAlumno INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    contraseña VARCHAR(100) NOT NULL
);

-- Tabla Materia
CREATE TABLE Materia (
    idMateria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    idCarrera INT,
    idProfesor INT,
    FOREIGN KEY (idCarrera) REFERENCES Carrera(idCarrera),
    FOREIGN KEY (idProfesor) REFERENCES Profesor(idProfesor)
);

-- Tabla Alumnos_Materias (Tabla intermedia)
CREATE TABLE Alumnos_Materias (
    idAlumno INT,
    idMateria INT,
    PRIMARY KEY (idAlumno, idMateria),
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno),
    FOREIGN KEY (idMateria) REFERENCES Materia(idMateria)
);

-- Tabla Aulas
CREATE TABLE Aulas (
    idAula INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla Laboratorios
CREATE TABLE Laboratorios (
    idLaboratorio INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla Horario
CREATE TABLE Horario (
    idHorario INT AUTO_INCREMENT PRIMARY KEY,
    idMateria INT,
    horaInicio TIME NOT NULL,
    horaFin TIME NOT NULL,
    idAula INT,
    idLaboratorio INT,
    FOREIGN KEY (idMateria) REFERENCES Materia(idMateria),
    FOREIGN KEY (idAula) REFERENCES Aulas(idAula),
    FOREIGN KEY (idLaboratorio) REFERENCES Laboratorios(idLaboratorio)
);

-- Tabla Asistencia
CREATE TABLE Asistencia (
    idAsistencia INT AUTO_INCREMENT PRIMARY KEY,
    idAlumno INT,
    idMateria INT,
    tipo VARCHAR(50) NOT NULL,
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno),
    FOREIGN KEY (idMateria) REFERENCES Materia(idMateria)
);

-- Tabla CronogramaPagos
CREATE TABLE CronogramaPagos (
    idCronogramaPagos INT AUTO_INCREMENT PRIMARY KEY,
    idCarrera INT,
    Costo DECIMAL,
    FOREIGN KEY (idCarrera) REFERENCES Carrera(idCarrera)
);

-- Tabla SAA
CREATE TABLE SAA (
    idSAA INT AUTO_INCREMENT PRIMARY KEY,
    idAlumno INT,
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno)
);

-- Tabla PlataformaExterna
CREATE TABLE PlataformaExterna (
    idPlataformaExterna INT AUTO_INCREMENT PRIMARY KEY,
    idAlumno INT,
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno)
);

-- Tabla Notas
CREATE TABLE Notas (
    idNotas INT AUTO_INCREMENT PRIMARY KEY,
    idMateria INT,
    idAlumno INT,
    nota DECIMAL(4, 2),
    FOREIGN KEY (idMateria) REFERENCES Materia(idMateria),
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno)
);

/* Registros */
-- CARRERAS
INSERT INTO Carrera (nombre) VALUES ('Diseño Grafico'), ('Ing. de Sofware con IA');

-- PROFESOR
INSERT INTO Profesor (nombre,correo,contraseña) VALUES ('Walter Coaguila','242424@senati.edu.pe','242424'),('Adrian Gonzales','242425@senati.edu.pe','242425');

-- ALUMNOS
INSERT INTO Alumnos(nombre,correo,contraseña) VALUES ('Zavala Jhosue','141414@senati.pe','141414'),('Angeles Joel','141415@senati.pe','141415'),('Carrillo Juda','141416@senati.pe','141416');

-- MATERIAS
INSERT INTO Materia(nombre,idCarrera,idProfesor)VALUES
('Diseño de packaging',1,1),
('Diseño Digital',1,1),
('Realidad Virtual y Aumentada',1,1);
INSERT INTO Materia(nombre,idCarrera,idProfesor)VALUES
('POO',1,1),
('Diseño y programación de bases de datos con SQL',2,2)
,('Desarrollo de Aplicaiones Web',2,2);

-- AULA
INSERT INTO Aulas(nombre)VALUES('Aula1'),('Aula2');

-- LABORATORIO
INSERT INTO Laboratorios(nombre)VALUES('Laboratorio1'),('Laboratorio2');

-- HORARIOS
INSERT INTO Horario (idMateria, horaInicio, horaFin, idAula, idLaboratorio) VALUES 
(1, '08:00:00', '10:00:00', 1, null),
(2, '11:00:00', '13:00:00', null, 1),
(3, '14:00:00', '16:00:00', 2, null),
(4, '16:00:00', '17:00:00', null, 2),
(5, '17:00:00', '18:00:00', 1, null),
(6, '18:00:00', '19:00:00', 2, null);

-- CRONOGRAMA DE PAGOS
INSERT INTO CronogramaPagos (idCarrera, Costo) VALUES (1, 500.0), (2, 600.0);

-- SAA
INSERT INTO SAA (idAlumno) VALUES (1);

-- PLATAFORMA EXTERNA
INSERT INTO PlataformaExterna (idAlumno) VALUES (1);



