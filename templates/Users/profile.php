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
    <div class="col-sm-8" style="margin-top: 50px;">

      <?= $this->Html->link(__('Add Post'),['controller' => 'Posts' , 'action' => 'add'] )?>

        

                <center> 
          <button class="open-button" onclick="openForm()">Add Post</button>

                <div class="form-popup" id="myForm">
                  <?= $this->form->create($user,['enctype'=>'multipart/form-data','class' => 'form-container','action'=>'/posts/add']) ?>
                    
                  <?= $this->form->control('text',['type'=>'textarea','id'=>'input','placeholder'=>'Write Something','class'=>'form-control'])?>
                   

                    <br><br>
                    <?= $this->form->control('image',['type'=>'file'])?>
                    <?= $this->form->control('Post',['type'=>'submit','class'=>'btn'])?>
                    <?= $this->form->control('Close',['class'=>'btn cancel','onclick'=>'closeForm()'])?>
                 
                  <?= $this->form->end() ?>
                </div>
              

                
        
                </center>


                
           </div>

        

        <div class="posts" style=" margin-top: 30px;">


                  <h2 style="position: fixed;"> <?= h($user->middle_name.' ' .$user->last_name)?></h2>

        </div>



    </div>

    <div class="col-sm-2"> 
      <div class = "modal fade" id = "dialogModalAddUsers" role = "dialog" >
      <div class = "contentWrapAddUsers" > </div>
      </div>
      
    </div>
</div>