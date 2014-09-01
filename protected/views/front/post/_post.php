<div class="col-md-6"><div class="listing clearfix is-verified is-premium">
      <div class="verified-badge">
        <i class="icon icon-check"></i>
      </div>
      <div class="col-md-4 listing-image-outer">
        <a href="<?php echo Yii::app()->createUrl('post/detail',array('id'=>$data->id,'slug'=>$data->slug)); ?>" class="listing-image block">
          <?php if (isset($data->cover) and $data->cover != null): ?>
            <img src="<?php echo LUpload::thumbs('PostGalery',$data->cover->image,'160x112'); ?>" class="block" alt="<?php echo CHtml::encode($data->judul); ?>">
          <?php endif ?>
        </a>
      </div>
      <div class="col-md-8">
        <div class="listing-info">
          <h4 class="roboto">
            <a href="<?php echo Yii::app()->createUrl('post/detail',array('id'=>$data->id,'slug'=>$data->slug)); ?>"><?php echo CHtml::encode($data->judul); ?></a>
          </h4>
          <p class="clearfix">
            <a href="<?php echo Yii::app()->createUrl('post/list',array('kategori'=>$data->kategori->slug)); ?>" class="pull-left listing-category">
              <i class="icon icon-folder"></i>
              <?php echo CHtml::encode(@$data->kategori->nama); ?>
            </a>
            <?php if (isset($data->lokasi) and $data->lokasi != null): ?>
              <span class="pull-left listing-location green">
                <i class="icon icon-location"></i>
                <?php echo CHtml::encode(@$data->lokasi->nama); ?>
              </span>
            <?php endif ?>
            
          </p>
          <p class="grey">
            <i class="icon icon-gears"></i>
            <?php echo CHtml::encode($data->layanan); ?>
          </p>
          <p>
            <span class="listing-rating">
              <i class="icon icon-star"></i>
              <i class="icon icon-star"></i>
              <i class="icon icon-star"></i>
              <i class="icon icon-star"></i>
              <i class="icon icon-star-o"></i>
            </span>
            <span class="grey"><?php echo $data->totalReview; ?> review</span>
          </p>
        </div>
      </div>
    </div>
</div>      