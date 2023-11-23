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
      <form method="post" action="<?= base_url('about/update'); ?>" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" name="id_about" value="<?= $about['id_about'] ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
          <input type="text" name="judul_about" value="<?= $about['judul_about'] ?>" class="form-control">
        </div>
        <div class="form-group">
          <textarea name="deskripsi_about" class="form-control" cols="30" rows="6">
            <?= $about['deskripsi_about']; ?>
          </textarea>
        </div>
        <div class="form-group">
          <input type="file" name="gambar_about" class="form-control">
          <img src="<?= base_url('assets/images/about/').$about['gambar_about'] ?>" alt="" width="200">
          <br>
          <small class="text-danger">Format gambar (jpg | png), ukuran gambar 1440 x 500 px</small>
        </div>
        <div class="form-group">
          <a href="<?= base_url('about') ?>" class="btn btn-warning">Batal</a>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>
    </div>
  </div>
</div>
  
</body>
</html>