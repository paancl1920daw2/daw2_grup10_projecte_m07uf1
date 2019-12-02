<?php session_start(); ?>
<HTML>
<HEAD>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</HEAD>
<BODY>
	<?php
//	session_start();
	$_SESSION['acces']=0;
	session_unset();
	session_destroy();	
	echo "Heu sortit del sistema<BR><BR>\n";
	echo "<a href=index.html class='btn btn-dark m-4'>Torneu a l'inici</a>\n";
	print '<META HTTP-EQUIV="refresh" CONTENT="2;URL=./index.html">';
	?>
</BODY>
</HTML>	
