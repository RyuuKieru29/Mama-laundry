<style>
  th{
    font-size: 14px;
    font-family: sans-serif;
    background: lightblue;
  }
</style>


<table width="750" border="0">
  <tr>
    <td style="text-align:center; font-size:24px; font-weight:bold; font-family:sans-serif">Laporan Transaksi</td>
  </tr>
</table>

<table width="750" border="0">
  <tr>
    <td style="text-align:center; font-size:16px; font-family:sans-serif">Dari Tanggal <?= mediumdate_indo($this->session->userdata('tgl_mulai')); ?> Sampai Tanggal <?= mediumdate_indo($this->session->userdata('tgl_akhir')); ?></td>
  </tr>
</table>
<br><br>

<table width="750" border="1" style="border-collapse: collapse;">
  <tr>
    <th>Tanggal masuk</th>
    <th>Kode Transaksi</th>
    <th>Konsumen</th>
    <th>Paket</th>
    <th>Berat (kg)</th>
    <th>Grand Total</th>
    <th>Status</th>
  </tr>

  <?php foreach($laporan as $row){ ?>
    <tr>
      <td><?= mediumdate_indo($row->tgl_masuk); ?></td>
      <td><?= $row->kode_transaksi; ?></td>
      <td><?= $row->nama_konsumen; ?></td>
      <td><?= $row->nama_paket; ?></td>
      <td><?= $row->berat; ?></td>
      <td>Rp. <?= number_format($row->grand_total, 0, '.', ','); ?>,-</td>
      <td><?= $row->status; ?></td>
    </tr>
  <?php } ?>
</table>