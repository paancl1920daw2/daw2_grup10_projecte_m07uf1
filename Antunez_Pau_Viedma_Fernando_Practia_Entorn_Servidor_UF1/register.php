<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<title>Accés a la sessió com a user</title>
</head>
<body>
<?php
  if(($_POST["nom"]!="") && ($_POST["clau"]!="")) {
	$nom_fitxer="usuaris.txt";
	$usuari=$_POST["nom"].":".$_POST["clau"].":"."\r\n";
	
	// El caràcter ":" s'utilitza com a separador de nom d'usuari i contrasenya
	if (file_exists($nom_fitxer)){
		if (strlen($_POST["clau"])<6){
			echo "<b>NO S'HA POGUT AFEGIR UN NOU USUARI A L'APLICACIÓ</b><br>";
			echo "La contrasenya ha de ser major de 6 caracters";
		}
		else{

		$fitxer=fopen($nom_fitxer,"a") or die ("No s'ha pogut afegir un nou usuari a la llista d'usuaris de l'aplicació");
		fwrite($fitxer,$usuari);
		fclose($fitxer);
		echo "<b>AFEGINT UN NOU USUARI A L'APLICACIÓ</b><br>";
		echo "S'ha afegit <b>".$_POST["nom"]."</b> a la llista d'usuaris de l'aplicació<br>";
		echo "Per fer login ves <a href=index.html class='btn btn-dark ml-2'>aquí</a>";
		}
	}
	else {
		if (strlen($_POST["clau"])<6){
			echo "<b>NO S'HA POGUT AFEGIR UN NOU USUARI A L'APLICACIÓ</b><br>";
			echo "La contrasenya ha de ser major de 6 caracters";
		}
		else{
		$fitxer=fopen($nom_fitxer,"w") or die ("No s'ha pogut crear la llista d'usuari de l'aplicació i afegir-ne el primer usuari");
		fwrite($fitxer,$usuari);
		fclose($fitxer);
		echo "<b>AFEGINT UN NOU USUARI A L'APLICACIÓ</b><br>";
		echo "S'ha creat el fitxer amb la llista d'usuaris i s'ha afegit <b>".$_POST["nom"]."</b> a la llista d'usuaris de l'aplicació<br>";
		echo "S'ha afegit <b>".$_POST["nom"]."</b> a la llista d'usuaris de l'aplicació<br>";
		echo "Per fer login ves <a href=index.html class='btn btn-dark ml-2'>aquí</a>";
		}
	}
  }
	else echo "<b>NO HI HA DADES DISPONIBLES PER CREAR USUARIS DE L'APLICACIÓ</b><br>";
//  header("refresh: 3; url=../index.html");
?>
</BODY>
</HTML>