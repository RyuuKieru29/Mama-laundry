<form action="<?= base_url('cek_laundry') ?>" method="post">
  <div class="container">
    <div class="row my-5">
      <div class="col-md-10">
        <input type="text" name="kode_transaksi" class="form-control" placeholder="Silahkan masukkan kode transaksi anda">
      </div>
      <div class="col-md-2">
        <button type="submit" name="" class="btn btn-warning">Cek Laundry</button>
      </div>
    </div>
  </div>
</form>

<div class="container">
  <table class="table table-bordered table-striped mb-5">
    <thead>
      <tr>
        <th>Nama Konsumen</th>
        <th>Tanggal Masuk</th>
        <th>Paket</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php

        if(!empty($kode_transaksi)){
          foreach($kode_transaksi as $row){ ?>
            <tr>
              <td><?= $row->nama_konsumen; ?></td>
              <td><?= $row->tgl_masuk; ?></td>
              <td><?= $row->nama_paket; ?></td>
              <td>Rp.<?= number_format($row->grand_total); ?>,-</td>
              <td><?= $row->status; ?></td>
            </tr>
          <?php }
        }
        else{ ?>
          <tr>
            <td colspan="5" class="bg-danger text-warning">Tidak ada data</td>
          </tr>

        <?php }
      ?>

    </tbody>
  </table>
</div>

