<?php

include_once("KontrakView.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView {
	/* Attributes */

	private $prosespasien; // Imagine this as a Controller with interface
	private $tpl; // Template

	/* Methods */

	// Constructor
	function __construct() {
		$this->prosespasien = new ProsesPasien();
	}

	// Render the main index page
	function tampil() {
		$this->prosespasien->prosesDataPasien();
		$data = null;

		// Same concept as MVC
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
				<a class='btn btn-success' href='index.php?update&id=" .$this->prosespasien->getID($i). "'>Edit</a>
				<a class='btn btn-danger' href='index.php?delete&id=" . $this->prosespasien->getID($i). "' onclick='confirmDelete()'>Delete</a>
			</td>
			";

		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	// Render the create page
	function create() {
		// Same concept as MVC
		$data = '
		<div style="display: inline-block; ">
			<h3>Add New Patient</h3>
			<form method="POST" action="index.php?create">
			<div class="form-group">
				<label for="nik">NIK</label>
				<input type="text" class="form-control" id="nik" name="nik" placeholder="Enter NIK">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Name">
			</div>
			<div class="form-group">
				<label for="tempat">Tempat</label>
				<input type="text" class="form-control" id="tempat" name="tempat" placeholder="Enter Place of Birth">
			</div>
			<div class="form-group">
				<label for="tl">Tanggal Lahir</label>
				<input type="date" class="form-control" id="tl" name="tl">
			</div>
			<div class="form-group">
				<label for="gender">Gender</label>
				<select class="form-control" id="gender" name="gender">
				<option value="Laki-Laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
			</div>
			<div class="form-group">
				<label for="telp">No Telp</label>
				<input type="tel" class="form-control" id="telp" name="telp" placeholder="Enter Phone Number">
			</div>
			<button class="btn btn-success" type="submit" name="create"> Create </button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
			</form>
		</div>
		';

		$this->tpl = new Template("templates/form.html");
		$this->tpl->replace("DATA_FORM", $data);
		$this->tpl->write();
	}

	// Render the update page
	function update($id) {
		$this->prosespasien->fetchDataPasien($id);

		// Same concept as MVC
		$data = '
		<div style="display: inline-block; ">
			<h3>Edit Patient</h3>
			<form method="POST" action="index.php?update">
			<div class="form-group">
				<input type="hidden" class="form-control" id="id" name="id" value="'. $this->prosespasien->getID(0) .'">
			</div>
			<div class="form-group">
				<label for="nik">NIK</label>
				<input type="text" class="form-control" id="nik" name="nik" value="'. $this->prosespasien->getNik(0) .'"placeholder="Enter NIK">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control" id="nama" name="nama" value="'. $this->prosespasien->getNama(0) .'"placeholder="Enter Name">
			</div>
			<div class="form-group">
				<label for="tempat">Tempat</label>
				<input type="text" class="form-control" id="tempat" name="tempat" value="'. $this->prosespasien->getTempat(0) .'"placeholder="Enter Place of Birth">
			</div>
			<div class="form-group">
				<label for="tl">Tanggal Lahir</label>
				<input type="date" class="form-control" id="tl" name="tl"value="'. $this->prosespasien->getTl(0) .'">
			</div>
			<div class="form-group">
				<label for="gender">Gender</label>
				<select class="form-control" id="gender" name="gender" value="'. $this->prosespasien->getGender(0) .'">
				<option value="Laki-Laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" value="'. $this->prosespasien->getEmail(0) .'"placeholder="Enter Email">
			</div>
			<div class="form-group">
				<label for="telp">No Telp</label>
				<input type="tel" class="form-control" id="telp" name="telp" value="'. $this->prosespasien->getTelp(0) .'"placeholder="Enter Phone Number">
			</div>
			<button class="btn btn-success" type="submit" name="update"> Update </button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
			</form>
		</div>
		';

		$this->tpl = new Template("templates/form.html");
		$this->tpl->replace("DATA_FORM", $data);
		$this->tpl->write();
	}
}
