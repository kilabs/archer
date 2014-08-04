<!DOCTYPE html>
<html lang="en-US">

<head>

  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hello - Bengkelin</title>

  <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/style.css" rel="stylesheet" type="text/css" />

  

</head>

<body>

  <header class="top" id="top">
    <div class="container">
      <div class="col-md-3">
        <h1 class="site-title clearfix"><a href="/">Bengkelin</a></h1>
      </div>
      <div class="col-md-5">
        <form class="top-search">
          <input class="form-control" placeholder="Cari apapun disini..." type="text">
          <span></span>
        </form>
      </div>
      <div class="col-md-3 offset-md-1 btn-group">
        <a class="btn half half-left" href="#">Login</a>
        <a class="btn btn-white half half-right" href="#">Sign Up</a>
      </div>
    </div>
    <!-- .container -->
  </header>
  <!-- #top.top -->
  <div class="navbar">
    <div class="container">
      <ul class="nav list-unstyled clearfix">
        <li><a href="#">Rumah & Alat rumah</a></li>
        <li><a href="#">Audio</a></li>
        <li><a href="#">Motor</a></li>
        <li><a href="#">Komputer</a></li>
        <li><a href="#">Handphone</a></li>
        <li><a href="#">Alat-alat listrik</a></li>
        <li><a href="#">Bodi Mobil</a></li>
        <li><a href="#">Mesin Mobil</a></li>
        <li>
          <a href="#">
            More
            <i></i>
          </a>
          <ul class="list-unstyled">
            <li><a href="#">Kesehatan</a></li>
            <li><a href="#">Alat musik</a></li>
            <li><a href="#">Fashion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <?php echo $content; ?>

<div class="bottom-area">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h4>&nbsp;</h4>
        <p>
          <a class="btn btn-red block" href="#">Mulai Berjualan</a>
        </p>
        <p>
          <a class="btn block" href="#">Hubungi Kami</a>
        </p>
      </div>
      <div class="col-md-2 offset-md-1">
        <h4 class="roboto">Bengkelin</h4>
        <ul>
          <li><a href="#">Tentang Kami</a></li>
          <li><a href="#">Aturan Penggunaan</a></li>
          <li><a href="#">Kebijakan Privasi</a></li>
          <li><a href="#">Berita & Pengumuman</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h4 class="roboto">Pembeli</h4>
        <ul>
          <li><a href="#">Cara Belanja</a></li>
          <li><a href="#">Pembayaran</a></li>
          <li><a href="#">Tips Berbelanja</a></li>
          <li><a href="#">Keamanan Pembeli</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h4 class="roboto">Penjual</h4>
        <ul>
          <li><a href="#">Cara Berjualan</a></li>
          <li><a href="#">Keuntungan</a></li>
          <li><a href="#">Tips Berjualan</a></li>
          <li><a href="#">Success Stories</a></li>
        </ul>
      </div>
    </div>
    <!-- .row -->
  </div>
  <!-- .container -->
  <div class="footer text-center">
    <h5 class="roboto">Temukan kami di</h5>
    <ul class="list-inline">
      <li><a href="#">Facebook</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Google+</a></li>
      <li><a href="#">Youtube</a></li>
    </ul>
    <p>&copy; Bengkelin, 2014</p>
  </div>
  <!-- .footer.text-center -->

</div>
<!-- .bottom-area -->

	<script src="//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js" type="text/javascript"></script>
	  <script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>
	  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/main.js" type="text/javascript"></script>

</body>
</html>