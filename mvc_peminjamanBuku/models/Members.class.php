<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        // $join_date = $data['join_date'];
        // $members_status = $data['members_status'];

        $query = "INSERT into members values ('', '$name', '$email', '$phone', NOW(), 'Anggota Baru')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM members WHERE members_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function editMembers($id)
    {
        $status = "Anggota Lama";
        $query = "UPDATE members set members_status = '$status' where members_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
