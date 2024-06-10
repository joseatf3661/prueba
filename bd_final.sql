SELECT 
    a.fecha_ingreso AS 'Ingreso', 
    CONCAT(p.nombre, ' ', p.apellido) AS 'Paciente', 
    CONCAT(m.nombre, ' ', m.apellido) AS 'Medico', 
    e.nombre AS 'Especialidad', 
    d.nombre AS 'Diagnostico', 
    a.fecha_alta AS 'Alta'
FROM 
    atenciones a
JOIN 
    pacientes p ON a.id_paciente = p.id_paciente
JOIN 
    medicos m ON a.id_medico = m.id_medico
JOIN 
    especialidades e ON a.id_especialidad = e.id_especialidad
JOIN 
    diagnosticos d ON a.id_diagnostico = d.id_diagnostico
ORDER BY 
    a.fecha_ingreso DESC;
