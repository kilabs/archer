<?php if (isset($kategori) and $kategori !== null): ?>
<div style="background-image:url(<?php echo LUpload::thumbs('Kategori',$kategori->image,'1920x920'); ?>)" class="listing-heading">
  <div class="listing-heading-inner">
    <div class="container">
      <h2 class="roboto t_u"><?php echo $kategori->nama; ?></h2>
      <h4>Temukan kebutuhan untuk mobilmu disini</h4>
      <br>
      <?php if (count($kategori->childs) > 0): ?>
        <ul class="h4 list-inline">
          <?php foreach ($kategori->childs as $key => $value): ?>
            <li><a href="<?php echo Yii::app()->createUrl('post/list',array('kategori'=>$value->slug)); ?>"><?php echo $value->nama ?></a></li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
    </div>
  </div>
</div>
<?php endif ?>


<div class="products">
  <div class="container">
    <form class="products-filter">
        <div class="row">
          <div class="col-md-2">
            <h3 class="roboto">Filter Bengkel</h3>
          </div>
          <div class="col-md-4">
            <input type="text" placeholder="Kata Pencarian..." class="form-control">
          </div>
          <div class="col-md-3">
            <select class="form-control">
              <option>Sumatera Utara</option>
              <option>DKI Jakarta</option>
              <option>Jawa Tengah</option>
              <option>Papua Nugini</option>
              <option>Maluku Utara</option>
              <option>Kalimantan Barat</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control">
              <option>Terbaru</option>
              <option>Terpopuler</option>
              <option>Termurah</option>
              <option>Termahal</option>
            </select>
          </div>
        </div>
      </form>
          <?php
            $this->widget('zii.widgets.CListView', array(
              'itemsCssClass'=>'row products-row',
              'pagerCssClass'=>'pagination',
              'cssFile'=>false,
              'pager'=>array(    
                'cssFile'=>false,
                'internalPageCssClass'=>'',
                'selectedPageCssClass'=>'current',
                 'header'=>'',
                 'firstPageLabel'=>'<i class="icon icon-chevron-left"></i>',
                 'lastPageLabel'=>'<i class="icon icon-chevron-right"></i>',
                 'prevPageLabel'=>'<',
                 'nextPageLabel'=>'>',
                     'selectedPageCssClass' => 'active',         
                     'hiddenPageCssClass' => '',                        
                     'htmlOptions'=>array(
                         'class'=>'nav list-inline',
                     ),                  
                 ),  
                'summaryText'=>false,
                'dataProvider'=>$dataProvider,
                'itemView'=>'_post', 
              )); 
            ?>
  </div>
</div>