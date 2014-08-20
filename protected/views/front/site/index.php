
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
        <?php 
          $criteria = new CDbCriteria();
          $criteria->limit = 5;
          $kategoris = Kategori::model()->findAll($criteria);
          foreach ($kategoris as $key => $value): ?>
          <div class="col-md-2 category-thumbnail">
            <a href="<?php echo Yii::app()->createUrl('post/kategori',array('id'=>$value->id,'slug'=>$value->slug)); ?>">
              <img alt="" class="block" src="<?php echo LUpload::thumbs('Kategori',$value->image,'200x200'); ?>">
              <h5 class="roboto text-center"><?php echo CHtml::encode($value->nama); ?></h5>
            </a>
          </div>
        <?php endforeach ?>
        
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
        <?php
          $criteria=new CDbCriteria();
          $criteria->limit = 6; 
          $criteria->with = array('kategori');
          $posts = Post::model()->findAll($criteria); ?>
        <?php foreach ($posts as $key => $value): ?>
        <div class="col-md-4"><div class="listing">
          <div class="verified-badge">
            <i class="icon icon-check"></i>
          </div>
          <div class="premium-ribbon t_u">Premium</div>
          <a class="listing-image block" href="<?php echo Yii::app()->createUrl('post/detail',array('id'=>$value->id,'slug'=>$value->slug)); ?>">
            <img alt="" class="block" src="<?php echo LUpload::thumbs('Post',$value->foto,'615x430'); ?>">
          </a>
          <div class="listing-info">
            <h4 class="roboto">
              <a href="#"><?php echo CHtml::encode($value->judul); ?></a>
            </h4>
            <p class="clearfix">
              <a class="pull-left listing-category" href="<?php echo Yii::app()->createUrl('post/kategori',array('id'=>$value->kategori->id,'slug'=>$value->kategori->slug)); ?>">
                <i class="icon icon-folder"></i>
                <?php echo CHtml::encode($value->kategori->nama); ?>
              </a>
              <span class="pull-left listing-location green">
                <i class="icon icon-location"></i>
                <?php echo CHtml::encode($value->kota); ?>
              </span>
            </p>
            <p class="grey">
              <i class="icon icon-gears"></i>
              <?php echo CHtml::encode($value->layanan); ?>
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
      <?php endforeach ?>


</div>
<!-- .home-listing -->
</div>
<!-- .container -->
</div>
<!-- .top-seller -->
