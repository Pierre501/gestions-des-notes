<?php 
include("connexion.php");
function checkLogin($login,$mdp)
{
	$bdd = dbconnect();
	$sql = "select * from admin where Login = '%s' and Mdp = '%s'";
	$sql = sprintf($sql,$login,$mdp);
	$resultat = mysqli_query($bdd,$sql);
	$rows = mysqli_num_rows($resultat);
	return $rows;
}
function getNumEtu()
{
	$i = 0;
	$numEtu = array();
	$bdd = dbconnect();
	$resulat = mysqli_query($bdd,"select * from etudiant");
	while($rows = mysqli_fetch_assoc($resulat))
	{
		$numEtu[$i] = $rows['ETU'];
		$i++;
	}
	return $numEtu;
}
function getNom($etu)
{
	$nom = "";
	$bdd = dbconnect();
	$sql = "select * from etudiant where ETU ='%s'";
	$sql = sprintf($sql,$etu);
	$resulat = mysqli_query($bdd,$sql);
	while($rows = mysqli_fetch_assoc($resulat))
	{
		$nom = $rows['Nom'];
	}
	return $nom;
}
function getPrenom($etu)
{
	$prenom = "";
	$bdd = dbconnect();
	$sql = "select * from etudiant where ETU ='%s'";
	$sql = sprintf($sql,$etu);
	$resulat = mysqli_query($bdd,$sql);
	while($rows = mysqli_fetch_assoc($resulat))
	{
		$prenom = $rows['Prenom'];
	}
	return $prenom;
}
function getNote($etu,$semestre)
{
	$i = 0;
	$bdd = dbconnect();
	$notes = array();
	$sql = "select * from v_notes where ETU = '%s' and Semestre ='%s'";
	$sql = sprintf($sql,$etu,$semestre);
	$resultat = mysqli_query($bdd,$sql);
	while($rows = mysqli_fetch_assoc($resultat))
	{
		$notes[$i] = $rows['Valeur'];
		$i++; 
	}
	return $notes;
}
function getCoefficient($etu,$semestre)
{
	$i = 0;
	$bdd = dbconnect();
	$credit = array();
	$sql = "select * from v_notes where ETU = '%s' and Semestre ='%s'";
	$sql = sprintf($sql,$etu,$semestre);
	$resultat = mysqli_query($bdd,$sql);
	while($rows = mysqli_fetch_assoc($resultat))
	{
		$credit[$i] = $rows['Credit'];
		$i++; 
	}
	return $credit;
}
function getIntitule($semestre)
{
	$i = 0;
	$bdd = dbconnect();
	$intitule = array();
	$sql = "select * from matiere where Semestre = '%s'";
	$sql = sprintf($sql,$semestre);
	$resultat = mysqli_query($bdd,$sql);
	while($rows = mysqli_fetch_assoc($resultat))
	{
		$intitule[$i] = $rows['Intitule'];
		$i++; 
	}
	return $intitule;
}
function inscrit($moyenne)
{
	$inscrit = "";
	if($moyenne>=10)
	{
		$inscrit = "M1 en informatique";
	}
	else
	{
		$inscrit = "Récale";
	}
	return $inscrit;
}
function getAge($etu)
{
	$age = 0;
	$bdd = dbconnect();
	$sql = "select (year(now())-year(Date_de_naissance)) as Age from etudiant";
	$resultat = mysqli_query($bdd,$sql);
	while($rows = mysqli_fetch_assoc($resultat))
	{
		$age = $rows['Age'];
	}
	return $age;
}
function calculMoyenne($note,$coeff)
{
    $nbNotes=count($note);
    $nbCoef=count($coeff);
    $moyenne=0;
    $TotalNote = 0;
    
    for($i=0;$i<$nbNotes;$i++)
    {
        $TotalNote = $TotalNote + ( $note[$i]* $coeff[$i] ) ;

    }
    $moyenne = $TotalNote / calculTotalCoefficient($coeff);
    return number_format($moyenne,2); 
}
function calculTotalCoefficient($coeff)
{
    $nbCoeff=count($coeff);
    $TotalCoeff = 0;
    
    for($i=0;$i<$nbCoeff;$i++)
    {
        $TotalCoeff = $TotalCoeff +  $coeff[$i] ;

    }
    return $TotalCoeff;
}

function mention($moyenne)
{
    $mention="";
    if($moyenne<10){
        $mention="Recalé";
    }else if($moyenne <12 && $moyenne >=10){
        $mention="Passable";
    }else if($moyenne <14 && $moyenne >=12){
        $mention="Assez-bien";
    }else if($moyenne <16 && $moyenne >=14){
        $mention="Bien";
    }else if($moyenne >16){
        $mention="Très bien";
    }
    return $mention;
}

?>