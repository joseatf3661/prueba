CREATE DATABASE hospital;

USE hospital;

CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rut VARCHAR(12) NOT NULL unique,
    paciente VARCHAR(100) NOT NULL
);

CREATE TABLE medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medico VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100) NOT NULL
);

CREATE TABLE diagnosticos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    medico_id INT,
    diagnostico TEXT NOT NULL,
    fecha_ingreso DATE NOT NULL,
    fecha_salida DATE NOT NULL,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
    FOREIGN KEY (medico_id) REFERENCES medicos(id)
);

CREATE INDEX idx_paciente_id ON diagnosticos(paciente_id);
CREATE INDEX idx_medico_id ON diagnosticos(medico_id);

SELECT 
    p.rut AS Rut,
    p.paciente AS Paciente,
    m.medico AS Medico,
    m.especialidad AS Especialidad,
    d.diagnostico AS Diagnostico,
    d.fecha_ingreso AS FechaIngreso,
    d.fecha_salida AS FechaSalida
FROM 
    pacientes p
JOIN 
    diagnosticos d ON p.id = d.paciente_id
JOIN 
    medicos m ON d.medico_id = m.id
WHERE 
    p.rut = 'RUT_DEL_PACIENTE';

