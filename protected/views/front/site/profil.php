<div class="page">
    <div class="container page-details page-dashboard">
      <div class="row">
        <div class="col-md-3">
          <div class="sidebar row">
            <ul class="list-unstyled dashboard-menu">
              <li class="active"><a href="/profil.html">Edit Profil</a></li>
              <li><a href="/password.html">Ganti Password</a></li>
              <li><a href="/lokasi.html">Lokasi</a></li>
              <li><a href="/galeri.html">Edit Galeri</a></li>
            </ul>
          </div>
          <!-- .sidebar -->
        </div>
        <!-- .col-md-3 -->

        <div class="col-md-9 dashboard">
            <?php $form=$this->beginWidget('CActiveForm', array(
              'id'=>'profil-form',
              // Please note: When you enable ajax validation, make sure the corresponding
              // controller action is handling ajax validation correctly.
              // There is a call to performAjaxValidation() commented in generated controller code.
              // See class documentation of CActiveForm for details on this.
              'enableAjaxValidation'=>false,
                'htmlOptions'=>array('class'=>'form-dashboard', 'role'=>'form','enctype'=>'multipart/form-data'),
            )); ?>

            <h3 class="roboto">Edit Profil</h3>
            <div class="row form-dashboard-row <?php echo $model->getError('fotoFile')!=null ? 'error' : '' ?>">
              <div class="col-sm-3 col-xs-5">
                <p class="form-dashboard-label">
                  <?php echo $form->labelEx($model,'fotoFile'); ?>
                </p>
              </div>
              <div class="col-sm-6 col-xs-7">
                <div class="row">
                  <img alt="" class="avatar col-sm-3" src="<?php echo LUpload::thumbs('Profil',$model->foto,'200x200'); ?>">
                  <div class="col-sm-9">
                    <?php echo $form->fileField($model,'fotoFile'); ?> 
                    <?php if($model->getError('fotoFile')!=null): ?>
                  <p class="small"><?php echo $model->getError('fotoFile') ?></p>
                <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- .row.form-dashboard-row -->

            <div class="row form-dashboard-row <?php echo $model->getError('namaLengkap')!=null ? 'error' : '' ?>">
              <div class="col-sm-3 col-xs-5">
                <p class="form-dashboard-label">
                   <?php echo $form->labelEx($model,'namaLengkap'); ?>
                </p>
              </div>
              <div class="col-sm-6 col-xs-7">
                <input class="form-control form-dashboard-input" type="text">
                <p class="small grey form-dashboard-helper">Nama lengkap anda atau nama toko anda.</p>
                <?php if($model->getError('namaLengkap')!=null): ?>
                  <p class="small"><?php echo  $model->getError('namaLengkap') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <!-- .row.form-dashboard-row -->

            <div class="row form-dashboard-row <?php echo $model->getError('username')!=null ? 'error' : '' ?>">
              <div class="col-sm-3 col-xs-5">
                <p class="form-dashboard-label">
                   <?php echo $form->labelEx($model,'username'); ?>
                </p>
              </div>
              <div class="col-sm-6 col-xs-7">
               <?php echo $form->textField($model,'username',array('class'=>'form-control form-dashboard-input')); ?>
                <p class="small grey form-dashboard-helper">Huruf atau angka saja. Tidak boleh memakai spasi</p>
                <?php if($model->getError('username')!=null): ?>
                  <p class="small"><?php echo  $model->getError('username') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <!-- .row.form-dashboard-row -->

            <!-- Contoh validasi error, ditambahi class="error" -->
            <div class="row form-dashboard-row <?php echo $model->getError('email')!=null ? 'error' : '' ?>">
              <div class="col-sm-3 col-xs-5">
                <p class="form-dashboard-label">
                   <?php echo $form->labelEx($model,'email'); ?>
                </p>
              </div>
              <div class="col-sm-6 col-xs-">
                <?php echo $form->textField($model,'email',array('class'=>'form-control form-dashboard-input')); ?>
                <?php if($model->getError('email')!=null): ?>
                  <p class="small"><?php echo  $model->getError('email') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <!-- .row.form-dashboard-row -->

            <div class="row form-dashboard-row <?php echo $model->getError('nomorTelepon')!=null ? 'error' : '' ?>">
              <div class="col-sm-3 col-xs-5">
                <p class="form-dashboard-label">
                   <?php echo $form->labelEx($model,'nomorTelepon'); ?>
                </p>
              </div>
              <div class="col-sm-6 col-xs-7">
                 <?php echo $form->textField($model,'nomorTelepon',array('class'=>'form-control form-dashboard-input')); ?>
                <?php if($model->getError('nomorTelepon')!=null): ?>
                  <p class="small"><?php echo  $model->getError('nomorTelepon') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <!-- .row.form-dashboard-row -->

            <div class="row form-dashboard-row <?php echo $model->getError('facebook')!=null ? 'error' : '' ?>">
              <div class="col-sm-3 col-xs-5">
                <p class="form-dashboard-label">
                   <?php echo $form->labelEx($model,'facebook'); ?>
                </p>
              </div>
              <div class="col-sm-6 col-xs-7">
                 <?php echo $form->textField($model,'facebook',array('class'=>'form-control form-dashboard-input')); ?>
                <?php if($model->getError('emafacebookl')!=null): ?>
                  <p class="small"><?php echo $model->getError('facebook') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <!-- .row.form-dashboard-row -->

            <div class="row form-dashboard-row <?php echo $model->getError('twitter')!=null ? 'error' : '' ?>">
              <div class="col-sm-3 col-xs-5">
                <p class="form-dashboard-label">
                   <?php echo $form->labelEx($model,'twitter'); ?>
                </p>
              </div>
              <div class="col-sm-6 col-xs-7">
               <?php echo $form->textField($model,'twitter',array('class'=>'form-control form-dashboard-input')); ?>
                <?php if($model->getError('twitter')!=null): ?>
                  <p class="small"><?php echo $model->getError('twitter') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <!-- .row.form-dashboard-row -->

            <div class="row form-dashboard-row <?php echo $model->getError('website')!=null ? 'error' : '' ?>">
              <div class="col-sm-3 col-xs-5">
                <p class="form-dashboard-label">
                   <?php echo $form->labelEx($model,'website'); ?>
                </p>
              </div>
              <div class="col-sm-6 col-xs-7">
                <?php echo $form->textField($model,'website',array('class'=>'form-control form-dashboard-input')); ?>
              <?php if($model->getError('website')!=null): ?>
                  <p class="small"><?php echo $model->getError('website') ?></p>
                <?php endif; ?>
             </div>
            </div>
            <!-- .row.form-dashboard-row -->

            <div class="row form-dashboard-row <?php echo $model->getError('bio')!=null ? 'error' : '' ?>">
              <div class="col-sm-3 col-xs-5">
                <p class="form-dashboard-label">
                   <?php echo $form->labelEx($model,'bio'); ?>
                </p>
              </div>
              <div class="col-sm-6 col-xs-7">
                <?php echo $form->textArea($model,'bio',array('rows'=>5,'class'=>'form-control form-dashboard-input')); ?>
                <?php if($model->getError('bio')!=null): ?>
                  <p class="small"><?php echo $model->getError('bio') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <!-- .row.form-dashboard-row -->

            <div class="row">
              <div class="col-sm-3 col-xs-5"></div>
              <div class="col-sm-6 col-xs-7">
                <p>
                  <input class="t_u" type="submit" value="Update Profil">
                </p>
                <p class="req small">* Wajib diisi</p>
              </div>
            </div>
            <!-- .row.form-dashboard-row -->

          <?php $this->endWidget(); ?>
          <!-- .form-dashboard -->
        </div>
        <!-- .dashboard -->

      </div>
      <!-- .row -->
    </div>
    <!-- .container -->
  </div>
  <!-- .page -->