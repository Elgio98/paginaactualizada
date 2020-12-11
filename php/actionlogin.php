<?php
session_start();

  $usuario=$_POST["Usuario"];
  $pass=$_POST["Pass"];
  include 'conexion.php';

  $conexion=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
  $consulta="select Usuario, Pass, Id_usuario from usuario where Usuario='$usuario' and Pass='$pass' ";

  $resultado=mysqli_query($conexion,$consulta);
  $rows=mysqli_affected_rows($conexion);
  $datos=mysqli_fetch_row($resultado);

  //echo $datos[3];

  if($resultado==true and $rows==1)
  {
  	$_SESSION["usr"]=$_POST["Usuario"];
    //$_SESSION["id_usr"]=$datos[3];
  		echo '<script language="javascript">
  		alert("Bienvenido");
  		window.location.href="../admin.php";
  		</script>';
  }
  else
  {
  	echo '<script language="javascript">
  		alert("Usuario NO registrado");
  		window.location.href="../login.php";
  		</script>';
  }
  ?>