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
      <div class="row products-row">
          <?php
            $this->widget('zii.widgets.CListView', array(
                'summaryText'=>false,
                'dataProvider'=>$dataProvider,
                'itemView'=>'_post', 
              )); 
            ?>
      </div>
      <div class="pagination">
        <div class="row">
          <div class="col-sm-8">
            <ul class="nav list-inline">
              <li>
                <span class="disabled">
                  <i class="icon icon-chevron-left"></i>
                </span>
              </li>
              <li>
                <span class="current">
                  1
                </span>
              </li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">6</a></li>
              <li><a href="#">7</a></li>
              <li><a href="#">8</a></li>
              <li><a href="#">9</a></li>
              <li><a href="#">10</a></li>
              <li>
                <a href="#">
                  <i class="icon icon-chevron-right"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-sm-4">
            <form>
              <label for="perPageItem">Item per halaman</label>
              <select id="perPageItem" class="form-control">
                <option>10</option>
                <option>20</option>
                <option>30</option>
              </select>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>