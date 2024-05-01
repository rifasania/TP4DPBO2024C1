<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Buku.controller.php");

$buku = new BukuController();

if (isset($_POST['add'])) {
    //memanggil add
    $buku->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $buku->delete($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $buku->edit($id);
}
else{
    $buku->index();
}

