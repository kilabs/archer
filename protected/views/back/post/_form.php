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
		'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form','enctype'=>'multipart/form-data'),
)); ?>

	<div class="alert alert-info">
		Fields with <span class="required">*</span> are required.
		<?php echo $form->errorSummary($model); ?>
	</div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'judul',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
			<?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>150,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'judul'); ?>
		</div>
	</div>

	<div class="form-group">            
        <?php echo $form->labelEx($model,'slug',array('class'=>'col-sm-2 control-label')); ?>            
        <div class="col-sm-10">
			<?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>150,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'slug'); ?>
		</div>
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'idKategori',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'idKategori',CHtml::listData(Kategori::model()->findAll(),'id','nama'),array('maxlength'=>200,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'idKategori'); ?>
		</div>                            
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'kontent',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textArea($model,'kontent',array('class'=>'form-control','id'=>'cleditor')); ?>
		<?php echo $form->error($model,'kontent'); ?>
		</div>
	</div>

	 <div class="form-group">
        <?php echo $form->labelEx($model,'foto',array('class'=>'col-sm-2 control-label')); ?> 
        <div class="col-sm-10">
            <div class="fileupload fileupload-new" data-provides="fileupload">
            	<?php if ($model->foto): ?>
            		<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo LUpload::thumbs('Post',$model->foto,'200x150'); ?>" alt="" /></div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            	<?php else: ?>
            		<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
            	<?php endif ?>
                <div>
                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><?php echo $form->fileField($model,'fotoFile'); ?>  </span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
        </div>
    </div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->dropDownList($model,'status',Post::listStatus(),array('maxlength'=>200,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'noTelp',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'noTelp',array('class'=>'form-control','id'=>'cleditor')); ?>
		<?php echo $form->error($model,'noTelp'); ?>
		</div>
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'alamat',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'alamat',array('class'=>'form-control','id'=>'cleditor')); ?>
		<?php echo $form->error($model,'alamat'); ?>
		</div>
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'kota',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'kota',array('class'=>'form-control','id'=>'cleditor')); ?>
		<?php echo $form->error($model,'kota'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::label('Posisi',null,array('class'=>'col-sm-2 control-label')); ?>
	   <div class="col-sm-10">
		   	 <input id="pac-input" class="controls" type="text" placeholder="Search Box">
		    <div id="map-canvas" style="height:270px;width:450px">

		    </div>
		</div>
  	</div>

 	<div class="form-group">            
		<?php echo $form->labelEx($model,'lat',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'lat',array('class'=>'form-control','id'=>'lat')); ?>
		<?php echo $form->error($model,'lat'); ?>
		</div>
	</div>

  <div class="form-group">            
		<?php echo $form->labelEx($model,'lng',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'lng',array('class'=>'form-control','id'=>'lng')); ?>
		<?php echo $form->error($model,'lng'); ?>
		</div>
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'zoom',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'zoom',array('class'=>'form-control','id'=>'zoom')); ?>
		<?php echo $form->error($model,'zoom'); ?>
		</div>
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'fbText',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'fbText',array('class'=>'form-control','id'=>'cleditor')); ?>
		<?php echo $form->error($model,'fbText'); ?>
		</div>
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'fbLink',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'fbLink',array('class'=>'form-control','id'=>'cleditor')); ?>
		<?php echo $form->error($model,'fbLink'); ?>
		</div>
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'twitterText',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'twitterText',array('class'=>'form-control','id'=>'cleditor')); ?>
		<?php echo $form->error($model,'twitterText'); ?>
		</div>
	</div>

	<div class="form-group">            
		<?php echo $form->labelEx($model,'twitterLink',array('class'=>'col-sm-2 control-label')); ?>            
		<div class="col-sm-10">
		<?php echo $form->textField($model,'twitterLink',array('class'=>'form-control','id'=>'cleditor')); ?>
		<?php echo $form->error($model,'twitterLink'); ?>
		</div>
	</div>

	<div class="form-group">
       <?php echo $form->labelEx($model,'layanan',array('class'=>'col-sm-2 control-label')); ?> 

        <div class="col-sm-10">
            <?php echo $form->textArea($model,'layanan',array('class'=>'form-control','id'=>'tags')); ?>
        </div>
    </div>

	<div class="form-group ">            
            <div class="col-sm-10 col-sm-offset-2 "> 
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
$this->renderPartial('/layouts/cleditor');
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
var geocoder;
function initialize() {
  var defLat = '.(double)$model->lat.';
  var defLng = '.(double)$model->lng.';
  var myLatlng = new google.maps.LatLng(defLat,defLng);
  var map = new google.maps.Map(document.getElementById("map-canvas"), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: '.(int)$model->zoom.',
    center: myLatlng
  });
  geocoder = new google.maps.Geocoder();


var marker = new google.maps.Marker({
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