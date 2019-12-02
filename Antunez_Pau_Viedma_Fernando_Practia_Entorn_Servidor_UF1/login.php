<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<title>Accés a la sessió com a user</title>
</head>
<body>
<?php
session_start();
  if(($_POST["nom"]!="") && ($_POST["clau"]!="")) {

	$nom_fitxer="usuaris.txt";
	if (file_exists($nom_fitxer)){
		$fitxer=fopen($nom_fitxer,"r") or die ("No es pot llegir la llista d'usuaris de l'aplicació");
		$validat=FALSE;
		while (!feof($fitxer) && ($validat == FALSE)){
			$usuari=explode(":",fgets($fitxer));
			if (($usuari[0] == $_POST["nom"]) && ($usuari[1] == $_POST["clau"])) $validat=TRUE;
		}
		fclose($fitxer);
		if ($validat) {
			$_SESSION['acces']=1;
			$_SESSION["nom"] = $_POST["nom"];
			echo  "<body class='text-white bg-dark text-center'><a href=botiga/shop.php class='btn btn-light m-4'>Compra</a></body>";
				
		}
		else echo "L'usuari <b>".$_POST["nom"]."</b> no ha pogut ser validat. Aquest usuari no pot utilitzar l'aplicació<br>";
	}
	}
	else echo "<b>NO HI HA DADES DISPONIBLES PER LA VALIDACIÓ DE L'USUARI DE L'APLICACIÓ</b><br>";
			 
  header("refresh: 5; url=index.html");
?>
</body>
</html>