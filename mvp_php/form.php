<?php
include("presenter/ProsesMahasiswa.php");

$proses = new ProsesMahasiswa();
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$data = [
    'nim' => '',
    'nama' => '',
    'tempat' => '',
    'tl' => '',
    'gender' => '',
    'email' => '',
    'telp' => ''
];

$title = "Tambah Data Mahasiswa";

if ($action == 'edit' && $id > 0) {
    $mahasiswa = $proses->getMahasiswaById($id);
    if ($mahasiswa) {
        $data = [
            'nim' => $mahasiswa->getNim(),
            'nama' => $mahasiswa->getNama(),
            'tempat' => $mahasiswa->getTempat(),
            'tl' => $mahasiswa->getTl(),
            'gender' => $mahasiswa->getGender(),
            'email' => $mahasiswa->getEmail(),
            'telp' => $mahasiswa->getTelp()
        ];
        $title = "Edit Data Mahasiswa";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2><?php echo $title; ?></h2>
        <form action="process.php" method="post">
            <input type="hidden" name="action" value="<?php echo $action; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat" class="form-control" value="<?php echo $data['tempat']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tl" class="form-control" value="<?php echo $data['tl']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="gender" class="form-control" required>
                    <option value="Laki-laki" <?php echo ($data['gender'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo ($data['gender'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telp" class="form-control" value="<?php echo $data['telp']; ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>