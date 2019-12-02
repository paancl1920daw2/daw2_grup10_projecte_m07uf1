<HTML>
<HEAD>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<TITLE>Benvingut</TITLE>
</HEAD>
<BODY class="text-center">

<?php
    session_start(); 
	$valor = isset($_SESSION['acces']);
	
	if (isset($_SESSION['acces'])!="1"){
		echo "No heu accedit correctament";
		print '<META HTTP-EQUIV="refresh" CONTENT="1;URL=../index.html">';
	}else{ 
        $usuari = 	$_SESSION["nom"];
        echo "Conectat com: ".$usuari;
    }

    
		echo "<div >";
		echo "Has comprat: <br><br>";
		
		echo $_COOKIE[ 'monitorcookie' ]. ' - Monitor Ordinador 30 Polgades<br>';
		
		echo $_COOKIE[ 'portatilcookie' ]. ' - Asus 324<br>';
		
		echo $_COOKIE[ 'ratolicookie' ]. ' - Ratolí Gaming LED<br>';
		echo "</div><br><br>";

		echo "<form action='rebut.php' method='post'><br>";
		echo "<input type='Submit' class='btn btn-warning' name='Rebut' value='Descarregar rebut'>";
		echo "</form>";

	

?>
<br><br><a href=../logout.php class='btn btn-dark'>Surt de la sessió</a><br><br>
</body>
</html>