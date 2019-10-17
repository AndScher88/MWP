<!DOCTYPE html>
<html>
	<head>
		<title>Wie viel Uhr ist es?!</title>
	</head>
	<body>
		<h1>Die aktuelle Uhrzeit:</h1>
		<?php
			$jetzt = new DateTime();
			$jetzt = $jetzt->format("d.m.Y H:i:s");
			echo "Datum /Uhrzeit: $jetzt";
			$tage = 0;
			if(isset($_GET["tage"]))
				$tage = intval($_GET["tage"]);
			if($tage != 0)
			{
				$jetzt = new DateTime();
				$jetzt->modify("+$tage day");
				$jetzt = $jetzt->format("d.m.Y H:i:s");
				echo "<p>In $tage Tagen: $jetzt</p>";
			}
		?>
				
		<form>
			<p>
				<label> Heute in </label>
				<input type= "text" name="tage">
				<label>Tagen</label>
			</p>
			
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
	</html>