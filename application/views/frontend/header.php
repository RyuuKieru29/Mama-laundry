<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Mama Laundry</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
      <a class="navbar-brand" href="#">
        <img src="<?= base_url('assets/images/logo_polos.png') ?>" alt="" height="40">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('cek_laundry') ?>">Cek Laundry</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">

        <?php 
        foreach($slider as $row => $value){
          if($row == 0){ ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $row ?>" class="active"></li>
            <?php }
          else{ ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $row ?>"></li>
          <?php }
        } ?>
      </ol>

      <div class="carousel-inner">

        <?php 
        foreach($slider as $row => $value){
          if($row == 0){ ?>
            <div class="carousel-item active">
              <img src="<?= base_url('assets/images/slider/'). $value->gambar_slider ?>" class="d-block w-100 image-slider" alt="...">
              <div class="carousel-caption d-none d-md-block bg-caption">
                <h5 class="title"><?= $value->judul_slider; ?></h5>
                <p><?= $value->deskripsi_slider; ?></p>
              </div>
            </div>
            <?php }
          else{ ?>
            <div class="carousel-item">
              <img src="<?= base_url('assets/images/slider/'). $value->gambar_slider ?>" class="d-block w-100 image-slider" alt="...">
              <div class="carousel-caption d-none d-md-block bg-caption">
                <h5 class="title"><?= $value->judul_slider; ?></h5>
                <p><?= $value->deskripsi_slider; ?></p>
              </div>
            </div>
          <?php }
        } ?>

      </div>
      <a class="carousel-control-prev btn-slider" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next btn-slider" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>