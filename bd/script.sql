-- Tabla Carrera
CREATE TABLE Carrera (
    idCarrera INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla Profesor
CREATE TABLE Profesor (
    idProfesor INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla Alumnos
CREATE TABLE Alumnos (
    idAlumno INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla Materia
CREATE TABLE Materia (
    idMateria INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    idCarrera INT,
    idProfesor INT,
    idAlumno INT,
    FOREIGN KEY (idCarrera) REFERENCES Carrera(idCarrera),
    FOREIGN KEY (idProfesor) REFERENCES Profesor(idProfesor),
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno)
);

-- Tabla Horario
CREATE TABLE Horario (
    idHorario INT PRIMARY KEY AUTO_INCREMENT,
    horaInicio TIME NOT NULL,
    horaFin TIME NOT NULL
);

-- Tabla Aulas
CREATE TABLE Aulas (
    idAula INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla Laboratorios
CREATE TABLE Laboratorios (
    idLaboratorio INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla Asistencia
CREATE TABLE Asistencia (
    idAsistencia INT PRIMARY KEY AUTO_INCREMENT,
    idAlumno INT,
    idMateria INT,
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno),
    FOREIGN KEY (idMateria) REFERENCES Materia(idMateria)
);

-- Tabla CronogramaPagos
CREATE TABLE CronogramaPagos (
    idCronogramaPagos INT PRIMARY KEY AUTO_INCREMENT,
    idCarrera INT,
    FOREIGN KEY (idCarrera) REFERENCES Carrera(idCarrera)
);

-- Tabla SAA
CREATE TABLE SAA (
    idSAA INT PRIMARY KEY AUTO_INCREMENT,
    idAlumno INT,
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno)
);

-- Tabla PlataformaExterna
CREATE TABLE PlataformaExterna (
    idPlataformaExterna INT PRIMARY KEY AUTO_INCREMENT,
    idAlumno INT,
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno)
);

-- Tabla Notas
CREATE TABLE Notas (
    idNotas INT PRIMARY KEY AUTO_INCREMENT,
    idMateria INT,
    idAlumno INT,
    nota DECIMAL(4, 2),
    FOREIGN KEY (idMateria) REFERENCES Materia(idMateria),
    FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno)
);
