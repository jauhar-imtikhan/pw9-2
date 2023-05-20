<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdata extends Model
{
    public function getPengarang()
    {
        $sql = "SELECT * FROM pengarang ORDER BY Nama_Pengarang";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getResultArray();
        } else {
            return 0;
        }
    }

    public function getPenerbit()
    {

        $sql = "SELECT * FROM penerbit ORDER BY Nama_Penerbit";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getResultArray();
        } else {
            return 0;
        }
    }

    public function getTotalBuku()
    {

        $sql = "SELECT COUNT(*) AS Jumlah FROM buku";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function getMaxTahun()
    {
        $sql = "SELECT Tahun_Terbit, COUNT(*) AS Jumlah FROM buku GROUP BY Tahun_Terbit ORDER BY COUNT(*) DESC LIMIT 1 ";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function getbre()
    {
        $sql = "SELECT * FROM buku_view WHERE Penerbit = 'Andi Publisher'";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getResultArray();
        } else {
            return 0;
        }
    }

    public function getMaxPenerbit()
    {
        $sql = "SELECT Penerbit, COUNT(*) AS Jumlah FROM buku_view GROUP BY Penerbit ORDER BY COUNT(*) DESC LIMIT 1";
        // $sql = "SELECT Nama_Penerbit, COUNT(*) as Jumlah FROM buku 
        // INNER JOIN penerbit ON buku.ID_Penerbit = penerbit.ID_Penerbit
        // INNER JOIN pengarang ON buku.ID_Pengarang = pengarang.ID_Pengarang
        // GROUP BY Nama_Penerbit ORDER BY COUNT(*) DESC LIMIT 1";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRow();
        } else {
            return 0;
        }
    }

    public function getMaxRak()
    {
        $sql = "SELECT SUBSTRING(Rak, 1, 1) AS Rak, COUNT(*) AS Jumlah FROM buku GROUP BY SUBSTRING(Rak, 1,1) ORDER BY COUNT(*) DESC LIMIT 1";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function TambahData($kode, $judul, $isbn, $pengarang, $penerbit, $tahun, $rak)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('buku');
        $data = [
            'Kode_Buku' => $kode,
            'Judul' => $judul,
            'ID_Pengarang' => $pengarang,
            'ID_Penerbit' => $penerbit,
            'ISBN' => $isbn,
            'Tahun_Terbit' => $tahun,
            'Rak' => $rak
        ];
        $dt = $builder->insert($data);
        if ($dt) {
            return "1";
        } else {
            return "0";
        }
    }

    public function getbook()
    {
        $sql = "SELECT * FROM buku 
        INNER JOIN penerbit ON buku.ID_Penerbit = penerbit.ID_Penerbit
        INNER JOIN pengarang ON buku.ID_Pengarang = pengarang.ID_Pengarang";
        $dt = db_connect()->query($sql);
        return $dt;
    }

    public function Book()
    {
        $sql = "SELECT * FROM buku 
        INNER JOIN penerbit ON buku.ID_Penerbit = penerbit.ID_Penerbit
        INNER JOIN pengarang ON buku.ID_Pengarang = pengarang.ID_Pengarang";
        // $sql = "SELECT * FROM penerbit";
        $dt = db_connect()->query($sql);
        return $dt;
    }

    public function AmbilData($id)
    {
        $sql = "SELECT * FROM buku 
        INNER JOIN penerbit ON buku.ID_Penerbit = penerbit.ID_Penerbit
        INNER JOIN pengarang ON buku.ID_Pengarang = pengarang.ID_Pengarang
        WHERE Kode_Buku = '$id'";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getResult();
        } else {
            return 0;
        }
    }

    public function UpdateData($kode, $judul, $isbn, $pengarang, $penerbit, $tahun, $rak)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('buku');
        $data = [
            'Judul' => $judul,
            'ID_Pengarang' => $pengarang,
            'ID_Penerbit' => $penerbit,
            'ISBN' => $isbn,
            'Tahun_Terbit' => $tahun,
            'Rak' => $rak
        ];
        $builder->where('Kode_Buku', $kode);
        $dt = $builder->replace($data);
        if ($dt) {
            return "1";
        } else {
            return "0";
        }
    }

    public function DelData($kode)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('buku');
        $builder->where('Kode_Buku', $kode);
        $dt = $builder->delete();
        if ($dt) {
            return "1";
        } else {
            return "0";
        }
    }

    public function RekapDashboard($sql)
    {
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getResult();
        } else {
            return 0;
        }
    }
}
