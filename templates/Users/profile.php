<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    
    <div class="container">
          <a href="" ><?= $this->Html->image('destination_1.jpg',['class'=>'navbar_picture']) ?> </a>

          <?= $this->Html->link(__('Alumni Network'),['action' => 'index','class' => 'navbar-brand']) ?>


          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
          
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">

              <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <?= $this->Html->link(__('Home'),['action' => 'home','class' => 'nav-link']) ?>
                      
                    </a>
              </li>
              <li class="nav-item active">
                <?= $this->Html->link(__('Profile'),['action' => 'profile','class' => 'nav-link']) ?>
                <span class="sr-only">(current)</span>
              </li>
              <li class="nav-item">
                <?= $this->Html->link(__('Chats'),['action' => 'chat','class' => 'nav-link']) ?>
              </li>
               <li class="nav-item">
              <?= $this->Html->link(__('Help'),['action' => 'help','class' => 'nav-link']) ?>
               </li>
              </ul>
              <li class="nav-item">
                <?= $this->Html->link(__('Logout'),['action' => 'logout','class' => 'nav-link']) ?>
              </li>
       
          </div>
    </div>
</nav>
<div class="row">
  <div class="col-sm-2" style="background-color: lavender">
    
      <?= $this->Html->image($user->image,['class'=>'profile_picture']) ?>

      
          
      <div class="profile_details">

        <strong><a href="#" class=""> </strong>
      </div>
      <div class="image_upload">

      <?= $this->Form->create($user,['enctype' => 'multipart/form-data','class'=>'form-disable']) ?>


                  <?php  
                    echo $this->Form->control('image',['accept'=>['.jpg'],'type'=>'file','id'=>'file','onchange'=>'Filevalidation()']);
                  ?>

                  <center>
                    <?= $this->Form->control('Update',['type'=>'submit'])?>
                  </center>
        
      <?= $this->Form->end(); ?>
      </div>

  </div>
    <div class="col-sm-8" style="background-color:lavenderblush;box-shadow: 5px 5px 5px 5px #155256;">

        <div class="row" style="box-shadow: 5px 5px 5px 5px #155256;">
            <div class="col-sm-6">

                <center><p> <a href="#"> Create a New Post  </a></p> 

                
        
                </center>
                
            </div>
            <div class="col-sm-2" style="background-color: lavender;">
                <button class="fa fa-pencil-square" aria-hidden="true" onclick="openDialog()"> </button>
            </div>
            <div class="col-sm-2" style="background-color: lavender;">
             <a href="#" class="fa fa-picture-o" aria-hidden="true"> </a>
            </div>
            <div class="col-sm-2" style="background-color: lavender;">
                <a href="#" class="fa fa-video-camera" aria-hidden="true"> </a>
            </div>

        </div>

        <div class="posts" style=" margin-top: 30px;">


                  <li> <?= $this->Html->link(__('New User'),['action'=>'call_modal'],['class'=>'overlay-add-user']) ?> </li>


                  <h2> <?= h($user->middle_name.' ' .$user->last_name)?></h2>

        </div>



    </div>

    <div class="col-sm-2"> 
      <div class = "modal fade" id = "dialogModalAddUsers" role = "dialog" >
      <div class = "contentWrapAddUsers" > </div>
      </div>
      
    </div>
</div>