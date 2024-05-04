<?php

include_once("KontrakPresenter.php");

class ProsesPasien implements KontrakPresenter {
	/* Attributes */

	private $tabelpasien; // Variable to control database action (model)
	private $data = []; // Array to contain records

	/* Methods */

	// Constructor
	function __construct(){
		try {
			$db_host = "localhost";
			$db_user = "root";
			$db_password = "";
			$db_name = "mvp_php";
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array();
		} catch (Exception $e) {
			echo "Fetch Error, Check Presenter Construct: " . $e->getMessage();
		}
	}

	// Show all pasien data
	function prosesDataPasien() {
		// No fucking idea how this works (my php array understanding sucks)
		try {
			// Open and get records from the pasien table
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();

			// So rows are records fetched from db, (array form) then you can access it as if it were an actl array
			while ($row = $this->tabelpasien->getResult()) {
				$pasien = new Pasien(); //Each pasien is a new object
				$pasien->setId($row['id']); 
				$pasien->setNik($row['nik']);
				$pasien->setNama($row['nama']); 
				$pasien->setTempat($row['tempat']); 
				$pasien->setTl($row['tl']);
				$pasien->setGender($row['gender']); 
				$pasien->setEmail($row['email']);
				$pasien->setTelp($row['telp']); 


				$this->data[] = $row; // Is this append or smth? why isn't there an indicator like data.append()? php sucks
			}
			$this->tabelpasien->close();
		} catch (Exception $e) {
			echo "Process Error, Check Presenter Process: " . $e->getMessage();
		}
	}
	
	// Fetch ID-specific record
	function fetchDataPasien($id) {
		try {
			// Open and get the record from the pasien table based on ID
			$this->tabelpasien->open();
			$this->tabelpasien->getPasienByID($id);

			// Fetch the record
			$row = $this->tabelpasien->getResult();
			if ($row) {
				$pasien = new Pasien(); // Create a new Pasien object
				$pasien->setId($row['id']); 
				$pasien->setNik($row['nik']);
				$pasien->setNama($row['nama']); 
				$pasien->setTempat($row['tempat']); 
				$pasien->setTl($row['tl']);
				$pasien->setGender($row['gender']); 
				$pasien->setEmail($row['email']);
				$pasien->setTelp($row['telp']); 

				// Store the fetched record in the data array
				$this->data[] = $row;
			} else {
				// Handle the case when no record is found for the given ID
				echo "No record found for ID: $id";
			}

			// Close the connection
			$this->tabelpasien->close();
		} catch (Exception $e) {
			// Handle any exceptions that occur during the process
			echo "Process Error, Check Presenter Process: " . $e->getMessage();
		}
	}


	function createDataPasien($data) {
		try {
			$pasien = new Pasien(); // Each pasien is a new object
			$pasien->setNik($data['nik']);
			$pasien->setNama($data['nama']); 
			$pasien->setTempat($data['tempat']); 
			$pasien->setTl($data['tl']);
			$pasien->setGender($data['gender']); 
			$pasien->setEmail($data['email']);
			$pasien->setTelp($data['telp']); 
		
			$this->tabelpasien->open();
			$this->tabelpasien->createPasien(
				$pasien->getNik(), 
				$pasien->getNama(), 
				$pasien->getTempat(), 
				$pasien->getTl(), 
				$pasien->getGender(), 
				$pasien->getEmail(), 
				$pasien->getTelp()
			);
			$this->tabelpasien->close();
		} catch (Exception $e) {
			echo "Create Error, Check Presenter Create: " . $e->getMessage();
		}

		header("location:index.php");
	}

	function updateDataPasien($data) {
		try {
			$pasien = new Pasien(); // Each pasien is a new object
			$pasien->setID($data['id']);
			$pasien->setNik($data['nik']);
			$pasien->setNama($data['nama']); 
			$pasien->setTempat($data['tempat']); 
			$pasien->setTl($data['tl']);
			$pasien->setGender($data['gender']); 
			$pasien->setEmail($data['email']);
			$pasien->setTelp($data['telp']); 
		
			$this->tabelpasien->open();
			$this->tabelpasien->updatePasien(
				$pasien->getID(), 
				$pasien->getNik(), 
				$pasien->getNama(), 
				$pasien->getTempat(), 
				$pasien->getTl(), 
				$pasien->getGender(), 
				$pasien->getEmail(), 
				$pasien->getTelp()
			);
			$this->tabelpasien->close();
		} catch (Exception $e) {
			echo "Update Error, Check Presenter Update: " . $e->getMessage();
		}

		header("location:index.php");
	}

	function deleteDataPasien($id) {
		try {
			$pasien = new Pasien(); // Each pasien is a new object
			$pasien->setID($id);

			$this->tabelpasien->open();
			$this->tabelpasien->deletePasien($pasien->getID());
			$this->tabelpasien->close();
		} catch (Exception $e) {
			echo "Delete Error, Check Presenter Delete: " . $e->getMessage();
		}

		header("location:index.php");
	}

	// Getter
	function getId($i) { return $this->data[$i]['id']; }
	function getNik($i) { return $this->data[$i]['nik']; }
	function getNama($i) { return $this->data[$i]['nama']; }
	function getTempat($i) { return $this->data[$i]['tempat']; }
	function getTl($i) { return $this->data[$i]['tl']; }
	function getGender($i) { return $this->data[$i]['gender']; }
	function getEmail($i) { return $this->data[$i]['email']; }
	function getTelp($i) { return $this->data[$i]['telp']; }
	function getSize() { return sizeof($this->data); }

}
