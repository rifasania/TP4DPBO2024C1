<?php

class Buku extends DB
{
    function getBuku()
    {
        $query = "SELECT * FROM buku";
        return $this->execute($query);
    }

    function add($data)
    {
        $judul = $data['judul'];
        $penulis = $data['penulis'];
        $penerbit = $data['penerbit'];
        $tahun_terbit = $data['tahun_terbit'];

        $query = "INSERT into buku values ('', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '-')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM buku WHERE buku_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusBuku($id)
    {

        $status = "Best Seller";
        $query = "UPDATE buku set status = '$status' where buku_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
