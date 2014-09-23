<?php if (isset($kategori) and $kategori !== null): ?>
<div style="background-image:url(<?php echo LUpload::thumbs('Kategori',$kategori->image,'1920x920'); ?>)" class="listing-heading">
  <div class="listing-heading-inner">
    <div class="container">
      <h2 class="roboto t_u"><?php echo $kategori->nama; ?></h2>
      <h4>Temukan kebutuhan untuk <?php echo $kategori->nama; ?> disini</h4>
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
    <form class="products-filter" method='get'>
        <div class="row">
          <div class="col-md-2">
            <h3 class="roboto">Filter Bengkel</h3>
          </div>
          <div class="col-md-4">
            <?php echo CHtml::activeTextField($search,'q',array('placeholder'=>'Kata Pencarian...','class'=>'form-control','name'=>'q')); ?>
          </div>
          <div class="col-md-3">
            <?php $this->widget('ext.typeahead.TbTypeAhead',array(
               'model' => $search,
               'attribute' => 'idLokasi',
               'enableHogan' => true,
               'options' => array(
                   array(
                       'name' => 'lokasis',
                       'valueKey' => 'nama',
                       'remote' => array(
                           'url' => Yii::app()->createUrl('site/lokasiList') . '?term=%QUERY',
                       ),
                       'template' => '<p>{{negara}}-<strong>{{nama}}</strong></p>',
                       'engine' => new CJavaScriptExpression('Hogan'),
                   )
               ),
               'events' => array(
                   'selected' => new CJavascriptExpression("function(obj, datum, name) {
                       console.log(obj);
                       console.log(datum);
                       console.log(name);

                       var myLatlng = new google.maps.LatLng(datum.lat,datum.lng);
                        map.setCenter(myLatlng);
                        marker.setPosition(myLatlng);
                   }")
               ),
               'htmlOptions'=>array('class'=>'form-control','placeholder'=>'Lokasi')
          )); ?>
          </div>
          <div class="col-md-3">
            <?php echo CHtml::activeDropDownList($search,'sort',
              SearchForm::listSort(),array('class'=>'form-control','name'=>'sort')) ?>
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