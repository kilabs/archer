<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-dashboard', 'role'=>'form','enctype'=>'multipart/form-data'),
)); ?>

	<div class="alert alert-info">
		Fields with <span class="required">*</span> are required.
		<?php echo $form->errorSummary($model); ?>
	</div>

	<div class="row form-dashboard-row">            
    <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">
        <?php echo $form->labelEx($model,'judul',array('class'=>'col-sm-2 control-label')); ?>     
      </p>       
    </div>
    <div class="col-sm-6 col-xs-7">
			<?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>150,'class'=>'form-control form-dashboard-input')); ?>
			<?php echo $form->error($model,'judul'); ?>
		</div>
	</div>

	<div class="row form-dashboard-row">            
    <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">               
		<?php echo $form->labelEx($model,'idKategori',array('class'=>'col-sm-2 control-label')); ?>   
    </p>          
		 </div>
    <div class="col-sm-6 col-xs-7">
			<?php echo $form->dropDownList($model,'idKategori',Kategori::listParent2($model->id)
      ,array('maxlength'=>200,'class'=>'form-control  form-dashboard-input')); ?>
			<?php echo $form->error($model,'idKategori'); ?>
		</div>                            
	</div>

	<div class="row form-dashboard-row">            
    <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">            
		<?php echo $form->labelEx($model,'kontent',array('class'=>'col-sm-2 control-label')); ?>     
    </p>        
		</div>
    <div class="col-sm-6 col-xs-7">
		 <?php
              $this->widget('ext.redactor.ERedactorWidget',array(
                  'model'=>$model,
                  'attribute'=>'kontent',
                  'options'=>array(
                      'fileUpload'=>Yii::app()->createUrl('user/fileUpload',array(
                          'attr'=>'full',
                      )),
                      'fileUploadErrorCallback'=>new CJavaScriptExpression(
                          'function(obj,json) { alert(json.error); }'
                      ),
                      'imageUpload'=>Yii::app()->createUrl('user/imageUpload',array(
                          'attr'=>'full',
                      )),
                      'imageGetJson'=>Yii::app()->createUrl('user/imageList',array(
                          'attr'=>'full',
                      )),
                      'imageUploadErrorCallback'=>new CJavaScriptExpression(
                          'function(obj,json) { alert(json.error); }'
                      ),
                      'blurCallback'=>'js:function(){ 
                        
                      }',
                      'style'=>'height:200px'
                  ),          
              
              ));
          ?>
		<?php echo $form->error($model,'kontent'); ?>
		</div>
	</div>

	<div class="row form-dashboard-row">            
    <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">             
		<?php echo $form->labelEx($model,'alamat',array('class'=>'col-sm-2 control-label')); ?>     
    </p>        
		</div>
    <div class="col-sm-6 col-xs-7">
		<?php echo $form->textField($model,'alamat',array('class'=>'form-control  form-dashboard-input','id'=>'cleditor')); ?>
		<?php echo $form->error($model,'alamat'); ?>
		</div>
  </div>

	<div class="row form-dashboard-row">            
    <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">          

		<?php  echo $form->labelEx($model,'idLokasi',array('class'=>'col-sm-2 control-label')); ?>         
    </p>    
		</div>
    <div class="col-sm-6 col-xs-7">
		<?php $this->widget('ext.typeahead.TbTypeAhead',array(
       'model' => $model,
       'attribute' => 'idLokasi',
       'enableHogan' => true,
       'options' => array(
           array(
               'name' => 'lokasis',
               'valueKey' => 'nama',
               'remote' => array(
                   'url' => Yii::app()->createUrl('user/lokasiList') . '?term=%QUERY',
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
       'htmlOptions'=>array('class'=>'form-control  form-dashboard-input')
  )); ?>
		<?php echo $form->error($model,'idLokasi'); ?>
		</div>
  </div>

  <?php echo $form->hiddenField($model,'lat',array('id'=>'lat')); ?>
        <?php echo $form->hiddenField($model,'lng',array('id'=>'lng')); ?>
        <?php echo $form->hiddenField($model,'zoom',array('id'=>'zoom')); ?>

    <div class="row form-dashboard-row">
       <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">
       <?php echo $form->labelEx($model,'layanan',array('class'=>'col-sm-2 control-label')); ?> 
       </p>    
    </div>
    <div class="col-sm-6 col-xs-7">
            <?php echo $form->textField($model,'layanan',array('class'=>'form-control','id'=>'tags')); ?>
        </div>
    </div>

  <?php if ($model->isNewRecord): ?>
    <div class="row form-dashboard-row">            
      <div class="col-sm-3 col-xs-5">
        <p class="form-dashboard-label">          
      <?php echo $form->labelEx($model,'fotoFile',array('class'=>'col-sm-2 control-label')); ?>         
      </p>    
      </div>
      <div class="col-sm-6 col-xs-7">
      <?php echo $form->fileField($model,'fotoFile',array('class'=>'')); ?>
      <?php echo $form->error($model,'fotoFile'); ?>
      </div>
    </div>
  <?php endif ?>

  <div class="row form-dashboard-row">            
    <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">             
    <?php echo $form->labelEx($model,'noTelp',array('class'=>'col-sm-2 control-label')); ?>     
    </p>        
    </div>
    <div class="col-sm-6 col-xs-7">
    <?php echo $form->textField($model,'noTelp',array('class'=>'form-control  form-dashboard-input')); ?>
    <?php echo $form->error($model,'noTelp'); ?>
    </div>
  </div>

  <div class="row form-dashboard-row">            
    <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">             
    <?php echo $form->labelEx($model,'facebook',array('class'=>'col-sm-2 control-label')); ?>     
    </p>        
    </div>
    <div class="col-sm-6 col-xs-7">
    <?php echo $form->textField($model,'facebook',array('class'=>'form-control  form-dashboard-input')); ?>
    <?php echo $form->error($model,'facebook'); ?>
    </div>
  </div>

  <div class="row form-dashboard-row">            
    <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">             
    <?php echo $form->labelEx($model,'twitter',array('class'=>'col-sm-2 control-label')); ?>     
    </p>        
    </div>
    <div class="col-sm-6 col-xs-7">
    <?php echo $form->textField($model,'twitter',array('class'=>'form-control  form-dashboard-input')); ?>
    <?php echo $form->error($model,'twitter'); ?>
    </div>
  </div>

  <div class="row form-dashboard-row">            
    <div class="col-sm-3 col-xs-5">
      <p class="form-dashboard-label">             
    <?php echo $form->labelEx($model,'website',array('class'=>'col-sm-2 control-label')); ?>     
    </p>        
    </div>
    <div class="col-sm-6 col-xs-7">
    <?php echo $form->textField($model,'website',array('class'=>'form-control  form-dashboard-input')); ?>
    <?php echo $form->error($model,'website'); ?>
    </div>
  </div>

  

	<div class="row form-dashboard-row">           
    <div class="col-sm-6 col-xs-7 col-sm-offset-3 col-xs-offset-5"> 
      <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-danger')); ?>
    </div>
	</div>  

<?php $this->endWidget(); ?>

</div><!-- form -->

<style>
.controls {
  margin-top: 16px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  padding: 0 11px 0 13px;
  width: 400px;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  text-overflow: ellipsis;
}

#pac-input:focus {
  border-color: #4d90fe;
  margin-left: -1px;
  padding-left: 14px;  /* Regular padding-left + 1. */
  width: 401px;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

</style>


<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/css/bootstrap-fileupload.min.css');

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/jasny/js/bootstrap-fileupload.js',  CClientScript::POS_END);

Yii::app()->clientScript->registerScript('slug',
        "
        $( '#Post_judul' ).keyup(function() {
            var Text = $(this).val();
             Text = Text.toLowerCase();
             Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
             $('#Post_slug').val(Text);  
        });                
        ",
        CClientScript::POS_READY);

//google maps render
$js =    '
  var map;
  var marker;
  // $("#Post_idLokasi").change(function(){
  //   var url = "'.Yii::app()->createUrl('/user/latlongLokasi').'";
  //   $.post(url,{ id : $(this).val() }, function(ret){
  //     if(ret){
  //       var myLatlng = new google.maps.LatLng(ret.lat,ret.lng);
  //       map.setCenter(myLatlng);
  //       marker.setPosition(myLatlng);
  //     }
  //   },"json");
  // });
  Dropzone.autoDiscover = false;
  
  $("#photosUpload").dropzone({
    paramName : "file",
    url : "'.Yii::app()->createUrl('/user/uploadGalery').'",
  });

var geocoder;
function initialize() {
  var defLat = '.(double)$model->lat.';
  var defLng = '.(double)$model->lng.';
  var myLatlng = new google.maps.LatLng(defLat,defLng);
  map = new google.maps.Map(document.getElementById("map-canvas"), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: '.(int)$model->zoom.',
    center: myLatlng
  });
  geocoder = new google.maps.Geocoder();


marker = new google.maps.Marker({
  position: myLatlng, 
  map: map, // handle of the map 
  draggable:true
});
function geocodePosition() {
  var pos = marker.getPosition();
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      console.log(responses);
      document.getElementById("formatedAddress").value = responses[0].formatted_address;
    } else {
      console.log("Cannot determine address at this location.");
    }
  });
}
function setLocationaa(){
  document.getElementById("lat").value = marker.position.lat();
  document.getElementById("lng").value = marker.position.lng();
  document.getElementById("zoom").value = map.getZoom();
  console.log(marker);
}
setLocationaa();
google.maps.event.addListener(
  marker,
  "drag",
  setLocationaa
  );
