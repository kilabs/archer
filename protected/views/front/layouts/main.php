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


  <div class="jumbotron" style="background-image:url(<?php echo Yii::app()->theme->baseUrl; ?>/uploads/46.jpg)">
    <div class="container">
      <h1 class="jumbotron-hero white t_u roboto">Temukan Jasa Apapun Disini</h1>
      <h3 class="jumbotron-hero white roboto">Bengkelin adalah direktori jasa terlengkap di Indonesia</h3>
    </div>
  </div>
  <!-- .jumbotron -->

  <div class="home-floor">
    <div class="container">
      <div class="row home-listing">
        <hgroup class="text-center titling roboto">
          <h2>Jasa Populer</h2>
          <h4 class="grey">Temukan jasa yang cocok untuk anda</h4>
        </hgroup>
        <!-- .titling -->
        <div class="col-md-2 category-thumbnail">
          <a href="#">
            <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/kat-fashion.jpg">
            <h5 class="roboto text-center">Fashion</h5>
          </a>
        </div>
        <div class="col-md-2 category-thumbnail">
          <a href="#">
            <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/kat-hp.jpg">
            <h5 class="roboto text-center">Handphone</h5>
          </a>
        </div>
        <div class="col-md-2 category-thumbnail">
          <a href="#">
            <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/kat-interior.jpg">
            <h5 class="roboto text-center">Interior</h5>
          </a>
        </div>
        <div class="col-md-2 category-thumbnail">
          <a href="#">
            <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/kat-komputer.jpg">
            <h5 class="roboto text-center">Komputer</h5>
          </a>
        </div>
        <div class="col-md-2 category-thumbnail">
          <a href="#">
            <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/kat-motor.jpg">
            <h5 class="roboto text-center">Motor</h5>
          </a>
        </div>
        <div class="col-md-2 category-thumbnail">
          <a href="#">
            <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/kat-mobil.jpg">
            <h5 class="roboto text-center">Mobil</h5>
          </a>
        </div>
      </div>
      <!-- .home-listing -->
    </div>
  </div>
  <!-- .home-floor -->

  <div class="home-cta">
    <div class="container">
      <h4 class="roboto text-center">Bengkelin.com adalah situs jual beli jasa mudah & terpercaya yang memberi jaminan 100% aman bagi pencari/penyedia jasa. Kembangkan bisnis jasa anda disini</h4>
      <br>
      <div class="text-center">
        <a class="btn h4 btn-red" href="#">Bergabung dengan Bengkelin</a>
      </div>
    </div>
    <!-- .container -->
  </div>
  <!-- .home-cta -->

  <div class="top-seller">
    <div class="container">
      <div class="row home-listing">
        <hgroup class="text-center titling roboto">
          <h2>Bengkel Populer</h2>
          <h4 class="grey">Bengkel terlaris minggu ini</h4>
        </hgroup>
        <!-- .titling -->
        <div class="col-md-4"><div class="listing">
          <div class="verified-badge">
            <i class="icon icon-check"></i>
          </div>
          <div class="premium-ribbon t_u">Premium</div>
          <a class="listing-image block" href="#">
            <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/mtb.jpg">
          </a>
          <div class="listing-info">
            <h4 class="roboto">
              <a href="#">Bengkel Sepeda "Maju Mundur"</a>
            </h4>
            <p class="clearfix">
              <a class="pull-left listing-category" href="#">
                <i class="icon icon-folder"></i>
                Bengkel Sepeda
              </a>
              <span class="pull-left listing-location green">
                <i class="icon icon-location"></i>
                Jakarta
              </span>
            </p>
            <p class="grey">
              <i class="icon icon-gears"></i>
              Servis sepeda, Jual beli sepeda
            </p>
            <hr>
            <p>
              <span class="listing-rating">
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
                <i class="icon icon-star-o"></i>
              </span>
              <span class="grey">17 review</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4"><div class="listing">
        <a class="listing-image block" href="#">
          <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/mtb.jpg">
        </a>
        <div class="listing-info">
          <h4 class="roboto">
            <a href="#">Bengkel Sepeda "Maju Mundur"</a>
          </h4>
          <p class="clearfix">
            <a class="pull-left listing-category" href="#">
              <i class="icon icon-folder"></i>
              Bengkel Sepeda
            </a>
            <span class="pull-left listing-location green">
              <i class="icon icon-location"></i>
              Jakarta
            </span>
          </p>
          <p class="grey">
            <i class="icon icon-gears"></i>
            Servis sepeda, Jual beli sepeda
          </p>
          <hr>
          <p>
            <span class="listing-rating">
              <i class="icon icon-star"></i>
              <i class="icon icon-star"></i>
              <i class="icon icon-star"></i>
              <i class="icon icon-star"></i>
              <i class="icon icon-star-o"></i>
            </span>
            <span class="grey">17 review</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4"><div class="listing">
      <div class="verified-badge">
        <i class="icon icon-check"></i>
      </div>
      <div class="premium-ribbon t_u">Premium</div>
      <a class="listing-image block" href="#">
        <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/mtb.jpg">
      </a>
      <div class="listing-info">
        <h4 class="roboto">
          <a href="#">Bengkel Sepeda "Maju Mundur"</a>
        </h4>
        <p class="clearfix">
          <a class="pull-left listing-category" href="#">
            <i class="icon icon-folder"></i>
            Bengkel Sepeda
          </a>
          <span class="pull-left listing-location green">
            <i class="icon icon-location"></i>
            Jakarta
          </span>
        </p>
        <p class="grey">
          <i class="icon icon-gears"></i>
          Servis sepeda, Jual beli sepeda
        </p>
        <hr>
        <p>
          <span class="listing-rating">
            <i class="icon icon-star"></i>
            <i class="icon icon-star"></i>
            <i class="icon icon-star"></i>
            <i class="icon icon-star"></i>
            <i class="icon icon-star-o"></i>
          </span>
          <span class="grey">17 review</span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-4"><div class="listing">
    <a class="listing-image block" href="#">
      <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/mtb.jpg">
    </a>
    <div class="listing-info">
      <h4 class="roboto">
        <a href="#">Bengkel Sepeda "Maju Mundur"</a>
      </h4>
      <p class="clearfix">
        <a class="pull-left listing-category" href="#">
          <i class="icon icon-folder"></i>
          Bengkel Sepeda
        </a>
        <span class="pull-left listing-location green">
          <i class="icon icon-location"></i>
          Jakarta
        </span>
      </p>
      <p class="grey">
        <i class="icon icon-gears"></i>
        Servis sepeda, Jual beli sepeda
      </p>
      <hr>
      <p>
        <span class="listing-rating">
          <i class="icon icon-star"></i>
          <i class="icon icon-star"></i>
          <i class="icon icon-star"></i>
          <i class="icon icon-star"></i>
          <i class="icon icon-star-o"></i>
        </span>
        <span class="grey">17 review</span>
      </p>
    </div>
  </div>
