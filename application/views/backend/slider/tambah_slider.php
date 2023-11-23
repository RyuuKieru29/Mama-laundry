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
      <form method="post" action="<?= base_url('slider/simpan'); ?>" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" name="judul_slider" class="form-control" placeholder="Input judul slider" value="" required>
        </div>
        <div class="form-group">
          <textarea name="deskripsi_slider" class="form-control" placeholder="Input deskripsi slider..." cols="30" rows="6" required></textarea>
        </div>
        <div class="form-group">
          <input type="file" name="gambar_slider" class="form-control" required>
        </div>
        <div class="form-group">
          <select name="status_slider" class="form-control" required>
            <option value="">- Pilih Status -</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
          </select>
        </div>
        <div class="form-group">
          <a href="<?= base_url('slider') ?>" class="btn btn-warning">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</div>
  
</body>
</html>