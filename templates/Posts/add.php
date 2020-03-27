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

<button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
                  <?= $this->Form->create($posts,['enctype'=>'multipart/form-data','class' => 'form-container','action'=>'/posts/add']) ?>
                    
                  <?= $this->Form->control('text',['type'=>'textarea','id'=>'input','placeholder'=>'Write Something','class'=>'form-control'])?>
                   

                    <br><br>
                    <?= $this->Form->control('image',['type'=>'file'])?>
                    <?= $this->Form->control('Post',['type'=>'submit','class'=>'btn'])?>
                    <?= $this->Form->control('Close',['class'=>'btn cancel','onclick'=>'closeForm()'])?>
                 
                  <?= $this->Form->end() ?>
</div>