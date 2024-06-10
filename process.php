<?php
include("con_db.php");

if (isset($_POST['registrar']))  
{
    if (!empty($_POST['Rut']) &&
        !empty($_POST['Paciente']) &&  
        !empty($_POST['Telefono']) &&
        !empty($_POST['Email']) &&
        !empty($_POST['Medico']) &&
        !empty($_POST['Especialidad']) &&
        !empty($_POST['Diagnostico']))
    {
        $Rut = mysqli_real_escape_string($conex, trim($_POST['Rut']));
        $Paciente = mysqli_real_escape_string($conex, trim($_POST['Paciente']));
        $Telefono = mysqli_real_escape_string($conex, trim($_POST['Telefono']));
        $Email = mysqli_real_escape_string($conex, trim($_POST['Email']));
        $Medico = mysqli_real_escape_string($conex, trim($_POST['Medico']));
        $Especialidad = mysqli_real_escape_string($conex, trim($_POST['Especialidad']));
        $Diagnostico = mysqli_real_escape_string($conex, trim($_POST['Diagnostico']));

        $consulta = "INSERT INTO pacientes (rut, paciente, telefono, email, medico, especialidad, diagnostico) VALUES ('$Rut', '$Paciente', '$Telefono', '$Email', '$Medico', '$Especialidad', '$Diagnostico')";
        $resultado = mysqli_query($conex, $consulta);
        
        if ($resultado) {
            echo '<h3 class="OK">¡ TE HAS INSCRITO CORRECTAMENTE !</h3>'; 
        } else {
            echo '<h3 class="bad"> ¡UPS HA OCURRIDO UN ERROR! </h3>';
        }
    } else {
        echo '<h3 class="bad"> ¡Por favor completa todos los campos! </h3>';
    }
}
?>
