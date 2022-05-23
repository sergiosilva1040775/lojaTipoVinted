<html>
	<head>
		<meta charset="utf-8">
        <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href = "recursos/style/style.css" rel ="stylesheet" type="text/css">
 </head>
 <body>
 <title>Vendas da banha da cobra By Sérgio Silva</title>
<h1>Listar enganadores</h1>
<?php

include "includes/liga_bd.php";
include "includes/valida.php";
$sql ="SELECT * FROM t_user WHERE apagado=0";
$resultado=mysqli_query($ligacao, $sql) or die (mysqli_error(Sligacao)); 
$numreg = 0;

while($linha = mysqli_fetch_assoc($resultado))
{
echo "<b>Id: " . $linha['id']."<br>"; 
echo "<b>Nick:</b> " . $linha['nick']."<br>"; 
echo "<b>Nome: </b> " . $linha['nome']."<br>"; 
echo "<b>E-mail:</b> " . $linha['email']. "<br>" ;
echo "<b>Data Nascimento:</b> " . $linha['data_nasc']. "<br>" ;
echo "Foto:<br><img src='pics/". $linha['foto']."'height='100'><br/>";
if ($linha['apagado']==0){
?>
<form action="bloquear_U.php" method="post">
<input name="id_user"  value="<?php echo $linha['id'];?>"><br>
<input type="submit" value="bloquear"><br>
</form>
<?php
}else{
	?>
	<form action="desbloquear_U.php" method="post">
	<input  name="id_user"  value="<?php echo $linha['id'];?>"><br>
	<input type="submit" value="Desbloquear"><br>
	</form>
	<?php
}
?>
<form action="alterar_U.php" method="post">
<input   name="id_user"  value="<?php echo $linha['id'];?>"><br>
<input type="submit" value="Alterar"><br>
</form>
<?php

echo "<hr>";
$numreg = $numreg + 1;
}
mysqli_close($ligacao);
echo "Numero de enganadores  > " . $numreg;


?>
 <br><br> 
  <input type="button" value="Continuar" onclick="javascript:window.history.go(-1)">
</body>
</html> 