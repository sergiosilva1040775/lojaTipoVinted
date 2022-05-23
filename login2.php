<html>
    <head>
        <meta charset="utf-8">
        <title>Vendas da banha da cobra By Sérgio Silva</title>
<link href = "recursos/style/style.css" rel ="stylesheet" type="text/css">
    </head>
    <body>
    <h1>Area de gestao das inganações</h1>

           <?php
               include 'includes/valida.php';
               include 'includes/liga_bd.php';
              echo "<h2>Bem vindo ".$_SESSION['nick']."</h2>";
           ?>  
            <input type="button" value="Editar Perfil" onclick="window.open('perfil.php','_self')"><br/><br/>

            <input type="button" value="Editar cagatorias" onclick="window.open('categorias.php','_self')"><br/><br/>

            <form action="Vender.php" method ="post">
                <input type = "text" name="categoria" value="1";>
                <input type = "submit" name="Vender" value="Vender";></form><br/>
              
                <form action="Comprar.php" method ="post">
                <input type = "text" name="categoria" value="0";>
                <input type = "submit" name="Ver Lista de produtos" value="Comprar";></form><br/>
               
                <form action="pesq.php" method="post">
                    <input type="text" name="categoria" value="0">
                    <input type="submit" value="Pesquisar"> </form><br/>

                    <!-- <input type="button" value="Historico" onclick="window.open('historico.php', '_self")"><br/> <br/> --> 
                    <form action="historico.php" method="post">
<input type="text" name="tipo" value="0">
<input type="submit" value="Histórico"> </form>


<input type="button" value="Logout" onclick="window.open('logout.php','_self')">  <br/><br/>

            <?php
                if(strcmp($_SESSION['nick'],"admin")==0){
            ?>
            <br><br><h2>Área Administração</h2> 
            <input type="button" value="Gerir utilizador" onclick="window.open('listar_U.php','_self')">
            <input type="button" value="Gerir produtos" onclick="window.open('gerir_P.php','_self')">            
            <input type="button" value="Gerir vendas" onclick="window.open('gerir_R.php','_self')">  
            <?php } ?>      
    </body>
</html>


