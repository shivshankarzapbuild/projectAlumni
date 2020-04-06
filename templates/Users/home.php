<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <?= $this->Html->link(__('Alumni Network'),['action' => 'index','class' => 'navbar-brand']) ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <?= $this->Html->link(__('Home'),['action' => 'home','class' => 'nav-link']) ?>
                  <span class="sr-only">(current)</span>
                </a>
          </li>
          <li class="nav-item">
            <?= $this->Html->link(__('Profile'),['action' => 'profile','class' => 'nav-link',]) ?>

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
        </ul>
      </div>
    </div>
  </nav>

  <div class="row">
    <div class="col-sm-1" style="background-color: lavender;height:auto;">
      
    </div>
    <div class="col-sm-10">
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
              
              <?php foreach ($post->comments as $comment) : ?>
                <div class="comments-inside">
                  <br>
                     <?php echo $comment->comments; ?>

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
       <div class="col-sm-1" style="background-color: lavender;height: 500px;">
      
    </div>
    
    
  </div>

