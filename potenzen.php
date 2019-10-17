<?php
	$title = "Berechnung von Potenzen";
	$subtitle = "Hier geht es weiter";
	$image = "/img/html.jpg";
	$autor = "Andrej Scherer";
	$date = "21 Juli 2019";
?>
<?php include "template.php"?>
<h3>Berechnen von Zweier-Potenzen</h3>
	<body>
		<form>
		<?php
			$a = 2;
			$potenz = 0;
			if (isset($_GET["potenz"]))
				$potenz = intval($_GET["potenz"]);
			if ($potenz != 0)
			{
				$ergebnis = pow($a,$potenz);
			echo "<p>Die Zweier-Potenz von $potenz ist $ergebnis</p>";
			}
		?>
			<p>
				<label> Berechnen der zweier Potenz </label>
				<input type= "text" name="potenz">
				<label>Tagen</label>
			</p>
				<button> Absenden</p>
			</p>
		</form>
	</body>
