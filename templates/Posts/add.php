<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    
    <div class="container">
          <a href="" ><?= $this->Html->image('destination_1.jpg',['class'=>'navbar_picture']) ?> </a>

          <?= $this->Html->link(__('Alumni Network'),['action' => 'index','class' => 'navbar-brand']) ?>


          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
          
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">

              <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <?= $this->Html->link(__('Home'),['controller' => 'Users','action' => 'home','class' => 'nav-link']) ?>
                      
                    </a>
              </li>
              <li class="nav-item active">
                <?= $this->Html->link(__('Profile'),['controller' => 'Users','action' => 'profile','class' => 'nav-link']) ?>
                <span class="sr-only">(current)</span>
              </li>
              <li class="nav-item">
                <?= $this->Html->link(__('Chats'),['controller' => 'Users','action' => 'chat','class' => 'nav-link']) ?>
              </li>
               <li class="nav-item">
              <?= $this->Html->link(__('Help'),['controller' => 'Users','action' => 'help','class' => 'nav-link']) ?>
               </li>
              </ul>
              <li class="nav-item">
                <?= $this->Html->link(__('Logout'),['controller' => 'Users','action' => 'logout','class' => 'nav-link']) ?>
              </li>
       
          </div>
    </div>
</nav>
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