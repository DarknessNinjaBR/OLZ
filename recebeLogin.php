<?php

	include "banco.php";
	session_start();

	$email = addslashes($_POST['email']);
	$senha = addslashes(md5($_POST['senha']));

if(isset($_POST['email']) && !empty($_POST['email']) && 
   isset($_POST['senha']) && !empty($_POST['senha'])){

		$sql = "SELECT * FROM usuario WHERE ds_email = '$email' AND ps_password = '$senha'";
		$query = mysqli_query($connect, $sql);
		if($dados = mysqli_fetch_array($query)){
			$_SESSION["id"] = $dados['id_usuario'];
			$_SESSION["email"] = $dados['ds_email'];
			$_SESSION["user"] = $dados['nm_usuario'];
			$_SESSION["pass"] = $dados['ps_password'];
			$_SESSION["idAdmin"] = $dados['id_admin'];

			header("location: index.php");
		}else{
			header("location: formloginInvalido.php?erro=1");
		}
	}
  ?>

