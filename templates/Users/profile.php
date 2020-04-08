<?= $this->element('header') ?>

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

      <div>
        <?= $this->Html->link('justlink',['action'=>'home']) ?>
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
<center><h1>Posts</h1></center>
 <?php  foreach ($posts as $post): ?>      
      <center>
      <div class="posts">
      <article class="articleClass">
        <header >
          <div class="header" > 
            
            <h2> <?php echo $post->post; ?></h2>
            <h6> <?= $this->Html->link($post->has('users') ? $post->users['first_name']: ' ',['controller'=>'Users','action'=>'profile']); echo " ". date('h:i A', strtotime($post->created)); ?></h6>
          </div>
        </header>
         <div class="image_field"> 
          </div>
          <div class="card_image">
            <div>
              <?= $this->Html->image($post->image,['alt'=>'Note this','class'=>'image_card','width'=>'80%','height'=>'50%'])?>
            </div>
          </div>
          <footer>
            <details>
              <summary class="commentSummary">Comments</summary>

              <?= $this->Html->link(__('New Comment'),['controller'=>'Comments','action' => 'add', $post->id]) ?>


              <?php foreach ($post->comments as $comment) : ?>
                <div class="comments-inside">
                  <br>
                     <?php echo $comment->comments; ?>

                     <?= $this->Html->link(__('edit'), ['controller'=>'Comments','action' => 'edit', $comment->id]) ?>

                     <?= $this->Form->postLink(__('delete'), ['controller'=>'Comments','action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete the comment ')]) ?>

                    
                  <br>  

                </div>
                <?php endforeach; ?>

                
                <?= $this->Form->create() ?>


               
              </details>
          </footer>
      </article>
    </div>

      </center>

     
    <?php endforeach; ?>

                
           </div>

        

        <div class="posts" style=" margin-top: 30px;">


                  <h2 style="position: fixed;"> <?= h($user->first_name.' ' .$user->last_name)?></h2>

        </div>



    </div>

    <div class="col-sm-2"> 
      <div class = "modal fade" id = "dialogModalAddUsers" role = "dialog" >
      <div class = "contentWrapAddUsers" > </div>
      </div>
      
    </div>
</div>