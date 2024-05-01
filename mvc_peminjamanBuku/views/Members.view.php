<?php
  class MembersView{
    public function render($data){
      $header = 'Member';
      $no = 1;
      $dataMembers = null;
      foreach($data as $val){
        list($members_id, $name, $email, $phone, $join_date, $members_status) = $val;
        
        if ($members_status == 'Anggota Lama') {
          $dataMembers .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $name . "</td>
                  <td>" . $email . "</td>
                  <td>" . $phone . "</td>
                  <td>" . $join_date . "</td>
                  <td>" . $members_status . "</td>
                  <td>
                  <a href='index.php?id_hapus=" . $members_id . "' class='btn btn-danger''>Hapus</a>
                  </td>
                  </tr>";
        } else {
          $dataMembers .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $name . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>" . $members_status . "</td>
                    <td>
                    <a href='index.php?id_edit=" . $members_id .  "' class='btn btn-warning''>Edit</a>
                    <a href='index.php?id_hapus=" . $members_id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
        }
      }

      $tpl = new Template("templates/index.html");
      $tpl->replace("DATA_HEADER", $header);
      $tpl->replace("DATA_TABEL", $dataMembers);
      $tpl->write();
    }
  }