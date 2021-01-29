<?php

	include "banco.php";
	session_start();

	$estado = $_POST['estado'];
	$uf = $_POST['uf'];
	

	if(isset($_POST['estado']) && !empty($_POST['estado']) && isset($_POST['uf']) && !empty($_POST['uf']) ){

        $sql = "INSERT INTO estado (nm_estado, ds_uf) VALUES ('$estado','$uf')";
        $query = mysqli_query($connect,$sql);
        header("location: formEstado.php");
         
	}else{
        header("location: formEstado.php");
	}
 ?>


