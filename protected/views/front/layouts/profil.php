<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
	<div class="page">
    <div class="container page-details page-dashboard">
      <div class="row">
        <div class="col-md-3">
          <div class="sidebar row">
          	<?php
	          	$this->widget('zii.widgets.CMenu', array(

					'items'=>$this->menuProfils,
					'htmlOptions'=>array('class'=>'list-unstyled dashboard-menu'),
				)); ?>
          </div>
          <!-- .sidebar -->
        </div>
        <!-- .col-md-3 -->

		<?php echo $content; ?>
	 </div>
      <!-- .row -->
    </div>
    <!-- .container -->
  </div>
  <!-- .page -->
</div><!-- content -->
<?php $this->endContent(); ?>