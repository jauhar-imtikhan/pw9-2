<?php

namespace App\Controllers;

use App\Models\Mdata;

class Basis extends BaseController
{
    public function index()
    {
        $dtx = new Mdata();
        $x["hal"] = "beranda";
        $x['jmlbuku'] = $dtx->getTotalBuku();
        $x['maxtahun'] = $dtx->getMaxTahun();
        $x['maxpenerbit'] = $dtx->getMaxPenerbit();
        $x['maxrak'] = $dtx->getMaxRak();
        $x['mas'] = $dtx->getbre();
        return view('home', $x);
    }

    public function data()
    {
        $dtx = new Mdata();
        $x["hal"] = "book";
        $x['dtpengarang'] = $dtx->getPengarang();
        $x['dtpenerbit'] = $dtx->getPenerbit();
        $x['databuku'] = $dtx->getbook();
        return view('home', $x);
    }

    public function tambah_data()
    {
        $dtx = new Mdata();
        $kode = $this->request->getVar('kodex');
        $judul = $this->request->getVar('judulx');
        $isbn = $this->request->getVar('isbnx');
        $pengarang = $this->request->getVar('pengarangx');
        $penerbit = $this->request->getVar('penerbitx');
        $tahun = $this->request->getVar('tahunx');
        $rak = $this->request->getVar('rakx');
        $prosess = $dtx->TambahData($kode, $judul, $isbn, $pengarang, $penerbit, $tahun, $rak);
        if ($prosess == "1") {
            echo '{"kode": "1", "pesan": "Data Berhasil Di Tambahkan!"}';
        } else {
            echo '{"kode": "0", "pesan": "Data Gagal Di Tambahkan, Periksa Kembali Isian Anda!"}';
        }
    }

    private function os()
    {
        $ux = $_SERVER["HTTP_USER_AGENT"];
        if (preg_match("/linux/i", $ux)) {
            $platform = "Linux";
        } elseif (preg_match("/macintosh|mac os x/i", $ux)) {
            $platform = "macOS";
        } elseif (preg_match("/windows|win32/i", $ux)) {
            $platform = "Windows";
        } else {
            $platform = "Tidak Di Ketahui";
        }
        return $platform;
    }

    private function mac()
    {
        ob_start();
        system('ipconfig /all');
        $mykom = ob_get_contents();
        ob_clean();
        $findme = "Physical";
        $pmac = strpos($mykom, $findme);
        $mac  = substr($mykom, ($pmac + 36), 17);
        return $mac;
    }

    private function serial()
    {
        $seri = shell_exec('wmic diskdrive get serialnumber');
        return $seri;
    }

    public function tentang()
    {
        $x["hal"] = "tentang";
        $x["os"] = $this->os();
        $x["mac"] = $this->mac();
        $getserial = $x["os"] == "windows" ? $this->serial() : "Tidak Terdeteksi";
        $x["serial"] = str_replace("Serial Number", "", $getserial);
        return view('home', $x);
    }

    public function getbuku()
    {
        $model = new Mdata();
        $data = $model->Book()->getResultArray();

        $response = [
            'data' => $data
        ];

        return $this->response->setJSON($response);
    }

    public function AmbilDataBuku()
    {
        $dtx = new Mdata();
        $kode = $this->request->getVar('kodex');
        $hasil = $dtx->AmbilData($kode);
        if (is_array($hasil)) {
            if (count($hasil) > 0) {
                foreach ($hasil as $r) {
                    $judul = $r->Judul;
                    $idpengarang = $r->ID_Pengarang;
                    $idpenerbit = $r->ID_Penerbit;
                    $isbn = $r->ISBN;
                    $tahun = $r->Tahun_Terbit;
                    $rak = $r->Rak;
                }
                echo sprintf(
                    '
                {"kode": "1", "judul": "%s", "pengarang": "%s", "penerbit" : "%s", "isbn" : "%s", "tahun" : "%s", "rak":"%s"}',
                    $judul,
                    $idpengarang,
                    $idpenerbit,
                    $isbn,
                    $tahun,
                    $rak
                );
            } else {
                echo '{"kode" : "0", "pesan": "Data Tidak Di Temukan!"}';
            }
        } else {
            echo '{"kode" : "0", "pesan": "Data Tidak Di Temukan!"}';
        }
    }

    public function UpdateDataBuku()
    {
        $dtx = new Mdata();
        $kode = $this->request->getVar('kodex');
        $judul = $this->request->getVar('judulx');
        $isbn = $this->request->getVar('isbnx');
        $pengarang = $this->request->getVar('pengarangx');
        $penerbit = $this->request->getVar('penerbitx');
        $tahun = $this->request->getVar('tahunx');
        $rak = $this->request->getVar('rakx');
        $prosess = $dtx->UpdateData($kode, $judul, $isbn, $pengarang, $penerbit, $tahun, $rak);
        if ($prosess == "1") {
            echo '{"kode": "1", "pesan": "Data Berhasil Di Tambahkan!"}';
        } else {
            echo '{"kode": "0", "pesan": "Data Gagal Di Tambahkan, Periksa Kembali Isian Anda!"}';
        }
    }

    public function DeleteBuku()
    {
        $kode = $this->request->getVar('kodex');
        $dtx = new Mdata();
        $prosess = $dtx->DelData($kode);
        if ($prosess == "1") {
            echo '{"kode": "1", "pesan": "Data Berhasil Di Hapus!"}';
        } else {
            echo '{"kode": "0", "pesan": "Data Gagal Di Hapus, Periksa Kembali Apakah Kode Buku Sudah Ada!"}';
        }
    }

    public function RekapDashboard()
    {
        $dtx = new Mdata();
        $uri = new \CodeIgniter\HTTP\URI(current_url(true));
        $segments = $uri->getSegments();
        $jenis = $segments[2];
        $nilai = urlencode($segments[3]);
        // $nilai = urlencode(uri_string(3));
        // print_r($nilai);
        if ($jenis == "bytahun") {
            $sql = sprintf("SELECT Judul FROM buku WHERE Tahun_Terbit = '%s'", $nilai);
        } else if ($jenis == "bypenerbit") {
            $hasnilai = str_replace("%2520", " ", $nilai);
            $sql = sprintf("SELECT Judul FROM buku_view WHERE Penerbit = '%s'", $hasnilai);
        } else {
            $sql = "SELECT Judul FROM buku WHERE Rak LIKE '" . $nilai . "%'";
        }
        $result = $dtx->RekapDashboard($sql);
        echo json_encode($result);
        // echo $nilai;
    }
}
