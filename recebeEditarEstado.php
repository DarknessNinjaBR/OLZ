<?php 

	include "banco.php";
	session_start();
	print_r($_SESSION);
	print_r($_POST);

    $estado = $_POST['estado'];	
    $uf = $_POST['uf'];	

    $sql = "UPDATE estado SET nm_estado = '$estado', ds_uf = '$uf' WHERE id_estado = $_POST[cod]";

   $query = mysqli_query($connect,$sql);

   //echo $sql;

   header("location: formEstado.php");

 ?>