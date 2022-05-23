<?php
session_start();
//validação das variaveis de EEE EO
if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['nick']) == true))
{
header('location:erro_acesso.html');
}
?>