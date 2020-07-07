<?php
require_once 'Templates/template.php';
require_once 'View/Templates/navbar.php';
?>

<body>
<div class="container">
	<br>
	<h1>MWP-Systems</h1>
	<br>
	<p>
		Hier steht irgendwas zum Unternehmen....
		Und vielleicht noch irgendwas anderes :D!!

        <br>
        <br>
        <br>
        <br>
        <br>

        <?php
        $a = array(17, 28, 30);
        $b = array(99, 16, 8);

        function compareTriplets($a, $b)
        {
	        echo 'Aufgabe Compare Values:';
	        $alice = 0;
	        $bob = 0;
	        $arrayI = count($a);
	        $arrayI--;

	        for ($i = 0; $i <= $arrayI; $i++) {
		        if ($a[$i] < $b[$i]) {
			        $bob++;
		        }
		        if ($a[$i] > $b[$i]) {
			        $alice++;
		        }
	        }
	        echo $alice . ' ' . $bob;
        }
        $result = compareTriplets($a, $b);

        echo '<br>';
        ?>

	</p>
</div>
</body>