</div>
<div class="col-md-4"><div class="listing">
  <div class="verified-badge">
    <i class="icon icon-check"></i>
  </div>
  <a class="listing-image block" href="#">
    <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/mtb.jpg">
  </a>
  <div class="listing-info">
    <h4 class="roboto">
      <a href="#">Bengkel Sepeda "Maju Mundur"</a>
    </h4>
    <p class="clearfix">
      <a class="pull-left listing-category" href="#">
        <i class="icon icon-folder"></i>
        Bengkel Sepeda
      </a>
      <span class="pull-left listing-location green">
        <i class="icon icon-location"></i>
        Jakarta
      </span>
    </p>
    <p class="grey">
      <i class="icon icon-gears"></i>
      Servis sepeda, Jual beli sepeda
    </p>
    <hr>
    <p>
      <span class="listing-rating">
        <i class="icon icon-star"></i>
        <i class="icon icon-star"></i>
        <i class="icon icon-star"></i>
        <i class="icon icon-star"></i>
        <i class="icon icon-star-o"></i>
      </span>
      <span class="grey">17 review</span>
    </p>
  </div>
</div>
</div>
<div class="col-md-4"><div class="listing">
  <a class="listing-image block" href="#">
    <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl; ?>/uploads/mtb.jpg">
  </a>
  <div class="listing-info">
    <h4 class="roboto">
      <a href="#">Bengkel Sepeda "Maju Mundur"</a>
    </h4>
    <p class="clearfix">
      <a class="pull-left listing-category" href="#">
        <i class="icon icon-folder"></i>
        Bengkel Sepeda
      </a>
      <span class="pull-left listing-location green">
        <i class="icon icon-location"></i>
        Jakarta
      </span>
    </p>
    <p class="grey">
      <i class="icon icon-gears"></i>
      Servis sepeda, Jual beli sepeda
    </p>
    <hr>
    <p>
      <span class="listing-rating">
        <i class="icon icon-star"></i>
        <i class="icon icon-star"></i>
        <i class="icon icon-star"></i>
        <i class="icon icon-star"></i>
        <i class="icon icon-star-o"></i>
      </span>
      <span class="grey">17 review</span>
    </p>
  </div>
</div>
</div>
</div>
<!-- .home-listing -->
</div>
<!-- .container -->
</div>
<!-- .top-seller -->


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
