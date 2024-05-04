<?php

/******************************************
			Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB {
	// Get all records
	function getPasien() {
		$query = "SELECT * FROM pasien";
		return $this->execute($query);
	}
	
	// Get specific records
	function getPasienByID($id) {
		$query = "SELECT * FROM pasien WHERE id=$id";
		return $this->execute($query);
	}
	// Insert a record
	function createPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp) {
		$query = "INSERT INTO pasien (id, nik, nama, tempat, tl, gender, email, telp) VALUES (NULL, '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		return $this->execute($query);
	}

	// Update a record
	function updatePasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp) {
		$query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id=$id";
		return $this->execute($query);
	}

	// Delete a record
	function deletePasien($id) {
		$query = "DELETE FROM pasien WHERE id=$id";
		return $this->execute($query);
	}

}
