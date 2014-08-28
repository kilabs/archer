<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/CLEditor1_4_3/jquery.cleditor.css');

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/css/jquery.cleditor-hack.css');

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js');

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/js/editorInit.js');

Yii::app()->clientScript->registerScript('wy','formWysiwyg();');