<?php
include_once("conf.php");
include_once("models/Buku.class.php");
include_once("views/Buku.view.php");

class BukuController {
  private $buku;

  function __construct(){
    $this->buku = new Buku(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->buku->open();
    $this->buku->getBuku();
    $data = array();
    while($row = $this->buku->getResult()){
      array_push($data, $row);
    }

    $this->buku->close();

    $view = new BukuView();
    $view->render($data);
  }

  
  function add($data){
    $this->buku->open();
    $this->buku->add($data);
    $this->buku->close();
    
    header("location:buku.php");
  }

  function edit($id){
    $this->buku->open();
    $this->buku->statusBuku($id);
    $this->buku->close();
    
    header("location:buku.php");
  }

  function delete($id){
    $this->buku->open();
    $this->buku->delete($id);
    $this->buku->close();
    
    header("location:buku.php");
  }


}