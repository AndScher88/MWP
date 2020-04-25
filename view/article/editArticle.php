<?php
require_once 'view/templates/template.php';
require_once 'view/templates/navbar.php';



?>
<title>Artikel anlegen</title>
<body>
<div class="container">
	<br>
	<h1 style="text-align: center">Artikel anlegen</h1>
	<br>
	<form class="container-form" action="/article/update" method="post">
		<div>
			<label class="label-headline">Bitte hier die Daten des neuen Artikels eingeben: </label>
		</div>
		<div class="form-form">
			<label id="artikelnummerlabel" for="artikelnummer">Artikelnummer:</label>
			<input type="text" name="artikelnummer" id="artikelnummer" aria-describedby="artikelnummerlabel"
                   value="<?php echo $artikelnummer; ?>" required>
			<label id="typlabel" for="typ">Typ:</label>
			<input type="text" name="typ" id="typ" aria-describedby="typlabel" required>
			<label id="bezeichnunglabel" for="bezeichnung">Bezeichnung:</label>
			<input type="text" name="bezeichnung" id="bezeichnung"
			       aria-describedby="bezeichnunglabel" required>
			<label id="spezifikationlabel" for="spezifikation">Spezifikation:</label>
			<input type="text" name="spezifikation" id="spezifikation"
			       aria-describedby="spezifikationlabel" required>
			<label id="erw.spezilabel" for="erw.spezi">erw. Spezifikation:</label>
			<input type="text" name="erw.spezi" id="erw.spezi" aria-describedby="erw.spezilabel">
			<label id="herstellerlabel" for="hersteller">Hersteller:</label>
			<input type="text" name="hersteller" id="hersteller" aria-describedby="herstellerlabel" required>
			<label id="bestandlabel" for="bestand">Bestand:</label>
			<input type="number" name="bestand" id="bestand" aria-describedby="bestandlabel">
			<label id="warengruppelabel" for="warengruppe">Warengruppe:</label>
			<select name="warengruppe" id="warengruppe">
				<option value="">Wählen...</option>
				<option value="Klemmen">Klemmen</option>
				<option value="Leucht-Zubehör">Leucht-Zubehör</option>
				<option value="Schalter-Zubehör">Schalter-Zubehör</option>
				<option value="Überspannungs-Ableiter">Überspannungs-Ableiter</option>
				<option value="Schaltelemente">Schaltelemente</option>
				<option value="Transformator">Transformator</option>
			</select>
			<br>
			<div role="group" aria-label="hinzufügen">
				<button class="submit-btn" value="Submit">Artikel anlegen</button>
			</div>
		</div>
	</form>
</div>
</body>
