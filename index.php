<?php
ini_set('display_errors', 1);
error_reporting(~0);

/******************************************
            Asisten Pemrogaman 13
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");

$template = new TampilPasien();
$pasien = new ProsesPasien();

if (isset($_GET['create'])){
    if(isset($_POST['create'])) { $pasien->createDataPasien($_POST); }
    else { $data = $template->create(); }
}
else if (isset($_GET['update'])){
    if(isset($_POST['update'])) { $pasien->updateDataPasien($_POST); }
    else if (isset($_GET['id'])) { $data = $template->update($_GET['id']); }
}
else if (isset($_GET['delete'])){
    if (isset($_GET['id'])) { $pasien->deleteDataPasien($_GET['id']); }
}
else {
    $data = $template->tampil();
}