<?php
include("fonctions.php");
$login = isset($_POST['login'])? $_POST['login']: '';
$mdp = isset($_POST['mdp'])? $_POST['mdp']: '';
$rows = checkLogin($login,$mdp);
if($rows == 1)
{
	header('Location: admin.php');
}
else
{
	header('Location: index.php?error');
}
?>