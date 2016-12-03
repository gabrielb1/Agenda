<meta charset="UTF-8">

<?php
$conn = mysql_connect("localhost", "root", "") or die("Não foi possivel conectar ao servidor de dados");
mysql_select_db("agenda", $conn) or die("Banco de Dados não encontrado");

?>