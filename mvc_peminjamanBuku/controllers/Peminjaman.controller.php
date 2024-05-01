<?php
include_once("conf.php");
include_once("models/Peminjaman.class.php");
include_once("models/Members.class.php");
include_once("models/Buku.class.php");
include_once("views/Peminjaman.view.php");

class PeminjamanController {
  private $peminjaman;

  function __construct(){
    $this->peminjaman = new Peminjaman(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->buku = new Buku(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->peminjaman->open();
    $this->members->open();
    $this->buku->open();
    $this->peminjaman->getPeminjaman();
    $this->members->getMembers();
    $this->buku->getBuku();
    
    $data = array(
      'peminjaman' => array(),
      'members' => array(),
      'buku' => array()
    );
    while($row = $this->peminjaman->getResult()){
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
      array_push($data['peminjaman'], $row);
    }
    while($row = $this->members->getResult()){
      array_push($data['members'], $row);
    }
    while($row = $this->buku->getResult()){
      array_push($data['buku'], $row);
    }
    $this->peminjaman->close();
    $this->members->close();
    $this->buku->close();

    $view = new PeminjamanView();
    $view->render($data);
  }

  
  function add($data){
    $this->peminjaman->open();
    $this->peminjaman->add($data);
    $this->peminjaman->close();
    
    header("location:peminjaman.php");
  }

  function edit($id){
    $this->peminjaman->open();
    $this->peminjaman->statusPeminjaman($id);
    $this->peminjaman->close();
    
    header("location:peminjaman.php");
  }

  function delete($id){
    $this->peminjaman->open();
    $this->peminjaman->delete($id);
    $this->peminjaman->close();
    
    header("location:peminjaman.php");
  }


}