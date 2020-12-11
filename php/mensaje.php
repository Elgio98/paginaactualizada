<?php
//include '../profile.php';

 
include 'conexion.php';

$conexion=mysqli_connect($db_server,$db_user, $db_pass,$db_name);

$datos="select * from perfil order by id_usuario desc limit 1";
$resid=mysqli_query($conexion,$datos);
$row=mysqli_fetch_assoc($resid);

$id=$row["id_usuario"];

$nombre=$row["nombre"];

$apellidos=$row["apellidos"];
//------
$correo=$row["correo"];
$telefono=$row["telefono"];

//echo $nombre.' '.$apellidos.' '.$correo.' '.$telefono;

require('../profile.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$editarnombre=$_POST["editarnombre"];
	$editarapellidos=$_POST["editarapellidos"];
	$editarcorreo=$_POST["editarcorreo"];
	$editartelefono=$_POST["editartelefono"];
	$editarid=$id;
	
	$actualizar="update perfil set nombre='$editarnombre', apellidos='$editarapellidos', correo='$editarcorreo', telefono='$editartelefono' where id_usuario=$editarid"; 

	$resultado=mysqli_query($conexion,$actualizar);
	if($resultado==true)
	{
		echo '<script language="javascript"> alert("Datos Actualizados Correctamente");window.location.href="editarperfil.php"; </script>';
	}
	else 
	{
		echo '<script language="javascript"> alert("Imposible realizar esta acción");window.location.href="editarperfil.php"; </script>';
	
	}
}
mysqli_close($conexion);

?>