<?php
	$title = "Berechnung von irgendwas";
	$subtitle = "Hier geht es weiter";
	$image = "/img/html.jpg";
	$autor = "Andrej Scherer";
	$date = "21 Juli 2019";
?>
<?php include "template.php"?>
	<body>

		<?php
			$jetzt = new DateTime();
			$jetzt = $jetzt->format("d.m.Y H:i:s");
		?>
		<h2>Das aktuelle Datum und Uhrzeit: <?php echo  $jetzt;?></h2>
		<?php
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
				<button> Absenden</p>
			</p>
		</form>
	</body>
