<?php

require_once 'View/Templates/template.php';
require_once 'View/Templates/navbar.php';
require_once 'View/Templates/flashMessage.php';
echo 'Object Relationship mapper';
echo '<br>';
echo '<br>';
echo '<br>';
try {
$zahl = random_int(1, 100);
} catch (Exception $e) {
}

echo $zahl;
echo '<br>';
echo "Die Zahl ist $zahl";
echo '<br>';
echo 'Die Zahl ist $zahl';
echo '<br>';
echo "Das ist ein tab \n und hier gehts weiter";

echo '<br>';

$test = "Hier ist ein Test";
echo $test;
$b = &$test;

$test = 'das ist die Änderung';
echo $b;
echo '<br>';

/**
 * @param null $param
 * @return string
 */
function test(string $param = null)
{
	$inhalt = <<<HERE
	Inhalt des HERE-Docs über 
	mehrere Zeilen.
	HERE;

	return $inhalt;

}

echo '<br>';

$text = 'PHP ist toll';

var_dump(array(
	'vorname' => 'Andy',
	'nachname' => 'Scherer',
	'alter' => '32',
	'wohnort' => array(
		'Straße' => 'Am Riesenkamp',
		'hausnummer' => '15',
		'stadt' => "Wedel")
));
