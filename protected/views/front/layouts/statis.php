<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
 <div class="page">
    <div class="container page-details page-dashboard">
      <div class="row">
        <div class="col-md-3">
          <div class="sidebar row">
            <ul class="list-unstyled dashboard-menu">
               <li class="<?php echo @$_GET['view']=='about' ? 'active' : '' ?>"><a href="<?php echo Yii::app()->createUrl('/site/page',array('view'=>'about')); ?>">Tentang Kami</a></li>
	          <li class="<?php echo @$_GET['view']=='term' ? 'active' : '' ?>"><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'term')); ?>">Aturan Penggunaan</a></li>
	          <li class="<?php echo @$_GET['view']=='policy' ? 'active' : '' ?>"><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'policy')); ?>">Kebijakan Privasi</a></li>
	          <li class="<?php echo @$_GET['view']=='tips-aman-pelangga' ? 'active' : '' ?>"><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'tips-aman-pelanggan')); ?>">Tips Berbelanja</a></li>
	          <li class="<?php echo @$_GET['view']=='tips-aman-pebisnis' ? 'active' : '' ?>"><a href="<?php  echo Yii::app()->createUrl('/site/page',array('view'=>'tips-aman-pebisnis')); ?>">Tips Berjualan</a></li>
          </div>
          <!-- .sidebar -->
        </div>

		<?php echo $content; ?>
	</div>
      <!-- .row -->
    </div>
    <!-- .container -->
</div>
<?php $this->endContent(); ?>