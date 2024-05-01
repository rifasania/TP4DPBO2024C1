<?php
  class PeminjamanView{
    public function render($data){
      $header = 'Peminjaman Buku';
      $no = 1;
      $dataPinjam = null;
      $dataMembers = null;
      $dataBuku = null;
      foreach($data['peminjaman'] as $val){
        // list($id, $nama, $status) = $val;
        list($peminjaman_id, $waktu_peminjaman, $status_pengembalian, $waktu_pengembalian, $members_id, $buku_id) = $val;
        
        // echo "ID Peminjaman: $peminjaman_id, Nama Member: $nama_member, ...";
        
        if ($status_pengembalian == 'Sudah Dikembalikan') {
          $dataPinjam .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $waktu_peminjaman . "</td>
                  <td>" . $status_pengembalian . "</td>
                  <td>" . $waktu_pengembalian . "</td>
                  <td>" . $members_id . "</td>
                  <td>" . $buku_id . "</td>
                  <td>
                  
                  <a href='peminjaman.php?id_hapus=" . $peminjaman_id . "' class='btn btn-danger''>Delete</a>
                  </td>
                  </tr>";
        } else {
          $dataPinjam .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $waktu_peminjaman . "</td>
                    <td>" . $status_pengembalian . "</td>
                    <td>" . $waktu_pengembalian . "</td>
                    <td>" . $members_id . "</td>
                    <td>" . $buku_id . "</td>
                    <td> 
                    <a href='peminjaman.php?id_edit=" . $peminjaman_id .  "' class='btn btn-warning''>Update Status</a>
                    <a href='peminjaman.php?id_hapus=" . $peminjaman_id . "' class='btn btn-danger''>Delete</a>
                    </td>
                    </tr>";
        }
      }

      foreach($data['members'] as $val){
        list($members_id, $name, $email, $phone, $status) = $val;
        $dataMembers .= "<option value='".$members_id."'>".$name."</option>";
      }

      foreach($data['buku'] as $val){
        list($buku_id, $judul, $penulis, $penerbit, $tahun_terbit, $status) = $val;
        $dataBuku .= "<option value='".$buku_id."'>".$judul."</option>";
      }

      $tpl = new Template("templates/peminjaman.html");
      $tpl->replace("DATA_HEADER", $header);
      $tpl->replace("OPTION_MEMBERS", $dataMembers);
      $tpl->replace("OPTION_BUKU", $dataBuku);
      $tpl->replace("DATA_TABEL", $dataPinjam);
      $tpl->write();
    }
  }