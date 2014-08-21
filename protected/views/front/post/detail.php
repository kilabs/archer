<div class="page">
    <div class="container page-details">
      <div class="row shop-header">
        <div class="col-md-9">
          <img alt="" class="shop-logo pull-left" src="<?php echo Yii::app()->theme->baseUrl ?>/uploads/ava.jpg">
          <div class="shop-name">
            <h3 class="page-title roboto"><?php echo $post->judul; ?></h3>
            <p class="grey"><?php echo $post->alamat; ?></p>
          </div>
          <ul class="shop-info list-inline">
            <?php if ($post->noTelp): ?>
               <li>
                <span>
                  <i class="icon icon-phone"></i>
                </span>
                <?php echo $post->noTelp; ?> 
              </li>
            <?php endif ?>
            <?php if ($post->fbText and $post->fbLink): ?>
              <li>
                <span>
                  <i class="icon icon-facebook"></i>
                </span>
                <a href="<?php echo $post->fbLink; ?>"><?php echo $post->fbText; ?></a>
              </li>
            <?php endif; ?>
            <?php if ($post->twitterText and $post->twitterLink): ?>
              <li>
                <span>
                  <i class="icon icon-twitter"></i>
                </span>
                <a href="<?php echo $post->twitterLink; ?>"><?php echo $post->twitterText; ?></a>
              </li>
            <?php endif ?>
            <!-- 
            <li>
              <span>
                <i class="icon icon-website"></i>
              </span>
              <a href="#">google.com</a>
            </li> -->
          </ul>
        </div>
        <div class="col-md-3">
          <p>
            <a class="btn btn-red block" href="#">Rekomendasikan</a>
          </p>
          <p>
            <a class="btn block" href="#">Hubungi Toko</a>
          </p>
        </div>
      </div>
      <!-- .row.shop-header -->

      <div class="row shop-content">
        <div class="col-md-8 shop-text">
          <div class="shop-profile">
            <h3>Profil</h3>
            <?php echo $post->detail->kontent; ?>
          </div>
          <hr>
          <h3>Galeri</h3>
          <div class="row shop-images">
            <?php foreach ($post->galerys as $key => $value): ?>
               <a class="col-md-3" href="#">
                <img alt="" class="block" src="<?php echo LUpload::thumbs('PostGalery',$value->image,'300x200'); ?>">
              </a>
            <?php endforeach ?>
          </div>
          <hr>
          <div class="shop-service">
            <h3>Layanan</h3>
            <ul>
              <?php $layanans = explode(',',$post->layanan); ?>
              <?php foreach ($layanans as $key => $value): ?>
                <li><?php echo CHtml::encode($value); ?></li>  
              <?php endforeach ?>
            </ul>
          </div>
          <hr>
          <p><!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5367c74c6c2c509f"></script>

            <div class="addthis_native_toolbox"></div></p>
          </div>
          <div class="col-md-4 shop-map">
          </div>
        </div>
        <!-- .row -->

        <div class="row shop-related">
          <div class="col-xs-12">
            <h5 class="roboto">Bengkel Serupa</h5>
          </div>
          <div class="col-md-4"><div class="listing clearfix">
            <div class="col-md-3 listing-image-outer">
              <a class="listing-image block" href="#">
                <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl ?>/uploads/mtb.jpg">
              </a>
            </div>
            <div class="col-md-9">
              <div class="listing-info">
                <h5 class="roboto">
                  <a href="#">Bengkel Sepeda "Maju Mundur"</a>
                </h5>
                <p class="small clearfix">
                  <a class="pull-left listing-category" href="#">
                    <i class="icon icon-folder"></i>
                    Bengkel Sepeda
                  </a>
                  <span class="pull-left listing-location green">
                    <i class="icon icon-location"></i>
                    Jakarta
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4"><div class="listing clearfix">
          <div class="col-md-3 listing-image-outer">
            <a class="listing-image block" href="#">
              <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl ?>/uploads/mtb.jpg">
            </a>
          </div>
          <div class="col-md-9">
            <div class="listing-info">
              <h5 class="roboto">
                <a href="#">Bengkel Sepeda "Maju Mundur"</a>
              </h5>
              <p class="small clearfix">
                <a class="pull-left listing-category" href="#">
                  <i class="icon icon-folder"></i>
                  Bengkel Sepeda
                </a>
                <span class="pull-left listing-location green">
                  <i class="icon icon-location"></i>
                  Jakarta
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4"><div class="listing clearfix">
        <div class="col-md-3 listing-image-outer">
          <a class="listing-image block" href="#">
            <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl ?>/uploads/mtb.jpg">
          </a>
        </div>
        <div class="col-md-9">
          <div class="listing-info">
            <h5 class="roboto">
              <a href="#">Bengkel Sepeda "Maju Mundur"</a>
            </h5>
            <p class="small clearfix">
              <a class="pull-left listing-category" href="#">
                <i class="icon icon-folder"></i>
                Bengkel Sepeda
              </a>
              <span class="pull-left listing-location green">
                <i class="icon icon-location"></i>
                Jakarta
              </span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .row.shop-related -->
  <!-- .shop-related -->
