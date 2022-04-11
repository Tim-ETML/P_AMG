<div class="container">
	<p class="text-light bg-secondary">
		<?php
		include_once(".\model\database.php");
		if(isset($_GET["idCar"]) && is_numeric($_GET["idCar"]))
		{
			$id = $_GET["idCar"];
		

		$database = new Database();
		$car = $database->getOneCar($id);
		var_dump($car);
		}
		?>
		</p>
</div>