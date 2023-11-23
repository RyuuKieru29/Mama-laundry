<?php
  date_default_timezone_set('Asia/Jakarta');
  $tgl_masuk = date('Y-m-d h:i:s');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">

    <style>
    #searchResults {
        max-height: 150px;
        overflow-y: auto;
        border-radius: 4px;
        display: none;
    }

    .search-result-item {
        padding: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .search-result-item:hover {
        background-color: #f2f2f2;
    }

    .border-highlight {
        border: 1px solid #ccc !important;
    }

    #noResults {
        color: red;
    }
</style>

</head>

<body>

    <?php
if(!empty($this->session->flashdata('info'))){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('info'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php }
?>

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <div class="card shadow mb-4">
            <div class="card-body">
            <form method="post" action="<?= base_url('transaksi/simpan'); ?>" id="form_transaksi">
                    <div class="form-group">
                        <input type="text" name="kode_transaksi" value="<?= "TR" . date('Ymd') . $kode_transaksi ?>"
                            class="form-control" value="" readonly>
                    </div>

                    <!-- <div class="form-group">
                    <select name="kode_konsumen" id="" class="form-control" required>
                        <option value="" selected>- Pilih konsumen -</option>
                        ?php foreach($konsumen as $row): ?>
                        <option value="?= $row->kode_konsumen ?>">?= $row->nama_konsumen; ?></option>
                        ?php endforeach; ?>
                    </select>
                    </div> -->

                    <!-- Buat pencarian kode pelanggan dengan fitur tambahan dropdown pwncarian -->      
                    <div class="form-group">
                        <div style="display: flex; align-items: center;">
                            <input type="text" name="kode_konsumen" id="searchKonsumen" class="form-control" placeholder="Cari kode konsumen" required>
                        </div>
                        <div id="searchResults"></div>
                    </div>

                    <div class="form-group">
                        <input type="text" id="nama" class="form-control" placeholder="Nama Konsumen" readonly>
                    </div>

                    <script>
                        var konsumenOptions = <?= json_encode($konsumen); ?>;

                        var searchInput = document.getElementById('searchKonsumen');
                        var namaInput = document.getElementById('nama');
                        var searchResults = document.getElementById('searchResults');

                        searchInput.addEventListener('input', function(event) {
                            var searchTerm = searchInput.value.toLowerCase();
                            var matchingOptions = konsumenOptions.filter(function(option) {
                                return option.kode_konsumen.toLowerCase().includes(searchTerm);
                                
                            });

                            displaySearchResults(matchingOptions);
                        });


                        // Tambahkan event listener untuk menanggapi tombol Enter
                        searchInput.addEventListener('keydown', function(event) {
                            if (event.key === 'Enter') {
                                event.preventDefault(); // Mencegah submit form jika ada

                                // Pilih pilihan pertama jika hasil pencarian ditampilkan
                                var firstResultItem = searchResults.querySelector('.search-result-item');
                                if (firstResultItem) {
                                    firstResultItem.click();
                                } else {
                                    // Cek apakah terdapat hasil yang cocok
                                    var matchingOptions = konsumenOptions.filter(function(option) {
                                        return option.kode_konsumen.toLowerCase() === searchInput.value.toLowerCase();
                                    });

                                    // Jika ada hasil cocok, pilih yang pertama
                                    if (matchingOptions.length > 0) {
                                        searchInput.value = matchingOptions[0].kode_konsumen;
                                        namaInput.value = matchingOptions[0].nama_konsumen;
                                    } else {
                                        // Handle ketika tidak ada hasil
                                        handleNoResults();
                                    }
                                }
                            }
                        });

                        function displaySearchResults(results) {
                            searchResults.innerHTML = '';

                            if (results.length > 0) {
                                results.forEach(function(result) {
                                    var resultItem = document.createElement('div');
                                    resultItem.className = 'search-result-item';
                                    resultItem.textContent = result.kode_konsumen;

                                    resultItem.addEventListener('click', function() {
                                        searchInput.value = result.kode_konsumen;
                                        namaInput.value = result.nama_konsumen;

                                        searchResults.innerHTML = '';
                                        searchResults.classList.remove('border-highlight');
                                    });

                                    searchResults.appendChild(resultItem);
                                });

                                // Tambahkan kelas untuk menonjolkan border
                                searchResults.classList.add('border-highlight');
                                // Tampilkan hasil pencarian
                                searchResults.style.display = 'block';
                            } else {
                                // Sembunyikan hasil pencarian jika tidak ada hasil
                                searchResults.style.display = 'none';
                                searchResults.classList.remove('border-highlight');
                                // Handle ketika tidak ada hasil
                                handleNoResults();
                            }
                        }

                        function handleNoResults() {
                            // Tampilkan pesan "konsumen tidak ada" di placeholder nama
                            namaInput.value = "Konsumen tidak ada";
                            // Bersihkan hasil pencarian
                            searchResults.innerHTML = '';
                            // Sembunyikan border
                            searchResults.classList.remove('border-highlight');
                            // Sembunyikan hasil pencarian
                            searchResults.style.display = 'none';
                        }

                        document.addEventListener('click', function(event) {
                            if (!event.target.closest('.form-group')) {
                                searchResults.innerHTML = '';
                                searchResults.style.display = 'none';
                                searchResults.classList.remove('border-highlight');
                            }
                        });
                    </script>


                    <div class="form-group">
                        <select name="kode_paket" id="paket" class="form-control" required>
                            <option value="" selected>- Pilih Paket -</option>
                            <?php foreach($paket as $row): ?>
                            <option value="<?= $row->kode_paket ?>"><?= $row->nama_paket; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" id="harga" class="form-control" placeholder="Harga paket" readonly>
                    </div>
                    <div class="form-group">
                        <input type="number" name="berat" id="berat" class="form-control" placeholder="Berat (KG)" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="grand_total" id="grand_total" class="form-control"
                            placeholder="Grand total" readonly>
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" name="tgl_masuk" value="<?= $tgl_masuk ?>" class="form-control"
                            placeholder="Tanggal masuk">
                    </div>
                    <div class="form-group">
                        <select name="bayar" id="" class="form-control" required>
                            <option value="">- Pilih status bayar -</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" name="status" value="Baru" class="form-control" placeholder="Status">
                    </div>
                    <div class="form-group">
                        <a href="<?= base_url('transaksi') ?>" class="btn btn-warning">Batal</a>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script> -->

    <script>
    $(document).ready(function() {
        $('select').select2();
    });

    $('#paket').change(function() {
        var kode_paket = $(this).val();
        $.ajax({
            url: '<?= base_url('transaksi/') ?>getHargaPaket',
            data: {
                kode_paket: kode_paket
            },
            method: 'post',
            dataType: 'JSON',
            success: function(result) {
                $('#harga').val(result.harga_paket);
            }
        });
    });


    $('#konsumen').change(function() {
        var kode_konsumen = $(this).val();
        $.ajax({
            url: '<?= base_url('transaksi/') ?>getnamaKonsumen',
            data: {
                kode_konsumen: kode_konsumen
            },
            method: 'post',
            dataType: 'JSON',
            success: function(result) {
                $('#nama').val(result.nama_konsumen);
            }
        });
    });

    $('#berat').keyup(function() {
        var berat = $(this).val();
        var harga = document.getElementById('harga').value;
        $('#grand_total').val(berat * harga);
    });

    document.getElementById('form_transaksi').addEventListener('submit', function (event) {
            // Dapatkan nilai kode_konsumen
            var kodeKonsumen = document.getElementById('searchKonsumen').value;

            // Periksa apakah kode_konsumen null atau kosong
            if (!kodeKonsumen) {
                alert('Silakan pilih pelanggan.');
                event.preventDefault(); // Cegah pengiriman formulir
            }
        });

    // $(document).ready(function() {
    //     $('#konsumen').selectize({
    //         create: true, // Untuk memungkinkan pembuatan item yang belum ada dalam daftar
    //         sortField: 'text' // Mengurutkan item berdasarkan teks
    //     });
    // });


    // document.addEventListener("DOMContentLoaded", function() {
    //     const selectElement = document.getElementById("konsumen");

    //     selectElement.addEventListener("input", function() {
    //         const searchText = selectElement.value.toLowerCase();

    //         Array.from(selectElement.options).forEach(function(option) {
    //             const optionText = option.textContent.toLowerCase();
    //             option.style.display = optionText.includes(searchText) ? "block" : "none";
    //         });
    //     });
    // });

    // document.addEventListener("DOMContentLoaded", function() {
    //     const selectElement = document.getElementById("konsumen");
    //     const searchInput = document.getElementById("searchKonsumen");

    //     searchInput.addEventListener("input", function() {
    //         const searchText = searchInput.value.toLowerCase();

    //         Array.from(selectElement.options).forEach(function(option) {
    //             const optionText = option.textContent.toLowerCase();
    //             option.style.display = optionText.includes(searchText) ? "block" : "none";
    //         });
    //     });
    // });

    // document.addEventListener('DOMContentLoaded', function() {
    //     var konsumenSelect = document.getElementById('konsumen');
    //     var initialSelectedValue = konsumenSelect.value; // Store the initial selected value

    //     konsumenSelect.disabled = true; // Initially, disable the select

    //     document.getElementById('member').addEventListener('change', function() {
    //         konsumenSelect.disabled = !this.checked;

    //         if (!this.checked) {
    //             konsumenSelect.value =
    //             initialSelectedValue; // Reset select to the initial selected value
    //         }
    //     });
    // });
    </script>

</body>

</html>