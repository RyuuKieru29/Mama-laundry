<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
</head>
<body>

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="post" action="<?= base_url('paket/update'); ?>">
        <div class="form-group">
          <input type="text" name="kode_paket" class="form-control" value="<?= $paket['kode_paket'] ?>" readonly>
        </div>
        <div class="form-group">
          <input type="text" name="nama_paket" class="form-control" placeholder="Input nama paket" value="<?= $paket['nama_paket'] ?>" required>
        </div>
        <div class="form-group">
          <input type="number" name="harga_paket" class="form-control" placeholder="Input harga paket" value="<?= $paket['harga_paket'] ?>" required>
        </div>
        <div class="form-group">
          <a href="<?= base_url('paket') ?>" class="btn btn-warning">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</div>
  
</body>
</html>