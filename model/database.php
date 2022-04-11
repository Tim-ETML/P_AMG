<?php

/**
 * Auteur : Jonathan Dale
 * Date : 07.03.2022
 * Description : File to handle database queries
 */

class Database
{
	private $connector;

	// Connect to the database using PDO. Returns a PDO object
	public function __construct()
	{
		try {
			$this->connector = new PDO('mysql:host=localhost;dbname=db_mercedesamg;charset=utf8', 'dbUser_AMG', '.Etml-');
		} catch (PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}

	//This is used to format data correctly from data received after a query
	private function formatData($req)
	{
		return $req->fetchALL(PDO::FETCH_ASSOC);
	}

	//Deallocate memory for a request. Saves resources
	private function unsetData($req)
	{
		$req->closeCursor();
	}

	//Send a request, get the response and deallocate the request object
	private function querySimpleExecute(string $query)
	{
		$req = $this->connector->query($query);
		$req->execute();
		$result = $this->formatData($req);
		$this->unsetData($req);
		return $result;
	}

	//Function to prepare a query. Mostly used to prevent SQL injections
	private function queryPrepareExecute($query, $binds)
	{
		$req = $this->connector->prepare($query);
		foreach ($binds as $bind) {
			$req->bindValue($bind[0], $bind[1], $bind[2]);
		}
		$req->execute();
		$result = $this->formatData($req);
		$this->unsetData($req);
		return $result;
	}

	//Deallocate the PDO object which is used for the connection to the MySQL database
	public function closeConnection()
	{
		$this->connector = null;
		unset($this->connector);
	}

	//Get the number of cars contained in the database
	public function getTotalNumOfCars()
	{
		return ($this->querySimpleExecute("SELECT COUNT(*) FROM db_mercedesamg.t_car;"))[0]["COUNT(*)"];
	}

	//Function to get a specific number of cars starting from an index
	public function getCarsFromIndex($idStart)
	{
		$countOfCars = $this->getTotalNumOfCars();
		$carData = [];
		for ($i = $idStart; $i < $idStart + 5; $i++) {
			$car = $this->querySimpleExecute("SELECT idCar, carModel, carPrice, carEngineHorsePower, carMaxSpeed, carZeroToHundredKM FROM db_mercedesamg.t_car WHERE idCar = $i");
			$carData[$i] = $car;
		}
		return $carData;
	}
}
