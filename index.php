<!DOCTYPE html>
<?php
require_once "config.php";
?>
<html>
    <head>
        <meta charset=utf-8>
        <title>Agenda</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="cadastro">
            <form method="post" action="?go=logar">
                <table id="login_table">
                    <h1 class="titulo"> Agenda On-line </h1>
                    <tr>
                    <td class="label">Usuário</td>
                        <td><input type="text" name="usuario" id="usuario" class="txt" placeholder="Digite seu nome de usuário"/></td>
                    </tr>
                    <tr>
                        <td class="label">Senha</td>
                        <td><input type="password" name="senha" id="senha" class="txt" placeholder="Digite sua senha"/></td>
                    </tr>
                    <tr> 
                        <td colspan="2"><a href="agenda.php"><input type="submit" value="Entrar" id="btnLogin"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="cadastro.php"><input type="button" value="Cadastrar" id="btnCadastrar"></a></td>
                    
                    </tr>
                </table>
            </form>
        </div>

    </body>
</html>
<?php
if (@$_GET['go'] == 'logar') {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if (empty($usuario)) {
        echo "<script>alert('Preencha todos os campos logar-se.'); history.back();</script>";
    } elseif (empty($senha)) {
        echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
    } else {
        $query1 = @mysql_num_rows(@mysql_query("SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha' "));
        

        if ($query1 == 1) {
            echo "<script>alert('Usuário e senha não correspodem.'); history.back();</script>";
        } else {
            echo "<script>alert('Usuário Logado com sucesso');</script>";
            echo "<meta http-equiv='refresh' content='0  url=painel.php'>";
            
        }
    }
}
?>