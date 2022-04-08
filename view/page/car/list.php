<div class="container">

	<h2>Liste des voiture</h2>
	<div class="row">
		<?php
		include_once(".\model\database.php");
		if (isset($_GET["carIndex"]) && is_numeric($_GET["carIndex"])) {
			$carIndex = $_GET["carIndex"];
			$database = new Database();
			$cars = $database->getCarsFromIndex($carIndex);
			foreach ($cars as $car) {
				if ($car) {
					foreach ($car as $carData) {
						$price = $carData["carPrice"];
						echo "<div>
						<h1>$price CHF</h1>
						</div>";
					}//foreach ($car as $carData)
				}//if ($car)
			}//foreach ($cars as $car)
		}
		?>
	</div>
</div>