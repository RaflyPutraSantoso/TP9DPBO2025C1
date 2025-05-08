<?php
include("presenter/ProsesMahasiswa.php");

$proses = new ProsesMahasiswa();
$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');

switch ($action) {
    case 'add':
        $data = [
            'nim' => $_POST['nim'],
            'nama' => $_POST['nama'],
            'tempat' => $_POST['tempat'],
            'tl' => $_POST['tl'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'telp' => $_POST['telp']
        ];
        $proses->addMahasiswa($data);
        break;
        
    case 'edit':
        $id = $_POST['id'];
        $data = [
            'nim' => $_POST['nim'],
            'nama' => $_POST['nama'],
            'tempat' => $_POST['tempat'],
            'tl' => $_POST['tl'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'telp' => $_POST['telp']
        ];
        $proses->updateMahasiswa($id, $data);
        break;
        
    case 'delete':
        $id = $_GET['id'];
        $proses->deleteMahasiswa($id);
        break;
}

header("Location: index.php");
exit();