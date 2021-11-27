<?php 
include("fonctions.php");
$semestre = "semestre 1";
$semestre1 = "semestre 2";
$etu = getNumEtu();

?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Résultats</title>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="style.css">
		</head>
	<body>
		<h1>LES RESULTATS DU 1er SEMESTRE</h1>
		<table border="1" cellpadding="0" cellspacing="0">
			<tr>
				<th>Numéro ETU</th>
				<th>Nom et Prénom</th>
				<th>Age</th>
				<th>Moyenne</th>
				<th>Mention</th>
				<th>Inscrit</th>
			</tr>
			<?php for($i = 0; $i < count($etu); $i++) {
				$tabNote = getNote($etu[$i],$semestre);
				$tabCoeff = getCoefficient($etu[$i],$semestre);
				$moyenne = calculMoyenne($tabNote,$tabCoeff);
				$mention = mention($moyenne);
				$inscrit = inscrit($moyenne);
			 ?>
				<tr>
					<td><a href="fiche.php?etu=<?php echo $etu[$i]; ?>&semestre=<?php echo $semestre; ?>&moyenne=<?php echo $moyenne; ?>&mention=<?php echo $mention; ?>"><?php echo $etu[$i]; ?></a></td>
					<td><?php echo getNom($etu[$i]); ?> <?php echo getPrenom($etu[$i]); ?></td>
					<td><?php echo getAge($etu[$i]); ?></td>
					<td><?php echo $moyenne; ?></td>
					<td><?php echo $mention; ?></td>
					<td><?php echo $inscrit; ?></td>
				</tr>
			<?php } ?>
		</table>
		<h1>LES RESULTATS DU 2ème SEMESTRE</h1>
		<table border="1" cellpadding="0" cellspacing="0">
			<tr>
				<th>Numéro ETU</th>
				<th>Nom et Prénom</th>
				<th>Age</th>
				<th>Moyenne</th>
				<th>Mention</th>
				<th>Inscrit</th>
			</tr>
			<?php for($i = 0; $i < count($etu); $i++) {
				$tabNote = getNote($etu[$i],$semestre1);
				$tabCoeff = getCoefficient($etu[$i],$semestre1);
				$moyenne = calculMoyenne($tabNote,$tabCoeff);
				$mention = mention($moyenne);
				$inscrit = inscrit($moyenne);
			 ?>
				<tr>
					<td><a href="fiche.php?etu=<?php echo $etu[$i]; ?>&semestre=<?php echo $semestre1; ?>&moyenne=<?php echo $moyenne; ?>&mention=<?php echo $mention; ?>"><?php echo $etu[$i]; ?></a></td>
					<td><?php echo getNom($etu[$i]); ?> <?php echo getPrenom($etu[$i]); ?></td>
					<td><?php echo getAge($etu[$i]); ?></td>
					<td><?php echo $moyenne; ?></td>
					<td><?php echo $mention; ?></td>
					<td><?php echo $inscrit; ?></td>
				</tr>
			<?php } ?>
		</table>
		<h1>Login prof</h1>
		<form action="traitement.php" method="POST">
			<p>Login : <input type="text" name="login"></p>
			<p>Mot de passe : <input type="password" name="mdp"></p>
			<p><input type="submit" value="Valider"></p>
			<?php if(isset($_GET['error'])) { echo "accès refuse"; } ?>
		</form>
	</body>
</html>












