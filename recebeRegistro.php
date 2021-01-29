<?php

	include "banco.php";

	$usuario = addslashes($_POST['usuario']);
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$estado = addslashes($_POST['estado']);
	$cep = addslashes($_POST['cep']);
	

	if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) && !empty($_POST['telefone']) && isset($_POST['estado']) && !empty($_POST['estado']) && isset($_POST['cep']) && !empty($_POST['cep']) && isset($_POST['senha']) && !empty($_POST['senha'])){

		#Conecta banco de dados 
	    $verificacao = mysqli_query($connect, "SELECT * FROM usuario WHERE ds_email = '$email'");

	    #Se o retorno for maior do que zero, diz que já existe um.
	    if(mysqli_num_rows($verificacao)>0){
	        echo json_encode(array('ds_email' => 'Ja existe um usuario cadastrado com este e-mail')); 
	        header("location: formRegistro.php");
	    }else{
	        $sql = "INSERT INTO usuario (nm_usuario, ps_password, ds_email, nm_pessoa, ds_telefone, ds_uf, ds_cep, id_admin) VALUES ('$usuario', '$senha','$email','$nome','$telefone','$estado','$cep', 0)";
	        $query = mysqli_query($connect,$sql);
	     header("location: formLogin.php");
	    }
	}else{
		header("location: formRegistro.php?erro=1");
	 

	}
 ?>
