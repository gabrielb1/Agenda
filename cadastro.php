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
        <h1 class="titulo">Cadastro novo usuário</h1>
        <div id="cadastro">
            <form id="cad_table1" method="post" action="?go=cadastrar">
                <table id="cad_table">
                    <tr>             
                        <td>Usuário</td>
                        <td><input type="text" name="usuario" id="usuario" placeholder="Novo Usuario" class="txt"/> </td>
                    </tr>
                    <tr>
                        <td>Senha</td>
                        <td><input type="password" name="senha" id="senha" placeholder="Nova Senha" class="txt" /></td>
                    </tr>
                    <tr> 
                        <td colspan="2"><a href="index.php"><input type="submit" value="Cadastrar" id="btnCadastrar"></a></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="index.php"><input type="button" value="Login" id="btnLogin"></a></td>
                    </tr>
                </table>
            </form>
        </div>

    </body>
</html>
<?php
if (@$_GET['go'] == 'cadastrar') {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    if (empty($usuario)) {
        echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
    } elseif (empty($senha)) {
        echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
    } else {
        $query1 = @mysql_num_rows(@mysql_query("SELECT * FROM usuario WHERE usuario = '$usuario' "));


        if ($query1 == 1) {
            echo "<script>alert('Usuario já existe.'); history.back();</script>";
        } else {
            @mysql_query("insert into usuario (nome, email, usuario, senha) values ('$nome', '$email', '$usuario', '$senha')");
            echo "<script>alert('Usuário cadastro com sucesso.');</script>";
            echo "<meta http-equiv='refresh' content='0  url=index.php'>";
            header("location> cadastro.php");
        }
    }
}
?>