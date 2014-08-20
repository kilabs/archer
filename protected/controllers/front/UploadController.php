<?php

class UploadController extends Controller {

    public function actionThumbs() {
        $request = str_replace('/thumbs', '', Yii::app()->request->requestUri);
        $resourcesPath = Yii::getPathOfAlias('webroot') . str_replace(Yii::app()->baseUrl, '', $request);
        $targetPath = Yii::getPathOfAlias('webroot') . str_replace(Yii::app()->baseUrl,'',Yii::app()->request->requestUri);
        
        if (preg_match('/_(\d+)x(\d+).*\.(jpg|jpeg|png|gif)/i', $resourcesPath, $matches)) {

            if (!isset($matches[0]) || !isset($matches[1]) || !isset($matches[2]) || !isset($matches[3]))
                throw new CHttpException(400, 'Non valid params');

            if (!$matches[1] || !$matches[2]) {
                throw new CHttpException(400, 'Invalid dimensions');
            }
            $originalFile = str_replace($matches[0], '', $resourcesPath);
            if (!file_exists($originalFile))
                throw new CHttpException(404, 'File not found');

            $dirname = dirname($targetPath);
            if (!is_dir($dirname))
                mkdir($dirname, 0775, true);

                $image = Yii::app()->image->load($originalFile);
            
                $size = getimagesize($originalFile);
                $width = $size[0]; //width
                $height = $size[1]; //height        

                $original_aspect = $width / $height;
                $thumb_aspect = $matches[1] / $matches[2];
   
                if ( $original_aspect >= $thumb_aspect )
                {
                    $new_height = $matches[2];
                    $new_width = $width / ($height / $matches[2]);
                }
                else
                {
                    $new_width = $matches[1];
                    $new_height = $height / ($width / $matches[1]);                 
                }

                $image->resize($new_width, $new_height)->crop($matches[1], $matches[2]);

            if ($image->save($targetPath)) {                
                if (Yii::app()->request->urlReferrer != Yii::app()->request->requestUri)
                    $this->refresh();
            }

            throw new CHttpException(500, 'Server error');
        } else {
            throw new CHttpException(400, 'Wrong params');
        }
    }

}