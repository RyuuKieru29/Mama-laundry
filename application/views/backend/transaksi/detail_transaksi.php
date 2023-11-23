<style>
  td{
    font-size: 12px;
    font-family: sans-serif;
  }

  h3{
    font-size: 16px;
  }

  hr{
    border: 0;
    border-top: 2px solid lightslategray;
  }

  .tabel, .tabel th, .tabel td{
    border: 1px solid black;
    border-collapse: collapse;
  }

  .tabel th{
    font-family: sans-serif;
    font-size: 12px;
  }
</style>


<table>
  <tr>
    <td width="400"><h3>Laundry Online</h3></td>
    <td><h3>Invoice</h3></td>
  </tr>
  <tr>
    <td>Alamat : xxxxxxxxx</td>
  </tr>
  <tr>
    <td>No. Telp : xxxxxxxxx</td>
  </tr>
  <tr>
    <td>Email : xxxxxxxxx</td>
  </tr>
</table>

<hr><br>

<table>
  <tr>
    <td width="80">Konsumen</td>
    <td width="250"><?= $transaksi['nama_konsumen']; ?></td>
    <td width="80">Kode Transaksi</td>
    <td><?= $transaksi['kode_transaksi']; ?></td>
  </tr>
  <tr>
    <td width="80"></td>
    <td width="250"><?= $transaksi['alamat_konsumen']; ?></td>
    <td width="80">Tanggal Masuk</td>
    <td><?= $transaksi['tgl_masuk']; ?></td>
  </tr>
  <tr>
    <td width="80"></td>
    <td width="250"><?= $transaksi['no_telp']; ?></td>
    <td width="80">Tanggal Ambil</td>
    <?php if($transaksi['tgl_ambil'] != 0){ ?>
      <td><?= $transaksi['tgl_ambil']; ?></td>
    <?php }
    else{ ?>
      <td style="color: salmon;">-</td>
    <?php } ?>
  </tr>
</table>
<br><br>

<table class="tabel" width="500">
  <tr>
    <th>Paket Laundry</th>
    <th>Berat (KG)</th>
    <th>Harga</th>
    <th>Subtotal</th>
  </tr>
  <tr>
    <td><?= $transaksi['nama_paket']; ?></td>
    <td><?= $transaksi['berat']; ?></td>
    <td>Rp.<?= number_format($transaksi['harga_paket'], 0, '.', '.'); ?>,-</td>
    <td>Rp.<?= number_format($transaksi['grand_total'], 0, '.', '.'); ?>,-</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: right; font-weight: bold; font-size: 14px">Grand Total</td>
    <td style="font-weight: bold; font-size: 14px">Rp.<?= number_format($transaksi['grand_total'], 0, '.', '.'); ?>,-</td>
  </tr>
</table>
<br><br>

<table>
  <tr>
    <td style="font-size: 14px; font-weight: bold">Keterangan</td>
  </tr>
  <tr>
    <td>1. Pengambilan cucian harus membawa nota.</td>
  </tr>
  <tr>
    <td>2. Cucian luntur bukan tanggung jawab kami.</td>
  </tr>
  <tr>
    <td>3. Hitung dan periksa sebelum pergi.</td>
  </tr>
  <tr>
    <td>4. Klaim kekurangan / kehilangan cucian setelah meninggalkan laundry tidak dilayani.</td>
  </tr>
</table>