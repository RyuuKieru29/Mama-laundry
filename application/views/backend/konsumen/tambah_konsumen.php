<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="post" action="<?= base_url('konsumen/simpan'); ?>">
        <div class="form-group">
          <input type="text" name="kode_konsumen" value="<?= $kode_konsumen ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
          <input type="text" name="nama_konsumen" class="form-control" placeholder="Input nama konsumen" required>
        </div>
        <div class="form-group">
          <textarea name="alamat_konsumen" id="" cols="30" rows="5" class="form-control" placeholder="Input alamat" required></textarea>
        </div>
        <div class="form-group">
          <!-- <input type="text" name="no_telp" class="form-control" placeholder="Input nomor telepon" required> -->
          <input type="text" name="no_telp" class="form-control" placeholder="Input nomor telepon" required pattern="[0-9]{10,15}">
          <small>Harap masukkan nomor telepon yang valid (10-15 digit).</small>
        </div>
        
        <div class="form-group">
          <a href="<?= base_url('konsumen') ?>" class="btn btn-warning">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</div>
  
</body>
</html>