<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include ("class/conexao.php");

$consulta = "SELECT * FROM tb_contato";
$conn = $mysqli->query($consulta) or die($mysqli->error);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border>
            <tr>
                <td>Código</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Telefone</td>
                <td>Endereço</td>
                <td>Ação</td>
            </tr>
            <?php while ($dado = $conn ->fetch_array()){?>
            <tr>
                <td><?php echo $dado["id_cadastro"]; ?></td>
                <td><?php echo $dado["nome"]; ?></td>
                <td><?php echo $dado["email"]; ?></td>
                <td><?php echo $dado["telefone"]; ?></td>
                <td><?php echo $dado["endereco"]; ?></td>
                <td><a href="editar.php?codigo=<?php echo $dado["id_codigo"]; ?>">Editar</a>
                    <a href="excluir.php?codigo=<?php echo $dado["id_codigo"]; ?>">Excluir</a>
            </tr>
            <?php } ?>
        </table>
        
        
    </body>
</html>
