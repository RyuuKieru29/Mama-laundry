<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>$title</title>
</head>
<body>

<div class="container-fluid">
  <h3 class="mb-2 text-grey-800"><?= $title; ?></h3>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="<?= base_url('laporan/cetak_laporan'); ?>" method="post" class="form-user">
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Tanggal Mulai</label>
          <div class="col-sm-4">
            <input type="date" name="tgl_mulai" class="form-control" required>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Tanggal Akhir</label>
          <div class="col-sm-4">
            <input type="date" name="tgl_akhir" class="form-control" required>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-4">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
  
</body>
</html>