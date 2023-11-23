<div class="container">
  <div class="row my-5" data-aos="fade-up" data-aos-duration="1000">

    <?php 
      foreach($about as $row){ ?>
        <div class="col-md-4">
          <img class="set-image" src="<?= base_url('assets/images/about/'). $row->gambar_about ?>" alt="" width="100%">
        </div>
        <div class="col-md-8">
          <h5><?= $row->judul_about; ?></h5>
          <p><?= $row->deskripsi_about; ?></p>
        </div>

      <?php }
    
    ?>
    
  </div>

  <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="col-md-12">
      <h5>Jenis Paket</h5>
      <table class="table table-bordered">
        <thead>
          <tr class="th-color">
            <th scope="col">No.</th>
            <th scope="col">Nama Paket</th>
            <th scope="col">Harga Paket</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach($paket as $row){ ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $row->nama_paket; ?></td>
                <td>Rp.<?= number_format($row->harga_paket); ?>,-</td>
              </tr>
            <?php }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>