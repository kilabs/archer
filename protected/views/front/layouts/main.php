<!DOCTYPE html>
<html lang="en-US">

<head>

  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="google-site-verification" content="2X55Ehsp6e9A3R2AoBFXYWs9EHCKDZPXdACGxv_xVss" />
  <meta name="google-site-verification" content="2X55Ehsp6e9A3R2AoBFXYWs9EHCKDZPXdACGxv_xVss" />
  <meta name="msvalidate.01" content="D09B7D034DFA185BE2BAAEFBDB638413" />
  <meta name="alexaVerifyID" content="LsuZ97xXsfJg-w4BJM5qQREZ_L0"/>
  <title>Bengkelin - Direktori Jasa dan Servis</title>
  <meta name="description" content="direktori penyedia jasa rumah tangga hingga perkantoran, mulai dari servis ac, sewa genset, jasa penerjemah, jasa kesehatan hingga jasa montir mobil">
  <meta name="keyword" content="jasa rumah tangga, sercis ac, sewa genset, jasa penerjemah, jasa kesehatan, jasa montir mobil">

  <link href="<?php echo Yii::app()->theme->baseUrl ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54338941-1', 'auto');
  ga('send', 'pageview');

  </script>
  

</head>

<body>

  <header class="top" id="top">
    <div class="container">
      <div class="col-md-3">
        <h1 class="site-title clearfix"><a href="<?php echo Yii::app()->baseUrl.'/' ?>">Bengkelin</a></h1>
      </div>
      <div class="col-md-5">
        <form class="top-search" action="<?php echo Yii::app()->createUrl('post/list'); ?>">
          <input class="form-control" placeholder="Cari apapun disini..." type="text" name='q'>
          <span></span>
        </form>
      </div>
      <div class="col-md-3 offset-md-1 btn-group">
        <?php if (Yii::app()->user->isGuest): ?>
        <a class="btn half half-left" href="<?php echo Yii::app()->createUrl('site/login'); ?>">Login</a>
        <a class="btn btn-white half half-right" href="<?php echo Yii::app()->createUrl('site/register'); ?>">Sign Up</a>    
      <?php else: ?>        
      <a class="btn half half-left" href="<?php echo Yii::app()->createUrl('user/profil'); ?>">Dashboard</a>
      <a class="btn btn-white half half-right" href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Logout</a>  
    <?php endif; ?>
  </div>
</div>
<!-- .container -->
</header>
<!-- #top.top -->
<div class="navbar">
  <div class="container">
    <ul class="nav list-unstyled clearfix">
      <?php 
      $criteria = new CDbCriteria();
      $criteria->with = array('childs'=>array(
        'on'=>'childs.status = '.Kategori::STATUS_AKTIF
        ));
      $criteria->addCondition('t.status='.Kategori::STATUS_AKTIF.' and t.idParent=0');
      $criteria->limit = 8;
      $kategoris = Kategori::model()->findAll($criteria); ?>
      <?php foreach ($kategoris as $key => $value): ?>
      <?php if (count($value->childs) == 0): ?>
      <li><a href="<?php echo Yii::app()->createUrl('post/list',array('kategori'=>$value->slug ? $value->slug : '-')); ?>"><?php echo CHtml::encode($value->nama); ?></a></li>
    <?php else: ?>
    <li>
      <a href="<?php echo Yii::app()->createUrl('post/list',array('kategori'=>$value->slug  ? $value->slug : '-')); ?>"><?php echo CHtml::encode($value->nama); ?></a></i>
    </a>
    <ul class="list-unstyled">
      <?php foreach ($value->childs as $key2 => $value2): ?>
      <li><a href="<?php echo Yii::app()->createUrl('post/list',array('kategori'=>$value2->slug  ? $value2->slug : '-')); ?>"><?php echo CHtml::encode($value2->nama); ?></a></li>
    <?php endforeach ?>
  </ul>
</li>
<?php endif ?>
<?php endforeach ?>    
</ul>
</div>
</div>
<!-- .container -->

<?php echo $content; ?>

<div class="bottom-area">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h4>&nbsp;</h4>
        <p>
          <a class="btn btn-red block" href="<?php echo Yii::app()->createUrl('site/register'); ?>">Mulai Berjualan</a>
        </p>
        <p>
          <a class="btn block" href="#">Hubungi Kami</a>
        </p>
      </div>
      <div class="col-md-2 offset-md-1">
        <h4 class="roboto">Bengkelin</h4>
        <ul>
          <li><a href="<?php echo Yii::app()->createUrl('/site/page',array('view'=>'about')); ?>">Tentang Bengkelin</a></li>
          <li><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'term')); ?>">Syarat & Ketentuan</a></li>
          <li><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'policy')); ?>">Kebijakan Privasi</a></li>
          <li><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'ganti-rugi')); ?>">Ganti Rugi</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h4 class="roboto">Pembeli</h4>
        <ul>
          <li><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'tips-aman-pelanggan')); ?>">Tips Aman Pelanggan</a></li>
          <li><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'pelaporan-penipuan')); ?>"> Pelaporan Penipuan</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h4 class="roboto">Penjual</h4>
        <ul>
          <li><a href="#">Pelanggaran</a></li>
          <li><a href="#">Ketentuan Anggota</a></li>
          <li><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'tips-aman-pebisnis')); ?>">Tips Berjualan</a></li>
        </ul>
      </div>
    </div>
    <!-- .row -->
  </div>
  <!-- .container -->
  <div class="footer text-center">
    <h5 class="roboto">Temukan kami di</h5>
    <ul class="list-inline">
      <li><a href="http://facebook.com/bengkelin">Facebook</a></li>
      <li><a href="http://twitter.com/BengkelinCom">Twitter</a></li>
      <li><a href="http://plus.google.com/+bengkelin">Google+</a></li>
      <li><a href="http://youtube.com/bengkelin">Youtube</a></li>
    </ul>
    <p>&copy; Bengkelin, 2014</p>
  </div>
  <!-- .footer.text-center -->

</div>
<!-- .bottom-area -->

<script src="//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/maplace.min.js" type="text/javascript"></script>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/main.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/dropzone.min.js" type="text/javascript"></script>
</body>
</html>
