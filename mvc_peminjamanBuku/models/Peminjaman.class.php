<?php

class Peminjaman extends DB
{
    function getPeminjaman()
    {
        $query = "SELECT * FROM peminjaman JOIN members ON peminjaman.members_id=members.members_id JOIN buku ON peminjaman.buku_id=buku.buku_id ORDER BY peminjaman.peminjaman_id";
        return $this->execute($query);
    }

    function add($data)
    {
        $peminjam = $data['peminjam'];
        $buku = $data['buku'];

        $query = "INSERT into peminjaman values ('', NOW(), '-', '-', '$peminjam', '$buku')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM peminjaman WHERE peminjaman_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusPeminjaman($id)
    {
        $status = "Sudah Dikembalikan";
        // $waktu_pengembalian = NOW();
        $query = "UPDATE peminjaman SET status_pengembalian = '$status', waktu_pengembalian = NOW() WHERE peminjaman_id = '$id'";
        // $query = "UPDATE peminjaman set waktu_pengembalian = '$waktu_pengembalian' where peminjaman_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