google.maps.event.addListener(
  marker,
  "dragend",
  geocodePosition
);
  // Create the search box and link it to the UI element.
var input = /** @type {HTMLInputElement} */(
  document.getElementById("pac-input"));
map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

var searchBox = new google.maps.places.SearchBox(
  /** @type {HTMLInputElement} */(input));

  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
google.maps.event.addListener(searchBox, "places_changed", function() {
  var places = searchBox.getPlaces();
  var bounds = new google.maps.LatLngBounds();
  for (var i = 0, place; place = places[i]; i++) {
    marker.setPosition(place.geometry.location);
    bounds.extend(place.geometry.location);
  }
  map.fitBounds(bounds);
  setLocationaa();
});

google.maps.event.addDomListener(input, \'keydown\', function(e) {
  if (e.keyCode == 13)
  {
    if (e.preventDefault)
    {
      e.preventDefault();
    }
    else
    {
      e.cancelBubble = true;
      e.returnValue = false;
    }
  }
}); 
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the

google.maps.event.addListener(map, "bounds_changed", function() {
  document.getElementById("zoom").value = map.getZoom();
  var bounds = map.getBounds();
  searchBox.setBounds(bounds);
});
}

google.maps.event.addDomListener(window, "load", initialize);
';
Yii::app()->clientScript->registerScriptFile("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places",  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/tagsinput/jquery.tagsinput.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/tagsinput/jquery.tagsinput.min.js');
Yii::app()->clientScript->registerScript('tags',
        "
       $('#tags').tagsInput();           
        ",
        CClientScript::POS_READY);