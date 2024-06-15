<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['registrar'])) {
       
        if (!empty($_POST['Rut']) && !empty($_POST['Paciente']) && !empty($_POST['Medico']) &&
            !empty($_POST['Especialidad']) && !empty($_POST['Diagnostico']) &&
            !empty($_POST['fechaIngreso']) && !empty($_POST['fechaSalida'])) {

            try {
              
                $conn->beginTransaction();

               
                $stmtPaciente = $conn->prepare("INSERT INTO pacientes (rut, paciente) VALUES (:Rut, :Paciente) ON DUPLICATE KEY UPDATE paciente=:Paciente");
                $stmtPaciente->execute(['Rut' => $_POST['Rut'], 'Paciente' => $_POST['Paciente']]);
                $paciente_id = $conn->lastInsertId();

               
                $stmtMedico = $conn->prepare("INSERT INTO medicos (medico, especialidad) VALUES (:Medico, :Especialidad) ON DUPLICATE KEY UPDATE especialidad=:Especialidad");
                $stmtMedico->execute(['Medico' => $_POST['Medico'], 'Especialidad' => $_POST['Especialidad']]);
                $medico_id = $conn->lastInsertId();

                
                $stmtDiagnostico = $conn->prepare("INSERT INTO diagnosticos (paciente_id, medico_id, diagnostico, fecha_ingreso, fecha_salida) VALUES (:paciente_id, :medico_id, :Diagnostico, :fechaIngreso, :fechaSalida)");
                $stmtDiagnostico->execute([
                    'paciente_id' => $paciente_id,
                    'medico_id' => $medico_id,
                    'Diagnostico' => $_POST['Diagnostico'],
                    'fechaIngreso' => $_POST['fechaIngreso'],
                    'fechaSalida' => $_POST['fechaSalida']
                ]);

                
                $conn->commit();

                echo '<h3 class="OK">¡Formulario enviado y datos guardados correctamente en la base de datos!</h3>';

            } catch (PDOException $e) {
                
                $conn->rollback();
                echo '<h3 class="bad">Error al insertar datos: ' . $e->getMessage() . '</h3>';
            }

        } else {
            echo '<h3 class="bad">¡Por favor completa todos los campos!</h3>';
        }

    } else {
        echo '<h3 class="bad">¡No se ha enviado el formulario correctamente!</h3>';
    }
} else {
    echo '<h3 class="bad">¡Acceso denegado! No se permiten solicitudes GET en este script.</h3>';
}
?>
