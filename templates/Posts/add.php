<?php $this->element('header') ?>
		<div class="row">
		<div class="col-sm-2"></div>


		<!-- <?php ?> -->
				<div class="col-sm-8" style="margin-top: 50px;background-color: lavenderblush">

                  <?= $this->Form->create($post,['enctype'=>'multipart/form-data','class' => 'form-container']) ?>
                    
                  <?= $this->Form->control('post',['type'=>'textarea','placeholder'=>'Write Something','class'=>'form-control'])?>
                   

                    <br><br>
                    <?= $this->Form->control('image',['type'=>'file'])?>

                    <?= $this->Form->control('Upload',['type'=>'submit','class'=>'btn'])?>

                    <?= $this->Form->control('Cancel',['type' => 'button','class'=>'btn cancel'])?>
                 
                  <?= $this->Form->end() ?>
                 </div>


           <div class="col-sm-2"></div>

        </div>