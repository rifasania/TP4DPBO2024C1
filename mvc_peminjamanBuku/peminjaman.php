<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Peminjaman.controller.php");

$peminjaman = new PeminjamanController();

if (isset($_POST['add'])) {
    //memanggil add
    $peminjaman->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $peminjaman->delete($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $peminjaman->edit($id);
}
else{
    $peminjaman->index();
}

