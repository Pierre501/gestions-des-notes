<?php
include("connexion.php");
$etu = isset($_GET['etu'])? $_GET['etu']: '';
$semestre = isset($_GET['semestre'])? $_GET['semestre']: '';
$moyenne = isset($_GET['moyenne'])? $_GET['moyenne']: '';
$mention = isset($_GET['mention'])? $_GET['mention']: '';
$bdd = dbconnect();
$sql = "select * from v_notes where ETU = '%s' and Semestre = '%s'";
$sql = sprintf($sql,$etu,$semestre);
$resultat = mysqli_query($bdd,$sql);
$rows = mysqli_fetch_assoc($resultat);
$meta = mysqli_set_charset($bdd,"utf8");

?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Fiche</title>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="style.css">
		</head>
	<body>
		<h1>Rélevé des notes</h1>
		<p><b>Numéro ETU : </b><?php echo $rows['ETU']; ?></p>
		<p><b>Nom : </b><?php echo $rows['Nom']; ?></p>
		<p><b>Prénom : </b><?php echo $rows['Prenom']; ?></p>
		<p><b>Date et lieu de naissance : </b><?php echo $rows['Date_de_naissance']; ?> à <?php echo $rows['Lieu_de_naissance']; ?></p>
		<table border="1" cellpadding="0" cellspacing="0">
			<tr>
				<th>Intitule</th>
				<th>note/20</th>
			</tr>
			<?php while($rows = mysqli_fetch_assoc($resultat)) { ?>
				<tr>
					<td><?php echo $meta=$rows['Intitule']; ?></td>
					<td><?php echo $meta=$rows['Valeur']; ?></td>
				</tr>
			<?php } ?>
		</table>
		<p><b>Moyenne : </b><?php echo $moyenne; ?></p>
		<p><b>Mention : </b><?php echo $mention; ?></p>
		<p><a href="index.php"> >>Retour</a></p>
	</body>
</html>