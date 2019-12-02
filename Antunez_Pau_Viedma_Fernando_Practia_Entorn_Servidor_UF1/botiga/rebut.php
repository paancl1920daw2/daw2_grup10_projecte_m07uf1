<HTML>
<HEAD>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<TITLE>Accés a la sessió com a user</TITLE>
</HEAD>
<BODY>
<?php
  session_start();
  if(($_POST['Rebut'])){

    $nom_fitxer="rebut.txt";
    $compra=$_COOKIE[ 'monitorcookie' ]." - Monitor Ordinador 30 Polgades"."\r\n".$_COOKIE[ 'portatilcookie' ]." - Asus 324"."\r\n".$_COOKIE[ 'ratolicookie' ]." - Ratolí Gaming LED"."\r\n";
    if (file_exists($nom_fitxer)){
        $fitxer=fopen($nom_fitxer,"a") or die ("No s'ha pogut efectuar el rebut");
        fwrite($fitxer,$compra);
        fclose($fitxer);
        echo "S'ha efectuat el rebut";
}	else {
    $fitxer=fopen($nom_fitxer,"w") or die ("No s'ha pogut crear el rebut");
    fwrite($fitxer,$compra);
    fclose($fitxer);
    echo "S'ha creat el rebut<br>";
}


}
?>
</BODY>
</HTML>