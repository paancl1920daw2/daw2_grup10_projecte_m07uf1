<HTML>
<HEAD>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="shop.css">
	<TITLE>Benvingut</TITLE>
</HEAD>
<BODY class="text-white bg-dark">

<?php 
	session_start(); 
	$valor = isset($_SESSION['acces']);
	
	if (isset($_SESSION['acces'])!="1"){
		echo "No heu accedit correctament";
		print '<META HTTP-EQUIV="refresh" CONTENT="1;URL=../index.html">';
	}else{ 
		$usuari = 	$_SESSION["nom"];
		echo "Benvingut: ".$usuari;
		
		class Titol{
			private $titol;

			function __construct($titol){
				$this->titol = $titol;
			}
			public function __toString()
   			 {
				return $this->titol;
    		}
		}
		class Producte{
			
			private $imatge;
			public $nom;
			private $descripcio;
			private $preu;
			private $afegirprod;
			private $eliminarprod;
		
			function __construct($imatge,$nom, $descripcio, $preu,$cookie,$nocookie) {
				$this->imatge = $imatge;
				$this->nom = $nom;
				$this->descripcio = $descripcio;
				$this->preu = $preu;
				$this->cookie = $cookie;
				$this->nocookie = $nocookie;
			}
						
			public function comparar($producte){
				return $producte->preu > $this->preu;
			}

			

			function descripcio() {
				echo "<div class='ml-3'>";
				echo "<table class='bg-light float-left' > ";
				echo "<tr>"; 
				echo "<td width='200'>";
				echo "$this->imatge\n";
				echo "<br />";
				echo "$this->nom\n";
				echo "<br />";
				echo "$this->descripcio\n";
				echo "<br />";
				echo "$this->preu € \n";
				echo "<br />";
				echo "<form action='shop.php' method='post'>";
				echo "<input type='Submit' class='btn btn-outline-primary btn-sm' name='$this->cookie' id='button3' value='Afegir a la cistella'>";
				
				echo "<input type='Submit' class='btn btn-outline-danger btn-sm' name='$this->nocookie' id='button3' value='Borrar producte'>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
				
			}
		}

			
		
		$titol= new Titol("Llista de productes");
		echo "<h1 id='title'>".$titol ."</h1>";
		echo "<div id='imagenes'>";
		$producte1= new Producte("<img src=../monitor.jpg class='img' width=300 height=230>","<h5 class='info'>Monitor Ordinador</h5> ", "<h5 class='info2'>30 Polgades</h5>", "<h5 class='info2'>250 euros</h5>","monitorcookie","monitornocookie");
		
		
		$producte1->descripcio();
		
		$producte2= new Producte("<img src=../portatil.jpg class='img' width=300 height=230>","<h5 class='info'>Portatil</h5>", "<h5 class='info2'>Asus 324</h5>", "<h5 class='info2'>600 euros</h5>","portatilcookie","portatilnocookie");
		
		$producte2->descripcio();

		

		$producte3= new Producte("<img src=../ratoli.jpg class='img' width=300 height=230>","<h5 class='info'>Mouse</h5>", "<h5 class='info2'>Mouse Gaming</h5>", "<h5 class='info2'>40 euros</h5>","ratolicookie","ratolinocookie");
		$producte3->descripcio();
		
		echo "</div>";
		echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
				
			echo "<form action='' id='form1' method='post'><br>";
			echo "<input type='checkbox' name='Comparar' value='1'>Comparar preu<br<br>";
			echo "<br><input class='btn btn-primary ml-2' type='submit' name='enviar' value='Enviar'/>";
			echo "</form>";

				//Comparar objectes
				if(isset($_POST['enviar'])){
					if (isset($_POST['Comparar']) == '1'){
						if($producte1->comparar($producte2)){
					echo '<br> El ' .$producte2->nom . ' és més car';
					echo "<br><br>";
				}else {
					echo '<br> El ' . $producte1->nom . ' és més car';
					echo "<br><br>";
				}
				$producte1->comparar($producte2);
			}else echo "";
			
			}

		echo "<div class='ml-2'>";
		echo "<br><br><h1>En la cistella tens els següents productes</h1>";

		
		
		
		if(isset($_POST['monitorcookie'] )){
			
			setcookie( 'monitorcookie', $_COOKIE[ 'monitorcookie' ] + 1, time() + 3600 * 24 );
			
		}
			
			if (isset($_COOKIE[ 'monitorcookie' ])!=0 && isset($_POST['monitornocookie'] )){
				$comptadormonitor=0;
				$mensaje = 'Monitor: '.$comptadormonitor;
				echo $mensaje .'<br>';
			}else if (isset($_POST['portatilcookie'])&& $_COOKIE['monitorcookie']){
				$comptadormonitor=$_COOKIE['monitorcookie'];
				$mensaje = 'Monitor: '.$comptadormonitor;
				echo $mensaje .'<br>';
			}
			else if (isset($_POST['ratolicookie'])&& $_COOKIE['monitorcookie']){
				$comptadormonitor=$_COOKIE['monitorcookie'];
				$mensaje = 'Monitor: '.$comptadormonitor;
				echo $mensaje .'<br>';
			}
			else if (isset($_POST['enviar'])&& $_COOKIE['monitorcookie']){
				$comptadormonitor=$_COOKIE['monitorcookie'];
				$mensaje = 'Monitor: '.$comptadormonitor;
				echo $mensaje .'<br>';
			}
			else if(isset($_COOKIE[ 'monitorcookie' ])!=0){
				$comptadormonitor=$_COOKIE['monitorcookie']+1;
				$mensaje = 'Monitor: '.$comptadormonitor;
				echo $mensaje .'<br>';
		}

			if (isset($_COOKIE['monitorcookie'])==0 && (isset($_POST['monitorcookie']))){
				$comptadormonitor=1;
				$mensaje = 'Monitor: '.$comptadormonitor;
				echo $mensaje .'<br>';

			}

		if(isset($_POST['monitornocookie'] )&& isset( $_COOKIE[ 'monitorcookie' ])!=0  ){				
			setcookie( 'monitorcookie', $_COOKIE[ 'monitorcookie' ] , time() - 3600 * 24 );
					
		}

		if(isset($_POST['portatilcookie'])){
			
			setcookie( 'portatilcookie', $_COOKIE[ 'portatilcookie' ] + 1, time() + 3600 * 24 );
		}

		if (isset($_COOKIE[ 'portatilcookie' ])!=0 && isset($_POST['portatilnocookie'] )){
			$comptadorportatil=0;
			$mensaje2 = 'Portatil: '.$comptadorportatil;
			echo $mensaje2 .'<br>';
		}else if (isset($_POST['monitorcookie'])&& $_COOKIE['portatilcookie']){
			$comptadorportatil=$_COOKIE['portatilcookie'];
			$mensaje2 = 'Portatil: '.$comptadorportatil;
			echo $mensaje2 .'<br>';
		}else if (isset($_POST['ratolicookie'])&& $_COOKIE['portatilcookie']){
			$comptadorportatil=$_COOKIE['portatilcookie'];
			$mensaje2 = 'Portatil: '.$comptadorportatil;
			echo $mensaje2 .'<br>';
		}
		else if (isset($_POST['enviar'])&& $_COOKIE['portatilcookie']){
			$comptadorportatil=$_COOKIE['portatilcookie'];
			$mensaje = 'Portatil: '.$comptadorportatil;
			echo $mensaje .'<br>';
		}
		else if(isset($_COOKIE[ 'portatilcookie' ])!=0){
			$comptadorportatil=$_COOKIE['portatilcookie']+1;
			$mensaje2 = 'Portatil: '.$comptadorportatil;
			echo $mensaje2.'<br>';}

		if (isset($_COOKIE['portatilcookie'])==0 && (isset($_POST['portatilcookie']))){
			$comptadorportatil=1;
			$mensaje2 = 'Portatil: '.$comptadorportatil;
			echo $mensaje2 .'<br>';

		}

		if(isset($_POST['portatilnocookie'])){
				if ( isset( $_COOKIE[ 'portatilcookie' ] ) ) {
			
					setcookie( 'portatilcookie', $_COOKIE[ 'portatilcookie' ] , time() - 3600 * 24 );
					
				}
			}

		if(isset($_POST['ratolicookie'])){
			
				setcookie( 'ratolicookie', $_COOKIE[ 'ratolicookie' ] + 1, time() + 3600 * 24 );
				
			}
			if (isset($_COOKIE[ 'ratolicookie' ])!=0 && isset($_POST['ratolinocookie'] )){
				$comptadorratoli=0;
				$mensaje3 = 'Ratolí: '.$comptadorratoli;
				echo $mensaje3 .'<br>';
			}else if (isset($_POST['monitorcookie'])&& $_COOKIE['ratolicookie']){
				$comptadorratoli=$_COOKIE['ratolicookie'];
				$mensaje3 = 'Ratolí: '.$comptadorratoli;
				echo $mensaje3 .'<br>';
			}
			else if (isset($_POST['portatilcookie'])&& $_COOKIE['ratolicookie']){
				$comptadorratoli=$_COOKIE['ratolicookie'];
				$mensaje3 = 'Ratolí: '.$comptadorratoli;
				echo $mensaje3 .'<br>';
			}
			else if (isset($_POST['enviar'])&& $_COOKIE['ratolicookie']){
				$comptadorratoli=$_COOKIE['ratolicookie'];
				$mensaje3 = 'Ratolí: '.$comptadorratoli;
				echo $mensaje3 .'<br>';
			}	
			else if(isset($_COOKIE[ 'ratolicookie' ])!=0){
					$comptadorratoli=$_COOKIE['ratolicookie']+1;
					$mensaje3 = 'Ratoli: '.$comptadorratoli;
					echo $mensaje3.'<br>';}
		
			

			if (isset($_COOKIE['ratolicookie'])==0 && (isset($_POST['ratolicookie']))){
				$comptadorratoli=1;
				$mensaje3 = 'Ratoli: '.$comptadorratoli;
				echo $mensaje3 .'<br>';
	
			}
	
			if(isset($_POST['ratolinocookie'])){
					if ( isset( $_COOKIE[ 'ratolicookie' ] ) ) {
				
						setcookie( 'ratolicookie', $_COOKIE[ 'ratolicookie' ] , time() - 3600 * 24 );
						
					}
				}	

			$monitor=250*$comptadormonitor;
			$portatil=600*$comptadorportatil;
			$ratoli=40*$comptadorratoli;
			$total=$monitor+$portatil+$ratoli;
			if($total!=0){
			echo "------------"."<br>";
			echo "Total: " . $total . " €";
			echo "<form action='' method='post'><br>";
			echo "<a href=compra.php class='btn btn-success'> Confirmar compra </a>";
			echo "</form>";
			}
			else{
				echo "La cistella está buida";
			}

			

	if(isset($_POST['Comprar'])){
		echo "<div >";
		echo "Has comprat: <br><br>";
		
		echo $_COOKIE[ 'monitorcookie' ]. ' - Monitor Ordinador 30 Polgades<br>';
		
		echo $_COOKIE[ 'portatilcookie' ]. ' - Asus 324<br>';
		
		echo $_COOKIE[ 'ratolicookie' ]. ' - Ratolí Gaming LED<br>';
		echo "</div><br><br>";

		echo "<form action='rebut.php' method='post'><br>";
			echo "<input type='Submit' class='btn btn-warning' name='Rebut' value='Descarregar rebut'>";
			echo "</form>";

	}
}
	?>
<br><br><a href=../logout.php class='btn btn-dark'>Surt de la sessió</a><br><br>
</body>
</html>

