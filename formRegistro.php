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
    <script>
        $(document).ready(function(){
            $('#date').mask('11/11/1111');
            $('time').mask('00:00:00');
            $('date_time').mask('99/99/9999 00:00:00');
            $('#cep').mask('99999-999');
            $('#phone').mask('9999-9999');
            $('#phone_with_ddd').mask('(99) 99999-9999');
            $('#phone_us').mask('(999) 999-9999');
            $('mixed').mask('AAA 000-S0S');
            $('#money').mask('000.000.000.000.000,00', {reverse: true});
});
    </script>
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
                        <form method="POST" action="recebeRegistro.php">
                            <p>Usuário:</p><input type="text" name="usuario" class="formulario" maxlength="55"><br/><br/>
                            <p>Email:</p><input type="text" name="email" class="formulario" maxlength="255"><br/><br/>
                            <p>Senha:</p> <input type="password" name="senha" class="formulario" maxlength="55"><br/><br/>
                            <p>Nome completo:</p> <input type="text" name="nome" class="formulario" maxlength="255"><br/><br/>
                            <p>Telefone:</p> <input type="text" name="telefone" class="formulario" maxlength="15" id="phone_with_ddd"><br/><br/>
                            <p>Estado:</p> <select name="estado" class="formulario">
                                    <option value="0" class="formulario">Estado</option>
                                    <?php

			$sql = "SELECT nm_estado, ds_uf FROM estado";

			$tosql = mysqli_query($connect, $sql);

			while ($linha = mysqli_fetch_array($tosql)) {
                ?>
				
                <option value="<?php echo $linha['ds_uf']; ?>" class="formulario"><?php echo $linha['ds_uf']; ?></option>
                
				<?php
                }

                if(isset($linha) && empty($linha)){
					echo "Nao há jogos enviados ainda!, então por que voce não envia um?";
				}	

                ?>
                                </select><br/><br/>
                            <p>CEP:</p><input type="text" name="cep" class="formulario" maxlength="9" id="cep"><br/><br/>
                            <?php 

if($_GET){

    echo "Preencha todos os campos";
}

?>
                            <br/>
                            <br/><input type="submit" name="enviar" class="formulario">
                    </fieldset>        
                </form>
                    
                </div>
            </div>
        <footer id="rodape">

            Todos os direitos reservados © DNBR
        
        </footer>
    </body>
</html>