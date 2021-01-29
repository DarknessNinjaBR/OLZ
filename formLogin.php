<?php
include ("banco.php");
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
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
            <a href="formRegistro.php">Registrar-se</a>
            <a href="formLogin.php">Entrar</a>
        </div>
        <div id="conteudo">
        <div id=formularioLogin>
            <fieldset>
                <form method="POST" action="recebeLogin.php">
                    <p>Email:</p><input type="text" name="email" class="formulario" maxlength="255"><br/><br/>
                    <p>Senha:</p><input type="password" name="senha" class="formulario" maxlength="55"><br/><br/>

                    <?php 

if($_GET){

    echo "Preencha todos os campos";
}

?>
                    <input type="submit" name="enviar" class="formulario">
                        
                    </form>
                </fieldset>
            </div>
        </div>
        <footer id="rodape">

            Todos os direitos reservados © DNBR
        
        </footer>
    </body>
</html>