</div>
<!-- .container.page-details -->

<div class="container page-addons">
  <div class="row">
    <div class="col-md-7 shop-reviews">
      <h4><?php echo $post->totalReview; ?> Reviews</h4>
      <div class="ads-728x90">
        <a class="block" href="#">
          <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl ?>/uploads/ads728x90.png">
        </a>
      </div>
      <ul class="reviews list-unstyled">
        <?php foreach ($post->reviews as $key => $value): ?>  
        <li class="review"><div class="row">
          <div class="col-sm-3 review-user text-center">
            <img alt="" class="avatar" src="<?php echo Yii::app()->theme->baseUrl ?>/uploads/ava.jpg">
            <p><a href="#"><?php echo $value->member->username; ?></a></p>
          </div>
          <div class="col-sm-9 review-content">
            <div class="clearfix">
              <span class="listing-rating pull-left">
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
                <i class="icon icon-star-o"></i>
              </span>
              <time class="pull-right grey"><?php echo date("d M Y",strtotime($value->time)); ?></time>
            </div>
            <br>
            <div class="review-entry">
              <p><?php echo $value->kontent; ?></p>
            </div>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php if (!Yii::app()->user->isGuest): ?>
  <h4>Leave Reviews</h4>
  <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'post-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
      'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form','enctype'=>'multipart/form-data'),
  )); ?>
  <?php if ($newReview->hasErrors()): ?>
    <div class="alert alert-info">
    <?php echo $form->errorSummary($newReview); ?>
  </div>
  <?php endif ?>
  
    <p>
      <?php echo $form->textArea($newReview,'kontent',array('class'=>'form-control')); ?>
      <?php echo $form->hiddenField($newReview,'rating',array('id'=>'hidden-rating')); ?>
    </p>
    <p>
      <span class="listing-rating pull-left" id="input-rating">
        <i class="icon icon-star-o" value="1" id="c1"></i>
        <i class="icon icon-star-o" value="2"  id="c2"></i>
        <i class="icon icon-star-o" value="3"  id="c3"></i>
        <i class="icon icon-star-o" value="4"  id="c4"></i>
        <i class="icon icon-star-o"  value="5" id="c5"></i>
      </span>
    </p>
     <div class="clearfix"></div>
    <p>
      <input type="submit" value="Kirim Review">
    </p>
  <?php $this->endWidget(); ?>
  <?php endif ?>
</div>
<!-- .col-md-8.shop-reviews -->

<div class="col-md-5 shop-ads">
  <div class="pull-left">
    <div class="ads-160x600">
      <a class="block" href="#">
        <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl ?>/uploads/ads160x600.png">
      </a>
    </div>
  </div>
  <div class="pull-right">
    <div class="ads-300x250">
      <a class="block" href="#">
        <img alt="" class="block" src="<?php echo Yii::app()->theme->baseUrl ?>/uploads/ads300x250.png">
      </a>
    </div>
  </div>
</div>
</div>
</div>
<!-- .container.page-addons -->
</div>
<!-- .page -->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/jasny/js/bootstrap-fileupload.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('maps',
        "
        var LocsA = [
              {
                lat: ".$post->lat.",
                lon: ".$post->lng.",
                zoom: ".$post->zoom.",
                html: '<p><strong>Maju Jaya Workshop</strong></p>',
             //   animation: google.maps.Animation.DROP
              }
              ];
                new Maplace({
                  locations: LocsA,
                  map_div: '.shop-map'
                }).Load();  
              
        ",
        CClientScript::POS_READY);

Yii::app()->clientScript->registerScript('ranting',
        "
        $('#input-rating i').css('cursor','pointer');   
        $('#input-rating i').click(function(){
          var value = $(this).attr('value');
          $('#hidden-rating').val(value);
          $('#input-rating i').removeClass( 'icon-star' );
          var selected = $('#input-rating i').filter(function(){
            return $(this).attr('value') <= value;
          });
          var notSelected = $('#input-rating i').filter(function(){
            return $(this).attr('value') > value;
          });
          notSelected.removeClass('icon-star');
          notSelected.addClass('icon-star-o');
          selected.removeClass('icon-star-o');
          selected.addClass('icon-star');
        });
        ",
        CClientScript::POS_READY);
