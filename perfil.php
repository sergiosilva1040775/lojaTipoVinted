<html> 
<head> 
<meta charset="utf-8">
<title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href = "recursos/style/style.css" rel ="stylesheet" type="text/css">
</head> 
<body> 
<title>Vendas da banha da cobra By Sérgio Silva</title>
<h1>Alterar enganador</h1>
	<?php 
include "includes/liga_bd.php";
include "includes/valida.php";
	    //trio a instruck sql para selecionar todos os registos 
		$sql ="SELECT * FROM t_user WHERE id=".$_SESSION['id']; 
		// a variavel resultado vai guardar todos os dados de todos os clientes
		 $resultado= mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
		  //enquanto conseguir ler dados do array resultado imprime 
		  $linha = mysqli_fetch_assoc($resultado); 
		  ?>
<!-- o metodo post envia os dados de uma pagina para a outra de forma escondida o metodo get envia os dados para a pagina seguinte pela barra de endereco--> 
<form action=" perfil2.php" method="post" enctype="multipart/form-data">
			<p>Id:<input type="text" name="id" size="100" readonly value="<?php echo $linha['id'];?>"></p> 
			<p>Nick:<input type="text" name="nick" size="20" maxlength="20" readonly required value="<?php echo $linha['nick'];?>"> </p>
            <p>Nome:<input type="text" name="nome" size="100" maxlength="100" required value="<?php echo $linha['nome'];?>"> </p>
            <p>Email:<input type="text" name="email" size="50" maxlength="50" required value="<?php echo $linha['email'];?>"> </p>
            <p>Data de Nascimento:<input type="date" name="data_nasc"required value="<?php echo $linha['data_nasc'];?>"> </p>
            <p>Senha:<input type="password" name="pass" size="20" maxlength="20"required > </p>
			 <br>Foto:<br><img src="pics/<?php echo $linha['foto'];?>" height="100"><br/>
<input name ="nome_foto" value ="<?php echo $linha['foto'];?>">
<br> <br> Nova Foto:<input type="file" name ="ficheiro"><br> <br>
<input type="submit" value ="Alterar"> 
	 <br><br> 
	 <a href="index.html" target="_self">Voltar ao menu</a> 
	</form> 
<?php mysqli_close($ligacao); 
?>
</body> 
</html>
