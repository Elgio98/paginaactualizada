<?php
include 'conexion.php';

$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
//------
$usuario=$_POST["usuario"];
$pass=$_POST["pass"];
//------
$correo=$_POST["correo"];
$telefono=$_POST["telefono"];

//-----
$conexion=mysqli_connect($db_server,$db_user, $db_pass,$db_name);

$altausr= "insert into usuarios (usuario,password) values('$usuario','$pass')";
$resultado1=mysqli_query($conexion,$altausr);
$id_usr="select id_usuario from usuarios order by id_usuario desc limit 1";
$resid=mysqli_query($conexion,$id_usr);
$row=mysqli_fetch_assoc($resid);
$comotuquieras=$row["id_usuario"];
settype($comotuquieras,'int');
//var_dump($comotuquieras);

$alta="insert into perfil (nombre,apellidos,correo,telefono, id_usuario) values ('$nombre','$apellidos','$correo', '$telefono', '$comotuquieras')"; 

$resultado=mysqli_query($conexion,$alta);
//sleep(3);
//-----------
if($resultado==true && $resultado1==true)
{
	echo '<script language="javascript"> alert("Datos Agregados Correctamente");window.location.href="editarperfil.php"; </script>';
	echo "$usuario";
}
else 
{
	echo '<script language="javascript"> alert("Imposible realizar esta acción");window.location.href="../index.php"; </script>';
	
}
mysqli_close($conexion); 
?>