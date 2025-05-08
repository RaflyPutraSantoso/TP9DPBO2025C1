<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
	function getMahasiswa()
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getMahasiswaById($id)
    {
        $query = "SELECT * FROM mahasiswa WHERE id = $id";
        return $this->execute($query);
    }

	function addMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp) 
                  VALUES ('".$data['nim']."', '".$data['nama']."', '".$data['tempat']."', 
                          '".$data['tl']."', '".$data['gender']."', '".$data['email']."', 
                          '".$data['telp']."')";
        return $this->execute($query);
    }

	function updateMahasiswa($id, $data)
    {
        $query = "UPDATE mahasiswa SET 
                  nim = '".$data['nim']."',
                  nama = '".$data['nama']."',
                  tempat = '".$data['tempat']."',
                  tl = '".$data['tl']."',
                  gender = '".$data['gender']."',
                  email = '".$data['email']."',
                  telp = '".$data['telp']."'
                  WHERE id = $id";
        return $this->execute($query);
    }

	function deleteMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        return $this->execute($query);
    }
}
