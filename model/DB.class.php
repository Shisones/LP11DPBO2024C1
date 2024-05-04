<?php
/******************************************
			Asisten Pemrogaman 13
 ******************************************/
class DB {
	/* Attributes */

	var $db_host = '';  // Hostname
	var $db_user = ''; // Username
	var $db_password = ''; // Password
	var $db_name = ''; // Database name
	var $db_link = ''; // Database connection

	var $result = 0; // To handle affected rows

	/* Methods */

	// Constructor
	function __construct($db_host = '', $db_user = '', $db_password = '', $db_name = '') {
		$this->db_host = $db_host;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
		$this->db_name = $db_name;
	}

	// Open a database connection
	function open() {
		$this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
	}

	// Execute a query
	function execute($query = "") {
		$this->result = mysqli_query($this->db_link, $query);

		return $this->result;
	}

	// Return a query result
	function getResult() {
		return mysqli_fetch_array($this->result);
	}

	// Close a database connection
	function close() {
		mysqli_close($this->db_link);
	}
}
