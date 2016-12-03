<!DOCTYPE html>

<html>
    <head>
        <meta charset=utf-8>
        <title>Agenda</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1 class="titulo">Agenda On-line</h1>
        <div id="agenda">
            <form id="agenda" method="post" action="?go=cadastro">
                <table id="agenda_tb">
                    <tr>             
                        <td>Nome</td>
                        <td><input type="text" name="nome" id="nome" placeholder="Digite o nome" class="txt"/> </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" id="email" placeholder="Digite o Email" class="txt" /></td>
                    </tr>
                    <tr>
                        <td>Telefone</td>
                        <td><input type="text" name="telefone" id="telefone" placeholder="Digite o telefone" class="txt" /></td>
                    </tr>
                    <tr>
                        <td>Endereço</td>
                        <td><input type="text" name="endereco" id="endereco" placeholder="Digite o endereço" class="txt" /></td>
                    </tr>
                        <td colspan="2"><a href="agenda.php"><input type="submit" value="Novo Cadastro" id="btnNew" class="btn" /></a></td>
                                  
                        <td colspan="2"><a href="listaDeContatos.php"><input type="submit" value="Listar" id="btnListar" class="btn" /></a></td>
                                            
                        <td colspan="2"><a href="agenda.php"><input type="submit" value="Cadastrar" id="btnCadastro" class="btn"/></a></td>
                </table>
            </form>
        </div>

    </body>
</html>
<?php
if (@$_GET['go'] == 'cadastro') {
    
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    
    

    
    if (empty($nome)) {
        echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
    } elseif (empty($email)) {
        echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
    } elseif (empty ($telefone)) {
        echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
    } elseif (empty ($endereco)) {
        echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
}else{
        
        $query2 = @mysql_num_rows(@mysql_query("SELECT * FROM tb_contatos WHERE nome = '$nome' "));

        if ($query2 == 1) {
            echo "<script>alert('Cadastro já existe.'); history.back();</script>";
        } elseif ($email != 1) {
             echo "<script>alert('Email já existe.'); history.back();</script>";
        }else{    
            @mysql_query("insert into tb_contato (nome, email, telefone, endereco) values ('$nome', '$email', '$telefone', '$endereco')");
            echo "<script>alert('Contato cadastrato com sucesso.');</script>";
            echo "<meta http-equiv='refresh' content='0  url=agenda.php'>";
            header("location> cadastro.php");
        }
    }
}

?>