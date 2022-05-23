<html>
	 <head> 
		 <meta charset="utf-8"> 
     <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href = "recursos/style/style.css" rel ="stylesheet" type="text/css">
</head> 
<body> 
<title>Vendas da banha da cobra By Sérgio Silva</title>
<h1>Gestão de categorias - de enganos</h1>
	<?php 
include "includes/liga_bd.php";
if (isset($_POST['categoria'])){
$categoria=$_POST['categoria'];
$subcat=$_POST['subcat'];
$sql="INSERT INTO t_subcat(categoria, subcategoria ) VALUES($categoria,'$subcat')";
if (mysqli_query($ligacao,$sql)){echo "<h2>Dados inseridos com sucesso!</h2>";}
header("Location: categorias.php");
}
 ?>
 <form action ="categorias.php" method="post">
 	Categoria: <select name="categoria">
	 <?php
 		$sql="SELECT * FROM t_categorias";		
 		$resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
		 while ($linha = mysqli_fetch_assoc($resultado))
		 {
			echo"<option value='".$linha['id']."'>".$linha['categoria']."</option>";
			}
  ?>
  </select>

  <br> Subcategoria:<input type="text" required name = "subcat">
  <button onclick="location.href='categorias.php'" type="button">Cancelar</button>
  <input type ="submit" value ="Gravar">
   </form>
   <h2>Cagatorias</h2>
   <table>
	<tr>
		<th>ID</th>
		<th>Cagatorias</th>
		<th>Sub-Cagatorias</th>
		</tr>
		 <?php

		 $sql="SELECT * FROM t_subcat";
		  $resultado = mysqli_query($ligacao,$sql) or die(mysqli_error($ligacao));
		   while ($linha = mysqli_fetch_assoc($resultado)){
			echo "<tr><td>".$linha['id']."</td><td>".$linha['categoria']."</td><td>".$linha['subcategoria']."</td></tr>";
		   }
		

		   ?>
		  </table>
  </body> 
  </html> 