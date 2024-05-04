<?php
/******************************************
		Asisten Pemrogaman 13
 ******************************************/
class Pasien {
    /* Attributes */

    var $id = ''; // ID
    var $nik = ''; // SSN
    var $nama = ''; // Name
    var $tempat = ''; // Place of Birth
    var $tl = ''; // Date of Birth
    var $gender = ''; // Gender (bool not float)
    var $email = ''; // Email
    var $telp = ''; // Phone number

    /* Methods */

    // Constructor
    function __construct($id = '', $nik = '', $nama = '', $tempat = '', $tl = '', $gender = '', $email = '', $telp = '') {
        $this->id = $id;
        $this->nik = $nik;
        $this->nama = $nama;
        $this->tempat = $tempat;
        $this->tl = $tl;
        $this->gender = $gender;
        $this->email = $email;
        $this->telp = $telp;
    }

    // Setter
    function setId($id) { $this->id = $id; } 
    function setNik($nik) { $this->nik = $nik; } 
    function setNama($nama) { $this->nama = $nama; } 
    function setTempat($tempat) { $this->tempat = $tempat; } 
    function setTl($tl) { $this->tl = $tl; } 
    function setGender($gender) { $this->gender = $gender; } 
    function setEmail($email) { $this->email = $email; } 
    function setTelp($telp) { $this->telp = $telp; } 

    // Getter
    function getId() { return $this->id; } 
    function getNik() { return $this->nik; } 
    function getNama() { return $this->nama; } 
    function getTempat() { return $this->tempat; } 
    function getTl() { return $this->tl; } 
    function getGender() { return $this->gender; } 
    function getEmail() { return $this->email; } 
    function getTelp() { return $this->telp; }
}
