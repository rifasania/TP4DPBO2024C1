<?php
  class BukuView{
    public function render($data){
      $header = 'Buku';
      $no = 1;
      $dataBuku = null;
      foreach($data as $val){
        // list($id, $nama, $status) = $val;
        list($buku_id, $judul, $penulis, $penerbit, $tahun_terbit, $status) = $val;
        // $dataBuku .= "<tr>
        //           <td>" . $no++ . "</td>
        //           <td>" . $judul . "</td>
        //           <td>" . $penulis . "</td>
        //           <td>" . $penerbit . "</td>
        //           <td>" . $tahun_terbit . "</td>
        //           <td>
        //           <a href='index.php?id_edit=" . $buku_id .  "' class='btn btn-warning''>Update Status</a>
        //           <a href='index.php?id_hapus=" . $buku_id . "' class='btn btn-danger''>Delete</a>
        //           </td>
        //           </tr>";
        if ($status == '-') {
          $dataBuku .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $judul . "</td>
                  <td>" . $penulis . "</td>
                  <td>" . $penerbit . "</td>
                  <td>" . $tahun_terbit . "</td>
                  <td>" . $status . "</td>
                  <td>
                  <a href='buku.php?id_edit=" . $buku_id .  "' class='btn btn-warning''>Update Status</a>
                  <a href='buku.php?id_hapus=" . $buku_id . "' class='btn btn-danger''>Delete</a>
                  </td>
                  </tr>";
        } else {
          $dataBuku .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $judul . "</td>
                    <td>" . $penulis . "</td>
                    <td>" . $penerbit . "</td>
                    <td>" . $tahun_terbit . "</td>
                    <td>" . $status . "</td>
                    <td>                    
                    <a href='buku.php?id_hapus=" . $buku_id . "' class='btn btn-danger''>Delete</a>
                    </td>
                    </tr>";
        }
      }

      $tpl = new Template("templates/buku.html");
      $tpl->replace("DATA_HEADER", $header);
      $tpl->replace("DATA_TABEL", $dataBuku);
      $tpl->write();
    }
  }