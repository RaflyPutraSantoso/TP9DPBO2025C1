<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
            $no = $i + 1;
            $data .= "<tr>
                <td>" . $no . "</td>
                <td>" . $this->prosesmahasiswa->getNim($i) . "</td>
                <td>" . $this->prosesmahasiswa->getNama($i) . "</td>
                <td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
                <td>" . $this->prosesmahasiswa->getTl($i) . "</td>
                <td>" . $this->prosesmahasiswa->getGender($i) . "</td>
                <td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
                <td>" . $this->prosesmahasiswa->getTelp($i) . "</td>
                <td>
                    <a href='form.php?action=edit&id=".$this->prosesmahasiswa->getId($i)."' class='btn btn-warning'>Edit</a>
                    <a href='process.php?action=delete&id=".$this->prosesmahasiswa->getId($i)."' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                </td>
            </tr>";
        }
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
