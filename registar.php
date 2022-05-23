<html>
	<head>
		 <meta charset="utf-8">
		 <meta http-equiv="refresh" content="20;url=index.html" />
		 <title>Vendas da banha da cobra By Sérgio Silva</title>
        <link href = "recursos/style/style.css" rel ="stylesheet" type="text/css">
 </head>
 <body>
 <?php //liga-se ao servidor con user e pass
include 'includes/liga_bd.php';
include 'includes/valida_foto.php';

if($uploadOk==0){
	echo "<h1>Até na foto enganas - escolha um ficheiro válido</hl>"; 
}else{
	if($uploadOk==1){
		move_uploaded_file($_FILES["ficheiro"]["tmp_name"],$target_file);
// intrucao sql pars adicionar
$tmp= password_hash($_POST['pass'],PASSWORD_DEFAULT);
 	$sql ="INSERT INTO t_user (nick, nome, email, data_nasc, pass, foto ) VALUES ('$_POST[nick]', '$_POST[nome]','$_POST[email]', '$_POST[data_nasc]', '$tmp', '".$foto."');"; 
	echo $sql;
 	if (mysqli_query($ligacao, $sql))
	 echo "<h1>Enganador inserido com sucesso</hl>"; 
	}
}	
mysqli_close($ligacao); 
?>	
		<h2>"Aguarde que vai ser redirecionado"</h2>
 </body> 
</html> 
