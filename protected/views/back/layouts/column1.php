<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

        <!--PAGE CONTENT -->
        <div id="content">
             
            <div class="inner" style="min-height: 700px;">
                <?php if ($this->adminTitle): ?>
                	<div class="row">
	                    <div class="col-lg-12">
	                        <h1> <?php echo $this->adminTitle; ?> </h1>
	                    </div>
	                </div>
	                  <hr />
                <?php endif ?>
                <?php if(isset($this->breadcrumbs)):?>
	            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
	                'links'=>$this->breadcrumbs,
	                'homeLink'=>CHtml::link('Dashboard',array('site/index')),
	                'htmlOptions'=>array('class'=>'breadcrumb')
	            )); ?><!-- breadcrumbs -->
	            <?php
		            $this->widget('zii.widgets.CMenu', array(
	                    'items'=>$this->menu,
	                    'htmlOptions'=>array('class'=>'breadcrumb text-right'),
	            	));
	            ?>
	        <?php endif?>
                <?php echo $content; ?>
            </div>

        </div>
<?php $this->endContent(); ?>