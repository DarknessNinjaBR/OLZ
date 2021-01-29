<?php
include ("banco.php");
session_start();

if($_SESSION['idAdmin'] <> 1){
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/jquery.mask.js"></script>
    <title>OLZ</title>
</head>
<body>
<header class="header">
        <div id="top">
            <a href="index.php"><img src="assets/css/img/logo.png" width="100"></a>
            <form action="pesquisa.php" method="GET">

                <input type="text" name="result">
                <button id="pesquisa"><img src="assets/css/img/lupa.png" width="27"></button>
            </form>
        </div>
        <div id="cantodireito">
            <h1>OLZ: Botou, Vendeu</h1>
        </div>
    </header>

    <div id="menu">
        <?php
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        ?>
            <a href="perfil.php">Perfil</a>
            <a href="deslogar.php">Sair</a>
            <?php
            if (isset($_SESSION['idAdmin']) && !empty($_SESSION['idAdmin'])) {
            ?>
                <a href="formEstado.php">Adicionar Estado</a>
            <?php
            }
            ?>
            <a href="formAnuncio.php">Anuncie aqui!</a>

        <?php
        } else {
        ?>
            <a href="formRegistro.php">Registrar-se</a>
            <a href="formLogin.php">Entrar</a>
        <?php
        }
        ?>


    </div>
        <div id="conteudo">
        

        <div id=formularioLogin>
            <fieldset>
                <form method="POST" action="recebeEstado.php">
                    <p>Estado:</p><input type="text" name="estado" class="formulario" maxlength="55"><br/><br/>
                    <p>UF:</p><input type="text" name="uf" class="formulario" maxlength="2"><br/><br/>
                    <input type="submit" name="enviar" class="formulario">
                        
                </form>
                </fieldset>
            </div>

            <?php

			$sql = "SELECT id_estado, nm_estado, ds_uf FROM estado";

			$tosql = mysqli_query($connect, $sql);

			  ?>
			 
			  <table border="1px black" width="1000px">
			  	<tr>
			  		<td>Codigo</td>
			  		<td>Estado</td>
			  		<td>UF</td>
			  		<td>Editar/Apagar</td>
			  	</tr>

			  	<?php
				  	
				  	while ($linha = mysqli_fetch_array($tosql)) {
				  	echo "<tr>";
				  	echo "<td>$linha[id_estado]</td>";
				  	echo "<td>$linha[nm_estado]</td>";
				  	echo "<td>$linha[ds_uf]</td>";
				  	echo "<td><a href='editarEstado.php?cod=$linha[id_estado]'><img src=\"assets/css/img/editar.png\" width=\"20\" style=\"padding-right: 7%; padding-left: 3%;\"></a><a href='deletarEstado.php?cod=$linha[id_estado]'><img src=\"assets/css/img/lixo.png\" width=\"20\"></a></td>"; 
				  	echo "</tr>";
				  	}

			  	?>
			  </table>

        </div>
                    

    </div>
    <footer id="rodape">

        Todos os direitos reservados © DNBR

    </footer>
</body>
</html>