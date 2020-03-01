<?php

namespace classes\article;

use classes\database\DatabaseConnector;

class Article
{
	public function getAll()
	{
		$conn = DatabaseConnector::getAccess();
		$sql = 'SELECT
       	artikelstammdaten.id,
       	artikelstammdaten.artikelnummer, 
       	artikelstammdaten.match_code AS Matchcode, 
       	artikelstammdaten.bezeichnung, 
       	artikelstammdaten.spezifikation,
        lieferanten.match_code AS Lieferant,
       	artikelstammdaten.bestellnummer1 AS Bestellnummer,
		artikelstammdaten.lagerort, 
       	artikelstammdaten.bestand,
       	artikelstammdaten.id_warengruppe AS Warengruppe
		FROM artikelstammdaten
		LEFT JOIN lieferanten on artikelstammdaten.id_lieferant1 = lieferanten.id';
		return $conn->query($sql);
	}
}